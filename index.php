<?php

require 'Routing.php';



$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('time', 'DefaultController');
Router::get('home', 'PostController');
Router::get('favourite', 'PostController');
Router::get('post', 'PostController');
Router::get('adminPanel', 'AdminController');
Router::get('delete', 'AdminController');
Router::post('login', 'SecurityController');
Router::post('logout', 'SecurityController');
Router::post('loginAdmin', 'AdminController');
Router::post('register', 'SecurityController');
Router::get('people', 'SecurityController');
Router::post('addPost', 'PostController');
Router::post('search', 'PostController');
Router::get('like', 'PostController');
Router::get('dislike', 'PostController');

Router::run($path);