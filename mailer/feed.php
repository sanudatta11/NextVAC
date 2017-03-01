<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 25/1/17
 * Time: 12:23 AM
 */
session_start();
require_once '../vendor/autoload.php';

if($_SESSION['accept'] == true && isset($_POST['name']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['regno']) )
{
    $recipent_name = $_POST['name']." ".$_POST['lname'];
    $recipent_email = $_POST['email'];
    $subject = "Thank you for filling our Feedback Form ".$recipent_name;
}
else{
    header('Location: ../../index.php');
    die();
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
$mail->FromName = " NextVAC Feedback";

$mail->addAddress($recipent_email, $recipent_name);

$mail->isHTML(true);

$mail->Subject = "Thank you for the feedback!";

$htmlmessage = file_get_contents('feedhtml/swag.html');

$mail->msgHTML($htmlmessage);
$mail->addEmbeddedImage('image/logo.png','logo');
$mail->addEmbeddedImage('image/place.jpg','placeit');
$mail->addEmbeddedImage('image/video.png','video');
$mail->addEmbeddedImage('image/code.png','code');
$mail->addEmbeddedImage('image/connect.png','connect');


$mail->isHTML(true);
$mail->CharSet = 'utf-8';

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
    echo "<script>
    window.alert('Thanx for the Feedback!');
    window.location.href = 'thanx.html';
</script>";
    die();
}
