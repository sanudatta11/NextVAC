<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 13/3/17
 * Time: 10:36 PM
 */


session_start();
unset($_SESSION['submitauth']);

if (isset($_SESSION['secretkey']) && $_SESSION['designation'] == 'teacher')
{
    //Authorized Personnel here Give Respect

} else if (isset($_SESSION['secretkey']) && $_SESSION['designation'] == 'student')
{
    //Teacher go to your Dashboard dont Roam Around
    header('Location: ../../student/dashboard.php');
    die();
}
else{
    //No Secret key? No Dashboard Fuck Off
    $_SESSION['relogin'] = true;
    header('Location: ../../index.php?attempt=relogin');
    die();
}

//    Include Database Connetors
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/connector.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/mysql_login.php';

//Query For Student info
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


if(isset($_POST['pass1']) && isset($_POST['pass2']) && isset($_POST['prevpass']))
{
    $propic_profile_string ="SELECT password FROM nextvac.login WHERE secretkey = :seckey LIMIT 1";
    $propic_profile = $mysql_conn->prepare($propic_profile_string);
    $propic_profile->bindParam(':seckey',$_SESSION['secretkey']);
    $propic_profile->execute();
    $propic_profile->setFetchMode(PDO::FETCH_ASSOC);
    $check_prev = $propic_profile->fetch();

    if($check_prev['password'] == $_POST['prevpass'])
    {

    }
    else{
        //Go Back
        $_SESSION['profileerror'] = "Sorry the Old Password was incorrect!";
        header('Location: ../profile/view.php');
        die();
    }

    if($_POST['pass1'] == $_POST['pass2'])
    {
        $pass = $_POST['pass1'];

        $change_profile_string = "UPDATE nextvac.login SET password = :pass WHERE secretkey = :seckey";
        $change_profile = $mysql_conn->prepare($change_profile_string);
        //Picture change to be during upload
        $change_profile->bindParam(':seckey',$_SESSION['secretkey'],PDO::PARAM_STR);
        $change_profile->bindParam(':pass',$pass,PDO::PARAM_STR);
        $change_profile->execute();
        $_SESSION['profileerror'] = "Password Updated Successfully!";
        header('Location: ../profile/view.php');
        die();
    }else{
        $_SESSION['profileerror'] = "Passwords didn't Matched!";
        header('Location: ../profile/view.php');
        die();
    }
}
else{
    header('Location: ../profile/view.php');
    die();
}