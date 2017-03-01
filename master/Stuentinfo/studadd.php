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
 * The attendance will be 0 for every student t start and the rank will be the maximum of the field that has already be mentioned
 * Make the status as I am new to NextVAC
 * Same for cover make it a default one
 * */

//    Include Database Connetors
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/connector.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/mysql_login.php';


if(isset($_SESSION['designation']) && isset($_SESSION['backauth']) && $_SESSION['designation'] == 'master' && $_SESSION['backauth'] = true)
{
    //Checking Both Login and Studentinfo DB table data for saving
    if(isset($_POST['username']) && isset($_POST['section']) && isset($_POST['regno']))
    {
//        Make the attendance to be just 0 and make the rank to be the mazimum plus 1 to the original value
//        Checking the Profile Table data has came or not
        if(isset($_POST['email']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['hometown']) && isset($_POST['number']) && isset($_POST['course']) && isset($_POST['senester']) )
        {
            
        }
        else{

        }

    }
    else{

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