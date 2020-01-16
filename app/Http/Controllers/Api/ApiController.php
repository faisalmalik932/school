<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use DB;
use App\Models\HumanResource\EmployeeModel;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ApiController extends BaseController
{

    public function getEmployees()
    {
        $employeeId = DB::table('hrm_employees_vw')->select('EMPLOYEE_ID', 'FULL_NAME', "TITLE_NAME")->get();
        return response($employeeId->toJson(), 200)->header('Content-Type', 'application/json;');
    }

    public function getClassByBranch()
    {
        $branchId = Input::get('BRANCH_ID');
        $Class = DB::table('adc_students')->distinct()->where('BRANCH_ID', '=', $branchId)->get(['CLASS']);
        return response($Class->toJson(), 200)->header('Content-Type', 'application/json;');
    }

    public function EmployeeList()
    {
        $employees = Input::get('BRANCH_ID');
        $employeeId = DB::table('hrm_employees_info')->select('EMPLOYEE_ID', 'FULL_NAME')->where('BRANCH_ID', $employees)->where('IS_DELETED', '=', 0)->get();
        return response($employeeId->toJson(), 200)->header('Content-Type', 'application/json;');
    }

    public function getEmployeesName()
    {
        if ($id = Input::get("FULL_NAME")) {
            $name = DB::table('hrm_employees_info')->select('FULL_NAME')->get();
            return response($name->toJson(), 200)->header('Content-Type', 'application/json;');
        } else {
            return null;
        }

        /*$employee = EmployeeModel::select('FULL_NAME', 'FATHER_NAME','CNIC','MOBILE_NUMBER','OFFICIAL_EMAIL','JOINING_DATE')->get();
        return response($employee->toJson(), 200)->header('Content-Type', 'application/json;');*/
    }

    public function getEmployee()
    {
        $id = Input::get("TITLE_ID");
        $emp = DB::table('hrm_employees_info')->select('EMPLOYEE_ID', 'FULL_NAME')->where('TITLE_ID', $id)->get();
        return response($emp->toJson(), 200)->header('Content-Type', 'application/json;');
    }

    public function getCity()
    {
        $city = DB::table('ptf_branches_vw')->select('CITY_NAME', 'STATE_NAME', 'COUNTRY_NAME')->get();
        return response($city->toJson(), 200)->header('Content-Type', 'application/json;');
    }

    public function getJobs()
    {
        $jobs = DB::table('hrm_job_categories')->select('JOB_CATEGORY_NAME', 'DESCRIPTION')->get();
        return response($jobs->toJson(), 200)->header('Content-Type', 'application/json;');
    }

    public function getStateList()
    {
        $id = Input::get("STATE_ID");
        $state = DB::table('ptf_loc_states')->select('STATE_ID', 'STATE_NAME')->where('STATE_ID', $id)->get();
        return response($state->tojSon());
    }

    public function getCityList()
    {
        $id = Input::get("CITY_ID");
        $city = DB::table('ptf_loc_cities')->select('CITY_ID', 'CITY_NAME', 'STATE_ID')->where('CITY_ID', $id)->get();
        return response($city->tojSon(), 200)->header('Content-Type', 'application/json;');
    }

    public function getBranchList()
    {
        $id = Input::get("CITY_ID");
        $branch = DB::table('ptf_branches')->select('BRANCH_ID', 'BRANCH_NAME')->where('CITY_ID', $id)->get();
        return response($branch->tojSon(), 200)->header('Content-Type', 'application/json;');
    }

    public function getSiblingList()
    {
        $id = Input::get("CNIC");
        $branch = DB::table('adc_students_vw')->select('STUDENT_ID', 'CNIC', 'STUDENT_NAME')->where('CNIC', $id)->get();
        return response($branch->tojSon(), 200)->header('Content-Type', 'application/json;');
    }

    public function getJobsList()
    {
        $id = Input::get("DEPARTMENT_ID");
        $title = DB::table('hrm_job_titles')->select('TITLE_NAME', 'TITLE_ID')->where('DEPARTMENT_ID', $id)->get();
        return response($title->tojSon(), 200)->header('Content-Type', 'application/json;');
    }

    public function getSearchStudentsList()
{ 
        $class = Input::get("CLASS");
        $RollNo = Input::get("ROLL_NO");
        $branch = Input::get("BRANCH_ID");
        /*dd($branch);
        exit();*/
        //return $class;
        if($class != null && $branch != null && $RollNo == null){
            $list = DB::table('adc_students_info_vw')->select('ERP_CODE', 'ROLL_NO', 'STUDENT_NAME','FULL_NAME as FATHER_NAME','BAYFORM_NO','GENDER','STATUS')->where([
                ['BRANCH_ID', '=', $branch],
                ['ROLL_NO', '=', $RollNo],
                ['CLASS', '=', $class]
            ])->get();
        }
        else if($class != null && $branch != null && $RollNo != null){
            $list = DB::table('adc_students_info_vw')->select('ERP_CODE', 'ROLL_NO', 'STUDENT_NAME','FULL_NAME as FATHER_NAME','BAYFORM_NO','GENDER','STATUS')->where([
                ['BRANCH_ID', '=', $branch],
                ['ROLL_NO', '=', $RollNo],
                ['CLASS', '=', $class]
            ])->get();
           /* )->orwhere('ROLL_NO', $RollNo)->orwhere([['CLASS', $class]])->get();*/
        }
        else{
            $list = DB::table('adc_students_info_vw')->select('ERP_CODE', 'ROLL_NO', 'STUDENT_NAME','FULL_NAME as FATHER_NAME','BAYFORM_NO','GENDER','STATUS')->get();
        }

        return response()->Json(['list' => $list])->header('Content-Type', 'application/json;');
}

public function getSearchChallansList()
{ 
        $class = Input::get("CLASS");
        $year = Input::get("YEAR");
        $month = Input::get("MONTH");
        $branch = Input::get("BRANCH_ID");
        /*dd($branch);
        exit();*/
        if($class != null && $branch != null && $year == null && $month == null){
            $list = DB::table('fin_fee_challans')->select('ORG_ID', 'CHALLAN_NO', 'PAYMENT_METHOD','FEE_STATUS')->where([
                ['BRANCH_ID', '=', $branch],
                ['YEAR', '=', $year],
                ['MONTH', '=', $month],
                ['CLASS', '=', $class]
            ])->get();/*->toSql(); //->get();
            dd($list);*/
        }
        else if($class != null && $branch != null && $year != null && $month != null){
            $list = DB::table('fin_fee_challans')->select('ORG_ID', 'CHALLAN_NO', 'PAYMENT_METHOD','FEE_STATUS')->where([
                ['BRANCH_ID', '=', $branch],
                ['YEAR', '=', $year],
                ['MONTH', '=', $month],
                ['CLASS', '=', $class]
            ])->get();
           /* )->orwhere('ROLL_NO', $RollNo)->orwhere([['CLASS', $class]])->get();*/
        }
        else{
            $list = DB::table('fin_fee_challans')->select('ORG_ID', 'CHALLAN_NO', 'PAYMENT_METHOD','FEE_STATUS')->get();
        }

        return response()->Json(['list' => $list])->header('Content-Type', 'application/json;');
}

    public function getStudentsList()
    {
        $class = Input::get("CLASS");
        $RollNo = Input::get("ROLL_NO");
        $branch = Input::get("BRANCH_ID");
        $list = DB::table('adc_students_vw')->select('STUDENT_ID', 'STUDENT_NAME', 'FULL_NAME', 'BAYFORM_NO', 'GENDER', 'STATUS')
            ->where('ROLL_NO', $RollNo)->orwhere([['CLASS', $class], ['BRANCH_ID', $branch]])->get();
        return response()->Json(['list' => $list])->header('Content-Type', 'application/json;');
    }

    public function getSections()
    {
        $id = Input::get("CLASS");
        // $branch = Input::get("BRANCH_ID"); ,['BRANCH_ID',$branch]
        $title = DB::table('adc_sections')->select('SECTION_ID','SECTION_NAME')->where([['CLASS',$id]])->get();

        return response ($title->tojSon(), 200)->header('Content-Type', 'application/json;');
    }

    public function getClasses()
    {
        $id = Input::get("BRANCH_ID");
        $class = DB::table('adc_classes')->select('CLASS_ID', 'CLASS_NAME')->where('BRANCH_ID', $id)->get();
        return response($class->tojSon(), 200)->header('Content-Type', 'application/json;');
    }

    public function getStudents()
    {
        $class = Input::get("CLASS");
        $branch = Input::get("BRANCH_ID");
        $students = DB::table('adc_students')->select('STUDENT_ID', 'FULL_NAME')->where([['CLASS', $class], ['BRANCH_ID', $branch]
            , ['STATUS', '=', 'ACTIVE'], ['IS_DELETED', '=', '0']])->get();
        return response($students->tojSon(), 200)->header('Content-Type', 'application/json;');
    }

    public function getHostelStudents()
    {
        $id = Input::get("CLASS");
        $hostel = Input::get("HOSTEL_ID");
        $class = DB::table('adc_students_vw')->select('STUDENT_ID', 'STUDENT_NAME')->where([['CLASS', $id], ['HOSTEL_ID', $hostel]])->get();
        return response($class->tojSon(), 200)->header('Content-Type', 'application/json;');
    }

    public function getAccountHeads()
    {
        $assets = Input::get("ASSETS");
        $liabilities = Input::get("LIABILITIES");
        $equity = Input::get("EQUITY");
        $income = Input::get("INCOME");
        $expense = Input::get("EXPENSE");
        $result = DB::table('fin_gl_accounts')->select('ACCOUNT_HEAD_ID', 'ACCOUNT_HEADS', 'HEAD_PARENT_ID', 'ACCOUNT_HEAD_CODE')
            ->where('CLASS_TYPE', $assets)
            ->orwhere('CLASS_TYPE', $liabilities)->orwhere('CLASS_TYPE', $equity)
            ->orwhere('CLASS_TYPE', $income)->orwhere('CLASS_TYPE', $expense)->orderBy('ACCOUNT_HEAD_CODE', 'asc')->get();
        return response($result->tojSon(), 200)->header('Content-Type', 'application/json;');
    }

    public function getfeeCategory()
    {
        $feeCategory = DB::table('fin_fee_challan_categories')->select('CATEGORY_ID', 'CATEGORY_NAME')->get();
        return response($feeCategory->tojSon(), 200)->header('Content-Type', 'application/json;');
    }

    public function getDonorList()
    {
        $donors = DB::table('adc_donors')->select('DONOR_ID', 'DONOR_NAME')->get();
        return response($donors->tojSon(), 200)->header('Content-Type', 'application/json;');
    }

    public function getDepartmentList()
    {
        $departments = Input::get("EMPLOYEE_TYPE");
        $department = DB::table('hrm_departments')->select('DEPARTMENT_ID', 'DEPARTMENT_NAME')->where('EMPLOYEE_TYPE', $departments)->get();
        return response($department->tojSon(), 200)->header('Content-Type', 'application/json;');
    }

    public function getFeeCategories()
    {
        $feecategories = DB::table('fin_fee_challan_categories')->select('FEE_CATEGORY_ID', 'CATEGORY_NAME')->toSql();
        return response($feecategories->tojSon(), 200)->header('Content-Type', 'application/json;');
    }

    public function getFeeSubCategories()
    {
        $feecategory = Input::get("FEE_CATEGORY_ID");
        $feesubcategories = DB::table('fin_fee_challan_particulars')->select('FEE_PARTICULAR_ID', 'PARTICULAR_NAME')->where('FEE_CATEGORY_ID', $feecategory)->get();
        // return response()->json($feesubcategories);
        return response($feesubcategories->tojSon(), 200)->header('Content-Type', 'application/json;');
    }

    public function getFeeParticulars()
    {
        $feesubcategories = DB::table('fin_fee_particulars')->select('FEE_PARTICULAR_ID', 'PARTICULAR_NAME')->get();
        return response($feesubcategories->tojSon(), 200)->header('Content-Type', 'application/json;');
    }

    public function getDepartments()
    {
        $department = DB::table('hrm_departments')->select('DEPARTMENT_ID', 'DEPARTMENT_NAME')->get();
        return response($department->tojSon(), 200)->header('Content-Type', 'application/json;');
    }

    public function getDepartmentsByBranch()
    {
        $branch = Input::get('BRANCH_ID');
        $department = DB::table('hrm_departments')->select('DEPARTMENT_ID', 'DEPARTMENT_NAME')->where('BRANCH_ID', $branch)->get();
        return response($department->tojSon(), 200)->header('Content-Type', 'application/json;');
    }

    public function getEmployeesList()
    {
        $employee = DB::table('hrm_employees_vw')->select('EMPLOYEE_ID', 'FULL_NAME')->get();
        return response($employee->tojSon(), 200)->header('Content-Type', 'application/json;');
    }

    public function getLeaveType()
    {
        $leavetype = DB::table('hrm_leave_types')->select('LEAVE_TYPE_ID', 'LEAVE_TYPE_NAME')->get();
        return response($leavetype->tojSon(), 200)->header('Content-Type', 'application/json;');
    }

    public function EmployeesList()
    {
        $branch = Input::get("BRANCH_ID");
        $depart = Input::get("DEPARTMENT_ID");
        $desig = Input::get("TITLE_ID");
        $empl = Input::get("EMPLOYEE_ID");
        $employee = DB::table('hrm_employees_vw')
            ->select('EMPLOYEE_ID', 'FULL_NAME', 'TITLE_ID',
                'TITLE_NAME', 'DEPARTMENT_ID', 'DEPARTMENT_NAME',
                'BRANCH_ID', 'BRANCH_NAME', 'MOBILE_NUMBER', 'CURRENT_ADDRESS', 'PERSONAL_EMAIL')
            ->where('BRANCH_ID', '=', $branch)->orwhere('DEPARTMENT_ID', '=', $depart)->orwhere('TITLE_ID', $desig)->orwhere('EMPLOYEE_ID', $empl)->get();
        return response()->Json(['list' => $employee])->header('Content-Type', 'application/json;');
    }

    public function FeeList()
    {
        $feecat = Input::get("FEE_CATEGORY_ID");
        $feesub = Input::get("FEE_PARTICULAR_ID");
        $categories = DB::table('fin_fee_particular_vw')
            ->select('FEE_PARTICULAR_ID', 'PARTICULAR_NAME', 'FEE_CATEGORY_ID', 'CATEGORY_NAME')->where('FEE_CATEGORY_ID', $feecat)
            ->where('FEE_PARTICULAR_ID', $feesub)->get();
        return response()->Json(['list' => $categories])->header('Content-Type', 'application/json;');
    }

    public function getHostelList()
    {
        $branch = Input::get("BRANCH_ID");
        $hostel = DB::table('ptf_hostels')->select('HOSTEL_ID', 'HOSTEL_NAME')->where('BRANCH_ID', $branch)->get();
        return response($hostel->tojSon(), 200)->header('Content-Type', 'application/json;');
    }

    public function getEntitlements()
    {
        $employee = Input::get("EMPLOYEE_ID");
        $leaveperiodstart = Input::get("LEAVE_PERIOD_START");
        $leaveperiodend = Input::get("LEAVE_PERIOD_END");
        $leavetype = Input::get("LEAVE_TYPE");
        $detail = DB::select("call hrm_employee_entitlement_proc(?,?,?,?)", [$employee, $leavetype, $leaveperiodstart, $leaveperiodend]);
        return response()->Json(['list' => $detail])->header('Content-Type', 'application/json;');
    }

    public function getBankDetails()
    {
        $supplier = Input::get("SUPPLIER_ID");
        $hostel = DB::table('fin_suppliers')->select('BANK_NAME', 'BANK_ACCOUNT_NUMBER')->where('SUPPLIER_ID', $supplier)->get();
        return response($hostel->tojSon(), 200)->header('Content-Type', 'application/json;');
    }

    public function getLegerAccount()
    {
        $result = DB::table('fin_gl_accounts')->select('ACCOUNT_HEAD_ID', 'ACCOUNT_HEADS', 'HEAD_PARENT_ID', 'ACCOUNT_HEAD_CODE')->orderBy('ACCOUNT_HEAD_CODE', 'asc')->get();
        return response($result->tojSon(), 200)->header('Content-Type', 'application/json;');
    }

    public function getAllStudentsForFeeCollection()
    {
        $result = DB::table('fin_challan_students_vw')->where('FEE_STATUS', '=', 'UNPAID')->select('STUDENT_ID', 'STUDENT_NAME', 'STUDENT_CODE', 'CHALLAN_NO', 'FEE_STATUS', 'CLASS', 'MONTH', 'YEAR')->orderBy('CHALLAN_NO', 'asc')->get();
        return response()->Json(['list' => $result])->header('Content-Type', 'application/json;');
    }

    public function HostelStudents()
    {
        $result = DB::table('fin_hostel_fee_challan')->where('FEE_STATUS', '=', 'UNPAID')->select('STUDENT_ID', 'CHALLAN_NO', 'FEE_STATUS', 'HOSTEL_FEE_CHALLAN_ID')->get();
        return response()->Json(['list' => $result])->header('Content-Type', 'application/json;');
    }

    public function getAllHostelStudents()
    {
        $hostel = Input::get("HOSTEL_ID");
        $result = DB::table('adc_students_vw')->select('STUDENT_ID', 'STUDENT_NAME')->where('HOSTEL_ID', $hostel)->get();
        return response($result->tojSon(), 200)->header('Content-Type', 'application/json;');
    }

    public function FeeCategories()
    {
        $header = Input::get("FEE_CATEGORY_TYPE");
        $result = DB::table('fin_fee_challan_categories')->select('FEE_CATEGORY_ID', 'CATEGORY_NAME')->where('FEE_CATEGORY_TYPE', $header)->get();
        return response($result->tojSon(), 200)->header('Content-Type', 'application/json;');
    }

    public function AccountHeads()
    {
        $result = DB::table('fin_gl_accounts')->select('ACCOUNT_HEAD_ID', 'ACCOUNT_HEADS', 'HEAD_PARENT_ID', 'ACCOUNT_HEAD_CODE', 'CLASS_TYPE')
            ->orderBy('ACCOUNT_HEAD_CODE', 'asc')->get();
        return response($result->tojSon(), 200)->header('Content-Type', 'application/json;');
    }

    public function getChallanDetail()
    {
        $result = DB::table('fin_fee_challans')->select('CHALLAN_NO', 'CLASS', 'YEAR', 'MONTH')
            ->orderBy('CLASS', 'asc')->get();
        return response()->Json(['list' => $result])->header('Content-Type', 'application/json;');
    }

    public function getCompleteChallanDetail()
    {
        $challan = Input::get("CHALLAN_ID");
        $result = DB::table('fin_fee_bills_detail_vw')->select('PARTICULAR_NAME', 'AMOUNT', 'BRANCH_NAME', 'CLASS', 'STUDENT_NAME')
            ->where([['CHALLAN_ID', $challan], ['FEE_CATEGORY_TYPE', '=', 'SCHOOL']])
            ->orderBy('CLASS', 'asc')->get();
            // dd($result);
        // return response()->json($result);

        return response($result->tojSon(), 200)->header('Content-Type', 'application/json;');
    }

    public function getHostelChallanDetail()
    {
        $challan = Input::get("CHALLAN_ID");
        $result = DB::table('fin_hostel_fee_challan_details')->select('FEE_CATEGORY_TYPE', 'AMOUNT', 'FEE_PERIOD')
            ->where('HOSTEL_FEE_CHALLAN_ID', $challan)
            ->get();
        return response($result->tojSon(), 200)->header('Content-Type', 'application/json;');
    }

    public function bankLedgerAccount()
    {
        $header = Input::get("BANK_NAME");
        $result = DB::table('fin_bank_accounts_vw')->select('GL_CODE', 'PARENT_ACCOUNT_NAME')->where('BANK_NAME', $header)->get();
        return response($result->tojSon(), 200)->header('Content-Type', 'application/json;');
    }

    public function bankAccountTransactions()
    {
        $result = DB::table('fin_journal_voucher_vw')
            ->select('TRANSACTION_DATE', 'TRANSACTION_CODE', 'LEDGER_ACCOUNT_NAME', 'DEBIT_AMOUNT', 'CREDIT_AMOUNT')
            ->where('TRANSACTION_CODE_PREFIX', 'BPV')->orderBy('TRANSACTION_CODE')->get();
        return response()->Json(['list' => $result])->header('Content-Type', 'application/json;');
    }

    public function getPendingFees()
    {
        $result = DB::table('fin_fee_bills_vw')->groupBy('MONTH')->sum('AMOUNT');
        return response()->Json(['list' => $result])->header('Content-Type', 'application/json;');
    }

    public function getSalaryCategories()
    {
        $result = DB::table('hrm_salary_categories')->select('SALARY_CATEGORY_ID', 'CATEGORY_NAME')->where('IS_DELETED', 0)->get();
        return response($result->tojSon(), 200)->header('Content-Type', 'application/json;');
    }

    public function getClassByStudents()
    {
        $student = Input::get("STUDENT_ID");
        $result = DB::table('adc_students_info_vw')->select('CLASS')->where('STUDENT_ID', $student)->get();
        return response($result->tojSon(), 200)->header('Content-Type', 'application/json;');
    }


    public function getLineChart(Request $request)
    {
        // $paid = DB::table('fin_fee_bills_vw')->where('FEE_STATUS' , 'PAID')
        // ->groupBy('MONTH')->sum('AMOUNT');
        //    // ->where('YEAR', $request->year)
        // $unpaid = DB::table('fin_fee_bills_vw')->where('FEE_STATUS' , 'UNPAID')->groupBy('MONTH')->sum('AMOUNT');
        // // $defaulters = DB::select("call fin_fee_defaulters_monthly_proc(?,?,?)", [$feeChallanVO->getBranchId(),$feeChallanVO->getYear() ,$feeChallanVO->getMonth()]);

        // $fund =  DB::table('fin_fee_challan_vw')
        //                ->where('PARTICULAR_NAME', '!=', 'NO')
        //                ->where('FEE_CATEGORY_TYPE', '=', 'DISCOUNTS')
        //                ->sum('AMOUNT');

        $result = DB::select("call chart(?)", [$request->year]);
        $collection = collect($result);
        // return response()->json($collection);
        $jan = ($collection->where('MONTH', 'JAN')) ? $collection->where('MONTH', 'JAN')->first() : 0;
        $feb = ($collection->where('MONTH', 'FEB')) ? $collection->where('MONTH', 'FEB')->first() : 0;
        $mar = ($collection->where('MONTH', 'MAR')) ? $collection->where('MONTH', 'MAR')->first() : 0;
        $apr = ($collection->where('MONTH', 'APR')) ? $collection->where('MONTH', 'APR')->first() : 0;
        $may = ($collection->where('MONTH', 'MAY')) ? $collection->where('MONTH', 'MAY')->first() : 0;
        $jun = ($collection->where('MONTH', 'JUN')) ? $collection->where('MONTH', 'JUN')->first() : 0;
        $jul = ($collection->where('MONTH', 'JUL')) ? $collection->where('MONTH', 'JUL')->first() : 0;
        $aug = ($collection->where('MONTH', 'AUG')) ? $collection->where('MONTH', 'AUG')->first() : 0;
        $sep = ($collection->where('MONTH', 'SEP')) ? $collection->where('MONTH', 'SEP')->first() : 0;
        $oct = ($collection->where('MONTH', 'OCT')) ? $collection->where('MONTH', 'OCT')->first() : 0;
        $nov = ($collection->where('MONTH', 'NOV')) ? $collection->where('MONTH', 'NOV')->first() : 0;
        $dec = ($collection->where('MONTH', 'DEC')) ? $collection->where('MONTH', 'DEC')->first() : 0;
        return response()->json(['jan' => $jan, 'feb' => $feb, ' mar' => $mar, 'apr' => $apr, 'may' => $may, 'jun' => $jun, 'jul' => $jul, 'aug' => $aug, 'sep' => $sep, 'oct' => $oct, 'nov' => $nov, 'dec' => $dec]);
    }


}