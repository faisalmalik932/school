<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/26/2017
 * Time: 4:03 PM
 */

namespace App\Models\Finance\Fees\CreateFee;


use App\Models\BaseModel;
use App\Vos\FinanceVOS\FeeVOS\CreateFeeVOS\FinesVO;

class FinesModel extends BaseModel
{
    protected $primaryKey = 'FINE_ID';
    protected $table = 'fin_fee_fines';
    protected $fillable = ['ORG_ID','BRANCH_ID','FINE_NAME','FINE_VALUE','DAYS'];

    public function saveFineInfo(FinesVO $finesVO)
    {
        $result = $this->select()->where('FINE_NAME', '=', $finesVO->getFineName())->get();
        if (count($result) > 0) {
            $finesVO->setErrorResponse(true, '0000019');
        } else {
            $this->ORG_ID = $finesVO->getOrgId();
            $this->BRANCH_ID = $finesVO->getBranchId();
            $this->FINE_NAME = $finesVO->getFineName();
            $this->FINE_VALUE = $finesVO->getFineValue();
            $this->DAYS = $finesVO->getDays();
            $this->save();
        }
    }

    public function updateFineInfo(FinesVO $finesVO)
    {
        $this->where('FINE_ID',$finesVO->getFineId())
            ->update(['ORG_ID'=>$finesVO->getOrgId(),
                'BRANCH_ID'=>$finesVO->getBranchId(),
                'FINE_NAME'=>$finesVO->getFineName(),
                'FINE_VALUE'=>$finesVO->getFineValue(),
                'DAYS'=>$finesVO->getDays()]);
    }
}