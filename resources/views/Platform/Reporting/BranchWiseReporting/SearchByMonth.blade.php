@extends('Template.master')
@section('menu-head', 'HR')
@section('title', ' Search')
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
                    <form method="GET"  action="{{ url('platform/reports/branchreport') }}"  name="myForm" id="DATAFORM" enctype="multipart/form-data">
                        <!--<input id="primaryid" name="primary" type="hidden"/>-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Branch Name</label>
                                    <select name="branch" id="branchId" class="form-control select-search DROPDOWN" data-dropdown="BRANCH">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <input type="date" name="startdate" id="startdate" class="form-control"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>End Date</label>
                                    <input type="date" name="enddate" id="enddate" class="form-control"/>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row position-right" style="text-align: end; margin: 6px">
                                <button type="submit" id="button" class="btn btn-primary"><i class="icon-floppy-disk position-left"></i> Search</button>
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
@endsection