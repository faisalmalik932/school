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
 * Developer Name: by nayab on 07-Aug-17 / 2:31 PM
 * All information contained herein is, and remains
 * the property of Prosigns Technologies
 */

namespace App\Vos\BranchVOS;

use App\Vos\BaseVO;

class BranchVO extends BaseVO
{

    protected $BranchId;
    protected $BranchCode;
    protected $OrgId;
    protected $BranchName;
    protected $CountryId;
    protected $CityID;
    protected $StateId;
    protected $Address;
    protected $Landline;
    protected $FaxNumb;
    protected $Email;
    protected $BranchType;
    protected $BranchLevel;
    protected $Description;
    protected $RegisterDate;
    protected $Status;
    protected $startDate;
    protected $endDate;
    protected $branchLogo;
    protected $bankId;


    /**
     * @return mixed
     */
    public function getBranchLogo()
    {
        return $this->branchLogo;
    }

    /**
     * @param mixed $branchLogo
     */
    public function setBranchLogo($branchLogo)
    {
        $this->branchLogo = $branchLogo;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }



     /**
     * @return mixed
     */
    public function getBankId()
    {
        return $this->bankId;
    }

    /**
     * @param mixed $branchName
     */
    public function setBankId($bankId)
    {
        $this->bankId = $bankId;
    }


     /**
     * @return mixed
     */
    public function getBankId()
    {
        return $this->bankId;
    }

    /**
     * @param mixed $branchName
     */
    public function setBankId($bankId)
    {
        $this->bankId = $bankId;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param mixed $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
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




    public function getConcession()
    {
        return $this->concession;
    }

    /**
     * @param mixed $hostelId
     */
    public function setConcession($concession)
    {
        $this->concession = $concession;
    }




    /**
     * @return mixed
     */
    public function getBranchCode()
    {
        return $this->BranchCode;
    }

    /**
     * @param mixed $BranchCode
     */
    public function setBranchCode($BranchCode)
    {
        $this->BranchCode = $BranchCode;
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
    public function getBranchName()
    {
        return $this->BranchName;
    }

    /**
     * @param mixed $BranchName
     */
    public function setBranchName($BranchName)
    {
        $this->BranchName = $BranchName;
    }

    /**
     * @return mixed
     */
    public function getCountryId()
    {
        return $this->CountryId;
    }

    /**
     * @param mixed $CountryId
     */
    public function setCountryId($CountryId)
    {
        $this->CountryId = $CountryId;
    }

    /**
     * @return mixed
     */
    public function getCityID()
    {
        return $this->CityID;
    }

    /**
     * @param mixed $CityID
     */
    public function setCityID($CityID)
    {
        $this->CityID = $CityID;
    }

    /**
     * @return mixed
     */
    public function getStateId()
    {
        return $this->StateId;
    }

    /**
     * @param mixed $StateId
     */
    public function setStateId($StateId)
    {
        $this->StateId = $StateId;
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
    public function getFaxNumb()
    {
        return $this->FaxNumb;
    }

    /**
     * @param mixed $FaxNumb
     */
    public function setFaxNumb($FaxNumb)
    {
        $this->FaxNumb = $FaxNumb;
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
    public function getBranchType()
    {
        return $this->BranchType;
    }

    /**
     * @param mixed $BranchType
     */
    public function setBranchType($BranchType)
    {
        $this->BranchType = $BranchType;
    }

    /**
     * @return mixed
     */
    public function getBranchLevel()
    {
        return $this->BranchLevel;
    }

    /**
     * @param mixed $BranchLevel
     */
    public function setBranchLevel($BranchLevel)
    {
        $this->BranchLevel = $BranchLevel;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->Type;
    }

    /**
     * @param mixed $Description
     */
    public function setType($Type)
    {
        $this->Type = $Type;
    }

    /**
     * @return mixed
     */
    public function getRegisterDate()
    {
        return $this->RegisterDate;
    }

    /**
     * @param mixed $RegisterDate
     */
    public function setRegisterDate($RegisterDate)
    {
        $this->RegisterDate = $RegisterDate;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->Status;
    }

    /**
     * @param mixed $Status
     */
    public function setStatus($Status)
    {
        $this->Status = $Status;
    }

    /**
     * @return mixed
     */
    public function getFeefine()
    {
        return $this->Feefine;
    }

    /**
     * @param mixed $fine
     */
    public function setFeefine($Feefine)
    {
        $this->Feefine = $Feefine;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * @param mixed $Description
     */
    public function setDescription($Description)
    {
        $this->Description = $Description;
    }
}