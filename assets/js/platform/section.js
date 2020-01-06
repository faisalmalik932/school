jQuery( document ).ready(function($) {
    var baseUrl = window.location.protocol + "//" + window.location.host + "/"+ commonurl+ "/api";
   /* $(".BRANCH").on('change',function(){
        console.log($(this).val());
        $.ajax({
            type: "GET",
            url: baseUrl + "/classList",
            dataType: "json",
            data: {
                "BRANCH_ID" : $(this).val()
            },
            success: function(response) {
                if (response.length > 0) {
                    console.log(response);
                    var listItems;
                    listItems += "<option disabled selected>Select Class" + "</option>"
                    for (var i = 0; i < response.length; i++) {
                        listItems += "<option value='" + response[i].CLASS_ID + "'>" + response[i].CLASS_NAME + "</option>";
                    }
                }
                else{
                    listItems += "<option disabled selected>Select Class" + "</option>"
                }
                $("#classname").html(listItems);
            }
        })
    })*/
});