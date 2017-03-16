<?php
/**
 * Created by PhpStorm.
 * User: stuxnet
 * Date: 22/1/17
 * Time: 4:28 PM
 */

session_start();
$error = false;
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/connector.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/mysql_login.php';

require_once $_SERVER['DOCUMENT_ROOT'].'/teacher/validate.php';


if(!isset($_SESSION['ques_validate']) || $_SESSION['ques_validate']!=true || (!isset($_SESSION['secretkey'])|| $_SESSION['designation'] != 'teacher'))
{
    unset($_SESSION['ques_validate']);
    header('Location: ../dashboard.php');
    die();
}

if(isset($_SESSION['error']) && $_SESSION['error'] == 'notcomplete')
{
    //Do whatever you want here for the error
    $error = true;
    $message = 'Please complete Question!';
    $_SESSION['error'] = false;
    unset($_SESSION['error']);

}elseif(isset($_SESSION['error']) && $_SESSION['error'] == 'duplicate')
{
    $error = true;
    $message = 'Question already on your code. Choose other question!';
    $_SESSION['error'] =false;
    unset($_SESSION['error']);
}



if(isset($_SESSION['ques_section']) && isset($_SESSION['ques_code']))
 {
   $ques_section = $_SESSION['ques_section'];
   $ques_code = $_SESSION['ques_code'];
 }
 else if(isset($_POST['ques_section']) && isset($_POST['ques_code']))
 {
     $ques_section = filter_var($_POST['ques_section'],FILTER_SANITIZE_STRING);
     $ques_code = filter_var($_POST['ques_code'],FILTER_SANITIZE_STRING);
 }
 else
  {
     unset($_SESSION['ques_code']);
     unset($_SESSION['ques_section']);
     header('Location: ../dashboard.php');
     die();
  }



//See if section is allocated to the teacher
$query_string = 'SELECT section FROM nextvac.classallocate WHERE secretkey = :seckey AND section = :section LIMIT 1';
$query = $mysql_conn->prepare($query_string);
$query->bindParam(':seckey',$_SESSION['secretkey'],PDO::PARAM_STR);
$query->bindParam(':section',$ques_section,PDO::PARAM_STR);
$query->execute();
$query->setFetchMode(PDO::FETCH_ASSOC);

$data_section_out = $query->fetch();

//See if the code is taken and if it is , then is it same teacher or different.
//If its the same teacher let him continue or return him error
$code_check_string = "SELECT * FROM nextvac.questiondb WHERE code = :code AND secretkey != :seckey ";
$code_check = $mysql_conn->prepare($code_check_string);
$code_check->bindParam(':code',$ques_code,PDO::PARAM_STR);
$code_check->bindParam(':seckey',$_SESSION['secretkey'],PDO::PARAM_STR);
$code_check->execute();
$code_check->setFetchMode(PDO::FETCH_ASSOC);

$data_code_out = $code_check->fetch();

if($query->rowCount() > 0)
{
    //Teacher Now semi authorized and can continue for code check
    if($code_check->rowCount() > 0)
    {
        //Not authorized in code check , code is taken by some other teacher , send teacher warning
        $_SESSION['error'] = 'codeerror';
        $mysql_conn = null;
        header('Location: addstaging.php');
        die();
    }
    else{
        $_SESSION['ques_section'] = filter_var($ques_section,FILTER_SANITIZE_STRING);
        $_SESSION['ques_code'] = filter_var($ques_code,FILTER_SANITIZE_STRING);

        //Fully authorized teacher now add question to the database against his name
        $_SESSION['authorize'] = true; //Sessionn variable for authorizing upload
    }


}
else{
    //Redirect this asshole and tell he or she doesn't teaches them
    $_SESSION['error'] = 'sectionerror';
    $mysql_conn = null;
    header('Location: addstaging.php');
    die();
}
?>

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


    <title>NextVAC</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../css/theme/dashboard_bootstrap_min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../css/theme/dashboard_simple-sidebar.css" rel="stylesheet">
    <link href="../../css/theme/dashboard.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="../js/required_final.js"></script>
    <!--    Piwik Tracker-->
    <script src="../../include/tracker.js"></script>
    <!--    End of Piwik Tracker-->

</head>

<!--<body style="background-color: #edf1f7">-->

<body>

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
                <a href="#"><span class="glyphicon glyphicon-facetime-video"></span> VConnect</a>
            </li>
            <li>
                <a href="#"> <span class="glyphicon glyphicon-book"></span> Digtal Library</a>
            </li>
            <li>
                <a href="../addcode/manage.php"><span class="fa fa-code"></span> Coding Ground</a>
            </li>
            <li class>
                <a href="#"><span class="glyphicon glyphicon-plus"></span> Add Q&A</a>
            </li>
            <li>
                <a href="manageset.php"><span class="glyphicon glyphicon-plus"></span> Manage Q&A</a>
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

        <br> <br>
        <div class="container">

            <div class="myquestiondiv  well well-lg">
                <h2 class="text text-info text-center">
                    <i class="glyphicon glyphicon-menu-hamburger"></i>
                    <strong> Question Uploads</strong></h2>
                <br>
                <!--Define the form action here-->
                <form class="form-horizontal" action="submitques.php" method="post" name="addques">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="ques">
                            <i class="glyphicon glyphicon-question-sign fa-2x"></i> Question</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" columns="5" id="ques" placeholder="Enter question details here..." onKeyup="merakeyup()" name="question" required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="option1">
                            <i class="glyphicon glyphicon-list"></i>
                            Enter Options:</label>
                        <div class="col-sm-10">

                            <div class="row">

                                <div class="col-xs-6">
                                    <input type="text" class="form-control" id="option1" placeholder="Option 1..." onKeyup="merakeyup()" name="opt1" required>
                                </div>
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" id="option2" placeholder="Option 2..." onKeyup="merakeyup()" name="opt2" required>
                                </div>
                            </div>
                            <br>
                            <div class="row">

                                <div class="col-xs-6">
                                    <input type="text" class="form-control" id="option3" placeholder="Option 3..." onKeyup="merakeyup()" name="opt3" required>
                                </div>
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" id="option4" placeholder="Option 4..." onKeyup="merakeyup()" name="opt4" required>
                                </div>

                            </div>
                            <div class="form-group">
                                <br>
                                <label for="sel1">
                                    <i class="glyphicon glyphicon-check"></i>
                                    Correct Option:</label>
                                <div class="col-xs-12">
                                    <select class="form-control" id="sel1" name="correct">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    <br>
                                    <button class="btn btn-success" id="submitbutton"  onClick="onSubmit()" type="submit">Submit</button>
                                    <button class="btn btn-info" id="donebutton"  onClick="onDone()" type="button">Done</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!--                Showing warning if something went wrong with code and section-->
            <div class="alert alert-danger alert-dismissable <?php if(!$error)echo 'hide';?>">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Sorry!</strong> <?php if($error) echo $message; ?>
            </div>

            <div class="alert alert-success alert-dismissable <?php
            if (isset($_SESSION['fromback']) && $_SESSION['fromback'] == true)
            {
                echo "hide";
                unset($_SESSION['fromback']);
            }
            else if(!(isset($_SESSION['add']) &&  $_SESSION['add'] == true))
            {
                echo "hide";
            }
            else{
                $_SESSION['add'] = false;
                $_SESSION['fromback'] = false;
                unset($_SESSION['fromback']);
                unset($_SESSION['add']);
            }
            ?>">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> Your Question is uploaded
            </div>
        <!--            End of the alert-->
        </div>

        <nav class="navbar navbar-inverse navbar-fixed-bottom">
            <div class="container-fluid">
                <h6 class="center tmid" style="font-size: large;color: #eff3f9;">Copyright &copy; 2017 Stuxnet Productions &copy All Rights Reserved</h6>
            </div>
        </nav>
    </div>
    <!--container ends here-->
</div>
<!-- /#page-content-wrapper -->
<!-- HackDev and BissoBoss Will poty here-->

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
    });
</script>
<!--end of tooltip script-->
</body>

</html>