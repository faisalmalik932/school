<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/7/2017
 * Time: 6:49 PM
 */

namespace App\Vos\FinanceVOS\Settings;


use App\Vos\BaseVO;

class SupplierVO extends BaseVO
{
    protected $supplierId;
    protected $supplierName;
    protected $gstNo;
    protected $website;
    protected $currency;
    protected $bankName;
    protected $creditLimit;
    protected $paymentTerm;
    protected $taxInclude;
    protected $PayableAccount;
    protected $purchaseAccount;
    protected $discountAccount;
    protected $contactPersonName;
    protected $mobileNumber;
    protected $landLine;
    protected $faxNo;
    protected $Email;
    protected $address;
    protected $description;
    protected $bankaccountTitle;
    protected $bankaccountNumber;

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
    public function getSupplierName()
    {
        return $this->supplierName;
    }

    /**
     * @param mixed $supplierName
     */
    public function setSupplierName($supplierName)
    {
        $this->supplierName = $supplierName;
    }

    /**
     * @return mixed
     */
    public function getGstNo()
    {
        return $this->gstNo;
    }

    /**
     * @param mixed $gstNo
     */
    public function setGstNo($gstNo)
    {
        $this->gstNo = $gstNo;
    }

    /**
     * @return mixed
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * @param mixed $website
     */
    public function setWebsite($website)
    {
        $this->website = $website;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
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
    public function getCreditLimit()
    {
        return $this->creditLimit;
    }

    /**
     * @param mixed $creditLimit
     */
    public function setCreditLimit($creditLimit)
    {
        $this->creditLimit = $creditLimit;
    }

    /**
     * @return mixed
     */
    public function getPaymentTerm()
    {
        return $this->paymentTerm;
    }

    /**
     * @param mixed $paymentTerm
     */
    public function setPaymentTerm($paymentTerm)
    {
        $this->paymentTerm = $paymentTerm;
    }

    /**
     * @return mixed
     */
    public function getTaxInclude()
    {
        return $this->taxInclude;
    }

    /**
     * @param mixed $taxInclude
     */
    public function setTaxInclude($taxInclude)
    {
        $this->taxInclude = $taxInclude;
    }

    /**
     * @return mixed
     */
    public function getPayableAccount()
    {
        return $this->PayableAccount;
    }

    /**
     * @param mixed $PayableAccount
     */
    public function setPayableAccount($PayableAccount)
    {
        $this->PayableAccount = $PayableAccount;
    }

    /**
     * @return mixed
     */
    public function getPurchaseAccount()
    {
        return $this->purchaseAccount;
    }

    /**
     * @param mixed $purchaseAccount
     */
    public function setPurchaseAccount($purchaseAccount)
    {
        $this->purchaseAccount = $purchaseAccount;
    }

    /**
     * @return mixed
     */
    public function getDiscountAccount()
    {
        return $this->discountAccount;
    }

    /**
     * @param mixed $discountAccount
     */
    public function setDiscountAccount($discountAccount)
    {
        $this->discountAccount = $discountAccount;
    }

    /**
     * @return mixed
     */
    public function getContactPersonName()
    {
        return $this->contactPersonName;
    }

    /**
     * @param mixed $contactPersonName
     */
    public function setContactPersonName($contactPersonName)
    {
        $this->contactPersonName = $contactPersonName;
    }

    /**
     * @return mixed
     */
    public function getMobileNumber()
    {
        return $this->mobileNumber;
    }

    /**
     * @param mixed $mobileNumber
     */
    public function setMobileNumber($mobileNumber)
    {
        $this->mobileNumber = $mobileNumber;
    }

    /**
     * @return mixed
     */
    public function getLandLine()
    {
        return $this->landLine;
    }

    /**
     * @param mixed $landLine
     */
    public function setLandLine($landLine)
    {
        $this->landLine = $landLine;
    }

    /**
     * @return mixed
     */
    public function getFaxNo()
    {
        return $this->faxNo;
    }

    /**
     * @param mixed $faxNo
     */
    public function setFaxNo($faxNo)
    {
        $this->faxNo = $faxNo;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * @param mixed $Email
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
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


}