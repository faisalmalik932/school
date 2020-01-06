

$(document).ready(function() {
    $('#ponumber').val(function (i, oldval) {
        return ++oldval;

    });
    var baseUrl = window.location.protocol + "//" + window.location.host +"/"+ commonurl+ "/api";
    var dataTableArray = [];
    var datatable = $('#datatables').DataTable( {
        aoColumnDefs: [ {  "aoTargets": [0,1,2,4,5]} ],
        bDestroy: true,
        selectRow: true,
        bFilter: false,
        bPaginate: false,
        bLengthChange: false,
        bInfo : false,
        aaSorting: false,
        bSort:false
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('#_token').val()
        }
    });

    $('.ADD').on('click', function  () {
    });

    $("#price").blur(function() {
        var price =  $("#price").val();
        var quantity = $("#quantity").val();
        var totalprice =price*quantity;
        $("#totalprice").val(totalprice);
    });
    $('#dataform').on('click',function  () {
        var rowData = {
            'item': $('#item').val(),
            'quantity': $('#quantity').val(),
            'deliverydate': $('#deliverydate').val(),
            'price': $('#price').val(),
            'total': $('#totalprice').val()
        };
        dataTableArray.push(rowData);
        datatable.row.add([$('#item').val(),$('#quantity').val(), $('#deliverydate').val(),$('#price').val(),$('#totalprice').val()]).draw();
        console.log(JSON.stringify(dataTableArray));
        $('#tabledata').val(JSON.stringify(dataTableArray));
        $('.ITEM').val('');
    });

});
