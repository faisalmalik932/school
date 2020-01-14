@extends('Template.master')
@section('menu-head', 'Humane Resource / Leaves')
@section('title', 'Add Entitlements')
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
                <li class="active"><a href="#form" data-toggle="tab">Add Entitlements</a></li>
                <li><a href="#list" data-toggle="tab">Entitlements</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="form">
                    <form method="POST" action="{{ url('/hr/entitlements/add') }}" name="myForm" id="DATAFORM" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @include('Template.Components.messages')
                        @if (Session::has('entitlement'))
                        <div class="alert alert-success" id="success-alert">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ Session::get('entitlement') }}</strong>
                        </div>
                        @endif
                        <input id="primaryid" name="primary" type="hidden"/>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Department</label>
                                    <select  id="department" name="department" class="form-control  DEPARTMENTS  validate[required]">
                                        <option disabled selected>Select Department</option>
                                        @foreach($department as $departments)
                                        <option value="{{$departments->DEPARTMENT_ID}}">{{$departments->DEPARTMENT_NAME}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Designation</label>
                                    <select  id="designation" name="designation" class="form-control  DESIGNATION">
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
                                    <label>Leave Types</label>
                                    <select  id="leavetype" name="leavetype" class="form-control validate[required] SEED" data-seed="LEAVE_TYPE">
                                        <option disabled selected>Select LeaveTypes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Entitlements</label>
                                    <input type="number" id="entitlements" class="form-control validate[required,minSize[1]]"     max="25" name="entitlements" placeholder="Entitlements">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="employee_id" id="employee_id">
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
                    <table id="datatable" class="table" data-code="entitlement"></table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jsheader')
<script  type="text/javascript" src="{{ asset('assets/js/hr/entitlement.js') }}"></script>
@endsection