<?php

namespace App\Model\Settings;



use App\Validator\CompanyValidator;

class SettingsCompanyModel
{

    public static function processForm($data)
    {
        if (CompanyValidator::validate($data)) {
            if (self::save($data)) {

            } else {
                //todo return database errors
            }
        } else {
            //todo return validation errors
        }
    }

    public static function update($data)
    {
        if (CompanyValidation::validate($data)) {
            //update all the data here
        }
    }

    public static function save($data)
    {
        //todo implement the save login here
    }

}


?>