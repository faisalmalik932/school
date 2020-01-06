<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/25/2017
 * Time: 7:46 PM
 */

namespace App\Http\Controllers\Finance\Fees\CreateFee;


use App\Http\Controllers\BaseController;
use App\Models\Finance\Fees\CreateFee\FeeCategoriesModel;
use App\Models\Finance\Fees\CreateFee\FeeParticularsModel;
use App\Vos\FinanceVOS\FeeVOS\CreateFeeVOS\FeeParticularsVO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CreateParticularsController extends BaseController
{
    public function loadView()
    {
        $categoryModel = new FeeCategoriesModel();
        $category = $categoryModel->loadCategories();
        return view('Finance.Fees.CreateFee.createParticulars')->with('category',$category);
    }

    public function add(Request $request)
    {
        $particularVO = new FeeParticularsVO();
        $particularVO->setOrgId(1);
        $particularVO->setParticularId($request->input('primary'));
        $particularVO->setBranchId(request()->session()->get('BRANCH_ID'));
        $particularVO->setCategoryId($request->input('category'));
        $particularVO->setDescription($request->input('description'));
        $particularVO->setParticularName($request->input('particularname'));
        $feeParticularModel = new FeeParticularsModel();
        if($particularVO->getParticularId() <= 0 || $particularVO->getParticularId() == '') {
            $particularVO->setCreatedBy($this->getUserName());
            $feeParticularModel->saveFeeParticular($particularVO);
            if ($particularVO->getError()) {
                return $this->getMessageWithRedirect($particularVO->getErrorCode());
            } else {
                Session::flash('feeparticular', "Fee Particular Added Successfully");
                return redirect('finance/fees/create-particulars');
            }
        }
        else{
            $particularVO->setModifiedBy($this->getUserName());
            $particularVO->setModifiedAt($this->getTimeStamp());
            $feeParticularModel->updateFeeParticular($particularVO);
            Session::flash('feeparticular', "Fee Particular Updated Successfully");
            return redirect('finance/fees/create-particulars');
        }

    }
}