@extends('Template.master')
@section('menu-head', 'Finance')
@section('title', 'Branch Wise Concession')
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
        <form method="GET"  action="{{ url('finance/fees/reports/branchfeeconcessionreport') }}"  name="myForm" id="DATAFORM" enctype="multipart/form-data">
            @include('Template.Components.messages')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Select Branch </label>
                        <select class="form-control DROPDOWN" data-dropdown="BRANCH" id="branch" name="branch">
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="content-group-lg">
                        <label>Year</label>
                        <select  id="year" class="form-control  validate[required]"  name="year">
                            <option disabled selected>Select Year</option>
                            <option>2017</option>
                            <option>2018</option>
                            <option>2019</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Select Month </label>
                        <select class="form-control"  id="month" name="month">
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
<script type="text/javascript" src="{{ asset('') }}">
</script>
@endsection
