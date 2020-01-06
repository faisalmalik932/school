@extends('Template.master')
@section('menu-head', 'Finance')
@section('title', 'Branch Wise Detail Fee Bills')
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
        <form method="GET"  action="{{ url('finance/fees/reports/branchfeebillsdetailreport') }}"  name="myForm" id="DATAFORM" enctype="multipart/form-data">
            @include('Template.Components.messages')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Select Branch </label>
                        <select class="form-control DROPDOWN BRANCH" data-dropdown="BRANCH" id="branch" name="branch">
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label> Class</label>
                        <select  class="form-control  CLASS" id="classname"  name="classname">
                            <option disabled selected>Select Class</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Year</label>
                        <select class="form-control" id="year" name="year">
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
                    <button type="submit" class="btn btn-primary"><i class="icon-floppy-disk position-left"></i> Search</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('jsheader')
<script type="text/javascript" src="{{ asset('js/fees/feegenerate.js') }}">
</script>
@endsection
