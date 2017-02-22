<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 26/1/17
 * Time: 6:17 AM
 */

session_start();

if($_SESSION['designation'] != 'teacher' || !isset($_SESSION['secretkey']))
{
    $_SESSION['relogin'] = true;
    header('Location: ../../../index.php?attempt=relogin');
    die();
}

if(!(isset($_SESSION['propic'])&&isset($_SESSION['name'])&&isset($_SESSION['cabin'])))
{
    $_SESSION['issue'] = 'contactadmin';
    header('Location: ../../../index.php?attempt=help');
    die();
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/confidential/connector.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/confidential/mysql_login.php';

if(isset($_POST['cardcheck']))
{
    foreach ($_POST['cardcheck'] as $code)
    {
        $code = preg_replace("/[^A-Za-z0-9]+/","",$code);
        if(isset($code)){
            $update_string = "DELETE FROM nextvac.questiondb WHERE code = :quescode and secretkey = :seckey";
            $update_obj = $mysql_conn->prepare($update_string);
            $update_obj->bindParam(':quescode',$code,PDO::PARAM_STR);
            $update_obj->bindParam(':seckey',$_SESSION['secretkey'],PDO::PARAM_STR);

            $update_obj->execute();
            $mysql_conn = null;
            $_SESSION['setupdate'] = "del";
            header('Location: ../manageset.php?update=success');

        }else{
            $_SESSION['setupdate'] = false;
            $mysql_conn = null;
            header('Location: ../manageset.php?update?=fail');
            die();
        }
    }

}else{
    $mysql_conn = null;
    header('Location: ../manageset.php?update=noinput');
    die();
}