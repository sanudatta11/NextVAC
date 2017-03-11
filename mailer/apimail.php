<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/3/17
 * Time: 10:41 AM
 */

require_once '../vendor/autoload.php';

function sendmail($recipent_email,$recipent_name,$username,$password)
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

?>