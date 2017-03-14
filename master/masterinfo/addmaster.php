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

require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

//Including the Random Generator
require_once $_SERVER['DOCUMENT_ROOT'].'/dependencies/randomize/randomstring.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/dependencies/accountcreate/mailandint.php';

if(!is_connected())
{
    $_SESSION['error'] = "Internet Not Connected. Didn\'t Add Master";
    header('Location: masterdash.php');
    die();
}

if(isset($_POST['username']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']))
{
    $username = preg_replace("/[^a-zA-Z0-9@.]+/","",$_POST['username']);
    $firstname = preg_replace("/[^A-Za-z ]+/","",$_POST['firstname']);
    $lastname = preg_replace("/[^A-Za-z ]+/","",$_POST['lastname']);
    $email = preg_replace("/[^a-zA-Z0-9@.]+/","",$_POST['email']);

    $name = $firstname.' '.$lastname;
    $password = generaterandomstring(10);

    //Generating Random SecretKey For the user. Using
    $secretkey = (string)$username.generaterandomstring(6);

    //Saving the Login DB value
    $conn_obj_add= $mysql_conn->prepare('INSERT INTO nextvac.login (username,password,secretkey,designation) VALUES (?,?,?,?)');
    $conn_obj_add->bindParam(1,$username,PDO::PARAM_INT);
    $conn_obj_add->bindParam(2,$password,PDO::PARAM_STR);
    $conn_obj_add->bindParam(3,$secretkey,PDO::PARAM_STR);
    $conn_obj_add->bindValue(4,'master');

    if(is_connected())
        $conn_obj_add->execute();
    else{
        $_SESSION['error'] = "Internet Not Connected ! Account not Created!";
        header('Location: masterdash.php');
        die();
    }
    //Saving the Master DB value
    $conn_obj_add= $mysql_conn->prepare('INSERT INTO nextvac.masterdb (secretkey,firstname,lastname,email) VALUES (?,?,?,?)');
    $conn_obj_add->bindParam(1,$secretkey,PDO::PARAM_STR);
    $conn_obj_add->bindParam(2,$firstname,PDO::PARAM_STR);
    $conn_obj_add->bindParam(3,$firstname,PDO::PARAM_STR);
    $conn_obj_add->bindParam(4,$email,PDO::PARAM_STR);

    if(is_connected())
    {
        $conn_obj_add->execute();
        sendcreatemail($email,$name,$username,$password);
    }
    else
    {
        $_SESSION['error'] = "Internet Not Connected ! Account not Created!";
        header('Location: masterdash.php');
        die();
    }
    $_SESSION['error'] = "Master Account Created!";
    header('Location: masterdash.php');
    die();
}
else{
    $_SESSION['error']  = "Data Incomplete!";
    header('Location: masterdash.php');
    die();
}