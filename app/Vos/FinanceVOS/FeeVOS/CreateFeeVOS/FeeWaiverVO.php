<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/20/2017
 * Time: 5:55 PM
 */

namespace App\Vos\FinanceVOS\FeeVOS\CreateFeeVOS;


use App\Vos\BaseVO;

class FeeWaiverVO extends BaseVO
{
    protected $feeWaiverId;
    protected $feeCategoryId;
    protected $feeParticularId;
    protected $studentCategory;
    protected $waiverCategory;
    protected $amount;

    /**
     * @return mixed
     */
    public function getFeeWaiverId()
    {
        return $this->feeWaiverId;
    }

    /**
     * @param mixed $feeWaiverId
     */
    public function setFeeWaiverId($feeWaiverId)
    {
        $this->feeWaiverId = $feeWaiverId;
    }

    /**
     * @return mixed
     */
    public function getFeeCategoryId()
    {
        return $this->feeCategoryId;
    }

    /**
     * @param mixed $feeCategoryId
     */
    public function setFeeCategoryId($feeCategoryId)
    {
        $this->feeCategoryId = $feeCategoryId;
    }

    /**
     * @return mixed
     */
    public function getFeeParticularId()
    {
        return $this->feeParticularId;
    }

    /**
     * @param mixed $feeParticularId
     */
    public function setFeeParticularId($feeParticularId)
    {
        $this->feeParticularId = $feeParticularId;
    }

    /**
     * @return mixed
     */
    public function getStudentCategory()
    {
        return $this->studentCategory;
    }

    /**
     * @param mixed $studentCategory
     */
    public function setStudentCategory($studentCategory)
    {
        $this->studentCategory = $studentCategory;
    }

    /**
     * @return mixed
     */
    public function getWaiverCategory()
    {
        return $this->waiverCategory;
    }

    /**
     * @param mixed $waiverCategory
     */
    public function setWaiverCategory($waiverCategory)
    {
        $this->waiverCategory = $waiverCategory;
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