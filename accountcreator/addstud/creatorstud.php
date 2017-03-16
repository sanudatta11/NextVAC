<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 1/3/17
 * Time: 2:20 PM
 */

/*
 * Making few notes for future Soumyajit aka Stuxnet
 * I am making the Profile pic of every student to be default to a picture and then change it according to you
 * The attendance will be 0 for every student t start and the rank will be 0
 * Make the status as I am new to NextVAC
 * Same for cover make it a default one
 * */

session_start();

//    Include Database Connetors
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/connector.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/mysql_login.php';

require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

//Including the Random Generator
require_once $_SERVER['DOCUMENT_ROOT'].'/dependencies/randomize/randomstring.php';

require_once $_SERVER['DOCUMENT_ROOT'].'/dependencies/accountcreate/mailandint.php';

//require_once $_SERVER['DOCUMENT_ROOT'].'/mailer/apimail.php';

if(isset($_SESSION['ac_key']))
{
    $account_key = preg_replace("/[^A-Za-z0-9]+/", "",$_SESSION['ac_key']);
    $input_string = "SELECT * FROM nextvac.uniquecreate WHERE uniqueid = :uid LIMIT 1";
    $input_obj = $mysql_conn->prepare($input_string);
    $input_obj->bindParam(':uid',$account_key,PDO::PARAM_STR);
    $input_obj->execute();

    if($input_obj->rowCount() > 0)
    {
        $input_obj->setFetchMode(PDO::FETCH_ASSOC);
        $detail = $input_obj->fetch();
        if($detail['created'] == 1)
        {
            //Created Before Skip it
            echo '<script>window.alert("You are Entering a used Account Key")</script>';
            echo '<script>window.location.href = "../../index.php"</script>';
            die();
        }elseif ($detail['created'] == 0)
        {

        }else{
            echo '<script>window.alert("You are Entering a used Account Key")</script>';
            echo '<script>window.location.href = "../../index.php"</script>';
            die();
        }

    }else{

    }

    if(!is_connected())
    {
        echo '<script>window.alert("Internet Not Connected. Didn\'t Add User")</script>';
        header('Location: studentdash.php');
        die();
    }

    //Checking Both Login and Studentinfo DB table data for saving
    if(isset($_POST['username']) && isset($_POST['section']) && isset($_POST['regno']))
    {
//        Make the attendance to be just 0 and make the rank to be the mazimum plus 1 to the original value
//        Checking the Profile Table data has came or not
        if(isset($_POST['email']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['number']) && isset($_POST['course']) && isset($_POST['semester']) )
        {
            if(!isset($_POST['hometown']))
                $_POST['hometown'] = 'undefined';
            /*
             * List of What I am Saving Actually
             * Username = Registration No or UID
             * Section
             * Regno=Can be Same as Username or maybe Something different
             * Email=Email of the Student
             * Firstname and Lastname
             * Hostel (As of Now a Must) So we will make it stagnant as day Scholar if not mentioned
             * Hometown and Phone Number
             * Course and Semester too
             * Gender too  Cannot be MIDDLE offcourse :-p
             * */

//            Making the Data Pure as Virgin

            $username = preg_replace("/[^0-9]+/","",$_POST['username']);
            $password = generaterandomstring(10);
            $section = preg_replace("/[^A-Za-z0-9]+/","",$_POST['section']);
            $regno = preg_replace("/[^0-9]+/","",$_POST['regno']);
//            $email = preg_replace("/[^A-Za-z0-9.]+/","",$_POST['email']);
            $email =  $_POST['email'];
            $firstname = preg_replace("/[^A-Za-z0-9]+/","",$_POST['firstname']);
            $lastname = preg_replace("/[^A-Za-z0-9 ]+/","",$_POST['lastname']);
            $hometown = preg_replace("/[^A-Za-z0-9]+/","",$_POST['hometown']);
            $phone = preg_replace("/[^0-9]+/","",$_POST['number']);
            $course = preg_replace("/[^A-Za-z0-9- ]+/","",$_POST['course']);
            $semester = preg_replace("/[^0-9]+/","",$_POST['semester']);
            $name = $firstname.' '.$lastname;

            //Generating Random SecretKey For the user. Using
            $secretkey = (string)$username.generaterandomstring(5);

            //Saving the Login DB value
            $conn_obj_add= $mysql_conn->prepare('INSERT INTO nextvac.login (username,password,secretkey,designation) VALUES (?,?,?,?)');
            $conn_obj_add->bindParam(1,$username,PDO::PARAM_INT);
            $conn_obj_add->bindParam(2,$password,PDO::PARAM_STR);
            $conn_obj_add->bindParam(3,$secretkey,PDO::PARAM_STR);
            $conn_obj_add->bindValue(4,'student');

            $conn_obj_add->execute();
            echo '<script>console.log("Phase 1 Done")</script>';


            //Saving it in the studentinfo DB
            $conn_obj_add= $mysql_conn->prepare('INSERT INTO nextvac.studentinfo (secretkey,name,section,regno) VALUES (?,?,?,?)');
            $conn_obj_add->bindParam(1,$secretkey,PDO::PARAM_STR);
            $conn_obj_add->bindParam(2,$name, PDO::PARAM_STR);
            $conn_obj_add->bindParam(3,$section, PDO::PARAM_STR);
            $conn_obj_add->bindParam(4,$regno, PDO::PARAM_INT);
            $conn_obj_add->execute();

            echo '<script>console.log("Phase 2 Done")</script>';

            //Saving in Profile DB
            $conn_obj_add= $mysql_conn->prepare('INSERT INTO nextvac.profile (secretkey,propic,designation,email,firstname,lastname,number,course,semester,gender) VALUES (:seckey,:propic,:desig,:email,:first,:last,:num,:course,:sem,:gender)');
            $conn_obj_add->bindParam(':seckey',$secretkey,PDO::PARAM_STR);
            $conn_obj_add->bindValue(':desig','student');
            $conn_obj_add->bindParam(':email',$email,PDO::PARAM_STR);
            $conn_obj_add->bindParam(':first',$firstname,PDO::PARAM_STR);
            $conn_obj_add->bindParam(':last',$lastname,PDO::PARAM_STR);
            $conn_obj_add->bindParam(':num',$phone,PDO::PARAM_INT);
            $conn_obj_add->bindParam(':course',$course,PDO::PARAM_STR);
            $conn_obj_add->bindParam(':sem',$semester,PDO::PARAM_INT);

            echo '<script>console.log("Phase 3 Done")</script>';

            $gender = preg_replace("/[^0-9]+/", "",$_POST['gender']);

            if(isset($gender) && $gender == 1 || $gender == 2)
            {
                $conn_obj_add->bindParam(':gender',$gender,PDO::PARAM_STR);
                if($gender == 1)
                {
                    $conn_obj_add->bindValue(':propic','male.jpg');
                }
                else
                    $conn_obj_add->bindValue(':propic','female.jpg');

            }else
            {
                $gender = 3;
                $conn_obj_add->bindParam(':gender',$gender,PDO::PARAM_STR);
                $conn_obj_add->bindValue(':propic','default.jpg');
            }
            $conn_obj_add->execute();

            echo '<script>console.log("Phase 4 Done")</script>';
            //Invaliding the Access Key
            $insert_stat_key = "UPDATE nextvac.uniquecreate SET secretkey = :seckey,firstname = :fname,lastname = :lname,created = 1 WHERE uniqueid = :uid";
            $insert_stat_obj = $mysql_conn->prepare($insert_stat_key);
            $insert_stat_obj->bindParam(':uid',$account_key,PDO::PARAM_STR);
            $insert_stat_obj->bindParam(':seckey',$secretkey,PDO::PARAM_STR);
            $insert_stat_obj->bindParam(':fname',$firstname,PDO::PARAM_STR);
            $insert_stat_obj->bindParam(':lname',$lastname,PDO::PARAM_STR);

            $insert_stat_obj->execute();

            echo '<script>console.log("Phase 5 Done")</script>';

            /*
             * We will be sending the random password back to the user in his or her email and from there he or she will
             * be able to change it
             */
            //Start Mail here
            if(is_connected())
                sendcreatemail($email,$name,$username,$password);
            else
                echo '<script>window.alert("Internet Not Connected . Mail Error")</script>';

            //End Mail Here

            echo '<script>console.log("Final Phase Done")</script>';

            echo '<script>window.alert("Account Created Sucessfully. Email Has been sent!")</script>';
            echo '<script>window.alert("Username = '.$username.' , Password = '.$password.'")</script>';
            echo '<script>window.location.href = "../thankyou.php"</script>';
            die();

        }
        else{
            header('Location: ../../index.php');
            die();
        }

    }
    else{
        header('Location: ../../index.php');
        die();
    }

}
else
{
 unset($_SESSION);
 header('Location: ../../index.php');
 die();
}