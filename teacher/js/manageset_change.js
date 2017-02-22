/**
 * Created by root on 26/1/17.
 */


$(document).ready(function(){
    $('[data-toggle="tooltip "]').tooltip();

    $('#live').hover(
        function () {
            //On Hover
            $('#manageform').attr('action','changeprop/active_set.php');
        },
        function () {
            //On leaving it
            
        }
    );
    
    $('#clive').hover(
        function () {
            //On Hover
            $('#manageform').attr('action','changeprop/cancel_set.php');
        },
        function () {
            //Off Hover
            //$('#manageform').attr('action','changeprop/active_set.php');
        }
    );

    $('#clive').click(
        function () {
            //On Hover
            $('#manageform').attr('action','changeprop/cancel_set.php');
        }
    );
    
    $('#delete').hover(function () {
            //On Hover
        $('#manageform').attr('action','changeprop/delete_set.php');
    },
    function () {
        //Off Hover
        //$('#manageform').attr('action','changeprop/active_set.php');
    });

    $('#delete').click(function () {
            //On Hover
            $('#manageform').attr('action','changeprop/delete_set.php');
        });



    $("#menu-toggle ").click(function(e) {
        e.preventDefault();
        $("#wrapper ").toggleClass("toggled ");
    });
});