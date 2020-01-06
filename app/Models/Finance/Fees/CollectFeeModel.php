<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/26/2017
 * Time: 4:06 PM
 */

namespace App\Models\Finance\Fees\FeeCollection;


use App\Models\BaseModel;
use App\Vos\FinanceVOS\FeeVOS\FeeCollectVOS\FeeCollectVO;
use DB;
use Carbon\Carbon;

class CollectFeeModel extends BaseModel
{
    public function collectFee(FeeCollectVO $collectVO)
    {
        $mytime = Carbon::now();
        $time = $mytime->toDateString();
       //print_r($collectVO->getChallanNo());
        DB::table('fin_fee_challans')->where('CHALLAN_NO','=',$collectVO->getChallanNo())
            ->update(['FEE_STATUS'=>'PAID','RECEIVED_DATE'=>$time,'UPDATED_BY' => $collectVO->getModifiedBy(),
                'UPDATED_AT' => $collectVO->getModifiedAt()]);
    }

    public function collectHostelFee(FeeCollectVO $collectVO)
    {
        $mytime = Carbon::now();
        $time = $mytime->toDateString();
        $result = DB::table('fin_hostel_fee_challan')->where('STUDENT_ID',$collectVO->getStudentId())
            ->update(['FEE_STATUS'=>'PAID','RECEIVED_DATE'=>$time]);
        return $result;
    }


}