<?php session_start();
unset($_SESSION['submitauth']);
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
                <a href="#"><span class="glyphicon glyphicon-pencil"></span>Solve Questions</a>
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
                    <li><a href="#"><span class="glyphicon glyphicon-log-out"></span><b> Log Out</b></a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-home"></span><b> Reach Us</b></a></li>
                </ul>
            </div>
        </nav>
        <!--Do all fucking here-->

        <br> <br>

        <h1 class="text text" style="font-family: 'Orbitron', sans-serif;"> <strong> Live Question Answers</strong></h1>
        <br>


        <?php
        /**
         * Created by PhpStorm.
         * User: root
         * Date: 25/1/17
         * Time: 3:19 PM
         */

        session_start();

        //    Include Database Connetors
        require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/connector.php';
        require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/mysql_login.php';

        if(isset($_SESSION['secretkey'])&& $_SESSION['designation']=='student')
        {
            $find_student_info_string = "SELECT sessionvar FROM nextvac.login WHERE secretkey = :seckey AND sessionvar = :sessvar LIMIT 1";
            $infoquery = $mysql_conn->prepare($find_student_info_string);
            $infoquery->bindParam(':seckey',$_SESSION['secretkey']);
            $infoquery->bindParam(':sessvar',session_id());
            $infoquery->execute();
            if($infoquery->rowCount() >0)
            {

            }else{
                $_SESSION['relogin'] = true;
                header('Location: ../../index.php?attempt=relogin');
                die();
            }


            if(isset($_POST['quesset']) || isset($_SESSION['quescode']))
            {
                if($_SESSION['quescode'])
                {
                    $quescode = preg_replace("/[^A-Za-z0-9]+/", "", $_SESSION['quescode']);
                }
                else{
                    $quescode = preg_replace("/[^A-Za-z0-9]+/", "", $_POST['quesset']);
                }
               // echo "<script>window.alert('Hello');</script>";
                $ques_query_string_one = "SELECT * FROM nextvac.questiondb WHERE section = :section AND code = :quescode AND status = 1 order by codeid";
                $ques_query_one = $mysql_conn->prepare($ques_query_string_one);
                $ques_query_one->bindParam(':quescode',$quescode,PDO::PARAM_STR);
                $ques_query_one->bindParam(':section',$_SESSION['section'],PDO::PARAM_STR);

                $ques_query_one->execute();
                $ques_query_one->setFetchMode(PDO::FETCH_ASSOC);
               // echo "<script>window.alert('Hello');</script>";
                if($ques_query_one->rowCount() > 0)
                {
                  //  echo "<script>window.alert('Hello');</script>";
                    $_SESSION['quescode'] = $quescode;
                    $flag = 0;
                    while ($details = $ques_query_one->fetch())
                    {
                        $question = $details['question'];
                        $codeid = $details['codeid'];

                        $ques_query_string_two = "SELECT * FROM nextvac.answersdb WHERE secretkey = :seckey AND quescode = :quescode AND codeid = :codeid";
                        $ques_query_two = $mysql_conn->prepare($ques_query_string_two);
                        $ques_query_two->bindParam(':seckey',$_SESSION['secretkey']);
                        $ques_query_two->bindParam(':codeid',$codeid,PDO::PARAM_STR);
                        $ques_query_two->bindParam(':quescode',$quescode,PDO::PARAM_STR);

                        $ques_query_two->execute();

                        if($ques_query_two->rowCount() > 0)
                        {
                            //Already Answered so skip it
                            //echo "No";

                        }
                        else{
                            $flag =1;
                            //Echo the question totally here
                            //echo "<script>window.alert('Hello u');</script>";
//                            <!--Start Here-->
                            echo '<div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <wbr>';
                                            echo '<b>';
                                            echo $question;
                                            echo '</b>';
                                            echo '</wbr>
                                        </div>
                                    </div>
                                </div>';

//                         <!-- Insert Question Here-->
                                echo '<b>';
                                echo '<form action="saveans.php" method="post">
                                    <div class="panel-body">
                                        <label class="radio-inline"><input type="radio" name="';
                                        echo $codeid;
                                        echo '" value="1">';
                                        echo $details['first']; echo '</label>';
                                        echo '<label class="radio-inline"><input type="radio" name="';
                                        echo $codeid;
                                        echo '" value="2">';
                                        echo $details['second'];
                                        echo '</label>';
                                        echo '<label class="radio-inline"><input type="radio" name="';
                                        echo $codeid;
                                        echo '" value="3">';
                                        echo $details['third'];
                                        echo '</label>';
                                        echo '<label class="radio-inline"><input type="radio" name="';
                                        echo $codeid;
                                        echo '" value="4">';
                                        echo $details['fourth'];
                                        echo '</label>';
                                        echo '<br><br>';

                                        echo '<input type="submit" class="btn btn-success" value="Submit" name="submit">
                                    </div>
                                </form>
                            </div>';
                            echo '</b>';

//                         <!--End it here-->
                        }
                    }

                    if(!$flag)
                    {

                        echo '<div class="alert alert-danger alert-dismissable fade in ">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Sorry!</strong> No Questions Live.
                        </div>';
                    }
                }
                else{
                    //Show that no questions are there for that code live
                    //Show something back keeping it blank as of now
                    echo '<div class="alert alert-danger alert-dismissable fade in ">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Sorry!</strong> No Questions Live or you are not Authorized.
                        </div>';
                }

            }
            else{

                header('Location: quesstaging.php');
                die();
            }

        }
        else if(isset($_SESSION['secretkey']) && $_SESSION['designation']=='teacher')
        {
            //Sorry teacher go to your own dashboard dont roam around
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






    </div>
    <br> <br> <br> <br> <br> <br>
    <nav class="navbar navbar-inverse navbar-fixed-bottom">
        <div class="container-fluid">
            <h5 class="text text-center" style="color: floralwhite;"> <strong>A Stux-Net Productions &copy; 2017</strong> </h5>
        </div>
    </nav>


    <!--ALERT HERE-->
    <button class="btn btn-info" id="donebutton"  onClick="onDone()" type="button" style="width: 100%">Done</button>

</div>
<!--container ends here-->
<!-- /#page-content-wrapper -->
<!-- HackDev and BissoBoss Will poty here-->

<!-- /#wrapper -->

<!-- jQuery -->
<script src="../../js/student.dashboard.jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../../js/student.dashboard.bootstrap.min.js"></script>
<script src="../js/redirect.js"></script>

<!-- Menu Toggle Script -->
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();

        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    });
</script>
<!--end of tooltip script-->
</body>

</html>
