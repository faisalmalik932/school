@extends('Template.master')
@section('menu-head', 'Human Resource')
@section('title', 'Create Payslip')
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
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-bottom bottom-divided nav-justified">
                <li class="active"><a href="#form" data-toggle="tab">Create Payslip</a></li>
                <li><a href="#list" data-toggle="tab">See Payslip</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="form">
                    <form method="POST"  action="{{ url('hr/payslips/generatepayslip') }}"  name="myForm" id="DATAFORM" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @include('Template.Components.messages')
                        @if (Session::has('payslip'))
                        <div class="alert alert-success" id="success-alert">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ Session::get('payslip') }}</strong>
                        </div>
                        @endif
                        <input hidden type="text" value="" id="challan" name="challan"/>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-semibold">Year </label>
                                    <select class="form-control validate[required]"   id="year" name="year">
                                        <option disabled selected>Select Year</option>
                                        <option>2017</option>
                                        <option>2018</option>
                                        <option>2019</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-semibold">Month</label>
                                    <select class="form-control validate[required]" name="month" id="month">
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
                                    <label>Select Branch</label>
                                    <select  name="branch" id="branchId"  class="form-control  validate[required]  DROPDOWN BRANCH" data-dropdown="BRANCH">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Department</label>
                                    <select name="department" id="department" class="form-control DEPARTMENTS">
                                        <option disabled selected>Select Department</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Designation</label>
                                    <select name="designation" id="designation" class="form-control  DESIGNATION ">
                                        <option disabled selected>Select Designation</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Employee Name</label>
                                    <select name="employeename" id="employee" class="form-control   EMPLOYEE">
                                        <option  selected>Select Employee</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row position-right" style="text-align: end; margin: 6px">
                                <button type="button" class="btn btn-primary RESET imageCheck"><i class="{{__('button.reset-icon')}} {{__('button.reset-class')}}"></i>{{__('button.reset-text')}}</button>
                                <button type="button" class="btn btn-primary SAVE"><i class="icon-floppy-disk position-left"></i>Generate PaySlip</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="list">
                    <table id="datatable" class="table" data-code="employeepayslipdetail"></table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jsheader')
<script  type="text/javascript" src="{{ asset('assets/js/hr/entitlement.js') }}"></script>
@endsection
