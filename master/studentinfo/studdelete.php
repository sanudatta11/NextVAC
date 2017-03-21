<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/3/17
 * Time: 3:21 PM
 */
session_start();

//    Include Database Connetors
require_once $_SERVER['DOCUMENT_ROOT'] . '/confidential/connector.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/confidential/mysql_login.php';

if(isset($_SESSION['secretkey']) && isset($_SESSION['designation']) && $_SESSION['designation'] == 'master')
{

}
else{

    unset($_SESSION);
    session_abort();
    session_destroy();
    header('Location: ../../index.php');
    die();
}

if(isset($_GET['username']) && $_GET['username'] == 'incorrect' && isset($_SESSION['wronguser']) && $_SESSION['wronguser'] == true)
{
    unset($_SESSION['wronguser']);
    echo '<script>window.alert("Wrong Username")</script>';
}

if(isset($_GET['delete']) && $_GET['delete'] == 'success' && isset($_SESSION['donedelete']) && $_SESSION['donedelete'] == true)
{
    unset($_SESSION['donedelete']);
    echo '<script>window.alert("User Id Deleted")</script>';
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
                <h4 class="text text-center text-default"> <a href="#"><strong></strong></a></h4>
            </li>
            <li>
                <a href="#"><span class="glyphicon glyphicon-dashboard"></span>Dashboard</a>
            </li>
            <li>
                <a href="../addnetwork.php"><span class="glyphicon glyphicon-facetime-video"></span> Network Suite </a>
            </li>
            <li>
                <a href="../masscreator/massadd.php"> <span class="glyphicon glyphicon-plus-sign"></span> Mass Creator</a>
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
                    <li><a href="../../logout.php"><span class="glyphicon glyphicon-log-out"></span><b> Log Out</b></a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-home"></span><b> Reach Us</b></a></li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <br><br><br>
            <h2 class="text text-center"><strong>Remove student from the  NextVAC network</strong> </h2>
            <br> <br>

            <br>

            <form class="form-horizontal" role="form" action="delstud.php" method="get">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Registration Number:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="number" placeholder="Enter UserId number here...." id="username" name="username">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        <input type="button" class="btn btn-danger" value="Remove Student" data-toggle="modal" data-target="#myModal">
                        <span></span>
                        <input type="button" class="btn btn-default" value="Done" id="donebt">
                    </div>
                </div>
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h2 class="modal-title text text-danger "><strong>Warning</strong></h2>
                            </div>
                            <div class="modal-body">
                                <p>
                                <h4 class="text text-default"> <strong>Are you sure you want to delete the student records? </strong> </h4>
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal" id="yesbut">Yes</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            </div>
                        </div>
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

<!-- /#page-content-wrapper -->
<!-- HackDev and BissoBoss Will poty here-->

<!-- /#wrapper -->

<!-- jQuery -->
<script src="../../js/student.dashboard.jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../../js/student.dashboard.bootstrap.min.js"></script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
<!--script to activate all toolkit-->
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
        $("#wrapper").toggleClass("toggled");

        $('#yesbut').click(function() {
            $('form').trigger('submit');
        });

        $('#donebt').click(function () {
            window.location.href='../index.php';
        });
    });
</script>
<!--end of tooltip script-->
</body>

</html>
