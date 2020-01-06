<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 12/5/2017
 * Time: 12:04 PM
 */

namespace App\Models\HumanResource\Payslips;


use App\Models\BaseModel;
use App\Vos\HumanResourceVOS\EmployeePayslipVO;
use App\Vos\HumanResourceVOS\SalaryCategoryVO;
use DB;
use Illuminate\Database\Eloquent\Collection;

class PayslipModel extends BaseModel
{
    protected $primaryKey = 'PAYSLIP_ID';
    protected $table = 'hrm_employees_payslips';
    protected $fillable = ['EMPLOYEE_ID','DEPARTMENT_ID','TITLE_ID','BRANCH_ID','PAYSLIP_NO','RECEIVED_DATE','SALARY_STATUS',
        'MONTH','YEAR'];

    public function addPayslip(EmployeePayslipVO $employeePayslipVO)
    {
        $result = $this->select()->where([['BRANCH_ID', '=', $employeePayslipVO->getBranchId()],
            ['DEPARTMENT_ID', '=', $employeePayslipVO->getDepartmentID()],
            ['TITLE_ID', '=', $employeePayslipVO->getTitleID()],
            ['EMPLOYEE_ID', '=',$employeePayslipVO->getEmployeeId()],
            ['YEAR', '=', $employeePayslipVO->getYear()],
            ['MONTH', '=', $employeePayslipVO->getMonth()]])->get();
        if(count($result) > 0) {
            $employeePayslipVO->setErrorResponse(true, '0000040');
            return false;
        }
        else {
            $id = $this->insertGetId(array(
                'PAYSLIP_NO' => $employeePayslipVO->getPayslipNO(),
                'EMPLOYEE_ID' => $employeePayslipVO->getEmployeeId(),
                'DEPARTMENT_ID' => $employeePayslipVO->getDepartmentID(),
                'TITLE_ID' => $employeePayslipVO->getTitleID(),
                'BRANCH_ID' => $employeePayslipVO->getBranchId(),
                'MONTH' => $employeePayslipVO->getMonth(),
                'YEAR' => $employeePayslipVO->getYear(),
                'CREATED_BY' => $employeePayslipVO->getCreatedBy()));
            $employeePayslipVO->setDetailPayslipId($id);
            return (['id' => $id, 'EMPLOYEE_ID' => $employeePayslipVO->getEmployeeId() , 'YEAR' => $employeePayslipVO->getYear() , 'MONTH' => $employeePayslipVO->getMonth()]);
            return $employeePayslipVO;
        }
    }

    public function countPayslips()
    {
        $payslips = $this->count();
        return $payslips+1;
    }

    public function insertPayslipDetails(EmployeePayslipVO $employeePayslipVO)
    {
        DB::table('hrm_employees_payslip_detail')->insert(array(
            'YEAR'=>$employeePayslipVO->getYear(),
            'MONTH'=>$employeePayslipVO->getMonth(),
            'EMPLOYEE_ID'=>$employeePayslipVO->getEmployeeId(),
            'PAYSLIP_ID'=>$employeePayslipVO->getPayslipId(),
            'BASIC_SALARY'=>$employeePayslipVO->getBasicSalary(),
            'HOUSE_RENT'=>$employeePayslipVO->getHouseRent(),
            'UTILITY_ALLOWANCE'=>$employeePayslipVO->getUtilityAllowance(),
            'PROVIDENT_FUND'=>$employeePayslipVO->getProvidentFund(),
            'ADVANCED_SALARY'=>$employeePayslipVO->getAdvance()));
    }

    public function insertSalaryDeductions(Collection $collection)
    {
        $collection->each(function($vo) {
            $result = DB::table('hrm_employees_payslip_deduction')
                ->where([['BRANCH_ID', '=', $vo->getBranchId()],
                    ['DEPARTMENT_ID', '=', $vo->getDepartmentID()],
                    ['TITLE_ID', '=', $vo->getTitleID()],
                    ['EMPLOYEE_ID', '=', $vo->getEmployeeId()],
                    ['YEAR', '=', $vo->getYear()],
                    ['MONTH', '=', $vo->getMonth()]])->get();
            if (count($result) > 0) {
                $vo->setErrorResponse(true, '0000052');
            } else {
                DB::table('hrm_employees_payslip_deduction')->insert(array(
                    'YEAR' => $vo->getYear(),
                    'MONTH' => $vo->getMonth(),
                    'EMPLOYEE_ID' => $vo->getEmployeeId(),
                    'BRANCH_ID' => $vo->getBranchId(),
                    'DEPARTMENT_ID' => $vo->getDepartmentID(),
                    'TITLE_ID' => $vo->getTitleID(),
                    'SALARY_CATEGORY_ID'=>$vo->getSalaryCategoryId(),
                    'AMOUNT'=>$vo->getAmount(),
                    'REASON' => $vo->getReason(),
                    'CREATED_BY' => $vo->getCreatedBy()));
            }
        });
    }

    public function updateSalaryDeductions(EmployeePayslipVO $employeePayslipVO)
    {
        DB::table('hrm_employees_payslip_deduction')->where('PAYSLIP_DEDUCTION_ID','=',$employeePayslipVO->getDeductionId())
            ->update([
            'YEAR'=>$employeePayslipVO->getYear(),
            'MONTH'=>$employeePayslipVO->getMonth(),
            'EMPLOYEE_ID'=>$employeePayslipVO->getEmployeeId(),
            'BRANCH_ID'=>$employeePayslipVO->getBranchId(),
            'DEPARTMENT_ID'=>$employeePayslipVO->getDepartmentID(),
            'TITLE_ID'=>$employeePayslipVO->getTitleID(),
            'BASIC_SALARY'=>$employeePayslipVO->getBasicSalary(),
            'ADVANCED_SALARY'=>$employeePayslipVO->getAdvance(),
            'REASON'=>$employeePayslipVO->getReason(),
            'UPDATED_BY' => $employeePayslipVO->getModifiedBy(),
            'UPDATED_AT' => $employeePayslipVO->getModifiedAt()]);
    }

    public function addSalaryCategories(SalaryCategoryVO $salaryCategoryVO)
    {
        $result = DB::table('hrm_salary_categories')
            ->where([['CATEGORY_NAME', '=', $salaryCategoryVO->getSalaryCategory()]])->get();
        if(count($result) > 0) {
            $salaryCategoryVO->setErrorResponse(true, '0000052');
        }
        else {
            DB::table('hrm_salary_categories')->insert(array(
                'CATEGORY_NAME' => $salaryCategoryVO->getSalaryCategory(),
                'TYPE' => $salaryCategoryVO->getSalaryType(),
                'Description' => $salaryCategoryVO->getDescription(),
                'CREATED_BY'=>$salaryCategoryVO->getCreatedBy()
            ));
        }
    }

    public function updateSalaryCategories(SalaryCategoryVO $salaryCategoryVO)
    {
        //dd($salaryCategoryVO);
            DB::table('hrm_salary_categories')->where('SALARY_CATEGORY_ID','=',$salaryCategoryVO->getSalarycategoryId())->update([
                'CATEGORY_NAME' => $salaryCategoryVO->getSalaryCategory(),
                'TYPE' => $salaryCategoryVO->getSalaryType(),
                'Description' => $salaryCategoryVO->getDescription(),
                'CREATED_BY'=>$salaryCategoryVO->getCreatedBy(),
                'UPDATED_BY' => $salaryCategoryVO->getModifiedBy(),
                'UPDATED_AT' => $salaryCategoryVO->getModifiedAt()
            ]);
    }

}