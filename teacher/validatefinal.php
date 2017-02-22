<?php
/**
 * Created by PhpStorm.
 * User: stuxnet
 * Date: 22/1/17
 * Time: 4:28 PM
 */

session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/confidential/connector.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/confidential/mysql_login.php';

if($_SESSION['ques_validate']!=true || (!isset($_SESSION['secretkey'])|| $_SESSION['designation'] != 'teacher'))
{
    session_unset();
    session_destroy();
    header('Location: ../../index.php?attempt=fail');
    die();
}

if(!isset($_POST['ques_section'])||!isset($_POST['ques_code']))
{
    session_unset();
    session_destroy();
    header('Location: ../../index.php?attempt=fail');
    die();
}

$ques_section = $_POST['ques_section'];
$ques_code = $_POST['ques_code'];


$query_string = 'SELECT section FROM nextvac.classallocate WHERE secretkey = :seckey AND section = :section LIMIT 1';
$query = $mysql_conn->prepare($query_string);
$query->bindParam(':seckey',$_SESSION['secretkey']);
$query->bindParam(':section',$ques_section);
$query->execute();
$query->setFetchMode(PDO::FETCH_ASSOC);

$data_out = $query->fetch();

if($query->rowCount() > 0)
{
    //Teacher Now authorized and can continue


}
else{
    //Redirect this asshole and tell he or she doesn't teaches them

}


?>