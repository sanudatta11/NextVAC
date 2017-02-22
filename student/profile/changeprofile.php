<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 28/1/17
 * Time: 9:42 AM
 */

session_start();
unset($_SESSION['submitauth']);

if(isset($_SESSION['secretkey'])&&$_SESSION['designation']=='student')
{
    //Authorized Personnel here Give Respect

}
else if(isset($_SESSION['secretkey']) && $_SESSION['designation']=='teacher')
{
    //Teacher go to your Dashboard dont Roam Around
    header('Location: ../../teacher/dashboard.php');
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
require_once $_SERVER['DOCUMENT_ROOT'].'/dependencies/randomize/randomstring.php';

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



if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['number']) && isset($_POST['status']))
{
     if (isset($_FILES['profilepic']) && $_FILES['profilepic']['size'] > 0)
     {
             $propic_profile_string ="SELECT propic FROM nextvac.profile WHERE secretkey = :seckey LIMIT 1";
             $propic_profile = $mysql_conn->prepare($propic_profile_string);
             $propic_profile->bindParam(':seckey',$_SESSION['secretkey']);
             $propic_profile->execute();

             if($propic_profile->rowCount() > 0)
             {
                 $propic_profile->setFetchMode(PDO::FETCH_ASSOC);
                 $propic_profile_data = $propic_profile->fetch();
                 $prev_propic = $propic_profile_data['propic'];
             }
             else{
                 //not Correct Session id something wrong
                 header('Location: ../../logout.php');
                 die();
             }

             $change_profile_string = "UPDATE nextvac.profile SET propic = :propic,firstname = :firstname,lastname = :lastname,status = :status,email = :email,number = :number WHERE secretkey = :seckey";
             $change_profile = $mysql_conn->prepare($change_profile_string);
             //Picture change to be during upload
             $change_profile->bindParam(':firstname',$_POST['firstname']);
             $change_profile->bindParam(':lastname',$_POST['lastname']);
             $change_profile->bindParam(':status',$_POST['status']);
             $change_profile->bindParam(':email',$_POST['email']);
             $change_profile->bindParam(':number',$_POST['number']);
             $change_profile->bindParam(':seckey',$_SESSION['secretkey']);

             //Execute after uploading the Imag


    //        Uploading Image start
             $upload_status = true;
             $target_dir = 'images/';
             $target_file = $target_dir.basename($_FILES['profilepic']['name']);
             $extension =pathinfo($target_file,PATHINFO_EXTENSION);

             //Generating Random String for storing the image in the image folder
             $justname =generaterandomstring().'.'.$extension;
             $target_file = $target_dir.$justname;
             $upload_status = true;


             while(file_exists($target_file))
             {
                 $justname =generaterandomstring().'.'.$extension;
                 $target_file = $target_dir.$justname;
             }

             //Checking File Size
             if($_FILES['profilepic']['size'] > 20000000)
             {
                 $upload_status = false;
                 //Redirect the person
                 $_SESSION['profileerror'] = "Size of Image too large!";
                 $mysql_conn = null;
                 header('Location: view.php');
                 die();

             }

             // Allow certain file formats
             if($extension != "jpg" && $extension != "png" && $extension != "jpeg") {
                 $upload_status = false;
                 // echo "Not correct";
                 $_SESSION['profileerror'] = "Image Type not proper cannot Upload!";
                 header('Location: view.php');
                 $mysql_conn = null;
                 die();
                 //Not image redirect this asshole
             }

             if($upload_status)
             {
                 if (move_uploaded_file($_FILES["profilepic"]["tmp_name"], $target_file)) {
                     //File successfully uploaded to image
                     $change_profile->bindParam(':propic',$justname);
                     $change_profile->execute();
                     $mysql_conn = null;
                     //Redirect with Success
                     $_SESSION['profilesuccess'] = true;
                     shell_exec("rm -rf images/".$prev_propic);
                     $mysql_conn = null;
                     header('Location: view.php');
                     die();

                 }
                 else {
                     //echo "Sorry, there was an error uploading your file.";
                     //Redirect
                     $_SESSION['profileerror'] = "Cannot Upload Image";
                     $mysql_conn = null;
                     header('Location: view.php');
                     die();
                 }

             }
             else{
                 $_SESSION['profileerror'] = "Cannot Upload Image! Error Occured!";
                 $mysql_conn = null;
                 header('Location: view.php');
                 die();
             }
             //Uploading Image end

     }
     else{
         //Not want to upload a image so go ahead with just the other details
         $change_profile_string = "UPDATE nextvac.profile SET firstname = :firstname,lastname = :lastname,status = :status,email = :email,number = :number WHERE secretkey = :seckey";
         $change_profile = $mysql_conn->prepare($change_profile_string);
         //Picture change to be during upload
         $change_profile->bindParam(':firstname',$_POST['firstname']);
         $change_profile->bindParam(':lastname',$_POST['lastname']);
         $change_profile->bindParam(':status',$_POST['status']);
         $change_profile->bindParam(':email',$_POST['email']);
         $change_profile->bindParam(':number',$_POST['number']);
         $change_profile->bindParam(':seckey',$_SESSION['secretkey']);

         $change_profile->execute();

         $_SESSION['profilesuccess'] = true;
         $mysql_conn = null;
         header('Location: view.php');
         die();
     }


}
else{
    $_SESSION['profileerror'] = "Cannot Update!Error Occured!";
    $mysql_conn = null;
    header('Location: view.php');
    die();
}

//Redirect to the original profile page

