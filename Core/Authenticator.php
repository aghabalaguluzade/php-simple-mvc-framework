<?php

namespace Core;

use Core\App;
use Core\Session;

class Authenticator
{
	public function attempt(string $email, string $password): bool
	{
		$user = App::resolve(Database::class)
			->query('SELECT * FROM users WHERE email = :email',[
				'email' => $email
		])->find();
		
		if($user) {
			if(password_verify($password, $user['password'])) {
				$this->login([
					'email' => $email
				]);
			
				return true;
			}	
		}
	
		return false;
		
	}

	public function login(array $user)
	{
		$_SESSION['user'] = [
			'email' => $user['email']
		];
		
		session_regenerate_id(true);
	}

	public function logout() 
	{
		Session::destroy();
	}

}