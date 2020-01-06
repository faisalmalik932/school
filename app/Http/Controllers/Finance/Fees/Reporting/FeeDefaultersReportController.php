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
use App\Models\Finance\Fees\FeeChallanModel;
use App\Models\Finance\Fees\FeeStructureModel;
use App\Vos\FinanceVOS\FeeVOS\FeeChallanVOS\FeeChallanVO;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PDF;

class FeeDefaultersReportController extends BaseController
{
    public function searchFeeDefaulters()
    {
        return view('Finance.Fees.Reporting.Defaulters.searchfeeDefaulters');
    }

    public function FeeDefaultersPDFReport(Request $request)
    {
        $feeModel = new FeeChallanDetailModel();
        $feechallanVo = new FeeChallanVO();
        $feechallanVo->setBranchId($request->input('branch'));
        $feechallanVo->setMonth($request->input('month'));
        $defaulters = $feeModel->feeDefaulters($feechallanVo);
        $feesum = $feeModel->feeSum($feechallanVo);
        // return view('Finance.Fees.Reporting.Defaulters.FeeDefaultersReport',compact('defaulters','feesum');
        $pdf = PDF::loadview('Finance.Fees.Reporting.Defaulters.FeeDefaultersReport',compact('defaulters','feesum'))
            ->setPaper( 'a4', 'landscape');
        return $pdf->stream('Finance.Fees.Reporting.Defaulters.FeeDefaultersReport.pdf');
    }


    public function searchMonthlyFeeDefaulters()
    {
        return view('Finance.Fees.Reporting.Defaulters.MonthlyDefaulters.searchMonthlyDefaulters');

    }

    public function MonthlyFeeDefaultersPDFReport(Request $request)
    {
        $feeChallanVo = new FeeChallanVO();
        $feeChallanDetailModel = new FeeChallanDetailModel();
        $feeChallanModel = new FeeChallanModel();
        $feeStructureModel = new FeeStructureModel();
        $feeChallanVo->setBranchId($request->input('branch'));
        $feeChallanVo->setMonth($request->input('month'));
        $feeChallanVo->setYear($request->input('year'));
       $monthandBranch = $feeStructureModel->monthandBranch($feeChallanVo);
        $detail = $feeChallanModel->monthlyFeeDetail($feeChallanVo);
        if ($feeChallanVo->getError()) {
            return $this->getMessageWithRedirect($feeChallanVo->getErrorCode());
        }
        else {
            //return view('Finance.Fees.Reporting.Defaulters.MonthlyDefaulters.MonthlyfeeDefaultersReport', compact('monthandBranch','detail'));
            $pdf = PDF::loadview('Finance.Fees.Reporting.Defaulters.MonthlyDefaulters.MonthlyfeeDefaultersReport',
                compact('monthandBranch','detail'))
                ->setPaper('a4', 'landscape');
            return $pdf->stream('Finance.Fees.Reporting.Defaulters.MonthlyDefaulters.MonthlyfeeDefaultersReport.pdf');
        }

    }

}