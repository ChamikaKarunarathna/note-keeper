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
        $authController->login();
        include 'views/login.php';
        break;
    case 'register':
        $authController->register();
        include 'views/register.php';
        break;
    case 'logout':
        $authController->logout();
        // include 'views/logout.php';
        break;
    case 'dashboard':
        include 'views/dashboard.php';
        break;
    default:
        include 'views/404.php';
        break;
}
