<?php
use Respect\Validation\Validator as v;

require_once "../vendor/autoload.php";

$name = 'ansail.com';



$userValidator = v::attribute('name', v::stringType()->length(1,32))
    ->attribute('birthdate', v::date()->age(18));

$userValidator->validate($user); // true

 ?>