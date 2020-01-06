<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/26/2017
 * Time: 4:01 PM
 */

namespace App\Models\Finance\Fees\CreateFee;


use App\Models\BaseModel;
use App\Vos\FinanceVOS\FeeVOS\CreateFeeVOS\FeeParticularsVO;

class FeeParticularsModel extends BaseModel
{
    protected $primaryKey = 'FEE_PARTICULAR_ID';
    protected $table = 'fin_fee_challan_particulars';
    protected $fillable = ['ORG_ID','FEE_CATEGORY_ID','PARTICULAR_NAME','DESCRIPTION'];

    public function saveFeeParticular(FeeParticularsVO $feeParticularsVO)
    {
        $result = $this->select()->where([['PARTICULAR_NAME', '=', $feeParticularsVO->getParticularName()],['FEE_CATEGORY_ID', $feeParticularsVO->getCategoryId()]])->get();
        if (count($result) > 0) {
            $feeParticularsVO->setErrorResponse(true, '0000017');
        } else {
            $this->ORG_ID = $feeParticularsVO->getOrgId();
            $this->FEE_CATEGORY_ID = $feeParticularsVO->getCategoryId();
            $this->PARTICULAR_NAME = $feeParticularsVO->getParticularName();
            $this->DESCRIPTION = $feeParticularsVO->getDescription();
            $this->CREATED_BY = $feeParticularsVO->getCreatedBy();
            $this->save();
        }
    }

    public function updateFeeParticular(FeeParticularsVO $feeParticularsVO)
    {
        $this->where('FEE_PARTICULAR_ID',$feeParticularsVO->getParticularId())
            ->update(['ORG_ID'=>$feeParticularsVO->getOrgId(),
                'FEE_CATEGORY_ID'=> $feeParticularsVO->getCategoryId(),
                'PARTICULAR_NAME'=> $feeParticularsVO->getParticularName(),
                'DESCRIPTION'=>$feeParticularsVO->getDescription(),
                'UPDATED_BY' => $feeParticularsVO->getModifiedBy(),
                'UPDATED_AT' => $feeParticularsVO->getModifiedAt()]);
    }

    public function loadCategories()
    {
        $category = $this->select('FEE_PARTICULAR_ID','PARTICULAR_NAME')->get();
        return $category;
    }
}