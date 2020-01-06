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
 * Time: 2:42 PM
 */

namespace App\Models\HumanResource\Settings;


use App\Models\BaseModel;
use App\Vos\HumanResourceVOS\JobTitleVO;

class JobTitlesModel extends BaseModel
{
    protected $primaryKey = 'TITLE_ID';
    protected $table = 'hrm_job_titles';
    protected $fillable = ['ORG_ID','DEPARTMENT_ID','TITLE_NAME','SPECIFICATION_FILE','DESCRIPTION','JOB_CATEGORY_ID','BRANCH_ID'];

    public function saveJobTitle(JobTitleVO $jobTitleVO)
    {

        $result = $this->select()->where([['TITLE_NAME', '=', $jobTitleVO->getTitleName()],['DEPARTMENT_ID', '=', $jobTitleVO->getDepartmentId()]])->get();
        if (count($result) > 0) {
            $jobTitleVO->setErrorResponse(true, '0000010');
        } else {
            $this->ORG_ID = $jobTitleVO->getOrgId();
            $this->DEPARTMENT_ID = $jobTitleVO->getDepartmentId();
            $this->TITLE_NAME = $jobTitleVO->getTitleName();
            $this->DESCRIPTION = $jobTitleVO->getDescription();
            // $this->BRANCH_ID = $jobTitleVO->getBranchId();
            $this->JOB_CATEGORY_ID = $jobTitleVO->getJobCategoryId();
            $this->CREATED_BY = $jobTitleVO->getCreatedBy();
            $this->save();

        }
    }
    public function updateJobTitle(JobTitleVO $jobTitleVO)
    {
        $this->where('TITLE_ID', $jobTitleVO->getTitleId())
            ->update([
                'DEPARTMENT_ID'=>$jobTitleVO->getDepartmentId(),
                'TITLE_NAME' => $jobTitleVO->getTitleName(),
                'DESCRIPTION' => $jobTitleVO->getDescription(),
                // 'BRANCH_ID' => $jobTitleVO->getBranchId(),
                'JOB_CATEGORY_ID'=>$jobTitleVO->getJobCategoryId(),
                'UPDATED_BY' => $jobTitleVO->getModifiedBy(),
                'UPDATED_AT' => $jobTitleVO->getModifiedAt()]);
    }

    public function getjobstatus()
    {
        $title = $this->select('TITLE_NAME','TITLE_ID')->get();
        return $title;
    }

}