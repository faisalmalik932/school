@extends('Template.master')
@section('menu-head', 'Humane Resource / Leaves')
@section('title', 'Leave Types')
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
                <li class="active"><a href="#form" data-toggle="tab">Leave Types</a></li>
                <li><a href="#list" data-toggle="tab">Leaves</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="form">
                    <form method="POST" action="{{ url('/hr/leaves/add') }}" name="myForm" id="DATAFORM" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @include('Template.Components.messages')
                        @if (Session::has('leavetype'))
                        <div class="alert alert-success" id="success-alert">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ Session::get('leavetype') }}</strong>
                        </div>
                        @endif
                        <input id="primaryid" name="primary" type="hidden"/>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Leave Type</label>
                                    <select class="form-control SEED validate[required]" id="leavetype" name="leavetype" data-seed="LEAVE_TYPE">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Leave  Allowed</label>
                                    <input  id="leaves" name="leaves" class="form-control validate[required]" placeholder="Days"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Salary Deduction (Per Day)</label>
                                    <input type="text" id="salarydeduction"  class="form-control  validate[required]" name="salarydeduction" placeholder="Days" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Deduction Amount Per Day</label>
                                    <input type="text" id="deductionamount" class="form-control"  name="deductionamount" placeholder="Amount">
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
                    <table id="datatable" class="table" data-code="leavetypes"></table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection