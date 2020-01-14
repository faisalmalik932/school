@extends('Template.master')
@section('menu-head', 'Finance')
@section('title', 'Fee Defaulters')
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
        <form method="GET" action="" id="DATAFORM" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include('Template.Components.messages')
            <div class="alert alert-success" id="success-alert">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{{ Session::get('feefine') }}</strong>
            </div>
            @endif
            <input id="primaryid" name="primary" type="hidden"/>
            <div class="row">
                <div class="col-md-6">
                    <div class="content-group-lg">
                        <label> Select Branch</label>
                        <select  id="batch" class="form-control  validate[required]" >
                            <option>Select Branch</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="content-group-lg">
                        <label>Select Batch</label>
                        <select id="batch"   name="batch" class="form-control" >
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="content-group-lg">
                        <label>Select Class</label>
                        <select id="class"   name="class" class="form-control" >
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="content-group-lg">
                        <label>Select Student</label>
                        <select id="student"   name="student" class="form-control" >
                        </select>
                    </div>
                </div>

            </div>
            <div class="panel-body">
                <div class="row position-right" style="text-align: end; margin: 6px">
                    <button type="reset" id="button" class="btn btn-primary"><i class="icon-floppy-disk position-left"></i> Search</button>
                </div>
            </div>
        </form>
        <div class="dataTable_wrapper">
            <table width="100%" class=" simple-table responsive-table" id="dataTables">
                <thead>
                <tr>
                    <th>Defaulter Name</th>
                    <th>Month</th>
                    <th>Class</th>
                    <th>Section</th>
                    <th>Mobile</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('jsheader')
<script type="text/javascript" src="{{ asset('assets/js/fees/feedefaulter.js') }}"></script>
@endsection
