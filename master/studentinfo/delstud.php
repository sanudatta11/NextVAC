<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/3/17
 * Time: 1:19 AM
 */

session_start();

//    Include Database Connetors
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/connector.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/mysql_login.php';


$check_session_var_string = "SELECT * FROM nextvac.login WHERE secretkey = :seckey AND sessionvar = :sesvar AND designation = :desig";
$check_session_var = $mysql_conn->prepare($check_session_var_string);
$check_session_var->bindParam(':seckey', $_SESSION['secretkey'], PDO::PARAM_STR);
$check_session_var->bindParam(':sesvar', session_id(), PDO::PARAM_STR);
$check_session_var->bindParam(':desig', $_SESSION['designation'], PDO::PARAM_STR);
$check_session_var->execute();

if ($check_session_var->rowCount() > 0) {

} else {
    header('Location: ../../logout.php');
    die();
}

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
//    echo 'f1';
    if($del_conn_obj->rowCount() > 0)
    {
        //Getting the Secret Key as its all in mY Db
        $del_conn_data = $del_conn_obj->fetch();
        $seckey = $del_conn_data['secretkey'];

        $del_conn_obj = $mysql_conn->prepare('DELETE FROM nextvac.login WHERE secretkey = :seckey LIMIT 1');
        $del_conn_obj->bindParam(':seckey',$seckey);
        $del_conn_obj->execute();
//        echo 'f2';
        $del_conn_obj = $mysql_conn->prepare('DELETE FROM nextvac.studentinfo WHERE secretkey = :seckey LIMIT 1');
        $del_conn_obj->bindParam(':seckey',$seckey);
        $del_conn_obj->execute();
//        echo 'f3';
        //Save the Picture Info
        $picture_obj = $mysql_conn->prepare('SELECT * FROM nextvac.profile WHERE secretkey = :seckey LIMIT 1');
        $picture_obj->bindParam(':seckey',$seckey);
        $picture_obj->execute();
        $picture_obj->setFetchMode(PDO::FETCH_ASSOC);
//        echo 'f4';

        if($picture_obj->rowCount() > 0)
        {
            $picture_data = $picture_obj->fetch();
            $propic = $picture_data['propic'];
            //Can delete cover pic too later
            if($propic!='default.jpg'&& $propic!='male.jpg'&& $propic!='female.jpg')
                unlink('../../student/profile/images/'.$propic);
        }else{
            //Something is fishy under
            echo 'dead';
            die();
        }
        //echo 'f5';

        $del_conn_obj = $mysql_conn->prepare('DELETE FROM nextvac.profile WHERE secretkey = :seckey');
        $del_conn_obj->bindParam(':seckey',$seckey);
        $del_conn_obj->execute();

        //echo 'f6';
        //Delete Supplementary datas like code results and all below

//        $supp_obj = $mysql_conn->prepare('DELETE FROM nextvac.coderesults WHERE secretkey = :seckey');
//        $supp_obj->bindParam(':seckey',$seckey);
//        $supp_obj->execute();

        //echo 'f7';

        $supp_obj = $mysql_conn->prepare('DELETE FROM nextvac.answersdb WHERE secretkey = :seckey');
        $supp_obj->bindParam(':seckey',$seckey);
        $supp_obj->execute();

       // echo 'f8';

        //Done
        $_SESSION['donedelete'] = true;
        header('Location: studdelete.php?delete=success');
        die();
    }
    else{
        //Wrong Username
        $_SESSION['wronguser'] = true;
        header('Location: studdelete.php?username=incorrect');
        die();
    }
}
else{
    header('Location: ../index.php');
    die();
}