<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 15/3/17
 * Time: 11:13 PM
 */
session_start();

//    Include Database Connetors
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/connector.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/mysql_login.php';

if(isset($_GET['ac_key']))
{
    $account_key = preg_replace("/[^A-Za-z0-9]+/", "",$_GET['ac_key']);
    if(isset($account_key)){

        $input_string = "SELECT * FROM nextvac.uniquecreate WHERE uniqueid = :uid LIMIT 1";
        $input_obj = $mysql_conn->prepare($input_string);
        $input_obj->bindParam(':uid',$account_key,PDO::PARAM_STR);
        $input_obj->execute();
        if($input_obj->rowCount() > 0)
        {
            $input_obj->setFetchMode(PDO::FETCH_ASSOC);
            $detail = $input_obj->fetch();
            $uid = $detail['uniqueid'];
            $created =  $detail['created'];
            if($created == 0)
            {
                $donecreate = false;
                unset($_SESSION['ac_key']);
                $_SESSION['ac_key'] = $account_key;
            }
            elseif ($created == 1)
            {
                $donecreate = true;
            }else{
                $donecreate = true;
            }

        }
        else{
            //Incorrect Key
        }
    }
    else{
        header('Location: ../index.php');
        die();
    }
}
else{
    header('Location: ../index.php');
    die();
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

    <!--    Piwik Tracker-->
    <script src="../include/tracker.js"></script>
    <!--    End of Piwik Tracker-->
</head>

<body style="background-color: #edf1f7">

<div id="wrapper">
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
                <a class="btn btn-danger navbar-btn" >
                    <h3 class="brand-header">NextVAC</h3>&nbsp&nbsp&nbsp<span class="glyphicon glyphicon-th-list"></span></a>
                <ul class="nav navbar-nav">
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="http://www.nextvac.in/"><span class="glyphicon glyphicon-home"></span><b> Reach Us</b></a></li>
                </ul>
            </div>
        </nav>


        <?php if(isset($donecreate) && $donecreate == false): ?>
            <div class="container">
                <br><br><br>
                <h2 class="text text-center"><strong>Add Yourself to NextVAC network</strong> </h2>
                <br> <br>
                <br>

                <form class="form-horizontal" role="form" method="post" action="addstud/creatorstud.php">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">UserId:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="number" name="username" id="username" placeholder="Enter userid here...." autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">First name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" name="firstname" id="firstname" placeholder="Enter first name here...." autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Last name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" name="lastname" id="lastname" placeholder="Enter first name here...." autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Registration number:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="number" name="regno" id="regno" placeholder="Enter registration number here...." autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Section:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" name="section" id="section" placeholder="Enter section name here...." autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Course:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" id="course" name="course" value="" placeholder="Enter course name here...." autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Email:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="email" id="email" name="email" placeholder="Enter email id here...." autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Phone Number:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="number" id="number" name="number" placeholder="Enter phone number here...." autocomplete="off" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Year of study: </label>
                        <div class="col-lg-8">
                            <div class="ui-select">
                                <select class="form-control" name="semester" id="semester" required>
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
                        <label class="col-lg-3 control-label">Gender: </label>
                        <div class="col-lg-8">
                            <div class="ui-select">
                                <select class="form-control" name="gender" id="gender">
                                    <option value="1" selected="selected">Male</option>
                                    <option value="2">Female</option>
                                    <option value="3">Other</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-8">
                            <input type="submit" class="btn btn-primary" value="Save Changes">
                            <span></span>
                            <input type="reset" class="btn btn-default" value="Cancel">
                        </div>
                    </div>
                </form>
            </div>
        <?php endif; ?>


        <?php if(isset($donecreate) && $donecreate == true): ?>
            <br><br><br><br>
            <div class="alert alert-danger" style="position: relative; right: -30px;">
                <h5><strong>Sorry!</strong> The Unique ID is already Used!</h5>
            </div>
        <?php endif; ?>

        <?php if(!isset($donecreate)): ?>
            <br><br><br><br>
            <div class="alert alert-danger" style="position: relative; right: -30px;">
                <h5><strong>Sorry!</strong> The Unique ID is you entered is wrong!</h5>
            </div>
        <?php endif; ?>


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
<script src="../js/student.dashboard.jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/student.dashboard.bootstrap.min.js"></script>

<!-- Menu Toggle Script -->

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
