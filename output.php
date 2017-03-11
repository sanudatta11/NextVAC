<?php
    echo '<pre>';
    //$out =  shell_exec("docker images");
    //$content = system("docker run -it --rm --name testname testdock", $ret);
    //$out = shell_exec("sudo docker run -it --rm --name testname testdock");
    shell_exec("docker build -t testdock . --no-cache");	
    exec("timeout --signal=SIGKILL 2 docker run --rm --pids-limit 2 -m 4m --cpu-quota=50000 --name testname testdock 2>&1",$output,$ret_stat);
    //$output = preg_replace('/^.+\n/', '', $output);
    //$output = substr($output, 0, strrpos($output, "\n"));
    unset($output[0]);
    array_pop($output);
    echo print_r($output);
    echo '<br>';
    echo $ret_stat;
    shell_exec("docker rm -f testname");
    //shell_exec("sudo chmod +x output_sh.sh");
    //$out = shell_exec("sudo ./output_sh.sh");
    //echo print_r($out);
    //$content = system("sudo docker images",$ret);
    echo '</pre>';
?>
