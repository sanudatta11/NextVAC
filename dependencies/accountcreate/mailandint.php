<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 14/3/17
 * Time: 9:29 PM
 */

function is_connected()
{
    $connected = @fsockopen("www.google.com", 80);
    //website, port  (try 80 or 443)
    if ($connected){
        $is_conn = true; //action when connected
        fclose($connected);
    }else{
        $is_conn = false; //action in connection failure
    }
    return $is_conn;

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