$(function() {
    var baseUrl = window.location.protocol + "//" + window.location.host + "/"+ commonurl+"/api";
    $('#challan').val(function (i, oldval) {
        return ++oldval;
    });
    $(".CLASS").on('change',function(){
        console.log($(this).val());
        $.ajax({
            type: "GET",
            url: baseUrl +"/getStudentList",
            dataType: "json",
            data: {
                "CLASS" : $(this).val(),
                "BRANCH_ID" : $(".BRANCH").val()
            },
            success: function(response) {
                console.log(response);
                var listItems;
                listItems += "<option value='defualt' selected> Select Student" +  "</option>";
                for (var i = 0; i < response.length; i++){
                    listItems += "<option  value='" + response[i].STUDENT_ID + "'>" + response[i].FULL_NAME + "</option>";
                }
                $(".STUDENT").html(listItems);
            }
        })
    });

    $(".CLASSES").on('change',function(){
        console.log($(this).val());
        $.ajax({
            type: "GET",
            url: baseUrl +"/getHostelStudentList",
            dataType: "json",
            data: {
                "CLASS" : $(this).val(),
                "HOSTEL_ID" : $(".HOSTEL").val()
            },
            success: function(response) {
                console.log(response);
                var listItems;
                listItems += "<option  disabled selected> Select Student" +  "</option>";
                for (var i = 0; i < response.length; i++){
                    listItems += "<option  value='" + response[i].STUDENT_ID + "'>" + response[i].STUDENT_NAME + "</option>";
                }
                $(".STUDENTS").html(listItems);
            }
        })
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
                listItems += "<option  value='defualt' selected> Select Class" +  "</option>";
                for (var i = 0; i < response.length; i++){
                    listItems += "<option  value='" + response[i].CLASS + "'>" + response[i].CLASS + "</option>";
                }
                $(".CLASS").html(listItems);
            }
        })
    });
    
    $( ".ADD" ).each(function(index) {
    $(this).on('click',function(){
        $.ajax({
        type: "GET",
        url: baseUrl + "/getchallancompeltedetails",
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
                structure += "<div class='col-md-6'><div class='content-group-lg'><label>Fee Category</label><input readonly class='form-control' value='" + response[i].PARTICULAR_NAME + "'></div></div>" ;
                structure += "<div class='col-md-6'><div class='content-group-lg'><label>Amount</label><input readonly class='form-control'  value='" + response[i].AMOUNT + "'></div></div>" ;
            }
            console.log('structure' , structure);
            $(".STRUCTURE").html(structure);
        }
        });
    });
    });

    var datatable = $("#datatables").DataTable();
    $('#datatable tbody').on('click', 'td.details-control', function () {

            $(this).removeClass('selected');
        
        var tr = $(this).closest('tr');
        var row = table.row( tr );

        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    });
});
