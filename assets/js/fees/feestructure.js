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

   /* $(".BRANCH").on('change',function(){
        console.log($(this).val());
        $.ajax({
            type: "GET",
            url: baseUrl + "/classList",
            dataType: "json",
            data: {
                "BRANCH_ID" : $(this).val()
            },
            success: function(response) {
                console.log(response);
                var listItems;
                listItems += "<option disabled selected>Select Class"+"</option>";
                for (var i = 0; i < response.length; i++){
                    listItems += "<option value='" + response[i].CLASS + "'>" + response[i].CLASS_NAME + "</option>";
                }
                $("#classname").html(listItems);
            }
        })
    });*/


    $('.ADD').on('click',function  () {
        $(".FEEHEADER").on('change',function(){
            console.log('hello')
            console.log($(this).val());
            $.ajax({
                type: "GET",
                url: baseUrl +"/getfeeCategories",
                dataType: "json",
                data: {
                    "FEE_CATEGORY_TYPE" : $(this).val()
                },
                success: function(response) {
                    console.log(response);
                    var listItems;
                    listItems += "<option  disabled selected> Select Category" +  "</option>";
                    for (var i = 0; i < response.length; i++){
                        listItems += "<option  value='" + response[i].FEE_CATEGORY_ID + "'>" + response[i].CATEGORY_NAME + "</option>";
                    }
                    $(".FEECATEGORY").html(listItems);
                }
            })
        });
        /*$.ajax({
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
        });*/

        $(".FEECATEGORY").on('change',function(){
            $.ajax({
                type: "GET",
                url: baseUrl +"/getFeeSubCategories",
                dataType: "json",
                data: {
                    "FEE_CATEGORY_ID" : $(this).val()
                },
                success: function(response) {
                    $(".SUBCATEGORY").empty();
                    console.log(response);
                    var listItems;
                    for (var i = 0; i < response.length; i++){
                        listItems += "<option  value='" + response[i].FEE_PARTICULAR_ID + "'>" + response[i].PARTICULAR_NAME + "</option>";
                    }
                    $(".SUBCATEGORY").html(listItems);
                }
            })
        });
    });

    $(".BRANCH").on('change',function(){
        $.ajax({
            type: "GET",
            url: baseUrl +"/getClassesByBranch",
            dataType: "json",
            data: {
                "BRANCH_ID" : $(this).val()
            },
            success: function(response) {
                console.log(response);
                var listItems;
                listItems += "<option  disabled selected> Select Class" +  "</option>";
                for (var i = 0; i < response.length; i++){
                    listItems += "<option  value='" + response[i].CLASS + "'>" + response[i].CLASS + "</option>";
                }
                $(".CLASS").html(listItems);
            }
        })
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
            'feetypeValue' : $('#feetype option:selected').val(),
            'feeheader' : $('#feeheader option:selected').val()
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
                datatable.row.add([$('#feeheader option:selected').val(),$('#feecategory option:selected').text(), $('#feesubcategory option:selected').text(),$('#amount').val(),$('#feetype option:selected').text()]).draw();
            }
        } else {
            dataTableArray.push(rowData);
            datatable.row.add([$('#feeheader option:selected').val(),$('#feecategory option:selected').text(), $('#feesubcategory option:selected').text(),$('#amount').val(),$('#feetype option:selected').text()]).draw();
        }
        console.log(JSON.stringify(dataTableArray));
        $('#tabledata').val(JSON.stringify(dataTableArray));
    });
});