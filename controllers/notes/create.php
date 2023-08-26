<?php

use Core\Database;
use Core\Validator;

$config = require base_path('config.php');
$errors = [];
$messages = [];
$db = new Database($config['database']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['create'])) {
        $title = Validator::string(($_POST['title']), 'title', $errors, 100, 5);
        $body = Validator::string(($_POST['body']), 'body', $errors,1000, 15);
        $user_id = 2;

        if (empty($errors)) {
            $sql = "INSERT INTO notes (user_id, title, body) VALUES (:user_id, :title, :body)";
            $params = [
                'user_id' => $user_id,
                'title' => $title,
                'body' => $body
            ];

            if ($db->query($sql, $params)) {
                $messages[] = "One Row Inserted Successfully";
            } else {
                $errors[] = "Failed to insert row. Please try again.";
            }
        }
    }
    if (isset($_POST['cancel'])) {
        $_POST = []; // Clear form data
    }
}

view("notes/create.view.php", [
    'heading' => 'Create Note',
    'errors' => $errors,
    'messages' => $messages,
]);
