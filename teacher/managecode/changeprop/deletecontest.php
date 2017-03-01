<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 6/2/17
 * Time: 10:21 PM
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
            $folder_delete = "SELECT * FROM nextvac.codingdb WHERE contestcode = :ccode and secretkey = :seckey";
            $folder_delete_obj = $mysql_conn->prepare($folder_delete);
            $folder_delete_obj->bindParam(':ccode',$code,PDO::PARAM_STR);
            $folder_delete_obj->bindParam(':seckey',$_SESSION['secretkey'],PDO::PARAM_STR);
            $folder_delete_obj->setFetchMode(PDO::FETCH_ASSOC);

            $folder_delete_obj->execute();

            $pre_path = "/var/www/html/teacher/addcode/";
            while($folder_delete_detail = $folder_delete_obj->fetch())
            {
                $sample_folder = $folder_delete_detail['sample'];
                $sample_folder = substr($sample_folder,3);
                shell_exec('rm -rf '.$pre_path.$sample_folder);
            }

            $update_string = "DELETE FROM nextvac.codingdb WHERE contestcode = :ccode and secretkey = :seckey";
            $update_obj = $mysql_conn->prepare($update_string);
            $update_obj->bindParam(':ccode',$code,PDO::PARAM_STR);
            $update_obj->bindParam(':seckey',$_SESSION['secretkey'],PDO::PARAM_STR);

            $update_obj->execute();
            $mysql_conn = null;
            $_SESSION['setupdate'] = "del";
            header('Location: ../status.php?update=success');
            die();
        }else{
            $_SESSION['setupdate'] = false;
            $mysql_conn = null;
            header('Location: ../status.php?update?=fail');
            die();
        }
    }

}else{
    $mysql_conn = null;
    header('Location: ../status.php?update=noinput');
    die();
}