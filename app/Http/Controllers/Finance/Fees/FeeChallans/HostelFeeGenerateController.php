<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 10/21/2017
 * Time: 12:18 PM
 */

namespace App\Http\Controllers\Finance\Fees\FeeChallans;


use App\Http\Controllers\BaseController;
use App\Models\Finance\Fees\FeeStructureModel;
use App\Models\Finance\Fees\HostelFeeChallanDetailModel;
use App\Models\Finance\Fees\HostelFeeGenerateModel;
use App\Vos\FinanceVOS\FeeVOS\FeeChallanVOS\FeeChallanDetailVO;
use App\Vos\FinanceVOS\FeeVOS\FeeChallanVOS\HostelFeeGenerateVO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HostelFeeGenerateController extends BaseController
{
    public function loadView()
    {
        $model = new HostelFeeGenerateModel();
        $challan = $model->loadChallanFormNo();
        $ficalYearModel = new FeeStructureModel();
        $fiscalYear = $ficalYearModel->getAllFiscalYear();
        return view('Finance.Fees.HostelFeeChallan.hostelFeeChallan' , compact('fiscalYear'));
    }

    public function generateHostelFee(Request $request)
    {
        $hostelFeeVo = new HostelFeeGenerateVO();
        $hostelmodel = new HostelFeeGenerateModel();
        $feeStructureModel = new FeeStructureModel();
        $feechallanDetailVO = new FeeChallanDetailVO();
        $feechallanDetailModel = new HostelFeeChallanDetailModel();
        $hostelFeeVo->setHostelId($request->input('hostel'));
        $hostelFeeVo->setChallanNo($hostelmodel->loadChallanFormNo());
        $hostelFeeVo->setStudentID($request->input('student'));
        $hostelFeeVo->setYear($request->input('year'));
        $hostelFeeVo->setMonth($request->input('month'));
        $hostelFeeVo->setClass($request->input('class'));
        $hostelFeeVo->setCreatedBy($this->getUserName());
        $data = $hostelmodel->saveHostelFee($hostelFeeVo);
        $hostelFeeVo->setHostelFeeChallanId($data->getHostelFeeChallanId());
        $challanDetails = $feeStructureModel->getHostelFeeChallanDetails($hostelFeeVo);
        for ($i = 0; $i < count($challanDetails); $i++) {
            $feechallanDetailVO->setChallanId($hostelFeeVo->getHostelFeeChallanId());
            $feechallanDetailVO->setChallanNo($hostelFeeVo->getChallanNo());
            $feechallanDetailVO->setFeeCategoryId($challanDetails[$i]->FEE_CATEGORY_ID);
            $feechallanDetailVO->setFeeParticularId($challanDetails[$i]->FEE_PARTICULAR_ID);
            $feechallanDetailVO->setAmount($challanDetails[$i]->AMOUNT);
            $feechallanDetailVO->setFeecategorytype($challanDetails[$i]->FEE_CATEGORY_TYPE);
            $feechallanDetailVO->setFeePeriod($challanDetails[$i]->FEE_PERIOD);
            $feechallanDetailVO->setCreatedBy($this->getUserName());
            $feechallanDetailModel->generateFeeChallanDetail($feechallanDetailVO);

        }
            if ($hostelFeeVo->getError()) {
                return $this->getMessageWithRedirect($hostelFeeVo->getErrorCode());
            } else {
                Session::flash('feegenerate', "Hostel Fee Challan Generated Successfully");
                return redirect('finance/fees/hostel-challan');
            }


    }

}