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

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = htmlspecialchars($_POST['user_email']);
            $password = htmlspecialchars($_POST['user_password']);

            $userModel = new User($this->db);

            $user = $userModel->login($email, $password);

            if ($user) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];

                $_SESSION['toast'] = ['type' => 'success', 'message' => 'Login successful!'];
                header('Location: index.php?page=dashboard');
                exit;
            } else {
                $_SESSION['toast'] = ['type' => 'error', 'message' => 'Invalid email or password.'];
                header('Location: index.php?page=login');
                exit;
            }
        }
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();

        session_start();
        $_SESSION['toast'] = ['type' => 'success', 'message' => 'You have successfully logged out.'];

        header('Location: index.php?page=login');
        exit;
    }
}
