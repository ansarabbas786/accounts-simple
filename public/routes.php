<?php
require_once "../vendor/autoload.php";

use App\Model\Settings\SettingsAnalysisModel;
use App\Model\Settings\SettingsBankModel;
use App\Model\Settings\SettingsCustomerModel;

$uri = $_SERVER['HTTP_REFERER'];
$action = $_GET['action'];
$data = (object)$_POST;

//All settings-analysis routes will be go here
$settings_analysis = strpos($uri, 'settings-analysis');
if ($settings_analysis) {
    echo(SettingsAnalysisModel::processForm($data, $action));
}

//All settings-bank routes will go here
$settings_bank = strpos($uri, 'settings-bank');

if ($settings_bank) {
    echo(SettingsBankModel::processForm($data, $action));
}


//All settings-customers routes will go here
$settings_bank = strpos($uri, 'settings-customer');

if ($settings_bank) {
    echo(SettingsCustomerModel::processForm($data, $action));
}




