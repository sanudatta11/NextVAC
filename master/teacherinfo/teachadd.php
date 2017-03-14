<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 14/3/17
 * Time: 6:51 PM
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
    $_SESSION['error'] = "Internet Not Connected. Didn\'t Add User";
    header('Location: teacherdash.php');
    die();
}

if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['number']) && isset($_POST['cabin']) && isset($_POST['specialisation']) && isset($_POST['username']))
{
   // echo '<script>window.alert("Done")</script>';
    $firstname = preg_replace("/[^A-Za-z ]+/","",$_POST['firstname']);
    $lastname = preg_replace("/[^A-Za-z ]+/","",$_POST['lastname']);
    $email = preg_replace("/[^a-zA-Z0-9@.]+/","",$_POST['email']);
    $number = preg_replace("/[^0-9]+/","",$_POST['number']);
    $cabin = preg_replace("/[^A-Za-z0-9 ]+/","",$_POST['cabin']);
    $specialisation = preg_replace("/[^A-Za-z0-9 ]+/","",$_POST['specialisation']);
    $username = preg_replace("/[^0-9]+/","",$_POST['username']);

    $name = $firstname.' '.$lastname;
    $password = generaterandomstring(10);

    //Generating Random SecretKey For the user. Using
    $secretkey = (string)$username.generaterandomstring(6);

    //Saving the Login DB value
    $conn_obj_add= $mysql_conn->prepare('INSERT INTO nextvac.login (username,password,secretkey,designation) VALUES (?,?,?,?)');
    $conn_obj_add->bindParam(1,$username,PDO::PARAM_INT);
    $conn_obj_add->bindParam(2,$password,PDO::PARAM_STR);
    $conn_obj_add->bindParam(3,$secretkey,PDO::PARAM_STR);
    $conn_obj_add->bindValue(4,'teacher');

    $conn_obj_add->execute();

    //Saving it in the teacherinfo DB
    $conn_obj_add = $mysql_conn->prepare('INSERT INTO nextvac.teacherinfo (secretkey,cabin,name,specialisation) VALUES (?,?,?,?)');
    $conn_obj_add->bindParam(1,$secretkey,PDO::PARAM_STR);
    $conn_obj_add->bindParam(2,$cabin,PDO::PARAM_STR);
    $conn_obj_add->bindParam(3,$name, PDO::PARAM_STR);
    $conn_obj_add->bindParam(4,$specialisation, PDO::PARAM_STR);
    $conn_obj_add->execute();
   // echo '<script>window.alert("Done2")</script>';

    //Saving in Profile DB
    $conn_obj_add= $mysql_conn->prepare('INSERT INTO nextvac.profile (secretkey,propic,designation,email,firstname,lastname,number,gender) VALUES (:seckey,:propic,:desig,:email,:first,:last,:num,:gender)');
    $conn_obj_add->bindParam(':seckey',$secretkey,PDO::PARAM_STR);
    $conn_obj_add->bindValue(':propic','default.jpg');
    $conn_obj_add->bindValue(':desig','teacher');
    $conn_obj_add->bindParam(':email',$email,PDO::PARAM_STR);
    $conn_obj_add->bindParam(':first',$firstname,PDO::PARAM_STR);
    $conn_obj_add->bindParam(':last',$lastname,PDO::PARAM_STR);
    $conn_obj_add->bindParam(':num',$number,PDO::PARAM_INT);

    if(isset($_POST['gender']))
       $gender = preg_replace("/[^0-9]+/", "",$_POST['gender']);
    else
        $gender = 3;
    if(isset($gender) && $gender>=1 && $gender<=2)
        $conn_obj_add->bindParam(':gender',$gender,PDO::PARAM_INT);
    else
        $conn_obj_add->bindValue(':gender',3);

    //echo '<script>window.alert("Done3")</script>';
    $conn_obj_add->execute();
    //echo '<script>window.alert("Done4")</script>';
    //Start Mail here
    if(is_connected())
        sendcreatemail($email,$name,$username,$password);
    else
    {
        $_SESSION['error'] = "Internet Not Connected ! Account not Created!";
        header('Location: teacherdash.php');
        die();
    }

//    echo '<script>window.alert("Done4")</script>';

    $_SESSION['error'] = "Account Created Successfully";
    //Send it wherever you want actually Check for sessionvar and unset it
    header('Location: teacherdash.php');
    die();
}
else{
    $_SESSION['error'] = "Please Fill the form properly";
    header('Location: teacherdash.php');
    die();
}