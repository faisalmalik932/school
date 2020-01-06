<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 12/11/2017
 * Time: 11:22 AM
 */

namespace App\Http\Controllers\Finance\Fees\FeeStructure;


use App\Http\Controllers\BaseController;
use App\Models\Finance\Fees\FeeStructureModel;
use App\Vos\FinanceVOS\FeeVOS\FeeStructureVOS\FeeStructureVO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EditFeeStructureController extends BaseController
{
    public function loadView()
    {
        $ficalYearModel = new FeeStructureModel();
        $fiscalYear = $ficalYearModel->getAllFiscalYear();
        return view('Finance.Fees.FeeStructure.searchFeeStructure',compact('fiscalYear'));
    }

    public function ChallanStrucureDetails(Request $request)
    {
        $feeStrucureVO = new FeeStructureVO();
        $feeStructureModel = new FeeStructureModel();
        $feeStrucureVO->setBranchId($request->input('branch'));
        $feeStrucureVO->setClassId($request->input('class'));
        $feeStrucureVO->setFiscalYear($request->input('fiscalYear'));
        $feeStrucure = $feeStructureModel->getChallanStrucureForEdit($feeStrucureVO);

        if ($feeStrucureVO->getError()) {
            return $this->getMessageWithRedirect($feeStrucureVO->getErrorCode());
        }
        else {
            return view('Finance.Fees.FeeStructure.editfeeStructure', compact('feeStrucure'));
        }
    }

    public function editChallanStructure(Request $request)
    {

        $feeStrucureModel = new FeeStructureModel();
        $feeparticular = $request->input('particulars');
        $amount = $request->input('amount');
        $structureid = $request->input('STRUCTURE_ID');
        //print_r($amount);
        for($i=0;$i<count($feeparticular);$i++)
        {
            $feeStructureVO = new FeeStructureVO();
            $feeStructureVO->setFeeSubCategoryId($feeparticular[$i]);
            $feeStructureVO->setAmount($amount[$i]);
            $feeStructureVO->setFeeStructureId($structureid[$i]);
            $feeStrucureModel->editChallanStructure($feeStructureVO);
        }
        Session::flash('feechallan', "Fee Structure Edited Successfully");
        return redirect('finance/fees/fee-challan-structure-edit');

    }

}