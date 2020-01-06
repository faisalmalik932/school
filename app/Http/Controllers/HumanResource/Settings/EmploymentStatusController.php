<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/16/2017
 * Time: 6:58 PM
 */

namespace App\Http\Controllers\HumanResource\Settings;


use App\Http\Controllers\BaseController;
use App\Models\HumanResource\Settings\EmploymentStatusModel;
use App\Vos\HumanResourceVOS\JobStatusVO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EmploymentStatusController extends BaseController
{
    public function loadView()
    {
        return view('HumanResource.Settings.employment-status');
    }

    public function add(Request $request)
    {
        $primary = $request->input('primary');
        if(count($primary)==0) {
            $jobstatusVO = new JobStatusVO();
            $jobstatusVO->setOrgId(request()->session()->get('ORG_ID'));
            $jobstatusVO->setJobStatusName($request->input('job_status'));
            $jobstatusVO->setDescription($request->input('description'));
            $emptstatusModel = new EmploymentStatusModel();
            $emptstatusModel->saveJobStatus($jobstatusVO);
            if ($jobstatusVO->getError()) {
                return $this->getMessageWithRedirect($jobstatusVO->getErrorCode());
            } else {
                Session::flash('status', "Employee Status Added Successfully");
                return redirect('hr/settings/employment-status');
            }
        }
        else{
            $jobstatusVO = new JobStatusVO();
            $jobstatusVO->setJobstatusId($primary);
            $jobstatusVO->setOrgId(request()->session()->get('ORG_ID'));
            $jobstatusVO->setJobStatusName($request->input('job_status'));
            $jobstatusVO->setDescription($request->input('description'));
            $emptstatusModel = new EmploymentStatusModel();
            $emptstatusModel->updateJobStatus($jobstatusVO);
            Session::flash('status', "Employee Status Updated Successfully");
            return redirect('hr/settings/employment-status');
        }
    }

}