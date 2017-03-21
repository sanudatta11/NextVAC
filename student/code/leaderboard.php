<?php
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

    <![endif]-->
    <style>
        @import url(http://fonts.googleapis.com/css?family=Roboto:400,500,300,700);

        input:focus {
            background-color: #fbffce;
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
            background-color: #8a8c9b;
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
            color: black;
            border-bottom: solid 1px rgba(255, 255, 255, 0.1);
        }

        tr:hover {
            background: #c2d1d3;
            cursor: hand;
            /*border-bottom: 5px solid #b3b5b5;
            border-left: 7px solid #b3b5b5;*/
            box-shadow: 1px 10px #91a08d;
        }

        hr.leader {
            border-top: 1px solid #8c8b8b;
            text-align: center;
        }
        hr.leader:after {
            content: '§';
            display: inline-block;
            position: relative;
            top: -14px;
            padding: 0 10px;
            background: #f0f0f0;
            color: #8c8b8b;
            font-size: 18px;
            -webkit-transform: rotate(60deg);
            -moz-transform: rotate(60deg);
            transform: rotate(60deg);
        }

        /* demo styles */

        body {
            /*background: -webkit-linear-gradient(left, #efedea, #25b7c4);
            background: linear-gradient(to right, #efedea, #6f6282);*/
            background-color: #edf1f7;
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

        .not selected {
            font-size: 22px;
        }

        .selected {
            background: #e6e8f7;
            /*border-color: #75aaff;
            border-width: 3px;*/
            box-shadow: 1px 1px 1px 1px;
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
                <ul class="nav navbar-nav navbar-right">
                    <li><a><span class="glyphicon glyphicon-education fa-1x"> <b><?php echo $_SESSION['section'] ?></b></span></a></li>
                    <li><a href="../../logout.php"><span class="glyphicon glyphicon-log-out"></span><b> Log Out</b></a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-home"></span><b> Reach Us</b></a></li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <br> <br>
            <h1 class="text text-center text-info" style="color: #0a8cce;margin-bottom: 0px;padding-bottom: 0px;"><b>Leaderboard</b></h1><br>
            <hr class="leader">
            <h1 class="text text-center text-info"><b><?php
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
            <div class="well" style="cursor: hand;">
                <section>
                    <!--for demo wrap-->

                    <div class="tbl-header">
                        <table cellpadding="0" cellspacing="0" border="0">
                            <thead style="background: #17464f;">
                            <tr>

                                <th>Avatar</th>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>Total</th>
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
                                    $class_name = "notselected";
                                    if($_SESSION['secretkey'] == $seckey)
                                    {
                                        $class_name="selected";
                                    }
                                    echo '
                                        <tr id="'.$counter.'" style="display: none" class="'.$class_name.'">
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
                    <br>
                    <div class="row">
                        <div class="col-xs-5">

                        </div>
                        <div class="col-xs-5">

                            <div class="btn-group">
                                <button type="button" class="btn btn-primary " id="button2" value="Prev ranks" disabled>Prev ranks</button>
                                <button type="button" class="btn btn-primary" id="button1" value="Next ranks" >Next ranks</button>

                            </div>



                        </div>

                    </div>


                </section>
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
<!-- /#page-content-wrapper -->

<!-- /#wrapper -->

<!-- jQuery -->
<script src="../../js/student.dashboard.jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../../js/student.dashboard.bootstrap.min.js"></script>
<script src="../../js/leaderboard/mainjquery.js"></script>
<!--script to activate all toolkit-->
<!--end of tooltip script-->
</body>

</html>