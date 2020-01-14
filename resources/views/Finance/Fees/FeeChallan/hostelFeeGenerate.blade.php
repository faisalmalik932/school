@extends('Template.master')
@section('menu-head', 'Finance')
@section('title', 'Hostel Fee Generate')
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
                <li class="active"><a href="#form" data-toggle="tab">Hostel Fee Generate</a></li>
                <li><a href="#list" data-toggle="tab">Fee Generate List</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="form">
                    <form method="POST"  action="{{ url('finance/fees/generate-hostel-fee') }}"  name="myForm" id="DATAFORM" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @include('Template.Components.messages')
                        @if (Session::has('feegenerate'))
                        <div class="alert alert-success" id="success-alert">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ Session::get('feegenerate') }}</strong>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Challan No </label>
                                    <input class="form-control" readonly value="{{$challan}}"  id="challan" name="challan"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Hostel</label>
                                    <select class="form-control DROPDOWN validate[required] HOSTEL" data-dropdown="HOSTEL" id="hostel" name="hostel">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Student</label>
                                    <select class="form-control STUDENT validate[required]" name="student" id="student" >
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Month</label>
                                    <select class="form-control validate[required]" name="month" id="month">
                                        <option disabled selected>Select Month</option>
                                        <option>Jan-18</option>
                                        <option>Feb-18</option>
                                        <option>March-18</option>
                                        <option>Apr-18</option>
                                        <option>May-18</option>
                                        <option>June-18</option>
                                        <option>July-18</option>
                                        <option>Aug-18</option>
                                        <option>Sep-18</option>
                                        <option>Oct-18</option>
                                        <option>Nov-18</option>
                                        <option>Dec-18</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row position-right" style="text-align: end; margin: 6px">
                                <button type="button" class="btn btn-primary SAVE"><i class="icon-floppy-disk position-left"></i>Generate Fee</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="list">
                    <table id="datatable" class="table" data-code="feegenerate"></table>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('jsheader')
    <script type="text/javascript" src="{{ asset('assets/js/fees/hostelfeegenerate.js') }}">
    </script>
    @endsection
