<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/8/2017
 * Time: 10:31 AM
 */

namespace App\Vos\RegistrationVOS;
use App\Vos\BaseVO;

class StudentVO extends BaseVO
{
    protected $OrgId;
    protected $BranchId;
    protected $StudentId;
    protected $studentCode;
    protected $RollNo;
    protected $Class;
    protected $bayForm;
    protected $Section;
    protected $FullName;
    protected $StudentPic;
    protected $gender;
    protected $DOB;
    protected $Guardianstudentid;
    protected $Religion;
    protected $BirthPlace;
    protected $Nationality;
    protected $CurrentAddress;
    protected $PermanentAddress;
    protected $HomeLandLine;
    protected $RegisterDate;
    protected $EmgName;
    protected $EmgRelation;
    protected $EmgMobile;
    protected $EmgLandline;
    protected $EmgAddress;
    protected $HostelId;
    protected $status;
    protected $concessionType;
    protected $concession;
    protected $month;
    protected $donorId;

    /**
     * @return mixed
     */
    public function getDonorId()
    {
        return $this->donorId;
    }

    /**
     * @param mixed $donorId
     */
    public function setDonorId($donorId)
    {
        $this->donorId = $donorId;
    }

    public function getMonth()
    {
        return $this->month;
    }

    /**
     * @param mixed $donorId
     */
    public function setMonth($month)
    {
        $this->month = $month;
    }

    /**
     * @return mixed
     */
    public function getConcessionType()
    {
        return $this->concessionType;
    }

    /**
     * @param mixed $concessionType
     */
    public function setConcessionType($concessionType)
    {
        $this->concessionType = $concessionType;
    }

    /**
     * @return mixed
     */
    public function getConcession()
    {
        return $this->concession;
    }

    /**
     * @param mixed $concession
     */
    public function setConcession($concession)
    {
        $this->concession = $concession;
    }



    /**
     * @return mixed
     */
    public function getGuardianstudentid()
    {
        return $this->Guardianstudentid;
    }

    /**
     * @param mixed $Guardianstudentid
     */
    public function setGuardianstudentid($Guardianstudentid)
    {
        $this->Guardianstudentid = $Guardianstudentid;
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
    public function getBayForm()
    {
        return $this->bayForm;
    }

    /**
     * @param mixed $bayForm
     */
    public function setBayForm($bayForm)
    {
        $this->bayForm = $bayForm;
    }

    /**
     * @return mixed
     */
    public function getHostelId()
    {
        return $this->HostelId;
    }

    /**
     * @param mixed $HostelId
     */
    public function setHostelId($HostelId)
    {
        $this->HostelId = $HostelId;
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
    public function getEmgName()
    {
        return $this->EmgName;
    }

    /**
     * @param mixed $EmgName
     */
    public function setEmgName($EmgName)
    {
        $this->EmgName = $EmgName;
    }

    /**
     * @return mixed
     */
    public function getEmgRelation()
    {
        return $this->EmgRelation;
    }

    /**
     * @param mixed $EmgRelation
     */
    public function setEmgRelation($EmgRelation)
    {
        $this->EmgRelation = $EmgRelation;
    }

    /**
     * @return mixed
     */
    public function getEmgMobile()
    {
        return $this->EmgMobile;
    }

    /**
     * @param mixed $EmgMobile
     */
    public function setEmgMobile($EmgMobile)
    {
        $this->EmgMobile = $EmgMobile;
    }

    /**
     * @return mixed
     */
    public function getEmgLandline()
    {
        return $this->EmgLandline;
    }

    /**
     * @param mixed $EmgLandline
     */
    public function setEmgLandline($EmgLandline)
    {
        $this->EmgLandline = $EmgLandline;
    }

    /**
     * @return mixed
     */
    public function getEmgAddress()
    {
        return $this->EmgAddress;
    }

    /**
     * @param mixed $EmgAddress
     */
    public function setEmgAddress($EmgAddress)
    {
        $this->EmgAddress = $EmgAddress;
    }

    /**
     * @return mixed
     */
    public function getRollNo()
    {
        return $this->RollNo;
    }

    /**
     * @param mixed $RollNo
     */
    public function setRollNo($RollNo)
    {
        $this->RollNo = $RollNo;
    }

    /**
     * @return mixed
     */
    public function getClass()
    {
        return $this->Class;
    }

    /**
     * @param mixed $Class
     */
    public function setClass($Class)
    {
        $this->Class = $Class;
    }

    /**
     * @return mixed
     */
    public function getSection()
    {
        return $this->Section;
    }

    /**
     * @param mixed $Section
     */
    public function setSection($Section)
    {
        $this->Section = $Section;
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
    public function getStudentCode()
    {
        return $this->studentCode;
    }

    /**
     * @param mixed $studentCode
     */
    public function setStudentCode($studentCode)
    {
        $this->studentCode = $studentCode;
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
    public function getStudentPic()
    {
        return $this->StudentPic;
    }

    /**
     * @param mixed $StudentPic
     */
    public function setStudentPic($StudentPic)
    {
        $this->StudentPic = $StudentPic;
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
    public function getDOB()
    {
        return $this->DOB;
    }

    /**
     * @param mixed $DOB
     */
    public function setDOB($DOB)
    {
        $this->DOB = $DOB;
    }

    /**
     * @return mixed
     */
    public function getReligion()
    {
        return $this->Religion;
    }

    /**
     * @param mixed $Religion
     */
    public function setReligion($Religion)
    {
        $this->Religion = $Religion;
    }

    /**
     * @return mixed
     */
    public function getBirthPlace()
    {
        return $this->BirthPlace;
    }

    /**
     * @param mixed $BirthPlace
     */
    public function setBirthPlace($BirthPlace)
    {
        $this->BirthPlace = $BirthPlace;
    }

    /**
     * @return mixed
     */
    public function getNationality()
    {
        return $this->Nationality;
    }

    /**
     * @param mixed $Nationality
     */
    public function setNationality($Nationality)
    {
        $this->Nationality = $Nationality;
    }

    /**
     * @return mixed
     */
    public function getCurrentAddress()
    {
        return $this->CurrentAddress;
    }

    /**
     * @param mixed $CurrentAddress
     */
    public function setCurrentAddress($CurrentAddress)
    {
        $this->CurrentAddress = $CurrentAddress;
    }

    /**
     * @return mixed
     */
    public function getPermanentAddress()
    {
        return $this->PermanentAddress;
    }

    /**
     * @param mixed $PermanentAddress
     */
    public function setPermanentAddress($PermanentAddress)
    {
        $this->PermanentAddress = $PermanentAddress;
    }

    /**
     * @return mixed
     */
    public function getHomeLandLine()
    {
        return $this->HomeLandLine;
    }

    /**
     * @param mixed $HomeLandLine
     */
    public function setHomeLandLine($HomeLandLine)
    {
        $this->HomeLandLine = $HomeLandLine;
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

}