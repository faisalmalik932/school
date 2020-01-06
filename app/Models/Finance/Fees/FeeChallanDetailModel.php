<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 10/20/2017
 * Time: 12:32 PM
 */

namespace App\Models\Finance\Fees;


use App\Models\BaseModel;
use App\Vos\FinanceVOS\FeeVOS\FeeChallanVOS\FeeChallanVO;
use App\Vos\FinanceVOS\FeeVOS\FeeChallanVOS\FeeChallanDetailVO;
use App\Vos\FinanceVOS\FeeVOS\FeeStructureVOS\FeeStructureVO;
use DB;
use PDO;
use Illuminate\Http\Response;


class FeeChallanDetailModel extends BaseModel
{
    protected $primaryKey = 'CHALLAN_DETAIL_ID';
    protected $table = 'fin_fee_challans_details';
    protected $fillable = ['CHALLAN_ID','FEE_CATEGORY_TYPE','FEE_CATEGORY_ID','FEE_PARTICULAR_ID','AMOUNT','FEE_PERIOD'];

    public function generateFeeChallanDetail(FeeChallanDetailVO $feeGenerateVO)
    {
//         dd($feeGenerateVO);

        if ($feeGenerateVO->getFeeParticularId() == 32 && $feeGenerateVO->getConsssion() > 0) {
            if ($feeGenerateVO->getConsssion() < 100) {
                $discountAmt = $feeGenerateVO->getAmount() -($feeGenerateVO->getAmount() * $feeGenerateVO->getConsssion() / 100);
            } else {
                $discountAmt = 0;
            }
            $feeGenerateVO->setAmount($discountAmt);
        }

        $this->insert(array(
            'CHALLAN_ID'=>$feeGenerateVO->getChallanId(),
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
        $result = DB::table('fin_fee_bills_detail_vw')
            ->where('BRANCH_ID',$feeGenerateVO->getBranchId())
            ->where('FEE_STATUS','=','UNPAID')
            ->where('FEE_CATEGORY_TYPE','=','FEE')
             ->where('MONTH','=',$feeGenerateVO->getMonth())
            ->where('CLASS','=',$feeGenerateVO->getClass())
            ->where('STUDENT_ID','=',$feeGenerateVO->getStudentId())
            ->get();
            return $result;
    }

    public function editChallan(FeeChallanDetailVO $challanDetailVO)
    {
        $this->where('CHALLAN_ID', $challanDetailVO->getChallanId())
            ->where('FEE_PARTICULAR_ID', $challanDetailVO->getFeeParticularId())
            ->where('FEE_CATEGORY_TYPE', $challanDetailVO->getFeecategorytype())
            ->update(
                array(
                    'AMOUNT' => $challanDetailVO->getAmount()
                )
            );
    }

    public function loadChallanCategories()
    {
        $categories = DB::table('fin_fee_challan_vw')->select('CLASS','PARTICULAR_NAME','FEE_PARTICULAR_ID')->orderBy('CHALLAN_ID', 'asc')->take(6)->get();
        return $categories;
    }

    public function feeDefaulters(FeeChallanVO $feeGenerateVO)
    {
        $defaulters = DB::table('fin_fee_bills_vw')->distinct()
            ->where('BRANCH_ID',$feeGenerateVO->getBranchId())->where('FEE_STATUS','=','UNPAID')->where('MONTH','=',$feeGenerateVO->getMonth())
            ->get(['BRANCH_NAME','STUDENT_NAME','MONTH','CLASS','YEAR']);
        return $defaulters;
    }

    public function feeSum(FeeChallanVO $feeGenerateVO)
    {
        $sum = DB::table('fin_fee_bills_vw')
            ->where('BRANCH_ID',$feeGenerateVO->getBranchId())->where('FEE_STATUS','=','UNPAID')
            ->where('MONTH','=',$feeGenerateVO->getMonth())
            ->where('FEE_CATEGORY_TYPE','FEE')
            ->where('FEE_PERIOD','MONTHLY')
            ->groupBy('STUDENT_NAME')
           ->sum('AMOUNT');
        return $sum;
    }

    public function studentDetail(FeeChallanVO $feeChallanVO)
    {
            $studentDetail = DB::table('adc_students_vw')
                ->where('BRANCH_ID', '=', $feeChallanVO->getBranchId())
                ->where('CONCESSION_TYPE', '!=', '')
                ->get();
            if (count($studentDetail) == 0) {
                $feeChallanVO->setErrorResponse(true, '0000041');
            } else {
                return $studentDetail;
            }
    }

    public function MonthName(FeeChallanVO $feeChallanVO)
    {
            $month = DB::table('fin_fee_challans')->select('MONTH', 'YEAR')
                ->where('MONTH', '=', $feeChallanVO->getMonth())
                ->where('YEAR', '=', $feeChallanVO->getYear())
                ->get();
            if(count($month)>0)
            {
            return $month;
        }
        else{
            $feeChallanVO->setErrorResponse(true, '0000041');
        }

    }

    public function feeAmount(FeeChallanVO $feeGenerateVO)
    {
        $month = DB::table('fin_fee_challans')->select('MONTH', 'YEAR')
            ->where('MONTH', '=', $feeGenerateVO->getMonth())
            ->get();
        if(count($month)>0) {
            $students = DB::table('adc_students')->where('BRANCH_ID', $feeGenerateVO->getBranchId())->get();
            if (count($students) > 0) {
                $challanNo = DB::table('fin_fee_challan_vw')
                    ->select('STUDENT_ID')
                    ->where('BRANCH_ID', '=', $feeGenerateVO->getBranchId())
                    ->where('MONTH', '=', $feeGenerateVO->getMonth())
                    ->where('YEAR', '=', $feeGenerateVO->getYear())
                    ->get();
                for ($i = 0; $i < count($challanNo); $i++) {

                    $student = DB::select("call fin_student_detail_fee_proc(?,?,?,?,?)", [$feeGenerateVO->getBranchId(), $challanNo[$i]->STUDENT_ID, $feeGenerateVO->getYear(), $feeGenerateVO->getMonth(), 1]);
                }
                return $students;
            }
        }
        else{
            $feeGenerateVO->setErrorResponse(true, '0000041');
        }
    }

    public function ConcessionGranted(FeeChallanVO $feeChallanVO)
    {
        $students = DB::table('adc_students')->where('BRANCH_ID',$feeChallanVO->getBranchId())->get();
        if(count($students)>0) {
            $studentDetail = DB::table('adc_students')->select('CONCESSION_TYPE')
                ->where('BRANCH_ID', '=', $feeChallanVO->getBranchId())->get();
               $te =  DB::table('fin_fee_challan_vw')
                    ->where('PARTICULAR_NAME', '!=', 'NO')
                    ->where('FEE_CATEGORY_TYPE', '=', 'DISCOUNTS')
                    ->sum('AMOUNT');
            for ($i = 0; $i < count($studentDetail); $i++) {
                $concession = DB::table('fin_fee_challan_vw')
                    ->where('PARTICULAR_NAME', '=', $studentDetail[$i]->CONCESSION_TYPE)
                    ->where('FEE_CATEGORY_TYPE', '=', 'DISCOUNTS')
                    ->sum('AMOUNT');
            }
            return $concession;
        }
        else{
            $feeChallanVO->setErrorResponse(true, '0000041');
        }

    }

    public function NetFee(FeeChallanVO $feeChallanVO)
    {
        $actualFee =DB::table('fin_student_total_fee_vw')
            ->where('BRANCH_ID','=',$feeChallanVO->getBranchId())
            ->where('FEE_DISCOUNT','=',0)
            ->groupBy('CLASS')
            ->sum('TOTAL_FEE');
        $concessionFee =DB::table('fin_student_total_fee_vw')
            ->where('BRANCH_ID','=',$feeChallanVO->getBranchId())
            ->where('FEE_DISCOUNT','>',0)
            ->groupBy('CLASS')
            ->sum('FEE_DISCOUNT');
        return $actualFee-$concessionFee;
    }

    public function FeeDetailClassWise(FeeChallanVO $feeChallanVO)
    {
        $detail = DB::select("call fin_get_bill_detail_summary_proc(?,?,?)", [$feeChallanVO->getBranchId(),$feeChallanVO->getYear(),$feeChallanVO->getMonth()]);
       return $detail;
    }

    public function BranchName(FeeChallanVO $feeChallanVO)
    {
        $students = DB::table('adc_students_vw')->where('BRANCH_ID',$feeChallanVO->getBranchId())->get();
        if(count($students)>0) {
            $branch = DB::table('ptf_branches_vw')->select('BRANCH_NAME')
                ->where('BRANCH_ID', '=', $feeChallanVO->getBranchId())
                ->get();
            return $branch;
        }
        else{
            $feeChallanVO->setErrorResponse(true, '0000043');
        }
    }

    public function countOnConcession(FeeChallanVO $feeChallanVO)
    {
        $students = DB::table('adc_students_vw')->where('BRANCH_ID',$feeChallanVO->getBranchId())->get();
        if(count($students)>0) {
            $countStudent = DB::table('adc_students_vw')
                ->where('BRANCH_ID', '=', $feeChallanVO->getBranchId())
                ->where('FEE_DISCOUNT', '>', 0)
                ->groupBy('CLASS')
                ->select(DB::raw('count(STUDENT_NAME) as PAYING_FULL'))
                ->count('*');
            return $countStudent;
        }
        else{
            $feeChallanVO->setErrorResponse(true, '0000043');
        }
    }

    public function countStudents(FeeChallanVO $feeChallanVO)
    {
        $data = DB::table('adc_students_vw')
            ->select('CLASS')
            ->where('BRANCH_ID', '=', $feeChallanVO->getBranchId())
            ->select(DB::raw('count(STUDENT_NAME) as TOTAL_STUDENTS,CLASS,sum(PAYING_FULL) as PAYING_FULL,sum(ON_CONCESSION) as ON_CONCESSION,sum(FEE_DISCOUNT) as FEE_DISCOUNT'))
            ->groupBy('CLASS')
            ->get();
        return $data;
    }

    public function ActualFee(FeeChallanVO $feeChallanVO)
    {
        $student = DB::select("call fin_get_bill_detail_summary_proc(?,?)", [$feeChallanVO->getBranchId(),$feeChallanVO->getMonth()]);
        /*$actualfee =DB::table('fin_fee_challan_vw')
            ->where('BRANCH_ID','=',$feeChallanVO->getBranchId())
            ->where('MONTH','=',$feeChallanVO->getMonth())
            ->where('FEE_CATEGORY_TYPE','=','FEE')
            ->groupBy('CLASS')
            ->sum('AMOUNT');
        return $actualfee;*/
        return $student;
    }

    public function ConcessionAmount(FeeChallanVO $feeChallanVO)
    {
        $countStudent =DB::table('adc_students_vw')
            ->where('BRANCH_ID','=',$feeChallanVO->getBranchId())
            ->where('FEE_DISCOUNT','>',0)
            ->groupBy('CLASS')
            ->sum('FEE_DISCOUNT');
        return $countStudent;
    }

    public function totalFee(FeeChallanVO $feeChallanVO)
    {
        $actualfee =DB::table('fin_fee_challan_vw')
            ->where('BRANCH_ID','=',$feeChallanVO->getBranchId())
            ->where('MONTH','=',$feeChallanVO->getMonth())
            ->where('FEE_CATEGORY_TYPE','=','FEE')
            ->groupBy('CLASS')
            ->sum('AMOUNT');
        $concessionFee =DB::table('adc_students_vw')
            ->where('BRANCH_ID','=',$feeChallanVO->getBranchId())
            ->where('FEE_DISCOUNT','>',0)
            ->groupBy('CLASS')
            ->sum('FEE_DISCOUNT');
        return $actualfee-$concessionFee;
    }


}