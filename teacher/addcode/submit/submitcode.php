<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 4/2/17
 * Time: 10:46 PM
 */

/*
 * Legends for the name of the POST Variables that will be posted to this data
 * title=>Will contain the title of the Question
 * statement=>Enter the statement here for the Question
 * inputstat=> Contains the Input statement for the Question
 * outputstat=>Contains the output of the Code Question
 * sampleinp=>Contains the sample input by the teacher
 * sampleout=>Contains the sample output
 *
 * as_file=>Contains Checkbox data if it is file or text input(Value:file) means file
 *
 * Now Looped inputs with names
 *
 * Files:
 *   input1,input2 for files
 *   output1,output2 for files
 *
 * Text:
 *   inputtext1,inputtext2,
 *   outputtext1,outputext2
 *
 *
*/

/*
 * Information Regarding DB
 *
 * Two DBs:-
 * 1.Question DB
 * 2.Answer DB
 *
 * In coding DB there is one field named persistance that is used for contest to be persisant or not
 * 1.Persistant - Means this is strictly adhered to time
 * 2.Non Persistant - Means It will be duration based
 *
 *
 * */

//file_put_contents($file,$_POST['sampleinp']) or die('Cannot');

session_start();

if($_SESSION['designation'] != 'teacher' || !isset($_SESSION['secretkey']))
{
    $_SESSION['relogin'] = true;
    header('Location: ../../../index.php?attempt=relogin');
    die();
}

if(!(isset($_SESSION['propic'])&&isset($_SESSION['name'])&&isset($_SESSION['cabin'])))
{
    $_SESSION['issue'] = 'contactadmin';
    header('Location: ../../../index.php?attempt=help');
    die();
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/confidential/connector.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/confidential/mysql_login.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/dependencies/randomize/randomstring.php';

//Check Session Variables
if(isset($_SESSION['csection']) && isset($_SESSION['ccode']))
{
    //Have Variables
}
else
{
    //Redirect back
    header('Location: ../adddetail.php');
    die();
}


//Do All Validation above
if(isset($_POST))
{
    if(isset($_POST['duration']) && isset($_POST['title']) && isset($_POST['statement']) && isset($_POST['inputstat']) && isset($_POST['outputstat']) && isset($_POST['sampleinp']) && isset($_POST['sampleout']) && $_POST['marks'])
    {
        $val_tot = preg_replace('/[^0-9]+/','',$_POST['numtestcase']);

        if($val_tot <= 0) {
            //Return Back if no test selected
            header('Location: ../addcode.php?attempt=tryagain');
            die();
        }

        $inptext = $_POST['inputtext'];
        $outtext = $_POST['outputtext'];

        $title = preg_replace('/[^A-Za-z0-9 ]+/','',$_POST['title']);
        $statement = preg_replace('/[^A-Za-z0-9. ]+/','',$_POST['statement']);
        $inputstat = preg_replace('/[^A-Za-z0-9. ]+/','',$_POST['inputstat']);
        $outputstat = preg_replace('/[^A-Za-z0-9. ]+/','',$_POST['outputstat']);
        $sampleinp = $_POST['sampleinp'];
        $sampleout = $_POST['sampleout'];
        $duration = preg_replace('/[^0-9:]+/','',$_POST['duration']);
        $marks = preg_replace('/[^0-9:]+/','',$_POST['marks']);


        if(isset($_POST['explanation']))
        {
            $explain = preg_replace('/[^A-Za-z0-9. ]+/','',$_POST['explanation']);
        }

        $path = '../questions/';
        do{
            $random = generaterandomstring(30);
        }while(file_exists($path.$random));
        $oldmask = umask(0);

        $path = $path.$random;

        mkdir($path,0744);            //Making a Random Directtory for the specific user.

        $insert_statement_string = "INSERT INTO nextvac.codingdb (
            secretkey,
            section,
            contestcode,
            contestname,
            problemname,
            problemcode,
            problemstat,
            inputstat,
            outputstat,
            totaltestcase,
            sample,
            explaination,
            inpfolder,
            outfolder,
            duration,
            marks)
            VALUES 
            (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";

        //Finding the Max code id
        $code_id_string = "SELECT MAX(problemcode) FROM nextvac.codingdb WHERE contestcode = :ccode AND secretkey = :seckey";
        $code_obj = $mysql_conn->prepare($code_id_string);
        $code_obj->bindParam(':ccode',$_SESSION['ccode']);
        $code_obj->bindParam(':seckey',$_SESSION['secretkey']);

        $code_obj->execute();

        if($code_obj->rowCount() > 0)
        {
            $code_obj->setFetchMode(PDO::FETCH_ASSOC);
            $code_result = $code_obj->fetch();
            $max_code_id = $code_result['MAX(problemcode)'];
            ++$max_code_id;
        }
        else
        {
            $max_code_id=1;
        }

        //Adding the sample test case to a file

        file_put_contents($path.'/sampleinp.txt',$sampleinp);
        file_put_contents($path.'/sampleout.txt',$sampleout);

        //Uploading Rest Testcase Files:-


        $insert_statement = $mysql_conn->prepare($insert_statement_string);

        $insert_statement->bindParam(1,$_SESSION['secretkey'],PDO::PARAM_STR);
        $insert_statement->bindParam(2,$_SESSION['csection'],PDO::PARAM_STR);
        $insert_statement->bindParam(3,$_SESSION['ccode'],PDO::PARAM_STR);
        $insert_statement->bindParam(4,$_SESSION['cname'],PDO::PARAM_STR);
        $insert_statement->bindParam(5,$title,PDO::PARAM_STR);
        $insert_statement->bindParam(6,$max_code_id,PDO::PARAM_INT);
        $insert_statement->bindParam(7,$statement,PDO::PARAM_STR);
        $insert_statement->bindParam(8,$inputstat,PDO::PARAM_STR);
        $insert_statement->bindParam(9,$outputstat,PDO::PARAM_STR);
        $insert_statement->bindParam(10,$val_tot,PDO::PARAM_INT);
        $insert_statement->bindParam(11,$path,PDO::PARAM_STR);
        $insert_statement->bindParam(12,$explain,PDO::PARAM_STR);

//          $insert_statement->bindParam(13,,PDO::PARAM_STR);
//          $insert_statement->bindParam(14,,PDO::PARAM_STR);

        //Duration will be stored here
        $hours = (int)($duration[0].$duration[1]);
        $mins = (int)($duration[3].$duration[4]);
        $tot = $hours * 60 + $mins;


        $inpfolder =$path;
        $outfolder=$path;

        do{
            $inprandom = generaterandomstring(30);
        }while(file_exists($path.'/'.$inprandom));

        do{
            $outrandom = generaterandomstring(30);
        }while(file_exists($path.'/'.$outrandom));

        $inpfolder=$inpfolder.'/'.$inprandom;
        $outfolder=$outfolder.'/'.$outrandom;


        mkdir($inpfolder,0744);
        mkdir($outfolder,0744);

        if(isset($_POST['as_file']) && $_POST['as_file'] == 'file')
        {
            $val_tot1 = count($_FILES['inputfile']['name']);
            $val_tot2 = count($_FILES['outputfile']['name']);

            if($val_tot == $val_tot1)
            {
                if($val_tot ==$val_tot2)
                {
                    //All Right leave as of now

                }else
                {
                    //Something is wrong this is a parity check which should always match no matter what
                    //Redirect this user to some other page if this parity check doesn't matches
                    unset($_SESSION['csection']);
                    unset($_SESSION['ccode']);
                    unset($_SESSION['cname']);
                    header('Location: ../adddetail.php');
                    die();
                }
            }
            else
            {
                unset($_SESSION['csection']);
                unset($_SESSION['ccode']);
                unset($_SESSION['cname']);
                header('Location: ../adddetail.php');
                die('Something seriously wrong');
            }



            for($var_i = 0;$var_i < $val_tot; ++$var_i)
            {

                //Inputing as files for test input
                $temp_path = $_FILES['inputfile']['tmp_name'][$var_i];
                if($temp_path != "")
                {
                    //Setup New file path
                    $inpfile_path = $inpfolder.'/input'.($var_i+1).'.txt';

                    //Upload Files
                    if(move_uploaded_file($temp_path,$inpfile_path))
                    {
                        //moved files
                    }
                    else{
                        unset($_SESSION['csection']);
                        unset($_SESSION['ccode']);
                        unset($_SESSION['cname']);
                        $_SESSION['ccode'] = 'movefailed';
                        header('Location: ../adddetail.php?code=movefailed');
                        die();
                    }

                }

                //Inputing as files for test output
                $temp_path = $_FILES['outputfile']['tmp_name'][$var_i];
                if($temp_path != "")
                {
                    //Setup New file path
                    $outfile_path = $outfolder.'/output'.($var_i+1).'.txt';

                    //Upload Files
                    if(move_uploaded_file($temp_path,$outfile_path))
                    {

                    }
                    else{
                        die("Move File Error");
                    }

                }else{
                    die('Unknown Bakchodi');
                }
            }

        }
        else
        {
            //Inputing as text
            for($var_i = 0;$var_i < $val_tot; ++$var_i)
            {
                //Saving input from text to files
                file_put_contents($inpfolder.'/input'.($var_i+1).'.txt',$inptext[$var_i]);

                //Saving output from text to files
                file_put_contents($outfolder.'/output'.($var_i+1).'.txt',$outtext[$var_i]);
            }
        }

        $insert_statement->bindParam(13,$inpfolder,PDO::PARAM_STR);
        $insert_statement->bindParam(14,$outfolder,PDO::PARAM_STR);
        $insert_statement->bindParam(15,$tot,PDO::PARAM_INT);
        $insert_statement->bindParam(16,$marks,PDO::PARAM_INT);

        $insert_statement->execute();

        //Redirecting When Done
        $_SESSION['codesubmitteacher'] = true;
        header('Location: ../addcode.php?submit=done');

    }
    else
    {

        echo print_r($_POST);
        echo "Bla bla no Post";
        die();
    }
}



