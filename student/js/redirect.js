/**
 * Created by root on 22/1/17.
 */
function  onDone(){
    var verdict = confirm('Are you done with saving answers?');
    if(verdict == true)
    {
        window.location.href = '../dashboard.php';
    }else{
        //Do Nothing
    }
}
