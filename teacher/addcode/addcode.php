<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/teacher/validate.php';

//Check Session Variables
if(isset($_SESSION['csection']) && isset($_SESSION['ccode']))
{
    //Have Variables
    //$_SESSION['cauth'] = true;
}
else
{
    //Redirect back
    header('Location: adddetail.php');
    die();
}

if(isset($_SESSION['codesubmitteacher']) && $_SESSION['codesubmitteacher'] == true && $_GET['submit'] == 'done')
{
    unset($_SESSION['codesubmitteacher']);
    echo '<script>window.alert("Your Question is added to set succesfully!");</script>';
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
                <a href="manage.php"><span class="fa fa-code"></span> Coding Ground</a>
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
                <form class="form-horizontal" role="form" method="post" action="submit/submitcode.php" enctype="multipart/form-data">
                        <br> <br> <br>

                            <div class="row">
                                <div class="col-xs-10">
                                    <h1 class="text text-center"> <strong>&emsp;&emsp;&emsp;&emsp14;Enter Question Details here for <?php echo $_SESSION['csection']; ?></strong></h1>
                                    <br>
                                </div>
                                <div class="col-xs-2">
                                    <div class="btn-group-vertical affix">
                                        <button type="submit" class="btn btn-lg btn-success" data-spy="affix"> SUBMIT </button>
                                        <button type="button" class="btn btn-lg btn-danger" data-spy="affix" onclick="window.location.href='submit/done.php'">&nbsp; DONE &nbsp; </button>
                                        <br>
                                    </div>
                                </div>

                            </div>
                            <br>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Enter Question title:</label>
                                <div class="col-lg-8">
                                    <input class="form-control" type="text" placeholder="Enter title here..." name="title" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Enter the problem statement:</label>
                                <div class="col-lg-8">
                                    <textarea class="form-control" type="text" rows="5" placeholder="Enter the problem statement here..." name="statement" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Input Format: </label>
                                <div class="col-lg-8">
                                    <textarea class="form-control" type="text" rows="3" placeholder="Enter input format here...." name="inputstat" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Output Format: </label>
                                <div class="col-lg-8">
                                    <textarea class="form-control" type="text" rows="3" placeholder="Enter output format here...." name="outputstat" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Sample Input: </label>
                                <div class="col-lg-8">
                                    <textarea class="form-control" type="text" rows="3" placeholder="Enter sample input format here...." name="sampleinp" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label"> Sample Output: </label>
                                <div class="col-lg-8">
                                    <textarea class="form-control" type="text" rows="3" placeholder="Enter output format here...." name="sampleout" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Explain the problem (Optional):</label>
                                <div class="col-lg-8">
                                    <textarea class="form-control" type="text" rows="5" placeholder="Explain and Describe the problem statement here..." name="explanation"></textarea>
                                </div>
                            </div>
                        <div class="row">
                            <label class="col-lg-2 control-label">Select Duration:  </label>
                            <div class="col-xs-5">
                                    <input type="time" name="duration" style="width: 100px;margin-top: 05px;">
                                <br><br>
                            </div>
                        </div>

                        <div class="row" style="min-height: 100px; overflow: hidden;">
                            <div class="col-xs-2">
                                <!--This div is for spacing-->
                                <!--Remove this and you fucking will know why I created this div-->
                                <!--To Future Stuxnet-->
                            </div>

                            <div class="col-xs-3">
                                <b> Select Number Of Test Case</b>
                                <br>
                                <select id="case_select" style="width:170px;" class="form-control" name="numtestcase" required>
                                   <option value="0">Select Case</option>
                                   <option value="1">1 Test Case</option>
                                   <option value="2">2 Test Cases</option>
                                   <option value="3">3 Test Cases</option>
                                   <option value="4">4 Test Cases</option>
                                   <option value="5">5 Test Cases</option>
                                   <option value="6">6 Test Cases</option>
                                   <option value="7">7 Test Cases</option>
                                   <option value="8">8 Test Cases</option>
                                </select>
                            </div>
                            <div class="col-xs-3">
                                <b>Upload Test Case As File</b><br><b>File Input</b><input type="checkbox" id="as_file" style="margin-left: 10px;margin-top: 05px;" name="as_file" value="file">
                            </div>
                        </div>

                        <div class="row">
                            <br>
                            <div class="col-xs-2">
                                <!--This div is for spacing-->
                                <!--Remove this and you fucking will know why I created this div-->
                                <!--To Future Sameer-->
                            </div>
                            <div class="col-xs-5" id="testcase_field">

                            </div>
                            <div class="col-xs-5" id="testcase_file">

                            </div>
                        </div>

                    <br><br>

                </form>

            </div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="../../jquery/jquery-3.1.1.min.js"></script>
    <script src ="testcase.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../js/student.dashboard.bootstrap.min.js "></script>

    <!-- Menu Toggle Script -->
    <script>
    </script>
    <!--script to activate all toolkit-->
    <script>

    </script>
    <!--end of tooltip script-->
    <!--Yahan ab main script wali tatti karunga-->
</body>

</html>