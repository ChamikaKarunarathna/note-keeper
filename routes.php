<?php
$page = $_GET['page'] ?? 'home';
switch ($page) {
    case 'home':
        include 'views/home.php';
        break;
    case 'login':
        include 'views/login.php';
        break;
    case 'register':
        include 'views/register.php';
        break;
    default:
        include 'views/404.php';
        break;
}
