@extends('Template.master')
@section('menu-head', 'HRM')
@section('title', 'Salary  Structure')
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
                    <li class="active"><a href="#form" data-toggle="tab">Search Salary</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane  active" id="form">
                        <form method="GET" action="{{ url('hr/settings/viewsalarystructure') }}" id="DATAFORM" class="form-horizontal" enctype="multipart/form-data">
                            @include('Template.Components.messages')
                            @if (Session::has('structure'))
                                <div class="alert alert-success" id="success-alert">
                                    <button type="button" class="close" data-dismiss="alert">x</button>
                                    <strong>{{ Session::get('structure') }}</strong>
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
                                        <select name="department"  id="department" class="form-control validate[required] DEPARTMENTS">
                                            <option disabled selected>Select Department</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="content-group-lg">
                                        <label>Designation</label>
                                        <select name="designation" id="designation" class="form-control validate[required]  DESIGNATION ">
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
                            <div class="panel-body">
                                <div class="row position-right" style="text-align: end; margin: 6px">
                                    <button type="button" class="btn btn-primary {{__('button.reset-reset')}}"><i class="{{__('button.reset-icon')}} {{__('button.reset-class')}} "></i>{{__('button.reset-text')}}</button>
                                    <button type="submit" class="btn btn-primary"><i class="icon-floppy-disk position-left"></i>Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('jsheader')
    <script  type="text/javascript" src="{{ asset('assets/js/hr/entitlement.js') }}"></script>
@endsection