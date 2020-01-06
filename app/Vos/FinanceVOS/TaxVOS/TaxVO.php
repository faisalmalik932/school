<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/8/2017
 * Time: 1:09 PM
 */

namespace App\Vos\FinanceVOS\TaxVOS;


use App\Vos\BaseVO;

class TaxVO extends BaseVO
{
    protected $taxId;
    protected $description;
    protected $defaultRate;
    protected $salesAccount;
    protected $purchaseAccount;

    /**
     * @return mixed
     */
    public function getTaxId()
    {
        return $this->taxId;
    }

    /**
     * @param mixed $taxId
     */
    public function setTaxId($taxId)
    {
        $this->taxId = $taxId;
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
    public function getDefaultRate()
    {
        return $this->defaultRate;
    }

    /**
     * @param mixed $defaultRate
     */
    public function setDefaultRate($defaultRate)
    {
        $this->defaultRate = $defaultRate;
    }

    /**
     * @return mixed
     */
    public function getSalesAccount()
    {
        return $this->salesAccount;
    }

    /**
     * @param mixed $salesAccount
     */
    public function setSalesAccount($salesAccount)
    {
        $this->salesAccount = $salesAccount;
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



}