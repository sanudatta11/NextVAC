<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 10/2/17
 * Time: 2:26 PM
 */

session_start();
unset($_SESSION['submitauth']);
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/connector.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/mysql_login.php';

if(isset($_SESSION['secretkey'])&& $_SESSION['designation']=='student')
{
    //Dont do anything this is a nice guy

}
else if(isset($_SESSION['secretkey']) && $_SESSION['designation']=='teacher')
{
    //Sorry mam go to your own dashboard dont roam around
    header('Location: ../../teacher/dashboard.php');
    die();
}
else{
    //No Secret key? No Dashboard Fuck Off
    $_SESSION['relogin'] = true;
    header('Location: ../../index.php?attempt=relogin');
    die();
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


//Verify Data send by Get or not

if(isset($_GET['contestcode']))
{
    $key = preg_replace("/[^A-Za-z0-9]+/","",$_GET['contestcode']);

    $coding_key_string = "SELECT * FROM nextvac.codingdb WHERE section = :section AND contestcode = :ccode AND status = 1";
    $coding_key_obj = $mysql_conn->prepare($coding_key_string);
    $coding_key_obj->bindParam(':section',$_SESSION['section'],PDO::PARAM_STR);
    $coding_key_obj->bindParam(':ccode',$key,PDO::PARAM_STR);

    $coding_key_obj->execute();
    $coding_key_obj->setFetchMode(PDO::FETCH_ASSOC);

    if($coding_key_obj->rowCount() > 0)
    {
        //He Has got it bro
        $details = $coding_key_obj->fetch();
    }
    else
    {
        //Fuck this guy telling wrong code
        $_SESSION['codeerror'] = true;
        header('Location: selectkey.php');
        die();
    }

}
else{
    header('Location: contest.php');
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

    <script src="../../js/backsupport/html5shiv.js"></script>
    <script src="../../js/backsupport/respond.js"></script>

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
            background-color: #629e60;
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
            background-color: #629e60;
            color: #fff;
            font-family: "Lato", "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Verdana, Tahoma, sans-serif;
            font-size: 25px;
        }

        .cp-detail-list {
            font-size: 17px;
        }

        .cp-detail-list-answer {
            font-family: "Lato", "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Verdana, Tahoma, sans-serif;
            font-size: 20px;
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
                <a href="../videoconnect/vidkeysub.php"><span class="glyphicon glyphicon-facetime-video"></span> VConnect</a>
            </li>
            <li>
                <a href="../question/quesstaging.php"><span class="glyphicon glyphicon-pencil"></span>`Solve Questions</a>
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

        <!--Do all fucking here--><br><br>
        <div class="cp-name">
            <div class="cp-font">
                <h2 class="rext text-default text-center"> <strong><?php echo $details['contestname']; ?></strong> </h2>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="cp-question col-xs-8">

                <?php

                $diff_level = "Hard";

                do{
                    if ($details['totaltestcase'] <= 3 && $details['marks'] <= 300)
                        $diff_level = "Easy";
                    elseif ($details['totaltestcase'] <= 5 && ($details['marks'] <= 400 && $details['marks'] > 300))
                        $diff_level = "Intermediate";
                    else
                        $diff_level = "Hard";

                    echo '
                        <div class="well">
                    <p class="text text-primary"><strong> <span class="glyphicon glyphicon-ok-sign"></span><a href="#"> <i>Challenge #'.$details['problemcode'].': </i>'.$details['problemname'].'</a></strong></p>
                    <div class="row">
                        <div class="col-xs-4">
                            <p class="text text-info">
                                <span class="glyphicon glyphicon-bell"></span> Total Points:' . $details['marks'] . '</p>
                        </div>
                        <div class="col-xs-4">
                            <p class="text text-info">
                                <span class="glyphicon glyphicon-thumbs-up"></span> Difficulty Level: ' . $diff_level . '</p>
                        </div>
                    </div>
                    
                    <form action ="problem.php" method="get">
                       <input type ="hidden" value="'.$key.'" name="contest">
                       <input type ="hidden" value="'.$details['problemcode'].'" name="problem">
                       <p class="text text-right">  <button type="submit" class="btn btn-success">Solve This</button></p>
                    </form>
                   
                </div>
                <br>  
                    ';


                }while($details = $coding_key_obj->fetch());


                ?>
            </div>
            <div class="col-xs-4">
                <div class="panel panel-primary" data-spy="affix" style="width: 400px;">
                    <div class="panel-body" id="cp-sidebar-heading">
                        <strong>Contest Details</strong>
                    </div>
                    <div class="panel-footer" id="cp-detail">
                        <!--Consider Two Label As 1 Unit-->
                        <label class="cp-detail-list"><i class="glyphicon glyphicon-flash fa-2x"></i>Status:&nbsp</label>
                        <!--Chnage to it by innerHTML-->
                        <label class="cp-detail-list-answer" id="detail-status">Ongoing</label>
                        <br><br>
                        <label class="cp-detail-list"><i class="glyphicon glyphicon-question-sign fa-1x"></i> Total Question:&nbsp</label>
                        <label class="cp-detail-list-answer" id="detail-total-question"><?php echo $coding_key_obj->rowCount(); ?></label>
                        <br><br>


                    </div>
                    <a href="leaderboard.php?lcode=<?php echo $key; ?>">
                        <button class="btn btn-block btn-success btn-sm"> <h3 class="text text-center"><strong>Leaderboad</strong></h3></button>
                    </a>

                    <br>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="well well-success">
                    <h3 class="text-success text-center"><b><a href="#top"><i>Back to top</i></a></b></h3>
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
    });
</script>
<!--end of tooltip script-->





</body>

</html>
