<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/26/2017
 * Time: 2:21 PM
 */

namespace App\Http\Controllers\Finance\EmployeePayslips;


use App\Http\Controllers\BaseController;

class EmployeePayslipController extends BaseController
{
    public function loadView()
    {
        return view('Finance.EmployeePaySlips.employeePayslip');
    }
}