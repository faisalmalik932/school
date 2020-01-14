<!-- Main navbar -->
<div class="navbar navbar-inverse navbar-fixed-top bg-indigo">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ url('dashboard') }}">Presbyterian Education Board</a>

        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
        <form action="{{ URL::to('/topbarsession') }}" method="get" id="dashboardform">
            <div class="navbar-right">
                <p class="navbar-text">
                    <span class="label bg-grey-400">Select Branch</span>
                    @php
                        $schools = json_decode(request()->session()->get("SCHOOLS"), true);
                        $hostels = json_decode(request()->session()->get("HOSTELS"), true);
                        $branch = explode("-", request()->session()->get('BRANCH_ID'));
                        $branchData = explode("-", request()->session()->get('BRANCHDATA'));
                        if(isset($branchData) && !empty($branchData[1]) && !empty($branchData[0])){
                        request()->session()->put('BRANCH_TYPE', $branchData[0]);
                        request()->session()->put('BRANCH_ID', $branchData[1]);
                        }
                    @endphp
                    <select class="change-date select-sm BRANCHSESSION" id="branch" name="branch" style="color: black !important;">
                        <option value="all-all">ALL SCHOOLS AND HOSTELS</option>
                        <optgroup label="Select School/Branch">
                            @for ($i = 0; $i < count($schools); $i++)
                                <option id="branchIDSession" name="branchID" value="{{'school-'.$schools[$i]['BRANCH_ID']}}">{{$schools[$i]['BRANCH_NAME']}}</option>
                            @endfor
                        </optgroup>
                        <optgroup label="Select Hostel">
                            @for ($i = 0; $i < count($hostels); $i++)
                                <option value="{{'hostel-'.$hostels[$i]['HOSTEL_ID']}}">{{$hostels[$i]['HOSTEL_NAME']}}</option>
                            @endfor
                        </optgroup>
                        @php
                        $branch = request()->session()->get("BRANCH_ID");
                        $branchID = trim($branch,"school-");
                         echo'<input type="hidden" id="sessionid" value="'.$branchID.'">';
                        @endphp
                    </select>
                </p>
                <p class="navbar-text"><span class="label bg-green-400">Branch Type: {{ strtoupper(request()->session()->get('BRANCH_TYPE')) }}</span></p>
                <p class="navbar-text"><span class="label bg-grey-400">{{ request()->session()->get('FISCAL_YEAR') }}</span></p>
                <p class="navbar-text"><span class="label bg-indigo-400">Logged in from: {{ request()->session()->get('BRANCH_NAME') }}</span></p>
                <p class="navbar-text"><span class="label bg-danger-400">User Type: {{ request()->session()->get('USER_ROLE_NAME') }}</span></p>
            </div>
        </form>
    </div>
</div>
<?php $session_value=(isset($_SESSION['BRANCH_ID']))?$_SESSION['id']:''; ?>
<script  type="text/javascript" src="{{ asset('assets/js/common.js') }}"></script>
<!-- /main navbar -->
