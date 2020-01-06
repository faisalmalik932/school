<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 11/20/2017
 * Time: 11:23 AM
 */

namespace App\Http\Controllers\Finance\Fees\Reporting;


use App\Http\Controllers\BaseController;
use App\Models\Registration\StudentModel;
use App\Vos\RegistrationVOS\StudentVO;
use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;

class HostelChallanFormController extends BaseController
{
    public function loadHostelFeeView()
    {
        return view('Finance.Fees.Reporting.HostelFee.SearchStudentHostel');
    }

    public function getHostelFeePDF(Request $request)
    {   
        // dd($request->all());
        $studentVO = new StudentVO();
        $mytime = Carbon::now();
        $time = $mytime->toDateString();
        $studentVO->setStudentId($request->input('student'));
        $studentVO->setHostelId($request->input('hostel'));
        $studentVO->setClass($request->input('class'));
        $studentVO->setMonth($request->input('month'));
        $studentModel = new StudentModel();
        $student = $studentModel->HostelsStudent($studentVO);
        $studentFee = $studentModel->StudentHostelFeeInfo($studentVO);
        $feesum = $studentModel->SumHostelFeeInfo($studentVO);
        if ($studentVO->getError()) {
            return $this->getMessageWithRedirect($studentVO->getErrorCode());
        } else {
        // dd($feesum);
            return view('Finance.Fees.Reporting.HostelFee.hostelChallanForm', compact('student', 'studentFee', 'feesum', 'time'));
            /* $pdf = PDF::loadview('Finance.Fees.Reporting.HostelFee.hostelChallanForm', compact('student', 'studentFee', 'feesum','time'))
                  ->setPaper('a4', 'landscape');
              return $pdf->stream('Finance.Fees.Reporting.ChallanForm.hostelChallanForm.pdf');*/
        }
    }

}