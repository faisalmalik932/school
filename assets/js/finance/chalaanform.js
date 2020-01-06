$(function() {
    var baseUrl = window.location.protocol + "//" + window.location.host + "/"+ commonurl+"/api";
$(".CLASS").on('change',function(){
    console.log($(this).val());
    $.ajax({
        type: "GET",
        url: baseUrl +"/getStudentList",
        dataType: "json",
        data: {
            "CLASS" : $(this).val(),
            "BRANCH_ID" :$(".BRANCH").val()
        },
        success: function(response) {
            console.log(response);
            var listItems;
            listItems += "<option  disabled selected> Select Student" +  "</option>";
            for (var i = 0; i < response.length; i++){
                listItems += "<option  value='" + response[i].STUDENT_ID + "'>" + response[i].FULL_NAME + "</option>";
            }
            $(".STUDENT").html(listItems);
        }
    })
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
                $(".STUDENT").html(listItems);
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
                listItems += "<option  disabled selected> Select Class" +  "</option>";
                for (var i = 0; i < response.length; i++){
                    listItems += "<option  value='" + response[i].CLASS + "'>" + response[i].CLASS + "</option>";
                }
                $(".CLASS").html(listItems);
            }
        })
    });
});