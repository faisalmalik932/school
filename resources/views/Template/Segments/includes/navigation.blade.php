<!-- Main navigation -->
<div class="sidebar-category sidebar-category-visible">
    <div class="category-content no-padding">
        <ul class="navigation navigation-main navigation-accordion">
            <!-- Main -->
            <li><a href="{{ url('dashboard') }}"><i class="icon-home"></i> <span>Dashboard</span></a></li>
            <li>
                <a href="#"><i class="icon-cash4"></i> <span>Finance</span></a>
                <ul>
                    <li>
                        <a href="#"><i class="icon-cash4"></i><span>Accounting</span></a>
                        <ul>
                            <li>
                                <a href="#"><i class="icon-cash3"></i> <span>Vouchers</span></a>
                                <ul>
                                    <li class="{{Request::is('finance/vouchers/create-voucher*') ? 'active' : ''}}"><a href="{{ url('finance/vouchers/create-voucher') }}"><i class="icon-circle-right2"></i>Journal Voucher</a></li>
                                    <li class="{{Request::is('finance/vouchers/bank-payment-voucher*') ? 'active' : ''}}"><a href="{{ url('finance/vouchers/bank-payment-voucher') }}"><i class="icon-circle-right2"></i>BPV</a></li>
                                </ul>
                            </li>
                            <li class="{{Request::is('finance/account-heads*') ? 'active' : ''}}"><a href="{{ url('finance/account-heads/') }}"><i class="icon-circle-right2"></i>GL Accounts</a></li>
                            <li class="{{Request::is('finance/bank-accounts*') ? 'active' : ''}}"><a href="{{ url('finance/bank-accounts/') }}"><i class="icon-circle-right2"></i>Bank Accounts</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-cash2"></i> <span>Fees</span></a>
                        <ul>
                            <li>
                                <a href="#"><i class="icon-cash4"></i>School Fee</a>
                                <ul>
                                    <li class="{{Request::is('finance/fees/fee-challan*') ? 'active' : ''}}"><a href="{{ url('finance/fees/fee-challan') }}"><i class="icon-circle-right2"></i>Fee Challan</a></li>
                                    <li class="{{Request::is('finance/fees/fee-collect*') ? 'active' : ''}}"><a href="{{ url('finance/fees/fee-collect') }}"><i class="icon-cash"></i>Fee Collections</a></li>
                                    <li class="{{Request::is('finance/reports/studentchallan*') ? 'active' : ''}}"><a href="{{ url('finance/reports/studentchallan') }}"><i class="icon-circle-right2"></i>Print Fee Challan Form</a></li>
                                    <li class="{{Request::is('finance/fees/fee-challan-edit*') ? 'active' : ''}}"><a href="{{ url('finance/fees/fee-challan-edit') }}"><i class="icon-circle-right2"></i>Edit Fee Challan</a></li>
                                </ul>
                            </li>
                            {{--<li>--}}
                                {{--<a href="#"><i class="icon-cash3"></i>Hostel Fee</a>--}}
                                {{--<ul>--}}
                                    {{--<li class="{{Request::is('finance/fees/hostel-challan*') ? 'active' : ''}}"><a href="{{ url('finance/fees/hostel-challan') }}"><i class="icon-circle-right2"></i>Hostel Fee Challan</a></li>--}}
                                    {{--<li class="{{Request::is('finance/fees/hostel-fee-collect*') ? 'active' : ''}}"><a href="{{ url('finance/fees/hostel-fee-collect') }}"><i class="icon-cash"></i>Hostel Fee Collections</a></li>--}}
                                    {{--<li class="{{Request::is('finance/reports/studenthostelchallan*') ? 'active' : ''}}"><a href="{{ url('finance/reports/studenthostelchallan') }}"><i class="icon-circle-right2"></i>Print Hostel Challan Form</a></li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            <li>
                                <a href="#"><i class="icon-cog"></i>Fee Settings</a>
                                <ul>
                                    <li class="{{Request::is('finance/fees/create-category*') ? 'active' : ''}}"><a href="{{ url('finance/fees/create-category') }}"><i class="icon-circle-right2"></i>Fee Category</a></li>
                                    <li class="{{Request::is('finance/fees/create-particulars*') ? 'active' : ''}}"><a href="{{ url('finance/fees/create-particulars') }}"><i class="icon-circle-right2"></i>Fee Particulars</a></li>
                                    <li class="{{Request::is('finance/fees/fee-structure*') ? 'active' : ''}}"><a href="{{ url('finance/fees/fee-structure') }}"><i class="icon-circle-right2"></i>Fee Structure</a></li>
                                    <li class="{{Request::is('finance/fees/fee-challan-structure-edit*') ? 'active' : ''}}"><a href="{{ url('finance/fees/fee-challan-structure-edit') }}"><i class="icon-circle-right2"></i>Edit Fee Structure</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-user-tie"></i> <span>Donors</span></a>
                        <ul>
                            <li class="{{Request::is('finance/donors/funds*') ? 'active' : ''}}"><a  href="{{ url('finance/donors/funds') }}"><i class="icon-circle-right2"></i>Add Funds</a></li>
                            <li class="{{Request::is('finance/donors/donor-allocation*') ? 'active' : ''}}"><a href="{{ url('finance/donors/donor-allocation') }}"><i class="icon-users2"></i>Allocate Donor</a></li>
                            <li ><a  href="{{ url('finance/donors/') }}"><i class="zmdi zmdi-account-add zmdi-hc-lg mr-10"></i>Manage Donors</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-cog"></i><span>Settings</span></a>
                        <ul>
                            <li class="{{Request::is('finance/settings/suppliers*') ? 'active' : ''}}"><a href="{{ url('finance/settings/suppliers') }}"><i class="icon-circle-right2"></i>Suppliers</a></li>
                            <li class="{{Request::is('finance/settings/currencies*') ? 'active' : ''}}"><a href="{{ url('finance/settings/currencies') }}"><i class="icon-circle-right2"></i>Currencies</a></li>
                            <li class="{{Request::is('finance/settings/fiscalYear*') ? 'active' : ''}}"><a href="{{ url('finance/settings/fiscalYear') }}"><i class="icon-circle-right2"></i>Fiscal Years</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-file-pdf"></i>Reporting</a>
                        <ul>
                            <li>
                                <a href="#"><i class="icon-cash2"></i>Fee Reporting</a>
                                <ul>
                                    <li class="{{Request::is('finance/fees/reports/branchmonthreceivedfee*') ? 'active' : ''}}"><a href="{{ url('finance/fees/reports/branchmonthreceivedfee') }}"><i class="icon-circle-right2"></i>Monthly Fee</a></li>
                                    <li class="{{Request::is('finance/fees/reports/monthlyfeedefaulters*') ? 'active' : ''}}"><a href="{{ url('finance/fees/reports/monthlyfeedefaulters') }}"><i class="icon-cross2"></i>Monthly Defaulters Fee</a></li>
                                    <li class="{{Request::is('finance/fees/reports/branchfeeconcession*') ? 'active' : ''}}"><a href="{{ url('finance/fees/reports/branchfeeconcession') }}"><i class="icon-circle-right2"></i>Fee Concession</a></li>
                                    <li class="{{Request::is('finance/fees/reports/branchfeebillsummary*') ? 'active' : ''}}"><a href="{{ url('finance/fees/reports/branchfeebillsummary') }}"><i class="icon-circle-right2"></i>Fee Bill Summary</a></li>
                                    <li class="{{Request::is('finance/fees/reports/branchfeebilldetail*') ? 'active' : ''}}"><a href="{{ url('finance/fees/reports/branchfeebilldetail') }}"><i class="icon-circle-right2"></i>Fee Bills Details</a></li>
                                    <li class="{{Request::is('finance/fees/reports/searchfeeVoucher*') ? 'active' : ''}}"><a href="{{ url('finance/fees/reports/searchfeeVoucher') }}"><i class="icon-circle-right2"></i>Fee Vouchers Analysis</a></li>
                                    <li class="{{Request::is('finance/fees/reports/searchhostelfeeVoucher*') ? 'active' : ''}}"><a href="{{ url('finance/fees/reports/searchhostelfeeVoucher') }}"><i class="icon-circle-right2"></i>Hostel Fee Vouchers Analysis</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-book3"></i><span>Account Reporting</span></a>
                                <ul>
                                    <li class="{{Request::is('finance/reports/glAccountsReport*') ? 'active' : ''}}"><a href="{{ url('finance/reports/glAccountsReport/') }}"><i class="icon-circle-right2"></i>Print GL Accounts</a></li>
                                    <!-- <li class="{{Request::is('finance/reports/searchledger*') ? 'active' : ''}}"><a href="{{ url('finance/reports/searchledger') }}"><i class="icon-circle-right2"></i>Ledger Report</a></li> -->
                                    <li  class="{{Request::is('finance/reports/search-trial-balance') ? 'active' : ''}}"><a href="{{ url('finance/reports/search-trial-balance') }}"><i class="icon-circle-right2"></i>Trial Balance</a></li>
                                    <li  class="{{Request::is('finance/reports/search-income-expenditure') ? 'active' : ''}}"><a href="{{ url('finance/reports/search-income-expenditure') }}"><i class="icon-circle-right2"></i>Income&Expenditure</a></li>
                                    <li  class="{{Request::is('finance/reports/search-balance-sheet*') ? 'active' : ''}}"><a href="{{ url('finance/reports/search-balance-sheet') }}"><i class="icon-circle-right2"></i>Balance Sheet</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-user-tie"></i> <span>Donor Reporting</span></a>
                                <ul>
                                    <li class="{{Request::is('finance/donors/reports/branchwise*') ? 'active' : ''}}"><a  href="{{ url('finance/donors/reports/branchwise') }}"><i class="icon-circle-right2"></i>BranchWise Report</a></li>
                                    <li class="{{Request::is('finance/donors/reports/donors*') ? 'active' : ''}}"><a  href="{{ url('finance/donors/reports/donors') }}"><i class="icon-circle-right2"></i>Donors List</a></li>
                                    <li class="{{Request::is('finance/donors/reports/donorwise*') ? 'active' : ''}}"><a  href="{{ url('finance/donors/reports/donorwise') }}"><i class="icon-circle-right2"></i>Donors Wise</a></li>
                                    <li class="{{Request::is('finance/donors/reports/allbranchesdonors*') ? 'active' : ''}}"><a  href="{{ url('finance/donors/reports/allbranchesdonors') }}"><i class="icon-circle-right2"></i>All Branches Donors</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
            <li>
                <a href="#"><i class="icon-library2"></i> <span>Academics</span></a>
                <ul>
                    <li class="{{Request::is('register/search-student*') ? 'active' : ''}}"><a href="{{ url('register/search-student') }}"><i class="icon-folder-search"></i> Search Student</a></li>
                    <li class="{{Request::is('register/student*') ? 'active' : ''}}"> <a href="{{ url('register/student') }}"><i class="icon-users4"></i>Manage Students</a></li>
                    <li class="{{Request::is('platform/branches*') ? 'active' : ''}}"><a href="{{ url('platform/branches') }}"><i class="icon-home5"></i>Manage Branches</a></li>
                    <li class="{{Request::is('platform/hostels*') ? 'active' : ''}}"><a href="{{ url('platform/hostels') }}"><i class="icon-home4"></i>Manage Hostels</a></li>
                    <li>
                        <a href="#"><i class="icon-cog"></i>Settings</a>
                        <ul>
                            <li class="{{Request::is('hr/settings/departments*') ? 'active' : ''}}"><a href="{{ url('hr/settings/departments') }}"><i class="icon-circle-right2"></i> Departments</a></li>
                            <li class="{{Request::is('platform/sections*') ? 'active' : ''}}"><a href="{{ url('platform/sections') }}"><i class="icon-add-to-list"></i> Manage Sections</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="icon-users4"></i> <span> Human Resource</span></a>
                <ul>
                    <li class="{{Request::is('hr/employees/employees-list*') ? 'active' : ''}}"><a href="{{ url('hr/employees/employees-list') }}"><i class="icon-folder-search"></i> Search Employee</a></li>
                    <li class="{{Request::is('hr/employees/add*') ? 'active' : ''}}"><a href="{{ url('hr/employees/add') }}"><i class="icon-users"></i> Manage Employees</a></li>
                    <li>
                        <a href="#"><i class="icon-book"></i> Payslips</a>
                        <ul>
                            <li class="{{Request::is('hr/payslips/employeepayslip*') ? 'active' : ''}}"><a href="{{ url('hr/payslips/employeepayslip') }}"><i class="icon-circle-right2"></i>Employee Payslip</a></li>
                            <li>
                                <a href="#"><i class="icon-book3"></i>Salary Structure</a>
                                <ul>
                                    <li class="{{Request::is('hr/settings/salarystructure*') ? 'active' : ''}}"><a href="{{ url('hr/settings/salarystructure') }}"><i class="icon-circle-right2"></i>Salary Structure</a></li>
                                    <li class="{{Request::is('hr/settings/search-salary-structure*') ? 'active' : ''}}"><a href="{{ url('hr/settings/search-salary-structure') }}"><i class="icon-circle-right2"></i>Edit Salary Structure</a></li>
                                    <li class="{{Request::is('hr/settings/salarycategories*') ? 'active' : ''}}"><a href="{{ url('hr/settings/salarycategories') }}"><i class="icon-circle-right2"></i>Salary Categories</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-alarm"></i> Leaves</a>
                        <ul>
                            <li class="{{Request::is('hr/entitlements/save-entitlements*') ? 'active' : ''}}"><a href="{{ url('hr/entitlements/save-entitlements') }}"><i class="icon-circle-right2"></i> Entitlements</a></li>
                            <li class="{{Request::is('hr/leaves/apply-leave*') ? 'active' : ''}}"><a href="{{ url('hr/leaves/apply-leave') }}"><i class="icon-circle-right2"></i>Apply Leave</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-cog"></i> Settings</a>
                        <ul>
                            <li class="{{Request::is('hr/settings/job-titles*') ? 'active' : ''}}"><a href="{{ url('hr/settings/job-titles') }}"><i class="icon-circle-right2"></i> Job Titles</a></li>
                            <li class="{{Request::is('hr/settings/job-category*') ? 'active' : ''}}"><a href="{{ url('hr/settings/job-category') }}"><i class="icon-circle-right2"></i> Job Category</a></li>
                            <li class="{{Request::is('hr/settings/employment-status*') ? 'active' : ''}}"><a href="{{ url('hr/settings/employment-status') }}"><i class="icon-circle-right2"></i> Employment Status</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-file-pdf"></i> Reporting</a>
                        <ul>
                            <li class="{{Request::is('hr/profile*') ? 'active' : ''}}"><a href="{{ url('hr/profile') }}"><i class="icon-circle-right2"></i> Employee Profile</a></li>
                            <li>
                                <a href="#"><i class="icon-book3"></i>PaySlips</a>
                                <ul>
                                    <li class="{{Request::is('hr/reports/searchpayslip*') ? 'active' : ''}}"><a href="{{ url('hr/reports/searchpayslip') }}"><i class="icon-circle-right2"></i>Print Payslip</a></li>
                                </ul>
                            </li>
                            <li class="{{Request::is('hr/reports/searchsummary*') ? 'active' : ''}}"><a href="{{ url('hr/reports/searchsummary') }}"><i class="icon-circle-right2"></i>Search Summary</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="icon-cog"></i> <span> Platform</span></a>
                <ul>
                    <li>
                        <a href="{{ url('#') }}"><i class="icon-location3"></i>Regions</a>
                        <ul>
                            <li class="{{Request::is('platform/states*') ? 'active' : ''}}"><a href="{{ url('platform/states') }}"><i class="icon-circle-right2"></i>Manage States</a></li>
                            <li class="{{Request::is('platform/cities*') ? 'active' : ''}}"><a href="{{ url('platform/cities') }}"><i class="icon-circle-right2"></i> Manage Cities</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ url('#') }}"><i class="icon-import"></i>Import</a>
                        <ul>
                            <li class="{{Request::is('import/students*') ? 'active' : ''}}"><a href="{{ url('import/students') }}"><i class="icon-circle-right2"></i>Students</a></li>
                        </ul>
                    </li>
                    <li class="{{Request::is('platform/users*') ? 'active' : ''}}"><a href="{{ url('platform/users') }}"><i class="icon-user"></i> Application Users</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- /main navigation -->