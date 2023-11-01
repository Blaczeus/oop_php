<?php

use Core\App;
use Core\Database;
use Core\Validator;


if (isset($_POST['login']) && $_POST['login'] !== null) {
    $errors = [];
    $username   = Validator::name($_POST['username'], $errors, 'username', 'username');
//    $email      = Validator::email($_POST['email'], $errors);
    $password   = Validator::password($_POST['password'], $email, $errors);

    if (!empty($errors)) {
        return view("authentication/login.view.php", [
            'errors' => $errors,
        ]);
    }
    // dd($errors);

    $db = App::resolve(Database::class);
    $usernameExists = Validator::checkUsername($username, $db);
//    $emailExists = Validator::checkEmail($email, $db);

    if (!$usernameExists) {
        $errors['username'] = "I'm sorry but that username doesn't exists in our database";
        return view("authentication/login.view.php", [
            'errors' => $errors,
        ]);
    }else{

        $_SESSION['logged_in'] = true;
        $_SESSION['user'] = [
            'fname'=>$fname,
            'lname'=>$lname,
            'username' => $username,
            'email' => $email,
        ];

        header('location: /');
        exit();
    }
}
