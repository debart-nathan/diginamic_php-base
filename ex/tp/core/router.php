<?php
$content = "";
$title = "";

$page = 'pages/home.php';
switch ($_SERVER['PATH_INFO']) {
    case '/users':
        $title = "Les membres";
        $page = 'pages/users.php';
        break;
    case '/info':
        $title = "Qui sommes nous ?";
        $page = 'pages/who.php';
        break;
    case '/connect':
        $title = "Connection";
        $page = 'pages/connect.php';
        break;
    default:
        $title = "Accueil";
        $page = 'pages/home.php';
        break;
}
$content = __DIR__ . '/../controller/' . $page;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($_SERVER['PATH_INFO']) {
        case '/connect':
            require_once __DIR__ . '/../controller/api/connect.php';
            break;
        default:
            break;
    }
}
