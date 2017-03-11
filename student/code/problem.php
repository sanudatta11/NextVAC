<?php
/**
 * Created by PhpStorm.
 * User: stuxnet
 * Date: 7/2/17
 * Time: 1:33 PM
 */

session_start();

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

if(isset($_GET['contest']) && isset($_GET['problem']))
{
    unset($_SESSION['submitauth']);
    $_SESSION['submitauth'] = true;
    $contestcode = preg_replace("/[^A-Za-z0-9]+/","",$_GET['contest']);
    $problemcode = preg_replace("/[^0-9]+/","",$_GET['problem']);

    $problem_string = "SELECT * FROM nextvac.codingdb WHERE contestcode = :ccode AND section =:section AND problemcode = :procode and status =1 LIMIT 1";
    $problem_obj = $mysql_conn->prepare($problem_string);
    $problem_obj->bindParam(':ccode',$contestcode,PDO::PARAM_STR);
    $problem_obj->bindParam(':section',$_SESSION['section'],PDO::PARAM_STR);
    $problem_obj->bindParam(':procode',$problemcode,PDO::PARAM_INT);

    $problem_obj->execute();

    if($problem_obj->rowCount() > 0)
    {
        $problem_obj->setFetchMode(PDO::FETCH_ASSOC);
        $problem_detail = $problem_obj->fetch();
    }
    else
    {
        header('Location: contest.php');
        die();
    }

    
}
else
{
    header('Location: contest.php');
    die();
}



?>

<!DOCTYPE html>
<html>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.6/ace.js"></script>
    <link href="../../css/student/codingground.css" rel="stylesheet">
    <link href="../../css/processingbox/main.css" rel="stylesheet">
    <style type="text/css" media="screen">
        #editor {
            position: relative;
            height: 500px;
        }
        .my-editor {
            width: 800px;
            height: 500px;
        }
        #codeFS {
            width: 100%;
            height: auto;
            background-color: white;
        }
    </style>
    <style>
        .table-hover>tbody>tr:hover {
            background-color: #D2D2D2;
            cursor: pointer;
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
                <img src="../profile/images/<?php echo $_SESSION['propic'];?>"" align="center" height="170px" width="200px">
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
                <a href="contest.php"><span class="fa fa-code"></span> Coding Ground</a>
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
                    <li><a href="../../logout.php"><span class="glyphicon glyphicon-log-out"></span><b> Log Out</b></a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-home"></span><b> Reach Us</b></a></li>
                </ul>
            </div>
        </nav>
        <!--Do all fucking here--><br><br>
        <div class="container">
            <h1 class="text text" style="font-family: 'Orbitron', sans-serif;"><strong>Coding Ground</strong></h1><br><br><button type="button" class="btn btn-primary btn-lg" style="padding-left: 50px; padding-right: 50px; border-radius: 0px 30px 30px 0px;  font-family: 'Reem Kufi', sans-serif;" data-toggle="modal"
                                                                                                                                  data-target="#myModal"><?php echo $_SESSION['name']; ?> </button>
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;
                            </button>
                            <h3 class="modal-title">Welcome <i>Biswarup Banerjee</i></h3>
                        </div>
                        <div class="modal-body">
                            <div class="media">
                                <div class="media-left"><img src="../profile/images/<?php echo $_SESSION['propic'];?>" class="media-object" style="width:170px; height: 150px;"></div>
                                <div class="media-body">
                                    <h4><?php $_SESSION['name']; ?></h4><i>Lovely Professional University</i>
                                    <h4 class="media-heading"><strong>Honors and Acheivements</strong></h4><br><a href="#">Badges <span class="badge">57</span></a><a href="#">Medals <span class="badge">10</span></a><a href="#">Trophies <span class="badge">2</span></a></div>
                            </div>
                        </div>
                        <div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div>
                    </div>
                </div>
            </div><a href="#" class="folding folding-yellow" title="YOUR RANK " style="width: 130px; height: 40px; ">&emsp;
                <?php echo $_SESSION['rank']; ?> &emsp;
            </a><a href="#" class="folding folding-green" title="YOUR SCORE">&nbsp;
                &emsp;
                4550 &emsp;
                &nbsp;
            </a><br><br>
            <div class="well" style="border: 5px solid #021b42; background-color: #eff2f7;">
                <h2 class="text-center text-info" style=" font-family: 'Reem Kufi', sans-serif;"><b>Coding Challenge: <?php echo $problem_detail['problemcode'];?> </b>| <i><?php echo $problem_detail['problemname'];?></i></h2>
            </div><br><br>
            <div class="well" style="font-family: 'Electrolize', sans-serif; font-size: 22px;background-color: white"><br>

                <?php echo $problem_detail['problemstat'];?>
                 <br><br>

            </div><br>
            <div class="panel-group ">
                <div class="panel panel-success ">
                    <div class="panel-heading " style="font-family: 'Electrolize', sans-serif; font-size: 22px;"><b>Input Format</b></div>
                    <div class="panel-body " style="font-family: 'Electrolize', sans-serif; font-size: 22px;">
                        <?php echo $problem_detail['inputstat'];?>
                    </div>
                </div><br>
                <div class="panel panel-success ">
                    <div class="panel-heading " style="font-family: 'Electrolize', sans-serif; font-size: 22px;"><b>Output Format</b></div>
                    <div class="panel-body " style="font-family: 'Electrolize', sans-serif; font-size: 22px;">
                        <?php echo $problem_detail['outputstat'];?>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-6 ">
                    <div class="thumbnail ">
                        <?php $pre_path = '../../teacher/addcode/'; ?>
                        <div class="well well-sm " style="font-family: 'Electrolize', sans-serif; font-size: 22px;"><strong>Sample Input</strong></div><pre class="pre-scrollable" style="height: 200px; font-family: 'Electrolize', sans-serif; font-size: 22px;"><?php
                            //Sample Input echo
                            $sample = $problem_detail['sample'];
                            $sample = substr($sample,3);
                            $final_path_inp = $pre_path.$sample.'/sampleinp.txt';

                            if(file_exists($final_path_inp))
                            {
                                if(filesize($final_path_inp) <= 2000000)
                                {
                                    echo htmlspecialchars(file_get_contents($final_path_inp));
                                }
                                else{
                                    echo "Heavy File size";
                                }
                            }
                            else{
                                //No Sample Inp File
                                echo "No Sample Input";
                            }

                            ?> </pre></div>
                </div>
                <div class="col-md-6 ">
                    <div class="thumbnail ">
                        <div class="well well-sm " style="font-family: 'Electrolize', sans-serif; font-size: 22px;"><strong>Sample Output </strong></div>
                        <pre class="pre-scrollable" style="height: 200px; font-family: 'Electrolize', sans-serif; font-size: 22px;"><?php
                        $final_path_out = $pre_path.$sample.'/sampleout.txt';
                        //Sample Input Show

                        if(file_exists($final_path_out))
                        {
                            if(filesize($final_path_out) <= 2000000)
                            {
                                echo htmlspecialchars(file_get_contents($final_path_out));
                            }
                            else{
                                echo "Heavy File size";
                            }
                        }
                        else{
                            //No Sample Inp File
                            echo "No Sample Output";
                        }
                        ?>
                        </pre></div>
                    </div>
            </div><br><br>

            <div class="my-editor">
                <div class="container">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-6">
                                    <select class="form-control" id="theme">
                                        <option value ="0"> Select Theme</option>
                                        <option value="cobalt">Cobalt</option>
                                        <option value="ambiance">Ambiance</option>
                                        <option value="solarized_light">Solarized Light</option>
                                    </select>
                                </div>
                                <div class="col-xs-6">
                                    <select class="form-control" id="language">
                                        <option value="c_cpp">C++</option>
                                        <option value="c_cpp">C</option>
                                        <option value="java">Java</option>
                                        <option value="python">Python</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="panel-body">
                            <div class="container" id="codeFS">
                                <div class="row" style="display: none;" id="hide_row">
                                    <h1 class="text text-center " style="color: white"><strong>Distraction free mode activated!</strong></h1>
                                </div>
                                <div id="editor"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                        </div>
                        <div class="col-sm-1">
                            <form action="samplessub.php" method="post" name="runform" id="runform">
                                <textarea class="form-control" style="display:none" id="code_arena_run" name="code_arena" required></textarea>
                                <input type="hidden" class="language hidden" value="C++" name="language">
                                <input type="hidden" class="hidden" name="ccode" id="ccode" value="<?php echo $contestcode;?>">
                                <input type="hidden" class="hidden" name="pcode" id="pcode" value="<?php echo $problemcode;?>">
                                <button type="submit" class="btn btn-lg btn-info" id="runbt">RUN</button>
                            </form>
                        </div>
                        <div class="col-sm-1">
                            <form action="realsub.php" method="post" id="subform" name="subform">
                                <textarea class="form-control" style="display:none" id="code_arena_sub" name="code_arena" required></textarea>
                                <input type="hidden" class="language hidden" value="C++" name="language" id="sublang">
                                <input type="hidden" class="language hidden" value="C++" name="language">
                                <input type="hidden" class="hidden" name="ccode" id="ccode" value="<?php echo $contestcode;?>">
                                <input type="hidden" class="hidden" name="pcode" id="pcode" value="<?php echo $problemcode;?>">
                                <button type="submit" class="btn btn-lg btn-success" id="subbt">SUBMIT</button>
                            </form>

                        </div>

                        <div class="col-sm-1">
                                <button type="button" class="btn btn-lg btn-warning" onclick="goFS()"> Fullscreen </button>
                        </div>
                    </div>

                    <div class="row">
                        <br>
                        <div class="col-xs-12">

<!--                            The Real Test case check Start-->
<!--All Testcase-->


                            <div class="processingbox" id="processingbox">

                            </div>


<!--                            The Sample Output Start-->

                            <div class="content" style="font-family: 'Electrolize', sans-serif; font-size: 22px; box-shadow: 10px 10px 10px 10px #888888" id="sampleout"><br>
                                <div class="well well-sm " style="font-family: 'Electrolize', sans-serif; font-size: 22px; text-align: center;">
                                    <h2 class="text text-info"><i class="glyphicon glyphicon-edit"></i><strong>Verdict</strong></h2>
                                </div>
                                <div class="well well-sm " style="font-family: 'Electrolize', sans-serif; font-size: 22px; text-align: justify;" id="sampleverdict"></div>
                                <div class="well well-sm " style="font-family: 'Electrolize', sans-serif; font-size: 22px; text-align: center;">
                                    <h2 class="text text-info"><i class="glyphicon glyphicon-saved"></i><strong>Given Input</strong></h2>
                                </div>
                                <div class="well well-sm " style="font-family: 'Electrolize', sans-serif; font-size: 22px; text-align: justify;" id="ginput"></div>
                                <div class="well well-sm " style="font-family: 'Electrolize', sans-serif; font-size: 22px; text-align: center;">
                                    <h2 class="text text-primary"><i class="glyphicon glyphicon-export "></i><strong>Desired Output</strong></h2>
                                </div>
                                <div class="well well-sm " style="font-family: 'Electrolize', sans-serif; font-size: 22px; text-align: justify;" id="goutput"></div>
                                <div class="well well-sm " style="font-family: 'Electrolize', sans-serif; font-size: 22px; text-align: center;" id="outbanner">
                                    <h2 class="text text-info"><i class="glyphicon glyphicon-share" ></i><strong>Your Output</strong></h2>
                                </div>
                                <div class="well well-sm " style="font-family: 'Electrolize', sans-serif; font-size: 22px; text-align: justify;" id="youtput"></div>

                            </div>
                            <div id="scrolldiv"></div>

<!--                            The Sample Output End-->



                            <br><br><br>

                        </div>
                        <!--DO HERE-->

                    </div>

                </div>
            </div>
            <br><br><br>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <nav class="navbar navbar-inverse navbar-fixed-bottom">
                <div class="container-fluid">
                    <h5 class="text text-center" style="color: floralwhite;"> <strong>A Stux-Net Productions &copy; 2017</strong> </h5>
                </div>
            </nav>
                <!--ALERT HERE-->
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
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="../../js/codingground/codesub.js"></script>

    <script src="../../ace/ace-builds/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
    <script src="../../ace/ace-builds/src-noconflict/ext-language_tools.js"></script>
    <script src="../../dependencies/screenfull/screenfullrequire.js"></script>
    <script src="../../dependencies/screenfull.js-gh/src/screenfull.js"></script>
    <script>
        if (screenfull.enabled) {
            document.addEventListener(screenfull.raw.fullscreenchange, () => {
                if (screenfull.isFullscreen) {
                    document.getElementById('codeFS').style = 'background-color: black;';
                    document.getElementById('editor').style = 'height: 700px;';
                    document.getElementById('hide_row').style = 'display: block;';
                    document.getElementById('editor').style.fontSize = '32px';
                    var c = document.getElementById('editor').style.fontSize;
                    //console.log(c);
                   // console.log("YES");
                } else {
                    document.getElementById('editor').style = 'height: 500px;';
                    document.getElementById('codeFS').style = 'background-color: white;';
                    document.getElementById('hide_row').style = 'display: none;';
                    document.getElementById('editor').style.fontSize = '20px';
                    var c = document.getElementById('editor').style.fontSize;
                    //console.log(c);
                   // console.log("NOOOOO");

                }
                //  console.log('Am I fullscreen? ' + (screenfull.isFullscreen ? 'Yes' : 'No'));
            });
        }

        ace.require("ace/ext/language_tools");
        var editor = ace.edit("editor");
        document.getElementById('editor').style.fontSize = '22px';
        editor.setTheme("ace/theme/ambiance");
        editor.getSession().setMode("ace/mode/c_cpp");
        editor.setOptions({
            enableLiveAutocompletion:true,
            enableBasicAutocompletion: true,
            minLines:25,
            maxLines:2000
        });


        $("#theme ").change(function(e) {
            console.log(this.value);
            editor.setTheme("ace/theme/ambiance");
        });
        editor.getSession().on('change', function() {
            document.getElementById('hide_row').style = 'display: none;';
        });
        editor.$blockScrolling = Infinity;
    </script>

</body>

</html>
