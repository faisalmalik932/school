<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 10/18/2017
 * Time: 7:17 PM
 */

namespace App\Http\Controllers\Finance\Fees\Reporting;


use App\Http\Controllers\BaseController;
use App\Models\Finance\Fees\FeeChallanDetailModel;
use App\Models\Finance\Fees\FeeChallanModel;
use App\Vos\FinanceVOS\FeeVOS\FeeChallanVOS\FeeChallanDetailVO;
use App\Vos\FinanceVOS\FeeVOS\FeeChallanVOS\FeeChallanVO;
use Illuminate\Http\Request;
use PDF;

class FeeReportsController extends BaseController
{

    public function feeBillSummary()
    {
        return view('Finance.Fees.Reporting.FeeBilSummary.searchFeeBills');
    }

    public function feeBillSummaryPDFReport(Request $request)
    {
        $feeChallanVo = new FeeChallanVO();
        $feeModel = new FeeChallanDetailModel();
        $feeChallanVo->setBranchId($request->input('branch'));
        $feeChallanVo->setMonth($request->input('month'));
        $feeChallanVo->setYear($request->input('year'));
        $feedetailClassWise = $feeModel->FeeDetailClassWise($feeChallanVo);
        $branch = $feeModel->BranchName($feeChallanVo);
        $month = $feeModel->MonthName($feeChallanVo);
        if ($feeChallanVo->getError()) {
            return $this->getMessageWithRedirect($feeChallanVo->getErrorCode());
        } else {
            // return view('Finance.Fees.Reporting.FeeBilSummary.summaryFeeBills',compact('defaulters','feesum');
            $pdf = PDF::loadview('Finance.Fees.Reporting.FeeBilSummary.summaryFeeBills',
                compact('feedetailClassWise', 'branch', 'month'))
                ->setPaper('a4', 'landscape');
            return $pdf->stream('Finance.Fees.Reporting.FeeBilSummary.summaryFeeBills.pdf');
        }

    }

    public function DetailfeeBillSummary()
    {
        return view('Finance.Fees.Reporting.DetailFeeBillsIssued.searchDetailBills');
    }

    public function DetailfeeBillPDFReport(Request $request)
    {
        $feeChallanVo = new FeeChallanVO();
        $feeChallanDetailModel = new FeeChallanDetailModel();
        $feeChallanModel = new FeeChallanModel();
        $feeChallanVo->setBranchId($request->input('branch'));
        $feeChallanVo->setClass($request->input('classname'));
        $feeChallanVo->setYear($request->input('year'));
        $studentData = $feeChallanModel->studentDetail($feeChallanVo);
        $fullFee = $feeChallanModel->feeAmount($feeChallanVo);
        $admissionFee = $feeChallanModel->getAdmissionFee($feeChallanVo);
         $tuitionFee = $feeChallanModel->getTutionFee($feeChallanVo);
         $utilityFee = $feeChallanModel->getUtilityFee($feeChallanVo);
         $computerFee = $feeChallanModel->getComputerFee($feeChallanVo);
         $stationaryFee = $feeChallanModel->getStationaryFee($feeChallanVo);
         $devFee = $feeChallanModel->getDevFee($feeChallanVo);
         $examFee = $feeChallanModel->getExamFee($feeChallanVo);
         $scienceFee = $feeChallanModel->getScienceFee($feeChallanVo);
         if ($feeChallanVo->getError()) {
             return $this->getMessageWithRedirect($feeChallanVo->getErrorCode());
         }
         else {
             // return view('Finance.Fees.Reporting.FeeBilSummary.summaryFeeBills',compact('defaulters','feesum');
             $pdf = PDF::loadview('Finance.Fees.Reporting.DetailFeeBillsIssued.detailFeeBills',
                 compact('studentData', 'admissionFee', 'tuitionFee', 'utilityFee', 'computerFee', 'devFee', 'examFee', 'scienceFee', 'fullFee','stationaryFee'))
                 ->setPaper('a4', 'landscape');
             return $pdf->stream('Finance.Fees.Reporting.DetailFeeBillsIssued.detailFeeBills.pdf');
         }

    }



}