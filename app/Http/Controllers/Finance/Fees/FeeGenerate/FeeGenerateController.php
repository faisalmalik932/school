<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 10/20/2017
 * Time: 12:12 PM
 */

namespace App\Http\Controllers\Finance\Fees\FeeGenerate;


use App\Http\Controllers\BaseController;
use App\Models\Finance\Fees\FeeDetailModel;
use App\Models\Finance\Fees\FeeGenerateModel;
use App\Vos\FinanceVOS\FeeVOS\FeeGenerateVOS\FeeDetailVO;
use App\Vos\FinanceVOS\FeeVOS\FeeGenerateVOS\FeeGenerateVO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FeeGenerateController extends  BaseController
{

    public function loadView()
    {
        $feeGenerateModel = new FeeGenerateModel();
        $challan = $feeGenerateModel->loadChallanFormNo();
        return view('Finance.Fees.FeeGenerate.feeGenerate',compact('challan'));
    }

    public function add(Request $request)
    {
        $feeGenerateVO = new FeeGenerateVO();
        $feeDetailVO = new FeeDetailVO();
        $feeGenerateModel = new FeeGenerateModel();
        $feeDetailModel = new FeeDetailModel();
        $branch = $request->input('branch');
        $class = $request->input('class');
        $feeStructureId = $feeGenerateModel->getfeeStructure($class, $branch);
        for ($i = 0; $i < count($feeStructureId); $i++){
            $feeGenerateVO->setFeeGenerateId($request->input('primary'));
        $feeDetailVO->setStudentId($request->input('student'));
        $feeDetailVO->setBranchId($branch);
        $feeDetailVO->setOrgId(1);
        $feeDetailVO->setMonth($request->input('month'));
        $feeDetailVO->setClass($class);
        $feeDetailVO->setYear($request->input('year'));
        $feeDetailVO->setChallanNo($request->input('challan'));
        $feeDetailVO->setFeeStructureId($feeStructureId[$i]->FEE_STRUCTURE_ID);
        $feeDetailModel->FeeDetail($feeDetailVO);
        $feeGenerateVO->setCreatedBy($this->getUserName());
        $feeGenerateVO->setFeeDetailId($feeDetailVO->getFeeDetailId());
            $feeGenerateModel->generateFEE($feeGenerateVO);}
        if ($feeDetailVO->getError()) {
                 return $this->getMessageWithRedirect($feeDetailVO->getErrorCode());
             } else {
                 Session::flash('feegenerate', "Fee Generated Successfully");
                 return redirect('finance/fees/fee_generate');
             }
         }
}