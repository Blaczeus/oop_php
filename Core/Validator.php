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
}