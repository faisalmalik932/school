@extends('Template.master')
@section('menu-head', 'HR')
@section('title', 'Employee Search')
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
                <li class="active"><a href="#form" data-toggle="tab"><i class="zmdi zmdi-search mr-10"></i>Search</a></li>
                <li ><a href="#list" data-toggle="tab"><i class="zmdi zmdi-view-day mr-10"></i>Employees</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="form">
                    <form method="GET"  action="{{ url('hr/employees/employees-list') }}"  name="myForm" id="DATAFORM" enctype="multipart/form-data">
                        <input id="primaryid" name="primary" type="hidden"/>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Employee Name</label>
                                    <select name="employeename" id="employeename" class="form-control select-search">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Branch</label>
                                    <select name="branch" id="branchID" class="form-control select-search  DROPDOWN BRANCH" data-dropdown="BRANCH">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Department</label>
                                    <select name="department" id="department" class="form-control select-search validate[required] DEPARTMENTS">
                                        <option disabled selected>Select Department</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Designation</label>
                                    <select id="designation" name="designation" class="form-control DESIGNATION select-search">
                                    </select>
                                </div>
                            </div>
                            </div>
                        <div class="panel-body">
                            <div class="row position-right" style="text-align: end; margin: 6px">
                                <button type="button" id="button" class="btn btn-primary"><i class="icon-floppy-disk position-left"></i> Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="list">
                    <table class="table" id="datatables">
                        <thead>
                        <tr>
                            <th>Branch Name</th>
                            <th>Employee Name</th>
                            <th>Department</th>
                            <th>Designation</th>
                            <th>Mobile No</th>
                            <th>Email</th>
                            <th>Address</th>
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
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jsheader')
<script type="text/javascript" src="{{ asset('assets/js/searchemployee.js') }}">
</script>
@endsection