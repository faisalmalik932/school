$(function() {
    var baseUrl = window.location.protocol + "//" + window.location.host + "/"+ commonurl+"/api";
    $('#challan').val(function (i, oldval) {
        return ++oldval;
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
                $(".STUDENTS").html(listItems);
            }
        })
    });

    $(".STUDENTS").on('change',function(){
        console.log($(this).val());
        $.ajax({
            type: "GET",
            url: baseUrl +"/getclassbystudents",
            dataType: "json",
            data: {
                "STUDENT_ID" : $(this).val()
            },
            success: function(response) {
                console.log(response);
                var listItems;
                var i =0;
                    listItems += "<option  selected value='" + response[i].CLASS + "'>" + response[i].CLASS + "</option>";
                $(".CLASS").html(listItems);
            }
        })
    });
});