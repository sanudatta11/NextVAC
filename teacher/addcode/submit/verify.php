<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/2/17
 * Time: 11:40 AM
 */

/*
 * ccode = Challenge Code
 * section = Entered Section
 * */

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
if(isset($_SESSION['csection']) && isset($_SESSION['ccode']) && isset($_SESSION['cname']))
{
    header('Location :../addcode.php');
    die();
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/confidential/connector.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/confidential/mysql_login.php';

if(isset($_POST['section']) && isset($_POST['ccode']))
{
    //Do nothing
}
else
{
    header('Location: ../adddetail.php');
    die();
}

$section = preg_replace('/[^A-Za-z0-9]+/','',$_POST['section']);
$contest_code = preg_replace('/[^A-Za-z0-9]+/','',$_POST['ccode']);

//See if the code is taken and if it is , then is it same teacher or different.
//See if section is allocated to the teacher
$query_string = 'SELECT section FROM nextvac.classallocate WHERE secretkey = :seckey AND section = :section LIMIT 1';
$query = $mysql_conn->prepare($query_string);
$query->bindParam(':seckey',$_SESSION['secretkey'],PDO::PARAM_STR);
$query->bindParam(':section',$section,PDO::PARAM_STR);
$query->execute();

if($query->rowCount() > 0)
{
    //Semi Authorized
    $code_search_string = "SELECT * FROM nextvac.codingdb WHERE secretkey != :seckey AND contestcode = :ccode LIMIT 1";
    $code_search = $mysql_conn->prepare($code_search_string);
    $code_search->bindParam(':seckey',$_SESSION['secretkey'],PDO::PARAM_STR);
    $code_search->bindParam(':ccode',$contest_code,PDO::PARAM_STR);
    $code_search->execute();

    if($code_search->rowCount() > 0)
    {
        //Return telling Code already taken
        $_SESSION['ccode'] = 'taken';
        header('Location: ../adddetail.php?code=taken');
        die();
    }
    else
    {
        //Code not taken
        // Authorized now go forward
        $_SESSION['csection'] = $section;
        $_SESSION['ccode'] = $contest_code;
        $_SESSION['cname'] = preg_replace("/[^0-9a-zA-Z ]/", "", $_POST['cname']);
        header('Location: ../addcode.php');
        die();
    }
}
else
{
    //Doesn't teach class
    $_SESSION['ccode'] = 'invalid';
    header('Location: ../adddetail.php?code=wrongsection');
    die();
}



