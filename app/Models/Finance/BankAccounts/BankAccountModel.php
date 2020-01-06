<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/7/2017
 * Time: 5:51 PM
 */

namespace App\Models\Finance\BankAccounts;


use App\Models\BaseModel;
use App\Vos\FinanceVOS\BankAccountVOS\BankAccountVO;

class BankAccountModel extends BaseModel
{
    protected $primaryKey = 'ACCOUNT_ID';
    protected $table = 'fin_bank_accounts';
    protected $fillable = ['BANK_ACCOUNT_TITLE','BANK_NAME','BANK_ACCOUNT_NO','BANK_ADDRESS','ACCOUNT_TYPE','ACCOUNT_CURRENCY','DEFAULT_CURRENCY_ACCOUNT','GL_CODE','CHARGES_ACCOUNT'];

    public function saveBankAccountInfo(BankAccountVO $bankAccountVO)
    {
        $result = $this->select()->where('BANK_ACCOUNT_NO', '=', $bankAccountVO->getBankaccountNumber())->get();
        if (count($result) > 0) {
            $bankAccountVO->setErrorResponse(true, '0000026');
        } else {
            $this->BANK_ACCOUNT_TITLE = $bankAccountVO->getBankaccountName();
            $this->BANK_NAME = $bankAccountVO->getBankName();
            $this->BANK_ACCOUNT_NO = $bankAccountVO->getBankaccountNumber();
            $this->BANK_ADDRESS = $bankAccountVO->getBankAddress();
            $this->ACCOUNT_TYPE = $bankAccountVO->getAccountType();
            $this->ACCOUNT_CURRENCY = $bankAccountVO->getAccountCurrency();
            $this->DEFAULT_CURRENCY_ACCOUNT = $bankAccountVO->getDefaultCurrentAccount();
            $this->CHARGES_ACCOUNT = $bankAccountVO->getChargesAccount();
            $this->GL_CODE = $bankAccountVO->getGlCode();
            $this->CREATED_BY = $bankAccountVO->getCreatedBy();
            $this->save();
        }
    }

    public function UpdateBankAccountInfo(BankAccountVO $bankAccountVO)
    {
        $this->where('ACCOUNT_ID',$bankAccountVO->getBankaccountId())
            ->update(['BANK_ACCOUNT_TITLE'=>$bankAccountVO->getBankaccountName(),
                'BANK_NAME'=>$bankAccountVO->getBankName(),
                'BANK_ACCOUNT_NO'=>$bankAccountVO->getBankaccountNumber(),
                'BANK_ADDRESS'=>$bankAccountVO->getBankAddress(),
                'ACCOUNT_TYPE'=>$bankAccountVO->getAccountType(),
                'ACCOUNT_CURRENCY'=>$bankAccountVO->getAccountCurrency(),
                'GL_CODE'=>$bankAccountVO->getGlCode(),
                'DEFAULT_CURRENCY_ACCOUNT'=>$bankAccountVO->getDefaultCurrentAccount(),
                'CHARGES_ACCOUNT'=> $bankAccountVO->getChargesAccount(),
                'UPDATED_BY' => $bankAccountVO->getModifiedBy(),
                'UPDATED_AT' => $bankAccountVO->getModifiedAt()]);
    }

    public function BankAccount()
    {
        $bankAccount = $this->select('BANK_NAME')->get();
        return $bankAccount;
    }
}