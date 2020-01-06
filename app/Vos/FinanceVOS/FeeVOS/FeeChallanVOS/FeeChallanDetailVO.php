<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 10/20/2017
 * Time: 12:15 PM
 */

namespace App\Vos\FinanceVOS\FeeVOS\FeeChallanVOS;


use App\Vos\BaseVO;

class FeeChallanDetailVO extends BaseVO
{
  protected $challanDetailId;
  protected $feecategorytype;
  protected $feeCategoryId;
  protected $feeParticularId;
  protected $amount;
  protected $feePeriod;
  protected $challanId;
  protected $challanNo;
  protected $consssion;

    /**
     * @return mixed
     */
    public function getChallanNo()
    {
        return $this->challanNo;
    }

    /**
     * @param mixed $challanNo
     */
    public function setChallanNo($challanNo)
    {
        $this->challanNo = $challanNo;
    }

    /**
     * @return mixed
     */
    public function getChallanId()
    {
        return $this->challanId;
    }

    /**
     * @param mixed $challanId
     */
    public function setChallanId($challanId)
    {
        $this->challanId = $challanId;
    }

    /**
     * @return mixed
     */
    public function getChallanDetailId()
    {
        return $this->challanDetailId;
    }

    /**
     * @param mixed $challanDetailId
     */
    public function setChallanDetailId($challanDetailId)
    {
        $this->challanDetailId = $challanDetailId;
    }

    /**
     * @return mixed
     */
    public function getFeecategorytype()
    {
        return $this->feecategorytype;
    }

    /**
     * @param mixed $feecategorytype
     */
    public function setFeecategorytype($feecategorytype)
    {
        $this->feecategorytype = $feecategorytype;
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
    public function getFeePeriod()
    {
        return $this->feePeriod;
    }

    /**
     * @param mixed $feePeriod
     */
    public function setFeePeriod($feePeriod)
    {
        $this->feePeriod = $feePeriod;
    }

    /**
     * @return mixed
     */
    public function getConsssion()
    {
        return $this->consssion;
    }

    /**
     * @param mixed $consssion
     */
    public function setConsssion($consssion)
    {
        $this->consssion = $consssion;
    }


}