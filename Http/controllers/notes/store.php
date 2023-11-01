<?php

use Core\App;
use Core\Validator;
use Core\Database;

/** @var Database $db */
$db = App::resolve(Database::class);

$errors = [];
$messages = [];

if (isset($_POST['cancel'])) {
    $_POST = []; // Clear form data
    redirect('/notes');
}

$user_id = $_SESSION['user']['id'];
$title = Validator::string(($_POST['title']), 'title', $errors, 100, 5);
$body = Validator::string(($_POST['body']), 'body', $errors,1000, 15);

if (!empty($errors)) {
    view("notes/create.view.php", [
        'heading' => 'Create Note',
        'errors' => $errors,
    ]);
    die();
}

$sql = "INSERT INTO notes (user_id, title, body) VALUES (:user_id, :title, :body)";
$params = [
    'user_id' => $user_id,
    'title' => $title,
    'body' => $body
];

if ($db->query($sql, $params)) {
    $messages[] = "One Row Inserted Successfully";
} else {
    $errors[] = "Failed to create note. Please try again.";
}

redirect('/notes');


