<?php

class Database {
	
	public $connection;
		
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
	
	public function query(string $query,array $params = []): PDOStatement
	{
		$statement = $this->connection->prepare($query);
		$statement->execute($params);
		return $statement;
	}
}