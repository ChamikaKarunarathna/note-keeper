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

    public function getUserNotes($user_id)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM notes WHERE user_id = :user_id ORDER BY created_at DESC");
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error fetching notes: " . $e->getMessage();
            return false;
        }
    }

    public function getNoteById($note_id, $user_id)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM notes WHERE id = :note_id AND user_id = :user_id");
            $stmt->bindParam(':note_id', $note_id);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error fetching note: " . $e->getMessage();
            return false;
        }
    }

    public function update($note_id, $user_id, $title, $content)
    {
        try {
            $stmt = $this->db->prepare("UPDATE notes SET title = :title, content = :content WHERE id = :note_id AND user_id = :user_id");
            $stmt->bindParam(':note_id', $note_id);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':content', $content);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error updating note: " . $e->getMessage();
            return false;
        }
    }

    public function delete($note_id, $user_id) {
        try {
            $stmt = $this->db->prepare("DELETE FROM notes WHERE id = :note_id AND user_id = :user_id");
            $stmt->bindParam(':note_id', $note_id);
            $stmt->bindParam(':user_id', $user_id);
    
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error deleting note: " . $e->getMessage();
            return false;
        }
    }
}
