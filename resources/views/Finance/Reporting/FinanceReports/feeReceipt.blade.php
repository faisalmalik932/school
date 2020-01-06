@extends('template.master')
@section('menu-head', 'Finance')
@section('title', 'Fee Receipt')
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
                        <label> Search by Name</label>
                        <input type="text" class="form-control" id="name" name="name">
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