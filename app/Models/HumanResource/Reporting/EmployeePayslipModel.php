<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 10/17/2017
 * Time: 5:31 PM
 */

namespace App\Models\HumanResource\Reporting;


use App\Models\BaseModel;
use App\Vos\HumanResourceVOS\EmployeePayslipVO;
use DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class EmployeePayslipModel extends BaseModel
{
    protected $primaryKey = 'PAYSLIP_STRUCURE_ID';
    protected $table = 'hrm_employee_salary_structure';
    protected $fillable = ['EMPLOYEE_ID','DEPARTMENT_ID','TITLE_ID','BRANCH_ID','SALARY_CATEGORY_ID','AMOUNT' , 'SALARY_TYPE'];

    public function payslipStructure(Collection $collection)
    {
        // dd($collection->all());
        $collection->each(function($vo) {
            $result = $this->select()->where([['BRANCH_ID','=',$vo->getBranchId()],
                ['DEPARTMENT_ID','=',$vo->getDepartmentID()],['TITLE_ID','=',$vo->getTitleID()],['EMPLOYEE_ID','=',$vo->getEmployeeId()],
                ['SALARY_CATEGORY_ID','=',$vo->getSalaryCategoryId()],['AMOUNT','=',$vo->getAmount()]])->get();
            if (count($result) > 0) {
                $vo->setErrorResponse(true, '0000038');
            } else {
                $this->insert(array(
                    'EMPLOYEE_ID'=>$vo->getEmployeeId(),
                    'BRANCH_ID' => $vo->getBranchId(),
                    'DEPARTMENT_ID'=>$vo->getDepartmentID(),
                    'TITLE_ID'=>$vo->getTitleID(),
                    'CREATED_BY'=>$vo->getCreatedBy(),
                    'SALARY_CATEGORY_ID'=>$vo->getSalaryCategoryId(),
                    'AMOUNT'=>$vo->getAmount(),
                    'SALARY_TYPE' => $vo->getSalaryType()));
            }
        });
    }

    public function Updatepayslip(EmployeePayslipVO $employeePayslipVO)
    {
        $this->where('PAYSLIP_STRUCURE_ID','=',$employeePayslipVO->getPayslipId())
            ->update(['EMPLOYEE_ID'=>$employeePayslipVO->getEmployeeId(),
                'BASIC_SALARY'=>$employeePayslipVO->getBasicSalary(),
                'HOUSE_RENT'=>$employeePayslipVO->getHouseRent(),
                'UTILITY_ALLOWANCE'=>$employeePayslipVO->getUtilityAllowance(),
                'ADVANCED_SALARY'=>$employeePayslipVO->getAdvance(),
                'BRANCH_ID'=>$employeePayslipVO->getBranchId(),
                'DEPARTMENT_ID'=>$employeePayslipVO->getDepartmentID(),
                'TITLE_ID'=>$employeePayslipVO->getTitleID(),
                'UPDATED_BY' => $employeePayslipVO->getModifiedBy(),
                'UPDATED_AT' => $employeePayslipVO->getModifiedAt()]);
    }

    public function getPayslip(EmployeePayslipVO $employeePayslipVO)
    {
        $payslip = DB::table('hrm_employees_payslip_vw')
            ->where([['YEAR','=',$employeePayslipVO->getYear()],
                ['MONTH','=',$employeePayslipVO->getMonth()],['EMPLOYEE_ID',$employeePayslipVO->getEmployeeId()]])
            ->get();
        if(count($payslip)>0) {
            return $payslip;
        }
        else{
            $employeePayslipVO->setErrorResponse(true, '0000046');
        }
    }

    public function getPayslipDetails(EmployeePayslipVO $employeePayslipVO , $id)
    {
        $payslip = DB::table('hrm_employees_payslip_pdf_vw')
            ->where([['YEAR','=',$employeePayslipVO->getYear()],
                ['MONTH','=',$employeePayslipVO->getMonth()],['EMPLOYEE_ID',$employeePayslipVO->getEmployeeId()] , ['PAYSLIP_ID' , $id[0]->first()->PAYSLIP_ID]])
            ->get();
        if(count($payslip)>0) {
            return $payslip;
        }
        else{
            $employeePayslipVO->setErrorResponse(true, '0000046');
        }
    }

    public function getPayslipCategories(EmployeePayslipVO $employeePayslipVO)
    {
        $payslip = DB::table('hrm_employees_payslip_vw')->select('CATEGORY_NAME','AMOUNT','EMPLOYEE_ID')->where([['YEAR','=',$employeePayslipVO->getYear()],
            ['MONTH','=',$employeePayslipVO->getMonth()],['EMPLOYEE_ID',$employeePayslipVO->getEmployeeId()]])->get();
        if(count($payslip)>0) {
            return $payslip;
        }
        else{
            $employeePayslipVO->setErrorResponse(true, '0000046');
        }
    }

    public function getPayslipDeductionCategories(EmployeePayslipVO $employeePayslipVO)
    {
        $payslip = DB::table('hrm_employees_salary_deduction_vw')->select('CATEGORY_NAME','AMOUNT','EMPLOYEE_ID')->where([['YEAR','=',$employeePayslipVO->getYear()],
            ['MONTH','=',$employeePayslipVO->getMonth()],['EMPLOYEE_ID',$employeePayslipVO->getEmployeeId()]])->groupBy('CATEGORY_NAME','AMOUNT','EMPLOYEE_ID')->get();
        return $payslip;
    }

    public function getGrossPay(EmployeePayslipVO $employeePayslipVO)
    {
        $total = DB::table('hrm_employees_payslip_pdf_vw')->where([['EMPLOYEE_ID',$employeePayslipVO->getEmployeeId()]])->sum('AMOUNT');
        return $total;
    }


    public function getallPayslips()
    {
        $payslip = DB::table('hrm_employees_payslip_vw')
            ->distinct()
            ->get(['FULL_NAME','MONTH','YEAR','DOB','JOINING_DATE','SUM_SALARY','DEDUCTION_AMOUNT','NET_SALARY']);
        return $payslip;
    }

    public function getallPayslipDetails()
    {
        $payslipDetail = DB::table('hrm_employees_payslip_vw')
            ->distinct()
            ->get(['FULL_NAME','CATEGORY_NAME','MONTH','YEAR','AMOUNT']);
        return $payslipDetail;
    }

    public function getallPayslipCategories()
    {
        $payslipDetail = DB::table('hrm_salary_categories')
            ->distinct()
            ->get(['CATEGORY_NAME']);
        return $payslipDetail;
    }


    public function salarySummary(EmployeePayslipVO $employeePayslipVO)
    {
        $summary = DB::table('hrm_summary_view')->where('YEAR' , $employeePayslipVO->getYear())->orderBy('MONTH')->get();
        if(count($summary)>0){
            return $summary;
        }
        else{
            $employeePayslipVO->setErrorResponse(true, '0000046');
        }
    }

    public function getSeedMonths(){
        return DB::table('ptf_seed_codes')->where('CODE_NAME' , 'MONTH')->get();
    }

    public function getPayslipStructure($branch,$department,$title,$employee)
    {
        if (count($branch)>0&&count($department)>0&&count($title)>0&&count($employee)>0)
        {
            $details = $this->select('EMPLOYEE_ID','DEPARTMENT_ID','TITLE_ID','SALARY_CATEGORY_ID','AMOUNT' , 'SALARY_TYPE')
                ->where([['BRANCH_ID', '=', $branch],
                    ['DEPARTMENT_ID','=',$department],['TITLE_ID','=',$title]
                    ,['EMPLOYEE_ID','=',$employee]])
                // ->groupBy('EMPLOYEE_ID','DEPARTMENT_ID','TITLE_ID')
                ->get();
        }
        elseif (count($branch)>0&&count($department)>0&&count($title)>0)
        {
            $details = $this->select('EMPLOYEE_ID','DEPARTMENT_ID','TITLE_ID','SALARY_CATEGORY_ID','AMOUNT' , 'SALARY_TYPE')
                ->where([['BRANCH_ID', '=',$branch],
                    ['DEPARTMENT_ID','=',$department],['TITLE_ID','=',$title]])
                // ->groupBy('EMPLOYEE_ID','DEPARTMENT_ID','TITLE_ID')
                ->get();
        }
        elseif (count($branch)>0&&count($department)>0)
        {
            $details = $this->select('EMPLOYEE_ID','DEPARTMENT_ID','TITLE_ID','SALARY_CATEGORY_ID','AMOUNT', 'SALARY_TYPE')
                ->where([['BRANCH_ID', '=',$branch],['DEPARTMENT_ID','=',$department]])
                // ->groupBy('EMPLOYEE_ID','DEPARTMENT_ID','TITLE_ID')
                ->get();
        }
        else{
            $details = $this->select('EMPLOYEE_ID','DEPARTMENT_ID','TITLE_ID','SALARY_CATEGORY_ID','AMOUNT', 'SALARY_TYPE')
                ->where('BRANCH_ID', '=',$branch)
                // ->groupBy('EMPLOYEE_ID','DEPARTMENT_ID','TITLE_ID')
                ->get();
        }
                // dd($details);
        return $details;
    }

    public function getemployeeDetails(EmployeePayslipVO $employeePayslipVO)
    {
        $branch =$employeePayslipVO->getBranchId();
        $department = $employeePayslipVO->getDepartmentID();
        $title = $employeePayslipVO->getTitleID();
        $employee = $employeePayslipVO->getEmployeeId();
        if (count($branch)>0&&count($department)>0&&count($title)>0&&count($employee)>0)
        {
            $details = DB::table('hrm_employees_vw')->select('DEPARTMENT_ID','TITLE_ID','EMPLOYEE_ID')
                ->where([['BRANCH_ID', '=', $branch],
                    ['DEPARTMENT_ID','=',$department],['TITLE_ID','=',$title]
                    ,['EMPLOYEE_ID','=',$employee]])->get();
        }
        elseif (count($branch)>0&&count($department)>0&&count($title)>0)
        {
            $details = DB::table('hrm_employees_vw')->select('DEPARTMENT_ID','TITLE_ID','EMPLOYEE_ID')
                ->where([['BRANCH_ID', '=',$branch],
                    ['DEPARTMENT_ID','=',$department],['TITLE_ID','=',$title]])->get();
        }
        elseif (count($branch)>0&&count($department)>0)
        {
            $details = DB::table('hrm_employees_vw')->select('DEPARTMENT_ID','TITLE_ID','EMPLOYEE_ID')
                ->where([['BRANCH_ID', '=',$branch],['DEPARTMENT_ID','=',$department]])->get();
        }
        else{
            $details =  DB::table('hrm_employees_vw')->select('DEPARTMENT_ID','TITLE_ID','EMPLOYEE_ID')
                ->where('BRANCH_ID', '=',$branch)->get();
        }
        return $details;
    }

    public function getSalaryStructureForEdit(EmployeePayslipVO $employeePayslipVO)
    {
        $structure =DB::table('hrm_employees_salary_structure_vw')->where([['BRANCH_ID','=',$employeePayslipVO->getBranchId()],
            ['DEPARTMENT_ID','=',$employeePayslipVO->getDepartmentID()],
            ['TITLE_ID','=',$employeePayslipVO->getTitleID()],
            ['EMPLOYEE_ID','=',$employeePayslipVO->getEmployeeId()]])->get();
        if(count($structure)>0) {
            return $structure;
        }
        else{
            $employeePayslipVO->setErrorResponse(true, '0000055');
        }

    }
    public function editSalaryStructure(EmployeePayslipVO $employeePayslipVO)
    {
        $this->where('SALARY_CATEGORY_ID', $employeePayslipVO->getSalaryCategoryId())
            ->where('PAYSLIP_STRUCURE_ID', $employeePayslipVO->getPayslipStrucureID())
            ->update(
                array(
                    'AMOUNT' => $employeePayslipVO->getAmount()
                )
            );

    }

    public function getSalaryStructureForSlip($branch,$department,$title,$employee)
    {
        if (count($branch)>0&&count($department)>0&&count($title)>0&&count($employee)>0)
        {
            $details = $this->select('EMPLOYEE_ID','DEPARTMENT_ID','TITLE_ID','SALARY_CATEGORY_ID','AMOUNT')
                ->where([['BRANCH_ID', '=', $branch],
                    ['DEPARTMENT_ID','=',$department],['TITLE_ID','=',$title]
                    ,['EMPLOYEE_ID','=',$employee]])
                ->groupBy('EMPLOYEE_ID','DEPARTMENT_ID','TITLE_ID')
                ->get();
        }
        elseif (count($branch)>0&&count($department)>0&&count($title)>0)
        {
            $details = $this->select('EMPLOYEE_ID','DEPARTMENT_ID','TITLE_ID','SALARY_CATEGORY_ID','AMOUNT')
                ->where([['BRANCH_ID', '=',$branch],
                    ['DEPARTMENT_ID','=',$department],['TITLE_ID','=',$title]])
                ->groupBy('EMPLOYEE_ID','DEPARTMENT_ID','TITLE_ID')
                ->get();
        }
        elseif (count($branch)>0&&count($department)>0)
        {
            $details = $this->select('EMPLOYEE_ID','DEPARTMENT_ID','TITLE_ID','SALARY_CATEGORY_ID','AMOUNT')
                ->where([['BRANCH_ID', '=',$branch],['DEPARTMENT_ID','=',$department]])
                ->groupBy('EMPLOYEE_ID','DEPARTMENT_ID','TITLE_ID')
                ->get();
        }
        else{
            $details = $this->select('EMPLOYEE_ID','DEPARTMENT_ID','TITLE_ID','SALARY_CATEGORY_ID','AMOUNT')
                ->where('BRANCH_ID', '=',$branch)
                ->groupBy('EMPLOYEE_ID','DEPARTMENT_ID','TITLE_ID')
                ->get();
        }
        return $details;
    }

    public function findSalaryStructure($value){
        $result = DB::table('hrm_employee_salary_structure')->where('BRANCH_ID' , $value->getBranchId() )->where('EMPLOYEE_ID' , $value->getEmployeeId())->where('SALARY_CATEGORY_ID' , $value->getSalaryCategoryId())->first();
        return $result;
    }


}