<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/21/2017
 * Time: 6:42 PM
 */

namespace App\Models\HumanResource\Leaves;


use App\Models\BaseModel;
use App\Vos\HumanResourceVOS\LeaveTypeVO;

class LeaveTypeModel extends BaseModel
{
    protected $primaryKey = 'LEAVE_TYPE_ID';
    protected $table = 'hrm_leave_types';
    protected $fillable = ['ORG_ID','LEAVE_TYPE_NAME','LEAVES_ALLOWED','SALARY_DEDUCTION_DAYS','SALARY_DEDUCTION_AMOUNT','DESCRIPTION'];

    public function saveLeaveType(LeaveTypeVO $leaveTypeVO)
    {
        $result = $this->select()->where('LEAVE_TYPE_NAME', '=', $leaveTypeVO->getLeaveTypes())->get();
        if (count($result) > 0) {
            $leaveTypeVO->setErrorResponse(true, '0000036');
        } else {
            $this->ORG_ID = $leaveTypeVO->getOrgId();
            $this->LEAVE_TYPE_NAME = $leaveTypeVO->getLeaveTypes();
            $this->LEAVES_ALLOWED = $leaveTypeVO->getLeaves();
            $this->SALARY_DEDUCTION_DAYS = $leaveTypeVO->getSalarydeductionLimit();
            $this->SALARY_DEDUCTION_AMOUNT = $leaveTypeVO->getDeductionAmount();
            $this->save();
        }
    }

    public function updateLeaveType(LeaveTypeVO $leaveTypeVO)
    {
        $this->where('LEAVE_TYPE_ID',$leaveTypeVO->getLeavetypeId())
            ->update(['ORG_ID'=>$leaveTypeVO->getOrgId(),
                'LEAVES_ALLOWED'=>$leaveTypeVO->getLeaves(),
                'SALARY_DEDUCTION_DAYS'=>$leaveTypeVO->getSalarydeductionLimit(),
                'SALARY_DEDUCTION_AMOUNT'=>$leaveTypeVO->getDeductionAmount(),
                'UPDATED_BY' => $leaveTypeVO->getModifiedBy(),
                'UPDATED_AT' => $leaveTypeVO->getModifiedAt()]);
    }

    public function loadLeaveTypes()
    {
        $leaveTypes = $this->select('LEAVE_TYPE_ID','LEAVE_TYPE_NAME')->get();
        return $leaveTypes;
    }

}