<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 6/2/17
 * Time: 10:09 PM
 */

//Stuxnet potty in the backend and I dont interfere in the frontend
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/teacher/validate.php';

if(isset($_GET['ccode']))
{
    $ccode = preg_replace("/[^A-Za-z0-9]+/","",$_GET['ccode']);

    $code_search_string = "SELECT * FROM nextvac.codingdb WHERE contestcode = :ccode AND secretkey = :seckey ORDER BY problemcode";
    $code_search_obj = $mysql_conn->prepare($code_search_string);
    $code_search_obj->bindParam(':ccode',$ccode,PDO::PARAM_STR);
    $code_search_obj->bindParam(':seckey',$_SESSION['secretkey'],PDO::PARAM_STR);

    $code_search_obj->execute();

    if($code_search_obj->rowCount() > 0)
    {
        //Authorized show now
        //Add it when the frontend is  completed by bisso and mr hackdev
    }
    else{
        $_SESSION['mauth'] = true;
        header('Location: ../managecode/status.php?code=unauth');
        die();
    }
}

//No ccode
header('Location: ../dashboard.php');
die();