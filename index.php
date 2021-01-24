<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('home', 'BookController');
Router::post('login', 'SecurityController');
Router::post('addBook', 'BookController');
Router::post('register','SecurityController');
Router::post('search','BookController');
Router::get('vote', 'BookController');
Router::get('addRate', 'BookController');
Router::get('news', 'DefaultController');
Router::get('my_library', 'LibraryController');
Router::get('rankings', 'BookController');
Router::post('giveLike', 'LibraryController');
Router::post('deleteBook', 'BookController');


Router::run($path);