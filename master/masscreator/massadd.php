<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 17/3/17
 * Time: 8:21 PM
 */
session_start();

if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'master')
{
    //Do Nothing
}
else{
    header('Location: ../../../index.php');
    die();
}

if(isset($_SESSION['error']))
{
    echo '<script>window.alert("'.$_SESSION['error'].'")</script>';
    unset($_SESSION['error']);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/css?family=Taviraj" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!--<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--<link rel="stylesheet" href="nav.css">-->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Taviraj" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Aldrich" rel="stylesheet">

    <!--<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">-->

    <title>NextVAC</title>
    <!-- Bootstrap Core CSS -->
    <link href="../../css/theme/dashboard_bootstrap_min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../css/theme/dashboard_simple-sidebar.css" rel="stylesheet">
    <link href="../../css/theme/dashboard.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        input:focus {
            background-color: #fbffce;
        }
    </style>
    <script src="../../include/tracker.js"></script>
</head>

<body style="background-color: #edf1f7">

<div id="wrapper">

    <!-- Sidebar -->
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <br><br><br>
            <li>
                <a href="../index.php"><span class="glyphicon glyphicon-dashboard"></span>Dashboard</a>
            </li>
            <li>
                <a href="../addnetwork.php"><span class="glyphicon glyphicon-facetime-video"></span> Network Suite </a>
            </li>
            <li>
                <a href="../masscreator/massadd.php"> <span class="glyphicon glyphicon-plus-sign"></span> Mass Creator</a>
            </li>
            <li>
                <a href="#"> <span class="glyphicon glyphicon-book"></span>Test 1</a>
            </li>
            <li>
                <a href="#"><span class="fa fa-code"></span>Test 2</a>
            </li>
            <li>
                <a href="#"><span class="glyphicon glyphicon-plus"></span> Test 3</a>
            </li>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        <img src="../../images/brand.png" alt="Brand">
                    </a>
                </div>
                <a href="#menu-toggle" class="btn btn-danger navbar-btn" id="menu-toggle">
                    <h3 class="brand-header">NextVAC</h3>&nbsp&nbsp&nbsp<span class="glyphicon glyphicon-th-list"></span></a>
                <ul class="nav navbar-nav">
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-log-out"></span><b> Log Out</b></a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-home"></span><b> Reach Us</b></a></li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <br><br><br>
            <div class="container" id="hidenow">
                <h2 class="text text-center"><strong>Create Unique Id for account creation</strong> </h2>
                <br>
                <label class="col-lg-3 control-label">Enter number of students: </label>

                <input type="text" id="member" name="member" placeholder="Enter number of Students" class="form-control" id="studentform"><br />

                <button class="btn btn-success" id="btn" onclick="addinputFields()">Go!</button>
            </div>
            <div class="container" id="shownow" style="display: none;">
                <h1 class="text text-center">
                    <strong>Please enter the email ids of the students: </strong> <br>
                </h1>
            </div>
            <br><br>
            <form action="masssub.php" method="post" enctype="multipart/form-data">
                <div id="container">

                </div>
                <div class="container">
                    <div class="btn btn-group">
                        <button class="btn btn-primary" type="submit" style="display: none;" id="mailall">Send the mails</button>
                        <button class="btn btn-default" type="button" style="display: none;" id="reload" onClick="window.location.href=''">Back</button>
                    </div>
                </div>
            </form>

            <script>
                var a;

                function addinputFields() {
                    var number = document.getElementById("member").value;
                    document.getElementById('mailall').style = "display: block;";
                    document.getElementById('hidenow').style = "display: none;";
                    document.getElementById('shownow').style = "display: block;"
                    document.getElementById('reload').style = "display: block;"
                    for (i = 0; i < number; i++) {
                        a = i + 1;
                        var input = document.createElement("input");
                        input.type = "email";
                        input.className = "form-control";
                        container.appendChild(input);
//                        input.id = "emails[]";
                        input.name = "emails[]";
                        input.required = true;
                        input.placeholder = "Enter email id of student number: " + a;
                        container.appendChild(document.createElement("br"));
                    }

                }
            </script>



        </div>
    </div>


</div>
<br> <br> <br> <br> <br> <br>
<nav class="navbar navbar-inverse navbar-fixed-bottom">
    <div class="container-fluid">
        <h5 class="text text-center" style="color: floralwhite;"> <strong>A Stux-Net Productions &copy; 2017</strong> </h5>
    </div>
</nav>


<!-- jQuery -->
<script src="../../js/student.dashboard.jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../../js/student.dashboard.bootstrap.min.js"></script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled"); //copy this line and paste it under document.ready tag
    });
</script>
<!--script to activate all toolkit-->
<script>
    $(document).ready(function() {

        $('[data-toggle="tooltip"]').tooltip();
        $("#wrapper").toggleClass("toggled");
    });
</script>
<!--end of tooltip script-->
</body>

</html>
