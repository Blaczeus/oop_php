<?php

namespace Core;

class Validator
{
    public static function string($value, $fieldName, &$errors, $maxLength = null, $minLength = null): string
    {
        $value = trim(htmlspecialchars($value));
        if (empty($value)) {
            $errors[] = "A {$fieldName} is required !";
        }
        elseif ($maxLength !== null && strlen($value) > $maxLength) {
            $errors[] = "The {$fieldName} cannot be more than {$maxLength} characters";
        }
        elseif ($minLength !== null && strlen($value) < $minLength) {
            $errors[] = "The {$fieldName} cannot be less than {$minLength} characters";
        }
        return $value;
    }


    public static function name($value, &$errors, $fieldType, $fieldName = 'name'): string
    {
        $value = trim($value);

        if (empty($value) && strlen($value) < 1) {
            $errors[$fieldType] = "Please provide a $fieldName";
        }
        elseif ($fieldType === 'fname' && !preg_match("/^[a-zA-Z]{3,16}$/", $value)) {
            $errors[$fieldType] = "Invalid $fieldName format";
        }
        elseif ($fieldType === 'lname' && !preg_match("/^[a-zA-Z]{3,16}$/", $value)) {
            $errors[$fieldType] = "Invalid $fieldName format";
        }
        elseif ($fieldType === 'username' && !preg_match("/^[a-zA-Z0-9_-]{3,16}$/", $value)) {
            $errors[$fieldType] = "Invalid $fieldName format";
        }
        elseif ($fieldType === 'fname' || $fieldType === 'lname') {
            $value = ucfirst($value);
        }

        return $value;
    }


    public static function email($value, &$errors, $fieldName = 'email'): string
    {
        $value = trim($value);

        if (empty($value) && strlen($value) < 1) {
            $errors['email'] = "Please provide an email address";
        }elseif (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Invalid {$fieldName} format";
        }

        return $value;
    }

    public static function password($value, $email, &$errors, $minLength =7, $fieldName = 'password'): string
    {
        $value = trim($value);
        if (empty($value)) {
            $errors['password'] = "A {$fieldName} is required!";
        } elseif (strlen($value) < $minLength) {
            $errors['password'] = "The {$fieldName} must be at least {$minLength} characters long";
        } else {
            $emailParts = explode('@', $email);
            $username = $emailParts[0];
            if (stripos($value, $username) !== false) {
                $errors['password'] = "The {$fieldName} cannot contain your email username";
            }
        }
        return $value;
    }

    public static function checkEmail($email)
    {
        /** @var Database $db */
        $db = App::resolve(Database::class);

        $sql = "SELECT * FROM users WHERE email = :email";
        $params = ['email' => $email,];
        return (bool)$db->query($sql, $params)->find();
    }

    public static function checkUsername($username)
    {
        /** @var Database $db */
        $db = App::resolve(Database::class);
        
        $sql = "SELECT id, fname, lname, username, email, password FROM users WHERE username = :username";
        $params = ['username' => $username];
        $result = $db->query($sql, $params);

        if ($result->stmt->rowCount() < 1) {
            return false;
        } else {
            return $result->find();
        }
    }
}