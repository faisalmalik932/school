/*
 * ************************************************************************
 *  *
 *  * PROSIGNS CONFIDENTIAL
 *  * __________________
 *  *
 *  *  Copyright (c) 2017. Prosigns Technologies
 *  *  All Rights Reserved.
 *  *
 *  * NOTICE:  All information contained herein is, and remains
 *  * the property of Prosigns Technologies and its suppliers,
 *  * if any.  The intellectual and technical concepts contained
 *  * herein are proprietary to Prosigns Technologies
 *  * and its suppliers and may be covered by Pakistan and Foreign Patents,
 *  * patents in process, and are protected by trade secret or copyright law.
 *  * Dissemination of this information or reproduction of this material
 *  * is strictly forbidden unless prior written permission is obtained
 *  * from Prosigns Technologies.
 *
 */

/**
 * Product Name: IntelliJ IDEA.
 * Developer Name: by nayab on 08-Aug-17 / 1:33 AM
 * All information contained herein is, and remains
 * the property of Prosigns Technologies
 */

var dataTableArray = [];
$(function () {
    var datatable = $("#datatable");
    var deleteBtn = $('.DELETE');
    var baseUrl = window.location.protocol + "//" + window.location.host + "/" + commonurl + "/api/";
    var requestUrl = baseUrl + 'datatable/header/' + datatable.data('code');

    deleteBtn.prop('disabled', true);

    // Setting datatable defaults
    $.extend($.fn.dataTable.defaults, {
        autoWidth: false,
        columnDefs: [{
            orderable: true
        }],
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        language: {
            search: '<span>Search:</span> _INPUT_',
            searchPlaceholder: 'Type to search...',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: {'first': 'First', 'last': 'Last', 'next': 'Next &rarr;', 'previous': '&larr; Previous'}
        }
    });

    var tableRequest = $.ajax({
        url: requestUrl,
        type: "GET",
        async: true,
        contentType: 'application/json',
        dataType: "json",
        beforeSend: function () {
        },
        success: function (response) {
            datatable.dataTable({
                dom: 'Bfrtip',
                buttons: [
                    'pdf'
                ],
                data: response.data,
                rowId: response.rowid,
                columns: response.columns,
                columnDefs: [
                    {"targets": 0, "visible": false}
                ],

            });
        },
        complete: function () {

        }
    });

    datatable.on('click', 'tbody tr', function () {
        console.log(datatable.data('code'))

        if ($(this).hasClass('selected') || datatable.data('code') === "employeepayslipdetail" || datatable.data('code') === "feestructure" || datatable.data('code') === "employeepayslip") {
            $(this).removeClass('selected');
        }
        else if (datatable.data('code') === "feechallan") {
            $(this).removeClass('selected');
            var structure = [];
            $.ajax({
                type: "GET",
                url: baseUrl + "getchallancompeltedetails",
                dataType: "json",
                async: true,
                contentType: 'application/json',
                data: {
                    "CHALLAN_ID": $(this).find('.feeChallanDetail').val()
                },
                success: function (response) {
                    console.log(response);
                    console.log('result', structure);
                    for (var i = 0; i < response.length; i++) {
                        structure += "<div class='col-md-6'><div class='content-group-lg'><label>Fee Category</label><input readonly class='form-control' value='" + response[i].PARTICULAR_NAME + "'></div></div>";
                        structure += "<div class='col-md-6'><div class='content-group-lg'><label>Amount</label><input readonly class='form-control'  value='" + response[i].AMOUNT + "'></div></div>";
                    }
                    console.log('structure', structure);
                    $('#modal_form_vertical').modal('show');
                    $(".STRUCTURE").html(structure);
                }
            });


        }
        else {
            datatable.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
            var row = datatable.fnGetData(datatable.fnGetPosition(this));

            $('#primaryid').val(row[0]);
            $('.DELETE').prop('disabled', false);
            $.ajax({
                url: baseUrl + 'fetch/' + datatable.data('code') + '/' + row[0],
                type: "GET",
                async: true,
                contentType: 'application/json',
                dataType: "json",
                beforeSend: function (datatable) {
                },
                success: function (response) {
                    if (response.length > 0) {
                        $.each(response, function (i, object) {
                            $.each(object, function (key, value) {
                                console.log('key', key)
                                // if (key === "termination_type") {
                                //     $('.removeTermination').removeClass('hide');
                                // }
                                // else if (key === "registerDate") {
                                //     console.log(value)
                                //     value = moment(value).format('MM/DD/YYYY');
                                //     console.log('val', value)
                                // }
                                $("#" + key).val(value);
                            });
                        });
                    }
                    $('.nav-tabs a[href="#form"]').tab('show');
                }
            }).done(function () {
                $('#DATAFORM').validationEngine('hide');

                if (baseUrl + 'fetch/' + datatable.data('code') === baseUrl + "fetch/employees") {
                    document.getElementById("pic").src = "/schoolplus/uploads/employees" + '/' + $('#empPic').val();
                    $("#pic").css('height', '100');
                }
                else if (baseUrl + 'fetch/' + datatable.data('code') === baseUrl + "fetch/students") {
                    document.getElementById("img").src = "/schoolplus/uploads/students" + '/' + $('#Pic').val();
                    $("#img").css('height', '100');
                }
                else {
                    console.log(true);
                }
            });


        }
    });

    deleteBtn.on('click', function () {
        if ($('#primaryid').val() !== '') {
            $.confirm({
                icon: 'icon-alert',
                title: 'Delete Confirmation!',
                content: 'Would like to delete the record!',
                animation: 'left',
                closeAnimation: 'scale',
                closeIcon: true,
                closeIconClass: 'icon-cross2',
                type: 'red',
                typeAnimated: true,
                buttons: {
                    confirm: {
                        btnClass: 'btn-red',
                        action: function () {
                            deleteBtn.prop('disabled', true);
                            /* $('#DATAFORM').submit();*/
                            $.ajax({
                                url: baseUrl + 'delete/' + datatable.data('code') + '/' + $('#primaryid').val(),
                                type: "POST",
                                async: true,
                                contentType: 'application/json',
                                dataType: "json",
                                success: function (response) {
                                    console.log(response)
                                    $("#delete").html("It worked");
                                    $.alert("Record Deleted Successfully ", function () {
                                        location.reload();
                                    });
                                }
                            });
                        }
                    },
                    cancel: function () {
                    }
                }
            });
        }
    });
});
