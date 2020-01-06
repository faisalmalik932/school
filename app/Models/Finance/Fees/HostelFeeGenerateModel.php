<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 10/21/2017
 * Time: 12:15 PM
 */

namespace App\Models\Finance\Fees;


use App\Models\BaseModel;
use App\Vos\FinanceVOS\FeeVOS\FeeChallanVOS\HostelFeeGenerateVO;
use DB;

class HostelFeeGenerateModel extends BaseModel
{
    protected $primaryKey = 'HOSTEL_FEE_CHALLAN_ID';
    protected $table = 'fin_hostel_fee_challan';
    protected $fillable = ['HOSTEL_ID','CHALLAN_NO','STUDENT_ID','MONTH','YEAR','CLASS'];

    public function saveHostelFee(HostelFeeGenerateVO $hostelFeeGenerateVO)
    {
        $result = $this->select()->where([['HOSTEL_ID', '=', $hostelFeeGenerateVO->getHostelId()],
            ['STUDENT_ID','=',$hostelFeeGenerateVO->getStudentId()],
            ['CLASS','=',$hostelFeeGenerateVO->getClass()],
            ['YEAR','=',$hostelFeeGenerateVO->getYear()],
            ['MONTH','=',$hostelFeeGenerateVO->getMonth()]])->get();
        if (count($result) > 0) {
            $hostelFeeGenerateVO->setErrorResponse(true, '0000039');
        } else {
            $id = $this->insertGetId(array(
                'HOSTEL_ID' => $hostelFeeGenerateVO->getHostelId(),
                'STUDENT_ID' => $hostelFeeGenerateVO->getStudentID(),
                'CHALLAN_NO' => $hostelFeeGenerateVO->getChallanNo(),
                'MONTH' => $hostelFeeGenerateVO->getMonth(),
                'YEAR'=>$hostelFeeGenerateVO->getYear(),
                'CLASS'=>$hostelFeeGenerateVO->getClass()
            ));
            $hostelFeeGenerateVO->setHostelFeeChallanId($id);
        // dd($hostelFeeGenerateVO);

            return $hostelFeeGenerateVO;
        }

    }

    public function loadChallanFormNo()
    {
        $challan = $this->count();
        return $challan = $challan+1;
    }

    public function getfeeAllocation($student)
    {
        $Id = DB::table('fin_hostel_fee_allocation')->select('HOSTEL_FEE_ALLOCATION_ID')->where('STUDENT_ID',$student)->get();
        return $Id;
    }

    public function getHostelFeeChallanDetail(HostelFeeGenerateVO $feeGenerateVO)
    {
        $detail = DB::select("call fin_hostel_fee_voucher_proc(?)", [$feeGenerateVO->getYear()]);
        if(count($detail)>0) {
            return $detail;
        }
        else{
            $feeGenerateVO->setErrorResponse(true, '0000047');
        }

    }

}