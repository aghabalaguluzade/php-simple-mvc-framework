<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm	
{
	protected array $errors = [];
	
	public function validate(string $email, string $password): bool
	{
		if(! Validator::email($email)) {
			$this->errors['email'] = 'Please provide a valid email address.';
		}

		if(! Validator::string($password,1,8)) {
			$this->errors['password'] = 'Please provide a valid password.';
		}

		return empty($this->errors);
	}
	
	public function errors(): array
	{
		return $this->errors;
	}
	
	public function error(string $field,string $message): array
	{
		$this->errors[$field] = $message;
	}
}