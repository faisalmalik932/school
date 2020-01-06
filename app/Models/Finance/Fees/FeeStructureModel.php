<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/29/2017
 * Time: 12:37 PM
 */

namespace App\Models\Finance\Fees;


use App\Models\BaseModel;
use App\Vos\FinanceVOS\FeeVOS\FeeChallanVOS\FeeChallanVO;
use App\Vos\FinanceVOS\FeeVOS\FeeChallanVOS\HostelFeeGenerateVO;
use App\Vos\FinanceVOS\FeeVOS\FeeStructureVOS\FeeStructureVO;
use Illuminate\Database\Eloquent\Collection;
use DB;

class FeeStructureModel extends BaseModel
{
    protected $primaryKey = 'FEE_STRUCTURE_ID';
    protected $table = 'fin_fee_challan_structure';
    protected $fillable = ['ORG_ID','BRANCH_ID','FEE_PARTICULAR_ID','FEE_CATEGORY_ID','AMOUNT','CLASS','FEE_PERIOD','FEE_CATEGORY_TYPE','FISCAL_YEAR'];

    public function saveFeeStructure(Collection $collection)
    {
        $collection->each(function($vo) {
            $class =  DB::table('adc_students')->select('CLASS')
                ->where('BRANCH_ID','=',$vo->getBranchId())
                ->get();
            $result = $this->select()->where([['BRANCH_ID','=',$vo->getBranchId()],
                ['CLASS','=',$vo->getClassId()],
                ['FEE_CATEGORY_ID', '=', $vo->getFeeCategoryId()],
                ['FEE_PARTICULAR_ID','=',$vo->getFeeSubCategoryId()]])->get();
            if (count($result) > 0) {
                $vo->setErrorResponse(true, '0000023');
            }
            elseif (count($class) == 0){
                $vo->setErrorResponse(true, '0000048');
            }
            else {
                $this->insert(array(
                    'ORG_ID' => $vo->getOrgId(),
                    'BRANCH_ID' => $vo->getBranchId(),
                    'FEE_PARTICULAR_ID' => $vo->getFeeSubCategoryId(),
                    'FEE_CATEGORY_ID' => $vo->getFeeCategoryId(),
                    'FISCAL_YEAR' => $vo->getFiscalYear(),
                    'AMOUNT' => $vo->getAmount(),
                    'CLASS' => $vo->getClassId(),
                    'CREATED_BY' => $vo->getCreatedBy(),
                    'FEE_PERIOD'=>$vo->getFeeType(),
                    'FEE_CATEGORY_TYPE'=>$vo->getFeeHeader()
                ));
            }

        });
    }

    public function updateFeeStructure(Collection $collection)
    {
        $collection->each(function($vo) {
            $this->where('FEE_STRUCTURE_ID', $vo->getFeeStructureId())
                ->update([
                    'ORG_ID' => $vo->getOrgId(),
                    'BRANCH_ID' => $vo->getBranchId(),
                    'FEE_PARTICULAR_ID' => $vo->getFeeSubCategoryId(),
                    'FEE_CATEGORY_ID' => $vo->getFeeCategoryId(),
                    'AMOUNT' => $vo->getAmount(),
                    'CLASS' => $vo->getClassId(),
                    'CREATED_BY' => $vo->getCreatedBy(),
                    'FEE_PERIOD'=>$vo->getFeeType(),
                    'FEE_CATEGORY_TYPE'=>$vo->getFeeHeader(),
                    'UPDATED_BY' => $vo->getModifiedBy(),
                    'UPDATED_AT' => $vo->getModifiedAt()]);
        });
    }

    public function getFiscalYear()
    {
        $fiscalYear = DB::table('fin_fiscal_year_current_vw')->select('FISCAL_YEAR' , 'FISCAL_YEAR_ID')->get();
        return $fiscalYear;
    }public function getAllFiscalYear()
    {
        $fiscalYear = DB::table('fin_fiscal_year')->select('START_DATE' , 'END_DATE' , 'FISCAL_YEAR_ID')->get();
        $newFiscalYear = $fiscalYear->map(function($year) {
        return ['START_DATE' => $this->dateFormat($year->START_DATE) , 'END_DATE' => $this->dateFormat($year->END_DATE) , 'FISCAL_YEAR_ID' => $year->FISCAL_YEAR_ID  , 'year' =>$this->getYear($year->START_DATE) ];
        });
        return $newFiscalYear;
    }

    public function getFeeChallanDetails(FeeChallanVO $feeChallanVO, $hostel)
    { 
        if($feeChallanVO->getAdmFeeStatus() == 0) {
            $detailsQuery = $this->select('fin_fee_challan_structure.FEE_CATEGORY_ID', 'fin_fee_challan_particulars.FEE_PARTICULAR_ID','fin_fee_challan_structure.AMOUNT', 'fin_fee_challan_structure.FEE_PERIOD', 'fin_fee_challan_structure.FEE_CATEGORY_TYPE' , 'fin_fee_challan_particulars.PARTICULAR_NAME')
             ->join('fin_fee_challan_particulars', 'fin_fee_challan_structure.FEE_PARTICULAR_ID', '=', 'fin_fee_challan_particulars.FEE_PARTICULAR_ID')
                ->where('BRANCH_ID', '=', $feeChallanVO->getBranchId())
                ->where( 'CLASS', '=', $feeChallanVO->getClass())
                ->where( 'FEE_PERIOD','!=','ONE TIME');
//                ->where('FEE_CATEGORY_TYPE','!=','Hostel')->get();
            if ($hostel == 0) {
                $detailsQuery->where('FEE_CATEGORY_TYPE', '!=', 'Hostel');
            }
        }
        else{
            $detailsQuery = $this->select('FEE_CATEGORY_ID', 'FEE_PARTICULAR_ID', 'AMOUNT', 'FEE_PERIOD', 'FEE_CATEGORY_TYPE')
                ->where([['BRANCH_ID', '=', $feeChallanVO->getBranchId()],
                    ['CLASS', '=', $feeChallanVO->getClass()]]);
            if ($hostel == 0) {
                $detailsQuery->where('FEE_CATEGORY_TYPE', '!=', 'Hostel');
            }

        }
        $details = $detailsQuery->get();
//        dd($detailsQuery);
        if(count($details)>0) {
            return $details;
        }
        else{
            $feeChallanVO->setErrorResponse(true, '0000056');
        }

    }

    public function getHostelFeeChallanDetails(HostelFeeGenerateVO $feeChallanVO)
    {
        // dd($feeChallanVO);
        $branch = DB::table('adc_students_vw')->select('BRANCH_ID')
            ->where('STUDENT_ID',$feeChallanVO->getStudentID())
            ->where('CLASS',$feeChallanVO->getClass())->get();
        // dd($branch);
        foreach ($branch as $branches) {
            $details = DB::table('fin_fee_structure_vw')->select('FEE_CATEGORY_ID', 'FEE_PARTICULAR_ID', 'AMOUNT', 'FEE_PERIOD', 'FEE_CATEGORY_TYPE')
                ->where('BRANCH_ID', '=', $branches->BRANCH_ID)
                ->where('CLASS', '=', $feeChallanVO->getClass())
                ->where('FEE_CATEGORY_TYPE', '=', 'HOSTEL')->get();
                // dd($details);
            return $details;
        }
    }

    public function monthlyFeeDetail(FeeChallanVO $feeChallanVO)
    {
        $students = DB::table('adc_students_vw')->where('BRANCH_ID', $feeChallanVO->getBranchId())->get();
        if (count($students) > 0) {
            $detail = DB::select("call fin_month_received_fee_report_proc(?,?,?)", [$feeChallanVO->getBranchId(),$feeChallanVO->getYear(), $feeChallanVO->getMonth()]);
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

    public function monthandBranch(FeeChallanVO $feeChallanVO)
    {
        $month = DB::table('fin_fee_bills_vw')->select('MONTH','BRANCH_NAME','YEAR')->where('MONTH',$feeChallanVO->getMonth())
            ->where('BRANCH_ID',$feeChallanVO->getBranchId())->where('YEAR',$feeChallanVO->getYear())->groupBy('MONTH','BRANCH_NAME','YEAR')->get();
        if(count($month)>0) {
            return $month;
        }
        else{
            $feeChallanVO->setErrorResponse(true, '0000044');
        }
    }

    public function getTutionFee(FeeChallanVO $feechallanVO)
    {
        $tuitionFee= array();
        $classes = DB::table('fin_fee_Challan_vw')->select('CLASS')->where('BRANCH_ID',$feechallanVO->getBranchId())->groupBy('CLASS')->get();
        foreach ($classes as $class) {
            $tuitionFee[] = DB::table('fin_fee_Challan_vw')
                ->where('BRANCH_ID',$feechallanVO->getBranchId())
                ->where('MONTH','=',$feechallanVO->getMonth())
                ->where('PARTICULAR_NAME','ADMISSION FEE')
                ->where('FEE_PERIOD','ONE TIME')
                ->where('FEE_CATEGORY_TYPE','FEE')
                ->where('CLASS',$class->CLASS)
                ->groupBy('CLASS')
                ->sum('AMOUNT');
            $tuitionFee[] = DB::table('fin_fee_Challan_vw')
                ->where('BRANCH_ID', $feechallanVO->getBranchId())
                ->where('PARTICULAR_NAME', 'TUITION FEE')
                ->where('MONTH', '=', $feechallanVO->getMonth())
                ->where('FEE_PERIOD', 'MONTHLY')
                ->where('FEE_CATEGORY_TYPE', 'FEE')
                ->where('CLASS',$class->CLASS)
                ->groupBy('CLASS')
                ->sum('AMOUNT');
            $tuitionFee[] = DB::table('fin_fee_Challan_vw')
                ->where('BRANCH_ID', $feechallanVO->getBranchId())
                ->where('PARTICULAR_NAME', 'COMPUTER FEE')
                ->where('MONTH', '=', $feechallanVO->getMonth())
                ->where('FEE_PERIOD', 'MONTHLY')
                ->where('FEE_CATEGORY_TYPE', 'FEE')
                ->where('CLASS',$class->CLASS)
                ->groupBy('CLASS')
                ->sum('AMOUNT');
        }
        return $tuitionFee;
    }

    public function getComputerFee(FeeChallanVO $feechallanVO)
    {
        $computerFee= array();
        $classes = DB::table('fin_fee_Challan_vw')->select('CLASS')->where('BRANCH_ID',$feechallanVO->getBranchId())->groupBy('CLASS')->get();
        foreach ($classes as $class) {
            $computerFee[] = DB::table('fin_fee_Challan_vw')
                ->where('BRANCH_ID', $feechallanVO->getBranchId())
                ->where('PARTICULAR_NAME', 'COMPUTER FEE')
                ->where('MONTH', '=', $feechallanVO->getMonth())
                ->where('FEE_PERIOD', 'MONTHLY')
                ->where('FEE_CATEGORY_TYPE', 'FEE')
                ->where('CLASS',$class->CLASS)
                ->groupBy('CLASS')
                ->sum('AMOUNT');
        }
        return $computerFee;
    }

    public function getDevFee(FeeChallanVO $feechallanVO)
    {
        $developmentFee = DB::table('fin_fee_Challan_vw')
            ->where('BRANCH_ID',$feechallanVO->getBranchId())
            ->where('MONTH','=',$feechallanVO->getMonth())
            ->where('PARTICULAR_NAME','DEVELOPMENT FEE')
            ->where('FEE_PERIOD','MONTHLY')
            ->where('FEE_CATEGORY_TYPE','FEE')
            ->groupBy('CLASS')
            ->sum('AMOUNT');
        return $developmentFee;
    }

    public function getUtilityFee(FeeChallanVO $feechallanVO)
    {
        $utilityFee = DB::table('fin_fee_Challan_vw')
            ->where('BRANCH_ID',$feechallanVO->getBranchId())
            ->where('MONTH','=',$feechallanVO->getMonth())
            ->where('PARTICULAR_NAME','UTILITY FEE')
            ->where('FEE_PERIOD','MONTHLY')
            ->where('FEE_CATEGORY_TYPE','FEE')
            ->groupBy('CLASS')
            ->sum('AMOUNT');
        return $utilityFee;
    }

    public function getExamFee(FeeChallanVO $feechallanVO)
    {
        $utilityFee = DB::table('fin_fee_Challan_vw')
            ->where('BRANCH_ID',$feechallanVO->getBranchId())
            ->where('MONTH','=',$feechallanVO->getMonth())
            ->where('PARTICULAR_NAME','EXAM FEE')
            ->where('FEE_PERIOD','MONTHLY')
            ->where('FEE_CATEGORY_TYPE','FEE')
            ->groupBy('CLASS')
            ->sum('AMOUNT');
        return $utilityFee;

    }

    public function getScienceFee(FeeChallanVO $feechallanVO)
    {
        $utilityFee = DB::table('fin_fee_Challan_vw')
            ->where('BRANCH_ID',$feechallanVO->getBranchId())
            ->where('MONTH','=',$feechallanVO->getMonth())
            ->where('PARTICULAR_NAME','SCIENCE FEE')
            ->where('FEE_PERIOD','MONTHLY')
            ->where('FEE_CATEGORY_TYPE','FEE')
            ->groupBy('CLASS')
            ->sum('AMOUNT');
        return $utilityFee;
    }

    public function getBadgeFee(FeeChallanVO $feechallanVO)
    {
        $utilityFee = DB::table('fin_fee_Challan_vw')
            ->where('BRANCH_ID',$feechallanVO->getBranchId())
            ->where('MONTH','=',$feechallanVO->getMonth())
            ->where('PARTICULAR_NAME','BADGE')
            ->where('FEE_PERIOD','MONTHLY')
            ->where('FEE_CATEGORY_TYPE','FEE')
            ->groupBy('CLASS')
            ->sum('AMOUNT');
        return $utilityFee;
    }

    public function getAdmissionFee(FeeChallanVO $feechallanVO)
    {
        $admissionFee = DB::table('fin_fee_Challan_vw')
            ->where('BRANCH_ID',$feechallanVO->getBranchId())
            ->where('MONTH','=',$feechallanVO->getMonth())
            ->where('PARTICULAR_NAME','ADMISSION FEE')
            ->where('FEE_PERIOD','ONE TIME')
            ->where('FEE_CATEGORY_TYPE','FEE')
            ->groupBy('CLASS')
            ->sum('AMOUNT');
        return $admissionFee;
    }

    public function getTotalFee(FeeChallanVO $feeChallanVO)
    {
        $concession = DB::table('adc_students_vw') ->where('BRANCH_ID',$feeChallanVO->getBranchId())->sum('FEE_DISCOUNT');
        $totalFee = DB::table('fin_fee_Challan_vw')
            ->where('BRANCH_ID',$feeChallanVO->getBranchId())
            ->where('MONTH','=',$feeChallanVO->getMonth())
            ->where('FEE_CATEGORY_TYPE','FEE')
            ->groupBy('CLASS')
            ->sum('AMOUNT');
        $total = $totalFee-$concession;
        return $total;
    }

    public function getDiscountFee(FeeChallanVO $feeChallanVO)
    {
        $concession = DB::table('adc_students_vw') ->where('BRANCH_ID',$feeChallanVO->getBranchId())->sum('FEE_DISCOUNT');
        return $concession;
    }

    public function getChallanStrucureForEdit(FeeStructureVO $feeStructureVO)
    {
       $fiscalYear =  DB::table('fin_fiscal_year')->where('FISCAL_YEAR_ID' , $feeStructureVO->getFiscalYear())->first();
       
        $year = $this->getYear($fiscalYear->START_DATE);
        $structure =DB::table('fin_fee_structure_vw')->where([['BRANCH_ID','=',$feeStructureVO->getBranchId()],['CLASS','=',$feeStructureVO->getClassId()],
            ['FISCAL_YEAR','=',$year]])->get();
        if(count($structure)>0) {
            return $structure;
        }
        else{
            $feeStructureVO->setErrorResponse(true, '0000055');
        }
    }

    public function editChallanStructure(FeeStructureVO $feeStructureVO)
    {
        $this->where('FEE_STRUCTURE_ID', $feeStructureVO->getFeeStructureId())
            ->where('FEE_PARTICULAR_ID', $feeStructureVO->getFeeSubCategoryId())
            ->update(
                array(
                    'AMOUNT' => $feeStructureVO->getAmount()
                )
            );

    }


}