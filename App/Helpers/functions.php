<?php

require_once "initialize.php";

function dd($value)
{
    $_SESSION['values'] = $value;

    redirect_to('dump.php');
}

function redirect_to($new_url)
{

    $new_url = urlencode($new_url);

    header("Location: {$new_url}");

    exit();
}

function __autoload($class_name){


    $class_name = strtolower($class_name);



    $path = LIB_PATH . "{$class_name}.php";

    if(file_exists($path)){

        require_once($path);
    }else{

        die('file not found');
    }

}

function output_message($message = "")
{
    if (!empty($message)) {
        return "<p class=\"message\">{$message}</p>";
    } else {
        return "";
    }
}

function require_layout_template($template = "")
{

    require_once(SITE_ROOT . DS . 'public' . DS . 'layout' . DS . $template);
}

function log_action($action, $message = "")
{


    if (file_exists(LOG_PATH)) {

    }


}


function set_language()
{

    global $lang;

    if (isset($_GET['lang'])) {
        $lang = isset($_GET['lang']) ? htmlentities($_GET['lang']) : 'jp';
        $_SESSION['lang'] = $lang;

        $path = str_replace('/', '', $_SERVER['SCRIPT_NAME']);

        redirect_to(urlencode($path));

    } elseif (isset($_SESSION['lang'])) {

        $lang = $_SESSION['lang'];

    } elseif (isset($_COOKIE['lang'])){

        $lang = $_COOKIE['lang'];
    } else {

        $lang = 'jp';
    }


}


function make_tags($tags){

    $tags = explode(',', $tags);

    $tag_badge = '';

    for ($i=0; $i < count($tags); $i++){

        $tag_badge  .= '<a href="categories_within.php?tag=' . urlencode(trim($tags[$i])). '"> <span class="badge">' . htmlentities(trim($tags[$i])) . '</span></a>';
    }


    return $tag_badge;
}




