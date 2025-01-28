<?php
require_once 'includes/connection.php';
require_once 'controllers/AuthController.php';
$authController = new AuthController($db);

$page = $_GET['page'] ?? 'home';
switch ($page) {
    case 'home':
        include 'views/home.php';
        break;
    case 'login':
        include 'views/login.php';
        break;
    case 'register':
        $authController->register();
        include 'views/register.php';
        break;
    default:
        include 'views/404.php';
        break;
}
