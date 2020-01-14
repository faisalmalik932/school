@extends('Template.master')
@section('menu-head', 'Human Resource')
@section('title', 'Salary Categories')
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
                <li class="active"><a href="#form" data-toggle="tab">Add Salary Categories</a></li>
                <li><a href="#list" data-toggle="tab">Categories</a></li>
            </ul>
            <div class="tab-content" id="tabcontrol">
                <div class="tab-pane active" id="form">
                    <form method="POST" action="{{ url('/hr/settings/addsalarycategories') }}" id="DATAFORM" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @include('Template.Components.messages')
                        @if (Session::has('salarycategory'))
                        <div class="alert alert-success" id="success-alert">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ Session::get('salarycategory') }}</strong>
                        </div>
                        @endif
                        <input id="primaryid" name="primary" type="hidden"/>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Add Category</label>
                                    <input type="text" maxlength="45" name="category" id="category"  class="form-control ALPHA validate[required]" placeholder="Category"/>
                                </div>
                                <label>Type</label>
                                        <select class="form-control validate[required]" id="type" name="type">
                                            <option disabled selected>Select Type</option>
                                            <option value="Earning">Earning</option>
                                            <option value="Deduction">Deduction</option>
                                        </select>
                            </div>
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Description</label>
                                    <input type="text" maxlength="45" name="description" id="description"  class="form-control  validate[required]" placeholder="Description"/>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row position-right" style="text-align: end; margin: 6px">
                                <button type="button" class="btn btn-primary {{__('button.reset-reset')}} "><i class="{{__('button.reset-icon')}} {{__('button.reset-class')}} "></i>{{__('button.reset-text')}}</button>
                                <button type="button" class="btn btn-primary SAVE"><i class="icon-floppy-disk position-left"></i> Save/Update</button>
                                <button type="button" class="btn btn-danger DELETE"><i class="icon-cross3 position-left"></i> Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="list">
                    <table id="datatable" class="table" data-code="salarycategory"></table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jsheader')
<script  type="text/javascript" src="{{ asset('assets/js/hr/entitlement.js') }}"></script>
@endsection





