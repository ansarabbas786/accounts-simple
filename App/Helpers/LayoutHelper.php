<?php
namespace App\Helpers;

class LayoutHelper
{

    public static function redirect($url = 'home')
    {
        header('Location:', urlencode($url));
        exit();
    }

    public static function head()
    {
        require_once "../Layouts/head.php";
    }

    public static function footer()
    {
        require_once "../Layouts/footer.php";
    }

    public static function css($url)
    {
        echo '<link rel="stylesheet" type="text/css" href="' . $url . '">';
    }

    public static function js($url)
    {
        echo '<script type="text/javascript" src="' . $url . '"></script>';
    }

    public static function endHead()
    {
        echo '</head>';
    }

    public static function body()
    {
        echo '<body>';
    }

    public static function header()
    {
        require_once "../Layouts/header.php";
    }

    public static function navigation()
    {
        require_once "../Layouts/navigation.php";
    }

    public static function subNavigation()
    {
        require_once "../Layouts/sub-navigation.php";
    }
}