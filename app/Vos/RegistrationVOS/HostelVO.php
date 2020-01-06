<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/21/2017
 * Time: 11:23 AM
 */

namespace App\Vos\RegistrationVOS;


use App\Vos\BaseVO;

class HostelVO extends BaseVO
{

    protected $OrgId;
    protected $branchId;
    protected $branchName;
    protected $address;
    protected $hostelId;
    protected $hostelName;
    protected $hostelManager;
    protected $hostelType;

    /**
     * @return mixed
     */
    public function getHostelType()
    {
        return $this->hostelType;
    }

    /**
     * @param mixed $hostelType
     */
    public function setHostelType($hostelType)
    {
        $this->hostelType = $hostelType;
    }

    /**
     * @return mixed
     */
    public function getHostelManager()
    {
        return $this->hostelManager;
    }

    /**
     * @param mixed $hostelManager
     */
    public function setHostelManager($hostelManager)
    {
        $this->hostelManager = $hostelManager;
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
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
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
        return $this->branchId;
    }

    /**
     * @param mixed $branchId
     */
    public function setBranchId($branchId)
    {
        $this->branchId = $branchId;
    }


    public function getHostelId()
    {
        return $this->hostelId;
    }

    /**
     * @param mixed $hostelId
     */
    public function setHostelId($hostelId)
    {
        $this->hostelId = $hostelId;
    }

    /**
     * @return mixed
     */
    public function getHostelName()
    {
        return $this->hostelName;
    }

    /**
     * @param mixed $hostelName
     */
    public function setHostelName($hostelName)
    {
        $this->hostelName = $hostelName;
    }

    /**
     * @return mixed
     */


}