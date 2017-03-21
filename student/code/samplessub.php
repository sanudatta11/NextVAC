<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/2/17
 * Time: 11:33 AM
 */
session_start();

//    Include Database Connetors
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/connector.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/confidential/mysql_login.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/dependencies/randomize/randomstring.php';

if(isset($_SESSION['secretkey'])&& $_SESSION['designation']=='student' && isset($_SESSION['submitauth']) && $_SESSION['submitauth'] == true)
{
    //Authorized

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



$tle=1;
$data=array();
$seconds = 4;
set_time_limit($seconds);
$data['verdict']=4;
$data['errors']=false;

function trimfile($path)
{
    $fh = fopen($path, 'r+') or die("Can't open file");
    $stat = fstat($fh);
    ftruncate($fh, $stat['size']-1);
    fclose($fh);
}


if(empty($_POST['code_arena']))
{
    $data['errors'] = true;
    echo json_encode($data);
}
else
{
    $random_folder = generaterandomstring(50);

    $tempdock ='../tempdockers/';
    do{
        $random_folder = generaterandomstring(30);
    }while(file_exists($tempdock.$random_folder));
    $oldmask = umask(0);

    mkdir($tempdock.$random_folder,0744);
    $language_select = preg_replace('/[^A-Za-z0-9+]+/','',$_POST['language']);
    $contest_code = preg_replace('/[^A-Za-z0-9]+/','',$_POST['ccode']);
    $problem_code = preg_replace('/[^0-9]+/','',$_POST['pcode']);

    $codecheck_string = "SELECT * FROM nextvac.codingdb WHERE contestcode = :ccode AND section = :section AND problemcode = :pcode AND status = 1";
    $codecheck_obj = $mysql_conn->prepare($codecheck_string);
    $codecheck_obj->bindParam(':ccode',$contest_code,PDO::PARAM_STR);
    $codecheck_obj->bindParam(':section',$_SESSION['section'],PDO::PARAM_STR);
    $codecheck_obj->bindParam(':pcode',$problem_code,PDO::PARAM_INT);

    $codecheck_obj->execute();

    if($codecheck_obj->rowCount() > 0)
    {
        $pre_path = '../../teacher/addcode/';
        $pre_path_docker="/var/www/html/teacher/addcode/";
        $codecheck_obj->setFetchMode(PDO::FETCH_ASSOC);
        $codecheck_result = $codecheck_obj->fetch();


        $sample = $codecheck_result['sample'];
        $sample = substr($sample,3);

        //Sample Input goes here folks
        $final_path_inp = $pre_path.$sample.'/sampleinp.txt';
        $final_path_inp_docker = $pre_path_docker.$sample.'/sampleinp.txt';

        if(file_exists($final_path_inp) && file_exists($final_path_inp_docker))
        {
            if(filesize($final_path_inp) <= 2000000)
            {
                $data['dinput'] = file_get_contents($final_path_inp);
            }
            else{
                die('Large File Size');
            }
        }
        else{
            //No Sample Inp File
            $data['dinput'] = "No Sample Input";
        }

        //Output Path goes here Folks
        $final_path_out = $pre_path.$sample.'/sampleout.txt';

        if(file_exists($final_path_out))
        {
            if(filesize($final_path_out) <= 2000000)
            {
                $data['doutput'] = file_get_contents($final_path_out);
            }
            else{
                $data['errors'] = "huge data";
                echo json_encode($data);
            }
        }
        else{
            //No Sample Inp File
            $data['errors'] = 'No output file or cannot access';
            echo json_encode($data);
        }


    }
    else
    {
        //Tampered Data or contest taken off when submitted
        //Redirect to the contest page

        header('Location: contest.php');
        die();
    }

    if($language_select == 'C++')
    {
        file_put_contents($tempdock.$random_folder.'/solution.cpp',$_POST['code_arena']);
        exec("g++ -o /var/www/html/student/tempdockers/".$random_folder."/solution /var/www/html/student/tempdockers/".$random_folder."/solution.cpp 2>&1",$compile_error,$ret_temp);

        if(isset($compile_error) && $ret_temp != 0)
        {
            $final_error ="";
            foreach ($compile_error as $compileline)
            {
                $compileline = substr($compileline, 65);
                $final_error=$final_error.'<br>'.$compileline;
                unset($compileline);
            }
//                $compile_error =substr($compile_error,98);
            //Error Has Occured
            $data['verdict'] = 0;
            $data['output'] = $final_error;
            echo json_encode($data);
        }
        else
        {
            $docker_container =generaterandomstring(10);
            if(file_exists($final_path_inp) && file_exists($final_path_inp_docker)) {

                if ($fp1 = fopen($final_path_inp_docker,"r")) {
                    fclose($fp1);
                    copy($final_path_inp_docker, "/var/www/html/student/tempdockers/" . $random_folder . "/checkinp.txt");
                    file_put_contents("/var/www/html/student/tempdockers/" . $random_folder . "/runcode.sh","#!/bin/bash\ntimeout 2 ./solution < checkinp.txt > out.txt");
                    shell_exec("chmod 0777 +x /var/www/html/student/tempdockers/".$random_folder."/runcode.sh");
                }

                $statement = "timeout --signal=SIGKILL 3 docker run --rm -m 10m --pids-limit 40 --cpu-quota=70000 --name " . $docker_container . " -v /var/www/html/student/tempdockers/" . $random_folder . ":/try testdock timeout 2 ./runcode.sh 2>&1";
            }
            else {
                $statement = "timeout --signal=SIGKILL 3 docker run --rm --pids-limit 40 --cpu-quota=70000 --name " . $docker_container . " -v /var/www/html/student/tempdockers/" . $random_folder . ":/try testdock timeout 2 ./solution > /var/www/html/student/tempdockers/" . $random_folder . "/out.txt 2>&1";
            }
            //exec($statement,$output,$ret_stat);
            exec($statement,$output,$retstat);
            $data['retstat'] =$retstat;
            shell_exec("docker rm -f ".$docker_container);
            if($retstat == 124 || $retstat == 127 || $retstat == 137)
            {
                $data['verdict'] = 1;

                //Removing all temporary files and directories
                array_map('unlink', glob("/var/www/html/student/tempdockers/".$random_folder."/*.*"));
                unlink("/var/www/html/student/tempdockers/".$random_folder."/solution");
                rmdir("/var/www/html/student/tempdockers/".$random_folder);

                echo json_encode($data);
                die();
            }
            $now_out = "/var/www/html/student/tempdockers/" . $random_folder . "/out.txt";

            //Mega Output
            if(filesize($now_out) > 2000000)
            {
                $data['verdict'] = 1;
                unlink($now_out);
            }
            else{
                $data['mytest'] = file_get_contents($now_out);
                $char = substr(file_get_contents($now_out), -1);
                if($char == PHP_EOL)
                {
                    $data_temp = file_get_contents($now_out);
                    $data_temp = substr_replace($data_temp ,"",-1);
                    unlink($now_out);
                    file_put_contents($now_out,$data_temp);
                    $data['output'] = $data_temp;
                }
                else
                    $data['output'] = file_get_contents($now_out);

                if (sha1_file($now_out) == sha1_file($final_path_out) || abs(file_get_contents($now_out) - file_get_contents($final_path_out)) == 0 || abs(file_get_contents($now_out) - file_get_contents($final_path_out)) < 0.00001)
                {
                    $data['verdict'] = 2;
                }else{
                    $data['verdict'] = 3;
                    $data['retstat'] = $retstat;
                }
            }

            //Removing all temporary files and directories
            array_map('unlink', glob("/var/www/html/student/tempdockers/".$random_folder."/*.*"));
            unlink("/var/www/html/student/tempdockers/".$random_folder."/solution");
            rmdir("/var/www/html/student/tempdockers/".$random_folder);
            shell_exec("rm -rf /var/www/html/student/tempdockers/" . $random_folder);

            echo json_encode($data);

        }
    }
    elseif ($language_select == 'C')
    {
        file_put_contents($tempdock.$random_folder.'/solution.c',$_POST['code_arena']);

        exec("gcc -o /var/www/html/student/tempdockers/".$random_folder."/solution /var/www/html/student/tempdockers/".$random_folder."/solution.c 2>&1",$compile_error,$ret_temp);

        if(isset($compile_error) && $ret_temp != 0)
        {
            $final_error ="";
            foreach ($compile_error as $compileline)
            {
                $compileline = substr($compileline,98);
                $final_error=$final_error.'<br>'.$compileline;
            }
//                $compile_error =substr($compile_error,98);
            //Error Has Occured
            $data['verdict'] = 0;
            $data['output'] = $final_error;
            echo json_encode($data);
        }
        else
        {
            $docker_container =generaterandomstring(10);
            if(file_exists($final_path_inp) && file_exists($final_path_inp_docker)) {

                if ($fp1 = fopen($final_path_inp_docker,"r")) {
                    fclose($fp1);
                    copy($final_path_inp_docker, "/var/www/html/student/tempdockers/" . $random_folder . "/checkinp.txt");
                    file_put_contents("/var/www/html/student/tempdockers/" . $random_folder . "/runcode.sh","#!/bin/bash\ntimeout 2 ./solution < checkinp.txt > out.txt");
                    shell_exec("chmod 0777 +x /var/www/html/student/tempdockers/".$random_folder."/runcode.sh");
                }
                $statement = "timeout --signal=SIGKILL 3 docker run --rm -m 10m --pids-limit 40 --cpu-quota=70000 --name " . $docker_container . " -v /var/www/html/student/tempdockers/" . $random_folder . ":/try testdock timeout 2 ./runcode.sh 2>&1";
            }
            else {
                $statement = "timeout --signal=SIGKILL 3 docker run --rm -m 10m --pids-limit 40 --cpu-quota=70000 --name " . $docker_container . " -v /var/www/html/student/tempdockers/" . $random_folder . ":/try testdock timeout 2 ./solution > /var/www/html/student/tempdockers/" . $random_folder . "/out.txt 2>&1";
            }
            //exec($statement,$output,$ret_stat);
            exec($statement,$output,$retstat);
            $data['retstat'] =$retstat;
            shell_exec("docker rm -f ".$docker_container);
            if($retstat == 124 || $retstat == 127 || $retstat == 137)
            {
                $data['verdict'] = 1;

                //Removing all temporary files and directories
                array_map('unlink', glob("/var/www/html/student/tempdockers/".$random_folder."/*.*"));
                unlink("/var/www/html/student/tempdockers/".$random_folder."/solution");
                rmdir("/var/www/html/student/tempdockers/".$random_folder);

                echo json_encode($data);
                die();
            }
            $now_out = "/var/www/html/student/tempdockers/" . $random_folder . "/out.txt";

            //Mega Output
            if(filesize($now_out) > 2000000)
            {
                $data['verdict'] = 1;
                unlink($now_out);
            }
            else{
                $char = substr(file_get_contents($now_out), -1);
                if($char == PHP_EOL)
                {
                    $data_temp = file_get_contents($now_out);
                    $data_temp = substr_replace($data_temp ,"",-1);
                    unlink($now_out);
                    file_put_contents($now_out,$data_temp);
                    $data['output'] = $data_temp;
                }
                else
                    $data['output'] = file_get_contents($now_out);

                if (sha1_file($now_out) == sha1_file($final_path_out) || abs(file_get_contents($now_out) - file_get_contents($final_path_out)) == 0 || abs(file_get_contents($now_out) - file_get_contents($final_path_out)) < 0.00001)
                {
                    $data['verdict'] = 2;
                }else{
                    $data['verdict'] = 3;
                    $data['retstat'] = $retstat;
                }
            }

            //Removing all temporary files and directories
            array_map('unlink', glob("/var/www/html/student/tempdockers/".$random_folder."/*.*"));
            unlink("/var/www/html/student/tempdockers/".$random_folder."/solution");
            rmdir("/var/www/html/student/tempdockers/".$random_folder);
            shell_exec("rm -rf /var/www/html/student/tempdockers/" . $random_folder);

            echo json_encode($data);

        }

        $compile_error = shell_exec("gcc /var/www/html/student/tempdockers/".$random_folder."/solution.c -o /var/www/html/student/tempdockers/".$random_folder."/solution.out  2>&1");

    }
    elseif ($language_select == 'Java')
    {
        file_put_contents($tempdock.$random_folder.'/solution.java',$_POST['code_arena']);
    }
    elseif ($language_select == 'Python3')
    {
        file_put_contents($tempdock.$random_folder.'/solution.py',$_POST['code_arena']);
            $docker_container =generaterandomstring(10);
            if(file_exists($final_path_inp) && file_exists($final_path_inp_docker)) {

                if ($fp1 = fopen($final_path_inp_docker,"r")) {
                    fclose($fp1);
                    copy($final_path_inp_docker, "/var/www/html/student/tempdockers/" . $random_folder . "/checkinp.txt");
                    file_put_contents("/var/www/html/student/tempdockers/" . $random_folder . "/runcode.sh","#!/bin/bash\ntimeout 2 python3 solution.py < checkinp.txt > out.txt 2>&1");
                    shell_exec("chmod 0777 +x /var/www/html/student/tempdockers/".$random_folder."/runcode.sh");
                }
                $statement = "timeout --signal=SIGKILL 3 docker run --rm -m 10m --pids-limit 40 --cpu-quota=70000 --name " . $docker_container . " -v /var/www/html/student/tempdockers/" . $random_folder . ":/try testdock timeout 2 ./runcode.sh 2>&1";
            }
            else {
                $statement = "timeout --signal=SIGKILL 3 docker run --rm -m 10m --pids-limit 40 --cpu-quota=70000 --name " . $docker_container . " -v /var/www/html/student/tempdockers/" . $random_folder . ":/try testdock timeout 2 ./solution > /var/www/html/student/tempdockers/" . $random_folder . "/out.txt 2>&1";
            }
            //exec($statement,$output,$ret_stat);
            exec($statement,$output,$retstat);
            $data['retstat'] =$retstat;
            shell_exec("docker rm -f ".$docker_container);
            if($retstat == 124 || $retstat == 127 || $retstat == 137)
            {
                $data['verdict'] = 1;

                //Removing all temporary files and directories
                array_map('unlink', glob("/var/www/html/student/tempdockers/".$random_folder."/*.*"));
                unlink("/var/www/html/student/tempdockers/".$random_folder."/solution");
                rmdir("/var/www/html/student/tempdockers/".$random_folder);

                echo json_encode($data);
                die();
            }
            $now_out = "/var/www/html/student/tempdockers/" . $random_folder . "/out.txt";

            //Mega Output
            if(filesize($now_out) > 2000000)
            {
                $data['verdict'] = 1;
                unlink($now_out);
            }
            else{
                $char = substr(file_get_contents($now_out), -1);
                if($char == PHP_EOL)
                {
                    $data_temp = file_get_contents($now_out);
                    $data_temp = substr_replace($data_temp ,"",-1);
                    unlink($now_out);
                    file_put_contents($now_out,$data_temp);
                    $data['output'] = $data_temp;
                }
                else
                    $data['output'] = file_get_contents($now_out);

                if (sha1_file($now_out) == sha1_file($final_path_out) || abs(file_get_contents($now_out) - file_get_contents($final_path_out)) == 0 || abs(file_get_contents($now_out) - file_get_contents($final_path_out)) < 0.00001)
                {
                    $data['verdict'] = 2;
                }else{
                    $data['verdict'] = 3;
                    $data['retstat'] = $retstat;
                }
            }

            //Removing all temporary files and directories
            array_map('unlink', glob("/var/www/html/student/tempdockers/".$random_folder."/*.*"));
            unlink("/var/www/html/student/tempdockers/".$random_folder."/solution");
            rmdir("/var/www/html/student/tempdockers/".$random_folder);
        shell_exec("rm -rf /var/www/html/student/tempdockers/" . $random_folder);

            echo json_encode($data);
    }
    elseif ($language_select == 'Python2')
    {
        file_put_contents($tempdock.$random_folder.'/solution.py',$_POST['code_arena']);
        $docker_container =generaterandomstring(10);
        if(file_exists($final_path_inp) && file_exists($final_path_inp_docker)) {

            if ($fp1 = fopen($final_path_inp_docker,"r")) {
                fclose($fp1);
                copy($final_path_inp_docker, "/var/www/html/student/tempdockers/" . $random_folder . "/checkinp.txt");
                file_put_contents("/var/www/html/student/tempdockers/" . $random_folder . "/runcode.sh","#!/bin/bash\ntimeout 2 python solution.py < checkinp.txt > out.txt 2>&1");
                shell_exec("chmod 0777 +x /var/www/html/student/tempdockers/".$random_folder."/runcode.sh");
            }
            $statement = "timeout --signal=SIGKILL 3 docker run --rm -m 10m --pids-limit 40 --cpu-quota=70000 --name " . $docker_container . " -v /var/www/html/student/tempdockers/" . $random_folder . ":/try testdock timeout 2 ./runcode.sh 2>&1";
        }
        else {
            $statement = "timeout --signal=SIGKILL 3 docker run --rm -m 10m --pids-limit 40 --cpu-quota=70000 --name " . $docker_container . " -v /var/www/html/student/tempdockers/" . $random_folder . ":/try testdock timeout 2 ./solution > /var/www/html/student/tempdockers/" . $random_folder . "/out.txt 2>&1";
        }
        //exec($statement,$output,$ret_stat);
        exec($statement,$output,$retstat);
        $data['retstat'] =$retstat;
        shell_exec("docker rm -f ".$docker_container);
        if($retstat == 124 || $retstat == 127 || $retstat == 137)
        {
            $data['verdict'] = 1;

            //Removing all temporary files and directories
            array_map('unlink', glob("/var/www/html/student/tempdockers/".$random_folder."/*.*"));
            unlink("/var/www/html/student/tempdockers/".$random_folder."/solution");
            rmdir("/var/www/html/student/tempdockers/".$random_folder);

            echo json_encode($data);
            die();
        }
        $now_out = "/var/www/html/student/tempdockers/" . $random_folder . "/out.txt";

        //Mega Output
        if(filesize($now_out) > 2000000)
        {
            $data['verdict'] = 1;
            unlink($now_out);
        }
        else{
            $char = substr(file_get_contents($now_out), -1);
            if($char == PHP_EOL)
            {
                $data_temp = file_get_contents($now_out);
                $data_temp = substr_replace($data_temp ,"",-1);
                unlink($now_out);
                file_put_contents($now_out,$data_temp);
                $data['output'] = $data_temp;
            }
            else
                $data['output'] = file_get_contents($now_out);

            if (sha1_file($now_out) == sha1_file($final_path_out) || abs(file_get_contents($now_out) - file_get_contents($final_path_out)) == 0 || abs(file_get_contents($now_out) - file_get_contents($final_path_out)) < 0.00001)
            {
                $data['verdict'] = 2;
            }else{
                $data['verdict'] = 3;
                $data['retstat'] = $retstat;
            }
        }

        //Removing all temporary files and directories
        array_map('unlink', glob("/var/www/html/student/tempdockers/".$random_folder."/*.*"));
        unlink("/var/www/html/student/tempdockers/".$random_folder."/solution");
        rmdir("/var/www/html/student/tempdockers/".$random_folder);
        shell_exec("rm -rf /var/www/html/student/tempdockers/" . $random_folder);

        echo json_encode($data);

    }
    else {
        //Some Error has occured while selecting the language
    }


}
?>