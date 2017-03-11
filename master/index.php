<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/3/17
 * Time: 12:04 AM
 */
session_start();
if(isset($_SESSION['secretkey']) && isset($_SESSION['designation']) && $_SESSION['designation'] == 'master')
{

    //Temporary Redirect
    header('Location: addnetwork.php');
    die();
}
else{

    unset($_SESSION);
    session_abort();
    session_destroy();
    header('Location: ../index.php');
    die();
}


?>