<?php

namespace App\Model\Settings;

class SettingsCompanyModel
{

    public static function processForm($data)
    {
        echo $data->name;
    }

    public function update(array $companyInfo)
    {

    }
}


?>