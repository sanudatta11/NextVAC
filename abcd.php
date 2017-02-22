<?php
/**
 * Created by PhpStorm.
 * User: stuxnet
 * Date: 20/1/17
 * Time: 4:06 PM
 */
$username="123";
//require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/connector.php';
$host = "127.0.0.1";
$dbname = "nextvac";
$username_db = "myuser";
$password_db = "abcdabcd";

try{
    $mysql_conn=new PDO("mysql:host=$host;port=3306;sdbname=$dbname",$username_db,$password_db);
    $mysql_conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "Connection established";
}
catch(PDOException $e){
    echo 'Connect Object Error:'.$e->getmessage();
}
$username =123;
$password = 'biss';
$sql_query_string = "SELECT * FROM login WHERE username = 1";
$find_query = $mysql_conn->prepare("SELECT * FROM nextvac.login WHERE username=:binduser");
$find_query->bindParam(':binduser',$username,PDO::PARAM_INT);
$find_query->execute();
$find_query->setFetchMode(PDO::FETCH_ASSOC);

//Checking  Data
while($row = $find_query->fetch())
{
    if($row['password'] == $password)
    {
        echo "Success";
    }
    else{
        //Now Redirect to the Login page with unknown attempt
        header('Location:index.php?attempt=fail');
        //header("Location:index.php?attempt=fail");
    }
}

?>