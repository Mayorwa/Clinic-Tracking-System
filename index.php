<?php
include 'helper/global.php';
include 'router/router.php';
session_start();
$request = $_SERVER['REQUEST_URI'];
$router = new Router($request);

$router->get('/', 'pages/home');
$router->get('board', 'board/index');
$router->get('login', 'auth/login');
$router->get('post', 'pages/post');

// if(!$_SESSION['isFound']){
//     $router->fourOhfour();
// }