/**
 * Created by root on 22/1/17.
 */

function merakeyup(){
    document.getElementById('submitbutton').disabled=false;
}

function onSubmit(){
    var cansubmit=true;
    var question=document.getElementById('ques').value;
    var option1=document.getElementById('option1').value;
    var option2=document.getElementById('option2').value;
    var option3=document.getElementById('option3').value;
    var option4=document.getElementById('option4').value;
    var cansubmit=true;
    if((question.length==0)||(option1.length==0)||(option2.length==0)||(option3.length==0)||(option4.length==0)){
        cansubmit=false;
        // alert('Please Fill All The Fields');
    }
    document.getElementById('submitbutton').disabled=!cansubmit;
}

function  onDone(){
    console.log('IN');
    var verdict = confirm('Are you done with saving questions?');
    if(verdict == true)
    {
        //console.log("kjnaskjd");
        window.location.href = '../dashboard.php';
    }else{
        //Do Nothing
    }
}
