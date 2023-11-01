<?php

use Core\App;
use Core\Database;

/** @var Database $db */
$db = App::resolve(Database::class);

$currentUserId = $_SESSION['user']['id'];

$query = "SELECT * FROM notes WHERE user_id = :user_id";
$notes = $db->query($query, ['user_id' => $currentUserId])->findAll();

view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes,
]);
