<?php

use Core\App;
use Core\Database;

/** @var \Core\Database $db */
$db = App::resolve(Database::class);

$currentUserId = 2;
$UserId = $_GET['id'];

$query1 = "SELECT * FROM notes WHERE id = :id";
$note = $db->query($query1, ['id' => $UserId])->findOrAbort();

authorize($note['user_id'] === $currentUserId);

view("notes/edit.view.php", [
    'heading' => 'Edit Note',
    'errors' => [],
    'messages' => [],
    'note' => $note,
]);
