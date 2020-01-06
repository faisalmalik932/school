<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/30/2017
 * Time: 12:58 PM
 */

namespace App\Http\Controllers\Platform;


use App\Http\Controllers\BaseController;
use App\Http\Vos\UserVO;
use App\Models\HumanResource\EmployeeModel;
use App\Models\Platform\UserModel;
use App\Models\Platform\UserRolesModel;
use App\Models\Platform\UserSecretsModel;
use App\Vos\Common\UserSecretVO;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;

class UsersController extends BaseController
{
    public function loadView()
    {
        $userroleModel = new UserRolesModel();
        $roles = $userroleModel->loadUserRoles();
        $employeeModel = new EmployeeModel();
        $employees = $employeeModel->loadEmployees();
        return view('Platform.users')->with('userroles',$roles)->with('employee',$employees);
    }

    public function add(Request $request)
    {
        $userVO = new UserVO();
        $passwordVO = new UserSecretVO();
        $userModel = new UserModel();
        $secretModel = new UserSecretsModel();
        $userVO->setUserId($request->input('primary'));
        $userVO->setEmployeeId($request->input('employeename'));
        $userVO->setUserRoleId($request->input('userrole'));
        $userVO->setUsername($request->input('username'));
        $userVO->setUserStatus($request->input('status'));
        if($userVO->getUserId() <= 0 || $userVO->getUserId() == '') {
            $userVO->setCreatedBy($this->getUserName());
            $userModel->saveUserInfo($userVO);
            if ($userVO->getError()) {
                return $this->getMessageWithRedirect($userVO->getErrorCode());
            } else {
                $passwordVO->setPasscode($request->input('password'));
                $passwordVO->setCreatedBy($this->getUserName());
                $passwordVO->setUserId($userVO->getUserId());
                $secretModel->savePassword($passwordVO);
                Session::flash('users', "User Added Successfully");
                return redirect('platform/users');
            }
        }
        else{
            $userModel->UpdateUser($userVO);
            $passwordVO->setUserId($request->input('primary'));
            $passwordVO->setPasscode($request->input('password'));
            $secretModel->UpdatePassword($passwordVO);
            Session::flash('users', "User Data Updated Successfully");
            return redirect('platform/users');
        }
    }

    public function changePassword(Request $request)
    {
        $passwordVO = new UserSecretVO();
        $secretModel = new UserSecretsModel();
        $passwordVO->setPasscode($request->input('newpassword'));
        $passwordVO->setUserId(request()->session()->get('USER_ID'));
        $user = $secretModel->checkPassword($passwordVO);
        if($user[0]['PASSCODE'] != $request->current){
            return response()->json('fasle');
        }
        $secretModel->UpdatePassword($passwordVO);
        $request->session()->flush();
        return response()->json(['message' => "successful" , 'code' => 200]);
    }

}