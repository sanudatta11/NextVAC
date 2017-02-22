<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/connector.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/mysql_login.php';

/**
 * Created by PhpStorm.
 * User: root
 * Date: 21/1/17
 * Time: 2:01 AM
 */
session_start();
session_destroy();
session_unset();
session_start();
$_SESSION['logout'] = true;
header('Location:index.php?attempt=logout');
?>