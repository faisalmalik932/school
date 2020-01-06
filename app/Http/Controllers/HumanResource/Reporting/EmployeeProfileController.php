<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 10/5/2017
 * Time: 5:49 PM
 */

namespace App\Http\Controllers\HumanResource\Reporting;


use App\Http\Controllers\BaseController;
use App\Models\HumanResource\EmployeeModel;
use App\Vos\HumanResourceVOS\EmployeeVO;
use Illuminate\Http\Request;
use PDF;
use DB;

class EmployeeProfileController extends BaseController
{
    public function loadView()
    {
        return view('HumanResource.Reporting.Profile.searchEmployees');
    }

    public function getProfilePDF(Request $request)
    {
        $employeeID = $request->input('employee');
        /*$employeeModel = new EmployeeModel();
        $employee = $employeeModel->getEmployeeProfile($employeeVO);*/
        $employee = DB::table('hrm_employees_vw')->where('EMPLOYEE_ID',$employeeID)->first();
        return view('HumanResource.Reporting.Profile.employeeProfile')->with('employee',$employee);
        // $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadview('HumanResource.Reporting.Profile.employeeProfile',['employee'=>$employee])->setPaper('a4', 'portrait');
         //return $pdf->stream('HumanResource.Reporting.Profile.employeeProfile.pdf');
    }

}