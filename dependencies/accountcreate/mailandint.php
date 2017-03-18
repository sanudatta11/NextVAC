<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 14/3/17
 * Time: 9:29 PM
 */

function is_connected()
{
    $connected = @fsockopen("www.google.in", 80);
    //website, port  (try 80 or 443)
    if ($connected){
        $is_conn = true; //action when connected
        fclose($connected);
    }else{
        $is_conn = false; //action in connection failure
    }
    return $is_conn;

}

function check_internet_connection($sCheckHost = 'www.google.com')
{
    return (bool) @fsockopen($sCheckHost, 80, $iErrno, $sErrStr, 5);
}

function sendcreatemail($recipent_email,$recipent_name,$username,$password)
{

    $mail = new PHPMailer;

    //Enable SMTP debugging.
    $mail->SMTPDebug = 0;

    //Set PHPMailer to use SMTP.
    $mail->isSMTP();
    //Set SMTP host name
    $mail->Host = "smtp.gmail.com";

    //Set this to true if SMTP host requires authentication to send email
    $mail->SMTPAuth = true;

    //Provide username and password
    $mail->Username = "contactnextvac@gmail.com";
    $mail->Password = "nextvac123NEXTVAC";

    //If SMTP requires TLS encryption then set it
    $mail->SMTPSecure = "tls";

    //Set TCP port to connect to
    $mail->Port = 587;

    $mail->From = "contactnextvac@gmail.com";
    $mail->FromName = "Admin";

    $mail->addAddress($recipent_email, $recipent_name);

    $mail->isHTML(true);

    $mail->Subject = "Your Account is now created";
    $mail->Body = "<i>We have created your account. And your username and password are Username:".$username." and Password:".$password."</i>";
    $mail->AltBody = "We have created your account. And your username and password are Username:".$username." and Password:".$password;

    if(!$mail->send())
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
        //    $_SESSION['mail']=true;
        //    header('Location: ../index.php?mail=sent');
    }
}


function uniqueidmail($recipent_email,$uniqueid)
{
    $string_command = "/sbin/ifconfig wlp6s0 | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}'";
    $ipaddress = exec($string_command);
    $recipent_name = "User";

    $mail = new PHPMailer;

    //Enable SMTP debugging.
    $mail->SMTPDebug = 0;

    //Set PHPMailer to use SMTP.
    $mail->isSMTP();
    //Set SMTP host name
    $mail->Host = "smtp.gmail.com";

    //Set this to true if SMTP host requires authentication to send email
    $mail->SMTPAuth = true;

    //Provide username and password
    $mail->Username = "contactnextvac@gmail.com";
    $mail->Password = "nextvac123NEXTVAC";

    //If SMTP requires TLS encryption then set it
    $mail->SMTPSecure = "tls";

    //Set TCP port to connect to
    $mail->Port = 587;

    $mail->From = "contactnextvac@gmail.com";
    $mail->FromName = "Admin";

    $mail->addAddress($recipent_email, $recipent_name);

    $mail->isHTML(true);

    $mail->Subject = "Your Unique Link ".$uniqueid." is generated!";
    $mail->Body = "<h>Your Unique id link is http://".$ipaddress."/accountcreator/create.php?ac_key=".$uniqueid."</h>";
    $mail->AltBody = "Your Unique id link is http://".$ipaddress."/accountcreator/create.php?ac_key=".$uniqueid;

    if(!$mail->send())
    {
        echo "Mail Error: " . $mail->ErrorInfo;
    }
}