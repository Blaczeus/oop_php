<?php

use Core\App;
use Core\Database;
use Core\Validator;

/** @var \Core\Database $db */
$db = App::resolve(Database::class);

$user_id = 2;

// find the corresponding note
$query1 = "SELECT * FROM notes WHERE id = :id";
$note = $db->query($query1, ['id' => $_POST['id']])->findOrAbort();

// authorize that the current user can edit the note
authorize($note['user_id'] === $user_id);

// validate the form
$errors = [];
$title = Validator::string(($_POST['title']), 'title', $errors, 100, 5);
$body = Validator::string(($_POST['body']), 'body', $errors, 1000, 15);

if (count($errors) > 0) {
    return view("notes/edit.view.php", [
        'heading' => 'Edit Note',
        'note' => $note,
        'errors' => $errors
    ]);
}

// if no validation errors, update the record in the notes database table.
$query1 = "UPDATE notes SET title = :title, body = :body WHERE id = :id";
$db->query($query1, ['id' => $_POST['id'], 'title' => $title, 'body' => $_POST['body']]);

// redirect the user
header('location: /notes');
die();

