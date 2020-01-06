<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/25/2017
 * Time: 11:16 AM
 */

namespace App\Http\Controllers\HumanResource\Settings;


use App\Http\Controllers\BaseController;
use App\Vos\BaseVO;

class SearchEmployeeController extends BaseController
{
    public function loadView()
    {
        return view('HumanResource.SearchEmployees.searchEmployee');
    }

}