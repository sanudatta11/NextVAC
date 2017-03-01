<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/2/17
 * Time: 10:50 AM
 */

session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/teacher/validate.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/confidential/connector.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/confidential/mysql_login.php';

$card_check_string = "SELECT contestcode FROM nextvac.codingdb WHERE secretkey = :seckey group by contestcode";
$card_obj = $mysql_conn->prepare($card_check_string);
$card_obj->bindParam(':seckey',$_SESSION['secretkey']);
$card_obj->execute();
$card_obj->setFetchMode(PDO::FETCH_ASSOC);

$section_check_string = "SELECT section FROM nextvac.codingdb WHERE secretkey = :seckey AND contestcode = :ccode LIMIT 1";
$section_obj = $mysql_conn->prepare($section_check_string);
$section_obj->bindParam(':seckey',$_SESSION['secretkey']);


if(isset($_SESSION['setupdate']) && $_GET['update'] = 'success' && $_SESSION['setupdate']!= false)
{
    $msg = $_SESSION['setupdate'];
    if($msg == 'live')
    {
        echo '<script>window.alert("Your Contest is Up now!")</script>';
    }else if($msg == 'notlive')
    {
        echo '<script>window.alert("Your Contest is taken off!")</script>';
    }else if($msg == 'del')
    {
        echo '<script>window.alert("Your Contest is deleted Successfully!")</script>';
    }
    unset($_SESSION['setupdate']);
}

if(isset($_GET['code']) && $_GET['code'] == 'unauth' && $_SESSION['mauth'] == true)
{
    echo '<script>window.alert("Sorry but that code is not authorized")</script>';
    unset($_SESSION['mauth']);
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
    <script src="control.js"></script>

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
        <div class="container">
            <form method="post" action="changeprop/startcontest.php" id="manageform">
                <div class="row">
                    <br> <br>
                    <h1> <strong> &nbsp&nbsp&nbsp&nbsp Manage Challenges </strong></h1>

                    <?php

                    if($card_obj->rowCount() > 0)
                    {
                        while($detail_card = $card_obj->fetch())
                        {
                            $section_obj->bindParam(':ccode',$detail_card['contestcode']);
                            $section_obj->execute();
                            $section_obj->setFetchMode(PDO::FETCH_ASSOC);
                            $section = $section_obj->fetch();
                            echo '
                            <div class="col-xs-6">
                                <div class="card-begin">
                                    <br> <br>
                                    <div class="w3-card-8" style="width:100%;">
                                        <header class="card-begin w3-blue">
                                        
                                            &nbsp <input type="checkbox" name="cardcheck[]" value="'; echo $detail_card['contestcode']; echo '" id="card_check">
                                        
                                        </header>';
                            echo '<a href="details.php?ccode=';echo $detail_card['contestcode'];echo'">
                                        <div class=" card-begin ">

                                            <div class="row ">
                                                <div class="col-xs-4 ">
                                                    <span class="fa fa-comments-o fa-4x "></span>
                                                </div>
                                                
                                                <div class="col-xs-8 ">
                                                    <h1 class="text text-info ">'; echo $detail_card['contestcode'];
                            echo '</h1>
                                                </div>
                                            
                                            </div>
                                        </div>
                                        </a>
                                        <footer class="card-begin w3-blue ">
                                        <h3 class="text text-default text-center">
                                            &nbsp;';
                                        echo $section['section'];
                                        echo '
                                        </h3>
                                        </footer>
                                    </div>
                                </div>
                            </div>
                       ';

                        }

                    }else{

                    }



                    ?>


                </div>
                <br><br><br>

                <div class="btn-group" style="right: -15px;">
                    <button class="btn btn-success btn-lg" type="submit" id="live">Start Contest</button>
                    <button class="btn btn-warning btn-lg" type="submit" id="clive">Stop Contest</button>
                    <button class="btn btn-danger btn-lg" type="submit" id="delete">Delete Contest</button>
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


    <!--All modals here-->
    <!--Message Modal -->
</div>
<!--container ends here-->

<!-- /#page-content-wrapper -->
<!-- HackDev and BissoBoss  and Stuxnet Will poty here-->

<!-- /#wrapper -->

<!-- jQuery -->
<script src="../../js/student.dashboard.jquery.js "></script>

<!-- Bootstrap Core JavaScript -->
<script src="../../js/student.dashboard.bootstrap.min.js "></script>

<!-- Menu Toggle Script -->

<!--end of tooltip script-->
</body>

</html>
