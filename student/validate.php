<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 24/1/17
 * Time: 12:54 AM
 */

if(!($_SESSION['secretkey'] && $_SESSION['designation'] == 'student' ))
{
    unset($_SESSION);
    $_SESSION['relogin'] = true;
    $path = $_SERVER['DOCUMENT_ROOT'].'/index.php?attempt=relogin';
    header('Location: '.$path);
    die();
}