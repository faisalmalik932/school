@extends('Template.master')
@section('menu-head', 'HR')
@section('title', 'Apply Leave')
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
                <li class="active"><a href="#form" data-toggle="tab">Apply Leave</a></li>
                <li ><a href="#list" data-toggle="tab">Detail</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="form">
                    <form method="POST"  action="{{ url('hr/leaves/save-leave') }}"  name="myForm" id="DATAFORM" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @include('Template.Components.messages')
                        @if (Session::has('applyleave'))
                        <div class="alert alert-success" id="success-alert">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ Session::get('applyleave') }}</strong>
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
                                <div class="form-group">
                                    <label>Leave Period Start</label>
                                        <input  type="text" id="leaveperiodstart"  class="form-control validate[required] DATETIME"  name="leaveperiodstart" placeholder="Leave Period Start">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Leave Period End</label>
                                    <input  type="text" id="leaveperiodend"  class="form-control validate[required] DATETIME"  name="leaveperiodend" placeholder="Leave Period End" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Leave Type</label>
                                    <div class="multi-select-full">
                                        <select name="leavetype" id="leavetype" data-seed="LEAVE_TYPE" class="form-control validate[required]  LEAVETYPE SEED">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Leave Reason</label>
                                    <input type="text" class="form-control" id="leavereason" name="leavereason" placeholder="Reason"/>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row position-right" style="text-align: end; margin: 6px">
                                <button type="button" class="btn btn-primary RESET imageCheck"><i class="{{__('button.reset-icon')}} {{__('button.reset-class')}}"></i>{{__('button.reset-text')}}</button>
                                <button type="button" id="button" class="btn btn-primary SAVE"><i class="icon-floppy-disk position-left"></i> Apply</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="list">
                    <table class="table" id="datatable" data-code="leavesapplied">
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jsheader')
<script type="text/javascript" src="{{ asset('js/hr/employeeentitlement.js') }}">
</script>
<script type="text/javascript" src="{{ asset('js/hr/entitlement.js') }}">
</script>
@endsection