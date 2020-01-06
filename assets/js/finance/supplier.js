$(function() {
    var baseUrl = window.location.protocol + "//" + window.location.host + "/"+ commonurl + "/api";
    $.ajax({
        type: "GET",
        url: baseUrl + "/glaccounts",
        dataType: "json",
        success: function (response) {
            // console.log(response);
            var listItems;
            var ParentCode;
            listItems = "<option value='0'>Select Account Head</option>";
            for (var i = 0; i < response.length; i++) {
                if (response[i].HEAD_PARENT_ID === 0) {
                    listItems += "<option value='" + response[i].ACCOUNT_HEAD_ID + "'> ("+response[i].ACCOUNT_HEAD_CODE + ')&nbsp;&nbsp;' + response[i].ACCOUNT_HEADS + "</option>";
                    for (var g = 0; g < response.length; g++) {
                        if (response[i].ACCOUNT_HEAD_ID === response[g].HEAD_PARENT_ID) {
                            listItems += "<option value='" + response[g].ACCOUNT_HEAD_ID + "'>--("+response[g].ACCOUNT_HEAD_CODE + ')&nbsp;&nbsp;' + response[g].ACCOUNT_HEADS + "</option>";
                            for (var h = 0; h < response.length; h++) {
                                if (response[g].ACCOUNT_HEAD_ID === response[h].HEAD_PARENT_ID) {
                                    listItems += "<option value='" + response[h].ACCOUNT_HEAD_ID + "'>---(" + response[h].ACCOUNT_HEAD_CODE + ')&nbsp;&nbsp;' + response[h].ACCOUNT_HEADS + "</option>";
                                    for (var j = 0; j < response.length; j++) {
                                        if (response[h].ACCOUNT_HEAD_ID === response[j].HEAD_PARENT_ID) {
                                            listItems += "<option value='" + response[j].ACCOUNT_HEAD_ID + "'>----(" + response[j].ACCOUNT_HEAD_CODE + ')&nbsp;&nbsp;' + response[j].ACCOUNT_HEADS + "</option>";
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                $(".ACCOUNT").html(listItems);
            }
        }
    });
});















