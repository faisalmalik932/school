


$(function() {
    var baseUrl = window.location.protocol + "//" + window.location.host + "/"+ commonurl+"/api";
    $.ajax({
        type: "GET",
        url: baseUrl + "/getHrmEmployees",
        dataType: "json",
        success: function(response) {
            listItems += "<option>Select Employees" + "</option>";
            console.log(response);
            var listItems;
            for (var i = 0; i < response.length; i++){
                listItems += "<option value='" + response[i].EMPLOYEE_ID + "'>" + response[i].FULL_NAME + "</option>";
            }
            $("#employeename").html(listItems);
        }
    });
        $.ajax({
            type: "GET",
            url: baseUrl + "/getHrmDepartments",
            dataType: "json",
            success: function(response) {
                listItems += "<option>Select Department" + "</option>";
                console.log(response);
                var listItems;
                for (var i = 0; i < response.length; i++){
                    listItems += "<option value='" + response[i].DEPARTMENT_ID + "'>" + response[i].DEPARTMENT_NAME + "</option>";
                }
                $("#department").html(listItems);
            }
        });

        $(".DEPARTMENTS").on('change',function(){
            console.log($(this).val());
            $.ajax({
                type: "GET",
                url: baseUrl + "/jobTitlesList",
                dataType: "json",
                data: {
                    "DEPARTMENT_ID" : $(this).val()
                },
                success: function(response) {
                    listItems += "<option>Select Designation" + "</option>";
                    console.log(response);
                    var listItems;
                    for (var i = 0; i < response.length; i++){
                        listItems += "<option value='" + response[i].TITLE_ID + "'>" + response[i].TITLE_NAME + "</option>";
                    }
                    $("#designation").html(listItems);
                }
            })
        });

       /* var datatable = $("#datatables");*/
        $("#button").on("click", function() {
            /*datatable.show();*/
            $.ajax({
                type: "GET",
                url: baseUrl + "/HrmEmployees",
                dataType: "json",
                async: true,
                contentType: 'application/json',
                data: {
                    "DEPARTMENT_ID": $("#department").val(),
                    "TITLE_ID": $("#designation").val(),
                    "EMPLOYEE_ID": $("#employeename").val(),
                    "BRANCH_ID":$("#branchID").val()
                },
                success: function (response) {
                    console.log('response' , response);
                    var datatable = $("#datatables").DataTable({
                        data: response.list,
                        destroy: true,
                        "columns": [
                            { "data": "BRANCH_NAME" },
                            { "data": "FULL_NAME" },
                            { "data": "DEPARTMENT_NAME" },
                            { "data": "TITLE_NAME" },
                            { "data": "MOBILE_NUMBER" },
                            { "data": "PERSONAL_EMAIL" },
                            { "data": "CURRENT_ADDRESS" }
                        ]
                    })
                }

            });
            $('.nav-tabs a[href="#list"]').tab('show');
        });


    });