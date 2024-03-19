<?php

$router->get('/', 'index.php');
$router->get('/about', 'about.php')->only('auth');
$router->get('/contact', 'contact.php');

// Notes
$router->get('/notes', 'notes/index.php')->only('auth');
$router->get('/note', 'notes/show.php');
$router->delete('/note','notes/destroy.php');

$router->get('/note/edit', 'notes/edit.php');
$router->patch('/note', 'notes/update');

$router->get('/notes/create', 'notes/create.php');
$router->post('/notes', 'notes/store.php');

// Register
$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php')->only('guest');

// Login
$router->get('/login', 'sessions/create.php')->only('guest');
$router->post('/sessions', 'sessions/store.php')->only('guest');
$router->delete('/session', 'sessions/destroy.php')->only('auth');