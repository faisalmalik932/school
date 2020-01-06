<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/8/2017
 * Time: 1:09 PM
 */

namespace App\Models\Finance\Taxes;


use App\Models\BaseModel;
use App\Vos\FinanceVOS\TaxVOS\TaxVO;

class TaxesModel extends BaseModel
{
    protected $primaryKey = 'TAX_ID';
    protected $table = 'fin_tax_types';
    protected $fillable = ['DESCRIPTION','DEFAULT_RATE','SALES_ACCOUNT','PURCHASE_ACCOUNT'];

    public function saveTaxType(TaxVO $taxVO)
    {
        $this->DESCRIPTION = $taxVO->getDescription();
        $this->DEFAULT_RATE = $taxVO->getDefaultRate();
        $this->SALES_ACCOUNT = $taxVO->getSalesAccount();
        $this->PURCHASE_ACCOUNT = $taxVO->getPurchaseAccount();
        $this->CREATED_BY = $taxVO->getCreatedBy();
        $this->save();
    }

    public function updateTaxType(TaxVO $taxVO)
    {
        $this->where('TAX_ID',$taxVO->getTaxId())
            ->update(['DESCRIPTION'=>$taxVO->getDescription(),
                'DEFAULT_RATE'=>$taxVO->getDefaultRate(),
                'SALES_ACCOUNT'=>$taxVO->getSalesAccount(),
                'PURCHASE_ACCOUNT'=> $taxVO->getPurchaseAccount(),
                'UPDATED_BY' => $taxVO->getModifiedBy(),
                'UPDATED_AT' => $taxVO->getModifiedAt()]);
    }

}