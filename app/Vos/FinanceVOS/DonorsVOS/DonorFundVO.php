<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/16/2017
 * Time: 12:06 PM
 */

namespace App\Vos\FinanceVOS\DonorsVOS;


use App\Vos\BaseVO;

class DonorFundVO extends BaseVO
{
    protected $donationId;
    protected $donorId;
    protected $description;
    protected $transactionDate;
    protected $amount;
    protected $fundCategory;
    protected $orgId;

    /**
     * @return mixed
     */
    public function getDonationId()
    {
        return $this->donationId;
    }

    /**
     * @param mixed $donationId
     */
    public function setDonationId($donationId)
    {
        $this->donationId = $donationId;
    }

    /**
     * @return mixed
     */
    public function getOrgId()
    {
        return $this->orgId;
    }

    /**
     * @param mixed $orgId
     */
    public function setOrgId($orgId)
    {
        $this->orgId = $orgId;
    }

    /**
     * @return mixed
     */
    public function getDonorfundId()
    {
        return $this->donorfundId;
    }

    /**
     * @param mixed $donorfundId
     */
    public function setDonorfundId($donorfundId)
    {
        $this->donorfundId = $donorfundId;
    }

    /**
     * @return mixed
     */
    public function getDonorId()
    {
        return $this->donorId;
    }

    /**
     * @param mixed $donorId
     */
    public function setDonorId($donorId)
    {
        $this->donorId = $donorId;
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

    /**
     * @return mixed
     */
    public function getFundCategory()
    {
        return $this->fundCategory;
    }

    /**
     * @param mixed $fundCategory
     */
    public function setFundCategory($fundCategory)
    {
        $this->fundCategory = $fundCategory;
    }


}