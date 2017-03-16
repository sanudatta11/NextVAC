<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/2/17
 * Time: 11:31 AM
 */
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/teacher/validate.php';

if(isset($_SESSION['ccode']) && isset($_SESSION['csection']))
{
    header('Location: addcode.php');
    die();
}

$error = false;

if(isset($_GET['code']) && isset($_SESSION['ccode']))
{
    $error = true;
    if($_SESSION['ccode'] == 'taken' && $_GET['code'] == 'taken')
    {
        $message = 'The Code is already taken!';
    }
    elseif ($_SESSION['ccode'] == 'invalid' && $_GET['code'] == 'wrongsection')
    {
        $message = "You dont't teach this section!";
    }
    elseif ($_SESSION['ccode'] == 'movefailed' && $_GET['code'] == 'movefailed')
    {
        $message = "We couldn't save the files!";
    }
    unset($_SESSION['ccode']);
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
                <a href="manage.php"><span class="fa fa-code"></span> Coding Ground</a>
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

        <br> <br>
        <div class="container">

            <div class="myquestiondiv  well well-lg">
                <h2 class="text text-info text-center">
                    <i class="glyphicon glyphicon-menu-hamburger"></i>
                    <strong> Contests Upload</strong></h2>
                <br>
                <!--Define the form action here-->
                <form class="form-horizontal" action="submit/verify.php" name="detailform" method="post">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="sectionu">
                            <i class="glyphicon glyphicon-edit"></i> Your section</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="sectionu" placeholder="Enter Section Here" onKeyup="ValidateSection()" onblur="ValidateSection()" name="section" autocomplete="off" required>
                            <br>
                        </div>
                        <br>
                        <label class="control-label col-sm-2" for="qcode">
                            <i class="glyphicon glyphicon-list-alt"></i> Contest Code</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="qcode" name="ccode" placeholder="Enter A Desired Question Code" onKeyup="ValidateSection()" onblur="ValidateSection()" autocomplete="off" required> <br>

                        </div>
                        <br>
                        <label class="control-label col-sm-2" for="sectionu">
                            <i class="glyphicon glyphicon-edit"></i> Contest Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="contest_name" placeholder="Enter Contest Name Here"  name="cname" autocomplete="off" required>
                            <br>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-xs-2">

                            </div>
                            <div class="col-xs-10">
                                <button class="btn btn-lg btn-success" id="proceedbutton"  onclick="onSubmit()" type="submit"> Proceed </button>

                            </div>
                        </div>

                        <br><br>

                    </div>

                </form>
            </div>

            <div class="alert alert-danger alert-dismissable fade in <?php if(!$error) echo "hide"; ?>">
                <!--                Showing warning if something went wrong with code and section-->
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Sorry!</strong> <?php if($error) echo $message; ?>
            </div>

        </div>

        <nav class="navbar navbar-inverse navbar-fixed-bottom">
            <div class="container-fluid">
                <h5 class="text text-center" style="color: floralwhite;"> <strong>A Stux-Net Productions &copy; 2017</strong> </h5>
            </div>
        </nav>

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
<!--Start of our fucking scripts-->
<script>
    function ValidateSection() {
        var f = document.forms["detailform"].elements;
        var cansubmit = true;
        for (var i = 0; i < f.length; i++) {
            if (/[^a-zA-Z0-9]/.test(f[i].value)) {
                cansubmit = false;
                console.log(cansubmit);
            }
        }
        document.getElementById('proceedbutton').disabled = !cansubmit;
    }
    function onSubmit() {
        var section = document.getElementById('sectionu').value;
        var qcode = document.getElementById('qcode').value;
        var cansubmit = true;
        if (section.length == 0 || qcode.length == 0) {
            cansubmit = false;
            // alert('Please Fill All The Fields');
        }
        document.getElementById('proceedbutton').disabled = !cansubmit;
    }
</script>
</body>

</html>
