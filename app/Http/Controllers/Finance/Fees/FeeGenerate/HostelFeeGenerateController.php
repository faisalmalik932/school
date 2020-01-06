<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 10/21/2017
 * Time: 12:18 PM
 */

namespace App\Http\Controllers\Finance\Fees\FeeGenerate;


use App\Http\Controllers\BaseController;
use App\Models\Finance\Fees\HostelFeeGenerateModel;
use App\Vos\FinanceVOS\FeeVOS\FeeGenerateVOS\HostelFeeGenerateVO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HostelFeeGenerateController extends BaseController
{
    public function loadView()
    {
        $model = new HostelFeeGenerateModel();
        $challan = $model->loadChallanFormNo();
        return view('Finance.Fees.FeeGenerate.hostelFeeGenerate',compact('challan'));
    }

    public function generateHostelFee(Request $request)
    {
        $hostelFeeVo = new HostelFeeGenerateVO();
        $model = new HostelFeeGenerateModel();
        $student =$request->input('student');
        $feeAllocationId = $model->getfeeAllocation($student);
        for($i=0;$i<count($feeAllocationId);$i++){
        $hostelFeeVo->setHostelId($request->input('hostel'));
        $hostelFeeVo->setChallanNo($request->input('challan'));
        $hostelFeeVo->setStudentID($student);
        $hostelFeeVo->setMonth($request->input('month'));
        $hostelFeeVo->setHostelFeeAllocationId($feeAllocationId[$i]->HOSTEL_FEE_ALLOCATION_ID);
            $hostelFeeVo->setCreatedBy($this->getUserName());
            $model->saveHostelFee($hostelFeeVo);}
            if ($hostelFeeVo->getError()) {
                return $this->getMessageWithRedirect($hostelFeeVo->getErrorCode());
            } else {
                Session::flash('feegenerate', "Fee Generated Successfully");
                return redirect('finance/fees/hostel-fee-generate');
            }


    }

}