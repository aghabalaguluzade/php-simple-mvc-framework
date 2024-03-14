<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

function abort(int $code = 404): void
{
    http_response_code($code);
    require "views/{$code}.php";
    die();
}

$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/notes' => 'controllers/notes.php',
	'/note' => 'controllers/note.php',
    '/contact' => 'controllers/contact.php'
];

function routeToController(string $uri, array $routes): void
{
    if(array_key_exists($uri,$routes)) {
        require $routes[$uri];
    }else {
        abort();
    }
}

routeToController($uri, $routes);
