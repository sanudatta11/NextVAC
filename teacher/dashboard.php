<?php
session_start();

//    Include Database Connetors
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/connector.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/mysql_login.php';

$_SESSION['authorize'] = false;
unset($_SESSION['authorize']);
unset($_SESSION['section']);
unset($_SESSION['quescode']);
unset($_SESSION['ques_validate']);
unset($_SESSION['ques_code']);
unset($_SESSION['ques_section']);

if(isset($_SESSION['secretkey']))
{
    if($_SESSION['designation'] == 'teacher')
    {
          //Query for teacher info
          //$find_teacher_info_string = "SELECT * FROM nextvac.teacherinfo WHERE secretkey = :seckey";
          $find_teacher_info_string = "SELECT * FROM nextvac.teacherinfo l,nextvac.login p WHERE l.secretkey = :seckey AND p.sessionvar = :sessvar LIMIT 1";
          $infoquery = $mysql_conn->prepare($find_teacher_info_string);
          $infoquery->bindParam(':seckey',$_SESSION['secretkey']);
          $infoquery->bindParam(':sessvar',session_id());
          $infoquery->execute();
          $infoquery->setFetchMode(PDO::FETCH_ASSOC);
          $details = $infoquery->fetch();

         //Find Profile related info (Status,Propic and later fuck)
          $find_profile_string = "SELECT * FROM nextvac.profile WHERE secretkey = :seckey";
          $find_profile = $mysql_conn->prepare($find_profile_string);
          $find_profile->bindParam(':seckey',$_SESSION['secretkey'],PDO::PARAM_STR);
          $find_profile->execute();
          $find_profile->setFetchMode(PDO::FETCH_ASSOC);
          $teacher_profile = $find_profile->fetch();


          if($infoquery->rowCount()>0 && $find_profile->rowCount() > 0)
            {
              $_SESSION['name']= filter_var($details['name'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
              $_SESSION['cabin'] = filter_var($details['cabin'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
              $_SESSION['specialisation'] = filter_var($details['specialisation'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
              $_SESSION['honour'] = filter_var($details['honour'],FILTER_SANITIZE_STRING);

              //Taking from Profile Table
              $_SESSION['propic'] = preg_replace("/[^A-Za-z.0-9]+/","",$teacher_profile['propic']);
              $_SESSION['incomming'] = filter_var($teacher_profile['incomming'], FILTER_SANITIZE_NUMBER_INT);
              $_SESSION['messages'] = filter_var($teacher_profile['messages'], FILTER_SANITIZE_NUMBER_INT);

              //Add email here if you want. It is in $teacher_profile var with key email

            }else{
                   session_unset();
                   session_destroy();
                   session_start();
                   $_SESSION['issue'] = 'contactadmin';
                   header('Location:index.php?attempt=help');
                   $mysql_conn = null;
                   die();
                  }

    }
    else if($_SESSION['designation'] == 'student')
    {
        echo "<script>console.log('In here');</script>";
        header('Location: ../student/dashboard.php');
        $mysql_conn = null;
        die();
    }

}else{
    session_unset();
    session_destroy();
    session_start();
    $_SESSION['relogin'] = true;
    header('Location: ../index.php?attempt=relogin');
    die();
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/css?family=Taviraj" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="../jquery/jquery.min.js"></script>
    <!--<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">-->
    <script src="../bootstrap/css/bootstrap.min.css"></script>
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
        <script href="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script href="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--    Piwik Tracker-->
    <script src="../include/tracker.js"></script>
    <!--    End of Piwik Tracker-->

</head>

<body style="background-color: #edf1f7">

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <li>
                        <img src="profile/<?php echo $_SESSION['propic']; ?>" align="center" height="170px" width="200px">
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
                        <a href=""><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a>
                    </li>
                    <li>
                        <a href="videoconnect/room.php"><span class="glyphicon glyphicon-facetime-video"></span> VConnect</a>
                    </li>
                    <li>
                        <a href="#"> <span class="glyphicon glyphicon-book"></span> Digtal Library</a>
                    </li>
                    <li>
                        <a href="addcode/manage.php"><span class="fa fa-code"></span> Coding Ground</a>
                    </li>
					<li>
                        <a href="addques/addstaging.php"><span class="glyphicon glyphicon-plus"></span> Add Q&A</a>
                    </li>
                    <li>
                        <a href="addques/manageset.php"><span class="glyphicon glyphicon-plus"></span> Manage Q&A</a>
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

            <div class="row">
                <br> <br>
                <h1> <strong> &nbsp&nbsp&nbsp&nbspTeacher's Dashboard </strong></h1>

                <div class="col-xs-4">
                    <div class="card-begin">
                        <br> <br>
                        <div class="w3-card-8" style="width:100%;">
                            <header class="card-begin w3-blue">
                                <h3>Attendance</h3>
                            </header>
                            <div class="card-begin">
                                <p>
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <span class="fa fa-comments-o fa-4x"></span>
                                        </div>
                                        <div class="col-xs-8">
                                            <h1 class="text text-info"> 5 </h1>
                                        </div>
                                    </div>
                            </div>
                            <footer class="card-begin w3-blue">
                                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#attendanceModal">Click For More Messages</button>
                            </footer>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="card-begin">
                        <br> <br>
                        <div class="w3-card-8" style="width:100%;">
                            <header class="card-begin w3-green">
                                <h3>Students Connected</h3>
                            </header>
                            <div class="card-begin">
                                <p>
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <span class="glyphicon glyphicon-edit fa-4x"></span>
                                        </div>
                                        <div class="col-xs-8">
                                            <h1 class="text text-success"> 78% </h1>
                                        </div>
                                    </div>
                            </div>
                            <footer class="card-begin w3-green">
                                <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#connectedModal">Click For More Messages</button>
                            </footer>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="card-begin">
                        <br> <br>
                        <div class="w3-card-8" style="width:100%;">
                            <header class="card-begin w3-blue-gray">
                                <h3> Q/A Stats</h3>
                            </header>
                            <div class="card-begin">
                                <p>
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <span class="glyphicon glyphicon-cloud-download fa-4x"></span>
                                        </div>
                                        <div class="col-xs-8">
                                            <h1 class="text text-primary"> 10 </h1>
                                        </div>
                                    </div>
                            </div>
                            <footer class="card-begin w3-blue-gray">
                                <button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#questionanswerModal">Click For More Messages</button>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4">

                    <div class="card-begin">
                        <br> <br>
                        <div class="w3-card-8" style="width:100%;">
                            <header class="card-begin w3-blue-gray">
                                <h3>My database</h3>
                            </header>

                            <div class="card-begin">
                                <p>
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <span class="glyphicon glyphicon-sunglasses fa-4x"></span>
                                        </div>
                                        <div class="col-xs-8">
                                            <h1 class="text text-info"> 0 </h1>
                                        </div>
                                    </div>
                            </div>

                            <footer class="card-begin w3-blue-gray">
                                <button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#databaseModal">Click For More Messages</button>
                            </footer>
                        </div>
                    </div>
                </div>


                <div class="col-xs-8">
                    <div class="card-begin">
                        <br> <br>
                        <div class="w3-card-8" style="width:100%;">
                            <header class="card-begin w3-blue">
                                <h3>Notifications</h3>
                            </header>

                            <div class="card-begin">
                                <p>
                                    <div class="row">
                                        <div class="col-xs-2">
                                            <span class="glyphicon glyphicon-tasks fa-4x">
                                        </div>
                                        <div class="col-xs-8">
                                            <h3 class="text text-primary"> <?php echo $_SESSION['messages']+$_SESSION['incomming']; ?> new Notifications </h3>
                                        </div>
                                    </div>
                            </div>

                            <footer class="card-begin w3-blue">
                                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#notificationModal">Click For More Messages</button>
                            </footer>
                        </div>
                    </div>
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
            <div id="attendanceModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Details of attendance</h4>
                        </div>
                        <div class="modal-body">
                            <p>Dynamically update messages here <br> <br> <br> <br> </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="connectedModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Number of connected students</h4>
                        </div>
                        <div class="modal-body">
                            <p>Dynamically update messages here <br> <br> <br> <br> </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="questionanswerModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Q/A Stats</h4>
                        </div>
                        <div class="modal-body">
                            <p>Dynamically update messages here <br> <br> <br> <br> </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="databaseModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">My database</h4>
                        </div>
                        <div class="modal-body">
                            <p>Dynamically update messages here <br> <br> <br> <br> </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div id="notificationModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">My Notifications</h4>
                        </div>
                        <div class="modal-body">
                            <p>Dynamically update messages here <br> <br> <br> <br> </p>
                            <?php
                                echo "<h5>".$_SESSION['messages']." New Messages are received</h5><br>";
                                echo "<h5>".$_SESSION['incomming']." New File Requests for you</h5><br>";
                            ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--container ends here-->
    </div>
    <!-- /#page-content-wrapper -->
    <!-- HackDev and BissoBoss Will poty here-->

    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/student.dashboard.jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/student.dashboard.bootstrap.min.js"></script>

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
</body>

</html>