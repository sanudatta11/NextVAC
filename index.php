<!--
Using PHP Mailer for the contact form and we will also use the PHP Mailer for the master account when a new account is created .
People will get mail with random password in their account.

I Installed dependencies first using composer
    ->composer require phpmailer/phpmailer

-->

<?php
session_start();

$_SESSION['accept'] = true;

if(isset($_SESSION['secretkey']))
    {
        unset($newpath);
        $newpath = 'redirect.php';
        header('Location:'.$newpath);
        die();
    }

 $info = true;

 if($_GET['attempt']=='fail')
 {
     $info_message = 'Try Again!';
     session_destroy();
     session_unset();
     session_start();
     $_SESSION['accept'] = true;
 }
 else if($_GET['attempt']=='relogin'&& $_SESSION['relogin']==true)
 {
     $info_message = 'Session Expired. Please Login Again!';
     session_destroy();
     session_unset();
     session_start();
     $_SESSION['accept'] = true;
 }
 else if($_GET['attempt']=='logout'&& $_SESSION['logout'] == true)
 {
     $info_message = 'You Have been Logged Out!';
     session_destroy();
     session_unset();
     session_start();
     $_SESSION['accept'] = true;
 }
 else if($_GET['attempt']=='help'&& $_SESSION['issue'] == 'contactadmin')
 {
    $info_message = 'Error Occured Internally! Contact admin.';
     session_destroy();
     session_unset();
     session_start();
     $_SESSION['accept'] = true;
 }
 else if($_GET['attempt']=='incorrect'&&$_SESSION['issue']=='incorrect')
 {
     $info_message = 'Incorrect Username Or Password';
     session_destroy();
     session_unset();
     session_start();
     $_SESSION['accept'] = true;
 }
 else if($_GET['mail']=='sent' && $_SESSION['mail']==true)
 {
    $info_message = 'Thanks for Contacting us.';
     session_destroy();
     session_unset();
     session_start();
     $_SESSION['accept'] = true;
 }
 else {
     $info = false;
 }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NextVAC - Log In</title>

    <!--Bootstrap-->

    <!-- Latest compiled and minified CSS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
    <!--End of Bootstrap-->

    <!--Local Include-->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!--Stylesheet-->

    <link rel="stylesheet" href="css/mainpage/mainpage.css">
    <link rel="stylesheet" href="css/mainpage/rightnav.css">

    <!--End-->
</head>
<body>

<!-- Image and text -->
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="mynav">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <img src="images/logo.png" alt="logo" id="logoimg">

            <a class="navbar-brand">NextVAC</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav" style="float:right;">
                <li>
                    <a href="#">About Us</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<!--Navigation End-->

<br><br>
<div class="container" id="mycont">
    <div class="boxbelow">

        <div class="leftbox">
            <img src="images/frontinfo.jpg" height="1300px" alt="info" class="detailimage">
        </div>


    </div>

    <div class="rightbox">

        <div class="login-wrap">

            <div class="login-html">
                <div class="group <?php if(!$info) echo "hide";?> " style="font-size: large;">
                    <label for="warning" class="label" style="font-size: large;">
                        <?php
                        if($info)
                        {
                            echo $info_message;
                        }

                        ?>
                    </label>
                </div>
                <br><br>
                <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
                <input id="tab-2" type="radio" name="tab" class="contact-form"><label for="tab-2" class="tab">Contact Form</label>




                <div class="login-form">

                    <!-- This is the first active Phase  -->
                    <form method="POST" action="login.php">
                        <div class="sign-in-htm">
                            <div class="group">
                                <label for="user" class="label">Reg No</label>
                                <input id="user" type="number" class="input" name="user" maxlength="10" required>
                            </div>
                            <div class="group">
                                <label for="pass" class="label">Password</label>
                                <input id="pass" type="password" class="input" data-type="password" maxlength="45" name="pass" required>
                            </div>
                            <div class="group">
                                <input id="check" type="checkbox" class="check" name="check" checked>
                                <label for="check"><span class="icon"></span> Keep me Signed in</label>
                            </div>
                            <div class="group">
                                <input type="submit" class="button" value="Log In">
                            </div>
                            <div class="hr"></div>
                            <div class="foot-lnk">
                                <a href="#">Forgot Password?</a>
                            </div>
                        </div>
                    </form>

                    <!-- End of the firt active Phase -->


                    <!-- New side -->
                    <div class="contact-form-htm">

                       <form method="post" action="mailer/contact.php">
                           <div class="group">
                               <label for="user" class="label">Your Name</label>
                               <input id="name" type="text" class="input" name="name" required>
                           </div>
                           <div class="group">
                               <label for="pass" class="label">Your Email</label>
                               <input id="email_contact" type="email" class="input" data-type="email" name="email" required>
                           </div>
                           <div class="group">
                               <label for="subject" class="label">Subject</label>
                               <input id="subject" type="text" class="input" data-type="text" name="subject" required>
                           </div>
                           <div class="group" id="context">
                               <label for="context" class="label">Your Talk</label>
                               <textarea type="text" class="input" name="body" required></textarea>
                           </div>
                           <div class="group">
                               <input type="submit" class="button" value="Ping Us">
                           </div>
                           <div class="foot-lnk">
                               <label for="tab-1">Want to Log In?</label>
                           </div>
                       </form>

                    </div>

                    <!-- End of New side -->

                </div>

            </div>
        </div>



    </div>
</div>
</div>

</body>
</html>
