@extends('Template.master')
@section('title', 'Users')
@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Users</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload" title="Reset Form"></a></li>
                </ul>
            </div>
        </div>
        <div class="panel-body">
            <div class="tabbable">
                <ul class="nav nav-tabs nav-justified nav-tabs-bottom bottom-divided">
                    <li class="active"><a href="#form" data-toggle="tab"><i class="zmdi zmdi-account-add zmdi-hc-lg mr-10"></i>Register</a></li>
                    <li><a href="#list" data-toggle="tab"><i class="zmdi zmdi-view-day zmdi-hc-lg mr-10"></i>Users</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="form">
                        <form method="POST" action="{{ url('platform/users/add-user') }}" name="myForm" id="DATAFORM" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @include('Template.Components.messages')
                            @if (Session::has('users'))
                            <div class="alert alert-success" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong>{{ Session::get('users') }}</strong>
                            </div>
                            @endif
                            <input id="primaryid" name="primary" type="hidden"/>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>User Name</label>
                                        <input id="username" name="username" class="form-control validate[required,minSize[5]]" maxlength="45" placeholder="User Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" id="password" class="form-control validate[required,minSize[4]]" maxlength="45" placeholder="Password">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Branch Name</label>
                                        <select  class="form-control  validate[required] BRANCH DROPDOWN" data-dropdown="BRANCH" id="branchId" name="branchname">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Employees</label>
                                        <select  class="form-control  validate[required]" id="employeename"  name="employeename">
                                            <option disabled selected>Select Employee</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> User Role</label>
                                        <select  class="form-control  validate[required]"  name="userrole" id="userrole">
                                            <option disabled selected>Select User Role</option>
                                            @isset($userroles)
                                            @foreach($userroles as $users)
                                            <option value="{{$users->USER_ROLE_ID}}">{{$users->USER_ROLE_NAME}}</option>
                                            @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Status</label>
                                        <select  class="form-control  validate[required] SEED" id="status"  name="status" data-seed="STATUS">
                                        </select>
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
                        <table id="datatable" class="table datatable" data-code="users"></table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('jsheader')
<script  type="text/javascript" src="{{ asset('assets/js/platform/users.js') }}"></script>
@endsection
