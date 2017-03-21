<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 14/3/17
 * Time: 6:52 PM
 */

session_start();

//    Include Database Connetors
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/connector.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/mysql_login.php';

if(isset($_SESSION['secretkey']) && isset($_SESSION['designation']) && $_SESSION['designation'] == 'master' && isset($_GET['username']))
{
    //Verify Master
    $verify_conn = $mysql_conn->prepare('SELECT * FROM nextvac.login WHERE secretkey = :seckey AND designation = "master" AND sessionvar = :sesvar');
    $verify_conn->bindParam(':seckey',$_SESSION['secretkey']);
    $verify_conn->bindParam(':sesvar', session_id(), PDO::PARAM_STR);
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

        $del_conn_obj = $mysql_conn->prepare('DELETE FROM nextvac.teacherinfo WHERE secretkey = :seckey LIMIT 1');
        $del_conn_obj->bindParam(':seckey',$seckey);
        $del_conn_obj->execute();

        //Save the Picture Info
        $picture_obj = $mysql_conn->prepare('SELECT * FROM nextvac.profile WHERE secretkey = :seckey LIMIT 1');
        $picture_obj->bindParam(':seckey',$seckey);
        $picture_obj->execute();
        $picture_obj->setFetchMode(PDO::FETCH_ASSOC);

        if($picture_obj->rowCount() > 0)
        {
            $picture_data = $picture_obj->fetch();
            $propic = $picture_data['propic'];
            //Can delete cover pic too later
            if($propic!='default.jpg' && $propic!='male.jpg'&& $propic!='female.jpg')
                unlink('../../student/profile/images/'.$propic);
        }else{
            //Something is fishy under
            $_SESSION['error'] = "Sorry Something Went Wrong!";
            header('Location: teacherdelete.php');
            die();
        }

        $del_conn_obj = $mysql_conn->prepare('DELETE FROM nextvac.profile WHERE secretkey = :seckey');
        $del_conn_obj->bindParam(':seckey',$seckey);
        $del_conn_obj->execute();

        //Delete Supplementary datas like code results and all below

//        $supp_obj = $mysql_conn->prepare('DELETE FROM nextvac.coderesults WHERE secretkey = :seckey');
//        $supp_obj->bindParam(':seckey',$seckey);
//        $supp_obj->execute();

        $supp_obj = $mysql_conn->prepare('DELETE FROM nextvac.classallocate WHERE secretkey = :seckey');
        $supp_obj->bindParam(':seckey',$seckey);
        $supp_obj->execute();

        $supp_obj = $mysql_conn->prepare('DELETE FROM nextvac.questiondb WHERE secretkey = :seckey');
        $supp_obj->bindParam(':seckey',$seckey);
        $supp_obj->execute();

        //Done
        $_SESSION['error'] = "Account Deleted Successfully!";
        header('Location: teacherdelete.php?delete=success');
        die();
    }
    else{
        //Wrong Username
        $_SESSION['error'] = "UserID entered is incorrect!";
        header('Location: teacherdelete.php?username=incorrect');
        die();
    }
}
else{
    $_SESSION['error'] = "No Credentials input or Auth Error!";
    header('Location: teacherdelete.php');
    die();
}