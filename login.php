<!--Persistent Sessions for Remember Me Option

For creating a persistent session we can directly edit the php.ini file or we can set the lifetime of the cookie for session to expire at
lower rate and if the user then selects they need to use remember me then we will be creating a persistent Session.
We can make a check before setting the lifetime for the session.cookie that is remember me is checked or not.

If its checked then we will make the session last for 2 days and if its not set the session will last till browser is closed(default).

Get that Asshole?

-->


<?php
session_start();
if(isset($_POST['check']) && $_POST['check'] == 'Yes')
{
    ini_set('session.cookie_lifetime', 60 * 60 * 24 * 2);  // 2 day cookie lifetime
}
else{
    ini_set('session.cookie_lifetime',0);  // Till Browser Closes
}


if($_SESSION['accept']!=true)
{
    header('Location:index.php?attempt?=fail');
    die();
}



require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/connector.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/mysql_login.php';


if(isset($_POST['user'])&& isset($_POST['pass']))
{
	
    $username = $_POST['user'];
    $password = $_POST['pass'];

//End of encryption

//Querying Database
    $sql_query_string = "SELECT * FROM nextvac.login WHERE username = :binduser LIMIT 1";

    $find_query = $mysql_conn->prepare($sql_query_string);
    $find_query->bindParam(':binduser',$username,PDO::PARAM_INT);
    $find_query->execute();
    $find_query->setFetchMode(PDO::FETCH_ASSOC);

//Checking  Data
    while($row = $find_query->fetch())
    {
            if($row['password'] == $password)
            {
                //$_SESSION['secretkey'] = preg_replace("/[^A-Za-z0-9]+/", "", $row['secretkey']);
                $_SESSION['designation'] = $row['designation'];
                $session_key = session_id();
                $update_query_string = 'UPDATE nextvac.login SET sessionvar = :sessvar WHERE username = :binduser';

                $update_query = $mysql_conn->prepare($update_query_string);
                $update_query->bindParam(':binduser',$username,PDO::PARAM_INT);
                $update_query->bindParam(':sessvar',$session_key);
                $update_query->execute();
                //echo "<script>console.log('There');</script>";

                if($_SESSION['designation'] == 'teacher')
                {
//                    //Redirect to Teacher Dashboard
//                    //Create Session For Teacher
                    echo "<script>console.log('There');</script>";
                    $_SESSION['secretkey'] = preg_replace("/[^A-Za-z0-9]+/", "", $row['secretkey']);
                    if(isset($_SESSION['secretkey']))
                    {
                        header('Location: teacher/dashboard.php');
                        $mysql_conn = null;
                        die();
                    }
                    else{
                        $_SESSION['issue'] = 'contactadmin';
                        $mysql_conn = null;
                        header('Location:index.php?attempt=help');
                        die();
                    }

                }
                else if($_SESSION['designation'] == 'student')
                {
                    $_SESSION['secretkey'] = preg_replace("/[^A-Za-z0-9]+/", "", $row['secretkey']);
//                    //Redirect to Student Dashboard
                    if(isset($_SESSION['secretkey']))
                    {
                        header('Location: student/dashboard.php');
                        $mysql_conn = null;
                        die();

                    }else{
                        $_SESSION['issue'] = 'contactadmin';
                        header('Location:index.php?attempt=help');
                        $mysql_conn = null;
                        die();
                    }
                }
                else if($_SESSION['designation'] == 'master')
                {
                    $_SESSION['secretkey'] = preg_replace("/[^A-Za-z0-9]+/", "", $row['secretkey']);

//                    //Redirect to Student Dashboard
                    if(isset($_SESSION['secretkey']))
                    {
                        header('Location: master/index.php');
                        $mysql_conn = null;
                        die();

                    }else{
                        $_SESSION['issue'] = 'contactadmin';
                        header('Location:index.php?attempt=help');
                        $mysql_conn = null;
                        die();
                    }
                }
                else
                {
                    session_unset();
                    session_destroy();
                    header('Location:index.php?attempt=fail');
                    $mysql_conn = null;
                    die();
                }

            }
            else{
                    $_SESSION['issue'] = 'incorrect';
                    header('Location:index.php?attempt=incorrect');
                    $mysql_conn = null;
                    die();
            }
    }
    $_SESSION['issue'] = 'incorrect';
    header('Location:index.php?attempt=incorrect');
    $mysql_conn = null;
    die();
}
else{
    header('Location:index.php');
    $mysql_conn = null;
    die();
}


?>
