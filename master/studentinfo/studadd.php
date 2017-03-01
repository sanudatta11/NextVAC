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

//    Include Database Connetors
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/connector.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/mysql_login.php';

//Including the Random Generator
require_once $_SERVER['DOCUMENT_ROOT'].'/dependencies/randomize/randomstring.php';


if(isset($_SESSION['designation']) && isset($_SESSION['backauth']) && $_SESSION['designation'] == 'master' && $_SESSION['backauth'] = true)
{
    //Checking Both Login and Studentinfo DB table data for saving
    if(isset($_POST['username']) && isset($_POST['section']) && isset($_POST['regno']))
    {
//        Make the attendance to be just 0 and make the rank to be the mazimum plus 1 to the original value
//        Checking the Profile Table data has came or not
        if(isset($_POST['email']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['hometown']) && isset($_POST['number']) && isset($_POST['course']) && isset($_POST['semester']) )
        {
            /*
             *List of What I am Saving Actually
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
            $email = preg_replace("/[^A-Za-z0-9]+/","",$_POST['email']);
            $firstname = preg_replace("/[^A-Za-z0-9]+/","",$_POST['firstname']);
            $lastname = preg_replace("/[^A-Za-z0-9]+/","",$_POST['lastname']);
            $hometown = preg_replace("/[^A-Za-z0-9]+/","",$_POST['hometown']);
            $phone = preg_replace("/[^A-Za-z0-9]+/","",$_POST['number']);
            $course = preg_replace("/[^A-Za-z0-9]+/","",$_POST['course']);
            $semester = preg_replace("/[^A-Za-z0-9]+/","",$_POST['semester']);
            $name = $firstname.' '.$lastname;

            if(isset($_POST['hostel']))
            {
                $hostel = preg_replace("/[^A-Za-z0-9-]+/","",$_POST['hostel']);
            }
            else
            {
                $hostel = 'Day Scholar';
            }

            //Generating Random SecretKey For the user. Using
            $secretkey = sha1((string)$username.generaterandomstring(5));
            $sessionvar = sha1('invalid');

            //Saving the Login DB value
            $conn_obj_add= $mysql_conn->prepare('INSERT INTO nextvac.login (username,password,secretkey,sessionvar,designation) VALUES (:username,:pass,:seckey,:sesvar,:desig)');
            $conn_obj_add->bindParam(':username',$username,PDO::PARAM_INT);
            $conn_obj_add->bindParam(':pass',$password,PDO::PARAM_STR);
            $conn_obj_add->bindParam(':seckey',$secretkey,PDO::PARAM_STR);
            $conn_obj_add->bindParam(':sesvar',$sessionvar,PDO::PARAM_STR);
            $conn_obj_add->bindValue(':desig','student');

            $conn_obj_add->execute();

            //Saving it in the studentinfo DB
            $conn_obj_add= $mysql_conn->prepare('INSERT INTO nextvac.studentinfo (secretkey,name,section,regno,attendance,rank) VALUES (:seckey,:name,:section,:regno,:attendance,:rank)');
            $conn_obj_add->bindParam(':seckey',$secretkey,PDO::PARAM_STR);
            $conn_obj_add->bindParam(':name',$name, PDO::PARAM_STR);
            $conn_obj_add->bindParam(':section',$section, PDO::PARAM_STR);
            $conn_obj_add->bindParam(':regno',$regno, PDO::PARAM_STR);
            $conn_obj_add->bindValue(':attendance',0,PDO::PARAM_INT);
            $conn_obj_add->bindValue(':rank',0,PDO::PARAM_INT);

            $conn_obj_add->execute();

            //Saving in Profile DB
            $conn_obj_add= $mysql_conn->prepare('INSERT INTO nextvac.profile (secretkey,propic,status,designation,incomming,messages,email,firstname,lastname,cover,hostel,hometown,number,course,semester,gender) VALUES (:seckey,:propic,:status,:desig,:incom,:messages,:email,:first,:last,:cover,:hostel,:hometown,:num,:course,:sem,gender)');
            $conn_obj_add->bindParam(':seckey',$secretkey,PDO::PARAM_STR);
            $conn_obj_add->bindValue(':status','I am new to NextVAC');
            $conn_obj_add->bindValue(':desig','student');
            $conn_obj_add->bindValue(':incom',0);
            $conn_obj_add->bindValue(':messages',0);
            $conn_obj_add->bindParam(':email',$email,PDO::PARAM_STR);
            $conn_obj_add->bindParam(':first',$firstname,PDO::PARAM_STR);
            $conn_obj_add->bindParam(':last',$lastname,PDO::PARAM_STR);
            $conn_obj_add->bindParam(':hostel',$hostel,PDO::PARAM_STR);
            $conn_obj_add->bindParam(':hometown',$hometown,PDO::PARAM_STR);
            $conn_obj_add->bindParam(':num',$phone,PDO::PARAM_INT);
            $conn_obj_add->bindParam(':course',$course,PDO::PARAM_STR);
            $conn_obj_add->bindParam(':sem',$semester,PDO::PARAM_INT);


            $_POST['gender'] = preg_replace("/[^0-9]+/", "",$_POST['gender']);

            if($_POST['gender'] == 1 || $_POST['gender'] == 2)
            {
                $gender = $_POST['gender'];
                $conn_obj_add->bindParam(':gender',$gender,PDO::PARAM_STR);
                if($_POST['gender'] == 1)
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
            $conn_obj_add->bindValue(':cover','defaultcover.jpg');
            $conn_obj_add->execute();

            $_SESSION['donecreate'] = true;
            header('Location: ../index.php');       //Send it wherever you want actually Check for sessionvar and unset it
            die();

        }
        else{
            header('Location: ../index.php');
            die();
        }

    }
    else{
        header('Location: ../index.php');
        die();
    }

}
else if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'master')
{
    header('Location: ../index.php');
    die();
}
else
{
 unset($_SESSION);
 header('Location: ../../index.php');
}