<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/21/2017
 * Time: 11:32 AM
 */

namespace App\Models\Platform;


use App\Models\BaseModel;
use App\Vos\RegistrationVOS\HostelVO;

class HostelModel extends BaseModel
{

    protected $primaryKey = 'HOSTEL_ID';
    protected $table = 'ptf_hostels';
    protected $fillable = ['ORG_ID','BRANCH_ID','BRANCH_NAME','HOSTEL_NAME','ADDRESS','HOSTEL_MANAGER','HOSTEL_TYPE'];

    public function saveHostelInfo(HostelVO $hostelVO)
    {
        $result = $this->select()->where('HOSTEL_NAME', '=', $hostelVO->getHostelName())->get();
        if (count($result) > 0) {
            $hostelVO->setErrorResponse(true, '0000015');
        } else {
            $this->ORG_ID = $hostelVO->getOrgId();
            $this->BRANCH_ID = $hostelVO->getBranchId();
            $this->ADDRESS = $hostelVO->getAddress();
            $this->HOSTEL_NAME = $hostelVO->getHostelName();
            $this->HOSTEL_MANAGER = $hostelVO->getHostelManager();
            $this->HOSTEL_TYPE = $hostelVO->getHostelType();
            $this->CREATED_BY = $hostelVO->getCreatedBy();
            $this->save();
        }
    }

    public function updateHostelInfo(HostelVO $hostelVO)
    {
        $this->where('HOSTEL_ID',$hostelVO->getHostelId())
        ->update([  'ORG_ID'=>$hostelVO->getOrgId(),
                    'BRANCH_ID'=>$hostelVO->getBranchId(),
                    'HOSTEL_NAME'=>$hostelVO->getHostelName(),
                    'HOSTEL_MANAGER'=>$hostelVO->getHostelManager(),
                    'ADDRESS'=>$hostelVO->getAddress(),
                    'HOSTEL_TYPE'=>$hostelVO->getHostelType(),
                    'UPDATED_BY' => $hostelVO->getModifiedBy(),
                    'UPDATED_AT' => $hostelVO->getModifiedAt()]);
    }

   public function getHostelsList()
   {
       $hostels = $this->select('HOSTEL_ID','HOSTEL_NAME', 'BRANCH_ID')->where('IS_DELETED','=',0)->get();
       return $hostels;
   }
}