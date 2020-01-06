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
 * Developer Name: by nayab on 08-Aug-17 / 1:53 AM
 * All information contained herein is, and remains
 * the property of Prosigns Technologies
 */

namespace App\Http\Controllers\HumanResource\Settings;

use App\Http\Controllers\BaseController;
use App\Models\HumanResource\Settings\DepartmentModel;
use App\Models\HumanResource\Settings\JobCategoryModel;
use App\Models\HumanResource\Settings\JobTitlesModel;
use App\Vos\HumanResourceVOS\JobTitleVO;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;

class JobTitlesController extends BaseController
{

    public function loadView()
    {
        $departmentModel = new DepartmentModel();
        $departments = $departmentModel->loadDepartments();
        $jobCategoryModel = new JobCategoryModel();
        $jobcategory = $jobCategoryModel->loadJobCategory();
        return view('HumanResource.Settings.job-titles')->with('department',$departments)
            ->with('jobcategory',$jobcategory);
    }

    public function add(Request $request)
    {
        $jobtitleVO = new JobTitleVO();
        $jobtitleVO->setTitleId($request->input('primary'));
        $jobtitleVO->setOrgId(request()->session()->get('ORG_ID'));
        $jobtitleVO->setDepartmentId($request->input('department'));
        $jobtitleVO->setTitleName($request->input('titlename'));
        $jobtitleVO->setDescription($request->input('titledescription'));
        $jobtitleVO->setJobCategoryId($request->input('jobcategory'));
        $jobtitlesModel = new JobTitlesModel();
        if($jobtitleVO->getTitleId() <= 0 || $jobtitleVO->getTitleId() == '') {
            $jobtitleVO->setCreatedBy($this->getUserName());
            $jobtitlesModel->saveJobTitle($jobtitleVO);
            if ($jobtitleVO->getError()) {
                // return $this->getMessageWithRedirect($jobtitleVO->getErrorCode());
                Session::flash('jobtitle', "Job Title is already created");
                return redirect('hr/settings/job-titles');
            } else {
                Session::flash('jobtitle', "Job Title Added Successfully");
                return redirect('hr/settings/job-titles');
            }
        }
        else{
            $jobtitleVO->setModifiedBy($this->getUserName());
            $jobtitleVO->setModifiedAt($this->getTimeStamp());
            $jobtitlesModel->updateJobTitle($jobtitleVO);
            Session::flash('jobtitle', "Job Title Updated Successfully");
            return redirect('hr/settings/job-titles');
        }
    }

}