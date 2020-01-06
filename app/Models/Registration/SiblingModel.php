<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/15/2017
 * Time: 5:12 PM
 */

namespace App\Models\Registration;


use App\Models\BaseModel;
use App\Vos\RegistrationVOS\SiblingVO;

class SiblingModel extends BaseModel
{
    protected $primaryKey = 'ID';
    protected $table = 'adc_siblings';
    protected $fillable =['ORG_ID','BRANCH_ID','STUDENT_ID','GUARDIAN_ID','SIBLING_NAME'];

    public function saveSiblingInfo(SiblingVO $siblingVO)
    {
        $this->ORG_ID = $siblingVO->getOrgID();
        $this->BRANCH_ID = $siblingVO->getBranchId();
        $this->STUDENT_ID = $siblingVO->getStudentId();
        $this->GUARDIAN_ID = $siblingVO->getGuardianId();
        $this->SIBLING_NAME = $siblingVO->getSiblingName();
        $this->CREATED_BY = $siblingVO->getCreatedBy();
        $this->save();
    }

    public function updateSiblingInfo(SiblingVO $siblingVO)
    {
            $this->where('STUDENT_ID',$siblingVO->getStudentId())
            ->update(['ORG_ID'=> $siblingVO->getOrgID(),
            'BRANCH_ID'=>$siblingVO->getBranchId(),
            'GUARDIAN_ID'=>$siblingVO->getGuardianId(),
            'SIBLING_NAME'=>$siblingVO->getSiblingName()]);
    }
}