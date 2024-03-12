<?php

require 'functions.php';
// require 'router.php';

// $dns = "mysql:host=localhost;port=3306;dbname=php-mvc-framework;charset=utf8mb4";
// $pdo = new PDO($dns,'root',"");

$dns = "mysql:host=localhost;port=3306;dbname=php-mvc-framework;charset=utf8mb4";
$username = "root";
$password = "";
try {
    $pdo = new PDO($dns, $username, $password);
} catch (PDOException $e) {
    echo "Bağlantı hatası: " . $e->getMessage();
}




// $statement = $pdo->prepare("SELECT * FROM posts");
// $statement->execute();
// $posts = $statement->fetchAll();
// dd($posts);
