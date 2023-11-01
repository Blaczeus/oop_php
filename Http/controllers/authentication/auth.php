<?php

use Core\App;
use Core\Database;
use Core\Validator;


if (isset($_POST['login'])) {
    $errors = [];

    $db = App::resolve(Database::class);
    $authResult = Validator::login($_POST['username'], $_POST['password'], $errors, $db);

    if (!empty($errors)) {
        return view("authentication/login.view.php", [
            'errors' => $errors,
        ]);
    }

    if ($authResult !== false) {
        session('user', $authResult);
        session('logged_in', true);

        header('location: /');
        exit();
    }
}
