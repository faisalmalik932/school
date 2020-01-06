@extends('Template.master')
@section('menu-head', 'Finance')
@section('title', 'General Ledger')
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
        <form method="GET"  action="{{ url('finance/reports/generalledgerreport') }}"  name="myForm" id="DATAFORM" enctype="multipart/form-data">
            @include('Template.Components.messages')
            @if (Session::has('ledger'))
                            <div class="alert alert-success" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong>{{ Session::get('ledger') }}</strong>
                            </div>
                            @endif
            <div class="row">
                <div class="col-md-6">
                    <label>Start Date</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                        <input type="date" name="startdate" class="form-control validate[required]">
                    </div>
                </div>
                <div class="col-md-6">
                    <label>End Date</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                        <input type="date" name="enddate" class="form-control validate[required]">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="content-group-lg">
                        <label>Account Heads</label>
                        <select  id="accountheads"  name="accountheads" class="form-control select-search ACCOUNT">
                            <option disabled selected>Select Account Head</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row position-right" style="text-align: end; margin: 6px">
                    <button type="submit" class="btn btn-primary"><i class="icon-floppy-disk position-left"></i>Print Ledger</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('jsheader')
<script type="text/javascript" src="{{ asset('js/Finance/ledgerReport.js') }}">
</script>
@endsection
