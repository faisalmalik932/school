<?php

namespace App\Models\HumanResource;

use App\Vos\HumanResourceVOS\EmployeeVO;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class EmployeeModel extends BaseModel
{
    protected $primaryKey = 'EMPLOYEE_ID';
    protected $table = 'hrm_employees_info';
    protected $fillable = ['ORG_ID','BRANCH_ID','JOB_STATUS_ID','DEPARTMENT_ID','EMPLOYEE_TYPE','TITLE_ID','EMPLOYEE_CODE','FULL_NAME','FATHER_NAME','CURRENT_ADDRESS',
                            'PERMANENT_ADDRESS','MOBILE_NUMBER','HOME_NUMBER','GENDER','DOB','PERSONAL_EMAIL','OFFICIAL_EMAIL',
                            'CNIC','EMPLOYEE_SALARY','REFERENCE_NAME','EMP_PICTURE','STATUS','JOINING_DATE','TERMINATION_TYPE',
                            'TERMINATION_REASON','TERMINATION_DATE',];

    public function saveEmployeeInfo(EmployeeVO $employeeVO)
    {
        $result = $this->select()->where('CNIC', '=', $employeeVO->getCnic())->orWhere('EMPLOYEE_CODE' , '=' , $employeeVO->getEmployeeCode())->get();
        if (count($result) > 0) {
            $employeeVO->setErrorResponse(true, '000008');
        } else {
            $this->ORG_ID = $employeeVO->getOrgId();
            $this->BRANCH_ID = $employeeVO->getBranchId();
            $this->EMPLOYEE_CODE = $employeeVO->getEmployeeCode();
            $this->DEPARTMENT_ID = $employeeVO->getDepartmentId();
            $this->EMPLOYEE_TYPE = $employeeVO->getEmployeeType();
            $this->FULL_NAME = $employeeVO->getFullName();
            $this->FATHER_NAME = $employeeVO->getFatherName();
            $this->CURRENT_ADDRESS = $employeeVO->getCurrAddress();
            $this->PERMANENT_ADDRESS = $employeeVO->getPermAddress();
            $this->MOBILE_NUMBER = $employeeVO->getMobileNumber();
            $this->HOME_NUMBER = $employeeVO->getHomeNumber();
            $this->GENDER = $employeeVO->getGender();
            $this->DOB = $employeeVO->getDob();
            $this->PERSONAL_EMAIL = $employeeVO->getPersonalEmail();
            $this->OFFICIAL_EMAIL = $employeeVO->getOfficialEmail();
            $this->CNIC = $employeeVO->getCnic();
            $this->REFERENCE_NAME = $employeeVO->getReference();
            $this->TITLE_ID = $employeeVO->getDesignation();
            $this->EMP_PICture = $employeeVO->getEmpPic();
            $this->STATUS = $employeeVO->getStatus();
            $this->EMPLOYEE_SALARY = $employeeVO->getEmployeeSalary();
            $this->JOINING_DATE = $employeeVO->getJoinDate();
            $this->TERMINATION_TYPE = $employeeVO->getTerminationType();
            $this->TERMINATION_REASON = $employeeVO->getTerminationReason();
            $this->JOB_STATUS_ID = $employeeVO->getJobStatusId();
            $this->TERMINATION_DATE = $employeeVO->getTerminationDate();
            $this->CREATED_BY = $employeeVO->getCreatedBy();
            $this->save();
        }

    }

    public function updateEmployeeInfo(EmployeeVO $employeeVO)
    {

        $this->where('EMPLOYEE_ID',$employeeVO->getEmployeeId())
        ->update(['BRANCH_ID'=>$employeeVO->getBranchId(),
                    'DEPARTMENT_ID'=>$employeeVO->getDepartmentId(),
                    'EMPLOYEE_TYPE'=>$employeeVO->getEmployeeType(),
                    'EMPLOYEE_CODE'=>$employeeVO->getEmployeeCode(),
                    'FULL_NAME'=>$employeeVO->getFullName(),
                    'FATHER_NAME'=> $employeeVO->getFatherName(),
                    'CURRENT_ADDRESS'=>$employeeVO->getCurrAddress(),
                    'PERMANENT_ADDRESS'=>$employeeVO->getPermAddress(),
                    'MOBILE_NUMBER'=>$employeeVO->getMobileNumber(),
                    'HOME_NUMBER'=>   $employeeVO->getHomeNumber(),
                    'GENDER'=>$employeeVO->getGender(),
                    'DOB'=>$employeeVO->getDob(),
                    'PERSONAL_EMAIL'=> $employeeVO->getPersonalEmail(),
                    'OFFICIAL_EMAIL'=>$employeeVO->getOfficialEmail(),
                    'CNIC'=>$employeeVO->getCnic(),
                    'REFERENCE_NAME'=>$employeeVO->getReference(),
                    'TITLE_ID'=> $employeeVO->getDesignation(),
                    'EMP_PICTURE'=>$employeeVO->getEmpPic(),
                    'STATUS'=>$employeeVO->getStatus(),
                    'JOINING_DATE'=>$employeeVO->getJoinDate(),
                    'JOB_STATUS_ID'=>$employeeVO->getJobStatusId(),
                    'TERMINATION_TYPE'=>$employeeVO->getTerminationType(),
                    'TERMINATION_REASON'=>$employeeVO->getTerminationReason(),
                    'TERMINATION_DATE'=>$employeeVO->getTerminationDate(),
                    'UPDATED_BY' => $employeeVO->getModifiedBy(),
                    'UPDATED_AT' => $employeeVO->getModifiedAt()]);
    }

    public function employeeReport(EmployeeVO $employeeVO)
    {
        $employee = $this->where('EMPLOYEE_ID',$employeeVO->getEmployeeId())->orwhere('FULL_NAME',$employeeVO->getEmployeeId())
        ->orWhere('TITLE_ID',$employeeVO->getEmployeeId())
        ->get();
        return $employee;

    }

    public function loadEmployees()
    {
        $employees = $this->select('EMPLOYEE_ID','FULL_NAME')->get();
        return $employees;
    }

    public function totalEmployees($orgid, $branchid, $branchtype) {
        return $this->count();
    }

    public function getEmployeeProfile(EmployeeVO $employeeVO)
    {
        $employee = $this->where('EMPLOYEE_ID',$employeeVO->getEmployeeId())
            ->get();
        return $employee;

    }

}
