/**
 * Created by root on 4/2/17.
 */

$(document).ready(function() {
    $('[data-toggle="tooltip "]').tooltip();
    $("#menu-toggle ").click(function(e) {
        e.preventDefault();
        $("#wrapper ").toggleClass("toggled ");
    });
    $('#case_select').change(function() {

        var value_test = this.value;

        $('#testcase_file').empty();
        $('#testcase_field').empty();

        console.log('Empty');
        $('#numbertest').val(value_test);
        for (var i = 1; i <= value_test; i++) {
            if ($('#as_file').prop('checked') != true) {
                // console.log('In checked');
                $('#testcase_file').css('display', 'none');
                $('#testcase_field').css('display', 'block');
                $('#testcase_field').append('<textarea type="text" class="form-control" id="inputtext' + i + '" placeholder="Enter Test Input ' + i + '" name="inputtext[]" required></textarea>');
                $('#testcase_field').append('<textarea type="text" class="form-control" id="outputtext' + i + '" placeholder="Enter Test Output ' + i + '" name="outputtext[]" required></textarea>');
                $('#testcase_field').append('<br><br>');

            } else {
                $('#testcase_field').css('display', 'none');
                $('#testcase_file').css('display', 'block');
                $('#testcase_file').append('<input type="file" id="input' + i + '" name="inputfile[]" required>');
                $('#testcase_file').append('<input type="file" id="output' + i + '" name="outputfile[]" required>');
                $('#testcase_file').append('<br>');
            }
        }
    });

    $('#as_file').change(function() {

        var value_test = $('#case_select').val();

        $('#testcase_file').empty();
        $('#testcase_field').empty();

        //console.log('Empty '+value_test);
        $('#numbertest').val(value_test);
        for (var i = 1; i <= value_test; i++) {
            if ($('#as_file').prop('checked') != true) {
                console.log('In checked');
                $('#testcase_file').css('display', 'none');
                $('#testcase_field').css('display', 'block');
                $('#testcase_field').append('<textarea type="text" class="form-control" id="inputtext' + i + '" placeholder="Enter Test Input ' + i + '" name="inputtext[]" required></textarea>');
                $('#testcase_field').append('<textarea type="text" class="form-control" id="outputtext' + i + '" placeholder="Enter Test Output ' + i + '" name="outputtext[]" required></textarea>');
                $('#testcase_field').append('<br><br>');
            } else {
                $('#testcase_field').css('display', 'none');
                $('#testcase_file').css('display', 'block');
                $('#testcase_file').append('<input type="file" id="input' + i + '" name="inputfile[]" required>');
                $('#testcase_file').append('<input type="file" id="output' + i + '" name="outputfile[]" required>');
                $('#testcase_file').append('<br>');
            }
        }
    });
});
