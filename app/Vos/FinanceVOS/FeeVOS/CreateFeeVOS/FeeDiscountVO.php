<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/26/2017
 * Time: 4:14 PM
 */

namespace App\Vos\FinanceVOS\FeeVOS\CreateFeeVOS;


use App\Vos\BaseVO;

class FeeDiscountVO extends BaseVO
{
    protected $discountId;
    protected $orgId;
    protected $branchId;
    protected $discountType;
    protected $discountName;
    protected $amount;

    /**
     * @return mixed
     */
    public function getDiscountId()
    {
        return $this->discountId;
    }

    /**
     * @param mixed $discountId
     */
    public function setDiscountId($discountId)
    {
        $this->discountId = $discountId;
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
    public function getBranchId()
    {
        return $this->branchId;
    }

    /**
     * @param mixed $branchId
     */
    public function setBranchId($branchId)
    {
        $this->branchId = $branchId;
    }

    /**
     * @return mixed
     */
    public function getDiscountType()
    {
        return $this->discountType;
    }

    /**
     * @param mixed $discountType
     */
    public function setDiscountType($discountType)
    {
        $this->discountType = $discountType;
    }

    /**
     * @return mixed
     */
    public function getDiscountName()
    {
        return $this->discountName;
    }

    /**
     * @param mixed $discountName
     */
    public function setDiscountName($discountName)
    {
        $this->discountName = $discountName;
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