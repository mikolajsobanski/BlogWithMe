<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('home', 'PostController');
Router::post('login', 'SecurityController');
Router::post('register', 'SecurityController');
Router::post('addPost', 'PostController');
Router::post('search', 'PostController');
Router::get('like', 'PostController');
Router::get('dislike', 'PostController');

Router::run($path);