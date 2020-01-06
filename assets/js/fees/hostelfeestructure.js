jQuery( document ).ready(function($) {

    var baseUrl = window.location.protocol + "//" + window.location.host + "/school/api";
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

    $(".HOSTEL").on('change',function(){
        console.log($(this).val());
        $.ajax({
            type: "GET",
            url: baseUrl +"/getallhostelStudents",
            dataType: "json",
            data: {
                "HOSTEL_ID" : $(this).val()
            },
            success: function(response) {
                console.log(response);
                var listItems;
                listItems += "<option  disabled selected> Select Student" +  "</option>";
                for (var i = 0; i < response.length; i++){
                    listItems += "<option  value='" + response[i].STUDENT_ID + "'>" + response[i].STUDENT_NAME + "</option>";
                }
                $(".STUDENT").html(listItems);
            }
        })
    });

    $('.ADD').on('click',function  () {
        $.ajax({
            type: "GET",
            url: baseUrl+"/getFeeCategories",
            dataType: "json",
            success: function(response) {
                console.log(response);
                var listItems;
                listItems += "<option disabled selected>Select Fee Category"+"</option>";
                for (var i = 0; i < response.length; i++){
                    listItems += "<option value='" + response[i].FEE_CATEGORY_ID + "'>" + response[i].CATEGORY_NAME + "</option>";
                }
                $(".FEECATEGORY").html(listItems);
            }
        });

        $(".FEECATEGORY").on('change',function(){
            $.ajax({
                type: "GET",
                url: baseUrl +"/getFeeSubCategories",
                dataType: "json",
                data: {
                    "FEE_CATEGORY_ID" : $(this).val()
                },
                success: function(response) {
                    console.log(response);
                    var listItems;
                    listItems += "<option  disabled selected> Select SubCategory" +  "</option>";
                    for (var i = 0; i < response.length; i++){
                        listItems += "<option  value='" + response[i].FEE_PARTICULAR_ID + "'>" + response[i].PARTICULAR_NAME + "</option>";
                    }
                    $(".SUBCATEGORY").html(listItems);
                }
            })
        });
    });
    $('#dataform').on('click',function  () {
        var duplicate = false;
        var rowData = {
            'feecategoryID' : $('#feecategory option:selected').val(),
            'feecategory' : $('#feecategory option:selected').text(),
            'feesubcategoryID' : $('#feesubcategory option:selected').val(),
            'feesubcategory' : $('#feesubcategory option:selected').text(),
            'amount' : $('#amount').val(),
            'feetype' : $('#feetype option:selected').text(),
            'feetypeValue' : $('#feetype option:selected').val()
        };
        if (dataTableArray.length > 0) {
            for (var i = 0; i < dataTableArray.length; i++) {
                if (dataTableArray[i]['feecategoryID'] === rowData['feecategoryID']
                    && dataTableArray[i]['feesubcategoryID'] === rowData['feesubcategoryID']) {
                    duplicate = true;
                } else {
                    duplicate = false;
                }
            }
            if (duplicate === false) {
                dataTableArray.push(rowData);
                datatable.row.add([$('#feecategory option:selected').text(), $('#feesubcategory option:selected').text(),$('#amount').val(),$('#feetype option:selected').text()]).draw();
            }
        } else {
            dataTableArray.push(rowData);
            datatable.row.add([$('#feecategory option:selected').text(), $('#feesubcategory option:selected').text(),$('#amount').val(),$('#feetype option:selected').text()]).draw();
        }
        console.log(JSON.stringify(dataTableArray));
        $('#tabledata').val(JSON.stringify(dataTableArray));
    });
});