<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 14/3/17
 * Time: 3:42 PM
 */

//    Include Database Connetors
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/connector.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/mysql_login.php';

if(isset($_GET['term']))
{
    $auto_string = "SELECT * FROM nextvac.defaultskill skillname LIKE '%:nskill%";

}else{

}
