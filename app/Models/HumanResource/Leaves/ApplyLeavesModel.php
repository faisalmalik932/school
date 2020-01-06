<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 12/4/2017
 * Time: 12:01 PM
 */

namespace App\Models\HumanResource\Leaves;


use App\Models\BaseModel;
use App\Vos\HumanResourceVOS\AddEntitlementVO;

class ApplyLeavesModel extends BaseModel
{
    protected $primaryKey = 'APPLY_LEAVE_ID';
    protected $table = 'hrm_apply_leaves';
    protected $fillable = ['ORG_ID','LEAVE_TYPE','DEPARTMENT_ID','BRANCH_ID','TITLE_ID','EMPLOYEE_ID','LEAVE_PERIOD_START','LEAVE_PERIOD_END'];

    public function addleaves(AddEntitlementVO $entitlementVO)
    {
        // dd($entitlementVO);
        // $result = $this->select()->where([
        //     ['BRANCH_ID', '=',$entitlementVO->getBranchId()],
        //     ['DEPARTMENT_ID', '=',$entitlementVO->getDepartmentId()],
        //     ['TITLE_ID', '=',$entitlementVO->getDesignationId()],
        //     ['EMPLOYEE_ID', '=',$entitlementVO->getEmployeeId()],
        //     ['LEAVE_TYPE', '=',$entitlementVO->getLeaveType()],
        //     ['LEAVE_PERIOD_START','=',$entitlementVO->getLeavePeriodStart()],
        //     ['LEAVE_PERIOD_END','=',$entitlementVO->getLeavePeriodEnd()]])->get();
        $result = $this
        ->whereDate('LEAVE_PERIOD_START' , '>=' , $entitlementVO->getLeavePeriodStart())
        ->orWhereDate('LEAVE_PERIOD_END' , '<=' , $entitlementVO->getLeavePeriodEnd())
        // ->where('BRANCH_ID' , $entitlementVO->getBranchId())
        // ->where('DEPARTMENT_ID' , $entitlementVO->getDepartmentId())
        // ->where('TITLE_ID' , $entitlementVO->getDesignationId())
        ->where('EMPLOYEE_ID' , $entitlementVO->getEmployeeId())
        // ->where('LEAVE_TYPE' , $entitlementVO->getLeaveType())
        ->get();
        if (count($result) > 0) {
            $entitlementVO->setErrorResponse(true, '0000037');
        } else {
            $this->ORG_ID = $entitlementVO->getOrgId();
            $this->LEAVE_TYPE = $entitlementVO->getLeaveType();
            $this->BRANCH_ID = $entitlementVO->getBranchId();
            $this->EMPLOYEE_ID = $entitlementVO->getEmployeeId();
            $this->DEPARTMENT_ID = $entitlementVO->getDepartmentId();
            $this->TITLE_ID = $entitlementVO->getDesignationId();
            $this->LEAVE_PERIOD_START = $entitlementVO->getLeavePeriodStart();
            $this->LEAVE_PERIOD_END = $entitlementVO->getLeavePeriodEnd();
            $this->CREATED_BY = $entitlementVO->getCreatedBy();
            $this->save();
        }
    }

}