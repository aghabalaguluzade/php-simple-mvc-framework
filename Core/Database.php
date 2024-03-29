<?php

namespace Core;

use PDO;

class Database {
	
	public $connection;
	protected $statement;
		
	public function __construct(array $config,string $username = 'root', string $password = '')
	{		
		$dns = 'mysql:'. http_build_query($config,'',';');
		
		try {
			$this->connection = new PDO($dns, $username, $password,[
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
			]);
		} catch (PDOException $e) {
			echo "Connection error: " . $e->getMessage();
		}
		
	}
	
	public function query(string $query,array $params = [])
	{
		$this->statement = $this->connection->prepare($query);
		$this->statement->execute($params);
		return $this;
	}
	
	public function get()
	{
		return $this->statement->fetchAll();
	}
	
	public function find()
	{
		return $this->statement->fetch();
	}
	
	public function findOrFail()
	{
		$result = $this->find();
		
		if(! $result) {
			abort();
		}
		
		return $result;
		
	}
}