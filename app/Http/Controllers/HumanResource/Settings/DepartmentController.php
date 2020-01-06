<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/28/2017
 * Time: 2:09 PM
 */

namespace App\Http\Controllers\HumanResource\Settings;


use App\Http\Controllers\BaseController;
use App\Models\HumanResource\Settings\DepartmentModel;
use App\Vos\HumanResourceVOS\DepartmentVO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DepartmentController extends BaseController
{
    public function loadView()
    {
        return view('HumanResource.Settings.departments');
    }

    public function add(Request $request)
    {
        $departmentVO = new DepartmentVO();
        $departmentVO->setDepartmentId($request->input('primary'));
        $departmentVO->setOrgId(1);
        $departmentVO->setBranchId($request->input('branch'));
        $departmentVO->setDepartmentName($request->input('departmentname'));
        $departmentVO->setDepartmentType($request->input('departmenttype'));
        $departmentVO->setDescription($request->input('description'));
        $departmentModel = new DepartmentModel();
        if($departmentVO->getDepartmentId() <= 0 || $departmentVO->getDepartmentId() == '') {
            $departmentVO->setCreatedBy($this->getUserName());
            $departmentModel->saveDepartmentInfo($departmentVO);
            if ($departmentVO->getError()) {
                return $this->getMessageWithRedirect($departmentVO->getErrorCode());
            } else {
                Session::flash('department', "Department Added Successfully");
                return redirect('hr/settings/departments');
            }
        }
        else
        {
            $departmentVO->setModifiedBy($this->getUserName());
            $departmentVO->setModifiedAt($this->getTimeStamp());
            $departmentModel->updateDepartmentInfo($departmentVO);
            Session::flash('department', "Department Updated Successfully");
            return redirect('hr/settings/departments');
        }
    }

}