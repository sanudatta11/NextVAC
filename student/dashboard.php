<?php
    //Start Auth
    session_start();
    unset($_SESSION['submitauth']);
    unset($_SESSION['quescode']);
    unset($_SESSION['found']);
    //    Include Database Connetors
    require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/connector.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/mysql_login.php';

    if(isset($_SESSION['secretkey'])&&$_SESSION['designation']=='student')
    {
        if(isset($_SESSION['codeerror']) && $_SESSION['codeerror'] = true)
        {
            unset($_SESSION['codeerror']);
            echo '<script>window.alert("Sorry No Contest found for You")</script>';
        }

        //Do something here .
        $new_id = session_id();

        //Query For Student info
        $find_student_info_string = "SELECT name,section,regno,attendance,rank FROM nextvac.studentinfo l,nextvac.login p WHERE l.secretkey = :seckey AND p.sessionvar = :sessvar LIMIT 1";
        $infoquery = $mysql_conn->prepare($find_student_info_string);
        $infoquery->bindParam(':seckey',$_SESSION['secretkey']);
        $infoquery->bindParam(':sessvar',$new_id);
        $infoquery->execute();
        $infoquery->setFetchMode(PDO::FETCH_ASSOC);
        $details = $infoquery->fetch();

        //Find Profile related info (Status,Propic and later fuck)
        $find_profile_string = "SELECT * FROM nextvac.profile WHERE secretkey = :seckey";
        $find_profile = $mysql_conn->prepare($find_profile_string);
        $find_profile->bindParam(':seckey',$_SESSION['secretkey']);
        $find_profile->execute();
        $find_profile->setFetchMode(PDO::FETCH_ASSOC);
        $student_profile = $find_profile->fetch();

        //Fetching Global Datas
        $global_data_obj = $mysql_conn->prepare('SELECT * FROM nextvac.globaldata');
        $global_data_obj->execute();
        $global_data_obj->setFetchMode(PDO::FETCH_ASSOC);
        $gdata = $global_data_obj->fetch();

        //Setting Global College Data
        $_SESSION['cname'] = $gdata['name'];
        $_SESSION['crank'] = filter_var($gdata['crank'], FILTER_SANITIZE_NUMBER_INT);
        $_SESSION['cevents'] = filter_var($gdata['events'], FILTER_SANITIZE_NUMBER_INT);;

        //Now Checking and Storing Info
        if($infoquery->rowCount() > 0 && $find_profile->rowCount() > 0) {
            //Assign Session Variables for Student from student Info Table

            $_SESSION['regno'] = filter_var($details['regno'], FILTER_SANITIZE_NUMBER_INT);
            $_SESSION['section'] = preg_replace("/[^A-Z0-9]+/", "", $details['section']);
            $_SESSION['attendance'] = filter_var($details['attendance'], FILTER_SANITIZE_NUMBER_INT);
            $_SESSION['rank'] = filter_var($details['rank'], FILTER_SANITIZE_NUMBER_INT);

            //Taking from Profile Table
            $_SESSION['name'] = filter_var($student_profile['firstname']." ".$student_profile['lastname'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
            $_SESSION['propic'] = preg_replace("/[^ \w.]+/", "",$student_profile['propic']);
            $_SESSION['incomming'] = filter_var($student_profile['incomming'], FILTER_SANITIZE_NUMBER_INT);
            $_SESSION['messages'] = filter_var($student_profile['messages'], FILTER_SANITIZE_NUMBER_INT);
            $_SESSION['status'] = preg_replace("/[^ \w]+/", "", $student_profile['status']);
        }
        else{
            unset($_SESSION);
            header('Location: ../index.php?attempt=relogin');
            die();
        }

    }
    else if(isset($_SESSION['secretkey']) && $_SESSION['designation']=='teacher')
    {
        header('Location: ../teacher/dashboard.php');
        die();
    }
    else{
        //No Secret key? No Dashboard Fuck Off
        $_SESSION['relogin'] = true;
        header('Location: ../index.php?attempt=relogin');
        die();
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
    <script src="../jquery/jquery.min.js"></script>
    <!--<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">-->
    <script src="../bootstrap/css/bootstrap.min.css"></script>
    <!--<link rel="stylesheet" href="nav.css">-->
    <link rel="stylesheet" href="../css/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="../css/font-awesome/font-awesome.css">
    <link href="../css/googlefonts/orbitron.css" rel="stylesheet">
    <link href="../css/googlefonts/taviraj.css" rel="stylesheet">
    <link href="../css/googlefonts/aldrich.css" rel="stylesheet">

    <title>NextVAC</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/theme/dashboard_bootstrap_min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/theme/dashboard_simple-sidebar.css" rel="stylesheet">
    <link href="../css/theme/dashboard.css" rel="stylesheet">

    <script src="../js/backsupport/html5shiv.js"></script>
    <script src="../js/backsupport/respond.js"></script>


</head>

<body style="background-color: #edf1f7">

<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">

            <li>
                <img src="profile/images/<?php echo $_SESSION['propic'];?>" align="center" height="170px" width="200px">
            </li>
            <li>
                <h5 class="text text-center text-info"><strong><?php echo $_SESSION['name'] ?></strong></h5>
            </li>
            <li>
                <h5 class="text text-center text-info"><strong><?php echo $_SESSION['regno'] ?></strong></h5>
            </li>
            <li>
                <a href="#"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a>
            </li>
            <li>
                <a href="videoconnect/vidkeysub.php"><span class="glyphicon glyphicon-facetime-video"></span> VConnect</a>
            </li>
            <li>
                <a href="question/quesstaging.php"><span class="glyphicon glyphicon-pencil"></span></span>Solve Questions</a>
            </li>
            <li>
                <a href="#"> <span class="glyphicon glyphicon-book"></span> Digtal Library</a>
            </li>
            <li>
                <a href="code/contest.php"><span class="fa fa-code"></span> Coding Ground</a>
            </li>
            <li>
                <a href="#"><span class="fa fa-share-alt"></span> File Share</a>
            </li>
            <li>
                <a href="#"><span class="fa fa-users"></span> ConnectYou</a>
            </li>
            <li>
                <a href="profile/view.php"><span class="fa fa-user"></span> My Profile</a>
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
                        <img src="../images/brand.png" alt="Brand">
                    </a>
                </div>
                <a href="#menu-toggle" class="btn btn-danger navbar-btn" id="menu-toggle"><h3 class="brand-header">NextVAC</h3>&nbsp&nbsp&nbsp<span class="glyphicon glyphicon-th-list"></span></a>
                <ul class="nav navbar-nav">
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a><span class="glyphicon glyphicon-education fa-1x"> <b><?php echo $_SESSION['section'] ?></b></span></a></li>
                    <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span><b> Log Out</b></a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-home"></span><b> Reach Us</b></a></li>
                </ul>
            </div>
        </nav>

        <div class="row">
            <br> <br>
            <h1> <strong> &nbsp&nbsp&nbsp&nbspStudent's Dashboard </strong></h1>

<!--            The Message Card-->
            <div class="col-xs-4">
                <div class="card-begin">
                    <br> <br>
                    <div class="w3-card-8" style="width:100%;">
                        <header class="card-begin w3-blue">
                            <h3>My messages</h3>
                        </header>
                        <div class="card-begin">
                            <p>
                            <div class="row">
                                <div class="col-xs-4">
                                    <span class="fa fa-comments-o fa-4x"></span>
                                </div>
                                <div class="col-xs-8">
                                    <h1 class="text text-info"><?php echo $_SESSION['messages']; ?></h1>
                                </div>
                            </div>
                        </div>
                        <footer class="card-begin w3-blue">
                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#messageModal">More Info</button>
                        </footer>
                    </div>
                </div>
            </div>

<!--            The Attendance Card-->
            <div class="col-xs-4">
                <div class="card-begin">
                    <br> <br>
                    <div class="w3-card-8" style="width:100%;">
                        <header class="card-begin w3-green">
                            <h3>My Attendance</h3>
                        </header>
                        <div class="card-begin">
                            <p>
                            <div class="row">
                                <div class="col-xs-4">
                                    <span class="glyphicon glyphicon-edit fa-4x"></span>
                                </div>
                                <div class="col-xs-8">
                                    <h1 class="text text-success"> <?php echo $_SESSION['attendance']; ?> </h1>
                                </div>
                            </div>
                        </div>
                        <footer class="card-begin w3-green">
                            <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#attendanceModal">More Info</button>
                        </footer>
                    </div>
                </div>
            </div>

<!--            File Request Card-->
            <div class="col-xs-4">
                <div class="card-begin">
                    <br> <br>
                    <div class="w3-card-8" style="width:100%;">
                        <header class="card-begin w3-blue-gray">
                            <h3> Incomings</h3>
                        </header>
                        <div class="card-begin">
                            <p>
                            <div class="row">
                                <div class="col-xs-4">
                                    <span class="glyphicon glyphicon-cloud-download fa-4x"></span>
                                </div>
                                <div class="col-xs-8">
                                    <h1 class="text text-primary"><?php echo $_SESSION['incomming']; ?> </h1>
                                </div>
                            </div>
                        </div>
                        <footer class="card-begin w3-blue-gray">
                            <button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#incomingsModal">More Info</button>
                        </footer>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-4">

<!--                Event Card-->
                <div class="card-begin">
                    <br> <br>
                    <div class="w3-card-8" style="width:100%;">
                        <header class="card-begin w3-blue-gray">
                            <h3>Upcoming events</h3>
                        </header>

                        <div class="card-begin">
                            <p>
                            <div class="row">
                                <div class="col-xs-4">
                                    <span class="glyphicon glyphicon-sunglasses fa-4x"></span>
                                </div>
                                <div class="col-xs-8">
                                    <h1 class="text text-info"> <?php echo $_SESSION['cevents']; ?> </h1>
                                </div>
                            </div>
                        </div>

                        <footer class="card-begin w3-blue-gray">
                            <button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#eventsModal">More Info</button>
                        </footer>
                    </div>
                </div>
            </div>

            <div class="col-xs-4">
                <div class="card-begin">
                    <br> <br>
                    <div class="w3-card-8" style="width:100%;">
                        <header class="card-begin w3-yellow">
                            <h3>My Rank</h3>
                        </header>

                        <div class="card-begin">
                            <p>
                            <div class="row">
                                <div class="col-xs-4">
                                    <span class="glyphicon glyphicon-pushpin fa-4x"></span>
                                </div>
                                <div class="col-xs-8">
                                    <h1 class="text text-success">
                                        <?php
                                        if(empty($_SESSION['rank']))
                                            echo 'Brewing!';
                                        else
                                            echo $_SESSION['rank'];
                                    ?></h1>
                                </div>
                            </div>
                        </div>

                        <footer class="card-begin w3-yellow">
                            <button type="button" class="btn btn-warning btn-block" data-toggle="modal" data-target="#rankModal">More Info</button>
                        </footer>
                    </div>
                </div>
            </div>

<!--            College Rank Card-->
            <div class="col-xs-4">
                <div class="card-begin">
                    <br> <br>
                    <div class="w3-card-8" style="width:100%;">
                        <header class="card-begin w3-blue">
                            <h3>College Rank</h3>
                        </header>

                        <div class="card-begin">
                            <p>
                            <div class="row">
                                <div class="col-xs-4">
                                    <span class="fa fa-star-o fa-4x"></span>
                                </div>
                                <div class="col-xs-8">
                                    <h1 class="text text-success"> <?php echo $_SESSION['crank']; ?> </h1>
                                </div>
                            </div>
                        </div>

                        <footer class="card-begin w3-blue">
                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#collegeModal">More Info</button>
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
        <div id="messageModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">My Messages</h4>
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
        <div id="attendanceModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">My Attendance</h4>
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
        <div id="incomingsModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">My Incomings</h4>
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
        <div id="eventsModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Upcoming Events</h4>
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
        <div id="rankModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">My Rank</h4>
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
        <div id="collegeModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">College Rank</h4>
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
        $("#wrapper").toggleClass("toggled");
    });
</script>
<!--end of tooltip script-->
<script>

    function feedback()
    {
        window.open('feedback/feedbackform.html');
    }

</script>

</body>

</html>
