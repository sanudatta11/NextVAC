/**
 * Created by root on 26/1/17.
 */
$(document).ready(function() {
    $('[data-toggle="tooltip "]').tooltip();
    $('#uploadform').submit(function(e) {
        if($('#upload-file-selector').val()) {
            e.preventDefault();
            $(this).ajaxSubmit({
                target:   '#targetdiv',
                beforeSubmit: function() {
                    $("#upprogressbar").width('0%');
                },
                uploadProgress: function (event, position, total, percentComplete){
                    $("#upprogressbar").width(percentComplete + '%');
                    $("#upprogressbar").html(percentComplete);
                },
                success:function (){
                    window.alert('File Uploaded');
                },
                resetForm: true
            });
            return false;
        }
    });
    $('#cancel').click(function () {
        window.alert('Cancelling Upload');
        window.location.href = 'index.php';
    });
    $("#menu-toggle ").click(function(e) {
        e.preventDefault();
        $("#wrapper ").toggleClass("toggled ");
    });

});