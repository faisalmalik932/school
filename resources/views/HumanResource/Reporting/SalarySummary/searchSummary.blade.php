@extends('Template.master')
@section('menu-head', 'HR')
@section('title', 'Search Payslip Summary')
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
                <li class="active"><a href="#form" data-toggle="tab">Search</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="form">
                    <form method="GET"  action="{{ url('hr/reports/salarysummary') }}"  name="myForm" id="DATAFORM" enctype="multipart/form-data">
                        <!--<input id="primaryid" name="primary" type="hidden"/>-->
                        @include('Template.Components.messages')
                        @if (Session::has('salary'))
                            <div class="alert alert-success" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong>{{ Session::get('salary') }}</strong>
                            </div>
                            @endif
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Select Year </label>
                                    <select class="form-control"  id="year" name="year">
                                        <option disabled selected>Select Year</option>
                                        <option>2017</option>
                                        <option>2018</option>
                                        <option>2019</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row position-right" style="text-align: end; margin: 6px">
                                <button type="submit" id="button" class="btn btn-primary"><i class="icon-floppy-disk position-left"></i> Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jsheader')
@endsection