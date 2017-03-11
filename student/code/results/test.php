<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 7/3/17
 * Time: 9:43 PM
 */
date_default_timezone_set('Asia/India'); // CDT

$current_date = date('d/m/Y == H:i:s');
echo $current_date;

//    Include Database Connetors
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/connector.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/mysql_login.php';

$fuck = $mysql_conn->prepare('SELECT * FROM nextvac.coderesults');
$fuck->setFetchMode(PDO::FETCH_ASSOC);
$fuck->execute();

$duck = $fuck->fetch();
echo '<br>';
echo date('d/m/Y', strtotime($duck['timereal']));
echo '<br>';
echo date('H-i-s', strtotime($duck['timereal']));

unset($fuck);
$created_date = date("Y-m-d H:i:s");

$fuck = $mysql_conn->prepare('INSERT INTO nextvac.coderesults (secretkey,contestcode,problemcode,score,timereal) VALUES ("AAA","K1",11,121,:curdate)');
$fuck->bindParam(':curdate',$created_date);
$fuck->execute();

//echo $la['d/m/zy'];

//$mysql_conn = null;