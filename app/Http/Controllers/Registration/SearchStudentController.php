<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 10/4/2017
 * Time: 11:30 AM
 */

namespace App\Http\Controllers\Registration;


use App\Http\Controllers\BaseController;

class SearchStudentController extends BaseController
{
    public function loadView()
    {
        return view('Registration.SearchStudent.searchStudent');
    }
}