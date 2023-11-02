<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
    
    protected $data = [];
    protected $errors = [];

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function setError($field, $message)
    {
        $this->errors[$field] = $message;
    }
    
	public function getData() {
		return $this->data;
	}

    public function validate($username, $password)
    {
        if (empty($username) || strlen($username) < 1) {
            $this->errors['username'] = 'Please provide a valid username';
        }

        if (!preg_match("/^[a-zA-Z0-9_-]{3,16}$/", $username)) {
            $this->errors['username'] = 'Invalid username format';
        }

        if (empty($password) || strlen($password) < 1) {
            $this->errors['password'] = 'Please provide a valid password';
        }

        $dbrow = Validator::checkUsername($username);
        if ($dbrow === false){
            //No username in the database, return an error
            $this->errors['authentication'] = 'Credentials don\'t match';
        }else {
            $this->data = [
                'username' => $username,
                'password' => $password,
                'dbrow' => $dbrow
            ];
        }
        return empty($this->errors);
    }

}