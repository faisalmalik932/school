jQuery( document ).ready(function($) {

    var baseUrl = window.location.protocol + "//" + window.location.host + "/portal/api";
    var dataTableArray = [];

    var datatable = $('#datatables').DataTable( {
        aoColumnDefs: [ {  "aoTargets": [0,1,2]} ],
        bDestroy: true,
        selectRow: true,
        bFilter: false,
        bPaginate: false,
        bLengthChange: false,
        bInfo : false,
        aaSorting: false,
        bSort:false
    });



    $('.ADD').on('click',function  () {
            $.ajax({
                type: "GET",
                url: baseUrl +"/getsalaryCategories",
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    var listItems;
                    listItems += "<option  disabled> Select Category" +  "</option>";
                    for (var i = 0; i < response.length; i++){
                        listItems += "<option  value='" + response[i].SALARY_CATEGORY_ID + "'>" + response[i].CATEGORY_NAME + "</option>";
                    }
                    $(".SALARYCATEGORY").html(listItems);
                }
            });
    });
//     $('#datatables').on( 'click', 'tbody td', function () {
//     datatable.cell( this ).edit();
// } );
    $('#dataform').on('click',function  () {
        var duplicate = false;
        var rowData = {
            'salarycategoryID' : $('#salarycategory option:selected').val(),
            'salarycategory' : $('#salarycategory option:selected').text(),
            'amount' : $('#amount').val()
        };

        if (dataTableArray.length > 0) {
            for (var i = 0; i < dataTableArray.length; i++) {
                if (dataTableArray[i]['salarycategoryID'] === rowData['salarycategoryID']){
                    duplicate = true;

                } else {
                    duplicate = false;
                }
            }
            if (duplicate === false) {
                dataTableArray.push(rowData);
                datatable.row.add([$('#salarycategory option:selected').text(),$('#amount').val()]).draw();
            }
        } else {
            dataTableArray.push(rowData);
            datatable.row.add([$('#salarycategory option:selected').text(),$('#amount').val()]).draw();
        }
        console.log(JSON.stringify(dataTableArray));
        $('#tabledata').val(JSON.stringify(dataTableArray));
    });
    function myCallbackFunction(updatedCell, updatedRow, oldValue) {
    console.log("The new value for the cell is: " + updatedCell.data());
    console.log("The old value for that cell was: " + oldValue);
    console.log("The values for each cell in that row are: " + updatedRow.data());
}


$(".validateBtn").on('click' , function(){

    $( ".formValidate" ).validate({
  rules: {
    amount: {
      required: true,
      maxlength: 4
    }
  }
});
});
});