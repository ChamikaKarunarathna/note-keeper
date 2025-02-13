<?php
class Database
{
    private $host = 'localhost';
    private $db_name = 'note_keeper_db';
    private $username = 'root';
    private $password = '';
    // private $host = 'sql212.infinityfree.com';
    // private $db_name = 'if0_38307975_note_keeper_db';
    // private $username = 'if0_38307975';
    // private $password = 'q0fgZClTGZbcg7V';
    private static $instance = null;
    public $connection;

    private function __construct()
    {
        try {
            $this->connection = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name};charset=utf8",
                $this->username,
                $this->password
            );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}

$db = Database::getInstance()->getConnection();
