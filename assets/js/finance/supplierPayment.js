

$(function() {
    var baseUrl = window.location.protocol + "//" + window.location.host + "/"+ commonurl + '/api';
    $('.BANK').hide();

    $(".GETACCOUNTDETAILS").on('change', function () {
        var  val = $(this).val();
        if(val === "Bank"){
            $('.BANK').show();
        }else{
            $('.BANK').hide();
        }
    });

    $(".SUPPLIER").on('change',function(){
        $.ajax({
            type: "GET",
            url: baseUrl +"/getbankdetails",
            dataType: "json",
            data: {
                "SUPPLIER_ID" : $(this).val()
            },
            success: function(response) {
                console.log(response);
                var listItems;
                listItems += "<option  disabled selected> Select Bank" +  "</option>";
                for (var i = 0; i < response.length; i++){
                    listItems += "<option  value='" + response[i].BANK_NAME + "'>" + response[i].BANK_NAME + "</option>";
                }
                $(".BANKNAME").html(listItems);
            }
        })
    });

    $(".SUPPLIER").on('change',function(){
        $.ajax({
            type: "GET",
            url: baseUrl +"/getbankdetails",
            dataType: "json",
            data: {
                "SUPPLIER_ID" : $(this).val()
            },
            success: function(response) {
                console.log(response);
                var listItems;
                listItems += "<option  disabled selected> Account Number" +  "</option>";
                for (var i = 0; i < response.length; i++){
                    listItems += "<option  value='" + response[i].BANK_ACCOUNT_NUMBER + "'>" + response[i].BANK_ACCOUNT_NUMBER + "</option>";
                }
                $(".ACCOUNTNUMBER").html(listItems);
            }
        })
    });

});