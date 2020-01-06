<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/7/2017
 * Time: 6:49 PM
 */

namespace App\Vos\FinanceVOS\BankAccountVOS;


use App\Vos\BaseVO;

class BankAccountVO extends BaseVO
{
    protected $bankaccountId;
    protected $bankaccountName;
    protected $bankaccountNumber;
    protected $bankName;
    protected $bankAddress;
    protected $accountType;
    protected $accountCurrency;
    protected $defaultCurrentAccount;
    protected $glCode;
    protected $chargesAccount;

    /**
     * @return mixed
     */
    public function getBankaccountId()
    {
        return $this->bankaccountId;
    }

    /**
     * @param mixed $bankaccountId
     */
    public function setBankaccountId($bankaccountId)
    {
        $this->bankaccountId = $bankaccountId;
    }

    /**
     * @return mixed
     */
    public function getBankaccountName()
    {
        return $this->bankaccountName;
    }

    /**
     * @param mixed $bankaccountNamel
     */
    public function setBankaccountName($bankaccountName)
    {
        $this->bankaccountName = $bankaccountName;
    }

    /**
     * @return mixed
     */
    public function getBankaccountNumber()
    {
        return $this->bankaccountNumber;
    }

    /**
     * @param mixed $bankaccountNumber
     */
    public function setBankaccountNumber($bankaccountNumber)
    {
        $this->bankaccountNumber = $bankaccountNumber;
    }

    /**
     * @return mixed
     */
    public function getBankName()
    {
        return $this->bankName;
    }

    /**
     * @param mixed $bankName
     */
    public function setBankName($bankName)
    {
        $this->bankName = $bankName;
    }

    /**
     * @return mixed
     */
    public function getBankAddress()
    {
        return $this->bankAddress;
    }

    /**
     * @param mixed $bankAddress
     */
    public function setBankAddress($bankAddress)
    {
        $this->bankAddress = $bankAddress;
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
    public function getAccountCurrency()
    {
        return $this->accountCurrency;
    }

    /**
     * @param mixed $accountCurrency
     */
    public function setAccountCurrency($accountCurrency)
    {
        $this->accountCurrency = $accountCurrency;
    }

    /**
     * @return mixed
     */
    public function getDefaultCurrentAccount()
    {
        return $this->defaultCurrentAccount;
    }

    /**
     * @param mixed $defaultCurrentAccount
     */
    public function setDefaultCurrentAccount($defaultCurrentAccount)
    {
        $this->defaultCurrentAccount = $defaultCurrentAccount;
    }

    /**
     * @return mixed
     */
    public function getGlCode()
    {
        return $this->glCode;
    }

    /**
     * @param mixed $glCode
     */
    public function setGlCode($glCode)
    {
        $this->glCode = $glCode;
    }

    /**
     * @return mixed
     */
    public function getChargesAccount()
    {
        return $this->chargesAccount;
    }

    /**
     * @param mixed $chargesAccount
     */
    public function setChargesAccount($chargesAccount)
    {
        $this->chargesAccount = $chargesAccount;
    }




}