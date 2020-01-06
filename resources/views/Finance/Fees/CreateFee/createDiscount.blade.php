@extends('Template.master')
@section('menu-head', 'Finance')
@section('title', 'Create Discounts')
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
                <li class="active"><a href="#form" data-toggle="tab">Add Discount</a></li>
                <li><a href="#list" data-toggle="tab">Discounts</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="form">
                    <form method="POST" action="{{ url('/finance/fees/add-discount') }}" id="DATAFORM" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @include('Template.Components.messages')
                        @if (Session::has('feediscount'))
                        <div class="alert alert-success" id="success-alert">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ Session::get('feediscount') }}</strong>
                        </div>
                        @endif
                        <input id="primaryid" name="primary" type="hidden"/>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Discount Name</label>
                                    <input type="text" id="discountname"   name="discountname" class="form-control"   placeholder="Name" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content-group-lg">
                                    <label>Mode</label>
                                    <select class="form-control" id="mode" name="mode">
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
                                    <label>Amount</label>
                                    <input type="text" id="amount"   name="amount" class="form-control"   placeholder="Amount" >
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
                    <table id="datatable" class="table" data-code="feediscounts"></table>
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
                textbox.value ='%';
                textbox.focus();
            }else{
                textbox.value ='';
                textbox.focus();
            }
        });
    });
</script>
@endsection
