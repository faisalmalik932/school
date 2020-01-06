@extends('Template.master')
@section('menu-head', 'Finance / Vouchers')
@section('title', 'Voucher Heads')
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
                <li class="active"><a href="#form" data-toggle="tab">Add Voucher Head</a></li>
                <li><a href="#list" data-toggle="tab">Voucher Heads List</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="form">
                    <form method="POST" action="{{ url('/finance/vouchers/add-voucher-head') }}" id="DATAFORM" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @include('Template.Components.messages')
                        @if (Session::has('voucherhead'))
                        <div class="alert alert-success" id="success-alert">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ Session::get('voucherhead') }}</strong>
                        </div>
                        @endif
                        <input id="primaryid" name="primary" type="hidden"/>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Voucher Head</label>
                                    <input type="text" id="voucherheader" class="form-control  validate[required]" maxlength="64" pattern="^[A-Za-z -]+$" name="voucherheader" placeholder="Voucher Head Name" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>GL Account</label>
                                    <select  id="glaccount"   name="glaccount" class="form-control">
                                        <option disabled selected>Select GL Account</option>
                                       {!! $accountheads !!}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Voucher Type</label>
                                    <select  id="vouchertype"   name="vouchertype" class="form-control validate[required] SEED" data-seed="VOUCHER_TYPE">
                                        <option disabled selected>Select Voucher Type</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Voucher Status</label>
                                    <select  id="voucherstatus" name="voucherstatus" class="form-control SEED" data-seed="STATUS">
                                        <option disabled selected>Select Status</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row position-right" style="text-align: end; margin: 6px">
                                <button type="button" class="btn btn-primary SAVE"><i class="icon-floppy-disk position-left"></i> Save/Update</button>
                                <button type="button" class="btn btn-danger DELETE"><i class="icon-cross3 position-left"></i> Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="list">
                    <table id="datatable" class="table" data-code="voucherheads"></table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection