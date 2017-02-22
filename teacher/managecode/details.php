<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 6/2/17
 * Time: 10:09 PM
 */

//Stuxnet potty in the backend and I dont interfere in the frontend
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/teacher/validate.php';

//    Include Database Connetors
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/connector.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/mysql_login.php';


if(isset($_GET['ccode']))
{
    $ccode = preg_replace("/[^A-Za-z0-9]+/","",$_GET['ccode']);

    $code_search_string = "SELECT * FROM nextvac.codingdb WHERE contestcode = :ccode AND secretkey = :seckey ORDER BY problemcode";
    $code_search_obj = $mysql_conn->prepare($code_search_string);
    $code_search_obj->bindParam(':ccode',$ccode,PDO::PARAM_STR);
    $code_search_obj->bindParam(':seckey',$_SESSION['secretkey'],PDO::PARAM_STR);

    $code_search_obj->execute();

    if($code_search_obj->rowCount() > 0)
    {
        //Authorized show now
        $ques_details = $code_search_obj->fetch();
    }
    else{
        $_SESSION['mauth'] = true;
        header('Location: ../managecode/status.php?code=unauth');
        die();
    }
}
else{
    //No ccode
    header('Location: ../dashboard.php');
    die();
}

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
    <style type="text/css" media="screen">
        #editor {
            position: absolute;
            top: 1320px;
            right: 100px;
            bottom: 1000px;
            left: 100px;
        }

        #selectRow {
            margin-left: 50px;
        }
    </style>

    <!--You Need To Add these fucking styles-->
    <style>
        .cp-name {
            background-color: #4EBA0F;
            font-family: "Lato", "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Verdana, Tahoma, sans-serif;
            padding-bottom: 15px;
            height: 80px;
        }

        .cp-font {
            color: white;
            padding-top: 15px;
            padding-left: 30px;
            margin-top: 10px;
            font-size: 72px;
            margin-bottom: 35px;
        }

        #cp-sidebar-heading {
            background-color: #337ab7;
            width: 350px;
            color: #fff;
            font-family: "Lato", "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Verdana, Tahoma, sans-serif;
            font-size: 25px;
        }

        .cp-detail-list {
            font-size: 15px;
        }

        .cp-detail-list-answer {
            font-family: "Lato", "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Verdana, Tahoma, sans-serif;
            font-size: 25px;
        }
    </style>
</head>

<body style="background-color: #edf1f7">

<div id="wrapper">
    <a name=top></a>

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
                <a href="../addcode/manage.php"><span class="fa fa-code"></span> Coding Ground</a>
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
        <!--Do all fucking here--><br><br>
        <div class="cp-name">
            <div class="cp-font">
                <h2 class="rext text-default"> <?php echo $ques_details['contestname']; ?> </h2>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="cp-question col-xs-8">

              <?php
          echo '<div class="well">
                    <p class="text text-primary"><strong> <span class="glyphicon glyphicon-ok-sign"></span><a href="#"> <i>Code #'; echo $ques_details['problemcode']; echo ': </i> '; echo $ques_details['problemname']; echo '</a></strong></p>
                    <div class="row">
                        <div class="col-xs-4">
                            <p class="text text-info">
                                <span class="glyphicon glyphicon-hand-right"></span> Total submission: 252</p>
                        </div>
                        <div class="col-xs-4">
                            <p class="text text-info">
                                <span class="glyphicon glyphicon-bell"></span> Total Points: 500</p>
                        </div>
                        <div class="col-xs-4">
                            <p class="text text-info">
                                <span class="glyphicon glyphicon-thumbs-up"></span> Difficulty Level: Hard</p>
                        </div>
                    </div>
                </div>';

              ?>

                <br>

                <?php

                while( $ques_details = $code_search_obj->fetch())
                {
             echo '<div class="well">
                        <p class="text text-primary"><strong> <span class="glyphicon glyphicon-ok-sign"></span><a href="#"> <i>Code #'; echo $ques_details['problemcode']; echo ': </i> '; echo $ques_details['problemname']; echo '</a></strong></p>
                        <div class="row">
                            <div class="col-xs-4">
                                <p class="text text-info">
                                    <span class="glyphicon glyphicon-hand-right"></span> Total submission: 252</p>
                            </div>
                            <div class="col-xs-4">
                                <p class="text text-info">
                                    <span class="glyphicon glyphicon-bell"></span> Total Points: 500</p>
                            </div>
                            <div class="col-xs-4">
                                <p class="text text-info">
                                    <span class="glyphicon glyphicon-thumbs-up"></span> Difficulty Level: Hard</p>
                            </div>
                        </div>
                    </div>';
                }

                ?>



                <br>

            </div>
            <div class="col-xs-4">
                <div class="panel panel-primary" data-spy="affix">
                    <div class="panel-body" id="cp-sidebar-heading">
                        Contest Details
                    </div>
                    <div class="panel-footer" id="cp-detail">
                        <!--Consider Two Label As 1 Unit-->
                        <label class="cp-detail-list"><i class="glyphicon glyphicon-flash fa-2x"></i>Status:&nbsp</label>
                        <!--Chnage to it by innerHTML-->
                        <label class="cp-detail-list-answer" id="detail-status">Ongoing</label>
                        <br><br>
                        <!--Here Unit ends-->
                        <label class="cp-detail-list"><i class="glyphicon glyphicon-user fa-2x"></i> Total Registered:&nbsp</label>
                        <label class="cp-detail-list-answer" id="detail-total-user">4</label>
                        <br><br>
                        <label class="cp-detail-list"><i class="glyphicon glyphicon-question-sign fa-2x"></i> Total Question:&nbsp</label>
                        <label class="cp-detail-list-answer" id="detail-total-question">10</label>
                        <br><br>
                        <label class="cp-detail-list"><i class="glyphicon glyphicon-flag fa-2x"></i> Difficulty Level:&nbsp</label>
                        <label class="cp-detail-list-answer">Ace</label>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="well well-success">
                    <h3 class="text-primary text-center"><b><a href="#top"><i>Back to top</i></a></b></h3>
                </div>
            </div>
        </div>
        <!--/container-->
    </div><br><br><br><br><br><br>
    <nav class="navbar navbar-inverse navbar-fixed-bottom">
        <div class="container-fluid">
            <h5 class="text text-center" style="color: floralwhite;"> <strong>A Stux-Net Productions &copy; 2017</strong> </h5>
        </div>
    </nav>
    <!--ALERT HERE-->
</div>
<!--container ends here-->

<!-- /#page-content-wrapper -->
<!-- /#wrapper -->
<!-- jQuery -->
<script src="../../js/student.dashboard.jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="../../js/student.dashboard.bootstrap.min.js"></script>
<!-- Menu Toggle Script -->

<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();

        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    });
</script>
<!--end of tooltip script-->


</body>

</html>
