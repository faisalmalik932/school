<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 11/1/2017
 * Time: 1:17 PM
 */

namespace App\Http\Controllers\Finance\Reporting;


use App\Http\Controllers\BaseController;
use App\Models\Finance\Settings\AccountHeadModel;
use PDF;

class GLAccountsReportController extends BaseController
{
    public function GLAccountReportPDF()
    {
        $accountHeadModel = new AccountHeadModel();
        $glAccounts = $accountHeadModel->AccountHeadsPDFReport();
        $pdf = PDF::loadview('Finance.Reporting.GLAccountsReports.glAccountsReport',
            compact('glAccounts'))
            ->setPaper('a4', 'portrait');
        return $pdf->stream('Finance.Reporting.GLAccountsReports.glAccountsReport');
    }

}