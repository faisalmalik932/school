

jQuery( document ).ready(function($) {
    var baseUrl = window.location.protocol + "//" + window.location.host + "/"+ commonurl + '/api';

    $(".BRANCH").on('change',function(){
        console.log($(this).val());
        $.ajax({
            type: "GET",
            url: baseUrl + "/getdepartmentsbybranch",
            dataType: "json",
            data: {
                "BRANCH_ID" : $(this).val()
            },
            success: function(response) {
                listItems += "<option disabled selected> Select Department"+"</option>";
                console.log(response);
                var listItems;
                for (var i = 0; i < response.length; i++){
                    listItems += "<option value='" + response[i].DEPARTMENT_ID + "'>" + response[i].DEPARTMENT_NAME + "</option>";
                }
                $(".DEPARTMENTS").html(listItems);
            }
        })
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
                listItems += "<option disabled selected> Select Designation"+"</option>";
                console.log(response);
                var listItems;
                for (var i = 0; i < response.length; i++){
                    listItems += "<option value='" + response[i].TITLE_ID + "'>" + response[i].TITLE_NAME + "</option>";
                }
                $("#designation").html(listItems);
            }
        })
    });

    $(".DESIGNATION").on('change',function(){
        console.log($(this).val());
        $.ajax({
            type: "GET",
            url: baseUrl + "/employeeList",
            dataType: "json",
            data: {
                "TITLE_ID" : $(this).val()
            },
            success: function(response) {
                listItems += "<option disabled selected> Select Employee"+"</option>"
                console.log(response);
                var listItems;
                for (var i = 0; i < response.length; i++){
                    listItems += "<option value='" + response[i].EMPLOYEE_ID + "'>" + response[i].FULL_NAME + "</option>";
                }
                $(".EMPLOYEE").html(listItems);
            }
        })
    });

    $.ajax({
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
            $(".EMPLOYEE").html(listItems);
        }
    });

   /* $.ajax({
        type: "GET",
        url: baseUrl + "/getLeaveTypes",
        dataType: "json",
        success: function(response) {
            listItems += "<option disabled selected> Select Leave Type"+"</option>"
            console.log(response);
            var listItems;
            for (var i = 0; i < response.length; i++){
                listItems += "<option value='" + response[i].LEAVE_TYPE_ID + "'>" + response[i].LEAVE_TYPE_NAME + "</option>";
            }
            $("#leavetype").html(listItems);
        }
    });*/
   
});

