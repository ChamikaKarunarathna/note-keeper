<?php
require_once 'models/User.php';

class AuthController
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = htmlspecialchars($_POST['user_email']);
            $password = htmlspecialchars($_POST['user_password']);
            $re_password = htmlspecialchars($_POST['user_re_password']);

            if ($password !== $re_password) {
                $_SESSION['toast'] = ['type' => 'error', 'message' => 'Passwords do not match.'];
                header('Location: index.php?page=register');
                exit;
            }

            $userModel = new User($this->db);

            if ($userModel->emailExists($email)) {
                $_SESSION['toast'] = ['type' => 'error', 'message' => 'This email is already registered.'];
                header('Location: index.php?page=register');
                exit;
                return;
            }

            if ($userModel->register($email, $password)) {
                $_SESSION['toast'] = ['type' => 'success', 'message' => 'Registration successful!'];
                header('Location: index.php?page=login');
                exit;
            } else {
                $_SESSION['toast'] = ['type' => 'error', 'message' => 'Registration failed. Please try again later.'];
                header('Location: index.php?page=register');
                exit;
            }
        }
    }
}
