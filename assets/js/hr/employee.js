

jQuery( document ).ready(function($) {
    var baseUrl = window.location.protocol + "//" + window.location.host + "/"+ commonurl + '/api';
    $(".EMPLOYEETYPE").on('change',function(){
        console.log($(this).val());
        $.ajax({
            type: "GET",
            url: baseUrl + "/getDepartmentList",
            dataType: "json",
            data: {
                "EMPLOYEE_TYPE" : $(this).val()
            },
            success: function(response) {
                console.log(response);
                var listItems;
                listItems += "<option disabled selected>Select Department"+"</option>";
                for (var i = 0; i < response.length; i++){
                    listItems += "<option value='" + response[i].DEPARTMENT_ID + "'>" + response[i].DEPARTMENT_NAME + "</option>";
                }
                $("#department").html(listItems);
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
                console.log(response);
                var listItems;
                for (var i = 0; i < response.length; i++){
                    listItems += "<option value='" + response[i].TITLE_ID + "'>" + response[i].TITLE_NAME + "</option>";
                }
                $("#designation").html(listItems);
            }
        })
    });
    });

