<?php

use Core\App;
use Core\Database;

/** @var Database $db */
$db = App::resolve(Database::class);

$currentUserId = $_SESSION['user']['id'];

$query1 = "SELECT * FROM notes WHERE id = :id";
$note = $db->query($query1, ['id' => $_GET['id']])->findOrAbort();

authorize($note['user_id'] === $currentUserId);

view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note,
]);


