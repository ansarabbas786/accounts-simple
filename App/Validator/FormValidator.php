<?php

namespace App\Validator;

abstract class FormValidator{
   public static $errors;
    abstract public static function Validate($data);
    abstract public static function getErrors();
}

?>