@extends('Template.master')
@section('menu-head', 'Finance')
@section('title', 'Print Fee Challan')
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
        <form method="GET"  action="{{ url('finance/reports/getchallan') }}"  name="myForm" id="DATAFORM" target="_blank" enctype="multipart/form-data">
            @include('Template.Components.messages')
            @if (Session::has('feegenerate'))
                    <div class="alert alert-success" id="success-alert">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>{{ Session::get('feegenerate') }}</strong>
                    </div>
                @endif
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Year </label>
                        <select class="form-control validate[required]"   id="year" name="year">
                            <option disabled>Select Year</option>
                            <option selected>2018</option>
                            <option>2019</option>
                            <option>2020</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Month</label>
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
                        <label>Branch </label>
                        <select class="form-control validate[required] DROPDOWN BRANCH" data-dropdown="BRANCH" id="branch" name="branch">
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Class</label>
                        <select class="form-control CLASS" name="class" id="class">
                            <option disabled selected>Class</option>
                        </select>
                    </div>
                </div>
            </div>
           <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Student</label>
                        <select class="form-control STUDENT" name="student" id="student">
                        </select>
                    </div>
                </div>
            <!-- <div class="col-md-6">
                <div class="form-group">
                    <label class="display-block text-semibold">Admission Fee</label>
                    <label class="radio-inline validate[groupRequired[fee]]">
                        <input type="radio" name="admission" class="styled validate[groupRequired[fee]]" value="1">
                        YES
                    </label>
                    <label class="radio-inline validate[groupRequired[fee]]">
                        <input type="radio" name="admission" class="styled "   value="0">
                        NO
                    </label>
                </div>
            </div> -->
           </div>
            <div class="panel-body">
                <div class="row position-right" style="text-align: end; margin: 6px">
                    <button type="submit" class="btn btn-primary"><i class="icon-floppy-disk position-left"></i>Print Challan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('jsheader')
<script type="text/javascript" src="{{ asset('assets/js/finance/chalaanform.js') }}">
</script>
@endsection
