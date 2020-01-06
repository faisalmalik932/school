<?php
/**
 * ************************************************************************
 *  *
 *  * PROSIGNS CONFIDENTIAL
 *  * __________________
 *  *
 *  *  Copyright (c) 2017. Prosigns Technologies
 *  *  All Rights Reserved.
 *  *
 *  * NOTICE:  All information contained herein is, and remains
 *  * the property of Prosigns Technologies and its suppliers,
 *  * if any.  The intellectual and technical concepts contained
 *  * herein are proprietary to Prosigns Technologies
 *  * and its suppliers and may be covered by Pakistan and Foreign Patents,
 *  * patents in process, and are protected by trade secret or copyright law.
 *  * Dissemination of this information or reproduction of this material
 *  * is strictly forbidden unless prior written permission is obtained
 *  * from Prosigns Technologies.
 *
 */

/**
 * Product Name: IntelliJ IDEA.
 * Developer Name: by nayab on 07-Aug-17 / 5:01 PM
 * All information contained herein is, and remains
 * the property of Prosigns Technologies
 */

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Platform\BranchesController;
use App\Models\Finance\Fees\FeeChallanModel;
use App\Models\Finance\Settings\FiscalYearModel;
use App\Models\HumanResource\EmployeeModel;
use App\Models\Platform\BranchModel;
use App\Models\Platform\HostelModel;
use App\Models\Registration\StudentModel;
use Illuminate\Http\Request;
use App\Models\Finance\Fees\FeeStructureModel;
use Illuminate\Support\Facades\Input;

class DashboardController extends BaseController
{

    public function loadView(Request $request) {
         $fis = new FeeStructureModel();
        $fis = $fis->getAllFiscalYear();
        // return response()->json();
        $branchType = $request->session()->get('BRANCH_TYPE');
        /*$branch = request()->session()->get('BRANCH_ID');*/
        //echo $branch;
        $branch = $key = Input::get('branch');
        $branchid = trim($branch,"school-");
        $request->session()->put('BRANCH_ID', $branchid);
        //echo $branchid;
        $feechallanModel = new FeeChallanModel();
        $branchName = 'ALL';
        if ($branchType == 'hostel') {
            $column = 'HOSTEL_ID';
        } else if ($branchType == 'school') {
            $schoolModel = new BranchModel();
            if(!empty($request->session()->get('BRANCH_ID'))){
                $branchName = $schoolModel->getBranchName($request->session()->get('ORG_ID'), $request->session()->get('BRANCH_ID'));
            }
            $request->session()->put('SELECTED_BRANCH_NAME', $branchName);
        }
        $fiscalYearModel = new FiscalYearModel();
        $fiscalYear = $fiscalYearModel->getCurrentFiscalYear();
        if(!$fiscalYear->first()){
            $fiscalyear = "";
        }
        else{
            $fiscalyear = $fiscalYear->first()->FISCAL_YEAR;
        }
        $studentModel = new StudentModel();
        $employeeModel = new EmployeeModel();
        return view('Dashboard.dashboard', ['branch' => $request->input('branch')])
            ->with('newstudents', $studentModel->totalNewStudents($request->session()->get('ORG_ID'), $request->session()->get('BRANCH_ID'), $request->session()->get('BRANCH_TYPE')))
            ->with('totalstudents', $studentModel->totalStudents($request->session()->get('ORG_ID'), $request->session()->get('BRANCH_ID'), $request->session()->get('BRANCH_TYPE')))
            ->with('totalemployee', $employeeModel->totalEmployees($request->session()->get('ORG_ID'), $request->session()->get('BRANCH_ID'), $request->session()->get('BRANCH_TYPE')))
            ->with('totalmalestudents', $studentModel->totalMaleStudents($request->session()->get('ORG_ID'), $request->session()->get('BRANCH_ID'), $request->session()->get('BRANCH_TYPE')))
            ->with('totalfemalestudents', $studentModel->totelFemaleStudents($request->session()->get('ORG_ID'), $request->session()->get('BRANCH_ID'), $request->session()->get('BRANCH_TYPE')))
            ->with('branchname', $branchName)
            ->with('fiscalyear', $fiscalyear)
            ->with('fis', $fis)
            ->with('pebFeeTotal', $feechallanModel->getTotalFeePaidByPeb())
            ->with('bankFeeTotal', $feechallanModel->getTotalFeePaidByBank())
            ->with('unpaidFeeTotal', $feechallanModel->getTotalFeeUnpaid());
    }

    public function topbarSession(Request $request){
        $branch = $key = $request->branch;
        $branchid = trim($branch,"school-");
        $request->session()->put('BRANCHDATA', $request->branch);
        $branchType = $request->session()->get('BRANCH_TYPE');
        /*$branch = request()->session()->get('BRANCH_ID');*/
        //echo $branch;
        $request->session()->put('BRANCH_ID', $branchid);
        //echo $branchid;
        $feechallanModel = new FeeChallanModel();
        $branchName = 'ALL';
        if ($branchType == 'hostel') {
            $column = 'HOSTEL_ID';
        } else if ($branchType == 'school') {
            $schoolModel = new BranchModel();
            if(!empty($request->session()->get('ORG_ID')) && !empty($request->session()->get('BRANCH_ID')))
            $branchName = $schoolModel->getBranchName($request->session()->get('ORG_ID'), $request->session()->get('BRANCH_ID'));
           /* echo( $request->session()->get('BRANCH_ID'));*/
            $request->session()->put('SELECTED_BRANCH_NAME', $branchName);
        }
        $fiscalYearModel = new FiscalYearModel();
        $fiscalYear = $fiscalYearModel->getCurrentFiscalYear();
        $studentModel = new StudentModel();
        $employeeModel = new EmployeeModel();
        $branchID = '';
        return response()->json(['message' => 'success' , 'branch' => $request->branch]);
        return redirect()->back()
            ->with('newstudents', $studentModel->totalNewStudents($request->session()->get('ORG_ID'), $request->session()->get('BRANCH_ID'), $request->session()->get('BRANCH_TYPE')))
            ->with('totalstudents', $studentModel->totalStudents($request->session()->get('ORG_ID'), $request->session()->get('BRANCH_ID'), $request->session()->get('BRANCH_TYPE')))
            ->with('totalemployee', $employeeModel->totalEmployees($request->session()->get('ORG_ID'), $request->session()->get('BRANCH_ID'), $request->session()->get('BRANCH_TYPE')))
            ->with('totalmalestudents', $studentModel->totalMaleStudents($request->session()->get('ORG_ID'), $request->session()->get('BRANCH_ID'), $request->session()->get('BRANCH_TYPE')))
            ->with('totalfemalestudents', $studentModel->totelFemaleStudents($request->session()->get('ORG_ID'), $request->session()->get('BRANCH_ID'), $request->session()->get('BRANCH_TYPE')))
            ->with('branchname', $branchName)
            ->with('fiscalyear', $fiscalYear[0]->FISCAL_YEAR)
            ->with('feetotal', $feechallanModel->getfeetotalForDashboard());
        // return response()->json(['status' => 'successful' , 'message' => 'ok']);
    }
}