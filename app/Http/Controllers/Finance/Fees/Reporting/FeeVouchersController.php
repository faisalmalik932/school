<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 12/16/2017
 * Time: 11:22 AM
 */

namespace App\Http\Controllers\Finance\Fees\Reporting;


use App\Http\Controllers\BaseController;
use App\Models\Finance\Fees\FeeChallanModel;
use App\Vos\FinanceVOS\FeeVOS\FeeChallanVOS\FeeChallanVO;
use Illuminate\Http\Request;
use PDF;

class FeeVouchersController extends BaseController
{
    public function loadView()
    {
        return view('Finance.Fees.Reporting.FeeVouchers.searchFeeVouchers');
    }

    public function FeeVouchersPDFReport(Request $request)
    {
        $feechallanVO = new FeeChallanVO();
        $feechallanModel = new FeeChallanModel();
        $feechallanVO->setYear($request->input('year'));
        $voucherDetail  = $feechallanModel->getFeeVoucherAnalysis($feechallanVO);
        $year = $feechallanVO->getYear();
        if ($feechallanVO->getError()) {
            return $this->getMessageWithRedirect($feechallanVO->getErrorCode());
        } else {
            //return view('Finance.Fees.Reporting.FeeVouchers.feeVoucher', compact('voucherDetail','year'));
            $pdf = PDF::loadview('Finance.Fees.Reporting.FeeVouchers.feeVoucher', compact('voucherDetail','year'))
                ->setPaper('a4', 'landscape');
            return $pdf->stream('Finance.Fees.Reporting.FeeVouchers.feeVoucher.pdf');
        }


    }

}