<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 11/22/2017
 * Time: 9:52 AM
 */

namespace App\Http\Controllers\Finance\Fees\Reporting;


use App\Http\Controllers\BaseController;
use App\Models\Finance\Fees\HostelFeeGenerateModel;
use App\Vos\FinanceVOS\FeeVOS\FeeChallanVOS\HostelFeeGenerateVO;
use Illuminate\Http\Request;
use PDF;

class HostelFeeReportsController extends BaseController
{
    public function loadhostelFeeVoucherView()
    {
        return view('Finance.Fees.Reporting.HostelFeeVoucher.searchHostelFeeVoucher');
    }

    public function HostelFeeVoucherPDFReport(Request $request)
    {
        $hostelfeeVO = new HostelFeeGenerateVO();
        $hostelFeeModel = new HostelFeeGenerateModel();
        $hostelfeeVO->setYear($request->input('year'));
        $year = $hostelfeeVO->getYear();
        $challanDetail = $hostelFeeModel->getHostelFeeChallanDetail($hostelfeeVO);
        if ($hostelfeeVO->getError()) {
            return $this->getMessageWithRedirect($hostelfeeVO->getErrorCode());
        } else {
            //return view('Finance.Fees.Reporting.HostelFeeVoucher.hostelfeeVouchers', compact('challanDetail','year'));
            $pdf = PDF::loadview('Finance.Fees.Reporting.HostelFeeVoucher.hostelfeeVouchers', compact('challanDetail','year'))
                ->setPaper('a4', 'portrait');
            return $pdf->stream('Finance.Fees.Reporting.HostelFeeVoucher.hostelfeeVouchers.pdf');
        }
    }

}