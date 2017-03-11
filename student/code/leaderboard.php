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

if(isset($_GET['lcode']) && isset($_SESSION['secretkey']) && isset($_SESSION['designation']))
{
    $key = preg_replace("/[^A-Za-z0-9]+/","",$_GET['lcode']);

    //Checking that the code received is of the users section or not
    $section_check = $mysql_conn->prepare('SELECT * FROM nextvac.codingdb WHERE contestcode = :ccode AND section = :sectiond');
    $section_check->bindParam(':ccode',$key);
    $section_check->bindParam(':sectiond',$_SESSION['section']);
    $section_check->execute();
    if($section_check->rowCount() > 0)
    {
        //totally cool
    }
    else{
        //Redirect Wrong Code for you
        $_SESSION['message'] = "Wrong Code!";
        header('Location: contest.php');
        die();
    }

    $lead_obj = $mysql_conn->prepare('SELECT secretkey,SUM(score) as score,MAX(subtime) as time FROM nextvac.coderesults WHERE contestcode = :ccode group by secretkey ORDER BY score DESC,time');
    $lead_obj->bindParam(':ccode',$key,PDO::PARAM_STR);
    $lead_obj->execute();

    if($lead_obj->rowCount() > 0)
    {
        $lead_obj->setFetchMode(PDO::FETCH_ASSOC);
    }
    else{
        echo '<script>window.alert("Code Error! or Data not found")</script>';
        header('Location: ../../index.php');
        die();
    }
}
else{
    header('Location: ../../index.php');
    die();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/css?family=Taviraj" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script href="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!--<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">-->
    <script href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--<link rel="stylesheet" href="nav.css">-->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Taviraj" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Aldrich" rel="stylesheet">

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
        @import url(http://fonts.googleapis.com/css?family=Roboto:400,500,300,700);

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

        h1 {
            font-size: 30px;
            color: #fff;
            text-transform: uppercase;
            font-weight: 300;
            text-align: center;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            table-layout: fixed;
        }

        .tbl-header {
            background-color: rgba(255, 255, 255, 0.3);
        }

        .tbl-content {
            max-height: 650px;
            overflow-x: auto;
            margin-top: 0px;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        th {
            padding: 20px 15px;
            text-align: left;
            font-weight: 500;
            font-size: 12px;
            color: #fff;
            text-transform: uppercase;
        }

        td {
            padding: 15px;
            text-align: left;
            vertical-align: middle;
            font-weight: 300;
            font-size: 12px;
            color: #fff;
            border-bottom: solid 1px rgba(255, 255, 255, 0.1);
        }
        /* demo styles */

        body {
            background: -webkit-linear-gradient(left, #170c28, #25b7c4);
            background: linear-gradient(to right, #170c28, #6f6282);
            font-family: 'Roboto', sans-serif;
        }

        section {
            margin: 50px;
        }

        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        }

        ::-webkit-scrollbar-thumb {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        }
    </style>
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
                <a href="../question/quesstaging.php"><span class="glyphicon glyphicon-pencil"></span>Solve Questions</a>
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

        <a href="top"></a>
        <section>
            <!--for demo wrap-->
            <h1><b>Leaderboard</b></h1>
            <h1><b><?php
                    $score_info_obj = $mysql_conn->prepare('SELECT contestname FROM nextvac.codingdb WHERE contestcode = :ccode LIMIT 1');
                    $score_info_obj->bindParam(':ccode',$key);
                    $score_info_obj->execute();

                    if($score_info_obj->rowCount() > 0)
                    {
                        $temp_det = $score_info_obj->fetch();
                        echo $temp_det['contestname'];
                    }
                    else{
                        //Not Gonna Happen
                        echo '<script>window.alert("Code Error! or Data not found")</script>';
                        header('Location: ../../index.php');
                        die();
                    }

                    ?></b></h1>
            <div class="tbl-header">
                <table cellpadding="0" cellspacing="0" border="0">
                    <thead>
                    <tr>

                        <th>Avatar</th>
                        <th>Rank</th>
                        <th>Name</th>
                        <th>Total Score</th>
                    </tr>
                    </thead>
                </table>
            </div>
            <div class="tbl-content" id="first10">
                <table cellpadding="0" cellspacing="0" border="0" id="count">
                    <tbody id="details2">

                    <?php
                    $counter = 1;
                    $initial = '../../student/profile/images/';
                    while ($detail_lead = $lead_obj->fetch())
                    {
                        //Get few details about each person
                        $seckey = $detail_lead['secretkey'];

                        $info_obj = $mysql_conn->prepare('SELECT propic,firstname,lastname FROM nextvac.profile WHERE secretkey = :seckey LIMIT 1');
                        $info_obj->bindParam(':seckey',$seckey);
                        $info_obj->execute();
                        if($info_obj->rowCount() > 0 )
                        {
                            $info_obj->setFetchMode(PDO::FETCH_ASSOC);
                            $pro_info = $info_obj->fetch();
                            $name = $pro_info['firstname'].' '.$pro_info['lastname'];
                            $propic = $pro_info['propic'];
                            $final_path = $initial.$propic;
                            echo '
                        <tr id="'.$counter.'" style="display: none">
                            <td>
                                <img src="'.$final_path.'" class="img-rounded" alt="'.$name.'" width="30" height="23">
                            </td>
                            <td>'.$counter.'</td>
                            <td>'.$name.'</td>
                            <td>'.$detail_lead['score'].'</td>
                        </tr>
                    ';
                            $counter++;
                        }
                        else{
                            //Dont Show Pic
                            //For Debug keep it open or else uncomment the below lines
//                    echo '<script>window.alert("Some Error Occcures!")</script>';
//                    header('Location: ../../index.php');
//                    die();
                        }

                    }

                    ?>

                    </tbody>

                </table>

            </div>
            <div class="row">
                <div class="col-xs-5">

                </div>
                <div class="col-xs-1">
                    <p class="text text-center"> <br><input type="button" class="btn btn-primary" id="button2" value="Prev ranks" disabled/>

                </div>
                <div class="col-xs-1">
                    <p class="text text-center"> <br><input type="button" class="btn btn-primary" id="button1" value="Next ranks" />

                </div>
            </div>


        </section>

        <!--/container-->
    </div>
    <br><br><br><br><br><br>
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
<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
<script src="../../js/student.dashboard.jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="../../js/student.dashboard.bootstrap.min.js"></script>
<!--ALl Script-->
<script src ="../../js/leaderboard/mainjquery.js"></script>



</body>

</html>
