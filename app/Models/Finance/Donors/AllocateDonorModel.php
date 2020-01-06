<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/18/2017
 * Time: 5:32 PM
 */

namespace App\Models\Finance\Donors;


use App\Models\BaseModel;
use App\Vos\FinanceVOS\DonorsVOS\AllocateDonorVO;
use DB;

class AllocateDonorModel extends BaseModel
{
    protected $primaryKey = 'DONOR_ALLOCATION_ID';
    protected $table = 'adc_donor_allocation';
    protected $fillable = ['ORG_ID','DONOR_ID','CLASS','BRANCH_ID','STUDENT_ID'];

    public function add(AllocateDonorVO $allocateDonorVO)
    {
        $result = $this->select()->where([['DONOR_ID', '=', $allocateDonorVO->getDonorId()],
            ['CLASS','=',$allocateDonorVO->getClassId()],['STUDENT_ID','=',$allocateDonorVO->getStudentId()]])->get();
        if (count($result) > 0) {
            $allocateDonorVO->setErrorResponse(true, '0000013');
        } else {
            $this->insert(array(
                'ORG_ID' => $allocateDonorVO->getOrgId(),
                'DONOR_ID' => $allocateDonorVO->getDonorId(),
                'CLASS' => $allocateDonorVO->getClassId(),
                'BRANCH_ID' => $allocateDonorVO->getBranchId(),
                'STUDENT_ID' => $allocateDonorVO->getStudentId(),
                'CREATED_BY' => $allocateDonorVO->getCreatedBy()));
        }
    }

    public function BranchWiseDonors(AllocateDonorVO $allocateDonorVO)
    {


    }

    public function branches()
    {
        $branches = DB::table('adc_donor_allocation_vw')->groupBy('BRANCH_NAME')->select('BRANCH_NAME')->get();
        return $branches;
    }
    public function DonorWise()
    {
        $donors = DB::table('adc_donor_allocation_vw')->distinct()->get(['DONOR_NAME','BRANCH_NAME','STUDENT_NAME','CLASS','FUND_CATEGORY','AMOUNT']);
        return $donors;
    }
    public function totalAdopted(AllocateDonorVO $allocateDonorVO)
    {
        $students = DB::table('adc_donor_allocation_vw')->where('BRANCH_ID',$allocateDonorVO->getBranchId())->count('STUDENT_NAME');
        return $students;
    }
    public function BranchWise(AllocateDonorVO $allocateDonorVO)
    {
        $donors = DB::table('adc_donor_allocation_vw')->where('BRANCH_ID',$allocateDonorVO->getBranchId())->get();
        if(count($donors)>0){
        return $donors;}
        else{
            $allocateDonorVO->setErrorResponse(true, '0000050');
        }
    }

    public function donorAmount(AllocateDonorVO $allocateDonorVO)
    {
        $amount = DB::table('adc_donor_allocation_vw')->where('BRANCH_ID',$allocateDonorVO->getBranchId())->groupBy('STUDENT_NAME')->sum('AMOUNT');
        $students = DB::table('adc_donor_allocation_vw')->where('BRANCH_ID',$allocateDonorVO->getBranchId())->count();
        return $amount;
       /* $totalamount = $amount/$students;
        return $totalamount;*/
    }
}