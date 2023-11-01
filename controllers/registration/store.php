<?php

use Core\App;
use Core\Database;
use Core\Validator;


if (isset($_POST['register']) && $_POST['register'] !== null) {
    $errors = [];
    $fname      = Validator::name($_POST['fname'], $errors, 'fname', 'name');
    $lname      = Validator::name($_POST['lname'], $errors, 'lname', 'name');
    $username   = Validator::name($_POST['username'], $errors, 'username', 'username');
    $email      = Validator::email($_POST['email'], $errors);
    $password   = Validator::password($_POST['password'], $email, $errors);

    if (!empty($errors)) {
        return view("registration/create.view.php", [
            'errors' => $errors,
        ]);
    }
    // dd($errors);

    $db = App::resolve(Database::class);
    $usernameExists = Validator::checkUsername($username, $db);
    $emailExists = Validator::checkEmail($email, $db);

    if ($usernameExists) {
        $errors['username'] = "A user with that username already exists";
        return view("registration/create.view.php", [
            'errors' => $errors,
        ]);
    }elseif ($emailExists) {
        $errors['email'] = "A user with that email already exists";
        return view("registration/create.view.php", [
            'errors' => $errors,
        ]);
    }else {
        $reg = "INSERT INTO users (fname, lname, username, email, password) VALUES (:fname, :lname, :username, :email, :password)"; 
        $params = [
            'fname' => $fname,
            'lname' => $lname,
            'username' => $username,
            'email' => $email,
            'password' => $password
        ];
        $db->query($reg, $params);

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
