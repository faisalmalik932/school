@extends('Template.master')
@section('menu-head', 'Human Resource')
@section('title', 'Salary Deductions')
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
                <li class="active"><a href="#form" data-toggle="tab">Salary Deductions</a></li>
                <li><a href="#list" data-toggle="tab">Deductions</a></li>
            </ul>
            <div class="tab-content" id="tabcontrol">
                <div class="tab-pane active" id="form">
                    <form method="POST" action="{{ url('/hr/reports/payslip-deductions') }}" id="DATAFORM" class="form-horizontal" enctype="multipart/form-data">
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
                                    <label>Select Branch</label>
                                    <select  name="branch" id="branchId"  class="form-control  validate[required]  DROPDOWN BRANCH" data-dropdown="BRANCH">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Department</label>
                                    <select name="department" id="department" class="form-control validate[required] DEPARTMENTS">
                                        <option disabled selected>Select Department</option>
                                        @foreach($departments as $department)
                                        <option value="{{$department->DEPARTMENT_ID}}">{{$department->DEPARTMENT_NAME}}</option>
                                        @endforeach
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
                                        @foreach($jobTitle as $titles)
                                        <option value="{{$titles->TITLE_ID}}">{{$titles->TITLE_NAME}}</option>
                                        @endforeach
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
                            <div class="col-md-12">
                                <div class="content-group-lg">
                                    <label>Reason</label>
                                    <input class="form-control" name="reason" id="reason" type="text" placeholder="Reason">
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary ADD" data-toggle="modal" data-target="#modal_form_vertical" style="height: 33px; float: right">Add Categories</button>
                        <input id="tabledata" name="tabledata" type="hidden" value="" />
                        <table class="table" id="datatables">
                            <thead>
                            <tr>
                                <th>Salary Category</th>
                                <th>Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <div class="panel-body">
                            <div class="row position-right" style="text-align: end; margin: 6px">
                                <button type="button" class="btn btn-primary {{__('button.reset-reset')}} {{__('button.reset-tableReset')}}"><i class="{{__('button.reset-icon')}} {{__('button.reset-class')}} "></i>{{__('button.reset-text')}}</button>
                                <button type="button" class="btn btn-primary SAVE"><i class="icon-floppy-disk position-left"></i> Save/Update</button>
                                <button type="button" class="btn btn-danger DELETE"><i class="icon-cross3 position-left"></i> Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="modal_form_vertical" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">Salary Structure</h5>
                            </div>
                            <form action="#" method="GET">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Salary Category</label>
                                                <select class="form-control SALARYCATEGORY  validate[required]"   id="salarycategory"  name="salarycategory">
                                                    <option disabled selected>Select Category</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Amount</label>
                                                <input type="number" id="amount"   name="amount" class="form-control"   placeholder="Amount" >
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
                <div class="tab-pane" id="list">
                    <table id="datatable" class="table" data-code="employeepayslipdeductions"></table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jsheader')
<script  type="text/javascript" src="{{ asset('assets/js/hr/entitlement.js') }}"></script>
<script  type="text/javascript" src="{{ asset('assets/js/hr/salarystructure.js') }}"></script>
@endsection





