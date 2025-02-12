<?php
require_once 'models/Note.php';

class NoteController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function createNote()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_SESSION['user_id'])) {
                $_SESSION['toast'] = ['type' => 'error', 'message' => 'You must be logged in to create a note.'];
                header('Location: index.php?page=login');
                exit;
            }

            $user_id = $_SESSION['user_id'];
            $title = htmlspecialchars($_POST['note_title']);
            $content = htmlspecialchars($_POST['note_content']);

            $noteModel = new Note($this->db);

            if ($noteModel->create($user_id, $title, $content)) {
                $_SESSION['toast'] = ['type' => 'success', 'message' => 'Note created successfully!'];
                header('Location: index.php?page=dashboard');
                exit;
            } else {
                $_SESSION['toast'] = ['type' => 'error', 'message' => 'Failed to create note. Try again.'];
                header('Location: index.php?page=create-note');
                exit;
            }
        }
    }
}
