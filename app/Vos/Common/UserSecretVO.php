<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/12/2017
 * Time: 7:20 PM
 */

namespace App\Vos\Common;


use App\Vos\BaseVO;

class UserSecretVO extends BaseVO
{
    protected $userId;
    protected $Passcode;

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getPasscode()
    {
        return $this->Passcode;
    }

    /**
     * @param mixed $Passcode
     */
    public function setPasscode($Passcode)
    {
        $this->Passcode = $Passcode;
    }

}