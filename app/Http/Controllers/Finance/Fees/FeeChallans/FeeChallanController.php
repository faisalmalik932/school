<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 10/20/2017
 * Time: 12:12 PM
 */

namespace App\Http\Controllers\Finance\Fees\FeeChallans;


use App\Http\Controllers\BaseController;
use App\Models\Finance\Fees\FeeChallanModel;
use App\Models\Finance\Fees\FeeChallanDetailModel;
use App\Models\Finance\Fees\FeeStructureModel;
use App\Vos\FinanceVOS\FeeVOS\FeeChallanVOS\FeeChallanVO;
use App\Vos\FinanceVOS\FeeVOS\FeeChallanVOS\FeeChallanDetailVO;
use Illuminate\Http\Request;
use App\Models\Platform\BranchModel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\Registration\StudentModel;
use DB;

class FeeChallanController extends  BaseController
{

    public function loadView()
    {
        $feeChallanModel  = new FeeChallanModel();
        $challanNo = $feeChallanModel->loadChallanNo();
        return view('Finance.Fees.FeeChallan.feechallan',compact('challanNo'));
    }
    public function add(Request $request)
    {
        $branchId = $request->branch;
        $class = $request->class;
        $student = $request->student;

        $resultBranch = DB::table('ptf_branches')->where('BRANCH_ID','=', $branchId)->first();

        if ($resultBranch != null) {
            $resultStudent = array();

            if ($class == 'defualt') {
                $resultStudent = DB::table('adc_students')->where('BRANCH_ID','=', $branchId)->get();
            } 
            
            else if ($student == 'defualt') {
                $resultStudent = array();
                $resultStudent = DB::table('adc_students')->where('BRANCH_ID','=', $branchId)->where('CLASS','=', $class)->get();
            }

            else if ($student != null) {
                $resultStudent = array();
                $resultStudent = DB::table('adc_students')->where('BRANCH_ID','=', $branchId)->where('CLASS','=', $class)->where('STUDENT_ID','=', $student)->get();
            }

            if ($resultStudent != null) {
                for ($i=0; $i < count($resultStudent); $i++)
                {
                    $feeStructureModel = new FeeStructureModel();
                    $feechallanDetailVO = new FeeChallanDetailVO();
                    $feeChallanVO = new FeeChallanVO();
                    $feechallanDetailModel = new FeeChallanDetailModel();
                    $feeChallanModel = new FeeChallanModel();

                    $feeChallanNo = $feeChallanModel->loadChallanNo();
                    $feechallanDetailVO->setChallanDetailId($request->input('primary'));
                    $feeChallanVO->setOrgId(1);
                    $feeChallanVO->setStudentId($resultStudent[$i]->STUDENT_ID);
                    $feeChallanVO->setAdmFeeStatus($request->input('admission'));
                    $feeChallanVO->setBranchId($request->input('branch'));
                    $feeChallanVO->setMonth($request->input('month'));
                    $feeChallanVO->setClass($resultStudent[$i]->CLASS);
                    $feeChallanVO->setYear($request->input('year'));
                    $feeChallanVO->setChallanNo($feeChallanNo);
                    $feeChallanVO->setCreatedBy($this->getUserName());
                    $feeChallanVO->setConcession($resultStudent[$i]->CONCESSION);

                    $feeChallanModel->generateFeeChallan($feeChallanVO);
                    $challanDetails = $feeStructureModel->getFeeChallanDetails($feeChallanVO, $resultStudent[$i]->HOSTEL_ID);

                    for ($z = 0; $z < count($challanDetails); $z++) {
                        $feechallanDetailVO->setChallanId($feeChallanVO->getFeeChallanId());
                        $feechallanDetailVO->setChallanNo($feeChallanVO->getChallanNo());
                        $feechallanDetailVO->setFeeCategoryId($challanDetails[$z]->FEE_CATEGORY_ID);
                        $feechallanDetailVO->setFeeParticularId($challanDetails[$z]->FEE_PARTICULAR_ID);
                        $feechallanDetailVO->setAmount($challanDetails[$z]->AMOUNT);
                        $feechallanDetailVO->setConsssion($resultStudent[$i]->CONCESSION);
                        $feechallanDetailVO->setFeecategorytype($challanDetails[$z]->FEE_CATEGORY_TYPE);
                        $feechallanDetailVO->setFeePeriod($challanDetails[$z]->FEE_PERIOD);
                        $feechallanDetailVO->setCreatedBy($this->getUserName());
                        $feechallanDetailModel->generateFeeChallanDetail($feechallanDetailVO);
                    }

                    if ($feeChallanVO->getError()) {
                        return $this->getMessageWithRedirect($feeChallanVO->getErrorCode());
                    }else {
                        Session::flash('feechallan', "Fee Challans Generated Successfully");

                    }
                }
                return redirect('finance/fees/fee-challan');
            }
        } else {
            return Redirect::back()->withErrors($this->getMessage("Branch does not exists!"));
        }
    }

    public function challanEditView()
    {
        $categoriesModel  =new FeeChallanDetailModel();
        $categories = $categoriesModel->loadChallanCategories();
        return view('Finance.Fees.EditFeeChallan.searchFeeChallan',compact('categories'));
    }

    public function ChallanDetails(Request $request)
    {
        $feechallanVo = new FeeChallanVO();
        $feechallanModel = new FeeChallanDetailModel();
        $feechallanVo->setYear($request->input('year'));
        $feechallanVo->setMonth($request->input('month'));
        $feechallanVo->setBranchId($request->input('branch'));
        $feechallanVo->setClass($request->input('class'));
        $feechallanVo->setStudentId($request->input('student'));
        $challanData = $feechallanModel->getChallanDetails($feechallanVo);
        if(empty($challanData->first())){
            Session::flash('feechallan', "Fee Challan Not Found!");
            return redirect()->back();
        }
        return view('Finance.Fees.EditFeeChallan.editFeeChallan',compact('challanData'));
    }

    public function editChallan(Request $request)
    {
        // dd('hi');
        $feechallanDetailModel = new FeeChallanDetailModel();
        $feeparticular = $request->input('particulars');
        $amount = $request->input('amount');
        $challanid = $request->input('CHALLAN_ID');
        for ($i=0; $i < count($feeparticular); $i++) {
            $challanVO = new  FeeChallanDetailVO();
            $challanVO->setChallanId($challanid);
            $challanVO->setFeeParticularId($feeparticular[$i]);
            $challanVO->setFeecategorytype("FEE");
            $challanVO->setAmount($amount[$i]);
            $feechallanDetailModel->editChallan($challanVO);
        }
        Session::flash('feechallan', "Fee Challan Updated Successfully");
        return redirect()->back();
    }
}