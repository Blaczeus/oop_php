<?php

use Core\Authenticator;
use Core\Session;
use Http\Forms\LoginForm;


if (isset($_POST['login'])) {

    $form = new LoginForm();

    if ($form->validate($_POST['username'], $_POST['password'])) {
        $auth = new Authenticator($form);
        if ($auth->attempt()) {

            $auth->login('logged_in', true);
            $auth->login('user', $auth->getUserData());

            redirect('/');
        }
    }

    Session::flash('errors', $form->getErrors());
    Session::flash('old', [
        'username' => $_POST['username']
    ]);

    return redirect('/login');
}
