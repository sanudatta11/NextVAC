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
    <link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css">
    <script src="../../jquery/jquery.min.js"></script>
    <!--<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">-->
    <script src="../../bootstrap/css/bootstrap.min.css"></script>
    <!--<link rel="stylesheet" href="nav.css">-->
    <link rel="stylesheet" href="../../css/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/font-awesome/font-awesome.css">
    <link href="../../css/googlefonts/orbitron.css" rel="stylesheet">
    <link href="../../css/googlefonts/taviraj.css" rel="stylesheet">
    <link href="../../css/googlefonts/aldrich.css" rel="stylesheet">

    <title>NextVAC</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../css/theme/dashboard_bootstrap_min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../css/theme/dashboard_simple-sidebar.css" rel="stylesheet">
    <link href="../../css/theme/dashboard.css" rel="stylesheet">

    <script src="../../js/backsupport/html5shiv.js"></script>
    <script src="../../js/backsupport/respond.js"></script>
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
