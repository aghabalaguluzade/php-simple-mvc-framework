<?php

namespace Core;

use Core\Middleware\Middleware;

class Router 
{
	private array $routes = [];
	
	public function add(string $method, string $uri, string $controller)
	{
		$this->routes[] = [
			'method' => $method,
			'uri' => $uri,
			'controller' => $controller,
			'middleware' => null
		];
		
		return $this;
	}
	
	public function get(string $uri,string $controller)
	{
		return $this->add('GET',$uri,$controller);
	}
	
	public function post(string $uri,string $controller)
	{
		return $this->add('POST',$uri,$controller);
	}
	
	public function delete(string $uri,string $controller)
	{
		return $this->add('DELETE',$uri,$controller);
	}
	
	public function patch(string $uri,$controller)
	{
		return $this->add('PATCH',$uri,$controller);
	}
	
	public function put(string $uri,string $controller)
	{
		return $this->add('PUT',$uri,$controller);
	}
	
	public function only(string $key)
	{
		$this->routes[array_key_last($this->routes)]['middleware'] = $key;
		
		return $this;
	}
	
	public function route(string $uri,string $method)
	{
		foreach($this->routes as $route)
		{
			if($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
				
				Middleware::resolve($route['middleware']);
				
				return require base_path('Http/Controllers/'.$route['controller']);
			}
		}
			$this->abort();
	}
	
	public function previousUrl()
	{
		return $_SERVER['HTTP_REFERER'];
	}
	
	protected function abort(int $code = 404)
	{
		http_response_code($code);
		
		require base_path("views/{$code}.php");
		
		die();
	}
	
}