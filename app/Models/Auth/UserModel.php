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
 * Product Name: IntelliJ IDEA.
 * Developer Name: by nayab on 07-Aug-17 / 1:38 PM
 * All information contained herein is, and remains
 * the property of Prosigns Technologies
 */

namespace App\Models\Auth;

use App\Http\Vos\UserVO;
use App\Models\BaseModel;

class UserModel extends BaseModel {
    
    protected $primaryKey = 'USER_ID';
    protected $table = 'ptf_users_vw';
    protected $fillable = array('COLUMN','COLUMN');
    
    public function validateUser(UserVO $userVo) {
        $userVOResult = new UserVO();
        $result = $this->select()
                    ->where([['USERNAME', '=', $userVo->getUsername()],
                        ['PASSWORD', '=', $userVo->getPassword()],
                        ['BRANCH_CODE', '=', $userVo->getBranchCode()]])->get();
        if (count($result) > 0) {
            if ($result[0]['ORG_STATUS'] == 'INACTIVE') {
                $userVOResult->setErrorResponse(true, "000002");
            } else if ($result[0]['BRANCH_STATUS'] == 'INACTIVE') {
                $userVOResult->setErrorResponse(true, "000003");
            } else if ($result[0]['ROLE_STATUS'] == 'INACTIVE') {
                $userVOResult->setErrorResponse(true, "000004");
            } else if ($result[0]['EMPLOYEE_STATUS'] == 'INACTIVE') {
                $userVOResult->setErrorResponse(true, "000005");
            } else if ($result[0]['USER_STATUS'] == 'INACTIVE') {
                $userVOResult->setErrorResponse(true, "000006");
            } else {
                return $this->getUserObject($result[0]);
            }
        } else {
            $userVOResult->setErrorResponse(true, "000001");
        }
        return $userVOResult;
    }

    public function getUserObject($result) {
        $userVO = new UserVO();
        $userVO->setOrgId($result['ORG_ID']);
        $userVO->setOrgName($result['ORG_NAME']);

        $userVO->setBranchId($result['BRANCH_ID']);
        $userVO->setBranchName($result['BRANCH_NAME']);
        $userVO->setBranchCode($result['BRANCH_CODE']);

        $userVO->setUserRoleId($result['USER_ROLE_ID']);
        $userVO->setUserRoleName($result['USER_ROLE_NAME']);

        $userVO->setEmployeeId($result['EMPLOYEE_ID']);
        $userVO->setEmployeeName($result['EMPLOYEE_NAME']);
        $userVO->setPicture($result['PICTURE_NAME']);

        $userVO->setUserId($result['USER_ID']);
        $userVO->setUsername($result['USERNAME']);

        $userVO->setOrgStatus($result['ORG_STATUS']);
        $userVO->setBranchStatus($result['BRANCH_STATUS']);
        $userVO->setRoleStatus($result['ROLE_STATUS']);
        $userVO->setEmployeeStatus($result['EMPLOYEE_STATUS']);
        $userVO->setUserStatus($result['USER_STATUS']);
        return $userVO;
    }
}

