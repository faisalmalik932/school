@extends('Template.master')
@section('menu-head', 'Platform')
@section('title', 'Manage States')
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
                <li class="active"><a href="#form" data-toggle="tab">Add State</a></li>
                <li ><a href="#list" data-toggle="tab">Manage States</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="form">
                    <form method="POST" action="{{ url('platform/states/add') }}" name="myForm" id="DATAFORM" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @include('Template.Components.messages')
                        @if (Session::has('state'))
                        <div class="alert alert-success" id="success-alert">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ Session::get('state') }}</strong>
                        </div>
                        @endif
                        <input id="primaryid" name="primary" type="hidden"/>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Country:</label>
                                    <select id="country" name="country" class="form-control validate[required] DROPDOWN " data-dropdown="COUNTRY" >
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>State Name</label>
                                    <input id="state" name="state" class="form-control validate[required,custom[onlyLetterSp],minSize[5]] ALPHA" maxlength="25" minlength="3" placeholder="STATE"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>State Code</label>
                                    <input id="statecode" name="statecode" class="form-control" maxlength="10" placeholder="CODE"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Description</label>
                                    <input id="description" name="description" class="form-control" maxlength="300" placeholder="DESCRIPTION"/>
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
                    <table id="datatable" class="table" data-code="states"></table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('jsheader')
<script type="text/javascript">
    $(function() {
        $('.multiselect-ui').multiselect({
            includeSelectAllOption: true
        });
    });
</script>
@endsection