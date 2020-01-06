@extends('Template.master')
@section('menu-head', 'Finance')
@section('title', 'Hostel Fee Challan')
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
                <li class="active"><a href="#form" data-toggle="tab">Hostel Fee Challan</a></li>
                <li><a href="#list" data-toggle="tab">Fee Challan List</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="form">
                    <form method="POST"  action="{{ url('finance/fees/hostel-fee-challan') }}"  name="myForm" id="DATAFORM" enctype="multipart/form-data">
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
                                    <label class="text-semibold">Year </label>
                                    <select class="form-control validate[required]"   id="year" name="year">
                                        <option disabled selected>Select Year</option>
                                        @foreach($fiscalYear as $year)
                                        <option value="{{ $year['year'] }}" >{{ $year['START_DATE'] }} {{ $year['END_DATE'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-semibold">Month</label>
                                    <select class="form-control validate[required]" name="month" id="month">
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
                                    <label>Select Hostel</label>
                                    <select class="form-control DROPDOWN validate[required] HOSTEL" data-dropdown="HOSTEL" id="hostel" name="hostel">
                                    </select>
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-semibold">Student</label>
                                    <select class="form-control STUDENTS  validate[required]" name="student" id="student">
                                    </select>
                                </div>
                            </div>
                        </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-semibold">Class</label>
                                    <select class="form-control CLASS  validate[required]" name="class" id="class" data-seed="CLASSES">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row position-right" style="text-align: end; margin: 6px">
                                <button type="button" class="btn btn-primary {{__('button.reset-reset')}}"><i class="{{__('button.reset-icon')}} {{__('button.reset-class')}} "></i>{{__('button.reset-text')}}</button>
                                <button type="button" class="btn btn-primary SAVE"><i class="icon-floppy-disk position-left"></i>Hostel Fee Challan</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="list">
                    <table id="datatable" class="table" data-code="hostelfee"></table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jsheader')
<script type="text/javascript" src="{{ asset('js/fees/hostelfeegenerate.js') }}">
</script>
@endsection
