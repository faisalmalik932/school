<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 11/24/2017
 * Time: 3:06 PM
 */

namespace App\Http\Controllers\Finance\Reporting;


use App\Http\Controllers\BaseController;
use App\Models\Finance\Vouchers\CreateVoucherModel;
use App\Vos\FinanceVOS\Settings\AccountHeadVO;
use Illuminate\Http\Request;
use PDF;

class TrialBalanceController extends BaseController
{
    public function loadView()
    {
        return view('Finance.Reporting.TrialBalance.searchTrialBalance');
    }

    public function trialBalancePDFReport(Request $request)
    {
        $accountHeadVO = new AccountHeadVO();
        $voucherModel = new CreateVoucherModel();
        $accountHeadVO->setStartdate($request->input('startdate'));
        $accountHeadVO->setEnddate( $request->input('enddate'));
        $trialBalancedetial = $voucherModel->getTrialBalancePeriodWise($accountHeadVO);
        $total = $voucherModel->getTrialBalanceTotal($accountHeadVO);
        $trialBalanceInfo = $voucherModel->gettrialBalanceInfo($accountHeadVO);
        $startdate = $accountHeadVO->getStartdate();
        $enddate = $accountHeadVO->getEnddate();
        $trialbalanaceData = '';
        //print_r($total);
        if ($accountHeadVO->getError()) {
            return $this->getMessageWithRedirect($accountHeadVO->getErrorCode());
        }
        else {
            $pdf = PDF::loadview('Finance.Reporting.TrialBalance.trialBalanceReport', compact('trialBalancedetial', 'total', 'startdate', 'enddate','trialBalanceInfo'))
                ->setPaper('a4', 'portrait');
            return $pdf->stream('Finance.Reporting.TrialBalance.trialBalanceReport');
        }
    }

}