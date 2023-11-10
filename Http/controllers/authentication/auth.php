<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

if (isset($_POST['login'])) {
    $form = LoginForm::validate($attributes = [
        'username' => $_POST['username'],
        'password' => $_POST['password'],
    ]);

    $signedIn = (new Authenticator())->attempt($attributes);
    if (!$signedIn) {
        $form->setError('authentication', 'Credentials don\'t match')->throw();
    }

    return redirect('/login');
}
