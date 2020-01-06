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
 * Time: 5:25 PM
 */

namespace App\Http\Controllers\HumanResource\Settings;

use App\Http\Controllers\BaseController;
use App\Models\HumanResource\Settings\JobCategoryModel;
use App\Vos\HumanResourceVOS\JobCategoryVO;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;

class JobCategoryController extends BaseController
{
    public function loadView()
    {
        return view('HumanResource.Settings.job-category');
    }

    public function add(Request $request)
    {
        $jobCategoryVO = new JobCategoryVO();
        $jobCategoryVO->setOrgId('1');
        $jobCategoryVO->setJobCategoryId($request->input('primary'));
        $jobCategoryVO->setJobCategoryName($request->input('job_category'));
        $jobCategoryVO->setDescription($request->input('description'));
        $jobCategoryModel = new JobCategoryModel();
        if($jobCategoryVO->getJobCategoryId() <= 0 || $jobCategoryVO->getJobCategoryId() == '') {
            $jobCategoryVO->setCreatedBy($this->getUserName());
            $jobCategoryModel->saveJobCategory($jobCategoryVO);
            if ($jobCategoryVO->getError()) {
                return $this->getMessageWithRedirect($jobCategoryVO->getErrorCode());
            } else {
                session::flash('job', "job Category Added Successfully");
                return redirect('hr/settings/job-category');
            }
        }
        else {
            $jobCategoryVO->setModifiedBy($this->getUserName());
            $jobCategoryVO->setModifiedAt($this->getTimeStamp());
            $jobCategoryModel->updateJobCategory($jobCategoryVO);
            session::flash('job', "job Category Updated Successfully");
            return redirect('hr/settings/job-category');
        }
    }

}