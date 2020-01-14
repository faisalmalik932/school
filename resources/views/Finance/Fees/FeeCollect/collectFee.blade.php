@extends('Template.master')
@section('menu-head', 'Finance')
@section('title', 'Collect Fee')
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
                <li><a  href="#list" data-toggle="tab"><i class="icon-cash mr-10"></i>Collect Fee</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane" id="list">
                    @if (Session::has('feecollect'))
                    <div class="alert alert-success" id="success-alert">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>{{ Session::get('feecollect') }}</strong>
                    </div>
                    @endif
                    <table class="table" id="datatables">
                        <thead>
                        <tr>
                            <th><input name="select_all" value="1" type="checkbox"></th>
                            <th>ID</th>
                            <th>Year</th>
                            <th>Month</th>
                            <th>Class</th>
                            <th>Challan No</th>
                            <th>Student Code</th>
                            <th>Student Name</th>
                            <th>Fee Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <form method="POST"  action="{{ url('finance/fees/collect-fee') }}"  name="myForm" id="DATAFORM" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input id="primaryid" name="primary[]" type="hidden"/>
                        <div class="panel-body">
                            <div class="row position-right" style="text-align: end; margin: 6px">
                                <button type="button" id="button" class="btn btn-primary SAVE"><i class="icon-floppy-disk position-left"></i>Mark Collect</button>
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
<script type="text/javascript" src="{{ asset('assets/js/fees/feecollect.js') }}">
</script>
@endsection