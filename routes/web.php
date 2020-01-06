<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::middleware('admin')->group(function () {
    Route::get('/dashboard', 'Dashboard\DashboardController@loadView');
});

Route::get('/','Auth\LoginController@loadView');
Route::get('/topbarsession' , 'Dashboard\DashboardController@topbarSession');
Route::get('/login','Auth\LoginController@loadView');
Route::get('/forgot','Auth\ForgotPasswordController@loadView');
Route::get('/logoff', 'Auth\LoginController@logoffUser');
Route::post('/validate', 'Auth\LoginController@validateUser');
Route::post('mail', 'Auth\ForgotPasswordController@mail');

Route::group(['prefix'=>'import','as'=>'import.'], function(){
    Route::get('/students', 'import\ImportStudentsController@loadView');
    Route::post('/import-students', 'import\ImportStudentsController@importDate');
});

Route::group(['prefix'=>'platform','as'=>'platform.'], function(){
    Route::group(['prefix'=>'branches','as'=>'branches.'], function(){
        Route::get('/', 'Platform\BranchesController@loadView');
        Route::post('/add', 'Platform\BranchesController@add');
        Route::get('/show', 'Platform\BranchesController@showBranches');
    });
    Route::group(['prefix'=>'cities','as'=>'cities.'], function(){
        Route::get('/', 'Platform\CitiesController@loadView');
        Route::post('/add', 'Platform\CitiesController@add');
    });
    Route::group(['prefix'=>'states','as'=>'states.'], function(){
        Route::get('/', 'Platform\StateController@loadStateView');
        Route::post('/add', 'Platform\StateController@addStates');
    });
    Route::group(['prefix'=>'hostels','as'=>'hostels.'], function() {
        Route::get('/', 'Platform\HostelsController@loadView');
        Route::post('/add', 'Platform\HostelsController@add');
    });
    Route::group(['prefix'=>'users','as'=>'users.'], function() {
        Route::get('/', 'Platform\UsersController@loadView');
        Route::get('/change-pass' , 'Platform\UsersController@changePassword');
        Route::post('/add-user', 'Platform\UsersController@add');
    });
    Route::group(['prefix'=>'sections','as'=>'sections.'], function() {
        Route::get('/', 'Platform\SectionController@loadView');
        Route::post('/add', 'Platform\SectionController@add');
    });

    Route::group(['prefix'=>'classes','as'=>'classes.'], function() {
        Route::get('/', 'Platform\ClassController@loadView');
        Route::post('/add', 'Platform\ClassController@add');
    });

    Route::group(['prefix'=>'reports','as'=>'reports.'], function() {
        Route::get('/branchwise', 'Platform\Reporting\BranchReportController@loadView');
        Route::get('/branchreport', 'Platform\Reporting\BranchReportController@monthlyPdfReport');
    });
});

Route::group(['prefix'=>'hr','as'=>'hr.'], function(){

    Route::get('/employees/add', 'HumanResource\EmployeeController@loadView');
    Route::post('/save-employee', 'HumanResource\EmployeeController@add');
    Route::get('/show', 'HumanResource\EmployeeController@showEmployees');

    Route::group(['prefix'=>'settings','as'=>'settings.'], function(){
        Route::get('/departments', 'HumanResource\Settings\DepartmentController@loadView');
        Route::post('/add-department', 'HumanResource\Settings\DepartmentController@add');

        Route::get('/job-titles', 'HumanResource\Settings\JobTitlesController@loadView');
        Route::post('/add-title', 'HumanResource\Settings\JobTitlesController@add');

        Route::get('/job-category', 'HumanResource\Settings\JobCategoryController@loadView');
        Route::post('/add-category', 'HumanResource\Settings\JobCategoryController@add');

        Route::get('/employment-status', 'HumanResource\Settings\EmploymentStatusController@loadView');
        Route::post('/add-status', 'HumanResource\Settings\EmploymentStatusController@add');

        Route::get('/salarystructure', 'HumanResource\Reporting\EmployeePayslipController@loadview');
        Route::post('/addsalarystructure', 'HumanResource\Reporting\EmployeePayslipController@add');

        Route::get('/search-salary-structure', 'HumanResource\Reporting\EmployeePayslipController@SalaryStructureView');
        Route::get('/viewsalarystructure', 'HumanResource\Reporting\EmployeePayslipController@SalaryStructureDetails');

        Route::post('/editsalarystructure', 'HumanResource\Reporting\EmployeePayslipController@editSalaryStructure');

        Route::get('/salarycategories', 'HumanResource\Settings\SalaryCategoriesController@loadview');
        Route::post('/addsalarycategories', 'HumanResource\Settings\SalaryCategoriesController@addSalaryCategories');
    });

    Route::group(['prefix'=>'payslips','as'=>'payslips.'], function() {

        Route::get('/employeepayslip', 'HumanResource\Settings\CreateEmployeesPayslipController@loadView');
        Route::get('/downloadpdf/{employee_id}/{month}/{year}', 'HumanResource\Settings\CreateEmployeesPayslipController@downloadDF');
        Route::post('/generatepayslip', 'HumanResource\Settings\CreateEmployeesPayslipController@createPayslip');
    });
    Route::group(['prefix'=>'reports','as'=>'reports.'], function(){
        Route::get('/', 'HumanResource\Reporting\EmployeeReportController@loadView');
        Route::get('/getpdf', 'HumanResource\Reporting\EmployeeReportController@getPDF');
        Route::get('/employee-payslip-deductions', 'HumanResource\Reporting\EmployeePayslipDeductionController@loadview');
        Route::post('/payslip-deductions', 'HumanResource\Reporting\EmployeePayslipDeductionController@addSalaryDeductions');
        Route::get('/searchpayslip', 'HumanResource\Reporting\EmployeePayslipController@loadPayslipView');
        Route::get('/payslipreport', 'HumanResource\Reporting\EmployeePayslipController@PayslipPdfReport');
        Route::get('/pebpayslipreport', 'HumanResource\Reporting\EmployeePayslipController@PebPayslipPdfReport');
        Route::get('/searchsummary', 'HumanResource\Reporting\EmployeePayslipController@salarySummaryView');
        Route::get('/salarysummary', 'HumanResource\Reporting\EmployeePayslipController@SalarySummary');
    });

    Route::group(['prefix'=>'profile','as'=>'profile.'], function(){
        Route::get('/', 'HumanResource\Reporting\EmployeeProfileController@loadView');
        Route::get('/getprofile', 'HumanResource\Reporting\EmployeeProfileController@getProfilePDF');
    });

    Route::group(['prefix'=>'leaves','as'=>'leaves.'], function(){
        Route::get('/leave-type', 'HumanResource\Leaves\LeaveTypeController@loadView');
        Route::post('/add', 'HumanResource\Leaves\LeaveTypeController@add');
        Route::get('/apply-leave', 'HumanResource\Leaves\ApplyLeavesController@loadView');
        Route::post('/save-leave', 'HumanResource\Leaves\ApplyLeavesController@addemployeeLeaves');
    });

    Route::group(['prefix'=>'entitlements','as'=>'entitlements.'], function(){
        Route::get('/save-entitlements', 'HumanResource\Leaves\AddEntitlementController@loadView');
        Route::post('/add', 'HumanResource\Leaves\AddEntitlementController@add');
    });

    Route::group(['prefix'=>'employees','as'=>'employees.'], function(){
        Route::get('/employees-list', 'HumanResource\Settings\SearchEmployeeController@loadView');
    });
});

Route::group(['prefix'=>'register','as'=>'register.'], function(){
    Route::get('/student', 'Registration\StudentController@loadView');
    Route::post('/save-student', 'Registration\StudentController@add');
    Route::get('/search-student', 'Registration\SearchStudentController@loadView');
 });

Route::group(['prefix'=>'finance','as'=>'finance.'], function(){

    Route::group(['prefix'=>'donors','as'=>'donors.'], function() {
        Route::get('/', 'Finance\Donors\DonorController@loadView');
        Route::post('/add', 'Finance\Donors\DonorController@add');

        Route::get('funds', 'Finance\Donors\DonorFundsController@loadView');
        Route::post('/add-funds', 'Finance\Donors\DonorFundsController@add');

        Route::get('donor-allocation', 'Finance\Donors\AllocateDonorController@loadView');
        Route::post('/allocate-donor', 'Finance\Donors\AllocateDonorController@add');

        Route::group(['prefix'=>'reports','as'=>'reports.'], function() {

        Route::get('branchwise', 'Finance\Donors\Reporting\BranchDonorsController@loadView');
        Route::get('branchwisereport', 'Finance\Donors\Reporting\BranchDonorsController@donorAdoptionPDF');
        Route::get('donors', 'Finance\Donors\Reporting\DonorsListController@loadView');
        Route::get('donorwise', 'Finance\Donors\Reporting\DonorsListController@donorWisePDF');
        Route::get('donoryearwise', 'Finance\Donors\Reporting\DonorsListController@donorYearWisePDF');
        Route::get('allbranchesdonors', 'Finance\Donors\Reporting\BranchDonorsController@AllBranchDonorAdoptionPDF');
        });
    });

    Route::group(['prefix'=>'fees','as'=>'fees.'], function() {

        Route::get('/create-fee', 'Finance\Fees\FeeController@loadView');

        Route::get('/create-category', 'Finance\Fees\CreateFee\CreateCategoryController@loadView');
        Route::post('/add-category', 'Finance\Fees\CreateFee\CreateCategoryController@add');

        Route::get('/create-particulars', 'Finance\Fees\CreateFee\CreateParticularsController@loadView');
        Route::post('/add-particulars', 'Finance\Fees\CreateFee\CreateParticularsController@add');

        /*Route::get('/create-discount', 'Finance\Fees\CreateFee\CreateDiscountController@loadView');
        Route::post('/add-discount', 'Finance\Fees\CreateFee\CreateDiscountController@add');

        Route::get('/generate-fine', 'Finance\Fees\CreateFee\GenerateFineController@loadView');
        Route::post('/add-fine', 'Finance\Fees\CreateFee\GenerateFineController@add');*/

        Route::get('/fee-collect', 'Finance\Fees\FeeCollect\FeeCollectController@loadView');
        Route::post('/collect-fee', 'Finance\Fees\FeeCollect\FeeCollectController@addFeeCollection');

        Route::get('/hostel-fee-collect', 'Finance\Fees\FeeCollect\FeeCollectController@loadHostelFeeCollectView');
        Route::post('/collect-hostel-fee', 'Finance\Fees\FeeCollect\FeeCollectController@addHostelFeeCollection');

        Route::get('/fee-structure', 'Finance\Fees\FeeStructure\FeeStructureController@loadView');
        Route::post('/add-fee-structure', 'Finance\Fees\FeeStructure\FeeStructureController@add');

        Route::get('/fee-challan', 'Finance\Fees\FeeChallans\FeeChallanController@loadView');
        Route::post('/generate-fee-challan', 'Finance\Fees\FeeChallans\FeeChallanController@add');

        Route::get('/hostel-fee-generate', 'Finance\Fees\FeeGenerate\HostelFeeGenerateController@loadView');
        Route::post('/generate-hostel-fee', 'Finance\Fees\FeeGenerate\HostelFeeGenerateController@generateHostelFee');

        Route::get('/finance-category', 'Finance\FinanceCategory\FinanceCategoryController@loadView');
        Route::post('/add-finance-category', 'Finance\FinanceCategory\FinanceCategoryController@add');

        Route::get('/fee-defaulter', 'Finance\Fees\FeeDefaulters\FeeDefaulterController@loadView');
        Route::get('/fee-report', 'Finance\Fees\FeeReports\FeeReportController@loadView');

        Route::get('/fee-challan-edit', 'Finance\Fees\FeeChallans\FeeChallanController@challanEditView');
        Route::get('/fee-challan-details', 'Finance\Fees\FeeChallans\FeeChallanController@ChallanDetails');
        Route::post('/edit-fee-challan', 'Finance\Fees\FeeChallans\FeeChallanController@editChallan');

        Route::get('/fee-challan-structure-edit', 'Finance\Fees\FeeStructure\EditFeeStructureController@loadView');
        Route::get('/fee-structure-details', 'Finance\Fees\FeeStructure\EditFeeStructureController@ChallanStrucureDetails');
        Route::post('/edit-fee-challan-structure', 'Finance\Fees\FeeStructure\EditFeeStructureController@editChallanStructure');

        Route::get('/hostel-challan', 'Finance\Fees\FeeChallans\HostelFeeGenerateController@loadView');
        Route::post('/hostel-fee-challan', 'Finance\Fees\FeeChallans\HostelFeeGenerateController@generateHostelFee');

       /* Route::get('/fee-allocate', 'Finance\Fees\FeeAllocation\FeeAllocateController@loadView');
        Route::post('/allocate-fee', 'Finance\Fees\FeeAllocation\FeeAllocateController@add');

        Route::get('/create-fee-waivers', 'Finance\Fees\CreateFee\FeeWaiverController@loadView');
        Route::post('/add-waivers', 'Finance\Fees\CreateFee\FeeWaiverController@add');*/

       /* Route::get('/hostel-fee_allocate', 'Finance\Fees\FeeAllocation\FeeAllocateController@loadHostelFeeAllocation');
        Route::post('/allocate-hostel_fee', 'Finance\Fees\FeeAllocation\FeeAllocateController@allocateHostelFee');*/
        Route::get('/hostel-fee_structure', 'Finance\Fees\FeeStructure\FeeStructureController@loadFeeStructureView');
        Route::post('/add_hostel_fee_structure', 'Finance\Fees\FeeStructure\FeeStructureController@addHostelFeeStructure');

        Route::group(['prefix'=>'reports','as'=>'reports.'], function() {
            Route::get('/branchfeedefaulters', 'Finance\Fees\Reporting\FeeDefaultersReportController@searchFeeDefaulters');
            Route::get('/branchdefaultersreport', 'Finance\Fees\Reporting\FeeDefaultersReportController@FeeDefaultersPDFReport');

            Route::get('/branchfeeconcession', 'Finance\Fees\Reporting\FeeConcessionReportController@searchFeeConcession');
            Route::get('/branchfeeconcessionreport', 'Finance\Fees\Reporting\FeeConcessionReportController@FeeConcessionPDFReport');

            Route::get('/branchfeebillsummary', 'Finance\Fees\Reporting\FeeReportsController@feeBillSummary');
            Route::get('/branchfeebillreport', 'Finance\Fees\Reporting\FeeReportsController@feeBillSummaryPDFReport');

            Route::get('/branchfeebilldetail', 'Finance\Fees\Reporting\FeeReportsController@DetailfeeBillSummary');
            Route::get('/branchfeebillsdetailreport', 'Finance\Fees\Reporting\FeeReportsController@DetailfeeBillPDFReport');

            Route::get('/branchmonthreceivedfee', 'Finance\Fees\Reporting\FeeReceivedController@loadView');
            Route::get('/branchmonthreceivedfeeReport', 'Finance\Fees\Reporting\FeeReceivedController@monthlyReceivedFeePDFReport');

            Route::get('/monthlyfeedefaulters', 'Finance\Fees\Reporting\FeeDefaultersReportController@searchMonthlyFeeDefaulters');
            Route::get('/monthlydefaultersreport', 'Finance\Fees\Reporting\FeeDefaultersReportController@MonthlyFeeDefaultersPDFReport');

            Route::get('/searchhostelfeeVoucher', 'Finance\Fees\Reporting\HostelFeeReportsController@loadhostelFeeVoucherView');
            Route::get('/hostelFeeVoucherReport', 'Finance\Fees\Reporting\HostelFeeReportsController@HostelFeeVoucherPDFReport');

            Route::get('/searchfeeVoucher', 'Finance\Fees\Reporting\FeeVouchersController@loadView');
            Route::get('/FeeVoucherReport', 'Finance\Fees\Reporting\FeeVouchersController@FeeVouchersPDFReport');

        });
    });

    Route::group(['prefix'=>'transactions','as'=>'transactions.'], function() {
        Route::get('/expenses', 'Finance\Transactions\AddExpenseController@loadView');
        Route::post('/add-expenses', 'Finance\Transactions\AddExpenseController@add');

        Route::get('/income', 'Finance\Transactions\AddIncomeController@loadView');
        Route::post('/add-income', 'Finance\Transactions\AddIncomeController@add');
    });

    Route::group(['prefix'=>'vouchers','as'=>'vouchers.'], function() {

        Route::get('/create-voucher', 'Finance\Vouchers\CreateVoucherController@loadView');
        Route::get('/download-journal-pdf/{id}', 'Finance\Vouchers\CreateVoucherController@downloadDFJV');
        Route::get('/download-bank-pdf/{id}', 'Finance\Vouchers\CreateVoucherController@downloadDF');
        Route::post('/add-voucher', 'Finance\Vouchers\CreateVoucherController@add');

        Route::get('/bank-payment-voucher', 'Finance\Vouchers\BankPaymentVoucherController@loadView');
        Route::post('/add-bank-payment-voucher', 'Finance\Vouchers\BankPaymentVoucherController@add');

        Route::get('/voucher-head', 'Finance\Vouchers\VoucherHeadsController@loadView');
        Route::post('add-voucher-head', 'Finance\Vouchers\VoucherHeadsController@add');
    });

    Route::group(['prefix'=>'payslips','as'=>'payslips.'], function() {
        Route::get('/employee-payslip', 'Finance\EmployeePayslips\EmployeePayslipController@loadView');
    });

    Route::group(['prefix'=>'reports','as'=>'reports.'], function() {
        Route::get('/transaction-report', 'Finance\FinanceReports\TransactionReportController@loadView');
    });

    Route::group(['prefix'=>'assets','as'=>'assets.'], function() {
        Route::get('/', 'Finance\AssetLiabilityManagement\AssetsController@loadView');
    });

    Route::group(['prefix'=>'liability','as'=>'liability.'], function() {
        Route::get('/', 'Finance\AssetLiabilityManagement\LiabilityController@loadView');
    });

    Route::group(['prefix'=>'account-heads','as'=>'account-heads.'], function() {

        Route::get('/', 'Finance\Settings\AccountHeadsController@loadView');
        Route::post('add-account-head', 'Finance\Settings\AccountHeadsController@add');
    });

    Route::group(['prefix'=>'bank-accounts','as'=>'bank-accounts.'], function() {

        Route::get('/', 'Finance\BankAccounts\BankAccountController@loadView');
        Route::post('add-bank-account', 'Finance\BankAccounts\BankAccountController@add');
    });

    Route::group(['prefix'=>'taxes','as'=>'taxes.'], function() {

        Route::get('/tax-type', 'Finance\Taxes\TaxesController@loadView');
        Route::post('add-tax-type', 'Finance\Taxes\TaxesController@add');
    });

    Route::group(['prefix'=>'purchase','as'=>'purchase.'], function() {

        Route::get('/purchase-order', 'Finance\Purchase\PurchaseItemController@loadView');
        Route::post('add-purchase-order', 'Finance\Purchase\PurchaseItemController@add');

        Route::get('/supplier-payment', 'Finance\Purchase\SupplierPaymentController@loadView');
        Route::post('/add-payment', 'Finance\Purchase\SupplierPaymentController@add');
    });

    Route::group(['prefix'=>'settings','as'=>'settings.'], function() {

        Route::get('suppliers', 'Finance\Settings\SupplierController@loadView');
        Route::post('add-supplier', 'Finance\Settings\SupplierController@add');

        Route::get('currencies', 'Finance\Settings\CurrencyController@loadView');
        Route::post('add-currency', 'Finance\Settings\CurrencyController@add');

        Route::get('fiscalYear', 'Finance\Settings\FiscalYearController@loadView');
        Route::post('add-fiscalYear', 'Finance\Settings\FiscalYearController@add');
    });
    Route::group(['prefix'=>'reports','as'=>'reports.'], function() {

        Route::get('studentchallan', 'Finance\Fees\Reporting\StudentChallanFormController@loadView');
        Route::get('getchallan', 'Finance\Fees\Reporting\StudentChallanFormController@getPDF');

        Route::get('studenthostelchallan', 'Finance\Fees\Reporting\HostelChallanFormController@loadHostelFeeView');
        Route::get('gethostelchallan', 'Finance\Fees\Reporting\HostelChallanFormController@getHostelFeePDF');

        Route::get('searchledger', 'Finance\Reporting\LedgerReportsController@loadLedgerView');
        Route::get('generalledgerreport', 'Finance\Reporting\LedgerReportsController@ledgerPeriodWisePDF');

        Route::get('/glAccountsReport', 'Finance\Reporting\GLAccountsReportController@GLAccountReportPDF');

        Route::get('search-balance-sheet', 'Finance\Reporting\BalanceSheetReportController@loadView');
        Route::get('balance-sheet-report', 'Finance\Reporting\BalanceSheetReportController@balanceSheetPDF');

        Route::get('search-income-expenditure', 'Finance\Reporting\ExpendituresReportController@loadView');
        Route::get('income-expenditure-report', 'Finance\Reporting\ExpendituresReportController@expendituresPDFReport');
        Route::get('search-trial-balance', 'Finance\Reporting\TrialBalanceController@loadView');
        Route::get('trial-balance-report', 'Finance\Reporting\TrialBalanceController@trialBalancePDFReport');

    });
});

//
//    Route::group([
//        'middleware' => 'apiAuthenticate',
//    ], function () {
//        Route::get('api-auth' , function(){
//            dd('api-thentication done!');
//        });
//    });
//




Route::get('test' , 'SchoolImport@index');
Route::post('test-post' , 'SchoolImport@familyImport');

