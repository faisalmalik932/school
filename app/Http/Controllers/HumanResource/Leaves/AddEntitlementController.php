<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 10/2/2017
 * Time: 3:29 PM
 */

namespace App\Http\Controllers\HumanResource\Leaves;


use App\Http\Controllers\BaseController;
use App\Models\HumanResource\EmployeeModel;
use App\Models\HumanResource\Leaves\AddEntitlementModel;
use App\Models\HumanResource\Leaves\LeaveTypeModel;
use App\Models\HumanResource\Settings\DepartmentModel;
use App\Models\HumanResource\Settings\JobTitlesModel;
use App\Vos\HumanResourceVOS\AddEntitlementVO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AddEntitlementController extends BaseController
{
    public function loadView()
    {   
        // $branchModel = new BranchModel();
        // $branchs = $branchModel->loadDepartments();
        $departmentModel = new DepartmentModel();
        $departments = $departmentModel->loadDepartments();
        $leaveTypeModel = new LeaveTypeModel();
        $leaveTypes = $leaveTypeModel->loadLeaveTypes();
        $jobTitleModel = new JobTitlesModel();
        $jobTitle = $jobTitleModel->getjobstatus();
        return view('HumanResource.Leaves.addEntitlements')
            ->with('department',$departments)
            // ->with('department',$departments)
            ->with('leavetype',$leaveTypes)
            ->with('title',$jobTitle);
    }

    public function add(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'entitlements' => 'integer|between:1,25',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $entitlementVO = new AddEntitlementVO();
        $entitlementModel = new AddEntitlementModel();
        $entitlementVO->setEntitlementId($request->input('primary'));
        $entitlementVO->setOrgId(1);
        $entitlementVO->setDepartmentId($request->input('department'));
        // $entitlementVO->setBranchId($request->input('branch'));
        $entitlementVO->setDesignationId($request->input('designation'));
        $entitlementVO->setEntitlement($request->input('entitlements'));
        $entitlementVO->setLeaveType($request->input('leavetype'));
        if($entitlementVO->getEntitlementId() <= 0 || $entitlementVO->getEntitlementId() == '') {
            $entitlementVO->setCreatedBy($this->getUserName());

            $entitlementModel->addEntitlements($entitlementVO);
            if ($entitlementVO->getError()) {
                return $this->getMessageWithRedirect($entitlementVO->getErrorCode());
            } else {
                // dd('hello');
                session::flash('entitlement', "Entitlement Added Successfully");
                // return redirect('hr/entitlements/');
                return redirect()->back();
            }
        }
        else{
            $entitlementVO->setModifiedBy($this->getUserName());
            $entitlementVO->setModifiedAt($this->getTimeStamp());
            $entitlementModel->updateEntitlements($entitlementVO);
            session::flash('entitlement', "Entitlement Updated Successfully");
            return redirect()->back();
            // return redirect('hr/entitlements/');

        }
    }

}