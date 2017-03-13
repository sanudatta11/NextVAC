<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 13/3/17
 * Time: 8:10 PM
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

if (isset($_FILES['coverphoto']) && $_FILES['coverphoto']['size'] > 0)
{
    $cover_profile_string ="SELECT cover FROM nextvac.profile WHERE secretkey = :seckey LIMIT 1";
    $cover_profile = $mysql_conn->prepare($cover_profile_string);
    $cover_profile->bindParam(':seckey',$_SESSION['secretkey']);
    $cover_profile->execute();

    if($cover_profile->rowCount() > 0)
    {
        $cover_profile->setFetchMode(PDO::FETCH_ASSOC);
        $cover_profile_data = $cover_profile->fetch();
        $prev_cover = $cover_profile_data['cover'];
    }
    else{
        //not Correct Session id something wrong
        header('Location: ../../logout.php');
        die();
    }


    $change_profile_string = "UPDATE nextvac.profile SET cover = :cover WHERE secretkey = :seckey";
    $change_profile = $mysql_conn->prepare($change_profile_string);
    $change_profile->bindParam(':seckey',$_SESSION['secretkey']);


    //        Uploading Cover start
    $upload_status = true;
    $target_dir = 'cover/';
    $target_file = $target_dir.basename($_FILES['coverphoto']['name']);
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
    if($_FILES['coverphoto']['size'] > 20000000)
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
        $_SESSION['profileerror'] = "Image Type Error! Cannot Upload!";
        header('Location: view.php');
        $mysql_conn = null;
        die();
        //Not image redirect this asshole
    }

    if($upload_status)
    {
        if (move_uploaded_file($_FILES["coverphoto"]["tmp_name"], $target_file)) {
            //File successfully uploaded to image
            $change_profile->bindParam(':cover',$justname);
            $change_profile->execute();
            $mysql_conn = null;
            //Redirect with Success
            $_SESSION['profilesuccess'] = true;
            if($prev_cover != 'defaultcover.jpg')
                unlink("cover/".$prev_cover);
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

}
else{
    header('Location: view.php');
    die();
}