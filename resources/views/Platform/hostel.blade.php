@extends('Template.master')
@section('menu-head', 'Academics')
@section('title', 'Manage Hostels')
@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">@yield('title')</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>
        <div class="panel-body">
            <div class="tabbable">
                <ul class="nav nav-tabs nav-tabs-bottom bottom-divided nav-justified">
                    <li class="active"><a href="#form" data-toggle="tab"><i class="icon-home5 mr-10"></i>Manage Hostel</a></li>
                    <li><a href="#list" data-toggle="tab"><i class="zmdi zmdi-view-day mr-10"></i>Hostel's List</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="form">
                        <form method="POST"  action="{{ url('platform/hostels/add') }}"  name="myForm" id="DATAFORM" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @include('Template.Components.messages')
                            @if (Session::has('hostel'))
                            <div class="alert alert-success" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong>{{ Session::get('hostel') }}</strong>
                            </div>
                            @endif
                            <input id="primaryid" name="primary" type="hidden"/>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>States</label>
                                        <select id="states" name="state" class="form-control validate[required] DROPDOWN DROPDOWN-CHILD" data-dropdown="STATE" data-child-id="city" data-dropdown-child="CITY">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>City</label>
                                        <select name="city" id="city" class="validate[required] form-control   DROPDOWN DROPDOWN-CHILD"  data-child-id="branchId" data-dropdown-child="BRANCH" data-dropdown="CITY">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Branch</label>
                                        <select name="branch" id="branchId" class="form-control validate[required]   DROPDOWN"  data-dropdown="BRANCH">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Hostel Name</label>
                                        <input type="text" class="form-control validate[required,minSize[10]] ALPHA" id="hostelname"  name="hostelName"  placeholder="Hostel Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Address</label>
                                        <input type="text" class="form-control validate[required,minSize[5]]" id="address"  name="hosteladdress"  placeholder="Address">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Hostel Incharge</label>
                                        <input type="text" class="form-control validate[required,minSize[4]] ALPHA" id="manager"  name="hostelmanager"  placeholder="Incharge">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Hostel Type</label>
                                        <select class="form-control validate[required] SEED" id="hosteltype"  name="hosteltype" data-seed="HOSTEL_TYPE">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row position-right" style="text-align: end; margin: 6px">
                                    <button type="button" class="btn btn-primary {{__('button.reset-reset')}}"><i class="{{__('button.reset-icon')}} {{__('button.reset-class')}} "></i>{{__('button.reset-text')}}</button>
                                    <button type="button" class="btn btn-primary SAVE"><i class="icon-floppy-disk position-left"></i> Save/Update</button>
                                    <button type="button" class="btn btn-danger DELETE"><i class="icon-cross3 position-left"></i> Delete</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="list">
                        <table id="datatable" class="table" data-code="hostels"></table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection