$(function () {
    var baseUrl = window.location.protocol + "//" + window.location.host + "/" + commonurl + "/api";
    $("#button").on("click", function () {
        /*datatable.show();*/
        $.ajax({
            type: "GET",
            url: baseUrl + "/showList",
            dataType: "json",
            async: true,
            contentType: 'application/json',
            data: {
                "BRANCH_ID": $("#branchID").val(),
                "CLASS": $("#class").val(),
                "ROLL_NO": $("#code").val()
            },
            success: function (response) {
                console.log(response);
                var datatable = $("#datatables").DataTable({
                    data: response.list,
                    destroy: true,
                    "columns": [
                        {"data": "ERP_CODE"},
                        {"data": "ROLL_NO"},
                        {"data": "STUDENT_NAME"},
                        {"data": "FATHER_NAME"},
                        {"data": "GENDER"},
                        {"data": "BAYFORM_NO"},
                        {"data": "STATUS"}
                    ]
                })
            }

        });
        $('.nav-tabs a[href="#list"]').tab('show');
    });
});


