<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/26/2017
 * Time: 3:03 PM
 */

namespace App\Http\Controllers\Finance\AssetLiabilityManagement;


use App\Http\Controllers\BaseController;


class AssetsController extends BaseController
{
    public function loadView()
    {
        return view('Finance.AssetLiabilityManagment.Assets');
    }
}