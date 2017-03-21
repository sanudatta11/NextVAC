<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 19/3/17
 * Time: 12:20 PM
 */
session_start();
//Database Connectors
require_once $_SERVER['DOCUMENT_ROOT'] . '/confidential/connector.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/confidential/mysql_login.php';
unset($data);
$data = array();
if (isset($_POST['ccode']) && isset($_POST['pcode']) && isset($_SESSION['secretkey']) && $_SESSION['designation'] == 'student') {
    //Sterilize Inputs
    $_POST['ccode'] = preg_replace("/[^A-Za-z0-9]+/", "", $_POST['ccode']);
    $_POST['pcode'] = preg_replace("/[^0-9]+/", "", $_POST['pcode']);

    $save_conn_string = "SELECT * FROM nextvac.codesave WHERE secretkey = :seckey AND contestcode = :ccode AND problemcode = :pcode LIMIT 1";
    $save_conn_obj = $mysql_conn->prepare($save_conn_string);
    $save_conn_obj->bindParam(':seckey', $_SESSION['secretkey'], PDO::PARAM_STR);
    $save_conn_obj->bindParam(':ccode', $_POST['ccode'], PDO::PARAM_STR);
    $save_conn_obj->bindParam(':pcode', $_POST['pcode'], PDO::PARAM_INT);
    $save_conn_obj->execute();

    if ($save_conn_obj->rowCount() > 0) {
        //Saved Earlier
        $save_conn_obj->setFetchMode(PDO::FETCH_ASSOC);
        $result_load = $save_conn_obj->fetch();
        $data['mainload'] = $result_load['code'];
        $data['success'] = true;
        echo json_encode($data);
        die();
    } else {
        //Not Saved Earlier
        $data['errors'] = '1';
        echo json_encode($data);
        die();
    }

} else {
    $data['errors'] = '2';
    echo json_encode($data);
    die();
}