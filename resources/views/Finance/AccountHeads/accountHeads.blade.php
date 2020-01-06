@extends('Template.master')
@section('menu-head', 'Finance')
@section('title', 'GL Accounts')
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
                <li class="active"><a href="#form" data-toggle="tab">Add Account Head</a></li>
                <li><a href="#list" data-toggle="tab">Account Heads</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="form">
                    <form method="POST" action="{{ url('/finance/account-heads/add-account-head') }}" id="DATAFORM" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @include('Template.Components.messages')
                        @if (Session::has('accounthead'))
                        <div class="alert alert-success" id="success-alert">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ Session::get('accounthead') }}</strong>
                        </div>
                        @endif
                        <input id="primaryid" name="primary" type="hidden"/>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Account Class</label>
                                    <select  id="accountClass" class="form-control  validate[required] SEED  GETACCOUNTHEADS" name="accountClass" data-seed="CLASS_TYPE">
                                      
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Parent Account Head</label>
                                    <select id="accountheads" name="accountheads" class="form-control select-clear">
                                        <option disabled selected>Select Account Head</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-group-lg ">
                                    <label>Account Head</label>
                                    <input type="text" id="accounthead"  name="accounthead" class="form-control validate[required] "  placeholder="Account Head">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Account Head Code</label>
                                    <input type="text" class="form-control validate[required] ACCOUNTHEADCODE" name="accountcode" id="accountcode" placeholder="Account Head Code">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="content-group-lg">
                                    <label>Description</label>
                                    <input type="text" class="form-control" name="description" id="description" placeholder="Description">
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
                    <table id="datatable" class="table" data-code="accounthead"></table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jsheader')
<script type="text/javascript" src="{{ asset('js/finance/accountheads.js') }}">
</script>
@endsection