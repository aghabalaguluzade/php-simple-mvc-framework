<?php

require 'functions.php';
require 'Database.php';
require 'Response.php';
require 'router.php';


$query = "SELECT * FROM posts WHERE id = :id";

//$posts = $db->query($query,['id' => $id])->fetch();

//dd($posts);