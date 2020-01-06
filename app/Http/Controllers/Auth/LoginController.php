<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Vos\UserVO;
use App\Models\Auth\UserModel;
use App\Models\Finance\Settings\FiscalYearModel;
use App\Models\Platform\BranchModel;
use App\Models\Platform\HostelModel;
use Dotenv\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Artisan;

class LoginController extends BaseController
{
//    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('guest')->except('logout');
    }

    public function loadView() {
        return view('auth.login');
    }

    public function validateUser(Request $request, Response $response) {
        $this->validate($request, [
            'branchcode' => 'bail|required|max:20',
            'username' => 'bail|required|max:160',
            'password' => 'required|max:30',
        ]);

        $userVO = new UserVO();
        $userVO->setUsername($request->input('username'));
        $userVO->setPassword($request->input('password'));
        $userVO->setBranchCode($request->input('branchcode'));

        $userModel = new UserModel();
        $userVO = $userModel->validateUser($userVO);
        $fiscalModel = new FiscalYearModel();
        $fiscal = $fiscalModel->getCurrentFiscalYear();
        if(!$fiscal->first()){
            $fiscal = "";
        }
        else{
         $fiscal = $fiscal->first();
        }
        if ($userVO->getError()) {
            return $this->getMessageWithRedirect($userVO->getErrorCode());
        } else {
            $branchModel = new BranchModel();
            $hostelModel = new HostelModel();
            $schools = $branchModel->loadAllSchools();
            $hostels = $hostelModel->getHostelsList();

            $request->session()->put('SESSION_TOKEN', $request->input('_token'));
            $request->session()->put('ORG_ID', $userVO->getOrgId());
            $request->session()->put('ORG_NAME', $userVO->getOrgName());
            $request->session()->put('BRANCH_ID', $userVO->getBranchId());
            $request->session()->put('BRANCH_TYPE', 'all');
            $request->session()->put('BRANCH_NAME', $userVO->getBranchName());
            $request->session()->put('BRANCH_CODE', $userVO->getBranchCode());
            $request->session()->put('USER_ROLE_ID', $userVO->getUserRoleId());
            $request->session()->put('USER_ROLE_NAME', $userVO->getUserRoleName());
            $request->session()->put('EMPLOYEE_ID', $userVO->getEmployeeId());
            $request->session()->put('EMPLOYEE_NAME', $userVO->getEmployeeName());
            $request->session()->put('PICTURE_NAME', $userVO->getPicture());
            $request->session()->put('USER_ID', $userVO->getUserId());
            $request->session()->put('USERNAME', $userVO->getUsername());
            $request->session()->put('SCHOOLS', json_encode($schools));
            $request->session()->put('HOSTELS', json_encode($hostels));
             // $request->session()->put('FISCAL_YEAR', $fiscal->FISCAL_YEAR);
            return redirect()->action('Dashboard\DashboardController@loadView', ['branchid' => request()->session()->get('BRANCH_ID'), 'branchtype' => request()->session()->get('BRANCH_TYPE')]);
        }
    }

    public function logoffUser(Request $request) {
        $request->session()->flush();
        return redirect()->action('Auth\LoginController@loadView');
    }
}
