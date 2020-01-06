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
 * Product Name: IntelliJ IDEA.
 * Developer Name: by nayab on 07-Aug-17 / 2:10 PM
 * All information contained herein is, and remains
 * the property of Prosigns Technologies
 */

namespace App\Http\Vos;

use App\Vos\BaseVO;

class UserVO extends BaseVO
{
    protected $orgId;
    protected $orgName;
    protected $branchId;
    protected $branchName;
    protected $branchCode;
    protected $userRoleId;
    protected $userRoleName;
    protected $employeeId;
    protected $employeeName;
    protected $picture;
    protected $userId;
    protected $username;
    protected $password;
    protected $orgStatus;
    protected $branchStatus;
    protected $roleStatus;
    protected $employeeStatus;
    protected $userStatus;

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
    public function getOrgName()
    {
        return $this->orgName;
    }

    /**
     * @param mixed $orgName
     */
    public function setOrgName($orgName)
    {
        $this->orgName = $orgName;
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
    public function getBranchName()
    {
        return $this->branchName;
    }

    /**
     * @param mixed $branchName
     */
    public function setBranchName($branchName)
    {
        $this->branchName = $branchName;
    }

    /**
     * @return mixed
     */
    public function getBranchCode()
    {
        return $this->branchCode;
    }

    /**
     * @param mixed $branchCode
     */
    public function setBranchCode($branchCode)
    {
        $this->branchCode = $branchCode;
    }

    /**
     * @return mixed
     */
    public function getUserRoleId()
    {
        return $this->userRoleId;
    }

    /**
     * @param mixed $userRoleId
     */
    public function setUserRoleId($userRoleId)
    {
        $this->userRoleId = $userRoleId;
    }

    /**
     * @return mixed
     */
    public function getUserRoleName()
    {
        return $this->userRoleName;
    }

    /**
     * @param mixed $userRoleName
     */
    public function setUserRoleName($userRoleName)
    {
        $this->userRoleName = $userRoleName;
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
    public function getEmployeeName()
    {
        return $this->employeeName;
    }

    /**
     * @param mixed $employeeName
     */
    public function setEmployeeName($employeeName)
    {
        $this->employeeName = $employeeName;
    }

    /**
     * @return mixed
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param mixed $picture
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getOrgStatus()
    {
        return $this->orgStatus;
    }

    /**
     * @param mixed $orgStatus
     */
    public function setOrgStatus($orgStatus)
    {
        $this->orgStatus = $orgStatus;
    }

    /**
     * @return mixed
     */
    public function getBranchStatus()
    {
        return $this->branchStatus;
    }

    /**
     * @param mixed $branchStatus
     */
    public function setBranchStatus($branchStatus)
    {
        $this->branchStatus = $branchStatus;
    }

    /**
     * @return mixed
     */
    public function getRoleStatus()
    {
        return $this->roleStatus;
    }

    /**
     * @param mixed $roleStatus
     */
    public function setRoleStatus($roleStatus)
    {
        $this->roleStatus = $roleStatus;
    }

    /**
     * @return mixed
     */
    public function getEmployeeStatus()
    {
        return $this->employeeStatus;
    }

    /**
     * @param mixed $employeeStatus
     */
    public function setEmployeeStatus($employeeStatus)
    {
        $this->employeeStatus = $employeeStatus;
    }

    /**
     * @return mixed
     */
    public function getUserStatus()
    {
        return $this->userStatus;
    }

    /**
     * @param mixed $userStatus
     */
    public function setUserStatus($userStatus)
    {
        $this->userStatus = $userStatus;
    }
}