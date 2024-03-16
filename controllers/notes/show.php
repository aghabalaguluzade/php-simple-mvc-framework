<?php

$config = require base_path('config.php');
$db = new Database($config['database']);

$currentUserId = 1;
$id = $_GET['id'];

$note = $db->query('SELECT * FROM notes WHERE id = :id',['id' => $id])->find();

if(! $note) {
	abort();
}


authorize($note['user_id'] === $currentUserId);


view("notes/show.view.php",[
	'heading' => 'Note',
	'note' => $note
]);