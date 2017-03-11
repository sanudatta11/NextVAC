<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 1/3/17
 * Time: 2:24 PM
 */

session_start();



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
?>

<!--Navbar as usual-->
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/css?family=Taviraj" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <link href="../css/theme/dashboard_bootstrap_min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/theme/dashboard_simple-sidebar.css" rel="stylesheet">
    <link href="../css/theme/dashboard.css" rel="stylesheet">

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
                <img src="Profile/mia.jpg" align="center" height="170px" width="200px">
            </li>
            <li>
                <h4 class="text text-center text-default"> <a href="#"><strong>Mia Mam </strong></a></h4>
            </li>
            <li>
                <h5 class="text text-center text-info"><a href="#"><strong>MID. Number: </strong> 11602153</a></h5>
            </li>
            <li>
                <a href="#"><span class="glyphicon glyphicon-dashboard"></span>Dashboard</a>
            </li>
            <li>
                <a href="#"><span class="glyphicon glyphicon-facetime-video"></span>Add to Network</a>
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
                 <a href="www.google.com">
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
                    <a href="hfisud.com">
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
                    <a href="ksasghda.com">
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
                    <a href="asgd.in">
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
