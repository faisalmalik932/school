$(function() {
    var baseUrl = window.location.protocol + "//" + window.location.host + "/"+ commonurl+"/api";
    var datatable = $("#datatables");
    datatable.dataTable({
        aoColumnDefs: [ { "bSortable": false, "aoTargets": [0]} ],
        bDestroy: true,
        selectRow: true,
        bFilter: false,
        bPaginate: false,
        bLengthChange: false,
        bInfo : false,
        aaSorting: false
    });

    /*$(".BRANCH").on('change',function(){
        console.log($(this).val());
        $.ajax({
            type: "GET",
            url: baseUrl + "/classList",
            dataType: "json",
            data: {
                "BRANCH_ID" : $(this).val()
            },
            success: function(response) {
                console.log(response);
                var listItems;
                for (var i = 0; i < response.length; i++){
                    listItems += "<option value='" + response[i].CLASS_ID + "'>" + response[i].CLASS_NAME + "</option>";
                }
                $("#class").html(listItems);
            }
        })
    });*/

    $(".CLASS").on('change',function(){
        console.log($(this).val());
        $.ajax({
            type: "GET",
            url: baseUrl +"/getStudentList",
            dataType: "json",
            data: {
                "CLASS" : $(this).val(),
                "BRANCH_ID" : $('.BRANCH').val()
            },
            success: function(response) {
                console.log(response);
                var listItems;
                listItems += "<option  disabled selected> Select Student" +  "</option>";
                for (var i = 0; i < response.length; i++){
                    listItems += "<option  value='" + response[i].STUDENT_ID + "'>" + response[i].FULL_NAME + "</option>";
                }
                $(".STUDENT").html(listItems);
            }
        })
    });
    $.ajax({
        type: "GET",
        url: baseUrl+"/getDonorList",
        dataType: "json",
        success: function(response) {
            console.log(response);
            listItems = "<option disabled selected>Select Donor</option>";
            var listItems;
            for (var i = 0; i < response.length; i++){
                listItems += "<option value='" + response[i].DONOR_ID + "'>" + response[i].DONOR_NAME + "</option>";
            }
            $("#donorname").html(listItems);
        }
    });
    var table = $('#datatables').DataTable();

    $('.ADD').on('click', function  () {

        table.row.add(['<label>Donor Name</label><select id="donor" class="form-control  validate[required]" name="donor_name"></select>',
            '<label> Student</label><select  class="form-control" id="student"  name="student"></select>']).draw();

        $.ajax({
            type: "GET",
            url: baseUrl+"/getDonorList",
            dataType: "json",
            success: function(response) {
                console.log(response);
                var listItems;
                for (var i = 0; i < response.length; i++){
                    listItems += "<option value='" + response[i].DONOR_ID + "'>" + response[i].DONOR_NAME + "</option>";
                }
                $("#donor").html(listItems);
            }
        });
    });
});