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
    /*$('.FEE').each(function () {
        $('.AMOUNT').attr('name',this.value);
    });*/
});