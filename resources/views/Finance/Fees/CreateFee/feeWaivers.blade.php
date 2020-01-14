@extends('Template.master')
@section('menu-head', 'Finance')
@section('title', 'Fee Waivers')
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
                <li class="active"><a href="#form" data-toggle="tab">Fee waivers</a></li>
                <li><a href="#list" data-toggle="tab">Fee Waivers List</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="form">
                    <form method="POST" action="{{ url('/finance/fees/add-waivers') }}" id="DATAFORM" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @include('Template.Components.messages')
                        @if (Session::has('feewaiver'))
                        <div class="alert alert-success" id="success-alert">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ Session::get('feewaiver') }}</strong>
                        </div>
                        @endif
                        <input id="primaryid" name="primary" type="hidden"/>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Waiver Category</label>
                                    <select  id="waivercategory"   name="category" class="form-control validate[required] WAIVER">
                                        <option disabled selected>Select Category</option>
                                        <option>Exemption</option>
                                        <option>Deduction</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Student Category</label>
                                    <select  id="studentcategory"  name="studentcategory" class="form-control SEED validate[required]" data-seed="CONCESSION_TYPE">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary ADD" data-toggle="modal" data-target="#modal_form_vertical" style="height: 33px; float: right">Add Categories</button>
                        </div>
                        <input id="tabledata" name="tabledata" type="hidden" value="" />
                        <table class="table" id="datatables">
                            <thead>
                            <tr>
                                <th>Fee Category</th>
                                <th>Fee SubCategory</th>
                                <th>Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <div class="panel-body">
                            <div class="row position-right" style="text-align: end; margin: 6px">
                                <button type="button" class="btn btn-primary SAVE"><i class="icon-floppy-disk position-left"></i> Save/Update</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="modal_form_vertical" class="modal fade" tabindex="-1" role="dialog"
                     aria-labelledby="myModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">Fee Categories</h5>
                            </div>
                            <form action="#" method="GET">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Category</label>
                                                <select class="form-control FEECATEGORY"
                                                        id="feecategory" name="feecategory">
                                                    <option disabled selected>Select Fee Category</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Sub Category</label>
                                                <select class="form-control SUBCATEGORY  validate[required]"
                                                        id="feesubcategory" name="feesubcategory">
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Amount</label>
                                                <input class="form-control AMOUNT"
                                                        id="amount" name="amount" placeholder="%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                    <button type="button" id="dataform" class="btn btn-primary">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="list">
                    <table id="datatable" class="table" data-code="feewaivers"></table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('jsheader')
<script  type="text/javascript" src="{{ asset('assets/js/fees/feewaivers.js') }}"></script>
@endsection