<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;

/** @var Database $db */
if (isset($_POST['register'])) {
    $errors = [];
    $fname      = Validator::name($_POST['fname'], $errors, 'fname', 'name');
    $lname      = Validator::name($_POST['lname'], $errors, 'lname', 'name');
    $username   = Validator::name($_POST['username'], $errors, 'username', 'username');
    $email      = Validator::email($_POST['email'], $errors);
    $password   = Validator::password($_POST['password'], $email, $errors);
    $pwdhash    = password_hash($password, PASSWORD_BCRYPT);

    if (!empty($errors)) {
        return view("registration/create.view.php", [
            'errors' => $errors,
        ]);
    }
    // dd($errors);

    $db = App::resolve(Database::class);
    $usernameExists = Validator::checkUsername($username);
    $emailExists = Validator::checkEmail($email);

    if ($usernameExists) {
        $errors['username'] = "A user with that username already exists";
        return view("registration/create.view.php", [
            'errors' => $errors,
        ]);
    } elseif ($emailExists) {
        $errors['email'] = "A user with that email already exists";
        return view("registration/create.view.php", [
            'errors' => $errors,
        ]);
    } else {
        $reg = "INSERT INTO users (fname, lname, username, email, password, cpassword) VALUES (:fname, :lname, :username, :email, :password, :cpassword)";
        $params = [
            'fname' => $fname,
            'lname' => $lname,
            'username' => $username,
            'email' => $email,
            'password' => $pwdhash,
            'cpassword' => $password
        ];
        $db->query($reg, $params);
        $lastUserId = $db->conn->lastInsertId();

        $auth = new Authenticator();

        $auth->login('logged_in', true);
        $user = [
            'id'        => $lastUserId,
            'fname'     => $fname,
            'lname'     => $lname,
            'username'  => $username,
            'email'     => $email
        ];
        $auth->login('user', $user);


        redirect('/');
    }
}
