<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 10/2/2017
 * Time: 3:33 PM
 */

namespace App\Vos\HumanResourceVOS;


use App\Vos\BaseVO;

class AddEntitlementVO extends BaseVO
{
    protected $entitlementId;
    protected $employeeId;
    protected $departmentId;
    protected $branchId;
    protected $designationId;
    protected $leaveType;
    protected $leavePeriod;
    protected $Entitlement;
    protected $leavePeriodStart;
    protected $leavePeriodEnd;
    protected $reason;
    protected $applyLeaveId;

    /**
     * @return mixed
     */
    public function getApplyLeaveId()
    {
        return $this->applyLeaveId;
    }

    /**
     * @param mixed $applyLeaveId
     */
    public function setApplyLeaveId($applyLeaveId)
    {
        $this->applyLeaveId = $applyLeaveId;
    }

    /**
     * @return mixed
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @param mixed $reason
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
    }

    /**
     * @return mixed
     */
    public function getLeavePeriodStart()
    {
        return $this->leavePeriodStart;
    }

    /**
     * @param mixed $leavePeriodStart
     */
    public function setLeavePeriodStart($leavePeriodStart)
    {
        $this->leavePeriodStart = $leavePeriodStart;
    }

    /**
     * @return mixed
     */
    public function getLeavePeriodEnd()
    {
        return $this->leavePeriodEnd;
    }

    /**
     * @param mixed $leavePeriodEnd
     */
    public function setLeavePeriodEnd($leavePeriodEnd)
    {
        $this->leavePeriodEnd = $leavePeriodEnd;
    }

    /**
     * @return mixed
     */
    public function getEntitlementId()
    {
        return $this->entitlementId;
    }

    /**
     * @param mixed $entitlementId
     */
    public function setEntitlementId($entitlementId)
    {
        $this->entitlementId = $entitlementId;
    }

    /**
     * @return mixed
     */
    public function getEmployeeId()
    {
        return $this->employeeId;
    }

    /**
     * @param mixed $employeeId
     */
    public function setEmployeeId($employeeId)
    {
        $this->employeeId = $employeeId;
    }

    /**
     * @return mixed
     */
    public function getDepartmentId()
    {
        return $this->departmentId;
    }

    /**
     * @param mixed $departmentId
     */
    public function setDepartmentId($departmentId)
    {
        $this->departmentId = $departmentId;
    }

    /**
     * @return mixed
     */
    public function getDesignationId()
    {
        return $this->designationId;
    }

    /**
     * @param mixed $designationId
     */
    public function setDesignationId($designationId)
    {
        $this->designationId = $designationId;
    }

    /**
     * @return mixed
     */
    public function getBranchId()
    {
        return $this->branchId;
    }

    /**
     * @param mixed $designationId
     */
    public function setBranchId($branchId)
    {
        $this->branchId = $branchId;
    }

    /**
     * @return mixed
     */
    public function getLeaveType()
    {
        return $this->leaveType;
    }

    /**
     * @param mixed $leaveType
     */
    public function setLeaveType($leaveType)
    {
        $this->leaveType = $leaveType;
    }

    /**
     * @return mixed
     */
    public function getLeavePeriod()
    {
        return $this->leavePeriod;
    }

    /**
     * @param mixed $leavePeriod
     */
    public function setLeavePeriod($leavePeriod)
    {
        $this->leavePeriod = $leavePeriod;
    }

    /**
     * @return mixed
     */
    public function getEntitlement()
    {
        return $this->Entitlement;
    }

    /**
     * @param mixed $Entitlement
     */
    public function setEntitlement($Entitlement)
    {
        $this->Entitlement = $Entitlement;
    }


}