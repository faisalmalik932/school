<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 10/10/2017
 * Time: 4:48 PM
 */

namespace App\Models\Platform\Reporting;


use App\Models\BaseModel;
use App\Vos\BranchVOS\BranchVO;

class BranchReportModel extends BaseModel
{
    protected $primaryKey = 'BRANCH_ID';
    protected $table = 'ptf_branch_report_vw';

    public function monthlyBranchReport(BranchVO $branchVO)
    {
        $branchDetails = $this->where('BRANCH_ID',$branchVO->getBranchId())
            ->whereBetween('DATE',array($branchVO->getStartDate(),$branchVO->getEndDate()))
            ->get();
        return $branchDetails;
    }

}