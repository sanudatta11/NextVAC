<?php
session_start();
/**
 * Created by PhpStorm.
 * User: root
 * Date: 21/1/17
 * Time: 1:25 AM
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/connector.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/mysql_login.php';

if(isset($_SESSION['secretkey']))
{
    $sqlquery_string = "SELECT sessionvar FROM nextvac.login WHERE secretkey = :secretkeyparam";
    $sql_res = $mysql_conn->prepare($sqlquery_string);
    $sql_res->bindParam(':secretkeyparam',$_SESSION['secretkey'],PDO::PARAM_STR);//Change the parameter type here for more versatility
    $sql_res->execute();
    $sql_res->setFetchMode(PDO::FETCH_ASSOC);
    while($row = $sql_res->fetch())
    {
        if($row['sessionvar'] == session_id())
        {
            //Now Redirect to the DashBoard of respective one
            if($_SESSION['designation'] == 'master')
            {
                header('Location: master/index.php');
                die();
            }
            else if($_SESSION['designation'] == 'student')
            {
                header('Location: student/dashboard.php');
                die();
            }
            else if($_SESSION['designation'] == 'teacher')
            {
                header('Location: teacher/dashboard.php');
                die();
            }else{
                die();
            }
            //Must Use Die Script Below
        }
        else{
            $mysql_conn = null;
            //Not Same so through this asshole back to Index
            session_unset();
            session_destroy();
            session_start();
            $_SESSION['logout'] = 'logout';
            header('Location:index.php?attempt=logout');
            die();
        }
    }

    //No Session Var present so throw the user to Sign In Page
    $mysql_conn = null;
    session_unset();
    session_destroy();
    session_start();
    $_SESSION['logout'] = 'logout';
    header('Location:index.php?attempt=logout');
}
else{
    unset($_SESSION);
    session_destroy();
    session_unset();
    session_start();
    $_SESSION['relogin']=true;
    header('Location:index.php?attempt=relogin');
    die();
}
$mysql_conn = null;


?>