<?php



session_start();


if(isset($_SESSION['values'])){

    echo '<pre>';
    var_dump($_SESSION['values']);
    echo '</pre>';
}

exit();