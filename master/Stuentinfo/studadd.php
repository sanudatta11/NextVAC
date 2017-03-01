<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 1/3/17
 * Time: 2:20 PM
 */

if(isset($_SESSION['designation']) && isset($_SESSION['backauth']) && $_SESSION['designation'] == 'master' && $_SESSION['backauth'] = true)
{

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