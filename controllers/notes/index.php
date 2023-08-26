<?php

use Core\Database;

$currentUserId = 2;

$config = require base_path('config.php');
$db = new Database($config['database']);

$query = "SELECT * FROM notes WHERE user_id = :user_id";
$notes = $db->query($query, ['user_id' => $currentUserId])->findAllOrAbort();

view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes,
]);