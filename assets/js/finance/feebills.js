$(function() {
    var baseUrl = window.location.protocol + "//" + window.location.host + "/"+ commonurl+"/api";
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