@extends('Template.master')
@section('menu-head', 'Platform')
@section('title', 'Hostel Fee Allocation')
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
                <li class="active"><a href="#form" data-toggle="tab">Fee Allocation</a></li>
                <li><a href="#list" data-toggle="tab">Fees</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="form">
                    <form method="POST" action="{{ url('/finance/fees/allocate-hostel_fee') }}" name="myForm" id="DATAFORM"
                          enctype="multipart/form-data">
                        <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                        @include('Template.Components.messages')
                        @if (Session::has('feeallocate'))
                        <div class="alert alert-success" id="success-alert">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ Session::get('feeallocate') }}</strong>
                        </div>
                        @endif
                        <input id="primaryid" name="primary" type="hidden"/>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Hostel</label>
                                    <select id="hostel" class="form-control DROPDOWN HOSTEL  validate[required]" name="hostel" data-dropdown="HOSTEL">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Student</label>
                                    <select class="form-control STUDENT  validate[required]" id="student" name="student">
                                        <option disabled selected>Select Student</option>
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
                                <th>Sub Category</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <div class="panel-body">
                            <div class="row position-right" style="text-align: end; margin: 6px">
                                <button type="button" class="btn btn-primary SAVE"><i
                                        class="icon-floppy-disk position-left"></i> Save/Update
                                </button>
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
                                <h5 class="modal-title">Fee Categories/Sub-Categories</h5>
                            </div>
                            <form action="#" method="GET">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Category</label>
                                                <select class="form-control FEECATEGORY  validate[required]"
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
                    <table id="datatable" class="table" data-code="hostelfeeallocation"></table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('jsheader')
<script type="text/javascript" src="{{ asset('assets/js/fees/hostelfeeallocate.js') }}"></script>
@endsection