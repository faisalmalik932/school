<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 10/19/2017
 * Time: 5:21 PM
 */

namespace App\Models\Finance\Fees;


use App\Models\BaseModel;
use App\Vos\FinanceVOS\FeeVOS\FeeStructureVOS\FeeStructureVO;
use Illuminate\Database\Eloquent\Collection;

class HostelFeeStructureModel extends BaseModel
{
    protected $primaryKey = 'HOSTEL_FEE_STRUCTURE_ID';
    protected $table = 'fin_hostel_fee_structure';
    protected $fillable = ['ORG_ID','HOSTEL_ID','FEE_PARTICULAR_ID','FEE_CATEGORY_ID','AMOUNT','CLASS','FEE_TYPE','STUDENT_ID'];

    public function saveFeeStructure(Collection $collection)
    {
        $collection->each(function($vo) {
            $result = $this->select()->where([['HOSTEL_ID','=',$vo->getBranchId()],
                ['STUDENT_ID','=',$vo->getStudentId()],
                ['FEE_CATEGORY_ID', '=', $vo->getFeeCategoryId()],
                ['FEE_PARTICULAR_ID','=',$vo->getFeeSubCategoryId()]])->get();
            if (count($result) > 0) {
                $vo->setErrorResponse(true, '0000023');
            } else {
                $this->insert(array(
                    'ORG_ID' => $vo->getOrgId(),
                    'HOSTEL_ID' => $vo->getBranchId(),
                    'FEE_PARTICULAR_ID' => $vo->getFeeSubCategoryId(),
                    'FEE_CATEGORY_ID' => $vo->getFeeCategoryId(),
                    'AMOUNT' => $vo->getAmount(),
                    'STUDENT_ID' => $vo->getStudentId(),
                    'CREATED_BY' => $vo->getCreatedBy(),
                    'FEE_TYPE'=>$vo->getFeeType()
                ));
            }
        });
    }
    public function updateFeeStructure(FeeStructureVO $feeStructureVO)
    {
        $this->where('FEE_STRUCTURE_ID',$feeStructureVO->getFeeStructureId())
            ->update(['ORG_ID'=>$feeStructureVO->getOrgId(),
                'BRANCH_ID'=>$feeStructureVO->getBranchId(),
                'FEE_PARTICULAR_ID'=>$feeStructureVO->getFeeCategoryId(),
                'AMOUNT'=>$feeStructureVO->getAmount(),
                'UPDATED_BY' => $feeStructureVO->getModifiedBy(),
                'UPDATED_AT' => $feeStructureVO->getModifiedAt()]);
    }



}