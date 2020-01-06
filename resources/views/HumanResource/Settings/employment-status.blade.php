@extends('Template.master')
@section('menu-head', 'Humane Resource / Settings')
@section('title', 'Employment Status')
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
                <li class="active"><a href="#form" data-toggle="tab">Manage Employee Status</a></li>
                <li><a href="#list" data-toggle="tab">Employment Status List</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="form">
                    <form method="POST" action="{{ url('/hr/settings/add-status') }}" name="myForm" id="DATAFORM" enctype="multipart/form-data" >
                        {{ csrf_field() }}
                        @include('Template.Components.messages')
                        @if (Session::has('status'))
                        <div class="alert alert-success" id="success-alert">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ Session::get('status') }}</strong>
                        </div>
                        @endif
                        <input id="primaryid" name="primary" type="hidden"/>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Job Status Name</label>
                                    <input type="text" id="jobstatus" pattern="^[A-Za-z -]+$" class="form-control  validate[required] ALPHA" name="job_status" maxlength="60" Placeholder="Job Status Name" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Description</label>
                                    <input type="text" id="description" class="form-control  validate[required]" pattern="^[A-Za-z -]+$" maxlength="300" name="description" placeholder="Description" >
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
                    <table id="datatable" class="table" data-code="employment-status"></table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection