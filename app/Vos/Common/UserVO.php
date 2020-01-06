<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/12/2017
 * Time: 7:04 PM
 */

namespace App\Vos\Common;


use App\Vos\BaseVO;

class UserVO extends BaseVO
{
    protected $userId;
    protected $username;
    protected $userroleId;
    protected $employeeId;
    protected $status;

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
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getUserroleId()
    {
        return $this->userroleId;
    }

    /**
     * @param mixed $userroleId
     */
    public function setUserroleId($userroleId)
    {
        $this->userroleId = $userroleId;
    }

    /**
     * @return mixed
     */
    public function getEmployeeId()
    {
        return $this->employeeId;
    }

    /**
     * @param mixed $employeeId
     */
    public function setEmployeeId($employeeId)
    {
        $this->employeeId = $employeeId;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }


}