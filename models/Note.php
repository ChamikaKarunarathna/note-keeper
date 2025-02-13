<?php

class Note
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function create($user_id, $title, $content)
    {
        try {
            $stmt = $this->db->prepare(
                "INSERT INTO notes (user_id, title, content) VALUES (:user_id, :title, :content)"
            );
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':content', $content);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error creating note: " . $e->getMessage();
            return false;
        }
    }
}
