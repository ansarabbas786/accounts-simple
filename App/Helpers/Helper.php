<?php
namespace App\Helpers;

class Helper
{

    public static function number_format($number, $length)
    {
        return sprintf("%0{$length}d", $number);
    }
}

?>