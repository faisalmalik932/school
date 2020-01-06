<?php
/**
 * Created by PhpStorm.
 * User: nayabraheel
 * Date: 02/04/2018
 * Time: 1:43 PM
 */

namespace App\Http\Controllers\import;


use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class ImportStudentsController extends BaseController
{
    public function loadView()
    {
        return view('import.import-students');
    }

    public function importDate(Request $request) {
    	$file = $request->file('file');
        $path = $file->getRealPath();
        $data = \Excel::load($path, function ($reader) { })->get();

        if (!empty($data) && $data->count() > 0) {
            $branch = null;
            foreach ($data as $value) {
                if (empty($value->name)) { continue; }
                $branchCode = !empty($value->branch_code) ? $value->branch_code : '';
                $branch = \DB::table('ptf_branches')->select('BRANCH_ID')->where('BRANCH_CODE', $branchCode)->first();
                $branchId = !empty($branch) ? $branch->BRANCH_ID : '';
                if ($branchId > 0) {
                    $hostelId = !empty($value->hostelid) ? intval($value->hostelid) : '';
                    $studentCode = !empty($value->student_code) ? $value->student_code : '';

                    $rollNo = !empty($value->roll_no) ? intval($value->roll_no) : '';
                    $concession = !empty($value->concession) ? intval($value->concession) : '0';

                    if (!empty($value->dateofbirth)) {
                        $date = \Carbon\Carbon::parse($value->dateofbirth)->toDateString();
                    } else {
                        $date = '';
                    }

                    $date = '';
                    if (!empty($value->admissiondate)) {
                        $admission_date = \Carbon\Carbon::parse($value->admissiondate)->format('Y-m-d');
                    } else {
                        $admission_date = '';
                    }

                    $q = ['ORG_ID' => 1, 'BRANCH_ID' => $branchId, 'STUDENT_CODE' => $studentCode, 'ROLL_NO' => $rollNo, 'CLASS' => $value->class, 'SECTION_NAME' => $value->section, 'FULL_NAME' => $value->name, 'CURRENT_ADDRESS' => $value->address, 'PERMANENT_ADDRESS' => $value->address, 'RELIGION' => $value->religion, 'GENDER' => $value->gender, 'BAYFORM_NO' => $value->bayformno, 'BIRTH_DATE' => $date, 'REGISTRATION_DATE' => $admission_date, 'CONCESSION' => $concession];

                    $student_id = \DB::table('adc_students')->insertGetId($q);

                    $name = !empty($value->fathercnic) ? $value->fathercnic : "";
                    $cnic = !empty($value->fathercnic) ? $value->fathercnic : "";
                    $contact = !empty($value->fathercontact) ? $value->fathercontact : "";

                    $guardian = ['BRANCH_ID' => $branchId, 'STUDENT_ID' => $student_id, 'FULL_NAME' => $name, 'RELATION' => "Father", 'CELL_PHONE' => $contact];
                    \DB::table('adc_guardians')->insert($guardian);

                    $name = !empty($value->mothername) ? $value->mothername : "";
                    $cnic = !empty($value->mothercnic) ? $value->mothercnic : "";
                    $guardian = ['BRANCH_ID' => $branchId, 'STUDENT_ID' => $student_id, 'FULL_NAME' => $name, 'RELATION' => "Mother"];
                    \DB::table('adc_guardians')->insert($guardian);
                }
            }
            return redirect()->back();
        }
	}
}