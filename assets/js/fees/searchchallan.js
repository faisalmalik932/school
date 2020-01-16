$(function () {
    var baseUrl = window.location.protocol + "//" + window.location.host + "/" + commonurl + "/api";
    $("#button").on("click", function () {
        /*datatable.show();*/
        $.ajax({
            type: "GET",
            url: baseUrl + "/challanList",
            dataType: "json",
            async: true,
            contentType: 'application/json',
            data: {
                "BRANCH_ID": $("#b").val(),
                "CLASS": $("#class").val(),
                "MONTH": $("#month").val(),
                "YEAR": $("#year").val()
            },
            success: function (response) {
                console.log(response);
                var datatable = $("#datatables").DataTable({
                    data: response.list,
                    destroy: true,
                    "columns": [
                        {"data": "ORG_ID"},
                        {"data": "CHALLAN_NO"},
                        {"data": "PAYMENT_METHOD"},
                        {"data": "FEE_STATUS"}
                    ]
                })
            }

        });
        $('.nav-tabs a[href="#list"]').tab('show');
    });
});


