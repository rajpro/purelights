
$('#dob').datepicker();

$( "#state" ).change(function() {
    var state = $("#state").val();
    $.post(base_site+"ajax/find_district",{state:state} , function( data ) {
        $(".district").html(data);
    });
});

$("#product_id").change(function() {
    var id = $("#product_id").val();
    $.post(base_site+"ajax/noofcheques",{product_id:id} , function( data ) {
        console.log(data);
        $(".cheque").html(data);
    });
});