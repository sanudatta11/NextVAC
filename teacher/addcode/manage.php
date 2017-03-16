<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/2/17
 * Time: 11:21 AM
 */

session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/teacher/validate.php';

?>

<!--Navbar as usual-->
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/css?family=Taviraj" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="../../jquery/jquery.min.js"></script>
    <!--<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">-->
    <script src="../../bootstrap/css/bootstrap.min.css"></script>
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
    <script href="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script href="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
                <img src="../profile/<?php echo $_SESSION['propic']; ?>" align="center" height="170px" width="200px">
            </li>
            <li>
                <h4 class="text text-center text-default"> <a href="#"><strong><?php echo $_SESSION['name']; ?> </strong></a></h4>
            </li>
            <li>
                <h5 class="text text-center text-info"><a href="#"><strong>Cabin:</strong><?php echo $_SESSION['cabin']; ?></a></h5>
            </li>
            <li>
                <h5 class="text text-center text-info"><a href="#"><strong>Honour:</strong><?php echo $_SESSION['honour']; ?></a></h5>
            </li>
            <li>
                <a href="../dashboard.php"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a>
            </li>
            <li>
                <a href="../videoconnect/room.php"><span class="glyphicon glyphicon-facetime-video"></span> VConnect</a>
            </li>
            <li>
                <a href="#"> <span class="glyphicon glyphicon-book"></span> Digtal Library</a>
            </li>
            <li>
                <a href="#"><span class="fa fa-code"></span> Coding Ground</a>
            </li>
            <li>
                <a href="../addques/addstaging.php"><span class="glyphicon glyphicon-plus"></span> Add Q&A</a>
            </li>
            <li>
                <a href="../addques/manageset.php"><span class="glyphicon glyphicon-plus"></span> Manage Q&A</a>
            </li>
            <li>
                <a href="#"><span class="fa fa-share-alt"></span> File Share</a>
            </li>
            <li>
                <a href="#"><span class="fa fa-users"></span> ConnectYou</a>
            </li>
            <li>
                <a href="#"><span class="fa fa-user"></span> My Profile</a>
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
            <div class="row">
                <br> <br>
                <h1 class="text text-center"> <strong> &nbsp&nbsp&nbsp&nbspManage Your Coding  Challenges </strong></h1> <br>
                <!--Repeat this div-->
                <div class="container small_div">
                    <div class="col-xs-6">

                        <a href="adddetail.php">
                            <div class="card-begin">
                                <br> <br>
                                <div class="w3-card-8" data-toggle="tooltip" data-placement="top" title="Add Questions To Your Database" style="width:100%;">
                                    <header class="card-begin w3-blue">
                                        &nbsp
                                    </header>
                                    <div class=" card-begin ">

                                        <div class="row ">
                                            <br>
                                            <div class="col-xs-4 ">
                                                <span class="glyphicon glyphicon-floppy-open fa-3x "></span>
                                            </div>
                                            <div class="col-xs-8 ">
                                                <h1 class="text text-info" id="file_upload"> Add Questions <br>
                                                </h1>
                                            </div>
                                        </div>
                                    </div>
                                    <footer class="card-begin w3-blue ">
                                        &nbsp;
                                    </footer>
                                </div>
                            </div>
                        </a>

                    </div>

                    <div class="col-xs-6">

                        <a href="../managecode/status.php">
                            <div class="card-begin">
                                <br> <br>
                                <div class="w3-card-8" data-toggle="tooltip" data-placement="top" title="Change the status of question (Live/Delete)" style="width:100%;">
                                    <header class="card-begin w3-green">
                                        &nbsp
                                    </header>
                                    <div class=" card-begin ">

                                        <div class="row ">
                                            <br>
                                            <div class="col-xs-4">
                                                <span class="glyphicon glyphicon-edit fa-3x "></span>
                                            </div>
                                            <div class="col-xs-8 ">
                                                <h2 class="text text-success" id="file_download">Change Status<br>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <footer class="card-begin w3-green ">
                                        &nbsp;
                                    </footer>
                                </div>
                            </div>
                        </a>

                    </div>

            </div>
            <div class="row">
                <br>
                <!--<h1 class="text text-center"> <strong> &nbsp&nbsp&nbsp&nbsp Manage Your Questions </strong></h1> <br>-->
                <!--Repeat this div-->
                <div class="container small_div">
                    <div class="col-xs-6">

                        <a href="../leaderboard/list.php">
                            <div class="card-begin">
                                <br> <br>
                                <div class="w3-card-8" data-toggle="tooltip" data-placement="bottom" title="Get the dashboard of the class" style="width:100%;">
                                    <header class="card-begin w3-green">
                                        &nbsp
                                    </header>
                                    <div class=" card-begin ">

                                        <div class="row ">
                                            <br>
                                            <div class="col-xs-4 ">
                                                <span class="glyphicon glyphicon-equalizer fa-3x "></span>
                                            </div>
                                            <div class="col-xs-8 ">
                                                <h1 class="text text-success" id="file_upload"> Leaderboard<br>
                                                </h1>
                                            </div>
                                        </div>
                                    </div>
                                    <footer class="card-begin w3-green ">
                                        &nbsp;
                                    </footer>
                                </div>
                            </div>
                        </a>

                    </div>

                    <div class="col-xs-6">
                        <a href="#">
                            <div class="card-begin">
                                <br> <br>
                                <div class="w3-card-8" style="width:100%;" data-toggle="tooltip" data-placement="bottom" title="Get Class Wise Details">
                                    <header class="card-begin w3-blue">
                                        &nbsp
                                    </header>
                                    <div class=" card-begin ">

                                        <div class="row ">
                                            <br>
                                            <div class="col-xs-4">
                                                <span class="glyphicon glyphicon-folder-open fa-3x "></span>
                                            </div>
                                            <div class="col-xs-8 ">
                                                <h1 class="text text-info" id="file_download"> Class Data <br>
                                                </h1>
                                            </div>
                                        </div>
                                    </div>
                                    <footer class="card-begin w3-blue ">
                                        &nbsp;
                                    </footer>
                                </div>
                        </a>
                    </div>

                </div>

            </div>
        </div>
        <br> <br> <br>

    </div>
</div>
    <nav class="navbar navbar-inverse navbar-fixed-bottom">
        <div class="container-fluid">
            <h5 class="text text-center" style="color: floralwhite;"> <strong>A Stux-Net Productions &copy; 2017</strong> </h5>
        </div>
    </nav>



<!--All modals here-->
<!--Message Modal -->
<!-- /#page-content-wrapper -->
<!-- HackDev and BissoBoss Will poty here-->

<!-- /#wrapper -->

<!-- jQuery -->
<script src="../../js/student.dashboard.jquery.js "></script>

<!-- Bootstrap Core JavaScript -->
<script src="../../js/student.dashboard.bootstrap.min.js "></script>

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
        $('[data-toggle="tooltip "]').tooltip();
    });
</script>
<!--end of tooltip script-->
<!--Adding some scripts here-->
<!--Maybe in future-->
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
</body>

</html>
