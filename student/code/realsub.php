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
$seconds = 40;
set_time_limit($seconds);
$data['errortop'] = false;

if (empty($_POST['code_arena']))
{
    $data['errortop'] = 'Empty';
    echo json_encode($data);
    die();
}
else{

    $random_folder = generaterandomstring(50);

    $tempdock ='../tempdockers/';
    do{
        $random_folder = generaterandomstring(30);
    }while(file_exists($tempdock.$random_folder));
    $oldmask = umask(0);

    mkdir($tempdock.$random_folder,0744);
    $language_select = preg_replace('/[^A-Za-z+]+/','',$_POST['language']);
    $contest_code = preg_replace('/[^A-Za-z0-9]+/','',$_POST['ccode']);
    $problem_code = preg_replace('/[^0-9]+/','',$_POST['pcode']);

    $codecheck_string = "SELECT * FROM nextvac.codingdb WHERE contestcode = :ccode AND section = :section AND problemcode = :pcode AND status = 1 LIMIT 1";
    $codecheck_obj = $mysql_conn->prepare($codecheck_string);
    $codecheck_obj->bindParam(':ccode',$contest_code,PDO::PARAM_STR);
    $codecheck_obj->bindParam(':section',$_SESSION['section'],PDO::PARAM_STR);
    $codecheck_obj->bindParam(':pcode',$problem_code,PDO::PARAM_INT);

    $codecheck_obj->execute();

    if($codecheck_obj->rowCount() > 0)
    {
        $pre_path = '/var/www/html/teacher/addcode/';
        $codecheck_obj->setFetchMode(PDO::FETCH_ASSOC);
        $codecheck_result = $codecheck_obj->fetch();

        $inpfolder = $codecheck_result['inpfolder'];
        $outfolder = $codecheck_result['outfolder'];
        $total_test = preg_replace('/[^0-9+]+/','',$codecheck_result['totaltestcase']);

        $inpfolder = substr($inpfolder,3);
        $outfolder = substr($outfolder,3);
        $file_flag = true;
        $file_index = 1;
        $data['number'] = $total_test;
        do{
            $inp_temp=$pre_path.$inpfolder.'/input'.$file_index.'.txt';
            $out_temp=$pre_path.$outfolder.'/output'.$file_index.'.txt';

            if(file_exists($inp_temp) && file_exists($out_temp))
            {
                //Do nothing bro just chill out routine task we are just checking

            }
            else{
                //No more checks all is done
                $file_flag = false;
                break;
            }

            unset($inp_temp);
            unset($out_temp);
            $file_index = $file_index+1;
        }while($file_index <= $total_test);

        if(!$file_flag)
        {
            $data['errortop'] = 'Files not matched';
            echo json_encode($data);
            die();
        }

        //Score initialize as zero
        $score = 0;
        $max_score = $codecheck_result['marks'];

        $code_now = $mysql_conn->prepare('SELECT * FROM nextvac.coderesults WHERE secretkey = :seckey AND contestcode = :ccode AND problemcode = :pcode');
        $code_now->bindParam(':seckey',$_SESSION['secretkey'],PDO::PARAM_STR);
        $code_now->bindParam(':ccode',$contest_code,PDO::PARAM_STR);
        $code_now->bindParam(':pcode',$problem_code,PDO::PARAM_INT);
        $code_now->execute();

        if($code_now->rowCount() > 0)
        {
            $code_now->setFetchMode(PDO::FETCH_ASSOC);
            $temp_res = $code_now->fetch();
            $prev_score = $temp_res['score'];
            $temp_id = $temp_res['id'];
            unset($temp_res);
        }

        if($language_select == 'C++')
        {

            file_put_contents($tempdock.$random_folder.'/solution.cpp',$_POST['code_arena']);
            exec("g++ -o /var/www/html/student/tempdockers/".$random_folder."/solution /var/www/html/student/tempdockers/".$random_folder."/solution.cpp 2>&1",$compile_error,$ret_temp);

            if(isset($compile_error) && $ret_temp != 0) {
                $final_error = "";
                foreach ($compile_error as $compileline) {
                    $compileline = substr($compileline, 98);
                    $final_error = $final_error . '<br>' . $compileline;
                }
//                $compile_error =substr($compile_error,98);
                //Error Has Occured
                $data['errortop'] = 'compileerror';
                $data['compileerror'] = $final_error;
            }
            $compile_error = shell_exec("g++ -o /var/www/html/student/tempdockers/".$random_folder."/solution /var/www/html/student/tempdockers/".$random_folder."/solution.cpp 2>&1");

            if(isset($compile_error))
            {
                $compile_error =substr($compile_error,98);
                //Error Has Occured
                $data['errortop'] = 'compileerror';
                $data['compileerror'] = $compile_error;
                echo json_encode($data);
            }
            else
            {
                $docker_container =generaterandomstring(10);
                $file_index = 1;
                do{
                    $temp_data = array();
                    $temp_index_string = "test".$file_index;
                    $inp_temp=$pre_path.$inpfolder.'/input'.$file_index.'.txt';
                    $out_temp=$pre_path.$outfolder.'/output'.$file_index.'.txt';

//                    $data['inpfile'] = $inp_temp;
//                    $data['outfile'] = $out_temp;
                    $data['inpfile'] = $inp_temp;
                    $data['outfile'] = $out_temp;

                    if(file_exists($inp_temp) && file_exists($out_temp))
                    {
                        //Reducing time in previous one by checking as i know its already there

                        if ($fp1 = fopen($inp_temp,"r")) {
                            fclose($fp1);
                            copy($inp_temp, "/var/www/html/student/tempdockers/" . $random_folder . "/checkinp.txt");
                            file_put_contents("/var/www/html/student/tempdockers/" . $random_folder . "/runcode.sh","#!/bin/bash\ntimeout 2 ./solution < checkinp.txt > out.txt");
                            shell_exec("chmod 0777 +x /var/www/html/student/tempdockers/".$random_folder."/runcode.sh");
                        }
                        $statement = "timeout --signal=SIGKILL 3 docker run --rm --pids-limit 40 -m 10m --cpu-quota=70000 --name " . $docker_container . " -v /var/www/html/student/tempdockers/" . $random_folder . ":/try testdock timeout 2 ./runcode.sh 2>&1";
                        $statement = "timeout --signal=SIGKILL 3 docker run --rm --pids-limit 40 --cpu-quota=70000 --name " . $docker_container . " -v /var/www/html/student/tempdockers/" . $random_folder . ":/try testdock timeout 2 ./runcode.sh 2>&1";

                        exec($statement,$output,$retstat);
                        shell_exec("docker rm -f ".$docker_container);

                        $fuck_temp = "test".$file_index;

                        if($retstat == 124 || $retstat == 127 || $retstat == 137 || !isset($output))
                        {
                            $temp_data['verdict'] = 1;
                            $temp_data['retstat'] = $retstat;
                            $data[$fuck_temp] = $temp_data;
                        }
                        else{
                            $now_out = "/var/www/html/student/tempdockers/" . $random_folder . "/out.txt";

                            //Mega Output
                            if(filesize($now_out) > 2000000)
                            {
                                $temp_data['verdict'] = 1;
                                $temp_data['retstat'] = $retstat;
                                unlink($now_out);
                                continue;
                            }
                            else{
                                $char = substr(file_get_contents($now_out), -1);
                                if($char == PHP_EOL)
                                {
                                    $data_temp = file_get_contents($now_out);
                                    $data_temp = substr_replace($data_temp ,"",-1);
                                    unlink($now_out);
                                    file_put_contents($now_out,$data_temp);
                                    $temp_data['output'] = $data_temp;
                                    unset($data_temp);
                                }
                                else
                                    $temp_data['output'] = file_get_contents($now_out);

                                if(sha1_file($now_out) == sha1_file($out_temp))
                                {
                                    $score = $score + ($max_score/$total_test);
                                    $temp_data['verdict'] = 2;
                                }else{
                                    $temp_data['verdict'] = 3;
                                    $temp_data['retstat'] = $retstat;
                                }
                            }

                            $data[$fuck_temp] = $temp_data;
                            unset($temp_data);
                            unlink("/var/www/html/student/tempdockers/" . $random_folder . "/checkinp.txt");
                            unlink($now_out);

                        }

                        //Done with fucking thing
                    }
                    else
                    {
                        //No more checks all is done
                        $file_flag = false;
                        break;
                    }

                    unset($inp_temp);   //Not deleting it bro just unsetting it.
                    unset($out_temp);   //Not deleting it also
                    ++$file_index;
                }while($file_index <= $total_test);

                if(isset($temp_id))
                    $data['tempid'] = $temp_id;
//                End of loop
                if(isset($prev_score)&&$score>$prev_score) {
                    $created_date = date("Y-m-d H:i:s");
                    $update_stat = "UPDATE nextvac.coderesults SET score = :score,subtime = :subtime WHERE id = :tid";
                    $update_obj = $mysql_conn->prepare($update_stat);
                    $update_obj->bindParam(':score',$score,PDO::PARAM_INT);
                    $update_obj->bindParam(':subtime',$created_date);
                    $update_obj->bindParam(':tid',$temp_id,PDO::PARAM_INT);
                    unset($temp_id);
                    //$update_obj->bindParam(':seckey',$_SESSION['secretkey'],PDO::PARAM_STR);
                    $update_obj->execute();
                    unset($created_date);
                }elseif (!isset($prev_score)){
                    $create_statement = "INSERT INTO nextvac.coderesults (secretkey,contestcode,problemcode,score) VALUES (?,?,?,?)";
                    $created_obj = $mysql_conn->prepare($create_statement);
                    $created_obj->bindParam(1,$_SESSION['secretkey'],PDO::PARAM_STR);
                    $created_obj->bindParam(2,$contest_code,PDO::PARAM_STR);
                    $created_obj->bindParam(3,$problem_code,PDO::PARAM_INT);
                    $created_obj->bindParam(4,$score,PDO::PARAM_INT);
                    $created_obj->execute();
                }

                //Removing all temporary files and directories
                array_map('unlink', glob("/var/www/html/student/tempdockers/".$random_folder."/*.*"));
                unlink("/var/www/html/student/tempdockers/".$random_folder."/solution");
                rmdir("/var/www/html/student/tempdockers/".$random_folder);

                echo json_encode($data,JSON_UNESCAPED_SLASHES);
                die();
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
                $data['errortop'] = 'compileerror';
                $data['compileerror'] = $final_error;
                echo json_encode($data);
            }
            else
            {
                $docker_container =generaterandomstring(10);
                $file_index = 1;
                do{
                    $temp_data = array();
                    $temp_index_string = "test".$file_index;
                    $inp_temp=$pre_path.$inpfolder.'/input'.$file_index.'.txt';
                    $out_temp=$pre_path.$outfolder.'/output'.$file_index.'.txt';

//                    $data['inpfile'] = $inp_temp;
//                    $data['outfile'] = $out_temp;

                    if(file_exists($inp_temp) && file_exists($out_temp))
                    {
                        //Reducing time in previous one by checking as i know its already there

                        if ($fp1 = fopen($inp_temp,"r")) {
                            fclose($fp1);
                            copy($inp_temp, "/var/www/html/student/tempdockers/" . $random_folder . "/checkinp.txt");
                            file_put_contents("/var/www/html/student/tempdockers/" . $random_folder . "/runcode.sh","#!/bin/bash\ntimeout 2 ./solution < checkinp.txt > out.txt");
                            shell_exec("chmod 0777 +x /var/www/html/student/tempdockers/".$random_folder."/runcode.sh");
                        }

                        $statement = "timeout --signal=SIGKILL 3 docker run --rm --pids-limit 40 -m 10m --cpu-quota=70000 --name " . $docker_container . " -v /var/www/html/student/tempdockers/" . $random_folder . ":/try testdock timeout 2 ./runcode.sh 2>&1";

                        exec($statement,$output,$retstat);
                        shell_exec("docker rm -f ".$docker_container);

                        $fuck_temp = "test".$file_index;

                        if($retstat == 124 || $retstat == 127 || $retstat == 137 || !isset($output))
                        {
                            $temp_data['verdict'] = 1;
                            $temp_data['retstat'] = $retstat;
                            $data[$fuck_temp] = $temp_data;
                        }
                        else{
                            $now_out = "/var/www/html/student/tempdockers/" . $random_folder . "/out.txt";

                            //Mega Output
                            if(filesize($now_out) > 2000000)
                            {
                                $temp_data['verdict'] = 1;
                                $temp_data['retstat'] = $retstat;
                                unlink($now_out);
                                continue;
                            }
                            else{
                                $char = substr(file_get_contents($now_out), -1);
                                if($char == PHP_EOL)
                                {
                                    $data_temp = file_get_contents($now_out);
                                    $data_temp = substr_replace($data_temp ,"",-1);
                                    unlink($now_out);
                                    file_put_contents($now_out,$data_temp);
                                    $temp_data['output'] = $data_temp;
                                    unset($data_temp);
                                }
                                else
                                    $temp_data['output'] = file_get_contents($now_out);

                                if(sha1_file($now_out) == sha1_file($out_temp))
                                {
                                    $score = $score + ($max_score/$total_test);
                                    $temp_data['verdict'] = 2;
                                }else{
                                    $temp_data['verdict'] = 3;
                                    $temp_data['retstat'] = $retstat;
                                }
                            }

                            $data[$fuck_temp] = $temp_data;
                            unset($temp_data);
                            unlink("/var/www/html/student/tempdockers/" . $random_folder . "/checkinp.txt");
                            unlink($now_out);

                        }

                        //Done with fucking thing
                    }
                    else
                    {
                        //No more checks all is done
                        $file_flag = false;
                        break;
                    }

                    unset($inp_temp);   //Not deleting it bro just unsetting it.
                    unset($out_temp);   //Not deleting it also
                    ++$file_index;
                }while($file_index <= $total_test);

//                End of loop
                if(isset($temp_id))
                    $data['tempid'] = $temp_id;
//                End of loop
                if(isset($prev_score)&&$score>$prev_score) {
                    $created_date = date("Y-m-d H:i:s");
                    $update_stat = "UPDATE nextvac.coderesults SET score = :score,subtime = :subtime WHERE id = :tid";
                    $update_obj = $mysql_conn->prepare($update_stat);
                    $update_obj->bindParam(':score',$score,PDO::PARAM_INT);
                    $update_obj->bindParam(':subtime',$created_date);
                    $update_obj->bindParam(':tid',$temp_id,PDO::PARAM_INT);
                    unset($temp_id);
                    //$update_obj->bindParam(':seckey',$_SESSION['secretkey'],PDO::PARAM_STR);
                    $update_obj->execute();
                    unset($created_date);
                }elseif (!isset($prev_score)){
                    $create_statement = "INSERT INTO nextvac.coderesults (secretkey,contestcode,problemcode,score) VALUES (?,?,?,?)";
                    $created_obj = $mysql_conn->prepare($create_statement);
                    $created_obj->bindParam(1,$_SESSION['secretkey'],PDO::PARAM_STR);
                    $created_obj->bindParam(2,$contest_code,PDO::PARAM_STR);
                    $created_obj->bindParam(3,$problem_code,PDO::PARAM_INT);
                    $created_obj->bindParam(4,$score,PDO::PARAM_INT);
                    $created_obj->execute();
                }

                //Removing all temporary files and directories
                array_map('unlink', glob("/var/www/html/student/tempdockers/".$random_folder."/*.*"));
                unlink("/var/www/html/student/tempdockers/".$random_folder."/solution");
                rmdir("/var/www/html/student/tempdockers/".$random_folder);

                echo json_encode($data,JSON_UNESCAPED_SLASHES);
                die();
            }

            $compile_error = shell_exec("gcc /var/www/html/student/tempdockers/".$random_folder."/solution.c -o /var/www/html/student/tempdockers/".$random_folder."/solution.out  2>&1");

        }
        elseif ($language_select == 'Java')
        {
            file_put_contents($tempdock.$random_folder.'/solution.java',$_POST['code_arena']);
        }
        elseif ($language_select == 'Python')
        {
            file_put_contents($tempdock.$random_folder.'/solution.py',$_POST['code_arena']);
            $docker_container =generaterandomstring(10);
            $file_index = 1;
            do{
                $temp_data = array();
                $temp_index_string = "test".$file_index;
                $inp_temp=$pre_path.$inpfolder.'/input'.$file_index.'.txt';
                $out_temp=$pre_path.$outfolder.'/output'.$file_index.'.txt';

//                    $data['inpfile'] = $inp_temp;
//                    $data['outfile'] = $out_temp;

                if(file_exists($inp_temp) && file_exists($out_temp))
                {
                    //Reducing time in previous one by checking as i know its already there

                    if ($fp1 = fopen($inp_temp,"r")) {
                        fclose($fp1);
                        copy($inp_temp, "/var/www/html/student/tempdockers/" . $random_folder . "/checkinp.txt");
                        file_put_contents("/var/www/html/student/tempdockers/" . $random_folder . "/runcode.sh","#!/bin/bash\ntimeout 2 python3 solution.py < checkinp.txt > out.txt");
                        shell_exec("chmod 0777 +x /var/www/html/student/tempdockers/".$random_folder."/runcode.sh");
                    }

                    $statement = "timeout --signal=SIGKILL 3 docker run --rm --pids-limit 40 -m 10m --cpu-quota=70000 --name " . $docker_container . " -v /var/www/html/student/tempdockers/" . $random_folder . ":/try testdock timeout 2 ./runcode.sh 2>&1";

                    exec($statement,$output,$retstat);
                    shell_exec("docker rm -f ".$docker_container);

                    $fuck_temp = "test".$file_index;

                    if($retstat == 124 || $retstat == 127 || $retstat == 137 || !isset($output))
                    {
                        $temp_data['verdict'] = 1;
                        $temp_data['retstat'] = $retstat;
                        $data[$fuck_temp] = $temp_data;
                    }
                    else{
                        $now_out = "/var/www/html/student/tempdockers/" . $random_folder . "/out.txt";

                        //Mega Output
                        if(filesize($now_out) > 2000000)
                        {
                            $temp_data['verdict'] = 1;
                            $temp_data['retstat'] = $retstat;
                            unlink($now_out);
                            continue;
                        }
                        else{
                            $char = substr(file_get_contents($now_out), -1);
                            if($char == PHP_EOL)
                            {
                                $data_temp = file_get_contents($now_out);
                                $data_temp = substr_replace($data_temp ,"",-1);
                                unlink($now_out);
                                file_put_contents($now_out,$data_temp);
                                $temp_data['output'] = $data_temp;
                                unset($data_temp);
                            }
                            else
                                $temp_data['output'] = file_get_contents($now_out);

                            if(sha1_file($now_out) == sha1_file($out_temp))
                            {
                                $score = $score + ($max_score/$total_test);
                                $temp_data['verdict'] = 2;
                            }else{
                                $temp_data['verdict'] = 3;
                                $temp_data['retstat'] = $retstat;
                            }
                        }

                        $data[$fuck_temp] = $temp_data;
                        unset($temp_data);
                        unlink("/var/www/html/student/tempdockers/" . $random_folder . "/checkinp.txt");
                        unlink($now_out);

                    }

                    //Done with fucking thing
                }
                else
                {
                    //No more checks all is done
                    $file_flag = false;
                    break;
                }

                unset($inp_temp);   //Not deleting it bro just unsetting it.
                unset($out_temp);   //Not deleting it also
                ++$file_index;
            }while($file_index <= $total_test);

//                End of loop
            if(isset($temp_id))
                $data['tempid'] = $temp_id;
//                End of loop
            if(isset($prev_score)&&$score>$prev_score) {
                $created_date = date("Y-m-d H:i:s");
                $update_stat = "UPDATE nextvac.coderesults SET score = :score,subtime = :subtime WHERE id = :tid";
                $update_obj = $mysql_conn->prepare($update_stat);
                $update_obj->bindParam(':score',$score,PDO::PARAM_INT);
                $update_obj->bindParam(':subtime',$created_date);
                $update_obj->bindParam(':tid',$temp_id,PDO::PARAM_INT);
                unset($temp_id);
                //$update_obj->bindParam(':seckey',$_SESSION['secretkey'],PDO::PARAM_STR);
                $update_obj->execute();
                unset($created_date);
            }elseif (!isset($prev_score)){
                $create_statement = "INSERT INTO nextvac.coderesults (secretkey,contestcode,problemcode,score) VALUES (?,?,?,?)";
                $created_obj = $mysql_conn->prepare($create_statement);
                $created_obj->bindParam(1,$_SESSION['secretkey'],PDO::PARAM_STR);
                $created_obj->bindParam(2,$contest_code,PDO::PARAM_STR);
                $created_obj->bindParam(3,$problem_code,PDO::PARAM_INT);
                $created_obj->bindParam(4,$score,PDO::PARAM_INT);
                $created_obj->execute();
            }

            //Removing all temporary files and directories
            array_map('unlink', glob("/var/www/html/student/tempdockers/".$random_folder."/*.*"));
            unlink("/var/www/html/student/tempdockers/".$random_folder."/solution");
            rmdir("/var/www/html/student/tempdockers/".$random_folder);

            echo json_encode($data,JSON_UNESCAPED_SLASHES);
            die();
        }
        else {
            //Some Error has occured while selecting the language
        }


    }
    else
    {
        //Tampered Data or contest taken off when submitted
        //Redirect to the contest page

        header('Location: contest.php');
        die();
    }

}
?>

