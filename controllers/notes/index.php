<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 2;

$query = "SELECT * FROM notes WHERE user_id = :user_id";
$notes = $db->query($query, ['user_id' => $currentUserId])->findAllOrAbort();

view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes,
]);