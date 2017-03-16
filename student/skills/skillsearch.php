<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 16/3/17
 * Time: 9:02 PM
 */

session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/connector.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/mysql_login.php';

require_once $_SERVER['DOCUMENT_ROOT'].'/student/validate.php';

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

    <title>NEXT:VAC Video-Lec</title>
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

    <style>
        .add-on .input-group-btn>.btn {
            border-left-width: 0;
            left: -2px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        }
        /* stop the glowing blue shadow */

        .add-on .form-control:focus {
            box-shadow: none;
            -webkit-box-shadow: none;
            border-color: #cccccc;
        }

        .form-control {
            width: 20%
        }

        .well2:hover {
            box-shadow: 10px 10px 5px 5px #888888;
            cursor: pointer;
            border: 3px solid #bee0a6;
        }

        .navbar-nav>li>a {
            border-right: 1px solid #ddd;
            padding-bottom: 15px;
            padding-top: 15px;
        }

        .navbar-nav:last-child {
            border-right: 0
        }
    </style>
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
                <a href="vidkeysub.php"><span class="glyphicon glyphicon-facetime-video"></span> VConnect</a>
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
        <div class="row">
            <div class="col-xs-4">
                <div class="well">
                    <h2 class="text text-center text-success" style="font-family: Comic Sans MS;">
                        <strong> Input skills here</strong>
                    </h2>
                    <div class="container">
                        <form class="navbar-form" role="search">
                            <div class="input-group add-on">
                                <input class="form-control" placeholder="Type your skill here...." style="width: 250px" type="text" id="inputskill" name="inputskill" onfocus="changecol1()" onblur="changeback()">
                                <div class="input-group-btn">
                                    <button class="btn btn-success" type="submit">ADD</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="well well2">
                    <div class="row">
                        <div class="col-xs-6">
                            <li>HTML</li>
                        </div>
                        <div class="col-xs-2">
                            <i>Added</i>
                        </div>
                        <div class="col-xs-2">
                            <i>Remove</i>
                        </div>
                    </div>

                </div>
                <div class="well well2">
                    <div class="row">
                        <div class="col-xs-6">
                            <li>CSS</li>
                        </div>
                        <div class="col-xs-2">
                            <i>Added</i>
                        </div>
                        <div class="col-xs-2">
                            <i>Remove</i>
                        </div>
                    </div>

                </div>
                <div class="well well2">
                    <div class="row">
                        <div class="col-xs-6">
                            <li>Java</li>
                        </div>
                        <div class="col-xs-2">
                            <i>Added</i>
                        </div>
                        <div class="col-xs-2">
                            <i>Remove</i>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xs-4">
                <br><br><br>
                <p class="text text-center">
                    <input type="button" class="btn btn-primary btn-block" data-toggle="collapse" data-target="#skill" onclick="changeme()" id="myskill" value="View my skill set">
                <div id="skill" class="collapse">
                    <ol>
                        <div class="well">
                            <li>HTML</li>
                        </div>
                        <div class="well">
                            <li>CSS</li>
                        </div>
                        <div class="well">
                            <li>JAVA</li>
                        </div>
                        <div class="well">
                            <li>Youtube</li>
                        </div>
                    </ol>

                </div>

                </p>
            </div>
            <div class="col-xs-4">
                <div class="well">
                    <h2 class="text text-center text-warning" style="font-family: Comic Sans MS;">
                        <strong>Search skills here</strong>
                    </h2>
                    <div class="container">
                        <form class="navbar-form" role="search">
                            <div class="input-group add-on">
                                <input class="form-control" placeholder="Search the skill here...." style="width: 250px" type="text" id="searchskill" name="searchskill" onfocus="changecol2()" onblur="changeback()">
                                <div class="input-group-btn">
                                    <button class="btn btn-warning" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="container">
                        <h4 class="text text-success">Skill search result : </h4>
                        <div class="media">
                            <div class="media-right">
                                <img src="http://hd-wall-papers.com/images/wallpapers/profile-pics/profile-pics-14.jpg" class="media-object" style="width:60px; margin-right: 10px;">
                            </div>
                            <div class="media-body" id="one">
                                <strong><a href="#"> Biswarup Banerjee</a></strong>
                                <p>
                                <li> HTML </li>
                                <li> CSS </li>
                                <li>JavaScript</li>
                                <li>PHP</li>
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="media" id="two">
                            <div class="media-right">
                                <img src="http://4.bp.blogspot.com/-BHhUazKytmw/VbCfWPqrOJI/AAAAAAAAB7c/qj6WVX3du-s/s1600/51b91bba5a3fd9b6c8b9c53bc0ab6c65.jpg" class="media-object" style="width:60px; margin-right: 10px;">
                            </div>
                            <div class="media-body">
                                <a href="#"><strong> Neha Banerjee</strong></a>
                                <p>
                                <li> PHP </li>
                                <li> Angular2 </li>
                                <li>Peer JS</li>
                                <li>Peer Love</li>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <br><br><br>




            <nav class="navbar navbar-inverse navbar-fixed-bottom">
                <div class="container-fluid">

                    <h6 class="text text-info"> A Stux-Net Productions &copy; 2017 </h6>


                </div>
            </nav>
            <!--ALERT HERE-->
        </div>
        <!--container ends here-->
    </div>
    <!-- /#page-content-wrapper -->
    <!-- HackDev and BissoBoss Will poty here-->

    <!-- /#wrapper -->
    <script>
        function changeme() {
            document.getElementById('myskill').value = "List of my skills: ";
        }

        function changecol1() {
            document.getElementById('inputskill').style = "background: #e3e9f2; width: 250px";
        }

        function changecol2() {
            document.getElementById('searchskill').style = "background: #e3e9f2; width: 250px";

        }

        function changeback() {
            document.getElementById('inputskill').style = "background: white; width: 250px";
            document.getElementById('searchskill').style = "background: white;width: 250px ";


        }
    </script>

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
            $("#wrapper").toggleClass("toggled");
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <!--end of tooltip script-->
</body>

</html>
