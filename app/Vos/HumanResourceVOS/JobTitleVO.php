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
 * Time: 2:36 PM
 */

namespace App\Vos\HumanResourceVOS;


use App\Vos\BaseVO;

class JobTitleVO extends BaseVO
{
    protected $OrgId;
    protected $TitleId;
    protected $TitleName;
    protected $SpecificFile;
    protected $Description;
    protected $departmentId;
    protected $jobCategoryId;

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
    public function getTitleId()
    {
        return $this->TitleId;
    }

    /**
     * @param mixed $TitleId
     */
    public function setTitleId($TitleId)
    {
        $this->TitleId = $TitleId;
    }

    /**
     * @return mixed
     */
    public function getTitleName()
    {
        return $this->TitleName;
    }

    /**
     * @param mixed $TitleName
     */
    public function setTitleName($TitleName)
    {
        $this->TitleName = $TitleName;
    }

    /**
     * @return mixed
     */
    public function getSpecificFile()
    {
        return $this->SpecificFile;
    }

    /**
     * @param mixed $SpecificFile
     */
    public function setSpecificFile($SpecificFile)
    {
        $this->SpecificFile = $SpecificFile;
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