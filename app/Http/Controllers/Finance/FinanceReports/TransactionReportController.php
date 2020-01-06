<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/26/2017
 * Time: 2:35 PM
 */

namespace App\Http\Controllers\Finance\FinanceReports;


use App\Http\Controllers\BaseController;

class TransactionReportController extends BaseController
{
    public function loadView()
    {
        return view('Finance.FinanceReports.transactionReport');
    }
}