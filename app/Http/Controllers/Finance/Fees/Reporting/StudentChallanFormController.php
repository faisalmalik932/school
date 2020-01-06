<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/11/2017
 * Time: 6:26 PM
 */

namespace App\Http\Controllers\Finance\Fees\Reporting;


use App\Http\Controllers\BaseController;
use App\Models\Finance\Fees\FeeStructureModel;
use App\Models\Platform\ClassModel;
use App\Models\Registration\StudentModel;
use App\Vos\FinanceVOS\FeeVOS\FeeChallanVOS\FeeChallanVO;
use App\Vos\RegistrationVOS\StudentVO;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;
use DB;

class StudentChallanFormController extends BaseController
{

    public function loadView()
    {
        $classModel = new ClassModel();
        $class = $classModel->loadClasses();
        $ficalYearModel = new FeeStructureModel();
        $fiscalYear = $ficalYearModel->getFiscalYear();
        return view('Finance.Fees.Reporting.ChallanForm.searchStudent')->with('class', $class)->with('fiscalYear',$fiscalYear);
    }

    public function getPDF(Request $request) {
        $challanVo = new FeeChallanVO();
        $challanVo->setBranchId($request->input('branch'));
        $challanVo->setClass($request->input('class'));
        $challanVo->setMonth($request->input('month'));
        $challanVo->setYear($request->input('year'));
        $challanVo->setStudentId($request->input('student'));

        $branch = DB::table('ptf_branches')->where('BRANCH_ID','=', $request->input('branch'))->first();
        $bank = DB::table('fin_bank_accounts')->where('ACCOUNT_ID','=', $branch->BANK_ID)->first();

         if ($challanVo->getBranchId() != "") {
            $studentModel = new StudentModel();
            $students = $studentModel->getStudentFeeDetails($challanVo);

            if ($students == null) {
                return $this->sendErrorMessage("No Challan found against your search");
            } else {
                return view('Finance.Fees.Reporting.ChallanForm.studentChallanForm',  compact('students', 'branch', 'bank'));
            }
        }
    }
}