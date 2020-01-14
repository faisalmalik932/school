<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 10/2/2017
 * Time: 6:36 PM
 */

namespace App\Http\Controllers\HumanResource\Leaves;


use App\Http\Controllers\BaseController;
use App\Models\HumanResource\Leaves\AddEntitlementModel;
use App\Models\HumanResource\Leaves\ApplyLeavesModel;
use App\Models\HumanResource\Leaves\LeaveTypeModel;
use App\Models\HumanResource\Settings\DepartmentModel;
use App\Models\HumanResource\Settings\JobTitlesModel;
use App\Vos\HumanResourceVOS\AddEntitlementVO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ApplyLeavesController extends BaseController
{
    public function loadView()
    {
        $departmentModel = new DepartmentModel();
        $department = $departmentModel->loadDepartments();
        $jobTitleModel = new JobTitlesModel();
        $title = $jobTitleModel->getjobstatus();
        return view('HumanResource.Leaves.applyLeaves',compact('department','title'));
    }

    public function addemployeeLeaves(Request $request)
    {
        //dd($request->all());
        $validator = \Validator::make($request->all(), [
            'leaveperiodstart' => 'required|after:today',
            'leaveperiodend' => 'required|after:today|after:leaveperiodstart',

        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $entitlementVO = new AddEntitlementVO();
        $applyLeaveModel = new ApplyLeavesModel();
        $entitlementVO->setOrgId(1);
        $entitlementVO->setApplyLeaveId($request->input('primary'));
        $entitlementVO->setBranchId($request->input('branch'));
        $entitlementVO->setDepartmentId($request->input('department'));
        $entitlementVO->setDesignationId($request->input('designation'));
        $entitlementVO->setEmployeeId($request->input('employeename'));
        $entitlementVO->setLeaveType($request->input('leavetype'));
        $entitlementVO->setLeavePeriodStart($request->input('leaveperiodstart'));
        $entitlementVO->setLeavePeriodEnd($request->input('leaveperiodend'));
        $entitlementVO->setReason($request->input('leavereason'));
        $entitlementVO->setCreatedBy($this->getUserName());
        $applyLeaveModel->addleaves($entitlementVO);
        if ($entitlementVO->getError()) {
            return $this->getMessageWithRedirect($entitlementVO->getErrorCode());
        } else {
            session::flash('applyleave', "Leave Added Successfully");
            return redirect('hr/leaves/apply-leave');
        }

    }

}