<?php
/*
 * Created by PhpStorm.
 * User: root
 * Date: 22/1/17
 * Time: 6:31 PM
 */

/*The form will come from addfinal as post value with the name of form as addques
  The question will be in name of question. The options are in name of opt1 ,opt2,
  opt3, opt4 . The correct ans will be in name correct and value range from 1 to 4
  depending on answer.
*/

session_start();

//    Include Database Connetors
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/connector.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/mysql_login.php';

//Validate
require_once $_SERVER['DOCUMENT_ROOT'].'/teacher/validate.php';

if($_SESSION['authorize'] == true && isset($_SESSION['ques_section']) && isset($_SESSION['ques_code']))
{
//Nothing
}
else
{
    $_SESSION['error'] = 'unauthorizedsubmit';
    header('Location: addstaging.php');
    die();
}

if(isset($_POST['question']) && isset($_POST['opt1']) && isset($_POST['opt2']) && isset($_POST['opt3']) && isset($_POST['opt4']) && isset($_POST['correct']))
{
    $seckey = preg_replace("/[^A-Za-z0-9]+/","",$_SESSION['secretkey']);
    $section = preg_replace("/[^A-Za-z0-9]+/","",$_SESSION['ques_section']);
    $code = preg_replace("/[^A-Za-z0-9]+/","",$_SESSION['ques_code']);
    $question = $_POST['question'];
    $opt1 = $_POST['opt1'];
    $opt2 = $_POST['opt2'];
    $opt3 = $_POST['opt3'];
    $opt4 = $_POST['opt4'];
    $correct = intval($_POST['correct']);
    $status = 0;

    //Checking if Question already there or not

    $check_before_string = "SELECT * FROM nextvac.questiondb WHERE code = :checkcode AND question = :cques";
    $check_before =$mysql_conn->prepare($check_before_string);
    $check_before->bindParam(':checkcode',$code);
    $check_before->bindParam(':cques',$question);

    $check_before->execute();

    if($check_before->rowCount() > 0)
    {
        $_SESSION['authorize'] = false;
        $_SESSION['error'] = "duplicate";
        $mysql_conn = null;
        header('Location: addfinal.php');
        die();
    }


    //Finding the Max code id
    $code_id_string = "SELECT MAX(codeid) as max FROM nextvac.questiondb WHERE code = :quescode AND secretkey = :seckey";
    $code_obj = $mysql_conn->prepare($code_id_string);
    $code_obj->bindParam(':quescode',$code);
    $code_obj->bindParam(':seckey',$seckey);

    $code_obj->execute();
    $code_obj->setFetchMode(PDO::FETCH_ASSOC);
    $max_code_id = 0;
    $code_detail = $code_obj->fetch();
    if(empty($code_detail['max']))
    {
        $max_code_id = 1;
    }
    else
    {
        $max_code_id = $code_detail['max'];
        $max_code_id++;
    }

    //Adding Question
    $new_conn_obj = $mysql_conn->prepare("INSERT INTO nextvac.questiondb (secretkey,code,codeid,section,question,first,second,third,fourth,correct,status) VALUES (?,?,?,?,?,?,?,?,?,?,?)");

    $new_conn_obj->bindParam(1,$seckey,PDO::PARAM_STR);
    $new_conn_obj->bindParam(2,$code,PDO::PARAM_STR);
    $new_conn_obj->bindParam(3,$max_code_id,PDO::PARAM_STR);
    $new_conn_obj->bindParam(4,$section,PDO::PARAM_STR);
    $new_conn_obj->bindParam(5,$question,PDO::PARAM_STR);
    $new_conn_obj->bindParam(6,$opt1,PDO::PARAM_STR);
    $new_conn_obj->bindParam(7,$opt2,PDO::PARAM_STR);
    $new_conn_obj->bindParam(8,$opt3,PDO::PARAM_STR);
    $new_conn_obj->bindParam(9,$opt4,PDO::PARAM_STR);
    $new_conn_obj->bindParam(10,$correct,PDO::PARAM_INT);
    $new_conn_obj->bindValue(11,0);

    $new_conn_obj->execute();

    $_SESSION['authorize'] =false;
    $_SESSION['add'] = true;
    $_SESSION['ques_validate'] = true;
    $mysql_conn = null;
    header('Location: addfinal.php');
    //echo $_SESSION['ques_code'];
    //echo $_SESSION['ques_section'];
    die();
}
else{
    unset($_SESSION['ques_validate']);
    header('Location: addstaging.php');
    die();
}
?>