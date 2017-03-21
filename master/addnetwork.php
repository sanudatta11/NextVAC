<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 1/3/17
 * Time: 2:24 PM
 */

session_start();

//    Include Database Connetors
require_once $_SERVER['DOCUMENT_ROOT'] . '/confidential/connector.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/confidential/mysql_login.php';


if(isset($_SESSION['secretkey']) && isset($_SESSION['designation']) && $_SESSION['designation'] == 'master')
{

    $seckey = $_SESSION['secretkey'];
}
else{

    unset($_SESSION);
    session_abort();
    session_destroy();
    header('Location: ../index.php');
    die();
}

if(isset($_SESSION['error']))
{
    echo '<script>window.alert("'.$_SESSION['error'].'")</script>';
}


$check_session_var_string = "SELECT * FROM nextvac.login WHERE secretkey = :seckey AND sessionvar = :sesvar AND designation = :desig";
$check_session_var = $mysql_conn->prepare($check_session_var_string);
$check_session_var->bindParam(':seckey', $_SESSION['secretkey'], PDO::PARAM_STR);
$check_session_var->bindParam(':sesvar', session_id(), PDO::PARAM_STR);
$check_session_var->bindParam(':desig', $_SESSION['designation'], PDO::PARAM_STR);
$check_session_var->execute();

if ($check_session_var->rowCount() > 0) {

} else {
    header('Location: ../logout.php');
    die();
}

?>

<!--Navbar as usual-->
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
    <script src="../jquery/jquery.min.js"></script>
    <!--<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">-->
    <script src="../bootstrap/css/bootstrap.min.css"></script>
    <!--<link rel="stylesheet" href="nav.css">-->
    <link rel="stylesheet" href="../css/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="../css/font-awesome/font-awesome.css">
    <link href="../css/googlefonts/orbitron.css" rel="stylesheet">
    <link href="../css/googlefonts/taviraj.css" rel="stylesheet">
    <link href="../css/googlefonts/aldrich.css" rel="stylesheet">

    <title>NextVAC</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/theme/dashboard_bootstrap_min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/theme/dashboard_simple-sidebar.css" rel="stylesheet">
    <link href="../css/theme/dashboard.css" rel="stylesheet">

    <script src="../js/backsupport/html5shiv.js"></script>
    <script src="../js/backsupport/respond.js"></script>
    <style>
        input:focus {
            background-color: #fbffce;
        }
    </style>
    <!--    Piwik Tracker-->
<!--    <script src="../include/tracker.js"></script>-->
    <!--    End of Piwik Tracker-->
</head>

<body style="background-color: #edf1f7">

<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li>
                <h4 class="text text-center text-default"> <a href="#"><strong>NextVAC Master</strong></a></h4>
            </li>
            <li>
                <h5 class="text text-center text-info"><a href="#"><strong>Master Id: </strong> 11602153</a></h5>
            </li>
            <li>
                <a href="index.php"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a>
            </li>
            <li>
                <a href="#"><span class="glyphicon glyphicon-facetime-video"></span> Network Suite </a>
            </li>
            <li>
                <a href="masscreator/massadd.php"> <span class="glyphicon glyphicon-plus-sign"></span> Mass Creator</a>
            </li>
            <li>
                <a href="#"><span class="fa fa-code"></span> Coding Ground</a>
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
                        <img src="../images/brand.png" alt="Brand">
                    </a>
                </div>
                <a href="#menu-toggle" class="btn btn-danger navbar-btn" id="menu-toggle">
                    <h3 class="brand-header">NextVAC</h3>&nbsp&nbsp&nbsp<span class="glyphicon glyphicon-th-list"></span></a>
                <ul class="nav navbar-nav">
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span><b> Log Out</b></a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-home"></span><b> Reach Us</b></a></li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <br> <br> <br>
                <h1 class="text text-center" style="color: lightseagreen"> <strong> &nbsp&nbsp&nbsp&nbsp Manage NextVAC Accounts </strong></h1> <br>
                <!--Repeat this div-->
                <div class="container small_div">
                 <a href="masterinfo/masterdash.php">
                    <div class="col-xs-6">

                            <div class="card-begin">
                                <br> <br>

                            </div>


                        <div class="w3-card-8" data-toggle="tooltip" data-placement="top" title="Add new master  To Your Database" style="width:100%;">
                            <header class="card-begin w3-green">
                                &nbsp
                            </header>
                            <div class=" card-begin ">

                                <div class="row ">
                                    <br>
                                    <div class="col-xs-4 ">
                                        <span class="glyphicon glyphicon-king fa-3x "></span>
                                    </div>
                                    <div class="col-xs-8 ">
                                        <h3 class="text text-success"> Add Masters Profile <br>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <footer class="card-begin w3-green ">
                                &nbsp;
                            </footer>
                        </div>
                    </div>
                </a>
                    <a href="masterinfo/masterdelete.php">
                    <div class="col-xs-6">

                            <div class="card-begin">
                                <br> <br>



                    </div>
                    <div class="w3-card-8" data-toggle="tooltip" data-placement="top" title="Delete the profile of a master" style="width:100%;">
                        <header class="card-begin w3-red">
                            &nbsp
                        </header>
                        <div class=" card-begin ">

                            <div class="row ">
                                <br>
                                <div class="col-xs-4">
                                    <span class="glyphicon glyphicon-remove fa-3x "></span>
                                </div>
                                <div class="col-xs-8 ">
                                    <h3 class="text text-danger">Delete Masters Profile<br>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <footer class="card-begin w3-red ">
                            &nbsp;
                        </footer>
                    </div>
                </div>
                    </a>
            </div>
            <div class="row">
                <div class="container small_div">
                    <a href="studentinfo/studentdash.php">
                        <div class="col-xs-6">

                                <div class="card-begin">
                                    <br> <br>

                                </div>


                            <div class="w3-card-8" data-toggle="tooltip" data-placement="left" title="Add new students  To Your Database" style="width:100%;">
                                <header class="card-begin w3-green">
                                    &nbsp
                                </header>
                                <div class=" card-begin ">

                                    <div class="row ">
                                        <br>
                                        <div class="col-xs-4 ">
                                            <span class="glyphicon glyphicon-user fa-3x "></span>
                                        </div>
                                        <div class="col-xs-8 ">
                                            <h3 class="text text-success"> Add Student Profile <br>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <footer class="card-begin w3-green ">
                                    &nbsp;
                                </footer>
                            </div>
                        </div>
                     </a>

                    <a href="studentinfo/studdelete.php">
                    <div class="col-xs-6">

                            <div class="card-begin">
                                <br> <br>



                    </div>
                    <div class="w3-card-8" data-toggle="tooltip" data-placement="right" title="Delete the profiles" style="width:100%;">
                        <header class="card-begin w3-red">
                            &nbsp
                        </header>
                        <div class=" card-begin ">

                            <div class="row ">
                                <br>
                                <div class="col-xs-4">
                                    <span class="glyphicon glyphicon-remove fa-3x "></span>
                                </div>
                                <div class="col-xs-8 ">
                                    <h3 class="text text-danger">Delete Student Profile<br>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <footer class="card-begin w3-red ">
                            &nbsp;
                        </footer>
                    </div>
                </div>
                    </a>
            </div>
            <div class="row">
                <br>
                <!--<h1 class="text text-center"> <strong> &nbsp&nbsp&nbsp&nbsp Manage Your Questions </strong></h1> <br>-->
                <!--Repeat this div-->
                <div class="container small_div">
                    <a href="teacherinfo/teacherdash.php">
                    <div class="col-xs-6">

                            <div class="card-begin">
                                <br> <br>

                            </div>


                        <div class="w3-card-8" data-toggle="tooltip" data-placement="bottom" title="Add teacher to NextVAC network" style="width:100%;">
                            <header class="card-begin w3-green">
                                &nbsp
                            </header>
                            <div class=" card-begin ">

                                <div class="row ">
                                    <br>
                                    <div class="col-xs-4 ">
                                        <span class="glyphicon glyphicon-book fa-3x "></span>
                                    </div>
                                    <div class="col-xs-8 ">
                                        <h3 class="text text-success"> Add Teacher Profile <br>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <footer class="card-begin w3-green ">
                                &nbsp;
                            </footer>
                        </div>
                    </div>
                    </a>
                    <a href="teacherinfo/teacherdelete.php">
                    <div class="col-xs-6">

                            <div class="card-begin">
                                <br> <br>


                    </div>
                    <div class="w3-card-8" style="width:100%;" data-toggle="tooltip" data-placement="bottom" title="Manage Master Account Details">
                        <header class="card-begin w3-red">
                            &nbsp
                        </header>
                        <div class=" card-begin ">

                            <div class="row ">
                                <br>
                                <div class="col-xs-4">
                                    <span class="glyphicon glyphicon-remove fa-3x "></span>
                                </div>
                                <div class="col-xs-8 ">
                                    <h3 class="text text-danger">Delete teacher profile<br>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <footer class="card-begin w3-red ">
                            &nbsp;
                        </footer>
                    </div>
                    </a>
                </div>

            </div>
        </div>


    </div>

</div>

<br> <br> <br>

        <nav class="navbar navbar-inverse navbar-fixed-bottom">
            <div class="container-fluid">
                <h5 class="text text-center" style="color: floralwhite;"> <strong>A Stux-Net Productions &copy; 2017</strong> </h5>
            </div>
        </nav>


<!--All modals here-->
<!--Message Modal -->
</div>
<!--container ends here-->

</div>
<!-- /#page-content-wrapper -->
<!-- HackDev and BissoBoss Will poty here-->

<!-- /#wrapper -->

<!-- jQuery -->
<script src="../js/student.dashboard.jquery.js "></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/student.dashboard.bootstrap.min.js "></script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle ").click(function(e) {
        e.preventDefault();
        $("#wrapper ").toggleClass("toggled ");
    });
</script>
<!--script to activate all toolkit-->
<script>
    $(document).ready(function() {
        $("#wrapper ").toggleClass("toggled ");
        $('[data-toggle="tooltip "]').tooltip();
    });
</script>
<!--end of tooltip script-->

</body>

</html>
