<?php
$content = "";
$title = "";

$page = 'pages/home.php';
$pathInfo = $_SERVER['PATH_INFO'];
switch (true) {
    case preg_match('/^\/users(?:\/.*)?/', $pathInfo):
        $title = "Les membres";
        $page = 'pages/users.php';
        break;
    case preg_match('/^\/info(?:\/.*)?/', $pathInfo):
        $title = "Qui sommes nous ?";
        $page = 'pages/who.php';
        break;
    case preg_match('/^\/connect(?:\/.*)?/', $pathInfo):
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
    switch (true) {
        case preg_match('/^\/.*\/api\/connect/', $pathInfo):
            require_once __DIR__ . '/../controller/api/connect.php';
            break;
        case preg_match('/^\/.*\/api\/disconnect/', $pathInfo):
            require_once __DIR__ . '/../controller/api/disconnect.php';
            break;
        default:
            break;
    }
}