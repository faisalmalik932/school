<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/25/2017
 * Time: 8:04 PM
 */

namespace App\Http\Controllers\Finance\Fees\CreateFee;


use App\Http\Controllers\BaseController;
use App\Models\Finance\Fees\CreateFee\FeeDiscountsModel;
use App\Vos\FinanceVOS\FeeVOS\CreateFeeVOS\FeeDiscountVO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CreateDiscountController extends BaseController
{
    public function loadView()
    {
        return view('Finance.Fees.CreateFee.createDiscount');
    }

    public function add(Request $request)
    {
        $discountVO = new FeeDiscountVO();
        $discountVO->setOrgId(1);
        $discountVO->setBranchId(request()->session()->get('BRANCH_ID'));
        $discountVO->setDiscountName($request->input('discountname'));
        $discountVO->setAmount($request->input('amount'));
        $discountModel = new FeeDiscountsModel();
        if($discountVO->getDiscountId() <= 0 || $discountVO->getDiscountId() == '') {
            $discountVO->setCreatedBy($this->getUserName());
            $discountModel->saveDiscountInfo($discountVO);
            if ($discountVO->getError()) {
                return $this->getMessageWithRedirect($discountVO->getErrorCode());
            } else {
                Session::flash('feediscount', "Discount Added Successfully");
                return redirect('finance/fees/create-discount');
            }
        }
        else{
                $discountVO->setModifiedBy($this->getUserName());
                $discountVO->setModifiedAt($this->getTimeStamp());
                $discountModel->updateDiscountInfo($discountVO);
                Session::flash('feediscount', "Discount Added Successfully");
                return redirect('finance/fees/create-discount');
        }
    }

}