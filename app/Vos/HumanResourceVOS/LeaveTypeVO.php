<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/21/2017
 * Time: 6:20 PM
 */

namespace App\Vos\HumanResourceVOS;


use App\Vos\BaseVO;

class LeaveTypeVO extends BaseVO
{
    protected $leavetypeId;
    protected $leaveTypes;
    protected $leaves;
    protected $salarydeductionLimit;
    protected $deductionAmount;

    /**
     * @return mixed
     */
    public function getLeavetypeId()
    {
        return $this->leavetypeId;
    }

    /**
     * @param mixed $leavetypeId
     */
    public function setLeavetypeId($leavetypeId)
    {
        $this->leavetypeId = $leavetypeId;
    }

    /**
     * @return mixed
     */
    public function getLeaveTypes()
    {
        return $this->leaveTypes;
    }

    /**
     * @param mixed $leaveTypes
     */
    public function setLeaveTypes($leaveTypes)
    {
        $this->leaveTypes = $leaveTypes;
    }

    /**
     * @return mixed
     */
    public function getLeaves()
    {
        return $this->leaves;
    }

    /**
     * @param mixed $leaves
     */
    public function setLeaves($leaves)
    {
        $this->leaves = $leaves;
    }

    /**
     * @return mixed
     */
    public function getSalarydeductionLimit()
    {
        return $this->salarydeductionLimit;
    }

    /**
     * @param mixed $salarydeductionLimit
     */
    public function setSalarydeductionLimit($salarydeductionLimit)
    {
        $this->salarydeductionLimit = $salarydeductionLimit;
    }

    /**
     * @return mixed
     */
    public function getDeductionAmount()
    {
        return $this->deductionAmount;
    }

    /**
     * @param mixed $deductionAmount
     */
    public function setDeductionAmount($deductionAmount)
    {
        $this->deductionAmount = $deductionAmount;
    }

}