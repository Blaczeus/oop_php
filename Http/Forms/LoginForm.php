<?php

namespace Http\Forms;

use Core\ValidationException;

class LoginForm
{
    
    protected $errors = [];

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function setError($field, $message)
    {
        $this->errors[$field] = $message;

        return $this;
    }

    public function __construct(public array $attributes)
    {
        if (empty($attributes['username']) || strlen($attributes['username']) < 1) {
            $this->errors['username'] = 'Please provide a valid username';
        }

        if (!preg_match("/^[a-zA-Z0-9_-]{3,16}$/", $attributes['username'])) {
            $this->errors['username'] = 'Invalid username format';  
        }

        if (empty($attributes['password']) || strlen($attributes['password']) < 1) {
            $this->errors['password'] = 'Please provide a valid password';
        }
    }

    public static function validate($attributes)
    {
        $instance = new static($attributes);
        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw()
    {
        ValidationException::throw($this->errors, $this->attributes);
    }

    public function failed()
    {
        return count($this->errors);
    }

}