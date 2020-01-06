<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/25/2017
 * Time: 6:54 PM
 */

namespace App\Http\Controllers\Finance\Fees\CreateFee;


use App\Http\Controllers\BaseController;
use App\Models\Finance\Fees\CreateFee\FeeCategoriesModel;
use App\Vos\FinanceVOS\FeeVOS\CreateFeeVOS\FeeCategoryVO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CreateCategoryController extends BaseController
{
    public function loadView()
    {
        return view('Finance.Fees.CreateFee.createCategory');
    }

    public function add(Request $request)
    {
        $categoryVO = new FeeCategoryVO();
        $categoryVO->setOrgId(1);
        $categoryVO->setCategoryId($request->input('primary'));
        $categoryVO->setFeeHeader($request->input('feeheader'));
        $categoryVO->setBranchId(request()->session()->get('BRANCH_ID'));
        $categoryVO->setCategoryName($request->input('categoryname'));
        $categoryVO->setDescription($request->input('description'));
        $feeCategoryModel = new FeeCategoriesModel();
        if($categoryVO->getCategoryId() <= 0 || $categoryVO->getCategoryId() == '') {
            $categoryVO->setCreatedBy($this->getUserName());
            $feeCategoryModel->saveFeeCategory($categoryVO);
            if ($categoryVO->getError()) {
                return $this->getMessageWithRedirect($categoryVO->getErrorCode());
            } else {
                Session::flash('feecategory', "Fee Category Added Successfully");
                return redirect('finance/fees/create-category');
            }
        }
        else{
            $categoryVO->setModifiedBy($this->getUserName());
            $categoryVO->setModifiedAt($this->getTimeStamp());
            $feeCategoryModel->updateFeeCategory($categoryVO);
            Session::flash('feecategory', "Fee Category Added Successfully");
            return redirect('finance/fees/create-category');
        }
    }


}