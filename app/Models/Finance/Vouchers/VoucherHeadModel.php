<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/13/2017
 * Time: 8:37 PM
 */

namespace App\Models\Finance\Vouchers;


use App\Models\BaseModel;
use App\Vos\FinanceVOS\VoucherVOS\VoucherHeadVO;

class VoucherHeadModel extends BaseModel
{
    protected $primaryKey = 'VOUCHER_HEAD_ID';
    protected $table = 'fin_voucher_heads';
    protected $fillable =  ['ORG_ID','ACCOUNT_HEAD_ID','VOUCHER_HEAD_NAME','VOUCHER_TYPE','STATUS'];

    public function addVoucherHead(VoucherHeadVO $voucherHeadVO)
    {
        $result = $this->select()->where([['ACCOUNT_HEAD_ID', '=', $voucherHeadVO->getAccountheadId()], ['VOUCHER_HEAD_NAME', '=', $voucherHeadVO->getVoucherHeadName()]])->get();
        if (count($result) > 0) {
            $voucherHeadVO->setErrorResponse(true, '0000032');
        } else {
            $this->ACCOUNT_HEAD_ID = $voucherHeadVO->getAccountheadId();
            $this->ORG_ID = $voucherHeadVO->getOrgId();
            $this->VOUCHER_HEAD_NAME = $voucherHeadVO->getVoucherHeadName();
            $this->VOUCHER_TYPE = $voucherHeadVO->getVoucherType();
            $this->STATUS = $voucherHeadVO->getStatus();
            $this->CREATED_BY = $voucherHeadVO->getCreatedBy();
            $this->save();
        }
    }

    public function updateVoucherHead(VoucherHeadVO $voucherHeadVO)
    {
        $this->where('VOUCHER_HEAD_ID',$voucherHeadVO->getVoucherHeadId())
            ->update([  'VOUCHER_HEAD_NAME'=>$voucherHeadVO->getVoucherHeadName(),
                        'ACCOUNT_HEAD_ID'=>$voucherHeadVO->getAccountheadId(),
                        'VOUCHER_TYPE'=>$voucherHeadVO->getVoucherType(),
                        'STATUS'=>$voucherHeadVO->getStatus(),
                        'ORG_ID'=>$voucherHeadVO->getOrgId(),
                        'UPDATED_BY' => $voucherHeadVO->getModifiedBy(),
                        'UPDATED_AT' => $voucherHeadVO->getModifiedAt()]);
    }

    public function loadVoucherHeads()
    {
        $voucherHeads = $this->select('VOUCHER_HEAD_NAME','VOUCHER_HEAD_ID')->get();
        return $voucherHeads;

    }

}