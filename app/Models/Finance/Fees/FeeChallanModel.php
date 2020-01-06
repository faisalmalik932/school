<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 10/24/2017
 * Time: 10:58 AM
 */

namespace App\Models\Finance\Fees;


use App\Models\BaseModel;
use App\Vos\FinanceVOS\FeeVOS\FeeChallanVOS\FeeChallanVO;
use DB;
use Illuminate\Http\Request;

class FeeChallanModel extends BaseModel
{
    protected $primaryKey = 'CHALLAN_ID';
    protected $table = 'fin_fee_challans';
    protected $fillable = ['BRANCH_ID', 'CLASS', 'CHALLAN_NO', 'STUDENT_ID', 'MONTH', 'YEAR', 'FEE_STATUS'];

    public function generateFeeChallan(FeeChallanVO $feeDetailVO)
    {
        $details = DB::table('fin_fee_challan_structure')->where([['BRANCH_ID', '=', $feeDetailVO->getBranchId()],
                ['CLASS', '=', $feeDetailVO->getClass()]])->get();

        // dd($details);
        $result = $this->where([['BRANCH_ID', '=', $feeDetailVO->getBranchId()],
            ['CLASS', $feeDetailVO->getClass()],
            ['STUDENT_ID', $feeDetailVO->getStudentId()],
            ['YEAR', $feeDetailVO->getYear()],
            ['MONTH', $feeDetailVO->getMonth()]])
            ->get();
            // dd($result);
        if(count($details) <= 0) {
            $feeDetailVO->setErrorResponse(true, '0000040');
        }
        elseif (count($result) > 0)
        {
            $feeDetailVO->setErrorResponse(true, '0000040');
        }
        else {
            $id = $this->insertGetId(array(
                'ORG_ID'=> $feeDetailVO->getOrgId(),
                'BRANCH_ID'=>$feeDetailVO->getBranchId(),
                'CLASS'=>$feeDetailVO->getClass(),
                'CHALLAN_NO'=>$feeDetailVO->getChallanNo(),
                'STUDENT_ID'=> $feeDetailVO->getStudentId(),
                'MONTH'=> $feeDetailVO->getMonth(),
                'YEAR'=>$feeDetailVO->getYear(),
                'CREATED_BY'=>$feeDetailVO->getCreatedBy(),
                'CONCESSION'=>$feeDetailVO->getConcession()
            ));
            $feeDetailVO->setFeeChallanId($id);
            return $feeDetailVO;
        }
    }

    public function loadChallanNo()
    {
        $challan = $this->max('CHALLAN_NO');
        return $challan + 1;
    }

    // public function loadFeeChallanNo()
    // {
    //     $challan = $this->max('CHALLAN_NO');
    //     return $challan;
    // }

    public function studentDetail(FeeChallanVO $feeChallanVO)
    {
        $students = DB::table('adc_students')->where('BRANCH_ID',$feeChallanVO->getBranchId())->get();
        if(count($students)>0) {
            $detail = DB::select("call fin_get_fee_report_yearly(?,?,?)", [$feeChallanVO->getClass(),$feeChallanVO->getBranchId(), $feeChallanVO->getYear()]);
            if(count($detail)>0) {
                return $detail;
            }
            else{
                $feeChallanVO->setErrorResponse(true, '0000050');
            }
        }
        else{
            $feeChallanVO->setErrorResponse(true, '0000043');
        }
    }

    public function getAdmissionFee(FeeChallanVO $feechallanVO)
    {
        $admissionFee = array();
        $month = DB::table('fin_fee_Challan_vw')->where('BRANCH_ID',$feechallanVO->getBranchId())->where('CLASS',$feechallanVO->getClass())
            ->select('MONTH')->groupBy('MONTH')->get();
       foreach ($month as $months) {
            $admissionFee[] = DB::table('fin_fee_Challan_vw')
                ->where('BRANCH_ID', $feechallanVO->getBranchId())
                ->where('PARTICULAR_NAME', 'ADMISSION FEE')
                ->where('CLASS', $feechallanVO->getClass())
                ->where('FEE_CATEGORY_TYPE', 'FEE')
                ->where('MONTH',$months->MONTH)
                ->groupBY('CHALLAN_NO')
                ->sum('AMOUNT');
        }
        return $admissionFee;
    }

    public function getTutionFee(FeeChallanVO $feechallanVO)
    {
        $tuitionFee = DB::table('fin_fee_Challan_vw')
            ->where('BRANCH_ID', $feechallanVO->getBranchId())
            ->where('PARTICULAR_NAME', 'TUITION FEE')
            ->where('CLASS', $feechallanVO->getClass())
            ->where('YEAR', '=', $feechallanVO->getYear())
            ->where('FEE_PERIOD', 'MONTHLY')
            ->where('FEE_CATEGORY_TYPE', 'FEE')
            ->groupBY('CHALLAN_NO')
            ->sum('AMOUNT');
        if(count($tuitionFee)>0) {
            return $tuitionFee;
        }
        else{
            $feechallanVO->setErrorResponse(true, '0000050');
        }
    }

    public function getComputerFee(FeeChallanVO $feechallanVO)
    {
        $computerFee = DB::table('fin_fee_Challan_vw')
            ->where('BRANCH_ID', $feechallanVO->getBranchId())
            ->where('CLASS', '=', $feechallanVO->getClass())
            ->where('YEAR', '=', $feechallanVO->getYear())
            ->where('PARTICULAR_NAME', 'COMPUTER FEE')
            ->where('FEE_PERIOD', 'MONTHLY')
            ->where('FEE_CATEGORY_TYPE', 'FEE')
            ->groupBY('CHALLAN_NO')
            ->groupBy('CLASS')
            ->sum('AMOUNT');
        if(count($computerFee)>0) {
            return $computerFee;
        }
        else{
            $feechallanVO->setErrorResponse(true, '0000050');
        }
    }

    public function getStationaryFee(FeeChallanVO $feechallanVO)
    {
        $computerFee = DB::table('fin_fee_Challan_vw')
            ->where('BRANCH_ID', $feechallanVO->getBranchId())
            ->where('CLASS', '=', $feechallanVO->getClass())
            ->where('YEAR', '=', $feechallanVO->getYear())
            ->where('PARTICULAR_NAME', 'STATIONARY FEE')
            ->where('FEE_PERIOD', 'MONTHLY')
            ->where('FEE_CATEGORY_TYPE', 'FEE')
            ->groupBY('CHALLAN_NO')
            ->groupBy('CLASS')
            ->sum('AMOUNT');
        if(count($computerFee)>0) {
            return $computerFee;
        }
        else{
            $feechallanVO->setErrorResponse(true, '0000050');
        }
    }

    public function getDevFee(FeeChallanVO $feechallanVO)
    {
        $developmentFee = DB::table('fin_fee_Challan_vw')
            ->where('BRANCH_ID', $feechallanVO->getBranchId())
            ->where('CLASS', '=', $feechallanVO->getClass())
            ->where('YEAR', '=', $feechallanVO->getYear())
            ->where('PARTICULAR_NAME', 'DEVELOPMENT FEE')
            ->where('FEE_PERIOD', 'MONTHLY')
            ->where('FEE_CATEGORY_TYPE', 'FEE')
            ->groupBY('CHALLAN_NO')
            ->groupBy('CLASS')
            ->sum('AMOUNT');
        if(count($developmentFee)>0) {
            return $developmentFee;
        }
        else{
            $feechallanVO->setErrorResponse(true, '0000050');
        }
    }

    public function getUtilityFee(FeeChallanVO $feechallanVO)
    {
        $utilityFee = DB::table('fin_fee_Challan_vw')
            ->where('BRANCH_ID', $feechallanVO->getBranchId())
            ->where('CLASS', '=', $feechallanVO->getClass())
            ->where('YEAR', '=', $feechallanVO->getYear())
            ->where('PARTICULAR_NAME', 'Utility Fee')
            ->where('FEE_PERIOD', 'MONTHLY')
            ->where('FEE_CATEGORY_TYPE', 'FEE')
            ->groupBY('CHALLAN_NO')
            ->groupBy('CLASS')
            ->sum('AMOUNT');
        if(count($utilityFee)>0) {
            return $utilityFee;
        }
        else{
            $feechallanVO->setErrorResponse(true, '0000050');
        }
    }

    public function getExamFee(FeeChallanVO $feechallanVO)
    {
        $utilityFee = DB::table('fin_fee_Challan_vw')
            ->where('BRANCH_ID', $feechallanVO->getBranchId())
            ->where('CLASS', '=', $feechallanVO->getClass())
            ->where('YEAR', '=', $feechallanVO->getYear())
            ->where('PARTICULAR_NAME', 'EXAM FEE')
            ->where('FEE_PERIOD', 'MONTHLY')
            ->where('FEE_CATEGORY_TYPE', 'FEE')
            ->groupBY('CHALLAN_NO')
            ->groupBy('CLASS')
            ->sum('AMOUNT');
        if(count($utilityFee)>0) {
            return $utilityFee;
        }
        else{
            $feechallanVO->setErrorResponse(true, '0000050');
        }

    }

    public function getScienceFee(FeeChallanVO $feechallanVO)
    {
        $utilityFee = DB::table('fin_fee_Challan_vw')
            ->where('BRANCH_ID', $feechallanVO->getBranchId())
            ->where('CLASS', '=', $feechallanVO->getClass())
            ->where('YEAR', '=', $feechallanVO->getYear())
            ->where('PARTICULAR_NAME', 'SCIENCE FEE')
            ->where('FEE_PERIOD', 'MONTHLY')
            ->where('FEE_CATEGORY_TYPE', 'FEE')
            ->groupBY('CHALLAN_NO')
            ->groupBy('CLASS')
            ->sum('AMOUNT');
        if(count($utilityFee)>0) {
            return $utilityFee;
        }
        else{
            $feechallanVO->setErrorResponse(true, '0000050');
        }

    }

    public function feeAmount(FeeChallanVO $feeGenerateVO)
    {
        $actualfee =DB::table('fin_fee_challan_vw')
            ->where('BRANCH_ID','=',$feeGenerateVO->getBranchId())
            ->where('CLASS','=',$feeGenerateVO->getClass())
            ->where('YEAR', '=', $feeGenerateVO->getYear())
            ->where('FEE_CATEGORY_TYPE','=','FEE')
            ->groupBy('STUDENT_ID')
            ->groupBy('MONTH')
            ->sum('AMOUNT');
        return $actualfee;
    }

    public function DefaultersfeeAmount(FeeChallanVO $feeGenerateVO)
    {
        $actualfee = DB::table('fin_fee_challan_vw')
            ->where('BRANCH_ID', '=', $feeGenerateVO->getBranchId())
            ->where('MONTH', '=', $feeGenerateVO->getMonth())
            ->where('FEE_CATEGORY_TYPE', '=', 'FEE')
            ->groupBy('STUDENT_ID')
            ->sum('AMOUNT');
        return $actualfee;
    }

    public function defaultertotalFee(FeeChallanVO $feeGenerateVO)
    {
        $net = array();
        $actualfee = DB::table('fin_fee_challan_vw')
            ->where('BRANCH_ID', '=', $feeGenerateVO->getBranchId())
            ->where('MONTH', '=', $feeGenerateVO->getMonth())
            ->where('FEE_CATEGORY_TYPE', '=', 'FEE')
            ->groupBy('STUDENT_ID')
            ->sum('AMOUNT');
        $concession = DB::table('adc_students_vw')->select('FEE_DISCOUNT')
            ->where('BRANCH_ID', '=', $feeGenerateVO->getBranchId())
            ->get();
        foreach ($concession as $con)
        {
            $net[] = $actualfee - $con->FEE_DISCOUNT;
        }

        return $net;

    }

    public function getdefaultersfeeAmount(FeeChallanVO $feeGenerateVO)
    {
        $challanNo = DB::table('fin_fee_challan_vw')
            ->select('STUDENT_ID')
            ->where('BRANCH_ID', '=', $feeGenerateVO->getBranchId())
            ->get();
        for ($i = 0; $i < count($challanNo); $i++) {

            $student = DB::select("call fin_student_detail_fee_proc(?,?,?,?)", [$feeGenerateVO->getBranchId(), $challanNo[$i]->STUDENT_ID, '2017', $feeGenerateVO->getMonth()]);
        }
        return $student;
    }

    public function monthlyFeeDetail(FeeChallanVO $feeChallanVO)
    {
        $month = new \Carbon\Carbon($feeChallanVO->getYear().'-'.$feeChallanVO->getMonth());
        $monthDiff = \Carbon\Carbon::now()->diffInMonths($month);
        if($monthDiff >= 2){
        $detail = DB::select("call fin_fee_defaulters_monthly_proc(?,?,?)", [$feeChallanVO->getBranchId(),$feeChallanVO->getYear() ,$feeChallanVO->getMonth()]);   
            if(count($detail)>0) {
            return $detail;
             }
            else{
            $feeChallanVO->setErrorResponse(true, '0000050');
            }

        }
        else{
            $feeChallanVO->setErrorResponse(true, '0000050');
        }
        
    }

    public function feechallandetails()
    {
        $result = DB::table('fin_fee_bills_vw')->select('CHALLAN_ID','CHALLAN_NO', 'CLASS', 'YEAR', 'MONTH','STUDENT_NAME')
            ->groupBy('CHALLAN_ID','CHALLAN_NO', 'CLASS', 'YEAR', 'MONTH','STUDENT_NAME')->get();
        return $result;
    }

    public function getfeeChallanCompleteDetail()
    {
        $result = DB::table('fin_fee_challan_vw')->select('PARTICULAR_NAME', 'AMOUNT')
            ->where('FEE_CATEGORY_TYPE','=','FEE')
            ->take(4)
            ->get();
        return $result;
    }

    public function getTotalFeePaidByPeb()
    {
        $branch = request()->session()->get('BRANCH_ID');
        //echo $branch;
        $branchid = trim($branch, "school-");
        $result = DB::table('fin_fee_challan_vw')
//            ->where('BRANCH_ID','=',$branchid)
            ->where('MONTH','=', strtoupper(date('M')))
            ->where('YEAR','=', strtoupper(date('Y')))
            ->where('PAYMENT_METHOD','=', 'PEB')
            ->where('FEE_STATUS', '=', 'PAID')
            ->sum('AMOUNT');
//        dd($result);
        return number_format($result, 0);
    }

    public function getTotalFeePaidByBank()
    {
        $branch = request()->session()->get('BRANCH_ID');
        //echo $branch;
        $branchid = trim($branch,"school-");
        $result = DB::table('fin_fee_challan_vw')
//            ->where('BRANCH_ID','=',$branchid)
            ->where('MONTH','=', strtoupper(date('M')))
            ->where('YEAR','=', strtoupper(date('Y')))
            ->where('PAYMENT_METHOD','=', 'BANK')
            ->where('FEE_STATUS', '=', 'PAID')
            ->sum('AMOUNT');
        return number_format($result, 0);
    }

    public function getTotalFeeUnpaid()
    {
        $branch = request()->session()->get('BRANCH_ID');
        //echo $branch;
        $branchid = trim($branch,"school-");
        $result = DB::table('fin_fee_challan_vw')
            ->where('MONTH','=', strtoupper(date('M')))
            ->where('YEAR','=', strtoupper(date('Y')))
            ->where('FEE_STATUS', '=', 'UNPAID')
            ->sum('AMOUNT');
        return number_format($result, 0);
    }

    public function getFeeVoucherAnalysis(FeeChallanVO $feeChallanVO)
    {
        $detail = DB::select("call fin_fee_vouchers_analysis_proc(?)", [$feeChallanVO->getYear()]);
        return $detail;
    }


}