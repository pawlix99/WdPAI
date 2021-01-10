<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('index', 'DefaultController');
Routing::get('home', 'DefaultController');
Routing::get('news', 'DefaultController');
Routing::get('my library', 'DefaultController');
Routing::get('rankings', 'DefaultController');
Routing::run($path);