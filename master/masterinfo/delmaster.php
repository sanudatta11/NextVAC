<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 15/3/17
 * Time: 12:40 AM
 */


session_start();

//    Include Database Connetors
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/connector.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/mysql_login.php';

if(isset($_SESSION['secretkey']) && isset($_SESSION['designation']) && $_SESSION['designation'] == 'master' && isset($_GET['username']))
{
    //Verify Master
    $verify_conn = $mysql_conn->prepare('SELECT * FROM nextvac.login WHERE secretkey = :seckey AND designation = "master"');
    $verify_conn->bindParam(':seckey',$_SESSION['secretkey']);
    $verify_conn->execute();

    if($verify_conn->rowCount() > 0)
    {
        //Authorized
    }
    else{
        //Now go back Asshole u are unauthorized
        unset($_SESSION);
        session_abort();
        session_destroy();
        header('Location: ../../index.php');
        die();
    }


    //End of verify master

    $del_conn_obj = $mysql_conn->prepare('SELECT * FROM nextvac.login WHERE username = :username LIMIT 1');
    $username = preg_replace("/[^0-9]+/", "",$_GET['username']);
    $del_conn_obj->bindParam(':username',$username);
    $del_conn_obj->execute();
    $del_conn_obj->setFetchMode(PDO::FETCH_ASSOC);
    if($del_conn_obj->rowCount() > 0)
    {
        //Getting the Secret Key as its all in mY Db
        $del_conn_data = $del_conn_obj->fetch();
        $seckey = $del_conn_data['secretkey'];

        $del_conn_obj = $mysql_conn->prepare('DELETE FROM nextvac.login WHERE secretkey = :seckey LIMIT 1');
        $del_conn_obj->bindParam(':seckey',$seckey);
        $del_conn_obj->execute();

        $del_conn_obj = $mysql_conn->prepare('DELETE FROM nextvac.masterdb WHERE secretkey = :seckey');
        $del_conn_obj->bindParam(':seckey',$seckey);
        $del_conn_obj->execute();

        //Done
        $_SESSION['error'] = "Account Deleted Successfully!";
        header('Location: masterdelete.php?delete=success');
        die();
    }
    else{
        //Wrong Username
        $_SESSION['error'] = "UserID entered is incorrect!";
        header('Location: masterdelete.php?username=incorrect');
        die();
    }
}
else{
    $_SESSION['error'] = "No Credentials input or Auth Error!";
    header('Location: masterdelete.php');
    die();
}