<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 17/3/17
 * Time: 8:41 PM
 */
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/dependencies/randomize/randomstring.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/dependencies/accountcreate/mailandint.php';

//    Include Database Connetors
require_once $_SERVER['DOCUMENT_ROOT'] . '/confidential/connector.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/confidential/mysql_login.php';

if(isset($_SESSION['secretkey']) && isset($_SESSION['designation']) && $_SESSION['designation'] == 'master' && isset($_POST['emails']))
{

    $emails = $_POST['emails'];

    $generate_code_string = "SELECT * FROM nextvac.uniquecreate WHERE uniqueid = :uid";
    $generate_code = $mysql_conn->prepare($generate_code_string);

    $code_array = array();

    foreach ($emails as $email)
    {
        unset($new_code);
        do{
            $new_code = generaterandomstring(10);
            $generate_code->bindParam(':uid',$new_code);
            $generate_code->setFetchMode(PDO::FETCH_ASSOC);
            $generate_code->execute();
        }while($generate_code->rowCount() > 0);
        array_push($code_array,$new_code);

    }


    $counter = 0;
    foreach ($emails as $email)
    {
        $uid = $code_array[$counter];
        if(is_connected())
        {
            $ip = "localhost";
            uniqueidmail($email,$uid);
        }
        else{
            $_SERVER['error'] = "Sorry Internet Not Connected! Cannot Add Accounts";
            header('Location: massadd.php');
            die();
        }
        $counter++;
    }

    foreach ($code_array as $item) {
        $insert_string  = "INSERT INTO nextvac.uniquecreate (uniqueid) VALUES (?)";
        $insert_obj = $mysql_conn->prepare($insert_string);
        $insert_obj->bindParam(1,$item,PDO::PARAM_STR);
        $insert_obj->execute();
    }

    $_SESSION['error'] = "All Accounts Created and mailed!";
    header('Location: massadd.php');
    die();
}
else{
    header('Location: ../../../index.php');
    die();
}