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
 * Date: 8/9/2017
 * Time: 5:08 PM
 */

namespace App\Vos\RegistrationVOS;


use App\Vos\BaseVO;

class GuardiansVO extends BaseVO
{
    protected $GuardianId;
    protected $OrgId;
    protected $BranchId;
    protected $StudentId;
    protected $FullName;
    protected $Relation;
    protected $cnic;
    protected $email;
    protected $CellPhone;
    protected $Landline;
    protected $occupation;
    protected $JobTitle;
    protected $BusinessName;
    protected $BusinessAddress;
    protected $RegistrationDate;

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getGuardianId()
    {
        return $this->GuardianId;
    }

    /**
     * @param mixed $GuardianId
     */
    public function setGuardianId($GuardianId)
    {
        $this->GuardianId = $GuardianId;
    }

    /**
     * @return mixed
     */
    public function getOrgId()
    {
        return $this->OrgId;
    }

    /**
     * @param mixed $OrgId
     */
    public function setOrgId($OrgId)
    {
        $this->OrgId = $OrgId;
    }

    /**
     * @return mixed
     */
    public function getBranchId()
    {
        return $this->BranchId;
    }

    /**
     * @param mixed $BranchId
     */
    public function setBranchId($BranchId)
    {
        $this->BranchId = $BranchId;
    }

    /**
     * @return mixed
     */
    public function getStudentId()
    {
        return $this->StudentId;
    }

    /**
     * @param mixed $StudentId
     */
    public function setStudentId($StudentId)
    {
        $this->StudentId = $StudentId;
    }

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->FullName;
    }

    /**
     * @param mixed $FullName
     */
    public function setFullName($FullName)
    {
        $this->FullName = $FullName;
    }

    /**
     * @return mixed
     */
    public function getRelation()
    {
        return $this->Relation;
    }

    /**
     * @param mixed $Relation
     */
    public function setRelation($Relation)
    {
        $this->Relation = $Relation;
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
    public function getCellPhone()
    {
        return $this->CellPhone;
    }

    /**
     * @param mixed $CellPhone
     */
    public function setCellPhone($CellPhone)
    {
        $this->CellPhone = $CellPhone;
    }

    /**
     * @return mixed
     */
    public function getLandline()
    {
        return $this->Landline;
    }

    /**
     * @param mixed $Landline
     */
    public function setLandline($Landline)
    {
        $this->Landline = $Landline;
    }

    /**
     * @return mixed
     */
    public function getOccupation()
    {
        return $this->occupation;
    }

    /**
     * @param mixed $occupation
     */
    public function setOccupation($occupation)
    {
        $this->occupation = $occupation;
    }

    /**
     * @return mixed
     */
    public function getJobTitle()
    {
        return $this->JobTitle;
    }

    /**
     * @param mixed $JobTitle
     */
    public function setJobTitle($JobTitle)
    {
        $this->JobTitle = $JobTitle;
    }

    /**
     * @return mixed
     */
    public function getBusinessName()
    {
        return $this->BusinessName;
    }

    /**
     * @param mixed $BusinessName
     */
    public function setBusinessName($BusinessName)
    {
        $this->BusinessName = $BusinessName;
    }

    /**
     * @return mixed
     */
    public function getBusinessAddress()
    {
        return $this->BusinessAddress;
    }

    /**
     * @param mixed $BusinessAddress
     */
    public function setBusinessAddress($BusinessAddress)
    {
        $this->BusinessAddress = $BusinessAddress;
    }

    /**
     * @return mixed
     */
    public function getRegistrationDate()
    {
        return $this->RegistrationDate;
    }

    /**
     * @param mixed $RegistrationDate
     */
    public function setRegistrationDate($RegistrationDate)
    {
        $this->RegistrationDate = $RegistrationDate;
    }
}