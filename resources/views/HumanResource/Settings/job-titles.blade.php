@extends('Template.master')
@section('menu-head', 'Humane Resource / Settings')
@section('title', 'Job Titles')
@section('content')
<!-- Form horizontal -->
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
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-bottom bottom-divided nav-justified">
                <li class="active"><a href="#form" data-toggle="tab">Add Job Title</a></li>
                <li><a href="#list" data-toggle="tab">Job Titles</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="form">
                    <form id="DATAFORM" method="POST" action="{{ url('/hr/settings/add-title') }}" class="form-horizontal">
                        {{ csrf_field() }}
                        @include('Template.Components.messages')
                        @if (Session::has('jobtitle'))
                        <div class="alert alert-success" id="success-alert">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ Session::get('jobtitle') }}</strong>
                        </div>
                        @endif
                        <input id="primaryid" name="primary" type="hidden"/>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Department</label>
                                    <select class="form-control validate[required]" id="department" name="department">
                                        <option>Select Department</option>
                                        @foreach($department as $departments)
                                        <option value="{{$departments->DEPARTMENT_ID}}">{{$departments->DEPARTMENT_NAME}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Job Category</label>
                                    <select class="form-control validate[required]" id="jobcategory" name="jobcategory">
                                        <option>Select Job Category</option>
                                        @foreach($jobcategory as $category)
                                        <option value="{{$category->JOB_CATEGORY_ID}}">{{$category->JOB_CATEGORY_NAME}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Title Name:</label>
                                    <input type="text" id="jobtitle" name="titlename" class="form-control validate[required,custom[onlyLetterSp],minSize[5]] ALPHA" maxlength="40" placeholder="Title Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Job Description:</label>
                                    <input type="text" id="description" name="titledescription" class="form-control validate[required]" maxlength="60" placeholder="Job Description">
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row position-right" style="text-align: end; margin: 6px">
                                <button type="button" class="btn btn-primary {{__('button.reset-reset')}} "><i class="{{__('button.reset-icon')}} {{__('button.reset-class')}} "></i>{{__('button.reset-text')}}</button>
                                <button type="button" class="btn btn-primary SAVE"><i class="icon-floppy-disk position-left"></i> Save/Update</button>
                                <button type="button" class="btn btn-danger DELETE"><i class="icon-cross3 position-left"></i> Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="list">
                    <table id="datatable" class="table" data-code="jobtitle"></table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
