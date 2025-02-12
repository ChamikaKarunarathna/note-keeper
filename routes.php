<?php
require_once 'includes/connection.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/NoteController.php';
$authController = new AuthController($db);
$noteController = new NoteController($db);

$page = $_GET['page'] ?? 'home';
switch ($page) {
    case 'home':
        include 'views/home.php';
        break;
    case 'login':
        $authController->login();
        include 'views/login.php';
        break;
    case 'register':
        $authController->register();
        include 'views/register.php';
        break;
    case 'logout':
        $authController->logout();
        break;
    case 'dashboard':
        include 'views/dashboard.php';
        break;
    case 'create-note':
        $noteController->createNote();
        include 'views/notes/create-note.php';
        break;
    default:
        include 'views/404.php';
        break;
}
