<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/28/2017
 * Time: 2:31 PM
 */

namespace App\Models\HumanResource\Settings;


use App\Models\BaseModel;
use App\Vos\HumanResourceVOS\DepartmentVO;

class DepartmentModel extends BaseModel
{
    protected $primaryKey = 'DEPARTMENT_ID';
    protected $table = 'hrm_departments';
    protected $fillable = ['ORG_ID','DEPARTMENT_NAME','EMPLOYEE_TYPE','DESCRIPTION'];

    public function saveDepartmentInfo(DepartmentVO $departmentVO)
    {
        $result = $this->select()->where([['DEPARTMENT_NAME', '=',$departmentVO->getDepartmentName()],['EMPLOYEE_TYPE', '=',$departmentVO->getDepartmentType()]])->get();
        if (count($result) > 0) {
            $departmentVO->setErrorResponse(true, '0000022');
        } else {
            $this->ORG_ID = $departmentVO->getOrgId();
            // $this->BRANCH_ID = $departmentVO->getBranchId();
            $this->DEPARTMENT_NAME = $departmentVO->getDepartmentName();
            $this->EMPLOYEE_TYPE = $departmentVO->getDepartmentType();
            $this->DESCRIPTION = $departmentVO->getDescription();
            $this->CREATED_BY = $departmentVO->getCreatedBy();
            $this->save();
        }
    }
    public function updateDepartmentInfo(DepartmentVO $departmentVO)
    {
        $this->where('DEPARTMENT_ID',$departmentVO->getDepartmentId())
            ->update([  'ORG_ID'=>$departmentVO->getOrgId(),
                        // 'BRANCH_ID'=>$departmentVO->getBranchId(),
                        'DEPARTMENT_NAME'=>$departmentVO->getDepartmentName(),
                        'EMPLOYEE_TYPE'=>$departmentVO->getDepartmentType(),
                        'DESCRIPTION'=>$departmentVO->getDescription(),
                        'UPDATED_BY' => $departmentVO->getModifiedBy(),
                        'UPDATED_AT' => $departmentVO->getModifiedAt()]);
    }

    public function loadDepartments()
    {
        $departments = $this->select('DEPARTMENT_NAME','DEPARTMENT_ID')->get();
        return $departments;

    }
}