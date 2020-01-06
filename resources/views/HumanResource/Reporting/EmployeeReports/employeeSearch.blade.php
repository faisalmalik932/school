@extends('Template.master')
@section('menu-head', 'Human Resource')
@section('title', 'Search Emp Payslip')
@section('content')
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">@yield('title')</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="reload"></a></li>
            </ul>
        </div>
    </div>
    <div class="panel-body">
        <form method="GET"  action="{{ url('hr/reports/getpdf') }}"  name="myForm" id="DATAFORM" enctype="multipart/form-data">
            @include('Template.Components.messages')
            <input id="primaryid" name="primary" type="hidden"/>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Select </label>
                       <select class="form-control VALUE">
                           <option > Select </option>
                           <option>Employee Id</option>
                           <option>Full Name</option>
                           <option>Designation</option>
                       </select>
                    </div>
                </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Value</label>
                            <select class="form-control" name="param" id="value">
                            </select>
                        </div>
                    </div>
            </div>
            <div class="panel-body">
                <div class="row position-right" style="text-align: end; margin: 6px">
                    <button type="submit" class="btn btn-primary"><i class="icon-floppy-disk position-left"></i> Search</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('jsheader')

<script type="text/javascript">
    jQuery( document ).ready(function($) {
        jQuery(".VALUE").change(function () {
            console.log($(this).val());
            $.ajax({
                type: "GET",
                url: 'http://localhost:8080/school/api/getEmployees',
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    var employeeId;
                    var employeeName;
                    var designation;
                    for (var i = 0; i < response.length; i++) {
                        employeeId += "<option   value='" + response[i].EMPLOYEE_ID + "'>" + response[i].EMPLOYEE_ID + "</option>";
                        employeeName += "<option   value='" + response[i].FULL_NAME + "'>" + response[i].FULL_NAME + "</option>";
                        designation += "<option   value='" + response[i].TITLE_NAME + "'>" + response[i].TITLE_NAME + "</option>";
                        }
                        if($(".VALUE").val() === "Employee Id"){
                        $("#value").html(employeeId);}

                        else if($(".VALUE").val() === "Full Name"){
                            $("#value").html(employeeName);
                        }
                        else{
                            $("#value").html(designation);
                        }
                    }
            });
        });

    });
</script>
@endsection