@extends('Template.master')
@section('menu-head', 'Finance')
@section('title', 'Fee Challan')
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
                <li class="active"><a href="#form" data-toggle="tab">Fee Challan</a></li>
                <li><a href="#list" data-toggle="tab">Fee Challan List</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="form">
                    <form method="POST"  action="{{ url('finance/fees/generate-fee-challan') }}"  name="myForm" id="DATAFORM" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @include('Template.Components.messages')
                        @if (Session::has('feechallan'))
                        <div class="alert alert-success" id="success-alert">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ Session::get('feechallan') }}</strong>
                        </div>
                        @endif
                        <input hidden type="text" value="{{$challanNo}}" id="challan" name="challan"/>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-semibold">Year </label>
                                    <input class="form-control validate[required]" id="year" name="year" readonly value="<?php echo date('Y')?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-semibold">Month</label>
                                    <select class="form-control validate[required]" name="month" id="month">
                                        <option value="<?php echo strtoupper(date('M'));?>" selected><?php echo strtoupper(date('M'));?></option>
                                        <option disabled>-------------</option>
                                        <?php
                                        for($m=1; $m<=12; ++$m){
                                            $month = strtoupper(date('M', mktime(0, 0, 0, $m, 1)));
                                            echo "<option value='".$month."'>".$month."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-semibold">Select Branch</label>
                                    <select class="form-control DROPDOWN validate[required] BRANCH" data-dropdown="BRANCH" id="branch" name="branch">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-semibold">Class</label>
                                    <select class="form-control CLASS" name="class" id="class">
                                        <option disabled selected>Class</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-semibold">Student</label>
                                    <select class="form-control STUDENT" name="student" id="student">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                    <!-- <label>Concession Percentage
                                        <input type="number" value="0" name="concession" id="concession" class="form-control"/>
                                    </label> -->
                                    <label class="display-block text-semibold">Admission Fee</label>
                                    <label class="radio-inline">
                                    <input type="radio" name="admission" class="styled validate[groupRequired[fee]]" value="1">
                                        YES
                                    </label>
                                    <label class="radio-inline">
                                    <input type="radio" checked="checked" name="admission" class="styled validate[groupRequired[fee]]" value="0">
                                        NO
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="form-group">
                                    <label class="display-block text-semibold">Admission Fee</label>
                                    <label class="radio-inline">
                                    <input type="radio" name="admission" class="styled validate[groupRequired[fee]]" value="1">
                                        YES
                                    </label>
                                    <label class="radio-inline">
                                    <input type="radio" checked="checked" name="admission" class="styled validate[groupRequired[fee]]" value="0">
                                        NO
                                    </label>
                            </div>
                        </div> -->
                        <div class="panel-body">
                            <div class="row position-right" style="text-align: end; margin: 6px">
                                <button type="button" class="btn btn-primary SAVE"><i class="icon-floppy-disk position-left"></i>Generate Fee Challan</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="list">
                   <table id="datatable" class="table" data-code="feechallan"></table>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal_form_vertical" class="modal fade" role="dialog" aria-labelledby="myModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Fee Structure</h5>
            </div>
            <form action="#" method="GET">
                <div class="modal-body DATA">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row STRUCTURE" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('jsheader')
<script type="text/javascript" src="{{ asset('assets/js/fees/feegenerate.js') }}">
</script>
@endsection
