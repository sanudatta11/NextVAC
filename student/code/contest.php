<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 10/2/17
 * Time: 3:09 PM
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

if(isset($_SESSION['message']))
{
    echo '<script>window.alert("'.$_SESSION['message'].'");</script>';
    unset($_SESSION['message']);
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

//Verify Data send by Post or not


    $coding_key_string = "SELECT contestcode FROM nextvac.codingdb WHERE section = :section GROUP BY contestcode";
    $coding_key_obj = $mysql_conn->prepare($coding_key_string);
    $coding_key_obj->bindParam(':section',$_SESSION['section'],PDO::PARAM_STR);

    $coding_key_obj->execute();
    $coding_key_obj->setFetchMode(PDO::FETCH_ASSOC);

    if($coding_key_obj->rowCount() > 0)
    {
        //He Has got it bro

    }
    else
    {
        //Fuck this guy no contests available
        $_SESSION['codeerror'] = true;
//        echo '<script>window.alert("Wrong Code or You have no Coding Contests")</script>';
        header('Location: ../dashboard.php');
        die();
    }

?>

<!--Navbar as usual-->
<!DOCTYPE html>
<html>
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
                <img src="../profile/images/<?php echo $_SESSION['propic'];?>"" align="center" height="170px" width="200px">
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
                <a href="../question/quesstaging.php"><span class="glyphicon glyphicon-pencil"></span>Solve Questions</a>
            </li>
            <li>
                <a href="#"> <span class="glyphicon glyphicon-book"></span> Digtal Library</a>
            </li>
            <li>
                <a href="<?php $_SERVER['PHP_SELF'];?>"><span class="fa fa-code"></span> Coding Ground</a>
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
                <a href="#" class="fancybox" rel="group" onclick="feedback()"><span class="glyphicon glyphicon-th"></span> Feedback</a>
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
                <h1 class="text text-center"> <strong> &nbsp&nbsp&nbsp&nbspYour Contests </strong></h1> <br>
                <!--Repeat this div-->

<!--                    Repeat this for succesfull ones-->

                    <?php

                    while ($details = $coding_key_obj->fetch())
                    {
                        $status_string = "SELECT status FROM nextvac.codingdb WHERE section = :section AND contestcode = :ccode AND status = 1";
                        $status_obj = $mysql_conn->prepare($status_string);
                        $status_obj->bindParam(':section',$_SESSION['section'],PDO::PARAM_STR);
                        $status_obj->bindParam(':ccode',$details['contestcode'],PDO::PARAM_STR);

                        $status_obj->execute();

                        if($status_obj->rowCount() > 0)
                        {
                            echo '
                        <div class="col-xs-6">
                 
                            <div class="card-begin">
                                <br> <br>


                
                        
                        <a href="queslist.php?contestcode='.$details['contestcode'].'">
                            <div class="w3-card-8 " data-toggle="tooltip" data-placement="top" title="This challenge is active" style="width:100%;">
                                <header class="card-begin w3-green">
                                    &nbsp
                                </header>
                                <div class=" card-begin ">

                                    <div class="row ">
                                        <br>
                                        <div class="col-xs-2">
                                            <span class="glyphicon glyphicon-star fa-3x "></span>
                                        </div>
                                        <div class="col-xs-10 ">
                                            <h3 class="text text-info" id="file_download">'.$details['contestcode'].'<br>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <footer class="card-begin w3-green">
                                    &nbsp;
                                </footer>
                            </div>
                        </a>
                    </div>
                </div>
                            ';

                        }
                        else
                        {
                            echo '
                            
                           <div class="col-xs-6">
                 
                            <div class="card-begin">
                                <br> <br>


                
                        
                        <a style="cursor:not-allowed">
                            <div class="w3-card-8 w3-hover-opacity" data-toggle="tooltip" data-placement="top" title="This challenge is not active" style="width:100%;">
                                <header class="card-begin w3-blue-gray">
                                    &nbsp
                                </header>
                                <div class=" card-begin ">

                                    <div class="row ">
                                        <br>
                                        <div class="col-xs-2">
                                            <span class="glyphicon glyphicon-hourglass fa-3x "></span>
                                        </div>
                                        <div class="col-xs-10 ">
                                            <h3 class="text text-info" id="file_download">'.$details['contestcode'].'<br>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <footer class="card-begin w3-blue-gray">
                                    &nbsp;
                                </footer>
                            </div>
                        </a>
                    </div>
                </div>
                        
                            ';

                        }

                    }

                    ?>






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
