<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/20/2017
 * Time: 2:27 PM
 */

namespace App\Http\Controllers\Finance\Fees\FeeAllocation;
use App\Models\Finance\Fees\CreateFee\FeeCategoriesModel;
use App\Models\Finance\Fees\CreateFee\FeeParticularsModel;
use App\Models\Finance\Fees\HostelFeeAllocateModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Input;


use App\Http\Controllers\BaseController;
use App\Models\Finance\Fees\FeeAllocateModel;
use App\Vos\FinanceVOS\FeeVOS\FeeAllocationVOS\FeeAllocateVO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FeeAllocateController extends BaseController
{
    public function loadView()
    {
        $categoryModel = new FeeCategoriesModel();
        $category = $categoryModel->loadCategories();
        return view('Finance.Fees.FeeAllocation.feeAllocate')->with('category', $category);
    }

    public function add(Request $request)
    {
        $allocations = $request->input('tabledata');
        $value = json_decode($allocations, true);
        $feeCategoryList = new Collection();
        $feeAllocateVO = new FeeAllocateVO();
        $feeAllocateModel = new FeeAllocateModel();
        $class = $request->input('class');
        foreach ($class as $key=>$classes){
        for ($i = 0; $i < count($value); $i++) {
            $feeAllocateVO = new FeeAllocateVO();
            $feeAllocateVO->setFeeCategoryId($value[$i]['feecategoryID']);
            $feeAllocateVO->setFeesubCategoryId($value[$i]['feesubcategoryID']);
            $feeAllocateVO->setFeeAllocationId($request->input('primary'));
            $feeAllocateVO->setBranchId($request->input('branch'));
            $feeAllocateVO->setClassId($classes);
            $feeAllocateVO->setCreatedBy($this->getUserName());
            $feeCategoryList->add($feeAllocateVO);
        }}
        if ($feeAllocateVO->getFeeAllocationId() <= 0 || $feeAllocateVO->getFeeAllocationId() == '') {
            if ($feeCategoryList->count() > 0) {
                $feeAllocateModel->allocateFee($feeCategoryList);
                if ($feeAllocateVO->getError()) {
                    return $this->getMessageWithRedirect($feeAllocateVO->getErrorCode());
                } else {
                    session::flash('feeallocate', "Fee Allocated Successfully");
                    return redirect('finance/fees/fee-allocate');
                }
            }
        } else {
            $feeAllocateModel->updateFeeAllocation($feeAllocateVO);
            session::flash('feeallocate', "Fee Allocation Updated Successfully");
            return redirect('finance/fees/fee-allocate');
        }
    }

    public function loadHostelFeeAllocation()
    {
        $categoryModel = new FeeCategoriesModel();
        $category = $categoryModel->loadCategories();
        return view('Finance.Fees.HostelFee.hostelfeeAllocation')->with('category', $category);

    }

    public function allocateHostelFee(Request $request)
    {
        $allocations = $request->input('tabledata');
        $value = json_decode($allocations, true);
        $feeCategoryList = new Collection();
        $feeAllocateVO = new FeeAllocateVO();
        $feeAllocateModel = new HostelFeeAllocateModel();
            for ($i = 0; $i < count($value); $i++) {
                $feeAllocateVO = new FeeAllocateVO();
                $feeAllocateVO->setFeeCategoryId($value[$i]['feecategoryID']);
                $feeAllocateVO->setFeesubCategoryId($value[$i]['feesubcategoryID']);
                $feeAllocateVO->setFeeAllocationId($request->input('primary'));
                $feeAllocateVO->setBranchId($request->input('hostel'));
                $feeAllocateVO->setStudentId($request->input('student'));
                $feeAllocateVO->setCreatedBy($this->getUserName());
                $feeCategoryList->add($feeAllocateVO);
            }
        if ($feeAllocateVO->getFeeAllocationId() <= 0 || $feeAllocateVO->getFeeAllocationId() == '') {
            if ($feeCategoryList->count() > 0) {
                $feeAllocateModel->allocateHostelFee($feeCategoryList);
                if ($feeAllocateVO->getError()) {
                    return $this->getMessageWithRedirect($feeAllocateVO->getErrorCode());
                } else {
                    session::flash('feeallocate', "Fee Allocated Successfully");
                    return redirect('finance/fees/fee-allocate');
                }
            }
        } else {
            session::flash('feeallocate', "Fee Allocation Updated Successfully");
            return redirect('finance/fees/fee-allocate');
        }

    }
}