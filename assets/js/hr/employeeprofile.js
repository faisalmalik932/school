$(function() {
    var baseUrl = window.location.protocol + "//" + window.location.host + "/"+ commonurl+"/api";
    $(".BRANCH").on('change',function(){
        console.log($(this).val());
        $.ajax({
            type: "GET",
            url: baseUrl + "/getHrmDepartments",
            dataType: "json",
            data: {
                "BRANCH_ID" : $(this).val()
            },
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
    $.ajax({
        type: "GET",
        url: baseUrl + "/getHrmEmployees",
        dataType: "json",
        success: function(response) {
            listItems += "<option disabled selected>Select Employees" + "</option>";
            console.log(response);
            var listItems;
            for (var i = 0; i < response.length; i++){
                listItems += "<option value='" + response[i].EMPLOYEE_ID + "'>" + response[i].FULL_NAME + "</option>";
            }
            $("#employee").html(listItems);
        }
    });

});