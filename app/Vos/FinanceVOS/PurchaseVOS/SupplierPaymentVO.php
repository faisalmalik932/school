<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/17/2017
 * Time: 3:01 PM
 */

namespace App\Vos\FinanceVOS\PurchaseVOS;


use App\Vos\BaseVO;

class SupplierPaymentVO extends BaseVO
{
    protected $supplierPaymentId;
    protected $supplierId;
    protected $frombankAccount;
    protected $datePaid;
    protected $reference;
    protected $bankAmount;
    protected $discountAmount;
    protected $paymentAmount;
    protected $poNumber;
    protected $bankName;
    protected $bankaccountTitle;
    protected $bankacountNumber;
    protected $checqueNumber;
    protected $paymentMode;

    /**
     * @return mixed
     */
    public function getPaymentMode()
    {
        return $this->paymentMode;
    }

    /**
     * @param mixed $paymentMode
     */
    public function setPaymentMode($paymentMode)
    {
        $this->paymentMode = $paymentMode;
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
    public function getBankaccountTitle()
    {
        return $this->bankaccountTitle;
    }

    /**
     * @param mixed $bankaccountTitle
     */
    public function setBankaccountTitle($bankaccountTitle)
    {
        $this->bankaccountTitle = $bankaccountTitle;
    }

    /**
     * @return mixed
     */
    public function getBankacountNumber()
    {
        return $this->bankacountNumber;
    }

    /**
     * @param mixed $bankacountNumber
     */
    public function setBankacountNumber($bankacountNumber)
    {
        $this->bankacountNumber = $bankacountNumber;
    }

    /**
     * @return mixed
     */
    public function getChecqueNumber()
    {
        return $this->checqueNumber;
    }

    /**
     * @param mixed $checqueNumber
     */
    public function setChecqueNumber($checqueNumber)
    {
        $this->checqueNumber = $checqueNumber;
    }

    /**
     * @return mixed
     */
    public function getPoNumber()
    {
        return $this->poNumber;
    }

    /**
     * @param mixed $poNumber
     */
    public function setPoNumber($poNumber)
    {
        $this->poNumber = $poNumber;
    }

    /**
     * @return mixed
     */
    public function getSupplierPaymentId()
    {
        return $this->supplierPaymentId;
    }

    /**
     * @param mixed $supplierPaymentId
     */
    public function setSupplierPaymentId($supplierPaymentId)
    {
        $this->supplierPaymentId = $supplierPaymentId;
    }

    /**
     * @return mixed
     */
    public function getSupplierId()
    {
        return $this->supplierId;
    }

    /**
     * @param mixed $supplierId
     */
    public function setSupplierId($supplierId)
    {
        $this->supplierId = $supplierId;
    }

    /**
     * @return mixed
     */
    public function getFrombankAccount()
    {
        return $this->frombankAccount;
    }

    /**
     * @param mixed $frombankAccount
     */
    public function setFrombankAccount($frombankAccount)
    {
        $this->frombankAccount = $frombankAccount;
    }

    /**
     * @return mixed
     */
    public function getDatePaid()
    {
        return $this->datePaid;
    }

    /**
     * @param mixed $datePaid
     */
    public function setDatePaid($datePaid)
    {
        $this->datePaid = $datePaid;
    }

    /**
     * @return mixed
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param mixed $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    /**
     * @return mixed
     */
    public function getBankAmount()
    {
        return $this->bankAmount;
    }

    /**
     * @param mixed $bankAmount
     */
    public function setBankAmount($bankAmount)
    {
        $this->bankAmount = $bankAmount;
    }

    /**
     * @return mixed
     */
    public function getDiscountAmount()
    {
        return $this->discountAmount;
    }

    /**
     * @param mixed $discountAmount
     */
    public function setDiscountAmount($discountAmount)
    {
        $this->discountAmount = $discountAmount;
    }

    /**
     * @return mixed
     */
    public function getPaymentAmount()
    {
        return $this->paymentAmount;
    }

    /**
     * @param mixed $paymentAmount
     */
    public function setPaymentAmount($paymentAmount)
    {
        $this->paymentAmount = $paymentAmount;
    }

}