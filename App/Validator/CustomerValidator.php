<?php

namespace App\Validator;

class CustomerValidator extends FormValidator{

    public static $errors;

    public static function Validate($data)
    {
        // TODO: Implement Validate() method.
        self::$errors = ['name' => 'name is not valid!'];
        return true;
    }

    public static function getErrors()
    {
        return (object)self::$errors;
    }

    public static function has($key)
    {
        return array_key_exists($key, self::$errors);
    }
}