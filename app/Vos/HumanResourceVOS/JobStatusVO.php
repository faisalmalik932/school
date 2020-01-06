<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/16/2017
 * Time: 7:03 PM
 */

namespace App\Vos\HumanResourceVOS;


use App\Vos\BaseVO;

class JobStatusVO extends BaseVO
{
    protected $OrgId;
    protected $jobstatusId;
    protected $jobStatusName;
    protected $description;

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
    public function getJobstatusId()
    {
        return $this->jobstatusId;
    }

    /**
     * @param mixed $jobstatusId
     */
    public function setJobstatusId($jobstatusId)
    {
        $this->jobstatusId = $jobstatusId;
    }

    /**
     * @return mixed
     */
    public function getJobStatusName()
    {
        return $this->jobStatusName;
    }

    /**
     * @param mixed $jobStatusName
     */
    public function setJobStatusName($jobStatusName)
    {
        $this->jobStatusName = $jobStatusName;
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