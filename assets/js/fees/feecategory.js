$(function() {
    var baseUrl = window.location.protocol + "//" + window.location.host + "/"+ commonurl+"/api";
    $('#challan').val(function (i, oldval) {
        return ++oldval;
    });
    $.ajax({
        type: "GET",
        url: baseUrl +"/getFeeCHALLANCategories",
        dataType: "json",
        success: function(response) {
            console.log(response);
            var listItems;
            listItems += "<option  disabled selected> Select Category" +  "</option>";
            for (var i = 0; i < response.length; i++){
                listItems += "<option  value='" + response[i].FEE_CATEGORY_ID + "'>" + response[i].CATEGORY_NAME + "</option>";
            }
            $(".FEECATEGORY").html(listItems);
        }
    });
    $(".FEEHEADER").on('change',function(){
        console.log($(this).val());
        $.ajax({
            type: "GET",
            url: baseUrl +"/getfeeCategories",
            dataType: "json",
            data: {
                "FEE_CATEGORY_TYPE" : $(this).val()
            },
            success: function(response) {
                console.log(response);
                var listItems;
                listItems += "<option  disabled selected> Select Category" +  "</option>";
                for (var i = 0; i < response.length; i++){
                    listItems += "<option  value='" + response[i].FEE_CATEGORY_ID + "'>" + response[i].CATEGORY_NAME + "</option>";
                }
                $(".FEECATEGORY").html(listItems);
            }
        })
    });
});