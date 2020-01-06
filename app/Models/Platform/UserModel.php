<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/12/2017
 * Time: 7:00 PM
 */

namespace App\Models\Platform;


use App\Http\Vos\UserVO;
use App\Models\BaseModel;

class UserModel extends BaseModel
{
    protected $primaryKey = 'USER_ID';
    protected $table = 'ptf_users';
    protected $fillable = ['EMPLOYEE_ID','USER_ROLE_ID','USER_NAME','STATUS'];

    public function saveUserInfo(UserVO $userVO)
    {
        $result = $this->select()->where('USER_NAME', '=', $userVO->getUsername())->get();
        if (count($result) > 0) {
            $userVO->setErrorResponse(true, '0000030');
        } else {
            $this->EMPLOYEE_ID = $userVO->getEmployeeId();
            $this->USER_ROLE_ID = $userVO->getUserRoleId();
            $this->USER_NAME = $userVO->getUsername();
            $this->STATUS = $userVO->getUserStatus();
            $this->CREATED_BY = $userVO->getCreatedBy();
            $this->save();
            $userVO->setUserId($this->USER_ID);
            return $userVO;
        }
    }

    public function UpdateUser(UserVO $userVO)
    {
        $user = $this->where('USER_ID',$userVO->getUserId())
            ->update(['EMPLOYEE_ID'=>$userVO->getEmployeeId(),
                'USER_ROLE_ID'=> $userVO->getUserRoleId(),
                'USER_NAME'=>$userVO->getUsername(),
                'STATUS'=> $userVO->getUserStatus(),
                'UPDATED_BY' => $userVO->getModifiedBy(),
                'UPDATED_AT' => $userVO->getModifiedAt()]);
            \DB::table('ptf_users_roles')->where('USER_ROLE_ID' , $userVO->getUserRoleId())
            ->update(['STATUS'=> $userVO->getUserStatus()]);
    }

}