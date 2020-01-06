

jQuery( document ).ready(function($) {
    var baseUrl = window.location.protocol + "//" + window.location.host + "/"+ commonurl + '/api';
    $('.DATETIME').datetimepicker({
        format: 'YYYY-MM-DD HH:mm',
    });

   /* $.ajax({
        type: "GET",
        url: baseUrl + "/getHrmEmployees",
        dataType: "json",
        success: function(response) {
            listItems += "<option disabled selected> Select Employee"+"</option>"
            console.log(response);
            var listItems;
            for (var i = 0; i < response.length; i++){
                listItems += "<option value='" + response[i].EMPLOYEE_ID + "'>" + response[i].FULL_NAME + "</option>";
            }
            $("#employee").html(listItems);
        }
    });*/


    /*$("#button").on("click", function() {
        /!*datatable.show();*!/
        var selectArr = [];

        $('#leavetype option').each(function() {
            selectArr.push($(this).val());
        });
        var date1 = $("#leaveperiodend").val();
        var date2 = $("#leaveperiodstart").val();
        //Get 1 day in milliseconds
        var diff =  Math.floor(( Date.parse(date1) - Date.parse(date2) ) / 86400000);
        console.log(diff);
       /!* $.ajax({
            type: "GET",
            url: baseUrl + "/EmployeeEntitlements",
            dataType: "json",
            async: true,
            contentType: 'application/json',
            data: {
                "EMPLOYEE_ID": $("#employee").val(),
                "LEAVE_TYPE":$("#leavetype").val(),
                "LEAVE_PERIOD_START": $("#leaveperiodstart").val(),
                "LEAVE_PERIOD_END": $("#leaveperiodend").val()
            },
            success: function (response) {
                console.log(response.list);
                var myobj = JSON.stringify(date1);
                var backToDate = new Date(myobj);
                console.log(myobj);
                var datatable = $("#datatables").DataTable({
                    data: response.list,
                    destroy: true,
                    columns: [
                        { data: "EMPLOYEE_NAME" },
                        { data: "LEAVE_TYPE" },
                        { data: "LeavePeriodStart" },
                        { data: "LeavePeriodEnd" },
                        { data: "ENTITLEMENT" },
                        { data: "Remaining_Leaves" }
                    ]
                })
            }

        });
        $('.nav-tabs a[href="#list"]').tab('show');*!/
    });*/
});

