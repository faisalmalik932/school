<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 10/27/2017
 * Time: 6:11 PM
 */

namespace App\Http\Controllers\Finance\Fees\Reporting;


use App\Http\Controllers\BaseController;
use App\Models\Finance\Fees\FeeStructureModel;
use App\Vos\FinanceVOS\FeeVOS\FeeChallanVOS\FeeChallanVO;
use Illuminate\Http\Request;
use PDF;

class FeeReceivedController extends BaseController
{
    public function loadView()
    {
        return view('Finance.Fees.Reporting.MonthlyReceivedFee.SearchMonthFee');
    }

    public function monthlyReceivedFeePDFReport(Request $request)
    {
        $feechallanVo = new FeeChallanVO();
        $feeStructureModel = new FeeStructureModel();
        $feechallanVo->setBranchId($request->input('branch'));
        $feechallanVo->setMonth($request->input('month'));
        $feechallanVo->setYear($request->input('year'));
        $month = $feeStructureModel->monthandBranch($feechallanVo);
        $detail = $feeStructureModel->monthlyFeeDetail($feechallanVo);
        //print_r($detail);
        if ($feechallanVo->getError()) {
            return $this->getMessageWithRedirect($feechallanVo->getErrorCode());
        }
        else {
            // return view('Finance.Fees.Reporting.MonthlyReceivedFee.monthlyReceivedFeeReport',compact('detail', 'month');
            $pdf = PDF::loadview('Finance.Fees.Reporting.MonthlyReceivedFee.monthlyReceivedFeeReport'
                , compact('detail', 'month'))
                ->setPaper('a4', 'landscape');
            return $pdf->stream('Finance.Fees.Reporting.MonthlyReceivedFee.monthlyReceivedFeeReport.pdf');
        }

    }

}