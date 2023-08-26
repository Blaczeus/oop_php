<?php

use Core\Database;

$currentUserId = 2;

$config = require base_path('config.php');
$db = new Database($config['database']);

$query = "SELECT * FROM notes WHERE id = :id";
$note = $db->query($query, ['id' => $_GET['id']])->findOrAbort();

authorize($note['user_id'] === $currentUserId);

view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note,
]);