<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/24/2017
 * Time: 5:33 PM
 */

namespace App\Http\Controllers\HumanResource\Reporting;


use App\Http\Controllers\BaseController;
use App\Models\HumanResource\EmployeeModel;
use App\Vos\HumanResourceVOS\EmployeeVO;
use Illuminate\Http\Request;
use PDF;

class EmployeeReportController extends BaseController
{
    public function loadView()
    {
        return view('HumanResource.Reporting.employeeSearch');
    }
    public  function getPDF(Request $request)
    {
        $employeeVO = new EmployeeVO();
        $employeeVO->setEmployeeId($request->input('param'));
        $employeeModel = new EmployeeModel();
        $employee = $employeeModel->employeeReport($employeeVO);
        $pdf = PDF::loadview('HumanResource.Reporting.employeeReporting',['employees'=>$employee])->setPaper('a4', 'landscape');
        return $pdf->stream('HumanResource.Reporting.employeeReporting.pdf');
    }
}