@extends('Template.master')
@section('menu-head', 'HR')
@section('title', 'Employee Profile Search')
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
                    <form method="GET"  action="{{ url('hr/profile/getprofile') }}"  name="myForm" id="DATAFORM" enctype="multipart/form-data">
                        <!--<input id="primaryid" name="primary" type="hidden"/>-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Employee Name</label>
                                    <select name="employee" id="employee" class="form-control select-search" required>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row position-right" style="text-align: end; margin: 6px">
                                <button type="submit" id="button" class="btn btn-primary"><i class="icon-floppy-disk position-left"></i> Search Profile</button>
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
<script type="text/javascript" src="{{ asset('js/hr/employeeprofile.js') }}">
</script>
<script  type="text/javascript" src="{{ asset('js/hr/validation.js') }}"></script>

@endsection