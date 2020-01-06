<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/26/2017
 * Time: 4:03 PM
 */

namespace App\Models\Finance\Fees\CreateFee;


use App\Models\BaseModel;
use App\Vos\FinanceVOS\FeeVOS\CreateFeeVOS\FeeDiscountVO;

class FeeDiscountsModel extends BaseModel
{
    protected $primaryKey = 'DISCOUNT_ID';
    protected $table = 'fin_fee_discounts';
    protected $fillable = ['ORG_ID','BRANCH_ID','DISCOUNT_NAME','AMOUNT'];

    public function saveDiscountInfo(FeeDiscountVO $feeDiscountVO)
    {
        $result = $this->select()->where('DISCOUNT_NAME', '=', $feeDiscountVO->getDiscountName())->get();
        if (count($result) > 0) {
            $feeDiscountVO->setErrorResponse(true, '0000018');
        } else {
            $this->ORG_ID = $feeDiscountVO->getOrgId();
            $this->BRANCH_ID = $feeDiscountVO->getBranchId();
            $this->DISCOUNT_NAME = $feeDiscountVO->getDiscountName();
            $this->AMOUNT = $feeDiscountVO->getAmount();
            $this->CREATED_BY = $feeDiscountVO->getCreatedBy();
            $this->save();
        }
    }

    public function updateDiscountInfo(FeeDiscountVO $feeDiscountVO)
    {
        $this->where('DISCOUNT_ID',$feeDiscountVO->getDiscountId())
            ->update(['ORG_ID'=>$feeDiscountVO->getOrgId(),'BRANCH_ID'=>$feeDiscountVO->getBranchId(),
                'DISCOUNT_NAME'=>$feeDiscountVO->getDiscountName(),
                'AMOUNT'=>$feeDiscountVO->getAmount(),
                'UPDATED_BY' => $feeDiscountVO->getModifiedBy(),
                'UPDATED_AT' => $feeDiscountVO->getModifiedAt()]);
    }
}