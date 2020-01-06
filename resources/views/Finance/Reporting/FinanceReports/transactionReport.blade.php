@extends('template.master')
@section('menu-head', 'Finance')
@section('title', 'Transaction Report')
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
            <input id="primaryid" name="primary" type="hidden"/>
            <div class="row">
                <div class="col-md-6">
                    <div class="content-group-lg">
                        <label> Start Date</label>
                        <input type="date" class="form-control" id="startdate" name="startdate">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="content-group-lg">
                        <label> End Date</label>
                        <input type="date" class="form-control" id="enddate" name="enddate">
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row position-right" style="text-align: end; margin: 6px">
                    <button type="reset" id="button" class="btn btn-primary"><i class="icon-floppy-disk position-left"></i> Search</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection