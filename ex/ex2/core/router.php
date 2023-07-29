<?php
$page = 'pages/home.php';
if ( $_SERVER['REQUEST_METHOD'] === 'GET') {
    switch ($_SERVER['PATH_INFO']) {
        case '/users':
            $page = 'pages/users.php';
            break;
        case '/info':
            $page = 'pages/who.php';
            break;
        default:
            $page = 'pages/home.php';
            break;
    }
}
require_once __DIR__ . '/../controller/' . $page;

