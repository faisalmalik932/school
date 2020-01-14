@extends('Template.master')
@section('menu-head', 'Platform')
@section('title', 'Manage Branches')
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
                    <li class="active"><a href="#form" data-toggle="tab"><i class="icon-home5 mr-10"></i>Manage Branch</a></li>
                    <li><a href="#list" data-toggle="tab"><i class="zmdi zmdi-view-day mr-10"></i>Branches List</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="form">
                        <form method="POST" action="{{ url('platform/branches/add') }}" name="myForm" id="DATAFORM" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @include('Template.Components.messages')
                            @if (Session::has('branch'))
                            <div class="alert alert-success" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong>{{ Session::get('branch') }}</strong>
                            </div>
                            @endif
                            <input id="primaryid" name="primary" type="hidden"/>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Branch Code</label>
                                        <input id="branchcode" type="text"  class="form-control validate[required,minSize[3]]"  maxlength="8"  name="branchcode" placeholder="Branch Code" value="{{ old('branchcode') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Branch Name</label>
                                        <input id="branchName" type="text" title="Enter alphabets" class="form-control validate[required,minSize[10] , maxSize[60]]] ALPHA"  maxlength="65" pattern="^[A-Za-z -]+$" name="branch" placeholder="Branch Name" value="{{ old('branch') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>State:</label>
                                        <select id="stateId" name="state"   class="form-control  validate[required] DROPDOWN  DROPDOWN-CHILD"  data-child-id="cityId" data-dropdown-child="CITY" data-dropdown="STATE" value="{{ old('state') }}">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>City</label>
                                        <select name="city" id="cityId" class="form-control  validate[required] DROPDOWN" data-dropdown="CITY" value="{{ old('city') }}">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Address</label>
                                        <input id="address" type="text" class="form-control  validate[required,minSize[5] , maxSize[280]]"  name="address" placeholder="Address" value="{{ old('address') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> LandLine Number</label>
                                        <input type="text" id="landLine" class="form-control  validate[required,minSize[12] , maxSize[15]] LANDLINENUMBER"  name="landLine" placeholder="LandLine Number" value="{{ old('landline') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Fax Number</label>
                                        <input type="text" id="faxNumber" class="form-control  LANDLINENUMBER"  minlength="12" name="fax" placeholder="Fax Number" value="{{ old('fax') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Email</label>
                                        <input type="email" id="email"  class="form-control validate[custom[email],minSize[10] , maxSize[200]]"  name="email" placeholder="Email" maxlength="30" minlength="15" value="{{ old('email') }}">
                                        <h1 id='result'></h1>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Branch Type:</label>
                                        <select name="branch_type" id="branchType" class="form-control  validate[required] SEED" data-seed="BRANCH_TYPE" value="{{ old('branch_type') }}">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Branch Level:</label>
                                        <select name="branch_level" id="branchLevel" class="form-control   SEED" data-seed="BRANCH_LEVEL" value="{{ old('branch_level') }}">
                                        </select>
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Description</label>
                                        <input type="text" id="description" class="form-control"  maxlength="100" pattern="^[A-Za-z -]+$"  name="description" placeholder="Description" value="{{ old('description') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Registration Date</label>
                                        <input type="date" class="form-control  validate[required]" id="registerDate"  name="reg_date" placeholder="Registration Date" value="<?php echo date("Y-m-d"); ?>">
                                    </div>
                                </div>
                             </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status:</label>
                                        <select name="status" id="status" class="form-control validate[required] SEED" data-seed="STATUS" value="{{ old('status') }}">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Late Fee Fine</label>
                                        <input type="Number" class="form-control" id="latefine"  name="latefine" placeholder="Late Fee Fine" value="{{ old('latefine') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Bank:</label>
                                        {{-- <select name="bank" id="bank" class="form-control validate[required]">
                                            <option value="{{$bank->ACCOUNT_ID}}">{{$bank->BANK_NAME}}</option>
                                        </select> --}}
                                        {!!Form::select('bank', $bank, null, ['id' => 'bank', 'class' => 'form-control' ] )!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Branch Logo</label>
                                        <input type="file" class="form-control" id="branchlogo"  name="branchlogo" placeholder="Branch Logo" onchange="$('#branchlogo').val($(this).val());">
                                        <!-- <input type="hidden" name="updatedPic" class="UPDATEDPIC" id="branchlogo" value=""/> -->
                                    </div>
                                </div>
                                <div class="col-md-6">
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
                        <table id="datatable" class="table" data-code="branches">
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('jsheader')




<script  type="text/javascript" src="{{ asset('assets/js/Platform/users.js') }}"></script>
@endsection

