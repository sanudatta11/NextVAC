<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/3/17
 * Time: 12:04 AM
 */
session_start();

//    Include Database Connetors
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/connector.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/mysql_login.php';

if(isset($_SESSION['secretkey']) && isset($_SESSION['designation']) && $_SESSION['designation'] == 'master')
{

}
else{

    unset($_SESSION);
    session_abort();
    session_destroy();
    header('Location: ../index.php');
    die();
}

$info_conn_string = 'SELECT SUM(visit_total_interactions) AS result FROM nextvac.piwiklog_visit';
$info_conn_obj = $mysql_conn->prepare($info_conn_string);
$info_conn_obj->execute();
$info_conn_obj->setFetchMode(PDO::FETCH_ASSOC);
if($info_conn_obj->rowCount() > 0)
{
    $result = $info_conn_obj->fetch();
    $total_visits = $result['result'];
}
else{
    $total_visits = 0;
}

$total_file_uploaded = 0;
$total_account_requests = 0;

//Getting much more data for the number of accounts that have been created
$total_student = 0;
$total_teacher = 0;
$total_master = 0;

//Student Account Search
$info_conn_string = "SELECT COUNT(*) AS countit FROM nextvac.studentinfo";
$info_conn_obj = $mysql_conn->prepare($info_conn_string);
$info_conn_obj->execute();
$info_conn_obj->setFetchMode(PDO::FETCH_ASSOC);
$result = $info_conn_obj->fetch();
$total_student = $result['countit'];


//Teacher Account Search
$info_conn_string = "SELECT COUNT(*) AS countit FROM nextvac.teacherinfo";
$info_conn_obj = $mysql_conn->prepare($info_conn_string);
$info_conn_obj->execute();
$info_conn_obj->setFetchMode(PDO::FETCH_ASSOC);
$result = $info_conn_obj->fetch();
$total_teacher = $result['countit'];


//Master Account Search
$info_conn_string = "SELECT COUNT(*) AS countit FROM nextvac.login WHERE designation = :desig";
$info_conn_obj = $mysql_conn->prepare($info_conn_string);
$info_conn_obj->bindValue(':desig','master');
$info_conn_obj->execute();
$info_conn_obj->setFetchMode(PDO::FETCH_ASSOC);
$result = $info_conn_obj->fetch();
$total_master = $result['countit'];



?>

<html>

<head>
    <title> NextVAC</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!--<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--<link rel="stylesheet" href="nav.css">-->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css">
    <script type="text/javascript" src="../fusion_charts/js/fusioncharts.js"></script>
    <script type="text/javascript" src="../fusion_charts/js/themes/fusioncharts.theme.fint.js"></script>
    <script type="text/javascript">
        FusionCharts.ready(function() {
            var analytics = new FusionCharts({
                "type": "column3d",
                "renderAt": "chartContainer",
                "width": "500",
                "height": "500",
                "dataFormat": "json",
                "dataSource": {
                    "chart": {
                        "caption": "Page and Page Hits",
                        "subCaption": "NextVAC: Virtually Aided Classrooms",
                        "xAxisName": "Page Name",
                        "yAxisName": "Number of hits",
                        "theme": "fint"
                    },
                    "data": [{
                        "label": "Login Page",
                        "value": "420000"
                    }, {
                        "label": "V-Connect",
                        "value": "810000"
                    }, {
                        "label": "Live Q/A",
                        "value": "720000"
                    }, {
                        "label": "You Connect",
                        "value": "550000"
                    }, {
                        "label": "Digital Library",
                        "value": "910000"
                    }, ]
                }
            });

            analytics.render();
        })
    </script>
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

<body>

<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li>
                <h4 class="text text-center text-default"> <a href="#"><strong>NextVAC Master</strong></a></h4>
            </li>
            <li>
                <h5 class="text text-center text-info"><a href="#"><strong>Master Id: </strong> </a></h5>
            </li>
            <li>
                <a href="#"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a>
            </li>
            <li>
                <a href="addnetwork.php"><span class="glyphicon glyphicon-facetime-video"></span> Network Suite </a>
            </li>
            <li>
                <a href="#"> <span class="glyphicon glyphicon-book"></span> Digtal Library</a>
            </li>
            <li>
                <a href="#"><span class="fa fa-code"></span> Coding Ground</a>
            </li>
            <li>
                <a href="#"><span class="glyphicon glyphicon-plus"></span> Add Q&A</a>
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
        <div class="container">
            <br><br><br>

            <div class="row">
                <div class="col-xs-3">
                    <div class="w3-card-8" data-toggle="tooltip" data-placement="bottom" title="200 views today" style="width:100%;">
                        <header class="card-begin w3-green">
                            &nbsp
                        </header>
                        <div class=" card-begin ">

                            <div class="row ">
                                <br>
                                <div class="col-xs-4">

                                    <span class="glyphicon glyphicon-eye-open fa-3x "></span>
                                </div>
                                <div class="col-xs-8 ">
                                    <h3 class="text text-success"><strong>200</strong></h3>
                                    <h5 class="text text-success"> Page views
                                </div>
                            </div>
                        </div>


                        <footer class="card-begin w3-green ">
                            &nbsp;
                        </footer>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="w3-card-8" data-toggle="tooltip" data-placement="bottom" title="500 total views" style="width:100%;">
                        <header class="card-begin w3-blue-gray">
                            &nbsp
                        </header>
                        <div class=" card-begin ">

                            <div class="row ">
                                <br>
                                <div class="col-xs-4">

                                    <span class="glyphicon glyphicon-sunglasses fa-3x "></span>
                                </div>
                                <div class="col-xs-8 ">
                                    <h3 class="text text-success"><strong><?php echo $total_visits; ?></strong></h3>
                                    <h5 class="text text-success"> Total Page views
                                </div>
                            </div>
                        </div>
                        <footer class="card-begin w3-blue-gray ">
                            &nbsp;
                        </footer>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="w3-card-8" data-toggle="tooltip" data-placement="bottom" title="7 feedbacks" style="width:100%;">
                        <header class="card-begin w3-blue">
                            &nbsp
                        </header>
                        <div class=" card-begin ">

                            <div class="row ">
                                <br>
                                <div class="col-xs-4">

                                    <span class="glyphicon glyphicon-envelope fa-3x "></span>
                                </div>
                                <div class="col-xs-8 ">
                                    <h3 class="text text-info"><strong>50</strong></h3>
                                    <h5 class="text text-success">Feedbacks
                                </div>
                            </div>
                        </div>
                        <footer class="card-begin w3-blue ">
                            &nbsp;
                        </footer>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="w3-card-8" data-toggle="tooltip" data-placement="bottom" title="100 active users " style="width:100%;">
                        <header class="card-begin w3-green">
                            &nbsp
                        </header>
                        <div class=" card-begin ">

                            <div class="row ">
                                <br>
                                <div class="col-xs-4">

                                    <span class="glyphicon glyphicon-thumbs-up  fa-3x "></span>
                                </div>
                                <div class="col-xs-8 ">
                                    <h3 class="text text-success"><strong>200</strong></h3>
                                    <h5 class="text text-success"> Active Users
                                </div>
                            </div>
                        </div>
                        <footer class="card-begin w3-green ">
                            &nbsp;
                        </footer>
                    </div>
                </div>
            </div>
            <br><br><br>
            <div class="row">
                <div class="col-xs-6">
                    <div class="well" style=" cursor: hand; ">
                        <h2 class="text text-info text-center" onclick="move()"><strong><span class="glyphicon glyphicon-flag"></span> Page hits graph</strong> </h2>
                    </div>


                    <div id="come_here">
                        <div id="chartContainer">

                        </div>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="well" style=" cursor: hand; ">
                        <h2 class="text text-primary text-center" onclick="move()"><strong><span class="glyphicon glyphicon-user"></span> User counts</strong> </h2>
                    </div>
                    <div class="container" style="width: 500px; padding-top: 50px;">
                        <table class="table">
                            <thead>
                            <tr>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>

                            <tr class="success">
                                <td>
                                    <li>Number of student accounts</li>
                                </td>
                                <td>
                                    <?php echo $total_student; ?>
                                </td>

                            </tr>
                            <tr class="danger">
                                <td>
                                    <li>Number of teacher account</li>
                                </td>
                                <td><?php echo $total_teacher; ?></td>

                            </tr>
                            <tr class="info">
                                <td>
                                    <li>Number of master account</li>
                                </td>
                                <td><?php echo $total_master; ?></td>

                            </tr>
                            <tr class="danger">
                                <td>
                                    <li>Number of files uploaded</li>
                                </td>
                                <td><?php echo $total_file_uploaded;?></td>
                            </tr>
                            <tr class="info">
                                <td>
                                    <li>Number of account requests</li>
                                </td>
                                <td><?php echo $total_account_requests; ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
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


    <!--ALERT HERE-->
</div>


<script src="../js/student.dashboard.jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/student.dashboard.bootstrap.min.js"></script>

<!-- Menu Toggle Script -->

<script>
    function move() {
        window.scrollTo(0, 300);
    }
</script>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled"); //copy this line and paste it under document.ready tag
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
