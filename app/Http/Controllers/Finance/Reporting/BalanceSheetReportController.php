<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 11/2/2017
 * Time: 11:57 AM
 */

namespace App\Http\Controllers\Finance\Reporting;


use App\Http\Controllers\BaseController;
use App\Models\Finance\Vouchers\CreateVoucherModel;
use App\Vos\FinanceVOS\Settings\AccountHeadVO;
use App\Vos\FinanceVOS\VoucherVOS\CreateVoucherVO;
use Illuminate\Http\Request;
use PDF;

class BalanceSheetReportController extends BaseController
{
    public function loadView()
    {
        return view('Finance.Reporting.BalanceSheetReports.searchbalanceSheet');
    }

    public function balanceSheetPDF(Request $request)
    {
        $accountHeadVO = new AccountHeadVO();
        $createVoucherModel = new CreateVoucherModel();
        $accountHeadVO->setStartdate($request->input('startdate'));
        $accountHeadVO->setEnddate($request->input('enddate'));
        $balancesheetAssetsReport = $createVoucherModel->getBalanceSheetAssetsPeriodWise($accountHeadVO);
        $balancesheetLiablitiesReport = $createVoucherModel->getBalanceSheetLiabilitiesPeriodWise($accountHeadVO);
        $accountClassInfo = $createVoucherModel->gettrialBalanceInfo($accountHeadVO);
        $assetsVariable = 0;
        $expenseVariable = 0;
        $liabilityVariable=0;
        return view('Finance.Reporting.BalanceSheetReports.balanceSheet',
            compact('balancesheetAssetsReport','accountClassInfo','assetsVariable','expenseVariable','liabilityVariable','balancesheetLiablitiesReport'));
        /*$pdf = PDF::loadview('Finance.Reporting.BalanceSheetReports.balanceSheet',compact('balancesheetAssetsReport','accountClassInfo','globalVariable')
            ->setPaper('a4', 'landscape');
        return $pdf->stream('Finance.Reporting.BalanceSheetReports.balanceSheet');*/

    }

}