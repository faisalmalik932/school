<?php
/**
 * ************************************************************************
 *  *
 *  * PROSIGNS CONFIDENTIAL
 *  * __________________
 *  *
 *  *  Copyright (c) 2017. Prosigns Technologies
 *  *  All Rights Reserved.
 *  *
 *  * NOTICE:  All information contained herein is, and remains
 *  * the property of Prosigns Technologies and its suppliers,
 *  * if any.  The intellectual and technical concepts contained
 *  * herein are proprietary to Prosigns Technologies
 *  * and its suppliers and may be covered by Pakistan and Foreign Patents,
 *  * patents in process, and are protected by trade secret or copyright law.
 *  * Dissemination of this information or reproduction of this material
 *  * is strictly forbidden unless prior written permission is obtained
 *  * from Prosigns Technologies.
 *
 */

/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/7/2017
 * Time: 5:19 PM
 */

namespace App\Vos\HumanResourceVOS;

use App\Vos\BaseVO;

class EmployeeVO extends BaseVO
{
    protected $orgId;
    protected $branchId;
    protected $employeeId;
    protected $UserRoleId;
    protected $employeeCode;
    protected $departmentId;
    protected $jobCategoryId;
    protected $fullName;
    protected $fatherName;
    protected $currAddress;
    protected $permAddress;
    protected $mobileNumber;
    protected $homeNumber;
    protected $gender;
    protected $dob;
    protected $personalEmail;
    protected $officialEmail;
    protected $cnic;
    protected $img;
    protected $reference;
    protected $employeeSalary;
    protected $designation;
    protected $empPic;
    protected $status;
    protected $joinDate;
    protected $terminationDate;
    protected $terminationType;
    protected $terminationReason;
    protected $employeeType;
    protected $jobStatusId;

    /**
     * @return mixed
     */
    public function getJobStatusId()
    {
        return $this->jobStatusId;
    }

    /**
     * @param mixed $jobStatusId
     */
    public function setJobStatusId($jobStatusId)
    {
        $this->jobStatusId = $jobStatusId;
    }

    /**
     * @return mixed
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * @param mixed $designation
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;
    }

    /**
     * @return mixed
     */
    public function getEmployeeType()
    {
        return $this->employeeType;
    }

    /**
     * @param mixed $employeeType
     */
    public function setEmployeetype($employeeType)
    {
        $this->employeeType = $employeeType;
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
    public function getJobCategoryId()
    {
        return $this->jobCategoryId;
    }

    /**
     * @param mixed $jobCategoryId
     */
    public function setJobCategoryId($jobCategoryId)
    {
        $this->jobCategoryId = $jobCategoryId;
    }

    /**
     * @return mixed
     */
    public function getEmployeeSalary()
    {
        return $this->employeeSalary;
    }

    /**
     * @param mixed $employeeSalary
     */
    public function setEmployeeSalary($employeeSalary)
    {
        $this->employeeSalary = $employeeSalary;
    }

    /**
     * @return mixed
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param mixed $img
     */
    public function setImg($img)
    {
        $this->img = $img;
    }

    /**
     * @return mixed
     */
    public function getUserRoleId()
    {
        return $this->UserRoleId;
    }

    /**
     * @param mixed $UserRoleId
     */
    public function setUserRoleId($UserRoleId)
    {
        $this->UserRoleId = $UserRoleId;
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
    public function getEmployeeId()
    {
        return $this->employeeId;
    }

    /**
     * @param mixed $employeeId
     */
    public function setEmployeeId($employeeId)
    {
        $this->employeeId = $employeeId;
    }

    /**
     * @return mixed
     */
    public function getEmployeeCode()
    {
        return $this->employeeCode;
    }

    /**
     * @param mixed $employeeCode
     */
    public function setEmployeeCode($employeeCode)
    {
        $this->employeeCode = $employeeCode;
    }

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param mixed $fullName
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

    /**
     * @return mixed
     */
    public function getFatherName()
    {
        return $this->fatherName;
    }

    /**
     * @param mixed $fatherName
     */
    public function setFatherName($fatherName)
    {
        $this->fatherName = $fatherName;
    }

    /**
     * @return mixed
     */
    public function getCurrAddress()
    {
        return $this->currAddress;
    }

    /**
     * @param mixed $currAddress
     */
    public function setCurrAddress($currAddress)
    {
        $this->currAddress = $currAddress;
    }

    /**
     * @return mixed
     */
    public function getPermAddress()
    {
        return $this->permAddress;
    }

    /**
     * @param mixed $permAddress
     */
    public function setPermAddress($permAddress)
    {
        $this->permAddress = $permAddress;
    }

    /**
     * @return mixed
     */
    public function getMobileNumber()
    {
        return $this->mobileNumber;
    }

    /**
     * @param mixed $mobileNumber
     */
    public function setMobileNumber($mobileNumber)
    {
        $this->mobileNumber = $mobileNumber;
    }

    /**
     * @return mixed
     */
    public function getHomeNumber()
    {
        return $this->homeNumber;
    }

    /**
     * @param mixed $homeNumber
     */
    public function setHomeNumber($homeNumber)
    {
        $this->homeNumber = $homeNumber;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * @param mixed $dob
     */
    public function setDob($dob)
    {
        $this->dob = $dob;
    }

    /**
     * @return mixed
     */
    public function getPersonalEmail()
    {
        return $this->personalEmail;
    }

    /**
     * @param mixed $personalEmail
     */
    public function setPersonalEmail($personalEmail)
    {
        $this->personalEmail = $personalEmail;
    }

    /**
     * @return mixed
     */
    public function getOfficialEmail()
    {
        return $this->officialEmail;
    }

    /**
     * @param mixed $officialEmail
     */
    public function setOfficialEmail($officialEmail)
    {
        $this->officialEmail = $officialEmail;
    }

    /**
     * @return mixed
     */
    public function getCnic()
    {
        return $this->cnic;
    }

    /**
     * @param mixed $cnic
     */
    public function setCnic($cnic)
    {
        $this->cnic = $cnic;
    }

    /**
     * @return mixed
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param mixed $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    /**
     * @return mixed
     */
    public function getEmpType()
    {
        return $this->empType;
    }

    /**
     * @param mixed $empType
     */
    public function setEmpType($empType)
    {
        $this->empType = $empType;
    }

    /**
     * @return mixed
     */
    public function getEmpPic()
    {
        return $this->empPic;
    }

    /**
     * @param mixed $empPic
     */
    public function setEmpPic($empPic)
    {
        $this->empPic = $empPic;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getJoinDate()
    {
        return $this->joinDate;
    }

    /**
     * @param mixed $joinDate
     */
    public function setJoinDate($joinDate)
    {
        $this->joinDate = $joinDate;
    }

    /**
     * @return mixed
     */
    public function getTerminationDate()
    {
        return $this->terminationDate;
    }

    /**
     * @param mixed $terminationDate
     */
    public function setTerminationDate($terminationDate)
    {
        $this->terminationDate = $terminationDate;
    }

    /**
     * @return mixed
     */
    public function getTerminationType()
    {
        return $this->terminationType;
    }

    /**
     * @param mixed $terminationType
     */
    public function setTerminationType($terminationType)
    {
        $this->terminationType = $terminationType;
    }

    /**
     * @return mixed
     */
    public function getTerminationReason()
    {
        return $this->terminationReason;
    }

    /**
     * @param mixed $terminationReason
     */
    public function setTerminationReason($terminationReason)
    {
        $this->terminationReason = $terminationReason;
    }

}