


$(function() {
    var baseUrl = window.location.protocol + "//" + window.location.host + "/"+ commonurl+"/api";
    var table = $('#datatables').dataTable();
    var rows_selected = [];
    $.ajax({
        type: "GET",
        url: baseUrl + "/hostelStudents",
        dataType: "json",
        async: true,
        contentType: 'application/json',
        success: function (response) {
            console.log(response);
            var datatable = $("#datatables").DataTable({
                "bProcessing": true,
                bDestroy: true,
                selectRow: true,
                data: response.list,
                columnDefs:[
                    {
                        targets:0,
                        'searchable': false,
                        'orderable': false,
                        'width': '1%',
                        'className': 'dt-body-center',
                        'render': function (data, type, full, meta){
                            return '<input type="checkbox">';},
                        checkboxes:{
                            selectRow:true
                        }
                    },
                    {
                        "targets": [ 1 ],
                        "visible": false
                    }
                ],
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                select:{
                    style:'multi'
                },
                order:[[1,'asc']],
                columns: [
                    { "data": "HOSTEL_FEE_CHALLAN_ID" },
                    { "data": "STUDENT_ID" },
                    { "data": "CHALLAN_NO" },
                    { "data": "FEE_STATUS" },
                    {"mRender": function ( data, type, row ) {
                        return '<a class="table-edit btn btn-primary HOSTELDETAIL" data-id="' + row.HOSTEL_FEE_CHALLAN_ID + '">DETAIL</a>'
                    }
                }
                ],
                'rowCallback': function(row, data, dataIndex){
                    // Get row ID
                    var rowId = data[0];
                    // If row ID is in the list of selected row IDs
                    if($.inArray(rowId, rows_selected) !== -1){
                        $(row).find('input[type="checkbox"]').prop('checked', true);
                        $(row).addClass('selected');
                    }
                }
            });
        }

    });
    $('.nav-tabs a[href="#list"]').tab('show');

    $('#datatables').on('click', 'tbody td, thead th:first-child', function(e){
        if(this.checked){
            $('#datatables tbody input[type="checkbox"]:not(:checked)').trigger('click');
        } else {
            $('#datatables tbody input[type="checkbox"]:checked').trigger('click');
        }

        // Prevent click event from propagating to parent
        e.stopPropagation();
    });

    $('#datatables').on('click', '.HOSTELDETAIL', function(){
    console.log('hello' , this.value);
    $('#modal_form_vertical').modal('show');

    $.ajax({
        type: "GET",
        url: baseUrl + "/gethostaldet",
        contentType: 'application/json',
            data: {
                "CHALLAN_ID" : $(this).data("id")
            },
        success: function (response) {
            console.log('test4' , response);
            var structure = [];
            for (var i = 0; i < response.length; i++){
                structure += "<div class='col-md-6'><div class='content-group-lg'><label>Fee Category</label><input readonly class='form-control' value='" + response[i].FEE_CATEGORY_TYPE + "'></div></div>" ;
                structure += "<div class='col-md-6'><div class='content-group-lg'><label>Amount</label><input readonly class='form-control'  value='" + response[i].AMOUNT + "'></div></div>" ;
            }
            console.log('structure' , structure);
            $(".STRUCTURE").html(structure);
        }
        });
    

});



    $('#datatables tbody').on('click', 'input[type="checkbox"]', function(e){

        // Get row data
        var $row = $(this).closest('tr');
        var data = table.fnGetData($row[0]);
        var rowId = data.STUDENT_ID;

        // Determine whether row ID is in the list of selected row IDs
        var index = $.inArray(rowId, rows_selected);

        // If checkbox is checked and row ID is not in list of selected row IDs
        if(this.checked && index === -1){
            rows_selected.push(rowId);

            // Otherwise, if checkbox is not checked and row ID is in list of selected row IDs
        } else if (!this.checked && index !== -1){
            rows_selected.splice(index, 1);
        }

        if(this.checked){
            $row.addClass('selected');
        } else {
            $row.removeClass('selected');
        }

        // Update state of "Select all" control
        //updateDataTableSelectAllCtrl(table);

        // Prevent click event from propagating to parent
        e.stopPropagation();
        $('#primaryid').val(rows_selected);
    });

    // Handle click on table cells with checkboxes
    $('#datatables').on('click', 'tbody td, thead th:first-child', function(e){
        $(this).parent().find('input[type="checkbox"]').trigger('click');
    });

    // Handle click on "Select all" control
    $('#datatables').on('click', 'thead input[name="select_all"]',function (e) {

        if(this.checked){
            $('#datatables tbody input[type="checkbox"]:not(:checked)').trigger('click');
        } else {
            $('#datatables tbody input[type="checkbox"]:checked').trigger('click');
        }
        $.each(rows_selected, function(index, rowId){
            // Create a hidden element
            $('#primaryid').val(rows_selected);
            console.log(rowId);
        });

        // Prevent click event from propagating to parent
        e.stopPropagation();
    });

    // Handle table draw event
    table.on('draw', function(){
        // Update state of "Select all" control
        // updateDataTableSelectAllCtrl(table);
    });


    $( ".HOSTELDETAIL" ).each(function(index) {
    $(this).on('click',function(){
        $.ajax({
        type: "GET",
        url: baseUrl + "/gethostelchallandetails",
        dataType: "json",
        async: true,
        contentType: 'application/json',
            data: {
                "CHALLAN_ID" : this.value
            },
        success: function (response) {
            console.log(response);
            var structure;
            for (var i = 0; i < response.length; i++){
                structure += "<div class='col-md-6'><div class='content-group-lg'><label>Fee Category</label><input readonly class='form-control' value='" + response[i].FEE_CATEGORY_TYPE + "'></div></div>" ;
                structure += "<div class='col-md-6'><div class='content-group-lg'><label>Amount</label><input readonly class='form-control'  value='" + response[i].AMOUNT + "'></div></div>" ;
            }
            console.log('structure' , structure);
            $(".STRUCTURE").html(structure);
        }
        });
    });
    });



});


