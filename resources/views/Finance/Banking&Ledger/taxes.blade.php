@extends('Template.master')
@section('menu-head', 'Finance')
@section('title', 'Taxes')
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
                <li class="active"><a href="#form" data-toggle="tab">Tax Types</a></li>
                <li><a href="#list" data-toggle="tab">Taxes</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="form">
                    <form method="POST" action="{{ url('/finance/taxes/add-tax-type') }}" id="DATAFORM" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @include('Template.Components.messages')
                        @if (Session::has('tax'))
                        <div class="alert alert-success" id="success-alert">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ Session::get('tax') }}</strong>
                        </div>
                        @endif
                        <input id="primaryid" name="primary" type="hidden"/>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Description</label>
                                    <input type="text" id="description" class="form-control  validate[required]"  name="description" placeholder="Description">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Default Rate</label>
                                    <input type="text" id="defaultrate"   name="defaultrate" class="form-control"   placeholder="%" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Sales GL Account</label>
                                    <select  id="salesaccount"  class="form-control  validate[required]"  name="salesaccount">
                                        <option disabled selected>Select Account</option>
                                        @foreach($accountheads as $accounthead)
                                        <optgroup label="{{$accounthead->ACCOUNT_HEADS}}">
                                            <option value="{{$accounthead->ACCOUNT_HEADS}}">{{$accounthead->ACCOUNT_HEAD_NUMBER}} {{$accounthead->ACCOUNT_HEADS}}</option>
                                        </optgroup>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Purchase GL Account</label>
                                    <select  id="purchaseaccount"   name="purchaseaccount" class="form-control">
                                        <option disabled selected>Select Account</option>
                                        @foreach($accountheads as $accounthead)
                                        <optgroup label="{{$accounthead->ACCOUNT_HEADS}}">
                                            <option value="{{$accounthead->ACCOUNT_HEADS}}">{{$accounthead->ACCOUNT_HEAD_NUMBER}} {{$accounthead->ACCOUNT_HEADS}}</option>
                                        </optgroup>
                                        @endforeach
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
                    <table id="datatable" class="table" data-code="taxtype"></table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection