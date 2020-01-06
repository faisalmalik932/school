<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/16/2017
 * Time: 7:05 PM
 */

namespace App\Models\HumanResource\Settings;


use App\Models\BaseModel;
use App\Vos\HumanResourceVOS\JobCategoryVO;
use App\Vos\HumanResourceVOS\JobStatusVO;

class EmploymentStatusModel extends BaseModel
{

    protected $primaryKey = 'JOB_STATUS_ID';
    protected $table = 'hrm_job_status';
    protected $fillable = ['ORG_ID','JOB_STATUS_NAME','DESCRIPTION'];

    public function saveJobStatus(JobStatusVO $jobStatusVO)
    {
        $result = $this->select()->where('JOB_STATUS_NAME', '=', $jobStatusVO->getJobStatusName())->get();
        if (count($result) > 0) {
            $jobStatusVO->setErrorResponse(true, '0000014');
        } else {
            $this->ORG_ID = $jobStatusVO->getOrgId();
            $this->JOB_STATUS_NAME = $jobStatusVO->getJobStatusName();
            $this->DESCRIPTION = $jobStatusVO->getDescription();
            $this->save();
        }

    }

    public function updateJobStatus(JobStatusVO $jobStatusVO)
    {
        $this->where('JOB_STATUS_ID', $jobStatusVO->getJobstatusId())->update(['JOB_STATUS_NAME' => $jobStatusVO->getJobStatusName(), 'DESCRIPTION' => $jobStatusVO->getDescription()]);
    }

    public function getJobStatus()
    {
        $jobStatus = $this->select('JOB_STATUS_ID','JOB_STATUS_NAME')->get();
        return $jobStatus;
    }
}