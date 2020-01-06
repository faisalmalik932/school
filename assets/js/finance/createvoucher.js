var baseUrl = "";
var listItems = '';
var count= Math.floor(Math.random() * 10000) + 1;
$(function() {
    
    bootstrap_alert = function() {}
    bootstrap_alert.warning = function(message) {
        $('#alert_placeholder').html('<div class="alert alert-danger" id="success-alert"><a class="close" data-dismiss="alert">×</a><span>'+message+'</span></div>')
        $(".alert-danger").fadeTo(4000, 500).slideUp(500, function(){
            $(".alert-danger").alert('close');
        });
    };  

    baseUrl = window.location.protocol + "//" + window.location.host + "/" + commonurl + "/api";
    $('#detailbody').html(addGLDetailRow());
    $('.selectSearch').select2();
    $('.remove').click(function() {
        $(this).parent().parent().remove();
    });

    $('.JVSAVE').on('click', function (e) {
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
                        

                        var debits = $('#detailbody').find('.debit');
                        var eachdebit= [];
                        var eachcredit= [];
                        var eachglaccount= [];
                        var total = 0;
                        
                        $('.detailbody1').each(function(){
                           
                             $('.debit').each(function(){
                            eachdebit.push($(this).val());
                              })
                             
                             $('.credit').each(function(){
                            eachcredit.push($(this).val());
                              })
                                
                                $('.glaccount').each(function(){
                            eachglaccount.push($(this).val());
                              })                              
                           
                            for(var i=1; i<=eachdebit.length; i++)
                            {
                                if(eachdebit[i] =="0.00" && eachcredit[i] =="0.00")
                                {
                                    bootstrap_alert.warning('Either debit amount or credit amount is Required');
                                    e.preventdefault();
                                }
                                else if(eachglaccount[i]===null)
                                {
                                    bootstrap_alert.warning('Glaccount is Required');
                                    e.preventdefault();
                                }
                                else
                                {
                                }
                            }
                        })
                        var debitamount = $('#debit-total').text();
                        var creditamount = $('#credit-total').text();
                        var totalRecords = parseInt(debitamount) + parseInt(creditamount);
                        if(totalRecords===0)
                        {
                            bootstrap_alert.warning('You must enter a Transaction.');
                        }
                        else if(totalRecords<0)
                        {
                            bootstrap_alert.warning('Sum of Debit Amount and Credit Amount must be Positive Number.');
                        }
                        else if(debitamount !== creditamount)
                        {
                            bootstrap_alert.warning('Sum of Debit Amount and Credit Amount must be Same.');
                        }
                        else
                        {
                            $('#DATAFORM').submit();
                        }
                    }
                },
                cancel: function () { }
            }
        });
    });
});

function addGLDetailRow() {
    var select = '';
    select = $(".selectDropdownVal").clone().html();
    var row = '';
    row += '<div class="row glrow" style="margin-top: 10px; padding: 5px">';
    row += '<div class="col-md-2"><input type="text" class="glcode form-control validate[required]" name="GL_CODE[]" style="width: 100%" readonly/></div>';
    row += '<div class="col-md-4"><select class="glaccount selectSearch" name="LEDGER_ACCOUNT[]" onchange="onChangeGlAccount(this)">'+select+'</select></div>';
    row += '<div class="col-md-1"><input type="number" min="0" name="DEBIT_AMOUNT[]" value="0.00" id="debitamount" class="debit form-control" style="width: 100%; text-align: right" onblur="calculateDebit(this)"/></div>';
    row += '<div class="col-md-1"><input type="number" min="0" value="0.00" name="CREDIT_AMOUNT[]" id="creditamount" class="credit form-control" style="width: 100%; text-align: right" onblur="calculateCredit(this)"/></div>';
    row += '<div class="col-md-3"><input type="text" class="memo form-control" name="DESCRIPTION[]" style="width: 100%"/></div>';
    row += '<div class="col-md-1" style="padding-top: 12px;"><button type="button" class="add onEnter"  onclick="addRow(this)"><i class="zmdi zmdi-plus-circle"></i></button><button type="button" class="remove" style="display: none" onclick="removeRow(this , event)"><i class="zmdi zmdi-minus-circle"></i></button></div>';
    row += '</div>';
    return row;
}

function addRow(elem) {

    $(elem).hide();
    $(elem).next().show();
    $('#detailbody').append(addGLDetailRow());
    $('.selectSearch').select2();
    calculateDebit();
    calculateCredit();
}

function removeRow(elem , e) {
    $(elem).parent().parent().remove();
    calculateDebit();
    calculateCredit();
}

function calculateDebit(elem) {
    var debits = $('#detailbody').find('.debit');
    var total = 0;
    $.each(debits , function (i, rowValue) {
        total = total + parseInt(rowValue.value);
    });
    $('#debit-total').html('');
    $('#debit-total').html(total.toFixed(2));
    $(elem).val(parseFloat($(elem).val()).toFixed(2));
}

function calculateCredit(elem) {
    var credit = $('#detailbody').find('.credit');
    var total = 0;
    $.each(credit , function (i, rowValue) {
        total = total + parseInt(rowValue.value);
    });
    $('#credit-total').html('');
    $('#credit-total').html(total.toFixed(2));
    $(elem).val(parseFloat($(elem).val()).toFixed(2));
}

function onChangeGlAccount(elem) {
    var glaccount = elem.options[elem.selectedIndex].text;
    var glcode = glaccount.substr(0, glaccount.indexOf(' :: '));
    $(elem).parent().parent().find('.glcode').val(glcode);
}

// function shortAddRow(elem) {
//     if (e.keyCode == 13) {
//     $(elem).hide();
//     $(elem).next().show();
//     $('#detailbody').append(addGLDetailRow());
//     $('.selectSearch').select2();
//     calculateDebit();
//     calculateCredit();
//     }
// }


$(document).keypress(function(e) {
   if(e.which == 13) {
       var btn = $(this).find('.onEnter')
       btn.hide()
       btn.next().show();
    $('#detailbody').append(addGLDetailRow());
    $('.selectSearch').select2();
    calculateDebit();
    calculateCredit();
   }
});