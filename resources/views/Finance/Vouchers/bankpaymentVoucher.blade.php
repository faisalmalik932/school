@extends('Template.master')
@section('menu-head', 'Finance / Vouchers')
@section('title', 'Bank Payment Voucher')
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
                <li class="active"><a href="#form" data-toggle="tab">Bank Payment Voucher</a></li>
                <li><a href="#list" data-toggle="tab">Vouchers</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="form">
                    <form method="POST" action="{{ url('/finance/vouchers/add-bank-payment-voucher') }}" id="DATAFORM" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @include('Template.Components.messages')
                        @if (Session::has('createvoucher'))
                        <div class="alert alert-success" id="success-alert">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ Session::get('createvoucher') }}</strong>
                        </div>
                        @endif
                        <div id = "alert_placeholder"></div>
                        <input id="primaryid" name="primary" type="hidden"/>
                        <div class="row">
                            <div class="col-md-6">
                                <div  class="content-group-lg">
                                    <label>Transaction Code</label>
                                    <input type="text" readonly value="{{$code}}" id="transactioncode" class="form-control CODE"  name="transactioncode" placeholder="Transaction Code">
                                </div>
                            </div>  
                            <div class="col-md-6">
                                <label>Transaction Date</label>
                                <div class="input-group"">
                                    <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                    <input type="date" readonly id="transactiondate" class="form-control  validate[required]"  name="transactiondate" value="<?php echo date("Y-m-d"); ?>" placeholder="Transaction Date">
                                </div>
                            </div>
                        </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="content-group-lg">
                            <label>Description</label>
                            <input type="text" id="DESCRIPTION" name="DESCRIPTION" class="form-control"  name="description" placeholder="Description">
                        </div>
                    </div>
                    <div style="display: none;" class="col-md-6 ">
                        <div class="content-group-lg collectiveSelect">                            
                            {!! Form::select('BANK_ID[]', $banks , null, ['id' => 'BANK_ID', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="content-group-lg">
                            <label>Cheque No</label>
                            <input class="form-control validate[required]" id="chequeno" name="chequeno" placeholder="Cheque No">
                        </div>
                    </div>
                </div>
                <div class="row FIRST">
                    <div style="display: none;" class="col-md-2">
                        <div  class="content-group-lg">
                            <label>Transaction Code</label>
                            <input type="text" readonly value="{{$code}}" id="transactioncode" class="form-control CODE"  name="transactioncode" placeholder="Transaction Code">
                        </div>
                    </div>
                    <div style="display: none;" class="col-md-3">
                        <div class="content-group-lg">
                            <label>Ledger Account</label>
                            <select  id="ledgeraccount"   name="ledgeraccount" class="form-control select-search selectDropdownVal">
                                <option disabled selected>Select Ledger Account</option>
                                 {!! $accountHeads !!}
                            </select>
                        </div>
                    </div>
                    <!-- div style="display: none;" class="col-md-2">
                        <div class="content-group-lg">
                            <label>Debit Amount</label>
                            <input type="text"  id="debitamount"  class="form-control DEBITAMOUNT"  name="debitamount" placeholder="Amount">
                        </div>
                    </div>
                    <div style="display: none;" class="col-md-2">
                        <div class="content-group-lg">
                            <label>Bank Account</label>
                            <select  id="bankaccount"   name="bankaccount" class="form-control  BANKACCOUNT">
                                <option disabled selected>Select  Account</option>
                            </select>
                        </div>
                    </div> -->
                    <!-- <div style="display: none;" class="col-md-2">
                        <div class="content-group-lg">
                            <label>Credit Amount</label>
                            <input type="text"  id="creditamount"  class="form-control CREDITAMOUNT"  name="creditamount" placeholder="Amount">
                        </div>
                    </div> -->
                    <!--<div class="col-md-1"><div class="input-group-btn"><button class="btn btn-success PLUS" type="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button></div></div>-->
                </div>
                        <div id="detailheader" class="row" style="border-bottom: 1px solid #000; margin-top: 10px">
                        <div class="col-md-2"><label>GL Code</label></div>
                        <div class="col-md-4"><lable>GL Account</label></div>
                        <div class="col-md-3"><label>Bank</label></div>
                        <!-- <div class="col-md-2"><label>Bank Account</label></div> -->
                        <div class="col-md-1" style="text-align: right; padding-right: 15px"><label>Debit Amount</label></div>
                        <div class="col-md-1" style="text-align: right; padding-right: 15px"><label>Credit Amount</label></div>
                        <div class="col-md-1"><label>Action</label></div>
                    </div>
                    <section id="detailbody" class="detailbody1"></section>
                    <div id="detailFooter" class="row" style="border-top: 1px solid #000; margin-top: 10px">
                        <div class="col-md-9"></div>
                        <div class="col-md-1" style="text-align: right; padding-right: 24px"><label id="debit-total">0.00</label></div>
                        <div class="col-md-1" style="text-align: right; padding-right: 24px"><label id="credit-total">0.00</label></div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="row">
                        <div class="panel-body">
                            <div class="row position-right" style="text-align: end; margin: 6px">
                                <button type="button" class="btn btn-primary {{__('button.reset-reset')}}"><i
                                            class="{{__('button.reset-icon')}} {{__('button.reset-class')}} "></i>{{__('button.reset-text')}}
                                </button>
                                <button type="button" id="button" class="btn btn-primary JVSAVE"><i
                                            class="icon-floppy-disk position-left"></i> Save/Update
                                </button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="tab-pane" id="list">
                        <table id="datatable" class="table" data-code="createbankvoucher"></table>
                    </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('jsheader')
<!-- <script  type="text/javascript" src="{{ asset('js/finance/bankpaymentvoucher.js') }}"></script> -->
<script  type="text/javascript" src="{{ asset('js/finance/bankvoucher.js') }}"></script>
<!-- <script type="text/javascript" src="{{ asset('js/finance/createvoucher.js') }}"></script> -->

@endsection