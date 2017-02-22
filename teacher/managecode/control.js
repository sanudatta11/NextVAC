/**
 * Created by root on 6/2/17.
 */
/**
 * Created by root on 26/1/17.
 */


$(document).ready(function(){
    $('[data-toggle="tooltip "]').tooltip();

    $('#live').hover(
        function () {
            //On Hover
            $('#manageform').attr('action','changeprop/startcontest.php');
        },
        function () {
            //On leaving it

        }
    );

    $('#clive').hover(
        function () {
            //On Hover
            $('#manageform').attr('action','changeprop/stopcontest.php');
        }
    );

    $('#clive').click(
        function () {
            //On Hover
            $('#manageform').attr('action','changeprop/stopcontest.php');
        }
    );

    $('#delete').hover(function () {
            //On Hover
            $('#manageform').attr('action','changeprop/deletecontest.php');
        },
        function () {
            //Off Hover
            //$('#manageform').attr('action','changeprop/active_set.php');
        });

    $('#delete').click(function () {
        //On Hover
        $('#manageform').attr('action','changeprop/deletecontest.php');
    });



    $("#menu-toggle ").click(function(e) {
        e.preventDefault();
        $("#wrapper ").toggleClass("toggled ");
    });
});
