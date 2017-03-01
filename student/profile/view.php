<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 27/1/17
 * Time: 3:54 PM
 */

session_start();

//    Include Database Connetors
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/connector.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/mysql_login.php';

if(isset($_SESSION['secretkey'])&&$_SESSION['designation']=='student')
{
    //Authorized Personnel here Give Respect

}
else if(isset($_SESSION['secretkey']) && $_SESSION['designation']=='teacher')
{
    //Teacher go to your Dashboard dont Roam Around
    header('Location: ../../teacher/dashboard.php');
    die();
}
else{
    //No Secret key? No Dashboard Fuck Off
    $_SESSION['relogin'] = true;
    header('Location: ../../index.php?attempt=relogin');
    die();
}

//Query For Student info
$find_student_info_string = "SELECT sessionvar FROM nextvac.login WHERE secretkey = :seckey AND sessionvar = :sessvar LIMIT 1";
$infoquery = $mysql_conn->prepare($find_student_info_string);
$infoquery->bindParam(':seckey',$_SESSION['secretkey']);
$infoquery->bindParam(':sessvar',session_id());
$infoquery->execute();
if($infoquery->rowCount() > 0)
{

}
else{
    $_SESSION['relogin'] = true;
    header('Location: ../../index.php?attempt=relogin');
    die();
}


if(isset($_SESSION['profileerror']))
{
   echo $_SESSION['profileerror'];
    unset($_SESSION['profileerror']);
}
else if(isset($_SESSION['profilesuccess']))
{
    echo "<script>window.alert('Profile Successfully Update')</script>";
    unset($_SESSION['profilesuccess']);
}



//Find Profile related info (Status,Propic and later fuck)
$find_profile_string = "SELECT * FROM nextvac.profile WHERE secretkey = :seckey";
$find_profile = $mysql_conn->prepare($find_profile_string);
$find_profile->bindParam(':seckey',$_SESSION['secretkey']);
$find_profile->execute();
$find_profile->setFetchMode(PDO::FETCH_ASSOC);
$student_profile = $find_profile->fetch();

$_SESSION['name'] = $student_profile['firstname']." ".$student_profile['lastname'];
$_SESSION['propic'] = preg_replace("/[^A_Za-z.0-9]+/","",$student_profile['propic']);
$_SESSION['incomming'] = filter_var($student_profile['incomming'], FILTER_SANITIZE_NUMBER_INT);
$_SESSION['messages'] = filter_var($student_profile['messages'], FILTER_SANITIZE_NUMBER_INT);
$_SESSION['status'] = preg_replace("/[^ \w]+/", "", $student_profile['status']);

?>

<html>
<head>
    <title>NextVAC</title>
    <link rel="stylesheet" href="../../css/student/profile.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .container {
            /*THIS IMG CHANGES CONTAINER's BACKGROUND'*/
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>
</head>
<body style="background-color: #d3dae5;">
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div class="card hovercard">
                <div class="card-background">
                    <img class="card-bkimg" alt="" src="cover/<?php echo $student_profile['cover']; ?>">
                    <!--THIS IMG CHANGES THE TOP PART's BACKGROUND-->
                    <!-- http://lorempixel.com/850/280/people/9/ -->
                </div>
                <div class="useravatar">
                    <img alt="" src="images/<?php echo $student_profile['propic'];?>">
                </div>
                <!--Insert name here-->


                <div class="card-info" style="left: 10px;top: 120px;"> <span class="card-title"><?php echo $_SESSION['name']; ?></span>
                </div>
                <div class="card-info" style="left: 10px;top: 144px; bottom: 0px; font-family: 'Times New Roman'; font-size: medium;"> <span class="card-title"><?php echo $student_profile['status']; ?></span>
                </div>
                <!--                Enter Status Here-->
                <div class="card-title"> <span class="card-title"><?php echo $student_profile['status']; ?></span>
                </div>

            </div>
            <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">

                <div class="btn-group" role="group">
                    <a type="button" id="stars" class="btn btn-primary" href="../dashboard.php" ><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                        <div class="hidden-xs">Dashboard</div>
                    </a>
                </div>

                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default " data-toggle="modal" data-target="#myModal"> <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                        <div class="hidden-xs">Contact Info</div>
                    </button>
                </div>
                <div class="btn-group" role="group">
                    <a type="button" id="following" class="btn btn-default" data-toggle="modal" data-target="#myModal2"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        <div class="hidden-xs">Edit Profile</div>
                    </a>
                </div>
            </div>
            <!--Add Basic Info In Tab-->

            <div class="well">
                <!--We are giving basic info in this tab -->
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="tab1">

                        <span class="glyphicon glyphicon-user"></span>
                        <label for=""><b>Name: </b></label>
                        <label for=""><?php echo $_SESSION['name']; ?></label>
                        <br>
                        <span class="glyphicon glyphicon-education"></span>
                        <label for=""> Course: </label>
                        <label for=""> <?php echo $student_profile['course']; ?> </label>
                        <br>
                        <span class="glyphicon glyphicon-modal-window"> </span>
                        <label for=""> Year: </label>
                        <label for=""> <?php
                                $sem = $student_profile['semester'];
                                $year = 0;
                                if($sem == 1 || $sem ==2)
                                {
                                    $year =1;
                                }else if($sem == 3 || $sem == 4)
                                {
                                    $year =2;
                                }else if($sem == 5 ||$sem == 6)
                                {
                                    $year = 3;
                                }else if($sem == 7 || $sem ==8)
                                {
                                    $year = 4;
                                }
                            echo $year." Year and ".$sem." Semester";
                                ?>
                        </label>
                        <br>
                        <span class="glyphicon glyphicon-home"> </span>
                        <label for=""> Hometown: </label>
                        <label for=""> <?php echo $student_profile['hometown']; ?> </label>

                        <br>
                        <div class="text text-warning">
                            <span class="glyphicon glyphicon-tree-conifer"> </span>
                            <label for=""> Organizations Involved In: </label> <br>
                            <label for="">
                                <ul>
                                    <?php
                                    $obj = unserialize($student_profile['organization']);
                                    foreach ($obj as $member)
                                    {
                                        echo '<li>'.$member.'</li>';
                                    }
                                    ?>
                                    <li>RISC-LPU</li>
                                    <li>SRPC-Student Project and Research Cell</li>
                                    <li>Cypher</li>
                                </ul>
                            </label>
                        </div>
                        <br>
                        <div class="text text-danger">
                            <span class="glyphicon glyphicon-copyright-mark"> </span>
                            <label for=""> Current CGPA/TGPA: </label>
                            <label for=""> <?php echo $student_profile['cgpa'];  ?> </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Repetition starts from here-->
    <div class="row">
        <div class="alert alert-info">
            <center><strong><i class="glyphicon glyphicon-calendar"> 2017</i></strong></center>
        </div>
        <div class="col-xs-4">
            <ul class="list-group">
                <li class="list-group-item list-group-item-success">Dapibus ac facilisis in</li>
                <li class="list-group-item list-group-item-info">Cras sit amet nibh libero</li>
                <li class="list-group-item list-group-item-warning">Porta ac consectetur ac</li>
                <li class="list-group-item list-group-item-danger">Vestibulum at eros</li>
            </ul>
        </div>
        <div class="col-xs-4">
            <ul class="list-group">
                <li class="list-group-item list-group-item-success">Dapibus ac facilisis in</li>
                <li class="list-group-item list-group-item-info">Cras sit amet nibh libero</li>
                <li class="list-group-item list-group-item-warning">Porta ac consectetur ac</li>
                <li class="list-group-item list-group-item-danger">Vestibulum at eros</li>
            </ul>
        </div>
        <div class="col-xs-4">
            <ul class="list-group">
                <li class="list-group-item list-group-item-success">Dapibus ac facilisis in</li>
                <li class="list-group-item list-group-item-info">Cras sit amet nibh libero</li>
                <li class="list-group-item list-group-item-warning">Porta ac consectetur ac</li>
                <li class="list-group-item list-group-item-danger">Vestibulum at eros</li>
            </ul>
        </div>
    </div>
    <br><br>
    <!--Repetition ends here-->
    <div class="row">
        <div class="alert alert-danger">
            <center><strong><i class="glyphicon glyphicon-calendar"> 2016</i></strong></center>
        </div>
        <div class="col-xs-4">
            <ul class="list-group">
                <li class="list-group-item list-group-item-success">Dapibus ac facilisis in</li>
                <li class="list-group-item list-group-item-info">Cras sit amet nibh libero</li>
                <li class="list-group-item list-group-item-warning">Porta ac consectetur ac</li>
                <li class="list-group-item list-group-item-danger">Vestibulum at eros</li>
            </ul>
        </div>
        <div class="col-xs-4">
            <ul class="list-group">
                <li class="list-group-item list-group-item-success">Dapibus ac facilisis in</li>
                <li class="list-group-item list-group-item-info">Cras sit amet nibh libero</li>
                <li class="list-group-item list-group-item-warning">Porta ac consectetur ac</li>
                <li class="list-group-item list-group-item-danger">Vestibulum at eros</li>
            </ul>
        </div>
        <div class="col-xs-4">
            <ul class="list-group">
                <li class="list-group-item list-group-item-success">Dapibus ac facilisis in</li>
                <li class="list-group-item list-group-item-info">Cras sit amet nibh libero</li>
                <li class="list-group-item list-group-item-warning">Porta ac consectetur ac</li>
                <li class="list-group-item list-group-item-danger">Vestibulum at eros</li>
            </ul>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="alert alert-success">
            <center><strong><i class="glyphicon glyphicon-calendar"> 2015</i></strong></center>
        </div>
        <div class="col-xs-4">
            <ul class="list-group">
                <li class="list-group-item list-group-item-success">Dapibus ac facilisis in</li>
                <li class="list-group-item list-group-item-info">Cras sit amet nibh libero</li>
                <li class="list-group-item list-group-item-warning">Porta ac consectetur ac</li>
                <li class="list-group-item list-group-item-danger">Vestibulum at eros</li>
            </ul>
        </div>
        <div class="col-xs-4">
            <ul class="list-group">
                <li class="list-group-item list-group-item-success">Dapibus ac facilisis in</li>
                <li class="list-group-item list-group-item-info">Cras sit amet nibh libero</li>
                <li class="list-group-item list-group-item-warning">Porta ac consectetur ac</li>
                <li class="list-group-item list-group-item-danger">Vestibulum at eros</li>
            </ul>
        </div>
        <div class="col-xs-4">
            <ul class="list-group">
                <li class="list-group-item list-group-item-success">Dapibus ac facilisis in</li>
                <li class="list-group-item list-group-item-info">Cras sit amet nibh libero</li>
                <li class="list-group-item list-group-item-warning">Porta ac consectetur ac</li>
                <li class="list-group-item list-group-item-danger">Vestibulum at eros</li>
            </ul>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="alert alert-warning">
            <center><strong><i class="glyphicon glyphicon-calendar"> 2014</i></strong></center>
        </div>
        <div class="col-xs-4">
            <ul class="list-group">
                <li class="list-group-item list-group-item-success">Dapibus ac facilisis in</li>
                <li class="list-group-item list-group-item-info">Cras sit amet nibh libero</li>
                <li class="list-group-item list-group-item-warning">Porta ac consectetur ac</li>
                <li class="list-group-item list-group-item-danger">Vestibulum at eros</li>
            </ul>
        </div>
        <div class="col-xs-4">
            <ul class="list-group">
                <li class="list-group-item list-group-item-success">Dapibus ac facilisis in</li>
                <li class="list-group-item list-group-item-info">Cras sit amet nibh libero</li>
                <li class="list-group-item list-group-item-warning">Porta ac consectetur ac</li>
                <li class="list-group-item list-group-item-danger">Vestibulum at eros</li>
            </ul>
        </div>
        <div class="col-xs-4">
            <ul class="list-group">
                <li class="list-group-item list-group-item-success">Dapibus ac facilisis in</li>
                <li class="list-group-item list-group-item-info">Cras sit amet nibh libero</li>
                <li class="list-group-item list-group-item-warning">Porta ac consectetur ac</li>
                <li class="list-group-item list-group-item-danger">Vestibulum at eros</li>
            </ul>
        </div>
    </div>
</div>


<!--Modal here for Contact-->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Contact Details</b></h4>
            </div>
            <div class="modal-body">
                <span class="glyphicon glyphicon-home"></span>
                <label for="">Hostel Address: <?php echo $student_profile['hostel'];?></label> <br>
                <span class="glyphicon glyphicon-envelope"></span>
                <label for="">Email address: <?php echo $student_profile['email']; ?></label> <br>
                <span class="glyphicon glyphicon-phone"></span>
                <label for="">Contact Number: <?php echo $student_profile['number']; ?></label> <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>


<form class="form-horizontal" role="form" method="post" action="changeprofile.php" enctype="multipart/form-data">
<!--Edit Profile Starts below-->
<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Edit Profile Details</b></h4>
            </div>
            <div class="modal-body">


                <div class="text-center">
                    <img src="images/<?php echo $student_profile['propic']; ?>" class="avatar img-circle" alt="avatar" height="100" width="100">
                    <h6>Upload a different photo...</h6>
                    <input type="file" class="form-control" name="profilepic" id="profilepic">
                </div>
                <br>
                <div class="alert alert-info alert-dismissable">
                    <a class="panel-close close" data-dismiss="alert">×</a>
                    <i class="fa fa-coffee"></i> This is <strong>ALERT!</strong>. Use this to show important messages to the user.
                </div>



                    <div class="form-group">
                        <label class="col-lg-3 control-label">First name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" value="<?php echo $student_profile['firstname']; ?>" name="firstname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Last name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" value="<?php echo $student_profile['lastname']; ?>" name="lastname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Status:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" value="<?php echo $student_profile['status']; ?>" name="status">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Email:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" value="<?php echo $student_profile['email']; ?>" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Phone Number:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" value="<?php echo $student_profile['number'];?>" name="number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Year of study: </label>
                        <div class="col-lg-8">
                            <div class="ui-select">
                                <select id="user_time_zone" class="form-control">
                                    <?php
                                    $selected = 'selected="selected"';
                                    ?>

                                    <option value="1" <?php if($sem==1) echo $selected; ?>>1st Year : 1st Semester</option>
                                    <option value="2" <?php if($sem==2) echo $selected; ?>>1st Year : 2nd Semester</option>
                                    <option value="3" <?php if($sem==3) echo $selected; ?>>2nd Year : 3rd Semester</option>
                                    <option value="4" <?php if($sem==4) echo $selected; ?>>2nd Year : 4th Semester</option>
                                    <option value="5" <?php if($sem==5) echo $selected; ?>>3rd Year : 5th Semester</option>
                                    <option value="6" <?php if($sem==6) echo $selected; ?>>3rd Year : 6th Semester</option>
                                    <option value="7" <?php if($sem==7) echo $selected; ?>>4th Year : 7th Semester</option>
                                    <option value="8" <?php if($sem==8) echo $selected; ?>>4th Year : 8th Semester</option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-8">
                            <span></span>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Save Changes">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
 </div>
</form>
<!--Edit Profile ends Here-->


</body>

</html>
