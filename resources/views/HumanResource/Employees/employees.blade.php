@extends('Template.master')
@section('menu-head', 'Human Resource')
@section('title', 'Manage Employees')
@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">@yield('title')</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="reload" title="Reset Form"></a></li>
                </ul>
            </div>
        </div>
        <div class="panel-body">
            <div class="tabbable">
                <ul class="nav nav-tabs nav-tabs-bottom bottom-divided nav-justified">
                    <li class="active"><a href="#form" data-toggle="tab"><i class="zmdi zmdi-male-female mr-10"></i>Add Employee</a></li>
                    <li><a href="#list" data-toggle="tab"><i class="zmdi zmdi-view-agenda mr-10"></i>Employees List</a></li>
                </ul>
                <div class="tab-content" id="tabcontrol">
                    <div class="tab-pane active" id="form">
                        <form method="POST" action="{{ url('/hr/save-employee') }}" id="DATAFORM" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @include('Template.Components.messages')
                            @if (Session::has('employee'))
                            <div class="alert alert-success" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong>{{ Session::get('employee') }}</strong>
                            </div>
                            @endif
                            <input id="primaryid" name="primary" type="hidden"/>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label> Employee Code *</label>
                                    <input type="text" id="code" class="form-control validate[required]" maxlength="11"  name="code" placeholder="Employee Code">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="content-group-lg">
                                    <label>Employee Pic</label>
                                    <input type="file" id="tempEmpPic"   name="image" class="form-control TEMPIMAGE" onchange="readURL(this);$('#empPic').val($(this).val());"  placeholder="Emp Pic" >
                                    <input type="hidden" name="updatedPic" class="UPDATEDPIC" id="empPic" value=""/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="content-group-lg">
                                    <img id="pic"  class="image imageReset" style="float: right" name="img"  src="">
                                </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="content-group-lg">
                                        <label> Full Name *</label>
                                        <input type="text" id="fullName" maxlength="50" class="form-control  validate[required] ALPHA" name="fullname" placeholder="First Name" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="content-group-lg">
                                        <label>Father Name * </label>
                                        <input type="text" id="fatherName" maxlength="50"  class="form-control validate[required] ALPHA"  placeholder="Father Name" name="fathername">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="content-group-lg">
                                        <label>Status: *</label>
                                        <select name="status" id="status"  class="form-control validate[required] SEED" data-seed="STATUS">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="content-group-lg">
                                        <label>Gender *</label>
                                        <select name="gender" id="gender"  class="form-control validate[required] SEED" data-seed="GENDER">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="content-group-lg">
                                        <label>DOB *</label>
                                        <input type="date"  name="birthDate" id="birth"  class="form-control validate[required]"  placeholder="Birth Date" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="content-group-lg">
                                        <label>CNIC *</label>
                                        <input type="text" id="cnic"  name="cnic" class="form-control validate[required,minSize[15]] CNIC_NUMBER"  placeholder="National ID" maxlength="15">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="content-group-lg">
                                        <label>Office Email</label>
                                        <input type="email" id="OffEmail" name="official_email" class="form-control validate[custom[email]]"  placeholder="email@office.com">
                                        <h1 id='result'></h1>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="content-group-lg">
                                        <label>Personal Email *</label>
                                        <input type="email" id="PerEmail" name="personal_email" class="form-control validate[custom[email]]"  placeholder="email@personal.com">
                                        <h1 id='result'></h1>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="content-group-lg">
                                        <label>Mobile No *</label>
                                        <input type="text" id="mobileNumb"  name="mobile" class="form-control validate[required,minSize[11]] MOBILENUMBER"  placeholder="Mobile No">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="content-group-lg">
                                        <label>Home Phone *</label>
                                        <input type="text" id="homeNumb"  name="home_phone" class="form-control validate[required,minSize[11]] LANDLINENUMBER"  placeholder="Home Phone"  >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="content-group-lg">
                                        <label>Current Address *</label>
                                        <input type="text" id="currentAdd" maxlength="50" name="curr_add" class="form-control validate[required]"  placeholder="Current Address"  >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="content-group-lg">
                                        <label>Permanent Address *</label>
                                        <input type="text" id="permanentAdd" maxlength="50" name="perm_add" class="form-control validate[required]"  placeholder="Permanent Address" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="content-group-lg">
                                        <label>Job Status *</label>
                                        <select  name="jobStatus" id="jobStatus"  class="form-control  validate[required]">
                                            <option disabled selected>Select Job Status</option>
                                            @foreach($employmentStatus as $Status)
                                            <option value="{{$Status->JOB_STATUS_ID}}">{{$Status->JOB_STATUS_NAME}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="content-group-lg">
                                        <label>Department Type *</label>
                                        <select  id="employeetype" name="employeetype" class="form-control validate[required] SEED EMPLOYEETYPE" data-seed="DEPARTMENT_TYPE">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="content-group-lg">
                                        <label>Department *</label>
                                        <select name="department" id="department" class="form-control validate[required]  DEPARTMENTS">
                                            <option disabled selected>Select Department</option>
                                            @foreach($department as $departments)
                                            <option value="{{$departments->DEPARTMENT_ID}}">{{$departments->DEPARTMENT_NAME}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="content-group-lg">
                                        <label>Designation *</label>
                                       <select name="designation" id="designation" class="form-control validate[required]">
                                           <option disabled selected>Select Designation</option>
                                           @foreach($title as $titles)
                                           <option value="{{$titles->TITLE_ID}}">{{$titles->TITLE_NAME}}</option>
                                           @endforeach
                                       </select>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="content-group-lg">
                                        <label>Select Branch *</label>
                                        <select  name="branch" id="branchID"  class="form-control  validate[required] DROPDOWN" data-dropdown="BRANCH">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="content-group-lg">
                                        <label>Joining Date *</label>
                                        <input  class="form-control validate[required]" id="joinDate" name="join_date" type="date" placeholder="Joining Date" >
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="content-group-lg">
                                        <label>Employee Salary</label>
                                        <input type="text" name="employesalary" id="salary" class="form-control NUMS " maxlength="15" placeholder="Salary">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="content-group-lg">
                                        <label>Reference Name</label>
                                        <input type="text" id="refName" name="ref_name"   class="form-control ALPHA"  maxlength="45" placeholder="Reference Name" >
                                    </div>
                                </div>
                            </div>
                            <div class="removeTermination hide">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="content-group-lg">
                                        <label>Termination Reason</label>
                                        <input type="text" name="ter_reason" id="termination_reason"  maxlength="100"  class="form-control"  placeholder="Termination Reason" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="content-group-lg">
                                        <label>Termination Date</label>
                                        <input type="date" name="ter_date" id="termination_date" class="form-control"  placeholder="Termination Date">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="content-group-lg">
                                        <label>Termination Type</label>
                                        <select name="ter_type"  class="form-control  SEED" id="termination_type" data-seed="TERMINATION">
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="panel-body">
                                <div class="row position-right" style="text-align: end; margin: 6px">
                                    <button type="button" class="btn btn-primary RESET imageCheck"><i class="{{__('button.reset-icon')}} {{__('button.reset-class')}}"></i>{{__('button.reset-text')}}</button>
                                    <button type="button" class="btn btn-primary SAVE"><i class="icon-floppy-disk position-left"></i> Save/Update</button>
                                    <button type="button" class="btn btn-danger DELETE"><i class="icon-cross3 position-left"></i> Delete</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="list">
                        <table id="datatable" class="table" data-code="employees"></table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('jsheader')
<script  type="text/javascript" src="{{ asset('assets/js/hr/employee.js') }}"></script>
<script  type="text/javascript" src="{{ asset('assets/js/hr/validation.js') }}">
</script>
<script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#pic')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection





