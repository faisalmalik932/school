<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/13/2017
 * Time: 7:56 PM
 */
namespace App\Vos\FinanceVOS\VoucherVOS;

use App\Vos\BaseVO;

class CreateVoucherVO extends BaseVO
{
    protected $voucherId;
    protected $voucherHeadId;
    protected $transactionDate;
    protected $fromledgerAccount;
    protected $toLedgerAccount;
    protected $amount;
    protected $accountType;
    protected $transactionCode;
    protected $receivedBill;
    protected $ledgerAccount;
    protected $debitAmount;
    protected $creditAmount;
    protected $description;
    protected $chequeno;
    protected $transactionCodeprefix;
    protected $fiscalYear;

    /**
     * @return mixed
     */
    public function getFiscalYear()
    {
        return $this->fiscalYear;
    }

    /**
     * @param mixed $fiscalYear
     */
    public function setFiscalYear($fiscalYear)
    {
        $this->fiscalYear = $fiscalYear;
    }

    /**
     * @return mixed
     */
    public function getTransactionCodeprefix()
    {
        return $this->transactionCodeprefix;
    }

    /**
     * @param mixed $transactionCodeprefix
     */
    public function setTransactionCodeprefix($transactionCodeprefix)
    {
        $this->transactionCodeprefix = $transactionCodeprefix;
    }

     public function getBankId()
    {
        return $this->BankId;
    }

    /**
     * @param mixed $transactionCodeprefix
     */
    public function setBankId($BankId)
    {
        $this->BankId = $BankId;
    }

    /**
     * @return mixed
     */
    public function getChequeno()
    {
        return $this->chequeno;
    }

    /**
     * @param mixed $chequeno
     */
    public function setChequeno($chequeno)
    {
        $this->chequeno = $chequeno;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDebitAmount()
    {
        return $this->debitAmount;
    }

    /**
     * @param mixed $debitAmount
     */
    public function setDebitAmount($debitAmount)
    {
        $this->debitAmount = $debitAmount;
    }

    /**
     * @return mixed
     */
    public function getCreditAmount()
    {
        return $this->creditAmount;
    }

    /**
     * @param mixed $creditAmount
     */
    public function setCreditAmount($creditAmount)
    {
        $this->creditAmount = $creditAmount;
    }


    /**
     * @return mixed
     */
    public function getLedgerAccount()
    {
        return $this->ledgerAccount;
    }

    /**
     * @param mixed $ledgerAccount
     */
    public function setLedgerAccount($ledgerAccount)
    {
        $this->ledgerAccount = $ledgerAccount;
    }

    /**
     * @return mixed
     */
    public function getReceivedBill()
    {
        return $this->receivedBill;
    }

    /**
     * @param mixed $receivedBill
     */
    public function setReceivedBill($receivedBill)
    {
        $this->receivedBill = $receivedBill;
    }

    /**
     * @return mixed
     */
    public function getTransactionCode()
    {
        return $this->transactionCode;
    }

    /**
     * @param mixed $transactionCode
     */
    public function setTransactionCode($transactionCode)
    {
        $this->transactionCode = $transactionCode ==''?'00001':$transactionCode;
    }

    /**
     * @return mixed
     */
    public function getAccountType()
    {
        return $this->accountType;
    }

    /**
     * @param mixed $accountType
     */
    public function setAccountType($accountType)
    {
        $this->accountType = $accountType;
    }

    /**
     * @return mixed
     */
    public function getVoucherId()
    {
        return $this->voucherId;
    }

    /**
     * @param mixed $voucherId
     */
    public function setVoucherId($voucherId)
    {
        $this->voucherId = $voucherId;
    }

    /**
     * @return mixed
     */
    public function getVoucherHeadId()
    {
        return $this->voucherHeadId;
    }

    /**
     * @param mixed $voucherHeadId
     */
    public function setVoucherHeadId($voucherHeadId)
    {
        $this->voucherHeadId = $voucherHeadId;
    }

    /**
     * @return mixed
     */
    public function getTransactionDate()
    {
        return $this->transactionDate;
    }

    /**
     * @param mixed $transactionDate
     */
    public function setTransactionDate($transactionDate)
    {
        $this->transactionDate = $transactionDate;
    }

    /**
     * @return mixed
     */
    public function getFromledgerAccount()
    {
        return $this->fromledgerAccount;
    }

    /**
     * @param mixed $fromledgerAccount
     */
    public function setFromledgerAccount($fromledgerAccount)
    {
        $this->fromledgerAccount = $fromledgerAccount;
    }

    /**
     * @return mixed
     */
    public function getToLedgerAccount()
    {
        return $this->toLedgerAccount;
    }

    /**
     * @param mixed $toLedgerAccount
     */
    public function setToLedgerAccount($toLedgerAccount)
    {
        $this->toLedgerAccount = $toLedgerAccount;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }


}