<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/16/2017
 * Time: 12:09 PM
 */

namespace App\Models\Finance\Donors;


use App\Models\BaseModel;
use App\Vos\FinanceVOS\DonorsVOS\DonorFundVO;

class DonorFundModel extends BaseModel
{
    protected $primaryKey = 'DONATION_ID';
    protected $table = 'fin_donor_donations';
    protected $fillable = ['ORG_ID','DONOR_ID','DESCRIPTION','RECEIVED_DATE','AMOUNT','FUND_CATEGORY'];

    public function addDonorFunds(DonorFundVO $donorFundVO)
    {
        $this->DONOR_ID = $donorFundVO->getDonorId();
        $this->ORG_ID = $donorFundVO->getOrgId();
        $this->DESCRIPTION = $donorFundVO->getDescription();
        $this->RECEIVED_DATE = $donorFundVO->getTransactionDate();
        $this->AMOUNT = $donorFundVO->getAmount();
        $this->FUND_CATEGORY = $donorFundVO->getFundCategory();
        $this->CREATED_BY = $donorFundVO->getCreatedBy();
        $this->save();
    }

    public function updateDonorFunds(DonorFundVO $donorFundVO)
    {
        $this->where('DONATION_ID',$donorFundVO->getDonationId())
            ->update([  'ORG_ID'=>$donorFundVO->getOrgId(),
                        'DONOR_ID'=>$donorFundVO->getDonorId(),
                        'DESCRIPTION'=>$donorFundVO->getDescription(),
                        'RECEIVED_DATE'=>$donorFundVO->getTransactionDate(),
                        'AMOUNT'=>$donorFundVO->getAmount(),
                        'FUND_CATEGORY'=>$donorFundVO->getFundCategory(),
                        'UPDATED_BY' => $donorFundVO->getModifiedBy(),
                        'UPDATED_AT' => $donorFundVO->getModifiedAt()]);
    }

}