<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 2;

$query1 = "SELECT * FROM notes WHERE id = :id";
$note = $db->query($query1, ['id' => $_GET['id']])->findOrAbort();

authorize($note['user_id'] === $currentUserId);

view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note,
]);


