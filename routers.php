<?php

$uri = $_SERVER['REQUEST_URI'];

$path = parse_url($uri);

$routes = [
    '/' => 'controllers/index.php',
    '/show' => 'controllers/show.php',
    '/edit' => 'controllers/edit.php',
    '/add' => 'controllers/add.php',
    '/delete' => 'controllers/delete.php'
];

function routeToController($path, $routes) {
    if (array_key_exists($path, $routes)) {
        require $routes[$path];
    } else {
        abort();
    }
}

function abort($http_code = 404) {
    http_response_code($http_code);
    require "views/{$http_code}.php";
    die();
}

routeToController($path['path'], $routes);