<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Vos\UserVO;
use App\Models\HumanResource\EmployeeModel;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Mail;



class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

//    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('guest');
    }

    public function loadView() {
        return view('auth.forgot');
    }

   /* public function changePassword(Request $request)
    {
        $userVo = new UserVO();
        $userVo->setUsername($request->input('username'));
    }*/
    public function mail(Request $request)
    {
        $name = $request->username;
        $data = array(
            'name'=>$name,
        );
        Mail::send('auth.mail', $data, function($message) {
            $message->to('awan533@gmail.com', 'PROSIGNS')
                ->subject('New Password for Login');
            $message->from('noreply@peb.com','PEB');
        });
        return redirect('forgot');
    }

}
