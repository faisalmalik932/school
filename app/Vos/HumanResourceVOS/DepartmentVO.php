<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/28/2017
 * Time: 2:12 PM
 */

namespace App\Vos\HumanResourceVOS;


use App\Vos\BaseVO;

class DepartmentVO extends BaseVO
{
    protected $departmentId;
    protected $branchId;
    protected $orgId;
    protected $departmentName;
    protected $description;
    protected $departmentType;

    /**
     * @return mixed
     */
    public function getDepartmentType()
    {
        return $this->departmentType;
    }

    /**
     * @param mixed $departmentType
     */
    public function setDepartmentType($departmentType)
    {
        $this->departmentType = $departmentType;
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
    public function getBranchId()
    {
        return $this->branchId;
    }

    /**
     * @param mixed $branchId
     */
    public function setBranchId($branchId)
    {
        $this->branchId = $branchId;
    }

    /**
     * @return mixed
     */
    public function getOrgId()
    {
        return $this->orgId;
    }

    /**
     * @param mixed $orgId
     */
    public function setOrgId($orgId)
    {
        $this->orgId = $orgId;
    }

    /**
     * @return mixed
     */
    public function getDepartmentName()
    {
        return $this->departmentName;
    }

    /**
     * @param mixed $departmentName
     */
    public function setDepartmentName($departmentName)
    {
        $this->departmentName = $departmentName;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }


}