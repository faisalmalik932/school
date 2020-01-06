<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 12/5/2017
 * Time: 11:43 AM
 */

namespace App\Http\Controllers\HumanResource\Settings;


use App\Http\Controllers\BaseController;
use App\Models\HumanResource\Payslips\PayslipModel;
use App\Models\HumanResource\Payslips\PayslipTypeModel;
use App\Models\HumanResource\Reporting\EmployeePayslipModel;
use App\Vos\HumanResourceVOS\EmployeePayslipVO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Models\Common\DataTableModel;

class CreateEmployeesPayslipController extends BaseController
{
    public function loadView()
    {
        return view('HumanResource.Payslips.createEmployeePayslip');
    }

    public function createPayslip(Request $request)
    {
        $count = 0;
        $payslipModel = new PayslipModel();
        $datatableModel = new DataTableModel();
        $payslipTypeModel = new PayslipTypeModel();
        $structureModel = new EmployeePayslipModel();
        $employeePayslipVO = new EmployeePayslipVO();
        $branch = $request->input('branch');
        $department = $request->input('department');
        $designation = $request->input('designation');
        $employee = $request->input('employeename');
        $strucureDetails = $structureModel->getPayslipStructure($branch, $department, $designation, $employee);
        if ($strucureDetails->where('SALARY_TYPE', 'Earning')->isEmpty()) {
            Session::flash('payslip', "Salary Structure is not created correctly.");
            return redirect()->back();
        }
        if (!empty($strucureDetails->first())) {
            // $salaryStructureForSlip = $structureModel->getSalaryStructureForSlip($branch,$department,$designation,$employee);
            $salaryStructureForSlip = $strucureDetails->groupBy('EMPLOYEE_ID');
            // dd($salaryStructureForSlip);
            // dd($strucureDetails , $salaryStructureForSlip);
            foreach ($salaryStructureForSlip as $key => $value) {
                $employeePayslipVO->setPayslipNO($payslipModel->countPayslips());
                $employeePayslipVO->setMonth($request->input('month'));
                $employeePayslipVO->setYear($request->input('year'));
                $employeePayslipVO->setEmployeeId($key);
                $employeePayslipVO->setDepartmentID($value->first()->DEPARTMENT_ID);
                $employeePayslipVO->setBranchId($request->input('branch'));
                $employeePayslipVO->setTitleID($value->first()->TITLE_ID);
                $id[] = $payslipModel->addPayslip($employeePayslipVO);
            }
            for ($i = 0; $i < count($strucureDetails); $i++) {
                for ($x = 0; $x < count($id); $x++) {
                    if ($id[$x]['EMPLOYEE_ID'] == $strucureDetails[$i]->EMPLOYEE_ID && $id[$x] != false) {

                        $data[] = $payslipTypeModel->addPayslipType($strucureDetails[$i], $id[$x]['id']);
                    } else {
                        $count++;
                        continue;
                    }
                }
            }
            foreach ($id as $res) {
                if ($res != false) {
                    $results = $datatableModel->fetchDataTableWithId('hrm_employees_payslip_pdf_vw', '*', $res, 'id');
                    $sumSalary = \DB::select('call hrm_employee_salary_sum(' . $results->first()->PAYSLIP_ID . ')');
                    $r = $results->where('TYPE', 'Earning');
                    $sumSalary = $r->sum('AMOUNT');
                    // if($sumSalary===0){
                    //     Session::flash('payslip', "Salary Structure is not created correctly");
                    //     return redirect()->back();
                    // }
                    $d = $results->where('TYPE', 'Deduction');
                    $deductionSum = $d->sum('AMOUNT');
                    $net = $sumSalary - $deductionSum;
                    $month = $results->first()->MONTH;
                    $year = $results->first()->YEAR;
                    $view = \View::make('HumanResource.Payslips.payslipData', [
                        'data' => $results, 'sum' => $net, 'month' => $month, 'year' => $year, 'deductionSum' => $deductionSum, 'earningSum' => $sumSalary]);

                    $html[] = $view->render();
                } else {
                    continue;
                }
            }

            if (isset($html)) {
                $pdf = \PDF::loadview('HumanResource.Payslips.generatePaySlipPDF', ['html' => $html, 'month' => $month, 'year' => $year]);
                return $pdf->stream('download.pdf');
            }
            Session::flash('payslip', "Payslip is already generated !");
            // return redirect('hr/payslips/employeepayslip');
            return redirect()->back();

        } else {
            Session::flash('payslip', "Salary Structure is not created!");
            return redirect()->back();
        }
        if ($employeePayslipVO->getError()) {
            return $this->getMessageWithRedirect($employeePayslipVO->getErrorCode());
        } else {
            Session::flash('payslip', "Pay Slip Generated Successfully");
            return redirect('hr/payslips/employeepayslip');
        }
    }

    public function downloadDF($month, $year, $id)
    {
        $whereClause = ['EMPLOYEE_ID' => $id, 'MONTH' => $month, 'YEAR' => $year];
        $datatableModel = new DataTableModel();
        $results = $datatableModel->fetchDataTableWithId('hrm_employees_payslip_pdf_vw', '*', $whereClause, 'none');
        $r = $results->where('TYPE', 'Earning');
        $sumSalary = $r->sum('AMOUNT');
        $d = $results->where('TYPE', 'Deduction');
        $deductionSum = $d->sum('AMOUNT');
        $net = $sumSalary - $deductionSum;
        $month = $results->first()->MONTH;
        $year = $results->first()->YEAR;
        $pdf = \PDF::loadview('HumanResource.Payslips.generatePDFforEmployee', ['data' => $results, 'sum' => $net, 'month' => $month, 'year' => $year, 'deductionSum' => $deductionSum, 'earningSum' => $sumSalary]);
        return $pdf->stream('download.pdf');
    }
}