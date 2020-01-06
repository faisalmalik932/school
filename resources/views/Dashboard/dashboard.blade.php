@extends('Template.master')
@section('title', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-3">
            <div class="panel panel-flat">
                <div class="container-fluid">
                    <div class="col-lg-6">
                        <a href="{{ URL::to('/') }}/register/student" class="btn btn-float btn-float-lg"><i
                                    class="icon-man-woman"></i> Register Student</a>
                    </div>
                    <div class="col-lg-6">
                        <a href="{{ URL::to('/') }}/register/search-student" class="btn btn-float btn-float-lg"><i
                                    class="icon-folder-search"></i> Search Students </a>
                    </div>
                </div>
            </div>
            <div class="panel panel-flat">
                <div class="container-fluid">
                    <div class="col-lg-6">
                        <a href="{{ URL::to('/') }}/finance/fees/fee-collect" class="btn btn-float btn-float-lg"><i class="icon-cash"></i> Fee Collection</a>
                    </div>
                    <div class="col-lg-6">
                        <a href="{{ URL::to('/') }}/finance/reports/studentchallan" class="btn btn-float btn-float-lg"><i class="icon-folder-search"></i>Print Fee Challan</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="panel panel-flat">
                <div class="container-fluid">
                    <div class="col-lg-6">
                        <a href="{{ URL::to('/') }}/finance/donors" class="btn btn-float btn-float-lg"><i class="icon-user-tie"></i> Add Donors</a>
                    </div>
                    <div class="col-lg-6">
                        <a href="{{ URL::to('/') }}/finance/donors/funds" class="btn btn-float btn-float-lg"><i class="icon-cash2"></i> Add Donor Funds</a>
                    </div>
                </div>
            </div>
            <div class="panel panel-flat">
                <div class="container-fluid">
                    <div class="col-lg-6">
                        <a href="{{ URL::to('/') }}/hr/payslips/employeepayslip" class="btn btn-float btn-float-lg"><i class="icon-users"></i> Employee Payslips</a>
                    </div>
                    <div class="col-lg-6">
                        <a href="{{ URL::to('/') }}/hr/employees/employees-list" class="btn btn-float btn-float-lg"><i class="icon-search4"></i> Search Employees</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4" >
            <div class="panel panel-flat">
                <div class="container-fluid">
                    <div class="col-lg-4">
                        <a href="{{ URL::to('/') }}/finance/account-heads" class="btn btn-float btn-float-lg"><i class="icon-list-ordered"></i> GL Accounts</a>
                    </div>
                    <div class="col-lg-4">
                        <a href="{{ URL::to('/') }}/finance/vouchers/create-voucher" class="btn btn-float btn-float-lg"><i class="icon-book2"></i> Journal Voucher</a>
                    </div>
                    <div class="col-lg-4">
                        <a href="{{ URL::to('/') }}/finance/account-heads" class="btn btn-float btn-float-lg"><i class="icon-book2"></i> BPV Accounts</a>
                    </div>
                </div>
            </div>
            <div class="panel panel-flat">
                <div class="container-fluid">
                    <div class="col-lg-4">
                        <a href="{{ URL::to('/') }}/hr/leaves/apply-leave" class="btn btn-float btn-float-lg"><i class="icon-add-to-list"></i> Apply Leaves</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <!-- Traffic sources -->
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title">Student Statistics</h6>
                    <div class="heading-elements">

                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3">
                            <ul class="list-inline text-center">
                                <li>
                                    <a href="#"
                                       class="btn border-teal text-teal btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i
                                                class="icon-user-plus"></i></a>
                                </li>
                                <li class="text-left">
                                    <div class="text-semibold">New Students</div>
                                    <div class="text-muted">{!! $newstudents !!}</div>
                                </li>
                            </ul>

                            <div class="col-lg-10 col-lg-offset-1">
                                <div class="content-group" id="new-visitors"></div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <ul class="list-inline text-center">
                                <li>
                                    <a href="#"
                                       class="btn border-warning-400 text-warning-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i
                                                class="icon-users"></i></a>
                                </li>
                                <li class="text-left">
                                    <div class="text-semibold">Total Students</div>
                                    <div class="text-muted">{!! $totalstudents !!}</div>
                                </li>
                            </ul>

                            <div class="col-lg-10 col-lg-offset-1">
                                <div class="content-group" id="new-sessions"></div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <ul class="list-inline text-center">
                                <li>
                                    <a href="#"
                                       class="btn border-warning-400 text-warning-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i
                                                class="icon-man"></i></a>
                                </li>
                                <li class="text-left">
                                    <div class="text-semibold">Male Students</div>
                                    <div class="text-muted">{!! $totalmalestudents !!}</div>
                                </li>
                            </ul>

                            <div class="col-lg-10 col-lg-offset-1">
                                <div class="content-group" id="new-sessions"></div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <ul class="list-inline text-center">
                                <li>
                                    <a href="#"
                                       class="btn border-warning-400 text-warning-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i
                                                class="icon-woman"></i></a>
                                </li>
                                <li class="text-left">
                                    <div class="text-semibold">Female Students</div>
                                    <div class="text-muted">{!! $totalfemalestudents !!}</div>
                                </li>
                            </ul>

                            <div class="col-lg-10 col-lg-offset-1">
                                <div class="content-group" id="new-sessions"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="position-relative" id="traffic-sources"></div>
            </div>
            <!-- /traffic sources -->
        </div>
        <div class="col-lg-6">
            <!-- Sales stats -->
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title">Fee Statistics (Month: <?php echo date('F Y');?>)</h6>
                    <div class="heading-elements">
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row text-center">
                        <div class="col-md-4">
                            <div class="content-group">
                                <h5 class="text-semibold no-margin"><i class="icon-box position-left text-slate"></i> {!!$bankFeeTotal!!} PKR</h5>
                                <span class="text-muted text-size-small">Paid Through Bank</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="content-group">
                                <h5 class="text-semibold no-margin"><i class="icon-home position-left text-slate"></i> {!!$pebFeeTotal!!} PKR</h5>
                                <span class="text-muted text-size-small">Paid Through PEB</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="content-group">
                                <h5 class="text-semibold no-margin"><i class="icon-cash2 position-left text-slate"></i> {!!$unpaidFeeTotal!!} PKR</h5>
                                <span class="text-muted text-size-small">Unpaid Fee</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /sales stats -->
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <!-- Stacked area chart -->
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Fee Collection Chart (Fiscal Year: {{ $fiscalyear }})</h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                        </ul>
                    </div>

                </div>
                <div class="panel-body form-group form">
                    <form method="get" action="{{ url('') }}" name="myForm" id="DATAFORM" class="DATA"
                          enctype="multipart/form-data">
                        <select class="form-control validate[required]" id="year" name="year">
                            <option disabled selected>Select Year</option>
                            @foreach($fis as $year)
                                <option value="{{ $year['year'] }}">{{ $year['START_DATE'] }}
                                    to {{ $year['END_DATE'] }}</option>
                            @endforeach
                        </select>
                        <br>
                        <button type="submit" class="btn btn-primary feeCollection">Search</button>
                    </form>
                </div>
                <div class="panel-body">
                    <div class="chart-container">
                        <div class="chart has-fixed-height" style="overflow: scroll;" id="stacked_area"></div>
                    </div>
                </div>
            </div>
            <!-- /stacked area chart -->
        </div>
    </div>
@endsection

@section('jsheader')
    <script type="text/javascript" src="{{ asset('js/pages/dashboard.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/visualization/echarts/echarts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/charts/echarts/lines_areas.js') }}"></script>
@endsection