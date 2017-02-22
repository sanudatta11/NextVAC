<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 26/1/17
 * Time: 9:39 AM
 */
session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/connector.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/mysql_login.php';

if($_SESSION['designation'] != 'teacher' || !isset($_SESSION['secretkey']))
{
    $_SESSION['relogin'] = true;
    header('Location: ../../index.php?attempt=relogin');
    die();
}

if(!(isset($_SESSION['propic'])&&isset($_SESSION['name'])&&isset($_SESSION['cabin'])))
{
    $_SESSION['issue'] = 'contactadmin';
    header('Location: ../../index.php?attempt=help');
    die();
}
if(isset($_GET['code']) || isset($_SESSION['quescode'])) {

    if(isset($_SESSION['deletedone']))
    {
        if($_SESSION['deletedone'] == true)
        {
            echo "<script>window.alert('Successfully Deleted Question!')</script>";
        }else{
            echo "<script>window.alert('Cannot Delete Question');</script>";
        }
        unset($_SESSION['deletedone']);
    }
    if($_SESSION['livedone'])
    {
        if($_SESSION['livedone'] == 'live')
        {
            echo "<script>window.alert('Successfully made Question Live!')</script>";
        }else if($_SESSION['livedone'] == 'notlive'){
            echo "<script>window.alert('Cancelled Question Live Status!')</script>";
        }
        else{
            echo "<script>window.alert('Cannot Make Question Live');</script>";
        }
        unset($_SESSION['livedone']);
    }

    if(isset($_GET['code']))
    {
        $inpcode = preg_replace("/[^A-Za-z0-9]+/","",$_GET['code']);
        $_SESSION['quescode'] = $inpcode;
    }else{
        $inpcode = $_SESSION['quescode'];
    }

    $search_code_string ="SELECT * FROM nextvac.questiondb WHERE code =:quescode  AND secretkey = :seckey ORDER BY codeid";
    $search_code = $mysql_conn->prepare($search_code_string);
    $search_code->bindParam(':quescode',$inpcode,PDO::PARAM_STR);
    $search_code->bindParam(':seckey',$_SESSION['secretkey'],PDO::PARAM_STR);

    $search_code->execute();
    $search_code->setFetchMode(PDO::FETCH_ASSOC);

    if($search_code->rowCount() >0)
    {
        //Now Code is verified
    }
    else{
        //Code submiited not found
        header('Location: ../manageset.php?attempt=illegal');
        die();
    }
}
else{
    header('Location: ../manageset.php');
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/css?family=Taviraj" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="../../../jquery/jquery.min.js"></script>
    <!--<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">-->
    <script src="../../../bootstrap/css/bootstrap.min.css"></script>
    <!--<link rel="stylesheet" href="nav.css">-->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Taviraj" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Aldrich" rel="stylesheet">


    <title>NextVAC</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../../css/theme/dashboard_bootstrap_min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../../css/theme/dashboard_simple-sidebar.css" rel="stylesheet">
    <link href="../../../css/theme/dashboard.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script href="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script href="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style="background-color: #edf1f7">

<div id="wrapper">


    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
            <li>
                <img src="../../profile/<?php echo $_SESSION['propic']; ?>" align="center" height="170px" width="200px">
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
                <a href="../../dashboard.php"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a>
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
            <li class>
                <a href="#"><span class="glyphicon glyphicon-plus"></span> Add Q&A</a>
            </li>
            <li>
                <a href="../manageset.php"><span class="glyphicon glyphicon-plus"></span> Manage Q&A</a>
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
                        <img src="../../../images/brand.png" alt="Brand">
                    </a>
                </div>
                <a href="#menu-toggle" class="btn btn-danger navbar-btn" id="menu-toggle">
                    <h3 class="brand-header">NextVAC</h3>&nbsp&nbsp&nbsp<span class="glyphicon glyphicon-th-list"></span></a>
                <ul class="nav navbar-nav">
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../../../logout.php"><span class="glyphicon glyphicon-log-out"></span><b> Log Out</b></a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-home"></span><b> Reach Us</b></a></li>
                </ul>
            </div>
        </nav>
        <div class="container" style="width: 1000px;">
            <br><br><br>
        <?php

        while($detail_code = $search_code->fetch())
        {
            $question = $detail_code['question'];
            $opt1 = $detail_code['first'];
            $opt2 = $detail_code['second'];
            $opt3 = $detail_code['third'];
            $opt4 = $detail_code['fourth'];
            $codeid = $detail_code['codeid'];
            $correct = $detail_code['correct'];
            $status = $detail_code['status'];
            if($status)
            {
                $class = "btn btn-danger";
                $text = "Cancel Live!";
            }
            else{
                $class = "btn btn-warning";
                $text = "Make Live!";
            }

            echo '
            <div class="panel panel-primary">
                <div class="panel-heading">


                    <div class="row">
                        <div class="col-xs-9">
                            <wbr><h3><b>'; echo $question; echo '</b></h3></wbr>';

              echo '</div>
                        <div class="col-xs-3">
                            <div class="btn-group">
                            <a href="makelive.php?code='.$inpcode.'&id='.$codeid.'" class="'.$class.'">
                         
                                '.$text.'
                             </a>
                            <a href="deleteques.php?code='.$inpcode.'&id='.$codeid.'" class="btn btn-info">
                              Delete
                             </a>
                            </div>


                        </div>
                    </div>
                </div>';

           echo '<div class="panel-body" id="mcq_answer">

                    <ol class="answers">
                        <li class="answer"><b>';echo $opt1;echo '</b></li>
                        <li class="answer"><b>';echo $opt2;echo '</b></li>
                        <li class="answer"><b>';echo $opt3;echo '</b></li>
                        <li class="answer"><b>';echo $opt4;echo '</b></li>
                    </ol>
            </div>
            </div>
        ';
        }

        ?>

    </div>
    <br> <br> <br> <br> <br> <br>
        <nav class="navbar navbar-inverse navbar-fixed-bottom">
            <div class="container-fluid">
                <h5 class="text text-center" style="color: floralwhite;"> <strong>A Stux-Net Productions &copy; 2017</strong> </h5>
            </div>
        </nav>





<!--container ends here-->
<!-- /#page-content-wrapper -->
<!-- HackDev and Stuxnet Will poty here-->

<!-- /#wrapper -->

<!-- jQuery -->
<script src="../../../js/student.dashboard.jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../../../js/student.dashboard.bootstrap.min.js"></script>

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
    $('button').click(function () {
        $(this).toggleClass("btn btn-warning btn-lg btn btn-danger btn-lg");
    });

    });
</script>
<!--end of tooltip script-->
</body>

</html>
