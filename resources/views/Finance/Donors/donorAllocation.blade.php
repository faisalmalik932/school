@extends('Template.master')
@section('menu-head', 'Finance')
@section('title', 'Donor Allocation')
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
                <li class="active"><a href="#form" data-toggle="tab">Donor Allocation</a></li>
                <li><a href="#list" data-toggle="tab">Donors</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="form">
                    <form method="POST" action="{{ url('/finance/donors/allocate-donor') }}" name="myForm" id="DATAFORM" enctype="multipart/form-data" >
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
                                    <label>Branch</label>
                                    <select  id="branch" class="form-control validate[required] DROPDOWN BRANCH"  name="branch" data-dropdown="BRANCH">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Class</label>
                                    <select  class="form-control validate[required] CLASS SEED" id="class"  name="class" data-seed="CLASSES">
                                        <option disabled selected>Select Class</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Donor Name</label>
                                    <select  id="donorname" class="form-control  validate[required]"  name="donor">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                        <label> Student</label>
                                        <select  class="form-control validate[required] select  STUDENT" id="student"  name="student[]" multiple="multiple">
                                        </select>
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
                    <table id="datatable" class="table" data-code="donorallocation"></table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('jsheader')
<script  type="text/javascript" src="{{ asset('assets/js/donors/donors.js') }}"></script>
@endsection