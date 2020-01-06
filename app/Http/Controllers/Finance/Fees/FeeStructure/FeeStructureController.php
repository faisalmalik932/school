<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/29/2017
 * Time: 12:34 PM
 */

namespace App\Http\Controllers\Finance\Fees\FeeStructure;


use App\Http\Controllers\BaseController;
use App\Models\Finance\Fees\CreateFee\FeeCategoriesModel;
use App\Models\Finance\Fees\FeeStructureModel;
use App\Models\Finance\Fees\HostelFeeStructureModel;
use App\Vos\FinanceVOS\FeeVOS\FeeStructureVOS\FeeStructureVO;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class   FeeStructureController extends BaseController
{
    public function loadView()
    {
        $ficalYearModel = new FeeStructureModel();
        $fiscalYear = $ficalYearModel->getAllFiscalYear();
        return view('Finance.Fees.FeeStructure.feeStructure',compact('fiscalYear'));
    }

    public function add(Request $request)
    {
        $jsonDecode =  json_decode( $request->tabledata , true);
        $rules = [
        '*.amount' => 'required|max:10',
        '*.feesubcategory' => 'required'
        ];

        $validator = \Validator::make($jsonDecode, $rules);
        if ($validator->fails()) {
            // dd($validator);
        // session::flash('employeepayslip', "amount lenght should not be greator than 10 & every field is must required!");
        return redirect()->back()->withErrors($validator);
        }

        $allocations = $request->input('tabledata');
        $value = json_decode($allocations, true);
        // dd($value);
        $feeCategoryList = new Collection();
        $feeStructureVO = new FeeStructureVO();
        $feeStructureModel = new FeeStructureModel();
        $class = $request->input('classname');
        foreach ($class as $key=>$classes){
        for ($i = 0; $i < count($value); $i++) {
            $feeStructureVO = new FeeStructureVO();
            $feeStructureVO->setFeeStructureId($request->input('primary'));
            $feeStructureVO->setOrgId(1);
            $feeStructureVO->setBranchId($request->input('branch'));
            $feeStructureVO->setFiscalYear($request->input('fiscalYear'));
            $feeStructureVO->setFeeCategoryId($value[$i]['feecategoryID']);
            $feeStructureVO->setFeeSubCategoryId($value[$i]['feesubcategoryID']);
            $feeStructureVO->setAmount($value[$i]['amount']);
            $feeStructureVO->setFeeType($value[$i]['feetypeValue']);
            $feeStructureVO->setFeeHeader($value[$i]['feeheader']);
            // dd($feeStructureVO);
            $feeStructureVO->setClassId($classes);
            $feeStructureVO->setCreatedBy($this->getUserName());
            $feeCategoryList->add($feeStructureVO);
        }}
        if($feeStructureVO->getFeeStructureId() <= 0 || $feeStructureVO->getFeeStructureId() == '') {
            if ($feeCategoryList->count() > 0) {
                $feeStructureModel->saveFeeStructure($feeCategoryList);
            }
            if ($feeStructureVO->getError()) {
                return $this->getMessageWithRedirect($feeStructureVO->getErrorCode());
            } else {
                Session::flash('feestructure', "Fee Structure Added Successfully");
                return redirect('finance/fees/fee-structure');
            }
        }
        else
        {
            $feeStructureVO->setModifiedBy($this->getUserName());
            $feeStructureVO->setModifiedAt($this->getTimeStamp());
            $feeStructureModel->updateFeeStructure($feeCategoryList);
            Session::flash('feestructure', "Fee Structure Updated Successfully");
            return redirect('finance/fees/fee-structure');
        }
    }

    public function loadFeeStructureView()
    {
        return view('Finance.Fees.HostelFee.hostelFeeStructure');
    }

    public function addHostelFeeStructure(Request $request)
    {
        $allocations = $request->input('tabledata');
        $value = json_decode($allocations, true);
        $feeCategoryList = new Collection();
        $feeStructureVO = new FeeStructureVO();
        $feeStructureModel = new HostelFeeStructureModel();
            for ($i = 0; $i < count($value); $i++) {
                $feeStructureVO = new FeeStructureVO();
                $feeStructureVO->setFeeStructureId($request->input('primary'));
                $feeStructureVO->setOrgId(1);
                $feeStructureVO->setBranchId($request->input('hostel'));
                $feeStructureVO->setFeeCategoryId($value[$i]['feecategoryID']);
                $feeStructureVO->setFeeSubCategoryId($value[$i]['feesubcategoryID']);
                $feeStructureVO->setAmount($value[$i]['amount']);
                $feeStructureVO->setFeeType($value[$i]['feetypeValue']);
                $feeStructureVO->setStudentId($request->input('student'));
                $feeStructureVO->setCreatedBy($this->getUserName());
                $feeCategoryList->add($feeStructureVO);
            }

        if($feeStructureVO->getFeeStructureId() <= 0 || $feeStructureVO->getFeeStructureId() == '') {
            if ($feeCategoryList->count() > 0) {
                $feeStructureModel->saveFeeStructure($feeCategoryList);}
            if ($feeStructureVO->getError()) {
                return $this->getMessageWithRedirect($feeStructureVO->getErrorCode());
            } else {
                Session::flash('feestructure', "Fee Structure Added Successfully");
                return redirect('finance/fees/fee-structure');
            }
        }
        else
        {
            $feeStructureVO->setModifiedBy($this->getUserName());
            $feeStructureVO->setModifiedAt($this->getTimeStamp());
            $feeStructureModel->updateFeeStructure($feeStructureVO);
            Session::flash('feestructure', "Fee Structure Updated Successfully");
            return redirect('finance/fees/fee-structure');
        }

    }

}