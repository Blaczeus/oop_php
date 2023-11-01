<?php

namespace Core;

use Http\Forms\LoginForm;

class Authenticator
{
    protected $userData = [];

    protected $loginForm;

    public function __construct(LoginForm $loginForm = null)
    {
        $this->loginForm = $loginForm;
    }

    public function getUserData(): array
    {
        return $this->userData;
    }

    public function attempt()
    {
        if ($this->loginForm) {
            $data = $this->loginForm->getData();
            // Verify the Password
            if (password_verify($data['password'], $data['dbrow']['password'])) {
                // Password is correct, return the user's data
                $this->userData = [
                    'id'        => $data['dbrow']['id'],
                    'fname'     => $data['dbrow']['fname'],
                    'lname'     => $data['dbrow']['lname'],
                    'username'  => $data['dbrow']['username'],
                    'email'     => $data['dbrow']['email'],
                ];
            } else {
                $this->loginForm->setError('authentication', 'Credentials don\'t match');
            }
        }
        return empty($this->loginForm->getErrors());
    }

    public function login($name, $data)
    {
        $_SESSION[$name] = $data;

        session_regenerate_id(true);
    }

    public function logout()
    {
        Session::destroy();

    }
}
