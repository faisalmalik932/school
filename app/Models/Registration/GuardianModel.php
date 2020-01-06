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
 * Time: 5:13 PM
 */

namespace App\Models\Registration;


use App\Models\BaseModel;
use App\Vos\RegistrationVOS\GuardiansVO;

class GuardianModel extends BaseModel
{
    protected $primaryKey = 'GUARDIAN_ID';
    protected $table = 'adc_guardians';
    protected $fillable =['ORG_ID','BRANCH_ID','STUDENT_ID','FULL_NAME','RELATION',
                          'CNIC','CELL_PHONE','EMAIL','LANDLINE_NUMBER','OCCUPATION','JOB_TITLE',
                          'BUSINESS_NAME','BUSINESS_ADDRESS'];

    public function saveGuardianInfo(GuardiansVO $guardiansVO)
    {
        $this->ORG_ID = $guardiansVO->getOrgId();
        $this->BRANCH_ID = $guardiansVO->getBranchId();
        $this->STUDENT_ID = $guardiansVO->getStudentId();
        $this->FULL_NAME = $guardiansVO->getFullName();
        $this->RELATION = $guardiansVO->getRelation();
        $this->CNIC = $guardiansVO->getCnic();
        $this->EMAIL = $guardiansVO->getEmail();
        $this->CELL_PHONE = $guardiansVO->getCellPhone();
        $this->LANDLINE_NUMBER = $guardiansVO->getLandline();
        $this->OCCUPATION = $guardiansVO->getOccupation();
        $this->JOB_TITLE = $guardiansVO->getJobTitle();
        $this->BUSINESS_NAME = $guardiansVO->getBusinessName();
        $this->BUSINESS_ADDRESS = $guardiansVO->getBusinessAddress();
        $this->CREATED_BY = $guardiansVO->getCreatedBy();
        $this->save();
        $guardiansVO->setGuardianId($this->GUARDIAN_ID);
        return $guardiansVO;
    }

    public function updateGuardianInfo(GuardiansVO $guardiansVO)
    {
            $this->where('STUDENT_ID',$guardiansVO->getStudentId())
            ->update(['ORG_ID'=>$guardiansVO->getOrgId(),
            'BRANCH_ID'=>$guardiansVO->getBranchId(),'STUDENT_ID'=>$guardiansVO->getStudentId(),
            'FULL_NAME'=>$guardiansVO->getFullName(),'RELATION'=>$guardiansVO->getRelation(),
            'CNIC'=>$guardiansVO->getCnic(),'EMAIL'=>$guardiansVO->getEmail(),'CELL_PHONE'=>$guardiansVO->getCellPhone(),
            'LANDLINE_NUMBER'=>$guardiansVO->getLandline(),
            'OCCUPATION'=>$guardiansVO->getOccupation(),
            'JOB_TITLE'=>$guardiansVO->getJobTitle(),
            'BUSINESS_NAME'=>$guardiansVO->getBusinessName(),
            'BUSINESS_ADDRESS'=>$guardiansVO->getBusinessAddress(),
                'UPDATED_BY' => $guardiansVO->getModifiedBy(),
                'UPDATED_AT' => $guardiansVO->getModifiedAt()]);
    }

}