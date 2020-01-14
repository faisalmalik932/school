@extends('Template.master')
@section('menu-head', 'Finance')
@section('title', 'Suppliers')
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
                <li class="active"><a href="#form" data-toggle="tab">Add Supplier</a></li>
                <li><a href="#list" data-toggle="tab">Suppliers</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="form">
                    <form method="POST" action="{{ url('/finance/settings/add-supplier') }}" id="DATAFORM" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @include('Template.Components.messages')
                        @if (Session::has('suppliers'))
                        <div class="alert alert-success" id="success-alert">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ Session::get('suppliers') }}</strong>
                        </div>
                        @endif
                        <input id="primaryid" name="primary" type="hidden"/>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Supplier Name</label>
                                    <input type="text" id="suppliername" class="form-control  validate[required]" maxlength="32" pattern="^[A-Za-z -]+$" name="suppliername" placeholder="Supplier Name" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Gst No</label>
                                    <input type="text" id="gstnumber"   name="gstnumber" class="form-control"   placeholder="Gst Number" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Bank Name/Account</label>
                                    <input type="text" id="accountname" class="form-control  validate[required] ALPHA" maxlength="32"  name="accountname" placeholder="Bank Account Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Credit Limit</label>
                                    <input type="text" id="credit"   name="credit" class="form-control NUMS"   placeholder="Credit Limit">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Account Title</label>
                                    <input type="text" id="accounttitle" class="form-control  validate[required]" maxlength="32"  name="accounttitle" placeholder="Bank Account Title">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Account Number</label>
                                    <input type="text" id="accountnumber"   name="accountnumber" class="form-control validate[numeric|required]" minlength="16" maxlength="24"  placeholder="Account Number">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Payment Term</label>
                                    <select  id="paymentterm" class="form-control  validate[required]"  name="paymentterm">
                                        <option>Cash Only</option>
                                        <option>Due 15 Of The Following Month</option>
                                        <option>By The End Of The Following Month</option>
                                        <option>Payment Due Within 10 Days</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Currency</label>
                                    <select  id="currency"   name="currency" class="form-control">
                                        <option disabled selected>Select Currency</option>
                                        @foreach($currency as $currencies)
                                        <option>{{$currencies->CURRENCY_NAME}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Payable Account</label>
                                    <select  id="accountpayable" class="form-control validate[required] ACCOUNT"   name="accountpayable">
                                        <option disabled selected>Select Account</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Purchase Account</label>
                                    <select  id="purchaseaccount"   name="purchaseaccount" class="form-control ACCOUNT">
                                        <option disabled selected>Select Account</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Purchase Discount Account</label>
                                    <select  id="discountaccount" class="form-control ACCOUNT"   name="discountaccount">
                                        <option disabled selected>Select Account</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Contact Person Name</label>
                                    <input type="text" id="contactpersonname"   name="contactpersonname" class="form-control" placeholder="Name"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Mobile No</label>
                                    <input  id="mobilenumber" class="form-control  validate[required] MOBILENUMBER"   name="mobilenumber" placeholder="Mobile No">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>LandLine</label>
                                    <input  id="landline"   name="landline" class="form-control LANDLINENUMBER" placeholder="LandLine"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Fax</label>
                                    <input  id="faxnumber" class="form-control  validate[required] LANDLINENUMBER"   name="faxnumber" placeholder="Fax">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Email</label>
                                    <input  type="email"  id="email"   name="email" class="form-control" placeholder="email"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Address</label>
                                    <input type="text"  id="address" class="form-control  validate[required]"   name="address" placeholder="Address"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Website</label>
                                    <input  id="website"   name="website" class="form-control" placeholder="Website"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Description</label>
                                    <input type="text"  id="description"   name="description" class="form-control" placeholder="Description"/>
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
                    <table id="datatable" class="table" data-code="suppliers"></table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('jsheader')
<script  type="text/javascript" src="{{ asset('assets/js/Finance/supplier.js') }}">
</script>

@endsection