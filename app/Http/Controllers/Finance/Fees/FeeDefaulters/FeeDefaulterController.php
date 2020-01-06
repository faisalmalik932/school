<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/26/2017
 * Time: 11:22 AM
 */

namespace App\Http\Controllers\Finance\Fees\FeeDefaulters;


use App\Http\Controllers\BaseController;

class FeeDefaulterController extends BaseController
{
    public function loadView()
    {
        return View('Finance.Fees.FeeDefaulters.feeDefaulters');
    }

}