@extends('Template.master')
@section('menu-head', 'Finance')
@section('title', 'Create Fine')
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
            <ul class="nav nav-tabs nav-tabs-bottom bottom-divided nav-justified">
                <li class="active"><a href="#form" data-toggle="tab">Add Fine</a></li>
                <li><a href="#list" data-toggle="tab">Fine List</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="form">
                    <form method="POST" action="{{ url('/finance/fees/add-fine') }}" id="DATAFORM" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @include('Template.Components.messages')
                        @if (Session::has('feefine'))
                        <div class="alert alert-success" id="success-alert">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ Session::get('feefine') }}</strong>
                        </div>
                        @endif
                        <input id="primaryid" name="primary" type="hidden"/>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Fine Name</label>
                                    <input type="text" id="finename"   name="finename" class="form-control"   placeholder="Fine Name" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Mode</label>
                                    <select class="form-control" id="mode">
                                        <option>Select Mode</option>
                                        <option>Percentage</option>
                                        <option>Amount</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Fine Value</label>
                                    <input type="text" id="amount"   name="amount" class="form-control"   placeholder="Fine Value">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Days After Due Date</label>
                                <div class="content-group-lg">
                                    <input type="text" id="duedate"   name="days" class="form-control"   placeholder="Days">
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row position-right" style="text-align: end; margin: 6px">
                                <button type="button" class="btn btn-primary SAVE"><i class="icon-floppy-disk position-left"></i> Save/Update</button>
                                <button type="button" class="btn btn-danger DELETE"><i class="icon-cross3 position-left"></i> Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="list">
                    <table id="datatable" class="table" data-code="feefines"></table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jsheader')
<script>
    $(function() {
        $('#mode').change(function(){
            var textbox = document.getElementById('amount');
            if( $(this).val() === 'Percentage'){
                textbox.value ='%';;
                textbox.focus();
            }else{
                textbox.value ='';

            }
        });
    });
</script>
@endsection
