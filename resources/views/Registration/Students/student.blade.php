<?php $nav_student = 'active'; ?>
@extends('Template.master')
@section('menu-head', 'Academics')
@section('title', 'Manage Students')
@section('content')
    <div class="panel panel-flat" xmlns="http://www.w3.org/1999/html">
        <div class="panel-heading">
            <h5 class="panel-title">Manage Student</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                </ul>
            </div>
        </div>
        <div class="panel-body">
            <div class="tabbable">
                <ul class="nav nav-tabs nav-tabs-bottom bottom-divided nav-justified">
                    <li class="active"><a href="#form" data-toggle="tab"><i class="zmdi zmdi-account-add zmdi-hc-lg mr-10"></i>Manage Student</a></li>
                    <li><a href="#list" data-toggle="tab"><i class="zmdi zmdi-view-day zmdi-hc-lg mr-10"></i>Student's List</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="form">
                        <form  method="POST"  action="{{ url('register/save-student')}}"  name="myForm" id="DATAFORM" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @include('Template.Components.messages')
                            @if (Session::has('student'))
                                <div class="alert alert-success" id="success-alert">
                                    <button type="button" class="close" data-dismiss="alert">x</button>
                                    <strong>{{ Session::get('student') }}</strong>
                                </div>
                            @endif
                            <div id = "alert_placeholder"></div>
                            <input id="primaryid" name="primary" type="hidden"/>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>States *</label>
                                        <select  id="states" name="state"  class="form-control validate[required] DROPDOWN DROPDOWN-CHILD"  data-dropdown="STATE" data-child-id="city" data-dropdown-child="CITY">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>City *</label>
                                        <select name="city" id="city" class="form-control validate[required] DROPDOWN DROPDOWN-CHILD" data-dropdown="CITY" data-child-id="branchId" data-dropdown-child="BRANCH">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Branch *</label>
                                        <select name="branch" id="branchId" class="form-control validate[required] DROPDOWN  DROPDOWN-CHILD BRANCH" data-dropdown="BRANCH">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Donor</label>
                                        <select name="donor" id="donor" class="form-control  DROPDOWN " data-dropdown="DONOR">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-info mr-10"></i>Student Info</h6>
                            <hr class="light-grey-hr"/>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Student Code *</label>
                                        <input type="text" class="form-control NUMS  validate[required]"  id="stdCode"  name="code"   placeholder="Code" minlength="1"  maxlength="10">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Student Pic</label>
                                        <input type="file" id="tempEmpPic" name="image" class="form-control"  placeholder="Student Pic" >
                                        <input type="hidden" name="updatedPic"  id="Pic" value="" onchange="$('#img').val('https://www.peb.edu.pk/portal/uploads/students/' + $(this).val());"/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <img id="img" src=""  style="float: right"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Roll No *</label>
                                        <input type="text" class="form-control NUMS  validate[required,minSize[1],maxSize[7]]" maxlength="7" minlength="1" id="rollNo"  name="roll_no"  placeholder="Roll No">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Full Name *</label>
                                        <input type="text" maxlength="45" class="form-control  validate[required,custom[onlyLetterSp],minSize[5]] ALPHA" id="fullName"  name="studentfullname" placeholder="Full Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>BayForm No</label>
                                        <input type="text" id="bayform" name="bayForm" class="form-control"  placeholder="BayForm No" maxlength="15">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Religion </label>
                                        <select name="religion" id="religion" class="form-control">
                                            <option >Islam</option>
                                            <option >Christian</option>
                                            <option >Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gender *</label>
                                        <select name="gender" id="gender"  class="form-control validate[required] SEED" data-seed="GENDER">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Birth Date</label>
                                        <input type="date" name="birth_date"  id="birthDate"  class="form-control" placeholder="Birth Date">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Birth Place *</label>
                                        <input type="text"   name="birth_place"  id="birthPlace" class="form-control validate[required,custom[onlyLetterSp]] ALPHA"  placeholder="Birth Place">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nationality </label>
                                        <input value="Pakistan" readonly type="text" id="nationality"  name="nationality"  class="form-control"  placeholder="Nationality">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Current Address *</label>
                                        <input type="text" id="currentAddress" name="curr_add" maxlength="100" class="form-control validate[required]"  placeholder="Current Address">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Permanent Address</label>
                                        <input type="text" name="perm_add" maxlength="100" id="permanentAddress" class="form-control"  placeholder="Permanent Address">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Class *</label>
                                        <select name="class" id="class" class="form-control validate[required] SEED CLASS" data-seed="CLASSES" data-child-id="section" data-dropdown-child="SECTION">
                                            <option disabled selected value>Select Class</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Section </label>
                                        <select name="section" id="section" class="form-control">
                                            <option disabled selected>Select Section</option>
                                            @foreach ($sections as $section)
                                                <option value="{{ $section->SECTION_NAME }}">{{ $section->SECTION_NAME }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Registration Date *</label>
                                        <input type="date" id="registerDate" name="register_date" class="form-control" placeholder="Joining Date" value="<?php echo date('d/m/Y')?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Hostel</label>
                                    <select name="hostel" id="hostel" class="form-control DROPDOWN" data-dropdown="HOSTEL">
                                        <option disabled selected value>Choose Hostel</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Student Status</label>
                                    <select name="status" id="status" class="form-control SEED" data-seed="STATUS">
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-6">
                                        <label>Concession Percentage
                                            <input type="number" value="0" name="concession" min="0" id="concession" class="form-control"/>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-info-outline mr-10"></i>Parents/Guardian Information</h6>
                            <hr class="light-grey-hr"/>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Full Name *</label>
                                        <input type="text" id="guardianfullname"   name="guardianfullname"  class="form-control validate[required,custom[onlyLetterSp]] ALPHA" maxlength="45"  placeholder="Full Name">
                                        <input type="hidden" name="guardianId"  id="guardianId" value=""/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>CNIC *</label>
                                        <input type="text" id="cnic"  name="cnic" class="form-control validate[required,minSize[15]] CNIC_NUMBER"  placeholder="National ID" maxlength="15">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email"  id="email" name="email" class="form-control validate[custom[email],minSize[10]]"  placeholder="email@parent.com">
                                        <h1 id='result'></h1>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Relation *</label>
                                        <select name="relation" id="relation" class="form-control validate[required] SEED" data-seed="GUARDIAN_RELATION">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Cell Phone *</label>
                                        <input type="text" id="cellphone"   name="cellphone" class="form-control validate[required,minSize[12]] MOBILENUMBER"  placeholder="Mobile No" minlength="12" maxlength="12">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>LandLine No</label>
                                        <input type="text" id="landline"  name="landline" class="form-control  LANDLINENUMBER"  placeholder="LandLine No" minlength="12">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Parent/Guardian Occupation *</label>
                                        <input type="text" id="guardianOccupation"  name="guardian_occupation"  class="form-control validate[required] ALPHA" maxlength="45" placeholder="Occupation">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Job Title</label>
                                        <input type="text" id="jobtitle" maxlength="30" name="job_title"  class="form-control ALPHA"  placeholder="Job Title">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Business Name</label>
                                        <input type="text" id="businessname" maxlength="45" name="business_name" class="form-control ALPHA"   placeholder="Business Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Business Address</label>
                                        <input type="text" name="business_add" id="businessaddress" maxlength="100" class="form-control"  placeholder="Business Address">
                                    </div>
                                </div>
                            </div>
                            <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-lamp mr-10"></i>Emergency Contact Information</h6>
                            <hr class="light-grey-hr"/>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Emergency Person Name</label>
                                        <input type="text" name="emg_name" id="emgPerName"  class="form-control ALPHA"  placeholder="Emergency Person Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Emergency Relation</label>
                                        <select  name="emg_relation" id="emgRelation"  class="form-control  SEED" data-seed="GUARDIAN_RELATION">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Emergency Mobile No</label>
                                        <input type="text" name="emg_mobile" id="emgMobile" class="form-control validate[minSize[12]] MOBILENUMBER" minlength="12" placeholder="Emergency Mobile">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Emergency Landline</label>
                                        <input type="text" name="emg_landline" id="emgLandline" class="form-control  LANDLINENUMBER"  placeholder="Emergeny LandLine" minlength="12">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Emergency Address</label>
                                        <input type="text" name="emg_add" id="emgAddress" maxlength="100" class="form-control"  placeholder="Emergency Address">
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row position-right" style="text-align: end; margin: 6px">
                                    <button type="button" class="btn btn-primary {{__('button.reset-reset')}}"><i class="{{__('button.reset-icon')}} {{__('button.reset-class')}} "></i>{{__('button.reset-text')}}</button>
                                    <button type="button" class="btn btn-primary SAVESTUDENT"><i class="icon-floppy-disk position-left"></i> Save/Update</button>
                                    <button type="button" class="btn btn-danger DELETE"><i class="icon-cross3 position-left"></i> Delete</button>
                                </div>
                            </div>
                            <div class="container">
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
                                    <div class="modal-dialog ">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalTitle">Siblings</h4>
                                            </div>
                                            <div class="modal-body" >
                                                <select id="siblings" name="siblings[]" multiple="multiple"></select>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="reset" class="btn btn-primary save"  id="myModalButton">Select</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="modal_form_vertical" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">Fee Structure</h5>
                                        </div>
                                        <form action="#" method="GET">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <label>Fee Category Type</label>
                                                            <select class="form-control FEEHEADER   SEED" data-seed="FEE_CATEGORY_TYPE"  id="feeheader"  name="feeheader">
                                                                <option disabled selected>Select Fee Header</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label>Concession_Type</label>
                                                            <input class="form-control FEECATEGORY"  id="feecategory"  name="feecategory" placeholder="Concession_TYPE">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                                <button type="button" id="dataform" class="btn btn-primary">Add</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="list">
                        <table id="datatable" class="table" data-code="students"></table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('jsheader')
    <script  type="text/javascript" src="{{ asset('assets/js/registration/student.js') }}">
    </script>
    <script  type="text/javascript" src="{{ asset('assets/js/registration/validation.js') }}">
    </script>
@endsection