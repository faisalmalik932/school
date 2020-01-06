<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 11/24/2017
 * Time: 12:19 PM
 */

namespace App\Http\Controllers\Finance\Reporting;


use App\Http\Controllers\BaseController;
use App\Vos\FinanceVOS\Settings\AccountHeadVO;
use Illuminate\Http\Request;
use PDF;

class ExpendituresReportController extends BaseController
{
    public function loadView()
    {
        return view('Finance.Reporting.Expenditures.searchExpenditures');
    }

    public function expendituresPDFReport(Request $request)
    {
        $accountHeadVO = new AccountHeadVO();
        $startdate = $request->input('startdate');
        $enddate = $request->input('enddate');
        return view('Finance.Reporting.Expenditures.expendituresReport');
       /*$pdf = PDF::loadview('Finance.Reporting.Expenditures.expendituresReport')
            ->setPaper('a4', 'portrait');
        return $pdf->stream('Finance.Reporting.Expenditures.expendituresReport');*/


    }

}