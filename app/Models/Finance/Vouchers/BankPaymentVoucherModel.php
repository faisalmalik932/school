<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 11/1/2017
 * Time: 8:04 PM
 */

namespace App\Models\Finance\Vouchers;


use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Collection;

class BankPaymentVoucherModel extends BaseModel
{
    protected $primaryKey = '';
    protected $table = '';
    protected $fillable =  ['VOUCHER_HEAD_ID','TRANSACTION_CODE','TRANSACTION_DATE','LEDGER_ACCOUNT','DEBIT_AMOUNT','CREDIT_AMOUNT','DESCRIPTION'];

    public function addDoubleEntry(Collection $Collection)
    {
        $Collection->each(function($VO){
            $this->insert(array(
                array(
                    'VOUCHER_HEAD_ID' => $VO->getVoucherHeadId(),
                    'TRANSACTION_DATE' => $VO->getTransactionDate(),
                    'LEDGER_ACCOUNT' => $VO->getLedgerAccount(),
                    'DEBIT_AMOUNT' => $VO->getDebitAmount(),
                    'CREDIT_AMOUNT' => $VO->getCreditAmount(),
                    'TRANSACTION_CODE' => $VO->getTransactionCode(),
                    'DESCRIPTION' => $VO->getDescription(),
                    'CHEQUE_NO' => $VO->getChequeno()
                )));
        });
    }

}