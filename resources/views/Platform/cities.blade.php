@extends('Template.master')
@section('menu-head', 'Platform')
@section('title', 'Manage City')
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
            <div class="tabbable">
                <ul class="nav nav-tabs nav-justified nav-tabs-bottom bottom-divided">
                    <li class="active"><a href="#form" data-toggle="tab">Manage City</a></li>
                    <li><a href="#list" data-toggle="tab">Cities List</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="form">
                        <form method="POST" action="{{ url('platform/cities/add') }}" name="myForm" id="DATAFORM" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @include('Template.Components.messages')
                            @if (Session::has('City'))
                            <div class="alert alert-success" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong>{{ Session::get('City') }}</strong>
                            </div>
                            @endif
                            <input id="primaryid" name="primary" type="hidden"/>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Country:</label>
                                        <select id="country" name="country" class="form-control validate[required] DROPDOWN DROPDOWN-CHILD" data-dropdown="COUNTRY" data-child-id="states" data-dropdown-child="STATE">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>State:</label>
                                            <select name="state" id="states" class="form-control validate[required] DROPDOWN" data-dropdown="STATE">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> City Name</label>
                                        <input type="text" id="city" class="form-control  validate[required,custom[onlyLetterSp],minSize[3]] ALPHA" maxlength="50" name="cityname" placeholder="City Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Description</label>
                                        <input type="text" class="form-control validate[required]" id="description" maxlength="300" name="description" placeholder="Description">
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row position-right" style="text-align: end; margin: 6px">
                                    <button type="button" class="btn btn-primary RESET imageCheck"><i class="{{__('button.reset-icon')}} {{__('button.reset-class')}}"></i>{{__('button.reset-text')}}</button>
                                    <button type="button" class="btn btn-primary SAVE"><i class="icon-floppy-disk position-left"></i> Save/Update</button>
                                    <button type="button" class="btn btn-danger DELETE"><i class="icon-cross3 position-left"></i> Delete</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="list">
                        <table id="datatable" class="table" data-code="city"></table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
