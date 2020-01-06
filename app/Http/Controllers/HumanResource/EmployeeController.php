<?php

namespace App\Http\Controllers\HumanResource;

use App\Http\Controllers\BaseController;
use App\Models\HumanResource\EmployeeModel;
use App\Models\HumanResource\Settings\DepartmentModel;
use App\Models\HumanResource\Settings\EmploymentStatusModel;
use App\Models\HumanResource\Settings\JobCategoryModel;
use App\Models\HumanResource\Settings\JobTitlesModel;
use App\Vos\HumanResourceVOS\EmployeeVO;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class EmployeeController extends BaseController
{
    public function loadView()
    {
        $employmentStatusModal = new EmploymentStatusModel();
        $employmentStatus = $employmentStatusModal->getJobStatus();
        $departmentModel = new DepartmentModel();
        $departments = $departmentModel->loadDepartments();
        $jobTitleModel = new JobTitlesModel();
        $jobTitle = $jobTitleModel->getjobstatus();
        return view('HumanResource.Employees.employees')->with('department',$departments)->with('title',$jobTitle)
            ->with('employmentStatus',$employmentStatus);
    }

    public function add(Request $request)
    {        
        $validator = \Validator::make($request->all(), [
            'employesalary' => 'integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $date = new \Carbon\Carbon($request->join_date);
        if(isset($request->official_email) && isset($request->personal_email)){
            if($request->official_email == $request->personal_email){
                session::flash('employee', __('messages.email-duplicate'));
                return redirect()->back();
            }
        }
            $employeeVO = new EmployeeVO();
            $employeeVO->setEmployeeId($request->input('primary'));
            $employeeVO->setOrgId('1');
            $employeeVO->setBranchId($request->input('branch'));
            $employeeVO->setEmployeeCode($request->input('code'));
            $employeeVO->setUserRoleId( request()->session()->get('USER_ROLE_ID'));
            $employeeVO->setDepartmentId($request->input('department'));
            $employeeVO->setEmployeetype($request->input('employeetype'));
            $employeeVO->setFullName($request->input('fullname'));
            $employeeVO->setFatherName($request->input('fathername'));
            $employeeVO->setCurrAddress($request->input('curr_add'));
            $employeeVO->setPermAddress($request->input('perm_add'));
            $employeeVO->setMobileNumber($request->input('mobile'));
            $employeeVO->setHomeNumber($request->input('home_phone'));
            $employeeVO->setGender($request->input('gender'));
            $dob = date_check_format($request->input('birthDate'));
            $employeeVO->setDob($dob);
            $employeeVO->setPersonalEmail($request->input('personal_email'));
            $employeeVO->setOfficialEmail($request->input('official_email'));
            $employeeVO->setCnic($request->input('cnic'));
            $employeeVO->setJobStatusId($request->input('jobStatus'));
            $file = $request->file('image');
            if(!empty($file)){
            // if(count($file)>0){
            $destination = base_path() . '/uploads/employees/';
            $guessFileExtension = $request->file('image')->guessExtension();

            if(check_image_format($guessFileExtension)){
            $file->move($destination, $request->fullname . '.' . $guessFileExtension);
            $employeeVO->setEmpPic($request->fullname . '.' . $guessFileExtension);
                 }
                 else{
                session::flash('branch',  __('messages.image-format'));
                return redirect()->back();
                 }
            }

            else {
            $employeeVO->setEmpPic($request->input('updatedPic'));
            }
            $employeeVO->setReference($request->input('ref_name'));
            $employeeVO->setDesignation($request->input('designation'));
            $employeeVO->setStatus($request->input('status'));
            $employeeVO->setJoinDate($date);
            $employeeVO->setTerminationType($request->input('ter_type'));
            $employeeVO->setTerminationReason($request->input('ter_reason'));
            $employeeVO->setEmployeeSalary($request->input('employesalary'));
            $employeeVO->setTerminationDate($request->input('ter_date'));
            $employeeModel = new EmployeeModel();
            // dd($employeeVO);
            if($employeeVO->getEmployeeId() <= 0 || $employeeVO->getEmployeeId() == '') {
                $employeeVO->setCreatedBy($this->getUserName());
                $check = $employeeModel->saveEmployeeInfo($employeeVO);
                if ($employeeVO->getError()) {
                    return $this->getMessageWithRedirect($employeeVO->getErrorCode());
                } else {
                    session::flash('employee', "Employee Record Added Successfully");
                    return redirect('hr/employees/add');
                }
            }
            else{
                $employeeVO->setModifiedBy($this->getUserName());
                $employeeVO->setModifiedAt($this->getTimeStamp());
                $employeeModel->updateEmployeeInfo($employeeVO);
                session::flash('employee', "Employee Record Updated Successfully");
                return redirect('hr/employees/add');
            }
    }
    public function showEmployees()
    {
        return view('HumanResource.showEmployees');
    }
}
