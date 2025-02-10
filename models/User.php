<?php

class User
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function login($email, $password)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                return $user;
            }
            return false;
        } catch (PDOException $e) {
            echo "Error logging in: " . $e->getMessage();
            return false;
        }
    }

    public function register($email, $password)
    {
        try {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $this->db->prepare(
                "INSERT INTO users (email, password) 
                 VALUES (:email, :password)"
            );

            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedPassword);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error registering user: " . $e->getMessage();
            return false;
        }
    }

    public function emailExists($email)
    {
        try {
            $stmt = $this->db->prepare(
                "SELECT COUNT(*) FROM users WHERE email = :email"
            );
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            return $stmt->fetchColumn() > 0;
        } catch (PDOException $e) {
            echo "Error checking email existence: " . $e->getMessage();
            return false;
        }
    }
}
