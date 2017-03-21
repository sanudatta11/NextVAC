<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 24/1/17
 * Time: 9:36 PM
 */
session_start();
unset($_SESSION['submitauth']);
if(!($_SESSION['secretkey'] && $_SESSION['designation'] == 'student' ))
{
    unset($_SESSION);
    $_SESSION['relogin'] = true;
    $path = '../../index.php?attempt=relogin';
    header('Location: '.$path);
    die();
}

if(isset($_SESSION['found']))
{
    if($_SESSION['found'] == true)
    {
        $ipaddr = $_SESSION['ipaddr'];
    }
    else{
        header('Location: ../dashboard.php');
        die();
    }
}else{
    header('Location: ../dashboard.php');
    die();
}

//    Include Database Connetors
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/connector.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/mysql_login.php';

$find_student_info_string = "SELECT sessionvar FROM nextvac.login WHERE secretkey = :seckey AND sessionvar = :sessvar LIMIT 1";
$infoquery = $mysql_conn->prepare($find_student_info_string);
$infoquery->bindParam(':seckey',$_SESSION['secretkey']);
$infoquery->bindParam(':sessvar',session_id());
$infoquery->execute();
if($infoquery->rowCount() >0)
{

}else{
    $_SESSION['relogin'] = true;
    header('Location: ../../index.php?attempt=relogin');
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
    <!--    Piwik Tracker-->
    <script src="../../include/tracker.js"></script>
    <!--    End of Piwik Tracker-->

</head>

<body style="background-color: #edf1f7">

<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">

            <li>
                <img src="../profile/images/<?php echo $_SESSION['propic'];?>" align="center" height="170px" width="200px">
            </li>
            <li>
                <h5 class="text text-center text-info"><strong><?php echo $_SESSION['name'] ?></strong></h5>
            </li>
            <li>
                <h5 class="text text-center text-info"><strong><?php echo $_SESSION['regno'] ?></strong></h5>
            </li>
            <li>
                <a href="../dashboard.php"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a>
            </li>
            <li>
                <a href="#"><span class="glyphicon glyphicon-facetime-video"></span> VConnect</a>
            </li>
            <li>
                <a href="../question/quesstaging.php"><span class="glyphicon glyphicon-pencil"></span></span>Solve Questions</a>
            </li>
            <li>
                <a href="#"> <span class="glyphicon glyphicon-book"></span> Digtal Library</a>
            </li>
            <li>
                <a href="../code/contest.php"><span class="fa fa-code"></span> Coding Ground</a>
            </li>
            <li>
                <a href="#"><span class="fa fa-share-alt"></span> File Share</a>
            </li>
            <li>
                <a href="#"><span class="fa fa-users"></span> ConnectYou</a>
            </li>
            <li>
                <a href="../profile/view.php"><span class="fa fa-user"></span> My Profile</a>
            </li>
            <li>
                <a href="#"><span class="glyphicon glyphicon-th"></span> Feedback</a>
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
                    <li><a><span class="glyphicon glyphicon-education fa-1x"> <b><?php echo $_SESSION['section'] ?></b></span></a></li>
                    <li><a href="../../logout.php"><span class="glyphicon glyphicon-log-out"></span><b> Log Out</b></a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-home"></span><b> Reach Us</b></a></li>
                </ul>
            </div>
        </nav>
        <!--Do all fucking here-->

        <br> <br>
        <div class="container">
            <h1 class="text text" style="font-family: 'Orbitron', sans-serif;"> <strong> Lecture of Ongoing Class</strong></h1>
            <br>
            <embed src="http://<?php echo $ipaddr; ?>:8080/jsfs.html" width="1050" height="840" CONTROLLER="true" LOOP="false" AUTOPLAY="true" name="Lecture Video"></embed>
<!--            Embed the ip here Stuxnet-->
            <div class="btn-group btn-group">
                <a href="#" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Get disconnected from the video feed" >Disconnect</a>
<!--                <a href="http://172.26.80.126:8080/flash.html" target="_blank" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Get fullscreen video feed">Go Fullscreen</a>-->
                <a href="#" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Download Video feed">Lecture Download</a>
            </div>
            <br>
            <!--End it here-->

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
</div>
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
    });
</script>
<!--end of tooltip script-->
</body>

</html>
