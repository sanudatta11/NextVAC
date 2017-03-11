/**
 * Created by root on 11/2/17.
 */

$(document).ready(function() {

    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    $('[data-toggle="tooltip"]').tooltip();
    $("#wrapper").toggleClass("toggled");


    // Used to hide the result divs
    $('#sampleout').hide();


    //Copying the editors text to desired textarea so that I can post it using form

    $('#runbt').hover(function() {
        // console.log("Hi  run");
        var textarea_obj=document.getElementById('code_arena_run');
        /* Stuff to do when the mouse enters the element */
        var val1=editor.getValue();
        textarea_obj.value=val1;
        //console.log(textarea_obj.value);
    }, function() {
        /* Stuff to do when the mouse leaves the element */
    });

    //Copying the editors text to desired textarea so that I can post it using form
    $('#subbt').hover(function() {
        //console.log("Hi  sub");
        var textarea_obj=document.getElementById('code_arena_sub');
        /* Stuff to do when the mouse enters the element */
        var val2=editor.getValue();
        textarea_obj.value=val2;
        //console.log(textarea_obj.value);
    }, function() {
        /* Stuff to do when the mouse leaves the element */
    });


    // Taking event for runfom

    $('#runform').submit(function(){
        $('#sampleout').hide();
        $('#processingbox').empty();

        $('#processingbox').append('<div class="content" id="processdiv"><br>'+
            '<p class="text-center">'+
            '<h2 class="text text-center" style="color: lightseagreen">'+
            '<strong>Running your code....</strong>'+
            '</h2>'+
            '</p>'+
            '<p class="text-center">'+
            '<embed src="../../images/spinner.gif" style="height: 300px; width: 350px; ">'+
            '</p>'+
            '</div>');

        $('#processingbox').show("blind", {times: 10,distance: 100}, 1000);
        $('html,body').animate({
                scrollTop: $("#processingbox").offset().top},
            'slow');

        $("#runbt").attr("disabled", true);
        $('#runbt').addClass('disabled');
        //console.log("Sub");
        // Maybe show a loading indicator...
        $.post($(this).attr('action'), $(this).serialize(), function(res){
            $('#processingbox').empty();
            $('#sampleout').show("blind", {times: 10,distance: 100}, 1000);
            $('html,body').animate({
                    scrollTop: $("#sampleout").offset().top},
                'slow');

            console.log(res);
            obj = JSON && JSON.parse(res) || $.parseJSON(res);
            //console.log(obj.errors);
            // Do something with the response `res`
            //console.log(res);
            console.log(obj);
            $('#sampleout').show();

            if(obj.errors == true)
            {
                //Sincere errors as of now
                $('#sampleout').hide();
            }
            else if(obj.verdict == 0)
            {
                $('#ginput').html(obj.dinput);
                $('#goutput').html(obj.doutput);
                $('#youtput').html(obj.output);
                $('#sampleverdict').html('Compilation Error');
            }else if(obj.verdict == 1)
            {
                var input_desired =obj.dinput;

                var html_out ="";
                for(i=0;i<input_desired.length;i++)
                {
                    if(input_desired.charAt(i)=='\n')
                    {
                        html_out+="<br>";
                    }
                    else{
                        html_out+=input_desired.charAt(i);
                    }
                }

                $('#ginput').html(html_out);

                var output_desired =obj.doutput;

                html_out ="";
                for(i=0;i<output_desired.length;i++)
                {
                    if(output_desired.charAt(i)=='\n')
                    {
                        html_out+="<br>";
                    }
                    else{
                        html_out+=output_desired.charAt(i);
                    }
                }

                $('#goutput').html(html_out);
                $('#youtput').html('No Output generated');
                $('#sampleverdict').html('Time Limit Exceeded!');

            }else if(obj.verdict == 2)
            {
                var input_desired =obj.dinput;

                var html_out ="";
                for(i=0;i<input_desired.length;i++)
                {
                    if(input_desired.charAt(i)=='\n')
                    {
                        html_out+="<br>";
                    }
                    else{
                        html_out+=input_desired.charAt(i);
                    }
                }

                $('#ginput').html(html_out);

                var output_desired =obj.doutput;

                html_out ="";
                for(i=0;i<output_desired.length;i++)
                {
                    if(output_desired.charAt(i)=='\n')
                    {
                        html_out+="<br>";
                    }
                    else{
                        html_out+=output_desired.charAt(i);
                    }
                }

                $('#goutput').html(html_out);

                $('#sampleverdict').html('Congratulations! You Have passed the Sample Test Case');

                var output_user =obj.output;

                html_out ="";
                for(i=0;i<output_user.length;i++)
                {
                    if(output_user.charAt(i)=='\n')
                    {
                        html_out+="<br>";
                    }
                    else{
                        html_out+=output_user.charAt(i);
                    }
                }
                $('#youtput').html(html_out);

            }else if(obj.verdict == 3)
            {

                var input_desired =obj.dinput;

                var html_out ="";
                for(i=0;i<input_desired.length;i++)
                {
                    if(input_desired.charAt(i)=='\n')
                    {
                        html_out+="<br>";
                    }
                    else{
                        html_out+=input_desired.charAt(i);
                    }
                }

                $('#ginput').html(html_out);

                var output_desired =obj.doutput;

                html_out ="";
                for(i=0;i<output_desired.length;i++)
                {
                    if(output_desired.charAt(i)=='\n')
                    {
                        html_out+="<br>";
                    }
                    else{
                        html_out+=output_desired.charAt(i);
                    }
                }

                $('#goutput').html(html_out);


                $('#sampleverdict').html("Sorry! You didn't pass the Sample Test Case");

                var output_user =obj.output;

                html_out ="";
                for(i=0;i<output_user.length;i++)
                {
                    if(output_user.charAt(i)=='\n')
                    {
                        html_out+="<br>";
                    }
                    else{
                        html_out+=output_user.charAt(i);
                    }
                }
                $('#youtput').html(html_out);

            }else if(obj.verdict == 4)
            {
                //Unknown Error
            }

        });
        $('#runbt').removeClass('disabled');
        $('#runbt').removeAttr("disabled");
        return false; // prevent default action

    });



    // Taking Event for submisson of submit form



    $('#subform').submit(function(){
        $('#processingbox').empty();
        $('#sampleout').hide();
        //console.log("Sub");
        // Maybe show a loading indicator...
        $('#processingbox').append('<div class="content" id="processdiv"><br>' +
            '<p class=" text text-center">' +
            '<h2 class="text text-center" style="color: lightseagreen">' +
            '<strong>We are Hatching your code</strong>' +
            '</h2>' +
            '</p>' +
            '<p class="text-center">' +
            '<embed src="../../images/loading.gif">' +
            ' </p>' +
            '</div>');
        $('#processingbox').show("blind", {times: 10,distance: 100}, 1000);
        $('html,body').animate({
                scrollTop: $("#processingbox").offset().top},
            'slow');

        //End of loading indicator
        $.post($(this).attr('action'), $(this).serialize(), function(res){

            $('#processingbox').empty();

            obj = JSON && JSON.parse(res) || $.parseJSON(res);
            //console.log(obj.errors);
            // Do something with the response `res`
            //console.log(res);
            console.log(obj);

            var tot_test = obj.number;

            // Success:
            // <div class="col-sm-4 " style="color: green; " id = "border "><br><br><a href="# "><span class="glyphicon glyphicon-ok " style="color: green; " ></span></a><b> TEST CASE 1 </b><br><br></div>

            // Failure
            // <div class="col-sm-4 " id="border " style="color: red; "><br><br><a href="# "><span class="glyphicon glyphicon-remove" style="color: red; " ></span></a> <b> TEST CASE 6 </b> <br><br></div>

            //TLE and Runtime Error
            //<div class="col-sm-4 " id="border " style="color: #eeaa00; "><br><br><a href="# "><span class=" glyphicon glyphicon-hourglass"  style="color: #eeaa00; "></span></a> <b> TEST CASE 4 </b> <br><br></div>

            $('#processingbox').append('<div class="container">' +
                '<div class="content" style="box-shadow: 10px 10px 10px 10px #888888; border-radius: 20px;">' +
                '<div class="well well-sm " style="border-radius: 20px;">' +
                '<h2 class="text text-center" style="color: lightseagreen" id="verdict_text">' +
                '   <div id="main_verdict"><strong> VERDICT</strong></div> </h2>' +
                '</div>' +
                '<div class="row" style="padding-left: 30px;" id="result">' +
                '</div>'+
                '</div>' +
                '</div>');
            if(obj.errortop == false)
            {
                var $flag_status = true;
                for(var i=1;i<=tot_test;++i)
                {
                    //console.log('Fuck me');
                    var temp_obj = 'test'+i;
                    if(obj[temp_obj]['verdict'] == 1)
                    {
                        $flag_status = 'tle';
                        //console.log('TLE');
                        $('#result').append('<div class="col-sm-4 " id="border" style="color: #eeaa00; "><br><br><a href="# "><span class=" glyphicon glyphicon-hourglass"  style="color: #eeaa00; "></span></a> <b> Test Case '+i+' </b> <br><br></div>');
                    }
                    else if(obj[temp_obj]['verdict'] == 2)
                    {
                        //console.log('Correct');
                        $('#result').append('<div class="col-sm-4 " style="color: green;" id = "border "><br><br><a href="# "><span class="glyphicon glyphicon-ok " style="color: green; " ></span></a><b> Test Case '+i+' </b><br><br></div>');
                    }
                    else if(obj[temp_obj]['verdict'] == 3)
                    {
                        $flag_status='wrong';
                        //Wrong
                        $('#result').append('<div class="col-sm-4 " id="border" style="color: red; "><br><br><a href="# "><span class="glyphicon glyphicon-remove" style="color: red; " ></span></a> <b> Test Case '+i+' </b> <br><br></div>');
                    }
                }

                if($flag_status == true)
                {
                    //Correct
                    $('#verdict_text').css('color','limegreen');
                    $('#main_verdict').empty();
                    $('#main_verdict').append('<strong>Congratulations!</strong>');
                }
                else if($flag_status == 'wrong')
                {
                    //Wrong
                    $('#verdict_text').css('color','red');
                    $('#main_verdict').empty();
                    $('#main_verdict').append('<strong>Wrong Answer</strong>');
                }
                else if($flag_status == 'tle')
                {
                    $('#verdict_text').css('color','#eeaa00');
                    $('#main_verdict').empty();
                    $('#main_verdict').append('<strong>Time Limit Exceeded!</strong>');
                }
            }
            else if(obj.errortop =='compileerror')
            {
                console.log(obj.compileerror);
                $('#verdict_text').css('color','#eeaa00');
                $('#main_verdict').empty();
                $('#main_verdict').append('<strong>Compilation Error</strong>');
                $('#result').empty();
                $('#result').append('<pre>'+obj.compileerror+'</pre>');
            }


        });
        return false; // prevent default action

    });

    //Changing the language and also the theme below with the help with Jquery
    $("#language").change(function(e) {
        //console.log(this.value);
        editor.getSession().setMode("ace/mode/" + this.value);
        var lang_name = $("#language option:selected").text();
        $('.language').val(lang_name);
    });
    $("#theme").change(function(e) {
        console.log(this.value);
        editor.setTheme("ace/mode/"+this.value);
    });

});


//Make the return data from PHP be a JSON where verdict contains compile error ,TLE, or Correct output or wrong
//Then the message value of data returned will contain data if output Generated i.e correct or wrong answer or Any error
//0-Compile error
//1=TLE
//2=Correct answer
//3-Wrong answer
//4-Default







