@extends('Template.master')
@section('menu-head', 'Finance / Vouchers')
@section('title', 'Journal Voucher')
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
                    <li class="active"><a href="#form" data-toggle="tab"><i class="icon-cash2 mr-10"></i>Journal Voucher</a>
                    </li>
                    <li><a href="#list" data-toggle="tab"><i
                                    class="zmdi zmdi-view-day zmdi-hc-lg mr-10"></i>Vouchers</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="form">
                        <form method="POST" action="{{ url('/finance/vouchers/add-voucher') }}" id="DATAFORM" class="form-horizontal" name= "form" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @include('Template.Components.messages')
                            @if (Session::has('createvoucher'))
                                <div class="alert alert-success" id="success-alert">
                                    <button type="button" class="close" data-dismiss="alert">x</button>
                                    <strong>{{ Session::get('createvoucher') }}</strong>
                                </div>
                            @endif
                            <div id="alert_placeholder"></div>
                            <input id="primaryid" name="primary" type="hidden"/>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="content-group-lg">
                                        <label>Journal Voucher Number</label>
                                        <input type="text" readonly value="{{$code}}" id="transactioncode"
                                               class="form-control CODE" name="transactioncode"
                                               placeholder="Transaction Code">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Transaction Date</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                        <input type="date" id="transactiondate" readonly class="form-control  validate[required]"
                                               name="transactiondate" value="<?php echo date("Y-m-d"); ?>"
                                               placeholder="Transaction Date">

                                    </div>
                                    <!-- <input id="tabledata" name="tabledata" type="hidden" value=""/> -->
                                </div>
                            </div>
                            <div id="detailheader" class="row" style="border-bottom: 1px solid #000; margin-top: 10px">
                                <div class="col-md-2"><label>GL Code</label></div>
                                <div class="col-md-4"><label>GL Account</label></div>
                                <div class="col-md-1" style="text-align: right; padding-right: 15px"><label>Debit Amount</label></div>
                                <div class="col-md-1" style="text-align: right; padding-right: 15px"><label>Credit Amount</label></div>
                                <div class="col-md-3"><label>Memo</label></div>
                                <div class="col-md-1"><label>Action</label></div>
                            </div>
                            <section id="detailbody" class="detailbody1"></section>
                            <div id="detailFooter" class="row" style="border-top: 1px solid #000; margin-top: 10px">
                                <div class="col-md-6"></div>
                                <div class="col-md-1" style="text-align: right; padding-right: 24px"><label id="debit-total">0.00</label></div>
                                <div class="col-md-1" style="text-align: right; padding-right: 24px"><label id="credit-total">0.00</label></div>
                                <div class="col-md-4"></div>
                            </div>
                            <div class="row">
                                
                                <div class="panel-body">
                                    <div class="row position-right" style="text-align: end; margin: 6px">
                                        <button type="button" class="btn btn-primary {{__('button.reset-reset')}}"><i
                                                    class="{{__('button.reset-icon')}} {{__('button.reset-class')}} "></i>{{__('button.reset-text')}}
                                        </button>
                                        <button type="button" id="button" target="_blank" class="btn btn-primary JVSAVE"><i class="icon-floppy-disk position-left"></i> Save/Update
                                        </button>
                                    </div>
                                </div>
                                
                            </div>
                        <div style="display: none;">
                            <select  id="ledgeraccount"   name="ledgeraccount" class="form-control select-search selectDropdownVal">
                                <option disabled selected>Select Ledger Account</option>
                                <option>{!! $accountheads !!}</option>
                            </select>
                        </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="list">
                        <table id="datatable" class="table" data-code="createvoucher"></table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('jsheader')
    <script type="text/javascript" src="{{ asset('assets/js/finance/createvoucher.js') }}"></script>
@endsection