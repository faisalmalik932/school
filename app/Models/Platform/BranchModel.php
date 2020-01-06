<?php

namespace App\Models\Platform;

use App\Models\BaseModel;
use App\Vos\BranchVOS\BranchVO;
use Illuminate\Database\Eloquent\Model;


class BranchModel extends BaseModel
{
    protected $primaryKey = 'BRANCH_ID';
    protected $table = 'ptf_branches';
    protected $fillable = ['ORG_ID','BRANCH_CODE','BRANCH_NAME','STATE_ID','CITY_ID','ADDRESS','LANDLINE_NUMBER','FAX_NUMBER','EMAIL','BRANCH_TYPE','BRANCH_LEVEL','DESCRIPTION','REGISTERED_DATE','STATUS','LATE_FEE_FINE','BRANCH_LOGO'];

    public function saveBranchInfo(BranchVO $branchVO)
    {
        $result = $this->select()->where([['BRANCH_CODE', '=', $branchVO->getBranchCode()]])->get();
        if (count($result) > 0) {
            $branchVO->setErrorResponse(true, '000009');
        } else {
            $this->ORG_ID = $branchVO->getOrgId();
            $this->BRANCH_CODE = $branchVO->getBranchCode();
            $this->BRANCH_NAME = $branchVO->getBranchName();
            $this->STATE_ID = $branchVO->getStateId();
            $this->CITY_ID = $branchVO->getCityID();
            $this->ADDRESS = $branchVO->getAddress();
            $this->LANDLINE_NUMBER = $branchVO->getLandline();
            $this->FAX_NUMBER = $branchVO->getFaxNumb();
            $this->Email = $branchVO->getEmail();
            $this->BRANCH_TYPE = $branchVO->getBranchType();
            $this->BRANCH_LEVEL = $branchVO->getBranchLevel();
            $this->BANK_ID = $branchVO->getBankId();
            $this->DESCRIPTION = $branchVO->getDescription();
            $this->REGISTERED_DATE = $branchVO->getRegisterDate();
            $this->LATE_FEE_FINE = $branchVO->getFeefine();
            $this->BRANCH_LOGO = $branchVO->getBranchLogo();
            $this->STATUS = $branchVO->getStatus();
            $this->CREATED_BY = $branchVO->getCreatedBy();
            $this->save();
        }
    }
    public function updateBranch(BranchVO $branchVO)
    {
        $this->where('BRANCH_ID', $branchVO->getBranchId())
        ->update([  'BRANCH_NAME' => $branchVO->getBranchName(),
                    'STATE_ID' => $branchVO->getStateId(),
                    'BANK_ID' => $branchVO->getBankId(),
                    'CITY_ID' => $branchVO->getCityID(),
                    'ADDRESS' => $branchVO->getAddress(),
                    'LANDLINE_NUMBER' => $branchVO->getLandline(),
                    'FAX_NUMBER' => $branchVO->getFaxNumb(),
                    'EMAIL' => $branchVO->getEmail(),
                    'BRANCH_TYPE' => $branchVO->getBranchType(),
                    'BRANCH_LEVEL' => $branchVO->getBranchLevel(),
                    'REGISTERED_DATE' => $branchVO->getRegisterDate(),
                    'DESCRIPTION' => $branchVO->getDescription(),
                    'STATUS' => $branchVO->getStatus(),
                    'LATE_FEE_FINE' => $branchVO->getFeefine(),
                    'BRANCH_LOGO' => $branchVO->getBranchLogo(),
                    'UPDATED_BY' => $branchVO->getModifiedBy(),
                    'UPDATED_AT' => $branchVO->getModifiedAt()]);
    }

    public function loadAllSchools() {
        $school = $this->select('BRANCH_ID','BRANCH_NAME')->where('IS_DELETED','=',0)->get();
        return $school;
    }

    public function getBranchName($orgId, $branchId) {
        $result = $this->select('BRANCH_NAME')
            ->where('BRANCH_ID', '=', $branchId)
            ->where('ORG_ID', '=', $orgId)
            ->get();
        return $result[0]['BRANCH_NAME'];
    }

    public function getBranchCode($branchId)
    {
        $branchCode = $this->select('BRANCH_CODE')->where('BRANCH_ID','=',$branchId)->get();
        return $branchCode;
    }
}
