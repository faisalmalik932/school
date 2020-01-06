<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/26/2017
 * Time: 4:14 PM
 */

namespace App\Vos\FinanceVOS\FeeVOS\CreateFeeVOS;


use App\Vos\BaseVO;

class FinesVO extends BaseVO
{
    protected $fineId;
    protected $orgId;
    protected $branchId;
    protected $fineName;
    protected $fineValue;
    protected $days;

    /**
     * @return mixed
     */
    public function getFineId()
    {
        return $this->fineId;
    }

    /**
     * @param mixed $fineId
     */
    public function setFineId($fineId)
    {
        $this->fineId = $fineId;
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
    public function getFineName()
    {
        return $this->fineName;
    }

    /**
     * @param mixed $fineName
     */
    public function setFineName($fineName)
    {
        $this->fineName = $fineName;
    }

    /**
     * @return mixed
     */
    public function getFineValue()
    {
        return $this->fineValue;
    }

    /**
     * @param mixed $fineValue
     */
    public function setFineValue($fineValue)
    {
        $this->fineValue = $fineValue;
    }

    /**
     * @return mixed
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * @param mixed $days
     */
    public function setDays($days)
    {
        $this->days = $days;
    }

}