$(document).ready(function() {
    $('#myTable').DataTable();

    $('#checkAll').on('change', function() {
        if($(this).is(':checked')) {
            $('.check-item').prop('checked', true);
        }else{
            $('.check-item').prop('checked', false);}
    });
});