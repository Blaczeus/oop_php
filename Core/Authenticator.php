<?php

namespace Core;

class Authenticator
{
    protected $userData = [];

    public function getUserData(): array
    {
        return $this->userData;
    }

    public function attempt($attributes)
    {
        $dbrow = Validator::usernameExists($attributes['username']);
        if ($dbrow) {
            if (password_verify($attributes['password'], $dbrow['password'])) {
                // Password is correct, return the user's data
                $this->userData = [
                    'id'        => $dbrow['id'],
                    'fname'     => $dbrow['fname'],
                    'lname'     => $dbrow['lname'],
                    'username'  => $dbrow['username'],
                    'email'     => $dbrow['email'],
                ];
                $this->login('logged_in', true);
                $this->login('user', $this->userData);

                return true;
            }
        }
        //No username or password mismatch in the database
        return false;
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
