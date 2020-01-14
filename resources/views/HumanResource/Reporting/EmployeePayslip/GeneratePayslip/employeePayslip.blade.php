@extends('Template.master')
@section('menu-head', 'Human Resource')
@section('title', 'Generate Payslip')
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
                <li class="active"><a href="#form" data-toggle="tab">Employee Payslip</a></li>
                <li><a href="#list" data-toggle="tab">Employees Slips</a></li>
            </ul>
            <div class="tab-content" id="tabcontrol">
                <div class="tab-pane active" id="form">
                    <form method="POST" action="{{ url('/hr/reports/payslip') }}" id="DATAFORM" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @include('Template.Components.messages')
                        @if (Session::has('employeepayslip'))
                        <div class="alert alert-success" id="success-alert">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ Session::get('employeepayslip') }}</strong>
                        </div>
                        @endif
                        <input id="primaryid" name="primary" type="hidden"/>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Select Branch</label>
                                    <select  name="branch" id="branchID"  class="form-control  validate[required]  DROPDOWN BRANCH" data-dropdown="BRANCH">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Department</label>
                                    <select name="department" id="department" class="form-control validate[required] DEPARTMENTS ">
                                        <option disabled selected>Select Department</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Designation</label>
                                    <select name="designation" id="designation" class="form-control validate[required] DESIGNATION ">
                                        <option disabled selected>Select Designation</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Employee Name</label>
                                    <select name="employeename" id="employee" class="form-control validate[required]  EMPLOYEE">
                                        <option disabled selected>Select Employee</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Select Year </label>
                                    <select class="form-control validate[required]"  id="year" name="year">
                                        <option disabled selected>Select Year</option>
                                        <option>2017</option>
                                        <option>2018</option>
                                        <option>2019</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label> Month</label>
                                    <select class="form-control validate[required]"  id="month" name="month">
                                        <option disabled selected>Select Month</option>
                                        <option>JAN</option>
                                        <option>FEB</option>
                                        <option>MAR</option>
                                        <option>APR</option>
                                        <option>MAY</option>
                                        <option>JUN</option>
                                        <option>JUL</option>
                                        <option>AUG</option>
                                        <option>SEP</option>
                                        <option>OCT</option>
                                        <option>NOV</option>
                                        <option>DEC</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label> Basic Salary</label>
                                    <input type="number" id="basicsalary" class="form-control  validate[required,maxSize[32],minSize[4]]" name="basicsalary" placeholder="Basic Salary" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>House Rent </label>
                                    <input type="number" id="houserent"  class="form-control validate[required,maxSize[32],minSize[4]]"  placeholder="House Rent" name="houserent">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Utility Allowance</label>
                                    <input type="number" name="utiltyallowance" id="utiltyallowance"  class="form-control validate[required]" placeholder="Utility Allowance"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Provident Fund</label>
                                    <input type="number" name="pf" id="pf"  class="form-control validate[required]" placeholder="Provident Fund">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Advance</label>
                                    <input type="number" name="advance" id="advance"  class="form-control" placeholder="Advance"/>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row position-right" style="text-align: end; margin: 6px">
                                <button type="button" class="btn btn-primary SAVE"><i class="icon-floppy-disk position-left"></i> Save/Update</button>
                                <button type="button" class="btn btn-danger DELETE"><i class="icon-cross3 position-left"></i> Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="list">
                    <table id="datatable" class="table" data-code="employeepayslip"></table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jsheader')
<script  type="text/javascript" src="{{ asset('assets/js/hr/employee.js') }}"></script>
@endsection





