@extends('Template.master')
@section('menu-head', 'Platform')
@section('title', 'Supplier Payment')
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
            <ul class="nav nav-tabs nav-justified nav-tabs-bottom bottom-divided">
                <li class="active"><a href="#form" data-toggle="tab">Add Supplier Payment</a></li>
                <li><a href="#list" data-toggle="tab">Supplier Payments</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="form">
                    <form method="POST" action="{{ url('finance/purchase/add-payment') }}" name="myForm" id="DATAFORM" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @include('Template.Components.messages')
                        @if (Session::has('supplierpayment'))
                        <div class="alert alert-success" id="success-alert">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ Session::get('supplierpayment') }}</strong>
                        </div>
                        @endif
                        <input id="primaryid" name="primary" type="hidden"/>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Supplier Name</label>
                                    <select id="supplier" name="supplier" class="form-control validate[required] SUPPLIER">
                                        <option disabled selected>Select Supplier</option>
                                        @foreach($supplier as $suppliers)
                                        <option value="{{$suppliers->SUPPLIER_ID}}">{{$suppliers->SUPPLIER_NAME}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Payment Mode</label>
                                    <select  id="paymentmode" class="form-control  validate[required] GETACCOUNTDETAILS"  name="paymentmode">
                                        <option disabled selected>Select Mode</option>
                                        <option>Cash</option>
                                        <option>Bank</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date Paid</label>
                                    <input id="datepaid" name="datepaid" class="form-control" type="date" placeholder="Date Paid"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Reference</label>
                                    <input id="reference" name="reference" class="form-control" placeholder="Reference"/>
                                </div>
                            </div>
                        </div>
                        <div class="row BANK">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Bank Name</label>
                                    <select id="bankname"  name="bankname" class="form-control BANKNAME">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Bank Account Title</label>
                                    <input id="accounttitle" name="accounttitle" class="form-control" placeholder="Title"/>
                                </div>
                            </div>
                        </div>
                        <div class="row BANK">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Account Number</label>
                                    <select id="accountnumber" name="accountnumber" class="form-control ACCOUNTNUMBER">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Cheque No</label>
                                    <input id="chequeno" name="chequeno" class="form-control BANK" placeholder="Checque"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Purchase Order Number</label>
                                    <select id="ponumber" name="ponumber" class="form-control">
                                        <option disabled selected>Select PO Number</option>
                                        @foreach($poNumber as $ponumber)
                                        <option>{{$ponumber->PO_NUMBER}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Amount Of Discount</label>
                                    <input id="discount" name="discountamount" class="form-control" placeholder="Discount Amount"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Amount Of Payment</label>
                                    <input id="paymentamount" name="paymentamount" class="form-control" placeholder="Payment Amount"/>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row position-right" style="text-align: end; margin: 6px">
                                <button type="button" class="btn btn-primary SAVE"><i class="icon-floppy-disk position-left"></i> Enter Payment</button>
                                <button type="button" class="btn btn-danger DELETE"><i class="icon-cross3 position-left"></i> Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="list">
                    <table id="datatable" class="table" data-code="supplierpayment"></table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('jsheader')
<script type="text/javascript" src="{{ asset('assets/js/Finance/supplierPayment.js') }}">
    </script>
@endsection