<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 24/1/17
 * Time: 12:42 AM
 */
session_start();
unset($_SESSION['submitauth']);

require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/connector.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/mysql_login.php';

require_once $_SERVER['DOCUMENT_ROOT'].'/student/validate.php';
if(!(isset($_SESSION['authback']) &&  $_SESSION['authback'] == true))
{
    header('Location:ipsub.php');
    $mysql_conn = null;
    die();
}

$find_student_info_string = "SELECT sessionvar FROM nextvac.login WHERE secretkey = :seckey AND sessionvar = :sessvar LIMIT 1";
$infoquery = $mysql_conn->prepare($find_student_info_string);
$infoquery->bindParam(':seckey',$_SESSION['secretkey']);
$infoquery->bindParam(':sessvar',session_id());
$infoquery->execute();
if($infoquery->rowCount() >0)
{

}else{
    $_SESSION['relogin'] = true;
    header('Location: ../../index.php?attempt=relogin');
    die();
}



if(isset($_POST['ipkey']))
{
    $ip_key = preg_replace("/[^A-Za-z0-9]+/","",$_POST['ipkey']);

      $ipcon_string = "SELECT * FROM nextvac.ipconnect WHERE section = :section LIMIT 40";      //Limiting maximum query output
      $ipcon = $mysql_conn->prepare($ipcon_string);
      $ipcon->bindParam(':section',$_SESSION['section'],PDO::PARAM_STR);

      $ipcon->execute();
      $ipcon->setFetchMode(PDO::FETCH_ASSOC);

      while($data = $ipcon->fetch()){
          if($data['ipkey'] == $ip_key){
                                                //Authenticate the user with ip address and send forward
                  $_SESSION['found'] = true;
                  $_SESSION['ipaddr'] = $data['ipaddress'];
                  $mysql_conn = null;
                  header('Location: ipvideo.php');
                  die();
          }

      }
      $_SESSION['found'] = false;
      $mysql_conn = null;
      header('Location: vidkeysub.php');         //Send this person  back to ip giving page with false flag
      die();
}
else{
    $_SESSION['found'] = 'empty';
    $mysql_conn = null;
    header('Location: vidkeysub.php');
    die();
}
