<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 10/17/2017
 * Time: 5:32 PM
 */

namespace App\Http\Controllers\HumanResource\Reporting;


use App\Http\Controllers\BaseController;
use App\Models\HumanResource\EmployeeModel;
use App\Models\HumanResource\Reporting\EmployeePayslipModel;
use App\Models\HumanResource\Settings\DepartmentModel;
use App\Models\HumanResource\Settings\JobTitlesModel;
use App\Vos\HumanResourceVOS\EmployeePayslipVO;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Models\Common\DataTableModel;
use PDF;

class EmployeePayslipController extends BaseController
{
    public function loadView()
    {
        $employeeModel = new EmployeeModel();
        $employees = $employeeModel->loadEmployees();
        $departmentModel = new DepartmentModel();
        $departments = $departmentModel->loadDepartments();
        $jobTitleModel = new JobTitlesModel();
        $jobTitle = $jobTitleModel->getjobstatus();
        return view('HumanResource.SalaryStructure.employeeSalaryStructure', compact('employees', 'departments', 'jobTitle'));
    }

    public function add(Request $request)
    {
        // dd($request->all());
        $counting = 0;

            $jsonDecode =  json_decode( $request->tabledata , true);
            $rules = [
            '*.amount' => 'required|max:8',
            '*.salarycategory' => 'required'
            ];
        $validator = \Validator::make($jsonDecode, $rules);
        if ($validator->passes()) {
            //TODO Handle your data
        } else {
            //TODO Handle your error
            session::flash('employeepayslip', "amount lenght should not be greator than 10");
                return redirect('hr/settings/salarystructure');
            
        }
        $payslipModel = new EmployeePayslipModel();
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
            $payslipVO->setTitleID($request->input('designation'));
            $payslipVO->setSalaryCategoryId($value[$i]['salarycategoryID']);
            $types = \DB::table('hrm_salary_categories')->select('TYPE')->where('SALARY_CATEGORY_ID', $value[$i]['salarycategoryID'])->get();
            $payslipVO->setSalaryType($types->first()->TYPE);
            $result = $payslipModel->findSalaryStructure($payslipVO);
            if(empty($result)){
                $counting++;
            }
            else{
                continue;
            }
            $payslipVO->setAmount($value[$i]['amount']);
            $payslipVO->setCreatedBy($this->getUserName());
            $salaryCategoryList->add($payslipVO);
        }
        $payslipModel->payslipStructure($salaryCategoryList);
        if($counting == 0){
            session::flash('employeepayslip', "Salary Structure already created!");
            return redirect()->back();
        }
        if ($payslipVO->getError()) {
            return $this->getMessageWithRedirect($payslipVO->getErrorCode());
        } else {
            session::flash('employeepayslip', "Salary Structure Added Successfully");
            return redirect('hr/settings/salarystructure');
        }
    }

    public function loadPayslipView()
    {
        return view('HumanResource.Reporting.EmployeePayslip.EmpPayslipReport.searchPayslip');
    }

    public function PayslipPdfReport(Request $request)
    {
        // dd($request->all());
        $payslipVO = new EmployeePayslipVO();
        $datatableModel = new DataTableModel();
        $payslip = array();
        $payslipcategories= array();
        $payslipdeductions = array();
        $grosspay = array();
        $payslipModel = new EmployeePayslipModel();
        $employee = $request->input('employee');
        foreach ($employee as $employees) {
            $columns = ['EMPLOYEE_ID' => $employees , 'MONTH' => $request->input('month') , 'YEAR' => $request->input('year')];
            $payslipVO->setEmployeeId($employees);
            $payslipVO->setYear($request->input('year'));
            $payslipVO->setMonth($request->input('month'));
            $results = $datatableModel->fetchDataTableWithId('hrm_employees_payslip_pdf_vw', '*'  , $columns ,  'none');
            // dd($results);
            if ($results->isEmpty()) {
                // dd('hi');
                Session::flash('payslip', "Payslip is not created!");
                return redirect()->back();
            }
            $sumSalary = \DB::select('call hrm_employee_salary_sum('.$results->first()->PAYSLIP_ID.')');
            $r = $results->where('TYPE' , 'Earning');
        $sumSalary = $r->sum('AMOUNT');
        $d = $results->where('TYPE' , 'Deduction');
        $deductionSum = $d->sum('AMOUNT');
        $net = $sumSalary - $deductionSum;
            $month = $results->first()->MONTH;
            $year = $results->first()->YEAR;
                $view = \View::make('HumanResource.Payslips.payslipData', [
                'data' => $results , 'sum' => $net,'month' => $month , 'year' => $year , 'deductionSum' => $deductionSum , 'earningSum' => $sumSalary]);

            $html[] = $view->render();
            
            // $payslip[] = $payslipModel->getPayslip($payslipVO);
            // $payslipdetails = $payslipModel->getPayslipDetails($payslipVO , $payslip);
            // $payslipcategories[] = $payslipModel->getPayslipCategories($payslipVO);
            // $payslipdeductions[] = $payslipModel->getPayslipDeductionCategories($payslipVO);
            // $grosspay[] = $payslipModel->getGrossPay($payslipVO);
        }
        if ($payslipVO->getError()) {
            return $this->getMessageWithRedirect($payslipVO->getErrorCode());
        } else {
        if(isset($html)){
        $pdf = \PDF::loadview('HumanResource.Payslips.generatePaySlipPDF',['html' => $html , 'month' => $month , 'year' => $year]);
        return $pdf->stream('download.pdf');
        }
        else{
             Session::flash('payslip', "Salary Structure is not created!");
        return redirect()->back();
        }
            // return view('HumanResource.Reporting.EmployeePayslip.EmpPayslipReport.payslipReport', compact('payslip','grosspay'));
            /* $pdf = PDF::loadview('HumanResource.Reporting.EmployeePayslip.EmpPayslipReport.payslipReport', compact('payslip'))
                 ->setPaper('a4', 'landscape');
             return $pdf->stream('HumanResource.Reporting.EmployeePayslip.EmpPayslipReport.payslipReport.pdf');*/
        }
    }

    public function PebPayslipPdfReport(Request $request)
    {
        $payslipModel = new EmployeePayslipModel();
        $payslip = $payslipModel->getallPayslips();
        $payslipDetail = $payslipModel->getallPayslipDetails();
        $payslipCategories = $payslipModel->getallPayslipCategories();
        $sumAmount = 0;
        // return view('HumanResource.Reporting.EmployeePayslip.pebemployeesPayslip',compact('payslip','grosspay'));
        $pdf = PDF::loadview('HumanResource.Reporting.EmployeePayslip.pebemployeesPayslip',compact('payslip','payslipDetail','payslipCategories','sumAmount'))
            ->setPaper( 'a4', 'landscape');
        return $pdf->stream('HumanResource.Reporting.EmployeePayslip.pebemployeesPayslip.pdf');
    }

    public function salarySummaryView()
    {
        return view('HumanResource.Reporting.SalarySummary.searchSummary');
    }

    public function SalarySummary(Request $request)
    {
        $payslipModel = new EmployeePayslipModel();
        $payslipVo = new EmployeePayslipVO();
        $payslipVo->setYear($request->input('year'));
        $summary = $payslipModel->salarySummary($payslipVo);
        $months = $payslipModel->getSeedMonths();
        if($summary == null){
            Session::flash('salary', "No summary is founded!");
        return redirect()->back();
        }
        $newsummary = $months->map(function($month) use ($summary){
            return  $summary->where('MONTH' , $month->CODE_VALUE )->first();
        });
        
        $sum = $newsummary->sum('TOTAL');

        if ($payslipVo->getError() || $summary == null) {
            return $this->getMessageWithRedirect($payslipVo->getErrorCode());
        } else {
            //return view('HumanResource.Reporting.SalarySummary.salarySummary',compact('summary'));
            $pdf = PDF::loadview('HumanResource.Reporting.SalarySummary.salarySummary', ['detail' => $summary , 'summary' => $newsummary->toArray() , 'sum' => $sum])
                ->setPaper('a4', 'landscape');
            return $pdf->stream('HumanResource.Reporting.SalarySummary.salarySummary.pdf');
        }
    }

    public function SalaryStructureView()
    {
            return view('HumanResource.SalaryStructure.searchSalaryStructure');
    }

    public function SalaryStructureDetails(Request $request)
    {
        $payslipVO = new EmployeePayslipVO();
        $payslipModel = new EmployeePayslipModel();
        $payslipVO->setEmployeeId($request->input('employeename'));
        $payslipVO->setBranchId($request->input('branch'));
        $payslipVO->setDepartmentID($request->input('department'));
        $payslipVO->setTitleID($request->input('designation'));
        $payslipVO->setYear($request->input('year'));
        $payslipVO->setMonth($request->input('month'));
        $salaryStrucure = $payslipModel->getSalaryStructureForEdit($payslipVO);
        if ($payslipVO->getError()) {
            return $this->getMessageWithRedirect($payslipVO->getErrorCode());
        }
        else {
            return view('HumanResource.SalaryStructure.editSalaryStructure', compact('salaryStrucure'));
        }
    }
    public function editSalaryStructure(Request $request)
    {
        $paySlipModel = new EmployeePayslipModel();
        $categories = $request->input('categories');
        $amount = $request->input('amount');
        $structureid = $request->input('paySlip');
        for($i=0;$i<count($categories);$i++)
        {
            $payslipVO = new EmployeePayslipVO();
            $payslipVO->setSalaryCategoryId($categories[$i]);
            $payslipVO->setAmount($amount[$i]);
            $payslipVO->setPayslipStrucureID($structureid[$i]);
            $paySlipModel->editSalaryStructure($payslipVO);
        }
        Session::flash('salary', "Salary Structure Edited Successfully");
        return redirect()->back();
    }

}