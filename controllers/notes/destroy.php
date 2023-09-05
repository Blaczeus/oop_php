<?php
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 2;
$message = [];

$query1 = "SELECT * FROM notes WHERE id = :id";
$note = $db->query($query1, ['id' => $_POST['id']])->findOrAbort();

authorize($note['user_id'] === $currentUserId);

$query2 = "DELETE FROM notes WHERE id = :id";
$result = $db->query($query2, ['id' => $_POST['id']]);

header("location: /notes");
exit();
