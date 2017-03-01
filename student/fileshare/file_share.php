<?php
session_start();
if(isset($_SESSION['secretkey'])&&$_SESSION['designation']=='student')
{
    //Authorized Personnel here Give Respect

}
else if(isset($_SESSION['secretkey']) && $_SESSION['designation']=='teacher')
{
    //Teacher go to your Dashboard dont Roam Around
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
    <link href="https://fonts.googleapis.com/css?family=Taviraj" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!--    <script src="../../jquery/jquery.min.js"></script>-->
    <!--<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">-->
    <script src="jquery_min.js"></script>

    <!--Css Files-->
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
    <link href="../../css/theme/fileup.css" rel="stylesheet">

<!--    Scripts for JQuery Form Plugin-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <![endif]-->

</head>

<body style="background-color: #edf1f7">

<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">

            <li>
                <img src="../profile/<?php echo $_SESSION['propic'];?>" align="center" height="170px" width="200px">
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
                <a href="../videoconnect/vidkeysub.php"><span class="glyphicon glyphicon-facetime-video"></span> VConnect</a>
            </li>
            <li>
                <a href="../question/quesstaging.php"><span class="glyphicon glyphicon-pencil"></span></span>Solve Questions</a>
            </li>
            <li>
                <a href="#"> <span class="glyphicon glyphicon-book"></span> Digtal Library</a>
            </li>
            <li>
                <a href="#"><span class="fa fa-code"></span> Coding Ground</a>
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
                <a href="#menu-toggle" class="btn btn-danger navbar-btn" id="menu-toggle"><h3 class="brand-header">NextVAC</h3>&nbsp&nbsp&nbsp<span class="glyphicon glyphicon-th-list"></span></a>
                <ul class="nav navbar-nav">
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a><span class="glyphicon glyphicon-education fa-1x"> <b><?php echo $_SESSION['section'] ?></b></span></a></li>
                    <li><a href="../../logout.php"><span class="glyphicon glyphicon-log-out"></span><b> Log Out</b></a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-home"></span><b> Reach Us</b></a></li>
                </ul>
            </div>
        </nav>

        <div class="container">
                <div class="row">
                    <br> <br>
                    <h1 class="text text-center"> <strong> &nbsp&nbsp&nbsp&nbsp Share Your Files </strong></h1> <br>
                    <!--Repeat this div-->
                    <div class="container small_div">
                        <div class="col-xs-6">
                            <a href="#">
                                <div class="card-begin">
                                    <br> <br>

                                </div>
                            </a>

                            <div class="w3-card-8" style="width:100%;">
                                <header class="card-begin w3-blue">
                                    &nbsp
                                </header>
                                <div class=" card-begin " onclick="onUploadClick()" >

                                    <div class="row ">
                                        <div class="col-xs-4 ">
                                            <span class="glyphicon glyphicon-cloud-upload fa-3x "></span>
                                        </div>
                                        <div class="col-xs-8 ">
                                            <h1 class="text text-info" id="file_upload"> File Upload <br>
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                                <footer class="card-begin w3-blue ">
                                    &nbsp;
                                </footer>
                            </div>
                        </div>

                        <div class="col-xs-6">
                            <a href="#">
                                <div class="card-begin">
                                    <br> <br>


                            </a>
                            </div>
                            <div class="w3-card-8" style="width:100%;">
                                <header class="card-begin w3-green">
                                    &nbsp
                                </header>
                                <div class=" card-begin ">

                                    <div class="row ">
                                        <div class="col-xs-4">
                                            <span class="glyphicon glyphicon-cloud-download fa-3x "></span>
                                        </div>
                                        <div class="col-xs-8 ">
                                            <h1 class="text text-success" onclick="onDownloadClick()" id="file_download"> File Download <br>
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                                <footer class="card-begin w3-green ">
                                    &nbsp;
                                </footer>
                            </div>
                        </div>

                    </div>
                    <br> <br>

                </div>

                <div class="row">
                    <form id="uploadform" action="upload.php" method="post" name="uploadform">
                        <div class="col-xs-12" id="upload_div">
                            <h1 class="text text-center"></h1>
                            <!--ENTER ALL FUCKING UPLOAD STUFFS HERE-->
                                    <b>Upload Your File Here</b><br>
                                    <span id="fileselector">
                                  <label class="btn btn-default" for="upload-file-selector">
                                  <input id="upload-file-selector" type="file" name="upload_selector">
                                      <i class="fa_icon icon-upload-alt margin-correction fa-2x"></i><b> Upload File</b>
                                  </label>

                                    </span>
                            <button class="btn btn-warning btn-md" type="submit" id="uploadbtn"><b>UPLOAD</b></button>
                                    <button class="btn btn-danger btn-md" type="button" id="cancelbtn"><b>CANCEL</b> </button>

                            <br>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped active" role="progressbar"  style="width:01%" id="upprogressbar">
                                    0%
                                </div>
                            </div>
                        </div>
                    </form>
                    <div id="targetdiv"></div>
                    <div class="col-xs-12" id="download_div">
                        <h1 class="text text-center"></h1>
                        <!--ENTER ALL FUCKING DOWNLOAD STUFFS HERE-->
                        <form>
                            <label for="key">Insert The Secret Key</label>
                            <input type="text" class="form-control" id="key" placeholder="Enter secret download key here....."><br>
                            <button type="button" class="btn btn-info">Download Now</button>
                        </form>
                        <br>
                        <div class="progress">
                            <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" style="width:100%">
                                10%
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-inverse navbar-fixed-bottom">
            <div class="container-fluid">

                <h6 class="center tmid" style="font-size: large;color: #eff3f9;">Copyright &copy; 2017 Stuxnet Productions &copy All Rights Reserved</h6>


            </div>
        </nav>


        <!--All modals here-->
        <!--Message Modal -->
    </div>
    <!--container ends here-->

    <!-- /#wrapper -->

    <!-- jQuery -->

<script src="../../js/student.dashboard.jquery.js "></script>
    <script src="fileup.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../js/student.dashboard.bootstrap.min.js "></script>
<script src="jquery.form.js" type="text/javascript"></script>

    <!-- Menu Toggle Script -->

    <!--script to activate all toolkit-->
    <!--end of tooltip script-->
    <!--Adding some scripts here-->
    <script>
        can_display = true;

        function onDownloadClick() {
            console.log('I am downloading');
            document.getElementById('download_div').setAttribute('style', 'display:block');
            document.getElementById('upload_div').setAttribute('style', 'display:none');
        }

        function onUploadClick() {
            document.getElementById('download_div').setAttribute('style', 'display:none');
            document.getElementById('upload_div').setAttribute('style', 'display:block');
        }
    </script>
</body>

</html>