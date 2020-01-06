$(function() {
    var baseUrl = window.location.protocol + "//" + window.location.host + "/"+ commonurl+"/api";
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