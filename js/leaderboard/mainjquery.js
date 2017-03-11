/**
 * Created by root on 11/3/17.
 */

$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
    $("#wrapper").toggleClass("toggled");

    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });


    var prevcount = 1;
    var currentcount = 1;
    var k = 7;
    var n = document.getElementById('count').rows.length;

    for(var i=1;i<=k;i++)
    {
        $('#'+i).css('display','table-row');
    }
    currentcount = k;

    if(n<k)
    {
        $('#button1').prop('disabled',true);
        $('#button2').prop('disabled',true);
    }

    //Under CLick
    $('#button1').click(function () {
        $('#button2').prop('disabled',false);
        for(var i=prevcount;i<=currentcount;i++)
        {
            $('#'+i).css('display','none');
        }

        prevcount=currentcount+1;
        currentcount = currentcount + k;
        var i =0;
        for(i=prevcount;i<=currentcount && i<=n;i++)
        {
            $('#'+i).css('display','table-row');
        }
        currentcount = i-1;

        if(i>=n)
        {
            $('#button1').prop('disabled',true);
        }

    });

    //Under CLick
    $('#button2').click(function () {
        $('#button1').prop('disabled',false);
        var takeit = ((currentcount>n)?n:currentcount);
        for(var i=takeit;i>=prevcount;--i)
        {
            $('#'+i).css('display','none');
        }

        currentcount = prevcount-1;
        prevcount = prevcount - k;

        var i =0;
        for(i = prevcount;i<=currentcount;++i)
        {
            $('#'+i).css('display','table-row');
        }
        if(prevcount==0||prevcount==1)
            $('#button2').prop('disabled',true);
    });

});
