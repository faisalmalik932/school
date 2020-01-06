


jQuery( document ).ready(function($) {
    var baseUrl = window.location.protocol + "//" + window.location.host + "/"+ commonurl+"/api";
    jQuery(".CNIC_NUMBER").blur(function () {
        console.log($(this).val());
        $.ajax({
            type: "GET",
            url: baseUrl + "/showSiblings",
            dataType: "json",
            data: {
                "CNIC" : $(this).val()
            },
            success: function(response) {
                console.log(response);
                var htmldata;
                for (var i = 0; i < response.length; i++){
                    htmldata += "<option   value='" + response[i].STUDENT_NAME + "'>" + response[i].STUDENT_NAME + "</option>";
                }
                if(response.length>0) {
                    $('#myModal').find('#siblings').html(htmldata);
                    $('#myModal').modal('show');
                    $('#siblings').multiselect();
                }
                else{
                    $('#myModal').modal('hide');
                }
            }
        });
    });
    $('.save').on('click', function(e) {
        var selectedValues = [];
        $("#siblings :checked").each(function(){
            selectedValues.push($(this).val());
        });
        console.log(selectedValues);
        if(selectedValues.length>0) {
            e.preventDefault();
            $('#myModal').modal('hide');
        }
        else{
            alert('select siblings');
        }
    });
    $(".CLASS").on('change',function(){
        console.log($(this).val());
        $.ajax({
            type: "GET",
            url: baseUrl + "/getSections",
            dataType: "json",
            data: {
                "CLASS" : $(this).val(),
                "BRANCH_ID" : $(".BRANCH").val()
            },
            success: function(response) {
                if (response.length > 0) {
                    listItems += "<option disabled selected>Select Section" + "</option>"
                    console.log(response);
                    var listItems;
                    for (var i = 0; i < response.length; i++) {
                        listItems += "<option value='" + response[i].SECTION_ID + "'>" + response[i].SECTION_NAME + "</option>";
                    }
                }
                else {
                    listItems += "<option disabled selected>Select Section" + "</option>"
                }
                $("#section").html(listItems);
            }
        });
    });

    $(".BRANCH").on('change',function(){
        console.log($(this).val());
        $.ajax({
            type: "GET",
            url: baseUrl + "/hostelList",
            dataType: "json",
            data: {
                "BRANCH_ID" : $(this).val()
            },
            success: function(response) {
                listItems += "<option disabled selected>Select Hostel" + "</option>"
                console.log(response);
                var listItems;
                for (var i = 0; i < response.length; i++){
                    listItems += "<option value='" + response[i].HOSTEL_ID + "'>" + response[i].HOSTEL_NAME + "</option>";
                }
                $("#hostel").html(listItems);
            }
        })
    });
    bootstrap_alert = function() {}
    bootstrap_alert.warning = function(message) {
        $('#alert_placeholder').html('<div class="alert alert-danger" id="success-alert"><a class="close" data-dismiss="alert">×</a><span>'+message+'</span></div>')
        $(".alert-danger").fadeTo(4000, 500).slideUp(500, function(){
            $(".alert-danger").alert('close');
        });
    };


    $('.SAVESTUDENT').on('click', function () {
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
                        //console.log(dataTableArray);
                        var state = $('#states').val();
                        var city = $('#city option:selected').val();
                        var branch = $('#branch option:selected').val();
                        if (  $('#states option:selected').val()=== "") {
                            bootstrap_alert.warning('State is Required');
                        }
                        else {
                            $('#DATAFORM').submit();
                        }
                    }
                },
                cancel: function () { }
            }
        });
    });


});
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            console.log(e.target.result);
            $('#img')
                .attr('src', 'portal')
                .width(150)
                .height(150);
        };
        reader.readAsDataURL(input.files[0]);
    }
}