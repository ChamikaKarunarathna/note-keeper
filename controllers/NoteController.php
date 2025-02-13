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

    public function updateNote()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_SESSION['user_id'])) {
                $_SESSION['toast'] = ['type' => 'error', 'message' => 'Unauthorized access.'];
                header('Location: index.php?page=login');
                exit;
            }

            $note_id = $_POST['note_id'];
            $user_id = $_SESSION['user_id'];
            $title = htmlspecialchars($_POST['note_title']);
            $content = htmlspecialchars($_POST['note_content']);

            $noteModel = new Note($this->db);

            if ($noteModel->update($note_id, $user_id, $title, $content)) {
                $_SESSION['toast'] = ['type' => 'success', 'message' => 'Note updated successfully!'];
                header('Location: index.php?page=dashboard');
                exit;
            } else {
                $_SESSION['toast'] = ['type' => 'error', 'message' => 'Failed to update note.'];
                header('Location: index.php?page=edit-note&id=' . $note_id);
                exit;
            }
        }
    }

    public function deleteNote()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
            if (!isset($_SESSION['user_id'])) {
                $_SESSION['toast'] = ['type' => 'error', 'message' => 'Unauthorized access.'];
                header('Location: index.php?page=login');
                exit;
            }

            $note_id = $_GET['id'];
            $user_id = $_SESSION['user_id'];

            $noteModel = new Note($this->db);

            // Delete the note
            if ($noteModel->delete($note_id, $user_id)) {
                $_SESSION['toast'] = ['type' => 'success', 'message' => 'Note deleted successfully!'];
                header('Location: index.php?page=dashboard');
                exit;
            } else {
                $_SESSION['toast'] = ['type' => 'error', 'message' => 'Failed to delete note.'];
                header('Location: index.php?page=dashboard');
                exit;
            }
        }
    }
}
