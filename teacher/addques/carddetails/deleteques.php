<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 26/1/17
 * Time: 11:53 AM
 */
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/connector.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/mysql_login.php';

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

if(isset($_GET['code']) && isset($_GET['id']))
{
    //Check if code and id actually exits for the teacher or not
    $get_code = preg_replace("/[^A-Za-z0-9]+/","",$_GET['code']);
    $get_id = preg_replace("/[^0-9]+/","",$_GET['id']);
    $verify_string = "SELECT * FROM nextvac.questiondb WHERE code = :quescode AND secretkey = :seckey AND codeid = :codeid";
    $verify_obj = $mysql_conn->prepare($verify_string);

    $verify_obj->bindParam(':quescode',$get_code,PDO::PARAM_STR);
    $verify_obj->bindParam(':seckey',$_SESSION['secretkey'],PDO::PARAM_STR);
    $verify_obj->bindParam(':codeid',$get_id,PDO::PARAM_INT);

    $verify_obj->execute();

    if($verify_obj->rowCount() > 0)
    {
        $delete_string = "DELETE FROM nextvac.questiondb WHERE secretkey = :seckey AND code = :quescode AND codeid = :codeid";
        $delete_obj = $mysql_conn->prepare($delete_string);
        $delete_obj->bindParam(':seckey',$_SESSION['secretkey'],PDO::PARAM_STR);
        $delete_obj->bindParam(':quescode',$get_code,PDO::PARAM_STR);
        $delete_obj->bindParam(':codeid',$get_id,PDO::PARAM_INT);

        $delete_obj->execute();

        $_SESSION['quescode'] = $get_code;

        $_SESSION['deletedone'] = true;
        $mysql_conn = null;
        header('Location: carddetail.php');
        die();
    }else{
        //Throw this bastard out of the page
        $mysql_conn = null;
        $_SESSION['deletedone'] = false;
        header('Location: carddetail.php');
        die();
    }

}
else{
    //Redirect to carddetail page
    $mysql_conn = null;
    header('Location: carddetail.php');
    die();
}