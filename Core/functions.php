<?php

use Core\Response;

function dd($value):void
{
	echo "<pre>";
	var_dump($value);
	echo "</pre>";
	die();
};

function urlIs(string $value): string
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort(int $code = 404)
	{
		http_response_code($code);
		
		require base_path("views/{$code}.php");
		
		die();
	}

function authorize(mixed $condition,int $status = Response::FORBIDDEN): void
{
	if(! $condition) {
		abort($status);
	}
}

function base_path(string $path): string
{
	return BASE_PATH . $path;
}

function view(string $path, $attributes = []): void
{
	extract($attributes);
	require base_path('views/'. $path);
}

function login(array $user)
{
	$_SESSION['user'] = [
		'email' => $user['email']
	];
	
	session_regenerate_id(true);
}

function logout() 
{
	$_SESSION = [];

	session_destroy();

	$params = session_get_cookie_params();
	setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}