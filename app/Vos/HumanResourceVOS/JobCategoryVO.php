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
 * Date: 8/11/2017
 * Time: 5:43 PM
 */

namespace App\Vos\HumanResourceVOS;


use App\Vos\BaseVO;

class JobCategoryVO extends BaseVO
{
    protected $OrgId;
    protected $jobCategoryId;
    protected $jobCategoryName;
    protected $Description;

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
    public function getJobCategoryName()
    {
        return $this->jobCategoryName;
    }

    /**
     * @param mixed $jobCategoryName
     */
    public function setJobCategoryName($jobCategoryName)
    {
        $this->jobCategoryName = $jobCategoryName;
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