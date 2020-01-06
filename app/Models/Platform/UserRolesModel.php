<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/12/2017
 * Time: 8:27 PM
 */

namespace App\Models\Platform;


use App\Models\BaseModel;

class UserRolesModel extends BaseModel
{
    protected $primaryKey = 'USER_ROLE_ID';
    protected $table = 'ptf_users_roles';
    protected $fillable = ['USER_ROLE_NAME','ORG_ID','AUTH_JSON','DESCRIPTION','STATUS'];

    public function loadUserRoles()
    {
       $userRole =  $this->select('USER_ROLE_ID','USER_ROLE_NAME')->get();
       return $userRole;
    }

}