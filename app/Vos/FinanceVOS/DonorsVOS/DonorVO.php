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
 * Time: 1:30 PM
 */

namespace App\Vos\FinanceVOS\DonorsVOS;


use App\Vos\BaseVO;

class DonorVO extends BaseVO
{
    protected $OrgId;
    protected $BranchId;
    protected $StudentId;
    protected $DonorId;
    protected $DonorName;
    protected $gender;
    protected $Nic;
    protected $siblings;
    protected $country;
    protected $state;
    protected $city;
    protected $zipCode;
    protected $MobileNumber;
    protected $Email;
    protected $Address;
    protected $DonorType;
    protected $DonorCategory;
    protected $EmergencyContactName;
    protected $EmergencyContactNumber;
    protected $classId;

    /**
     * @return mixed
     */
    public function getClassId()
    {
        return $this->classId;
    }

    /**
     * @param mixed $classId
     */
    public function setClassId($classId)
    {
        $this->classId = $classId;
    }

    /**
     * @return mixed
     */
    public function getDonorType()
    {
        return $this->DonorType;
    }

    /**
     * @param mixed $DonorType
     */
    public function setDonorType($DonorType)
    {
        $this->DonorType = $DonorType;
    }

    /**
     * @return mixed
     */
    public function getNic()
    {
        return $this->Nic;
    }

    /**
     * @param mixed $Nic
     */
    public function setNic($Nic)
    {
        $this->Nic = $Nic;
    }

    /**
     * @return mixed
     */
    public function getSiblings()
    {
        return $this->siblings;
    }

    /**
     * @param mixed $siblings
     */
    public function setSiblings($siblings)
    {
        $this->siblings = $siblings;
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
    public function getDonorId()
    {
        return $this->DonorId;
    }

    /**
     * @param mixed $DonorId
     */
    public function setDonorId($DonorId)
    {
        $this->DonorId = $DonorId;
    }

    /**
     * @return mixed
     */
    public function getDonorName()
    {
        return $this->DonorName;
    }

    /**
     * @param mixed $DonorName
     */
    public function setDonorName($DonorName)
    {
        $this->DonorName = $DonorName;
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
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @param mixed $zipCode
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
    }

    /**
     * @return mixed
     */
    public function getMobileNumber()
    {
        return $this->MobileNumber;
    }

    /**
     * @param mixed $MobileNumber
     */
    public function setMobileNumber($MobileNumber)
    {
        $this->MobileNumber = $MobileNumber;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * @param mixed $Email
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->Address;
    }

    /**
     * @param mixed $Address
     */
    public function setAddress($Address)
    {
        $this->Address = $Address;
    }

    /**
     * @return mixed
     */
    public function getDonorCategory()
    {
        return $this->DonorCategory;
    }

    /**
     * @param mixed $DonorCategory
     */
    public function setDonorCategory($DonorCategory)
    {
        $this->DonorCategory = $DonorCategory;
    }

    /**
     * @return mixed
     */
    public function getEmergencyContactName()
    {
        return $this->EmergencyContactName;
    }

    /**
     * @param mixed $EmergencyContactName
     */
    public function setEmergencyContactName($EmergencyContactName)
    {
        $this->EmergencyContactName = $EmergencyContactName;
    }

    /**
     * @return mixed
     */
    public function getEmergencyContactNumber()
    {
        return $this->EmergencyContactNumber;
    }

    /**
     * @param mixed $EmergencyContactNumber
     */
    public function setEmergencyContactNumber($EmergencyContactNumber)
    {
        $this->EmergencyContactNumber = $EmergencyContactNumber;
    }

}