<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 14/3/17
 * Time: 6:52 PM
 */

session_start();
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
                <a href="#"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a>
            </li>
            <li>
                <a href="#"><span class="glyphicon glyphicon-facetime-video"></span> VConnect</a>
            </li>
            <li>
                <a href="#"> <span class="glyphicon glyphicon-book"></span> Digtal Library</a>
            </li>
            <li>
                <a href="#"><span class="fa fa-code"></span> Coding Ground</a>
            </li>
            <li>
                <a href="#"><span class="glyphicon glyphicon-plus"></span> Add Q&A</a>
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
                    <li><a href="#"><span class="glyphicon glyphicon-log-out"></span><b> Log Out</b></a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-home"></span><b> Reach Us</b></a></li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <br><br><br>
            <h2 class="text text-center"><strong>Remove Teacher from the  NextVAC network</strong> </h2>
            <br> <br>

            <br>

            <form class="form-horizontal" role="form" action="delteacher.php" method="get">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Registration Number:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="number" placeholder="Enter UserId number here...." id="username" name="username">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        <input type="button" class="btn btn-danger" value="Remove Teacher" data-toggle="modal" data-target="#myModal">
                        <span></span>
                        <input type="button" class="btn btn-default" value="Done" id="donebt" onclick="window.location.href='../addnetwork.php'">
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
                                <h4 class="text text-default"> <strong>Are you sure you want to delete the Teacher records? </strong> </h4>
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

