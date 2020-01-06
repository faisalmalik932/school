<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/26/2017
 * Time: 4:00 PM
 */

namespace App\Models\Finance\Fees\CreateFee;


use App\Models\BaseModel;
use App\Vos\FinanceVOS\FeeVOS\CreateFeeVOS\FeeCategoryVO;

class FeeCategoriesModel extends BaseModel
{
    protected $primaryKey = 'FEE_CATEGORY_ID';
    protected $table = 'fin_fee_challan_categories';
    protected $fillable = ['ORG_ID','CATEGORY_NAME','DESCRIPTION','FEE_CATEGORY_TYPE'];

    public function saveFeeCategory(FeeCategoryVO $feeCategoryVO)
    {
        $result = $this->select()->where('CATEGORY_NAME', '=', $feeCategoryVO->getCategoryName() )->where( 'FEE_CATEGORY_TYPE' , '=' ,$feeCategoryVO->getFeeHeader() )->get();
        if (count($result) > 0) {
            $feeCategoryVO->setErrorResponse(true, '0000016');
        } else {
            $this->ORG_ID = $feeCategoryVO->getOrgId();
            $this->CATEGORY_NAME = $feeCategoryVO->getCategoryName();
            $this->DESCRIPTION = $feeCategoryVO->getDescription();
            $this->FEE_CATEGORY_TYPE = $feeCategoryVO->getFeeHeader();
            $this->CREATED_BY = $feeCategoryVO->getCreatedBy();
            $this->save();
            $feeCategoryVO->setCategoryId($this->FEE_CATEGORY_ID);
            return $feeCategoryVO;
        }
    }

    public function loadCategories()
    {
       $category = $this->select('FEE_CATEGORY_ID','CATEGORY_NAME')->get();
       return $category;
    }

    public function updateFeeCategory(FeeCategoryVO $feeCategoryVO)
    {
        $this->where('FEE_CATEGORY_ID',$feeCategoryVO->getCategoryId())
            ->update(['ORG_ID'=>$feeCategoryVO->getOrgId(),
                'CATEGORY_NAME'=>$feeCategoryVO->getCategoryName(),
                'DESCRIPTION'=>$feeCategoryVO->getDescription(),
                'FEE_CATEGORY_TYPE'=>$feeCategoryVO->getFeeHeader(),
                'UPDATED_BY' => $feeCategoryVO->getModifiedBy(),
                'UPDATED_AT' => $feeCategoryVO->getModifiedAt()]);
    }

    public function feeCategories()
    {
        $category = $this->select('FEE_CATEGORY_ID','CATEGORY_NAME')->where('FEE_CATEGORY_TYPE','=','DISCOUNTS')
            ->get();
        return $category;
    }
}