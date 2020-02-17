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

var commonurl = "{{ env("APP_URL") }}"
$(function() {
   /* var form = $( "#DATAFORM" );
    form.validate();*/
    /*$('#DATAFORM').validator();*/
    var baseUrl = window.location.protocol + "//" + window.location.host +"/"+ commonurl + "/api/";

    $('form').find('.SEED').each(function() {
        var options;
        var elem = $(this);
        var code = elem.data('seed');
        $.ajax({
            url: baseUrl + 'seed/' + code,
            type: "GET",
            async: true,
            contentType: 'application/json',
            dataType: "json",
            success: function (response) {
                options = "<option selected='true' disabled='disabled' value='NON'>Select " + sentenceCase(code.toLowerCase().replace(/_/g,' ')) + "</option>";
                $.each(response, function(index) {
                    if (response[index].IS_SELECTED == '1') {
                        options = options + "<option id='" + response[index].CODE_VALUE + "' value='" + response[index].CODE_VALUE + "' selected='selected'>" + sentenceCase(response[index].CODE_LABEL) + "</option>";
                    } else {
                        options = options + "<option id='" + response[index].CODE_VALUE + "' value='" + response[index].CODE_VALUE + "'>" + sentenceCase(response[index].CODE_LABEL) + "</option>";
                    }
                    elem.html(options);
                });
            },
            error : function (xhr, reason, ex) {
                console.log(reason);
            }
        });
    });

    $('#DATAFORM').find('.DROPDOWN').each(function() {
        var code = $(this).data('dropdown');
        var elem = $(this);
        $.ajax({
            url: baseUrl + 'dropdown/' + code,
            type: "GET",
            async: true,
            contentType: 'application/json',
            dataType: "json",
            success: function (response) {
                options = "<option selected='true' disabled='disabled' value='NON'>Select " + sentenceCase(code.toLowerCase()) + "</option>";
                if (response.length > 0) {
                    $.each(response, function(index) {
                        options = options + "<option  id='" + response[index].VALUE + "' value='" + response[index].VALUE + "'>" + sentenceCase(response[index].LABEL) + "</option>";
                        elem.html(options);
                    });
                } else {
                    elem.html(options);
                }
            },
            error : function (xhr, reason, ex) {
                console.log(reason);
            }
        })
    });

    $('.DROPDOWN-CHILD').on('change', function() {
        var options;
        var code = $(this).data('dropdown-child');
        var childId = '#' + $(this).data('child-id');
        $.ajax({
            url: baseUrl + 'dropdown/' + code,
            type: "GET",
            async: true,
            contentType: 'application/json',
            dataType: "json",
            data: {
                "ID" : $(this).val()
            },
            success: function (response) {
                $(childId).html('');
                options = "<option selected='true' disabled='disabled' value='NON'>Select " + sentenceCase(code.toLowerCase()) + "</option>";
                if (response.length > 0) {
                    $.each(response, function(index) {
                        options = options + "<option  value='" + response[index].VALUE + "'>" + sentenceCase(response[index].LABEL) + "</option>";
                        $(childId).html(options);
                    });
                } else {
                    $(childId).html(options);
                }
            }
        });
    });
});
$(".BRANCHSESSION").on('change',function(){

    // $("#dashboardform").submit();
    var datastring = $("#dashboardform").serialize();
    // console.log(datastring);
    $.ajax({
            url: window.location.protocol + "//" + window.location.host +"/"+ commonurl +"/"+ 'topbarsession',
            type: "GET",
            async: true,
            contentType: 'application/json',
            dataType: "json",
            data:datastring,
            success: function (response) {
                if(response.message == "success"){
                    localStorage.setItem('branchValue' , response.branch)
                    console.log(localStorage.getItem("branchValue") , 'hello');
                    location.reload();
                }
            }
        });
    // $('#branchIDSession').val($_SESSION['BRANCH_ID']);

});
/*
* Convert to Sentence Case
* @st as String
* */
function sentenceCase (str) {
    if ((str===null) || (str===''))
        return false;
    else
        str = str.toString();

    return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
}

jQuery( document ).ready(function($) {
    var baseUrlApi = window.location.protocol + "//" + window.location.host + "/schoolplus/api/";
    /* Form Validation*/

        jQuery("#DATAFORM").validationEngine('attach',
            {
                promptPosition : "topLeft",
                scroll: false,
                autoHidePrompt:true,
                prettySelect : true,
                showArrow: true,
                showArrowOnRadioAndSelect: true,
                autoPositionUpdate: true,
                validateNonVisibleFields: true,
            });


        /*DOB Validation */
        var minDate = new Date('1/1/1940');
        var todaysDate = new Date();
        var maxDate = new Date(todaysDate.getFullYear(),
            todaysDate.getMonth(),
            todaysDate.getDate() - 1);
        var currentsYear = todaysDate.getFullYear();
        var range = '1900:' + currentsYear
        $('.BIRTH').datepicker({
            minDate: minDate,
            maxDate: maxDate,
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd-mm-yy",
            yearRange: range
        });

        /* CNIC Validation*/
        jQuery('.CNIC_NUMBER').keydown(function(){

            //allow  backspace, tab, ctrl+A, escape, carriage return
            if (event.keyCode === 8 || event.keyCode === 9
                || event.keyCode === 27 || event.keyCode === 13
                || (event.keyCode === 65 && event.ctrlKey === true) )
                return;
            if((event.keyCode < 48 || event.keyCode > 57))
                event.preventDefault();

            var length = $(this).val().length;

            if(length === 5 || length === 13)
                $(this).val($(this).val()+'-');


        });
    jQuery('.BRANCH_CODE').keydown(function(){

        //allow  backspace, tab, ctrl+A, escape, carriage return
        if (event.keyCode === 8 || event.keyCode === 9
            || event.keyCode === 27 || event.keyCode === 13
            || (event.keyCode === 65 && event.ctrlKey === true) )
            return;
        if((event.keyCode < 48 || event.keyCode > 57))
            event.preventDefault();

        var length = $(this).val().length;

        if(length === 2 || length === 5)
            $(this).val($(this).val()+'-');


    });
        $(".ALPHA").keypress(function(event){
            var inputValue = event.which;
            // allow letters and whitespaces only.
            if(!(inputValue >= 65 && inputValue <= 123) && (inputValue != 32 && inputValue != 8)) {
                event.preventDefault();
            }
            console.log(inputValue);
        });

    $(".NUMS").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
            // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

        /* Phone Number Validation*/
        var phones = [{ "mask": "####-#######"} ,{ "mask": "(###) ###-##############"}];
        $('.MOBILENUMBER').inputmask({
            mask: phones,
            greedy: false,
            placeholder: "",
            definitions: { '#': { validator: "[0-9]", cardinality: 1}} });

        /* LandLine Number Validation*/
        var phones = [{ "mask": "###-########"} ,{ "mask": "(###) ###-##############"}];
        $('.LANDLINENUMBER').inputmask({
            mask: phones,
            greedy: false,
            placeholder: "",
            definitions: { '#': { validator: "[0-9]", cardinality: 1}} });

        /* Cheque Number Validations*/

        var cheque = [{ "mask": "#########-######"} ,{ "mask": "(###) #########-######"}];
        $('.CHEQUE').inputmask({
            mask: cheque,
            greedy: false,
            placeholder: "",
            definitions: { '#': { validator: "[0-9]", cardinality: 1}} });


        /* Success Message*/
        window.setTimeout(function() {
            $(".alert").fadeTo(5000, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 2000);

    /* Sibling Textbox Validation*/
        $("#sibling").on("change", function() {
            var val = $(this).val();
            $(".name").hide().find('input:text').val(''); // hide and empty
            if (val) $("#" + val).show();
        });

        // For Reset Fields
        $(".RESET").on("click" , function(){
            // console.log(this);
            $(this).prop('type', 'reset');
            if($(this).hasClass("imageCheck")){
                $('.imageReset').attr('src', '')
            }if($(this).hasClass("tableReset")){
                location.reload()
            }
            
        });

        $("#change_password").on("click" , function(e){
            var baseUrl = window.location.protocol + "//" + window.location.host +"/"+ commonurl + "/platform/users";
            e.preventDefault();
           var current =  $('#currentpassword').val();
           var newPass =  $('#newpassword').val();
           
           console.log(baseUrl + '/change-pass')
           // var v =  $(this).closest('modal_form_vertical')
           //  console.log('v',v.modal())
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
                         $.ajax({
                        type: 'get',
                        dataType: "json",

                        
            contentType: 'application/json',
                        url: baseUrl + '/change-pass',
                        data: {
                            current: current,
                            newpassword: newPass
                        },
                        success: function(response) {
                            if(response.code == 200){
                                location.reload()
                            }
                            else{
                                $('#modal_form_vertical').modal('hide')
                            }
                        }
                    }); 
                        // console.log(dataTableArray);
                        // $('#modal_form_vertical').modal('hide')
                        // $('#DATAFORM').submit();
                    }
                },
                cancel: function () { }
            }
            });
        });
            
        

    });
