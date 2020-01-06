<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 12/4/2017
 * Time: 2:46 PM
 */

namespace App\Http\Controllers\HumanResource\Reporting;


use App\Http\Controllers\BaseController;
use App\Models\HumanResource\Payslips\PayslipModel;
use App\Models\HumanResource\Reporting\EmployeePayslipModel;
use App\Models\HumanResource\Settings\DepartmentModel;
use App\Models\HumanResource\Settings\JobTitlesModel;
use App\Vos\HumanResourceVOS\EmployeePayslipVO;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EmployeePayslipDeductionController extends BaseController
{
    public function loadView()
    {
        $departmentModel = new DepartmentModel();
        $departments = $departmentModel->loadDepartments();
        $jobTitleModel = new JobTitlesModel();
        $jobTitle = $jobTitleModel->getjobstatus();
        return view('HumanResource.SalaryStructure.addpayDeductions',compact('departments','jobTitle'));
    }

    public function addSalaryDeductions(Request $request)
    {
        $payslipModel = new PayslipModel();
        $payslipVO = new EmployeePayslipVO();
        $allocations = $request->input('tabledata');
        $value = json_decode($allocations, true);
        $salaryCategoryList = new Collection();
        for ($i = 0; $i < count($value); $i++) {
            $payslipVO = new EmployeePayslipVO();
            $payslipVO->setPayslipId($request->input('primary'));
            $payslipVO->setEmployeeId($request->input('employeename'));
            $payslipVO->setBranchId($request->input('branch'));
            $payslipVO->setDepartmentID($request->input('department'));
            $payslipVO->setYear($request->input('year'));
            $payslipVO->setMonth($request->input('month'));
            $payslipVO->setTitleID($request->input('designation'));
            $payslipVO->setReason($request->input('reason'));
            $payslipVO->setSalaryCategoryId($value[$i]['salarycategoryID']);
            $payslipVO->setAmount($value[$i]['amount']);
            $payslipVO->setCreatedBy($this->getUserName());
            $salaryCategoryList->add($payslipVO);
        }
        $payslipModel->insertSalaryDeductions($salaryCategoryList);
        if ($payslipVO->getError()) {
            return $this->getMessageWithRedirect($payslipVO->getErrorCode());
        } else {
            session::flash('employeepayslip', "Salary Deductions Added Successfully");
            return redirect('hr/reports/employee-payslip-deductions');
        }
    }

}