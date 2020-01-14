@extends('Template.master')
@section('menu-head', 'Fee')
@section('title', 'Edit Fee Structure')
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
                <li class="active"><a href="#form" data-toggle="tab">Search Challan</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane  active" id="form">
                    <form method="GET" action="{{ url('/finance/fees/fee-structure-details') }}" id="DATAFORM" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @include('Template.Components.messages')
                        @if (Session::has('feechallan'))
                        <div class="alert alert-success" id="success-alert">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ Session::get('feechallan') }}</strong>
                        </div>
                        @endif
                        <input id="primaryid" name="primary" type="hidden"/>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Branch Name</label>
                                    <select  id="branch" name="branch" class="form-control validate[required] DROPDOWN BRANCH" data-dropdown="BRANCH">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Class</label>
                                    <select id="class" class="form-control validate[required] SEED CLASS" data-seed="CLASSES"  name="class">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Fiscal Year</label>
                                    <select  id="fiscalYear" class="form-control  validate[required]"  name="fiscalYear">
                                        <option disabled selected>Select Year</option>
                                       @foreach($fiscalYear as $year)
                                        <option value="{{ $year['FISCAL_YEAR_ID'] }}" >{{ $year['START_DATE'] }} To {{ $year['END_DATE'] }}</option>
                                        @endforeach
                                       <!--  <option>2017</option>
                                        <option>2018</option>
                                        <option>2019</option> -->
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row position-right" style="text-align: end; margin: 6px">
                                <button type="button" class="btn btn-primary {{__('button.reset-reset')}}"><i class="{{__('button.reset-icon')}} {{__('button.reset-class')}} "></i>{{__('button.reset-text')}}</button>
                                <button type="submit" class="btn btn-primary"><i class="icon-floppy-disk position-left"></i>Search</button>
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
<script type="text/javascript" src="{{ asset('assets/js/fees/feegenerate.js') }}">
</script>
@endsection