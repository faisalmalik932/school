@extends('Template.master')
@section('menu-head', 'HR')
@section('title', 'Print Employee Payslip')
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
                    <form method="GET"  action="{{ url('hr/reports/payslipreport') }}"  name="myForm" id="DATAFORM" enctype="multipart/form-data">
                        @include('Template.Components.messages')
                            @if (Session::has('payslip'))
                            <div class="alert alert-success" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong>{{ Session::get('payslip') }}</strong>
                            </div>
                            @endif
                        <!--<input id="primaryid" name="primary" type="hidden"/>-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Year </label>
                                    <select class="form-control validate[required]"  id="year" name="year">
                                        <option disabled selected>Select Year</option>
                                        <option>2017</option>
                                        <option>2018</option>
                                        <option>2019</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label> Month</label>
                                    <select class="form-control validate[required]"  id="month" name="month">
                                        <option disabled selected>Select Month</option>
                                        <option>JAN</option>
                                        <option>FEB</option>
                                        <option>MAR</option>
                                        <option>APR</option>
                                        <option>MAY</option>
                                        <option>JUN</option>
                                        <option>JUL</option>
                                        <option>AUG</option>
                                        <option>SEP</option>
                                        <option>OCT</option>
                                        <option>NOV</option>
                                        <option>DEC</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Employee Name</label>
                                    <select name="employee[]" id="employee" class="form-control select" multiple="multiple" required>
                                        <option disabled selected>Select Employee</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row position-right" style="text-align: end; margin: 6px">
                                <button type="submit" id="button" class="btn btn-primary"><i class="icon-floppy-disk position-left"></i>Print Payslip</button>
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
<script type="text/javascript" src="{{ asset('assets/js/hr/employeepayslip.js') }}">
</script>
<script  type="text/javascript" src="{{ asset('assets/js/hr/validation.js') }}"></script>
@endsection