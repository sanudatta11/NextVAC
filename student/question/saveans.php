<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 25/1/17
 * Time: 3:19 PM
 */

session_start();
unset($_SESSION['submitauth']);
//    Include Database Connetors
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/connector.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/mysql_login.php';

if(isset($_SESSION['secretkey'])&& $_SESSION['designation']=='student')
{
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

    if(isset($_POST))
    {

        foreach ($_POST as $name => $val)
        {
           // echo htmlspecialchars($name . ': ' . $val) . "\n";

            //        Ques Part
            $quescode = preg_replace("/[^A-Za-z0-9]+/","",$_SESSION['quescode']);
            $codeid = preg_replace("/[^0-9]+/", "", $name);
            $ques_string = "SELECT * FROM nextvac.questiondb WHERE code = :quescode AND codeid = :codeid LIMIT 1";
            $quesdb_obj = $mysql_conn->prepare($ques_string);

            $quesdb_obj->bindParam(':quescode', $quescode, PDO::PARAM_STR);
            $quesdb_obj->bindParam(':codeid', $codeid, PDO::PARAM_INT);

            $quesdb_obj->execute();
            $quesdb_obj->setFetchMode(PDO::FETCH_ASSOC);
            $ques_details = $quesdb_obj->fetch();

            if ($ques_details['status'] == 0)
            {
                echo "Fuckkk";
                die();
                continue;
            }


            //Test if already answered or not!
            $test_string = "SELECT * FROM nextvac.answersdb WHERE secretkey = :seckey AND quescode = :quescode AND codeid = :codeid LIMIT 1";
            $test_obj = $mysql_conn->prepare($test_string);
            $test_obj->bindParam(':seckey',$_SESSION['secretkey'],PDO::PARAM_STR);
            $test_obj->bindParam(':quescode',$quescode,PDO::PARAM_STR);
            $test_obj->bindParam(':codeid',$codeid,PDO::PARAM_STR);

            $test_obj->execute();

            if($test_obj->rowCount() > 0)
            {
                //Already Answered
                continue;
            }


            //        Answer Part
            $ans_string = "INSERT INTO nextvac.answersdb (secretkey,section,quescode,codeid,answer,verdict) VALUES(?,?,?,?,?,?)";
            $ans_obj = $mysql_conn->prepare($ans_string);
            $ans_obj->bindParam(1,$_SESSION['secretkey'],PDO::PARAM_STR);
            $ans_obj->bindParam(2,$_SESSION['section'],PDO::PARAM_STR);
            $ans_obj->bindParam(3,$quescode,PDO::PARAM_STR);
            $ans_obj->bindParam(4,$codeid,PDO::PARAM_STR);
            $ans_obj->bindParam(5,$ques_details['correct'],PDO::PARAM_INT);

            if($ques_details['correct'] == $val)
            {
                $ans_obj->bindValue(6, 1, PDO::PARAM_INT);
            }else{
                $ans_obj->bindValue(6, 0, PDO::PARAM_INT);
            }

            $ans_obj->execute();
            $_SESSION['quesans'] = true;
            header('Location: quespage.php?attempted=' . $codeid . '&hashsec=4JJq9q9');
            die();
        }
        header('Location: quespage.php');
        die();
    }
    else{

    }
}
else{
    $_SESSION['relogin'] = true;
    header('Location: ../../index.php?attempt=relogin');
    die();
}




//Below
