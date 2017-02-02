<?php

namespace App\Validator;

use Respect\Validation\Validator;

class CompanyValidator{

    public static function validate($data)
    {
        $company = Validator::attribute(
              'name' , Validator::stringType()
        )->attribute(
            'email' , Validator::email()
        )->attribute(
            'telephone' , Validator::max(20)
        );

        if($company->validate($data)){
            echo 'validated!';
        }else{
            echo 'not validated!';
        }

        exit();

       try{

       }catch (){

       }




    }


}