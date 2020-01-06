<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 10/2/2017
 * Time: 3:32 PM
 */

namespace App\Models\HumanResource\Leaves;


use App\Models\BaseModel;
use App\Vos\HumanResourceVOS\AddEntitlementVO;
use DB;

class AddEntitlementModel extends BaseModel
{
    protected $primaryKey = 'ENTITLEMENT_ID';
    protected $table = 'hrm_entitlements';
    protected $fillable = ['ORG_ID','LEAVE_TYPE','DEPARTMENT_ID','BRANCH_ID','TITLE_ID','ENTITLEMENT'];

    public function addEntitlements(AddEntitlementVO $entitlementVO)
    {
        $result = DB::table('hrm_entitlements_vw')->where([['DEPARTMENT_ID', '=',$entitlementVO->getDepartmentId()],
            ['TITLE_ID', '=',$entitlementVO->getDesignationId()],
            ['LEAVE_TYPE', '=',$entitlementVO->getLeaveType()]])->get();
        if (count($result) > 0) {
            $entitlementVO->setErrorResponse(true, '0000037');
        } else {
            $this->ORG_ID = $entitlementVO->getOrgId();
            $this->LEAVE_TYPE = $entitlementVO->getLeaveType();
            $this->DEPARTMENT_ID = $entitlementVO->getDepartmentId();
            $this->TITLE_ID = $entitlementVO->getDesignationId();
            $this->ENTITLEMENT = $entitlementVO->getEntitlement();
            $this->save();
        }
    }

    public function updateEntitlements(AddEntitlementVO $entitlementVO)
    {
        // dd($entitlementVO);
        $this->where('ENTITLEMENT_ID',$entitlementVO->getEntitlementId())
            ->update([  'ORG_ID'=>$entitlementVO->getOrgId(),
                        'LEAVE_TYPE'=>$entitlementVO->getLeaveType(),
                        // 'LEAVE_PERIOD_START'=>$entitlementVO->getLeavePeriodStart(),
                        // 'LEAVE_PERIOD_END'=>$entitlementVO->getLeavePeriodEnd(),
                        // 'EMPLOYEE_ID'=>$entitlementVO->getEmployeeId(),
                        'DEPARTMENT_ID'=>$entitlementVO->getDepartmentId(),
                        'TITLE_ID'=>$entitlementVO->getDesignationId(),
                        'ENTITLEMENT'=>$entitlementVO->getEntitlement()]);
    }

}