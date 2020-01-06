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
 * Time: 5:20 PM
 */

namespace App\Models\HumanResource\Settings;


use App\Models\BaseModel;
use App\Vos\HumanResourceVOS\JobCategoryVO;

class JobCategoryModel extends BaseModel
{
    protected $primaryKey = 'JOB_CATEGORY_ID';
    protected $table = 'hrm_job_categories';
    protected $fillable = ['ORG_ID','JOB_CATEGORY_NAME','DESCRIPTION'];

    public function saveJobCategory(JobCategoryVO $jobCategoryVO)
    {
        $result = $this->select()->where('JOB_CATEGORY_NAME', '=', $jobCategoryVO->getJobCategoryName())->get();
        if (count($result) > 0) {
            $jobCategoryVO->setErrorResponse(true, '0000011');
        } else {
            $this->ORG_ID = $jobCategoryVO->getOrgId();
            $this->JOB_CATEGORY_NAME = $jobCategoryVO->getJobCategoryName();
            $this->DESCRIPTION = $jobCategoryVO->getDescription();
            $this->CREATED_BY = $jobCategoryVO->getCreatedBy();
            $this->save();
        }
    }
    public function updateJobCategory(JobCategoryVO $jobCategoryVO)
    {
        $this->where('JOB_CATEGORY_ID',$jobCategoryVO->getJobCategoryId())
            ->update(['JOB_CATEGORY_NAME' => $jobCategoryVO->getJobCategoryName(),
                'DESCRIPTION' => $jobCategoryVO->getDescription(),
                'UPDATED_BY' => $jobCategoryVO->getModifiedBy(),
                'UPDATED_AT' => $jobCategoryVO->getModifiedAt()]);
    }

    public function loadJobCategory()
    {
        $category = $this->select('JOB_CATEGORY_ID','JOB_CATEGORY_NAME')->get();
        return $category;
    }
}