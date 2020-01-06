<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 10/31/2017
 * Time: 12:37 PM
 */

namespace App\Http\Controllers\Finance\Fees\Reporting;


use App\Http\Controllers\BaseController;
use App\Models\Finance\Fees\FeeChallanDetailModel;
use App\Vos\FinanceVOS\FeeVOS\FeeChallanVOS\FeeChallanDetailVO;
use App\Vos\FinanceVOS\FeeVOS\FeeChallanVOS\FeeChallanVO;
use App\Vos\FinanceVOS\FeeVOS\FeeStructureVOS\FeeStructureVO;
use Illuminate\Http\Request;
use PDF;

class FeeConcessionReportController extends BaseController
{
    public function searchFeeConcession()
    {
        return view('Finance.Fees.Reporting.FeeConcession.branchwiseConcession');
    }

    public function FeeConcessionPDFReport(Request $request)
    {
        $feeChallanVo = new FeeChallanVO();
        $feeChallanModel = new FeeChallanDetailModel();
        $feeChallanVo->setBranchId($request->input('branch'));
        $feeChallanVo->setMonth($request->input('month'));
        $feeChallanVo->setYear($request->input('year'));
        $month = $feeChallanVo->getMonth();
        $year =  $feeChallanVo->getYear();
        $studentData = $feeChallanModel->studentDetail($feeChallanVo);
        $fullFee = $feeChallanModel->feeAmount($feeChallanVo);
        $concession = $feeChallanModel->ConcessionGranted($feeChallanVo);
        if ($feeChallanVo->getError()) {
            return $this->getMessageWithRedirect($feeChallanVo->getErrorCode());
        }
        else {
             return view('Finance.Fees.Reporting.FeeConcession.ConcessionReport',compact('studentData', 'fullFee', 'month', 'concession','year'));
          /*  $pdf = PDF::loadview('Finance.Fees.Reporting.FeeConcession.ConcessionReport', compact('studentData', 'fullFee', 'month', 'concession'))
                ->setPaper('a4', 'landscape');
            return $pdf->stream('Finance.Fees.Reporting.FeeConcession.ConcessionReport.pdf', compact('studentData', 'fullFee', 'month', 'concession'));*/
        }

    }

}