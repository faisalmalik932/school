$(function() {

    $('#transactioncode').val(function (i, oldval) {
        return ++oldval;
    });
    var baseUrl = window.location.protocol + "//" + window.location.host + "/"+ commonurl + "/api";
    var dataTableArray = [];
    var datatable = $('#datatables').DataTable( {
        aoColumnDefs: [ {  "aoTargets": [0,1,2,4]} ],
        bDestroy: true,
        selectRow: true,
        bFilter: false,
        bPaginate: false,
        bLengthChange: false,
        bInfo : false,
        aaSorting: false,
        bSort:false
    });
    bootstrap_alert = function() {}
    bootstrap_alert.warning = function(message) {
        $('#alert_placeholder').html('<div class="alert alert-danger" id="success-alert"><a class="close" data-dismiss="alert">×</a><span>'+message+'</span></div>')
        $(".alert-danger").fadeTo(4000, 500).slideUp(500, function(){
            $(".alert-danger").alert('close');
        });
    };

    $('#dataform').on('click',function  () {

        var credit = $.trim($('#creditamount').val());
        var debit = $.trim($('#debitamount').val());

        if($('#ledgeraccount option:selected').val() <= 0  && $('.BANKACCOUNT option:selected').val()<= 0) {
            bootstrap_alert.warning('Either GL Account or Bank Account is required');
        }
        else if (debit.length === 0 && credit.length === 0) {
            bootstrap_alert.warning('Either Debit Amount or Credit Amount is required');
        }
        else if(debit.length > 0 && credit.length > 0)
        {
            bootstrap_alert.warning('You must enter either a debit amount or a credit amount.');
        }
        else {
            var duplicate = false;
            var rowData;
            if($('#creditamount').val()>0) {
                 rowData = {
                     'transactioncode': $('#transactioncode').val(),
                     'ledgerAccountID': $('#bankaccount option:selected').val(),
                     'ledgerAccount': $('#bankaccount option:selected').text(),
                     'debitamount': $('#debitamount').val(),
                     'creditamount': $('#creditamount').val(),
                };
            }
            else{
                rowData = {
                    'transactioncode': $('#transactioncode').val(),
                    'ledgerAccountID': $('#ledgeraccount option:selected').val(),
                    'ledgerAccount': $('#ledgeraccount option:selected').text(),
                    'debitamount': $('#debitamount').val(),
                    'creditamount': $('#creditamount').val(),
                };
            }
                dataTableArray.push(rowData);
                if ($('.CREDITAMOUNT').val() > 0) {
                    datatable.row.add([$('#transactioncode').val(), $('#bankaccount option:selected').text(), $('#debitamount').val(), $('#creditamount').val()]).draw();
                }
                else {
                    datatable.row.add([$('#transactioncode').val(), $('.ACCOUNT option:selected').text(), $('#debitamount').val(), $('#creditamount').val()]).draw();
                }
            console.log(JSON.stringify(dataTableArray));
            $('#tabledata').val(JSON.stringify(dataTableArray));
            $('.DEBITAMOUNT').val('');
            $('.CREDITAMOUNT').val('');
            /*$('.ACCOUNT').removeAttr('selected');
            //$('.ACCOUNT').val(0);
            $(".ACCOUNT")[0].selectedIndex = 0;*/
            console.log($('.ACCOUNT option:selected').text());
               /* $('.ACCOUNT').empty();*/
        }

    });
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
    $(".BANK").on('change',function(){
        console.log($(this).val());
        $.ajax({
            type: "GET",
            url: baseUrl + "/getbankaccount",
            dataType: "json",
            data: {
                "BANK_NAME" : $(this).val()
            },
            success: function(response) {
                console.log(response);
                var listItems;
               listItems = "<option disabled selected>Select Bank Account Head</option>";
                for (var i = 0; i < response.length; i++){
                    listItems += "<option value='" + response[i].GL_CODE + "'>" + response[i].PARENT_ACCOUNT_NAME + "</option>";
                }
                $(".BANKACCOUNT").html(listItems);
            }
        })
    });
    $('.JVSAVE').on('click', function () {
        $.confirm({
            icon: 'icon-alert',
            title: 'Save Confirmation!',
            content: 'Would like to save/update your record!',
            animation: 'left',
            closeAnimation: 'scale',
            closeIcon: true,
            closeIconClass: 'icon-cross2',
            type: 'blue',
            typeAnimated: true,
            buttons: {
                confirm: {
                    btnClass: 'btn-blue',
                    action: function () {
                        console.log(dataTableArray);
                        var table = $('#datatables').DataTable();
                        console.log(table.version);

                        var totalRecords =$("#datatables").DataTable().page.info().recordsTotal;
                        var debitamount = table.column( 2 ).data().sum();
                        var creditamount = table.column( 3 ).data().sum();
                        if(totalRecords===0)
                        {
                            bootstrap_alert.warning('You must enter Transaction.');
                        }
                        else if(debitamount !== creditamount)
                        {
                            bootstrap_alert.warning('Sum of Debit Amount and Credit Amount must be Same.');
                        }
                        else{
                            $('#DATAFORM').submit();
                        }

                    }
                },
                cancel: function () { }
            }
        });
    });
    $.ajax({
        type: "GET",
        url: baseUrl + "/getbpvdetails",
        dataType: "json",
        async: true,
        contentType: 'application/json',
        success: function (response) {
            var options;
            console.log(response);
            var datatable = $("#bpvtable").DataTable({
                data: response.list,
                destroy: true,
                aoColumnDefs: [ {  "aoTargets": [0,1,2,4]} ],
                "columns": [
                    { "data": "TRANSACTION_DATE" },
                    { "data": "TRANSACTION_CODE" },
                    { "data": "LEDGER_ACCOUNT_NAME" },
                    { "data": "DEBIT_AMOUNT" },
                    { "data": "CREDIT_AMOUNT" }
                ]
            });
        }
    });
    $('#bill').val($('#printedbill').val());
});