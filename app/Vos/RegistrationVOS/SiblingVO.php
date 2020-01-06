<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/15/2017
 * Time: 5:12 PM
 */

namespace App\Vos\RegistrationVOS;


use App\Vos\BaseVO;

class SiblingVO extends BaseVO
{

    protected $OrgID;
    protected $BranchId;
    protected $SiblingId;
    protected $StudentId;
    protected $GuardianId;
    protected $SiblingName;

    /**
     * @return mixed
     */
    public function getOrgID()
    {
        return $this->OrgID;
    }

    /**
     * @param mixed $OrgID
     */
    public function setOrgID($OrgID)
    {
        $this->OrgID = $OrgID;
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
    public function getSiblingId()
    {
        return $this->SiblingId;
    }

    /**
     * @param mixed $SiblingId
     */
    public function setSiblingId($SiblingId)
    {
        $this->SiblingId = $SiblingId;
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
    public function getSiblingName()
    {
        return $this->SiblingName;
    }

    /**
     * @param mixed $SiblingName
     */
    public function setSiblingName($SiblingName)
    {
        $this->SiblingName = $SiblingName;
    }

}