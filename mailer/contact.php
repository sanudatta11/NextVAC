<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 22/1/17
 * Time: 4:23 AM
 */
session_start();
require_once '../vendor/autoload.php';

if($_SESSION['accept'] == true &&isset($_POST['name'])&&isset($_POST['email']) &&isset($_POST['subject']) &&isset($_POST['body']))
{
    $recipent_name = $_POST['name'];
    $recipent_email = $_POST['email'];
    $subject = $_POST['subject'];
    $talk = $_POST['body'];
}
else{
    session_unset();
    session_destroy();
    header('Location: ../index.php');
}


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
$mail->FromName = "NextVAC Contact";

$mail->addAddress($recipent_email, $recipent_name);

$mail->isHTML(true);

$mail->Subject = "Thank you for contacting us";
$mail->Body = "<i>We Have received your request for contact. We will soon be back to you on Subject: </i><i>".$subject."</i>";
$mail->AltBody = "We Have received your request for contact. We will soon be back to you on Subject: ".$subject;

if(!$mail->send())
{
    echo "Mailer Error: " . $mail->ErrorInfo;
//    $_SESSION['mail']=true;
//    header('Location: ../index.php?mail=sent');
}
else
{
    $_SESSION['mail']=true;
    header('Location: ../index.php?mail=sent');
}

?>