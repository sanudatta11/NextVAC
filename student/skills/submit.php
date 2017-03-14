<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 14/3/17
 * Time: 1:21 PM
 */
session_start();


//    Include Database Connetors
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/connector.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/mysql_login.php';

/*
 * The Skill Name will be a string and the skilllevel will be a number out of 4 where
 * 1-Beginner
 * 2-Intermediate
 * 3-Expert
 * 4-Extreme
 * */


if(isset($_SESSION['secretkey'])&& $_SESSION['designation'] == 'student' && isset($_POST['skillname']) && isset($_POST['skilllevel'])) {
    $data_out = array();
    $skillname = preg_replace("/[^A-Z0-9]+/", "",$_POST['skillname']);


    $check_string = "SELECT * FROM nextvac.defaultskill WHERE skillname = :sname";
    $check_obj = $mysql_conn->prepare($check_string);
    $check_obj->bindParam(':sname',$skillname);
    $check_obj->execute();

    if($check_obj->rowCount() > 0)
    {
        //Data Found add to the skill db with no adue
        $check_obj->setFetchMode(PDO::FETCH_ASSOC);
        $check_obj_data  = $check_obj->fetch();

        $hash_to_check = $check_obj_data['skillhash'];

        $second_skill_check_string = "SELECT * FROM nextvac.skilldb WHERE secretkey = :seckey AND skillhash = :shash";
        $second_skill_check = $mysql_conn->prepare($second_skill_check_string);
        $second_skill_check->bindParam(':seckey',$_SESSION['secretkey']);
        $second_skill_check->bindParam(':shash',$hash_to_check);
        $second_skill_check->execute();

        if($second_skill_check->rowCount() > 0)
        {
            //Already There bro just tell it to him
            $data_out['alreadyin'] = true;
            echo json_encode($data_out);
            die();
        }
        else {
            if ($_POST['skilllevel'] <= 4 && $_POST['skilllevel'] > 0) {
                //Do Nothing
            } else {
                //Something is totally fishy
                $data_out['error'] = "Sorry Wrong Skill Level Selected";
                echo json_encode($data_out);
                die();
            }

            unset($hash);
            //Generate new skill hash
            $hash = md5($skillname);
            //Add the data to skilldb
            $insert_default_string = "INSERT INTO nextvac.skilldb (secretkey,skillname,skillhash,level) VALUES (:seckey,:sname,:shash,:slevel)";
            $insert_default_obj = $mysql_conn->prepare($insert_default_string);
            $insert_default_obj->bindParam(':seckey', $_SESSION['secretkey'], PDO::PARAM_STR);
            $insert_default_obj->bindParam(':sname', $skillname, PDO::PARAM_STR);
            $insert_default_obj->bindParam(':shash', $hash, PDO::PARAM_STR);
            $insert_default_obj->bindParam(':slevel', $_POST['skilllevel'], PDO::PARAM_INT);
            $insert_default_obj->execute();

            $data_out['success'] = true;
            echo json_encode($data_out);
            die();
        }
    }
    else{
        //No Previous Data Present Stage it now to default skill with zero asset and save it in skill db
        //Do Check allways before showing the skill that are they active or not in the default skilldb so that the admin can
        //Disable the main skill or not. For the main usage of the students

        if ($_POST['skilllevel'] <= 4 && $_POST['skilllevel'] > 0) {
            //Do Nothing
        } else {
            //Something is totally fishy
            $data_out['error'] = "Sorry Wrong Skill Level Selected";
            echo json_encode($data_out);
            die();
        }

        unset($hash);
        //Generate new skill hash
        $hash = md5($skillname);
        //Add the data to skilldb
        $insert_default_string = "INSERT INTO nextvac.skilldb (secretkey,skillname,skillhash,level) VALUES (:seckey,:sname,:shash,:slevel)";
        $insert_default_obj = $mysql_conn->prepare($insert_default_string);
        $insert_default_obj->bindParam(':seckey', $_SESSION['secretkey'], PDO::PARAM_STR);
        $insert_default_obj->bindParam(':sname', $skillname, PDO::PARAM_STR);
        $insert_default_obj->bindParam(':shash', $hash, PDO::PARAM_STR);
        $insert_default_obj->bindParam(':slevel', $_POST['skilllevel'], PDO::PARAM_INT);
        $insert_default_obj->execute();


        //Add the data to default db with asset 0 for the master to assign it
        if (isset($_POST['branch']))
        {
            unset($insert_default_obj);
            unset($insert_default_string);
            $_POST['branch'] = preg_replace("/[^A-Za-z0-9- ]+/", "",$_POST['branch']);
            $insert_default_string = "INSERT INTO nextvac.defaultskill (branch,skillname,skillhash) VALUES (?,?,?)";
            $insert_default_obj = $mysql_conn->prepare($insert_default_string);
            $insert_default_obj->bindParam(1,$_POST['branch'],PDO::PARAM_STR);
            $insert_default_obj->bindParam(2,$skillname,PDO::PARAM_STR);
            $insert_default_obj->bindParam(3,$hash,PDO::PARAM_STR);
            unset($hash);
            $insert_default_obj->execute();
        }
        else{
            unset($insert_default_obj);
            unset($insert_default_string);
            $insert_default_string = "INSERT INTO nextvac.defaultskill (skillname,skillhash) VALUES (?,?)";
            $insert_default_obj = $mysql_conn->prepare($insert_default_string);
            $insert_default_obj->bindParam(1,$skillname,PDO::PARAM_STR);
            $insert_default_obj->bindParam(2,$hash,PDO::PARAM_STR);
            unset($hash);
            $insert_default_obj->execute();
        }

        $data_out['success'] = true;
        echo json_encode($data_out);

    }
}
else{
    $data_out['error'] = "Sorry there was an error taking your data";
    echo json_encode($data_out);
    die();
}