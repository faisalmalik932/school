<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/26/2017
 * Time: 12:01 PM
 */

namespace App\Http\Controllers\Finance\Fees\FeeReports;


use App\Http\Controllers\BaseController;

class FeeReportController extends BaseController
{
    public function loadView()
    {
        return View('Finance.Fees.FeeReports.studentFeeReport');
    }

}