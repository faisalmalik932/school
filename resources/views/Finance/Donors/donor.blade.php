@extends('Template.master')
@section('menu-head', 'Finance')
@section('title', 'Add Donor')
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
                            <li class="active"><a href="#form" data-toggle="tab">Add Donor</a></li>
                            <li><a href="#list" data-toggle="tab">Donors</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="form">
                                <form method="POST" action="{{ url('/finance/donors/add') }}" name="myForm" id="DATAFORM" enctype="multipart/form-data" >
                                    {{ csrf_field() }}
                                    @include('Template.Components.messages')
                                    @if (Session::has('donor'))
                                    <div class="alert alert-success" id="success-alert">
                                        <button type="button" class="close" data-dismiss="alert">x</button>
                                        <strong>{{ Session::get('donor') }}</strong>
                                    </div>
                                    @endif
                                    <input id="primaryid" name="primary" type="hidden"/>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Donor Name</label>
                                                <input type="text" id="donorname" class="form-control  validate[required,custom[onlyLetterSp]] ALPHA"  name="donor_name" placeholder="Donor Name" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select name="gender" id="gender" class="form-control validate[required] SEED" data-seed="GENDER" >
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <select name="country" id="countryId" class="form-control validate[required] DROPDOWN DROPDOWN-CHILD" data-dropdown="COUNTRY" data-child-id="states" data-dropdown-child="STATE">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>State</label>
                                                <select name="state" id="states" class="form-control validate[required] DROPDOWN DROPDOWN-CHILD" data-dropdown="STATE" data-child-id="city" data-dropdown-child="CITY" >
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>City</label>
                                                <select name="city" id="city" class="form-control validate[required]  DROPDOWN" data-dropdown="CITY">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Zip Code</label>
                                                <input type="text" id="zipcode"   name="zip_code" class="form-control "  placeholder="Zip Code">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Donor Mobile No</label>
                                                <input type="text"  id="cellphone"  name="donor_mobile" class="form-control validate[required,minSize[11] MOBILENUMBER"  placeholder="Mobile No">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" id="email"   name="donor_email" class="form-control validate[custom[email]"  placeholder="Email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text"  id="address"  name="address" class="form-control "  placeholder="Address">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>NIC No</label>
                                                <input type="text" id="nicNo"  name="donornic" class="form-control CNIC_NUMBER"  placeholder="NIC No" maxlength="15">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Donor Category</label>
                                                <select name="category" id="donorCategory" class="form-control validate[required] SEED" data-seed="DONOR_CATEGORy" >
                                                    <option >Adoption</option>
                                                    <option >GDonor</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Donor Type</label>
                                                <select name="type" id="donortype" class="form-control validate[required] SEED" data-seed="DONOR_TYPE">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Emergency Contact Name</label>
                                                <input type="text" id="emgcontactname" class="form-control validate[custom[onlyLetterSp]] "  name="emg_name" placeholder="Emg Contact Name" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Emergency Contact No</label>
                                                <input type="text" class="form-control validate[minSize[11]] MOBILENUMBER" id="emgcontactnumber"  name="emg_contact" placeholder="Emg Contact Number" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row position-right" style="text-align: end; margin: 6px">
                                            <button type="button" class="btn btn-primary {{__('button.reset-reset')}}"><i class="{{__('button.reset-icon')}} {{__('button.reset-class')}} "></i>{{__('button.reset-text')}}</button>
                                            <button type="button" class="btn btn-primary SAVE"><i class="icon-floppy-disk position-left"></i> Save/Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="list">
                                <table id="datatable" class="table" data-code="donors"></table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection
@section('jsheader')
<script  type="text/javascript" src="{{ asset('js/donors/donors.js') }}"></script>
@endsection