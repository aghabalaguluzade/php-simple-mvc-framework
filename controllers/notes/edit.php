<?php

use Core\App;
use Core\Database;

$db = App::getContainer()->resolve(Database::class);

$note = $db->query('SELECT * FROM notes WHERE id = :id', ['id' => $_GET['id']])->findOrFail();

view('notes/edit.view.php', [
	'heading' => 'Edit Note',
	'note' => $note,
	'errors' => []
]);