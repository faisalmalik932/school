<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/26/2017
 * Time: 6:34 PM
 */

namespace App\Http\Controllers\Finance\Fees\FeeCollect;


use App\Http\Controllers\BaseController;
use App\Models\Finance\Fees\FeeCollection\CollectFeeModel;
use App\Models\Finance\Fees\FeeChallanDetailModel;
use App\Models\Platform\ClassModel;
use App\Vos\FinanceVOS\FeeVOS\FeeCollectVOS\FeeCollectVO;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;

class FeeCollectController extends BaseController
{
    public function loadView()
    {
        $classModel = new ClassModel();
        $class = $classModel->loadClasses();
        return view('Finance.Fees.FeeCollect.collectFee')->with('class',$class);
    }

    public function addFeeCollection(Request $request)
    {
        $feecollectModel = new CollectFeeModel();
        $list = $request->input('primary');
        foreach ($list as $challanNo) {
            $pieces = explode( ',', $challanNo);
                 $feeCollectVO = new FeeCollectVO();
                 foreach ($pieces as $item) {
                     $feeCollectVO->setChallanNo($item);
                     $feeCollectVO->setModifiedBy($this->getUserName());
                     $feeCollectVO->setModifiedAt($this->getTimeStamp());
                     $feecollectModel->collectFee($feeCollectVO);
                 }
        }
        Session::flash('feecollect', "Fee Collected Successfully");
        return redirect('finance/fees/fee-collect');
    }

    public function loadHostelFeeCollectView(Request $request)
    {
        $classModel = new ClassModel();
        $class = $classModel->loadClasses();
        return view('Finance.Fees.FeeCollect.hostelFeeCollect')->with('class',$class);
    }

    public function addHostelFeeCollection(Request $request)
    {
        $feeCollectVO = new FeeCollectVO();
        $feecollectModel = new CollectFeeModel();
        $list = $request->input('primary');
        //print_r($list);
        foreach ($list as $id) {
            $feeCollectVO->setStudentId($id);
            $feecollectModel->collectHostelFee($feeCollectVO);
        }
        return redirect('finance/fees/hostel-fee-collect');
    }


}