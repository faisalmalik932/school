<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/12/2017
 * Time: 7:18 PM
 */

namespace App\Models\Platform;


use App\Http\Vos\UserVO;
use App\Models\BaseModel;
use App\Vos\Common\UserSecretVO;

class UserSecretsModel extends BaseModel
{
    protected $primaryKey = 'USER_ID';
    protected $table = 'ptf_users_secrets';
    protected $fillable = ['USER_ID','PASSCODE'];

    public function savePassword(UserSecretVO $userSecretVO)
    {
        $userVO = new UserVO();
        $result = $this->select()->where('USER_ID', '=', $userVO->getUserId())->get();
        if (count($result) > 0) {
            $userVO->setErrorResponse(true, '0000030');
        } else {
            $this->PASSCODE = $userSecretVO->getPasscode();
            $this->USER_ID = $userSecretVO->getUserId();
            $this->save();
        }
    }

    public function UpdatePassword(UserSecretVO $userSecretVO)
    {
        $this->where('USER_ID',$userSecretVO->getUserId())
            ->update(['USER_ID'=>$userSecretVO->getUserId(),
                'PASSCODE'=>$userSecretVO->getPasscode()]);

    }
    public function checkPassword(UserSecretVO $userSecretVO){
        return $this->where('USER_ID',$userSecretVO->getUserId())->get();
    }

}