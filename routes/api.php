<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['pebBasicAuth'])->group(function () {
    Route::group(['prefix'=>'hbl','as'=>'hbl.'], function(){
        Route::get('/challan/', 'Api\HblController@error');
        Route::get('/challan/{challan}', 'Api\HblController@verifyChallan');
        Route::get('/challan/status/{challan}/{transaction}/{status}', 'Api\HblController@updateChallan');
    });
});

Route::get('/seed/{codename}',[ 'uses' => 'Common\SeedController@fetchSeedValues']);
Route::get('/dropdown/{codename}',[ 'uses' => 'Common\DropDownController@fetchDropDownList']);

Route::group(['prefix'=>'datatable','as'=>'datatable.'], function(){
Route::get('/header/{codename}', 'Common\DataTableController@fetchDataTableHeader');
Route::post('/data/{codename}', 'Common\DataTableControllers@fetchDataTable');
});
Route::post('/delete/{codename}/{id}',[ 'uses' => 'Common\PageController@deleteRecord']);
Route::get('/fetch/{codename}/{id}',[ 'uses' => 'Common\PageController@fetchPageData']);


Route::get('/stateList',[ 'uses' => 'Api\ApiController@getStateList']);
Route::get('/cityList',[ 'uses' => 'Api\ApiController@getCityList']);
Route::get('/employeeList',[ 'uses' => 'Api\ApiController@getEmployee']);
Route::get('/showCities',[ 'uses' => 'Api\ApiController@getCity']);
Route::get('/showSiblings',[ 'uses' => 'Api\ApiController@getSiblingList']);
Route::get('/showStudents',[ 'uses' => 'Api\ApiController@getStudentList']);
Route::get('/getEmployees',[ 'uses' => 'Api\ApiController@getEmployees']);
Route::get('/showList',[ 'uses' => 'Api\ApiController@getSearchStudentsList']);
Route::get('/jobTitlesList',[ 'uses' => 'Api\ApiController@getJobsList']);
Route::get('/getSections',[ 'uses' => 'Api\ApiController@getSections']);
Route::get('/classList',[ 'uses' => 'Api\ApiController@getClasses']);
Route::get('/getStudentList',[ 'uses' => 'Api\ApiController@getStudents']);
Route::get('/getHostelStudentList',[ 'uses' => 'Api\ApiController@getHostelStudents']);
Route::get('/accountHeads',[ 'uses' => 'Api\ApiController@getAccountHeads']);
Route::get('/employeesList',[ 'uses' => 'Api\ApiController@EmployeeList']);
Route::get('/getFeeCategory',[ 'uses' => 'Api\ApiController@getfeeCategory']);
Route::get('/getDonorList',[ 'uses' => 'Api\ApiController@getDonorList']);
Route::get('/getDepartmentList',[ 'uses' => 'Api\ApiController@getDepartmentList']);
Route::get('/getFeeCHALLANCategories',[ 'uses' => 'Api\ApiController@getFeeCategories']);
Route::get('/getFeeSubCategories',[ 'uses' => 'Api\ApiController@getFeeSubCategories']);
Route::get('/getFeeParticulars',[ 'uses' => 'Api\ApiController@getFeeParticulars']);
Route::get('/getHrmDepartments',[ 'uses' => 'Api\ApiController@getDepartments']);
Route::get('/getHrmEmployees',[ 'uses' => 'Api\ApiController@getEmployeesList']);
Route::get('/HrmEmployees',[ 'uses' => 'Api\ApiController@EmployeesList']);
Route::get('/FeeList',[ 'uses' => 'Api\ApiController@FeeList']);
Route::get('/hostelList',[ 'uses' => 'Api\ApiController@getHostelList']);
Route::get('/getLeaveTypes',[ 'uses' => 'Api\ApiController@getLeaveType']);
Route::get('/EmployeeEntitlements',[ 'uses' => 'Api\ApiController@getEntitlements']);
Route::get('/getbankdetails',[ 'uses' => 'Api\ApiController@getBankDetails']);
Route::get('/getledgeraccount',[ 'uses' => 'Api\ApiController@getLegerAccount']);
Route::get('/getallStudents',[ 'uses' => 'Api\ApiController@getAllStudentsForFeeCollection']);
Route::get('/hostelStudents',[ 'uses' => 'Api\ApiController@HostelStudents']);
Route::get('/getallhostelStudents',[ 'uses' => 'Api\ApiController@getAllHostelStudents']);
Route::get('/getclassbystudents',[ 'uses' => 'Api\ApiController@getClassByStudents']);
Route::get('/getfeeCategories',[ 'uses' => 'Api\ApiController@FeeCategories']);
Route::get('/glaccounts',[ 'uses' => 'Api\ApiController@AccountHeads']);
Route::get('/getchallandetails',[ 'uses' => 'Api\ApiController@getChallanDetail']);
Route::get('/getchallancompeltedetails',[ 'uses' => 'Api\ApiController@getCompleteChallanDetail']);
Route::get('/gethostaldet',[ 'uses' => 'Api\ApiController@getHostelChallanDetail']);
Route::get('/getbankaccount',[ 'uses' => 'Api\ApiController@bankLedgerAccount']);
Route::get('/getbpvdetails',[ 'uses' => 'Api\ApiController@bankAccountTransactions']);
Route::get('/getpendingfees',[ 'uses' => 'Api\ApiController@getPendingFees']);
Route::get('/getfeecharts',[ 'uses' => 'Api\ApiController@getLineChart']);
Route::get('/getdepartmentsbybranch',[ 'uses' => 'Api\ApiController@getDepartmentsByBranch']);
Route::get('/getsalaryCategories',[ 'uses' => 'Api\ApiController@getSalaryCategories']);
Route::get('/getClassesByBranch',[ 'uses' => 'Api\ApiController@getClassByBranch']);