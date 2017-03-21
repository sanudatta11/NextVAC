<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2/3/17
 * Time: 11:28 PM
 */
session_start();

//    Include Database Connetors
require_once $_SERVER['DOCUMENT_ROOT'] . '/confidential/connector.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/confidential/mysql_login.php';

if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'master')
{
    //Do Nothing
}
else{
    header('Location: ../../index.php');
    die();
}

if(isset($_SESSION['donecreate']) && $_SESSION['donecreate'] = true)
{
    unset($_SESSION['donecreate']);
    echo '<script>window.alert("Student Id Created")</script>';
}


$check_session_var_string = "SELECT * FROM nextvac.login WHERE secretkey = :seckey AND sessionvar = :sesvar AND designation = :desig";
$check_session_var = $mysql_conn->prepare($check_session_var_string);
$check_session_var->bindParam(':seckey', $_SESSION['secretkey'], PDO::PARAM_STR);
$check_session_var->bindParam(':sesvar', session_id(), PDO::PARAM_STR);
$check_session_var->bindParam(':desig', $_SESSION['designation'], PDO::PARAM_STR);
$check_session_var->execute();

if ($check_session_var->rowCount() > 0) {

} else {
    header('Location: ../../logout.php');
    die();
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
    <!--    Piwik Tracker-->
    <script src="../../include/tracker.js"></script>
    <!--    End of Piwik Tracker-->
</head>

<body style="background-color: #edf1f7">

<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li>
                <h4 class="text text-center text-default"> <a href="#"><strong> </strong></a></h4>
            </li>
            <li>
                <a href="#"><span class="glyphicon glyphicon-dashboard"></span>Dashboard</a>
            </li>
            <li>
                <a href="../addnetwork.php"><span class="glyphicon glyphicon-facetime-video"></span> Network Suite </a>
            </li>
            <li>
                <a href="../masscreator/massadd.php"><span class="glyphicon glyphicon-facetime-video"></span>Mass Creator</a>
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
                    <li><a href="../../logout.php"><span class="glyphicon glyphicon-log-out"></span><b> Log Out</b></a>
                    </li>
                    <li><a href="#"><span class="glyphicon glyphicon-home"></span><b> Reach Us</b></a></li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <br><br><br>
            <h2 class="text text-center"><strong>Add Student to NextVAC network</strong> </h2>
            <br> <br>
            <br>

            <form class="form-horizontal" role="form" method="post" action="studadd.php">
                <div class="form-group">
                    <label class="col-lg-3 control-label">UserId:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="number" name="username" id="username" placeholder="Enter userid here...." autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">First name:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" name="firstname" id="firstname" placeholder="Enter first name here...." autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Last name:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" name="lastname" id="lastname" placeholder="Enter first name here...." autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Registration number:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="number" name="regno" id="regno" placeholder="Enter registration number here...." autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Section:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" name="section" id="section" placeholder="Enter section name here...." autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Course:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" id="course" name="course" value="" placeholder="Enter course name here...." autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="email" id="email" name="email" placeholder="Enter email id here...." autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Phone Number:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="number" id="number" name="number" placeholder="Enter phone number here...." autocomplete="off">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Year of study: </label>
                    <div class="col-lg-8">
                        <div class="ui-select">
                            <select id="user_time_zone" class="form-control" name="semester" id="semester">
                                <option value="1" selected="selected">1st Year : 1st Semester</option>
                                <option value="2">1st Year : 2nd Semester</option>
                                <option value="3">2nd Year : 3rd Semester</option>
                                <option value="4">2nd Year : 4th Semester</option>
                                <option value="5">3rd Year : 5th Semester</option>
                                <option value="6">3rd Year : 6th Semester</option>
                                <option value="7">4th Year : 7th Semester</option>
                                <option value="8">4th Year : 8th Semester</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        <input type="submit" class="btn btn-primary" value="Save Changes">
                        <span></span>
                        <input type="reset" class="btn btn-default" value="Cancel" onclick="window.location.href='../addnetwork.php'">
                    </div>
                </div>
            </form>
        </div>


    </div>
    <br> <br> <br> <br> <br> <br>
    <nav class="navbar navbar-inverse navbar-fixed-bottom">
        <div class="container-fluid">
            <h5 class="text text-center" style="color: floralwhite;"> <strong>A Stux-Net Productions &copy; 2017</strong> </h5>
        </div>
    </nav>

    <!--ALERT HERE-->

</div>
<!--container ends here-->


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
