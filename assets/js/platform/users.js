jQuery( document ).ready(function($) {
    var baseUrl = window.location.protocol + "//" + window.location.host +"/"+ commonurl+"/api";
    $.ajax({
        type: "GET",
        url: baseUrl + "/getEmployees",
        dataType: "json",
        success: function(response) {
            console.log(response);
            var listItems;
            listItems += "<option disabled>Select Employee</option>";
            for (var i = 0; i < response.length; i++){
                listItems += "<option value='" + response[i].EMPLOYEE_ID + "'>" + response[i].FULL_NAME + "</option>";
            }
            $("#employeename").html(listItems);
        }
    });
    $(".BRANCH").on('change',function(){
        console.log($(this).val() , 'hello');
        $.ajax({
            type: "GET",
            url: baseUrl + "/employeesList",
            dataType: "json",
            data: {
                "BRANCH_ID" : $(this).val()
            },
            success: function(response) {
                console.log(response);
                listItems += "<option disabled>Select Employee</option>";
                var listItems;
                for (var i = 0; i < response.length; i++){
                    listItems += "<option value='" + response[i].EMPLOYEE_ID + "'>" + response[i].FULL_NAME + "</option>";
                }
                $("#employeename").html(listItems);
            }
        })
    });
     $('.datepicker').datepicker();

});