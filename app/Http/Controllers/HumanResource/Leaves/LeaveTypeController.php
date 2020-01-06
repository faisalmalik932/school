<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/21/2017
 * Time: 6:19 PM
 */

namespace App\Http\Controllers\HumanResource\Leaves;


use App\Http\Controllers\BaseController;
use App\Models\HumanResource\Leaves\LeaveTypeModel;
use App\Vos\HumanResourceVOS\LeaveTypeVO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LeaveTypeController extends BaseController
{
    public function loadView()
    {
        return view('HumanResource.Leaves.leaveType');
    }

    public function add(Request $request)
    {
        $leaveTypeVO = new LeaveTypeVO();
        $leaveTypeVO->setOrgId(1);
        $leaveTypeVO->setLeavetypeId($request->input('primary'));
        $leaveTypeVO->setDeductionAmount($request->input('deductionamount'));
        $leaveTypeVO->setLeaveTypes($request->input('leavetype'));
        $leaveTypeVO->setLeaves($request->input('leaves'));
        $leaveTypeVO->setSalarydeductionLimit($request->input('salarydeduction'));
        $leaveTypeModel = new LeaveTypeModel();
        if($leaveTypeVO->getLeavetypeId() <= 0 || $leaveTypeVO->getLeavetypeId() == '') {
            $leaveTypeVO->setCreatedBy($this->getUserName());
            $leaveTypeModel->saveLeaveType($leaveTypeVO);
            if ($leaveTypeVO->getError()) {
                return $this->getMessageWithRedirect($leaveTypeVO->getErrorCode());
            } else {
                session::flash('leavetype', "Leave Type Added Successfully");
                return redirect('hr/leaves/leave-type');
            }
        }
        else{
            $leaveTypeVO->setModifiedBy($this->getUserName());
            $leaveTypeVO->setModifiedAt($this->getTimeStamp());
            $leaveTypeModel->updateLeaveType($leaveTypeVO);
            session::flash('leavetype', "Leave Type Updated Successfully");
            return redirect('hr/leaves/leave-type');
        }

    }

}