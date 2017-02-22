<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 24/1/17
 * Time: 12:46 PM
 */
session_start();

unset($_SESSION['showkey']);
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/connector.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/mysql_login.php';

//Validating Teacher with correct credentials

if(!(isset($_SESSION['secretkey']) && $_SESSION['designation'] == 'teacher'))
{
    session_unset();
    session_destroy();
    session_start();
    $_SESSION['relogin'] = true;
    header('Location: ../../index.php?attempt=relogin');
    die();
}

if(!(isset($_POST['roomno'])))
{
    header('Location: room.php');
    die();
}
else{
    $room = preg_replace("/[^A-Za-z-0-9]+/","",$_POST['roomno']);

    $query_string = "SELECT ipkey,section from nextvac.ipconnect WHERE roomno = :room LIMIT 1";

    $query = $mysql_conn->prepare($query_string);
    $query->bindParam(':room', $room);

    $query->execute();

    $query->setFetchMode(PDO::FETCH_ASSOC);

    $room_detail = $query->fetch();

    //Testing is the section same as its allocated to the teacher
    //See if section is allocated to the teacher
    $class_string = 'SELECT section FROM nextvac.classallocate WHERE secretkey = :seckey AND section = :section LIMIT 1';
    $class = $mysql_conn->prepare($class_string);
    $class->bindParam(':seckey',$_SESSION['secretkey'],PDO::PARAM_STR);
    $class->bindParam(':section',$room_detail['section'],PDO::PARAM_STR);
    $class->execute();
    $class->setFetchMode(PDO::FETCH_ASSOC);

    $data_section_out = $query->fetch();


    if($query->rowCount() > 0)
    {

        if($class->rowCount() > 0){
            $_SESSION['showkey'] = $room_detail['ipkey'];
            header('Location: room.php');
            die();
        }
        else{
            $_SESSION['iperror'] = true;
            $_SESSION['ipmessage'] = "You are not authorized for the section!";
            header('Location: room.php');
            die();
        }
    }
    else{

        $_SESSION['iperror'] = true;
        $_SESSION['ipmessage'] = "We couldn't find the room";
        header('Location: room.php');
        die();
    }

}
