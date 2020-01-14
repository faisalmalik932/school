@extends('Template.master')
@section('menu-head', 'Finance')
@section('title', 'Search Hostel Student')
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
        <form method="GET"  action="{{ url('finance/reports/gethostelchallan') }}"  name="myForm" id="DATAFORM" enctype="multipart/form-data">
            @include('Template.Components.messages')
            <div class="row">
                 <div class="col-md-6">
                <div class="form-group">
                     <label>Select Month</label>
                    <select class="form-control" name="month">
                                        <option disabled selected>Select Month</option>
                                        <option value="JAN">JAN</option>
                                        <option value="FEB">FEB</option>
                                        <option value="MAR">MAR</option>
                                        <option value="APR">APR</option>
                                        <option value="MAY">MAY</option>
                                        <option value="JUN">JUN</option>
                                        <option value="JUL">JUL</option>
                                        <option value="AUG">AUG</option>
                                        <option value="SEP">SEP</option>
                                        <option value="OCT">OCT</option>
                                        <option value="NOV">NOV</option>
                                        <option value="DEC">DEC</option>
                    </select>
                </div>
                
            </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Select Hostel</label>
                        <select class="form-control DROPDOWN HOSTEL" data-dropdown="HOSTEL" id="hostel" name="hostel">
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Student</label>
                        <select class="form-control STUDENT" name="student" id="student">
                            <option disabled selected>Select Student</option>
                        </select>
                    </div>
                </div>
            </div>
            
           
            <div class="panel-body">
                <div class="row position-right" style="text-align: end; margin: 6px">
                    <button type="submit" class="btn btn-primary"><i class="icon-floppy-disk position-left"></i> Search</button>
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
