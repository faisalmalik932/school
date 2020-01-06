@extends('Template.master')
@section('menu-head', 'Finance')
@section('title', 'Branch Donors')
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
        <form method="GET"  action="{{ url('finance/donors/reports/branchwisereport') }}"  name="myForm" id="DATAFORM" enctype="multipart/form-data">
            @include('Template.Components.messages')
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Select </label>
                        <select class="form-control DROPDOWN" data-dropdown="BRANCH" id="branch" name="branch">
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
