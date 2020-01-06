<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 11/20/2017
 * Time: 12:11 PM
 */

namespace App\Models\Finance\Fees;


use App\Http\Controllers\BaseController;
use App\Models\BaseModel;
use App\Vos\FinanceVOS\FeeVOS\FeeChallanVOS\FeeChallanDetailVO;
use App\Vos\FinanceVOS\FeeVOS\FeeChallanVOS\FeeChallanVO;

class HostelFeeChallanDetailModel extends BaseModel
{
    protected $primaryKey = 'CHALLAN_DETAIL_ID';
    protected $table = 'fin_hostel_fee_challan_details';
    protected $fillable = ['HOSTEL_FEE_CHALLAN_ID','FEE_CATEGORY_TYPE','FEE_CATEGORY_ID','FEE_PARTICULAR_ID','AMOUNT','FEE_PERIOD'];

    public function generateFeeChallanDetail(FeeChallanDetailVO $feeGenerateVO)
    {
        // dd($feeGenerateVO);
        $this->insert(array(
            'HOSTEL_FEE_CHALLAN_ID'=>$feeGenerateVO->getChallanId(),
            'CREATED_BY'=>$feeGenerateVO->getCreatedBy(),
            'FEE_CATEGORY_TYPE'=>$feeGenerateVO->getFeecategorytype(),
            'FEE_CATEGORY_ID'=>$feeGenerateVO->getFeeCategoryId(),
            'FEE_PARTICULAR_ID'=>$feeGenerateVO->getFeeParticularId(),
            'AMOUNT'=>$feeGenerateVO->getAmount(),
            'FEE_PERIOD'=>$feeGenerateVO->getFeePeriod()
        ));
    }
    public function getChallanDetails(FeeChallanVO $feeGenerateVO)
    {
        $result = DB::table('fin_fee_bills_vw')
            ->where('BRANCH_ID',$feeGenerateVO->getBranchId())
            ->where('FEE_STATUS','=','UNPAID')
            ->where('FEE_CATEGORY_TYPE','=','FEE')
            ->where('CATEGORY_NAME','=','HOSTEL FEE')
            ->where('MONTH','=',$feeGenerateVO->getMonth())
            ->where('CLASS','=',$feeGenerateVO->getClass())
            ->where('STUDENT_ID','=',$feeGenerateVO->getStudentId())
            ->get();
        return $result;
    }

}