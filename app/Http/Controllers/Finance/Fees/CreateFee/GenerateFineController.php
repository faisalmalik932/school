<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/25/2017
 * Time: 8:15 PM
 */

namespace App\Http\Controllers\Finance\Fees\CreateFee;


use App\Http\Controllers\BaseController;
use App\Models\Finance\Fees\CreateFee\FinesModel;
use App\Vos\FinanceVOS\FeeVOS\CreateFeeVOS\FinesVO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GenerateFineController extends BaseController
{
    public function loadView()
    {
        return view('Finance.Fees.CreateFee.generateFine');
    }

    public function add(Request $request)
    {
        $fineVO = new FinesVO();
        $fineVO->setOrgId(1);
        $fineVO->setBranchId(request()->session()->get('BRANCH_ID'));
        $fineVO->setFineName($request->input('finename'));
        $fineVO->setFineValue($request->input('amount'));
        $fineVO->setDays($request->input('days'));
        $fineModel = new FinesModel();
        $primary = $request->input('primary');
        if(count($primary)==0) {
            $fineModel->saveFineInfo($fineVO);
            if ($fineVO->getError()) {
                return $this->getMessageWithRedirect($fineVO->getErrorCode());
            } else {
                Session::flash('feefine', "Fine Added Successfully");
                return redirect('finance/fees/generate-fine');
            }
        }
        else{
            $fineVO->setFineId($primary);
            $fineModel->updateFineInfo($fineVO);
            Session::flash('feefine', "Fine Added Successfully");
            return redirect('finance/fees/generate-fine');
        }
    }
}