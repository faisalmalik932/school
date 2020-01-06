@extends('Template.master')
@section('menu-head', 'Finance')
@section('title', 'Create Particulars')
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
                <li class="active"><a href="#form" data-toggle="tab">Add Particular</a></li>
                <li><a href="#list" data-toggle="tab">Fee Particulars</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="form">
                    <form method="POST" action="{{ url('/finance/fees/add-particulars') }}" id="DATAFORM" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @include('Template.Components.messages')
                        @if (Session::has('feeparticular'))
                        <div class="alert alert-success" id="success-alert">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ Session::get('feeparticular') }}</strong>
                        </div>
                        @endif
                        <input id="primaryid" name="primary" type="hidden"/>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Fee Header</label>
                                    <select  id="feeheader"   name="feeheader" class="form-control SEED FEEHEADER" data-seed="FEE_CATEGORY_TYPE" data-dropdown-child="FEECATEGORY">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Fee Category</label>
                                    <select  id="category"   name="category" class="form-control FEECATEGORY">
                                        <option>Select Category</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Particular Name</label>
                                    <input type="text" id="particularName" class="form-control  validate[required]"  name="particularname" placeholder="Name" maxlength="20">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Description</label>
                                    <input type="text" id="description"   name="description" class="form-control validate[required,maxSize[100]]"   placeholder="Description" >
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
                    <table id="datatable" class="table" data-code="feeparticulars"></table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jsheader')
<script  type="text/javascript" src="{{ asset('js/fees/feecategory.js') }}"></script>
@endsection