<?php

namespace App\Models\Registration;

use App\Vos\FinanceVOS\FeeVOS\FeeChallanVOS\FeeChallanVO;
use App\Vos\RegistrationVOS\StudentVO;
use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;
use DB;

class StudentModel extends BaseModel
{
    protected $primaryKey = 'STUDENT_ID';
    protected $table = 'adc_students';
    protected $fillable = ['ORG_ID','BRANCH_ID','HOSTEL_ID','STUDENT_CODE','ROLL_NO','CLASS','SECTION_ID','FULL_NAME','BAYFORM_NO','GENDER','PICTURE',
                            'HOME_LANDLINE','CURRENT_ADDRESS','PERMANENT_ADDRESS','NATIONALITY','RELIGION','REGISTRATION_DATE','BIRTH_DATE',
                            'BIRTH_PLACE','EMG_PERSON_NAME','EMG_RELATION','EMG_MOBILE_NUMBER','EMG_LANDLINE','EMG_ADDRESS','CONCESSION_TYPE','STATUS','CONCESSION'];

    public function saveStudentInfo(StudentVO $studentVO)
    {
        $result = $this->select()->where('ROLL_NO', '=', $studentVO->getRollNo())->get();
        if (count($result) > 0) {
            $studentVO->setErrorResponse(true, '0000012');
        } else {
            $this->ORG_ID = $studentVO->getOrgId();
            $this->BRANCH_ID = $studentVO->getBranchId();
            $this->STUDENT_CODE = $studentVO->getStudentCode();
            $this->ROLL_NO = $studentVO->getRollNo();
            $this->CLASS = $studentVO->getClass();
            $this->SECTION_ID = $studentVO->getSection();
            $this->HOSTEL_ID = $studentVO->getHostelId();
            $this->FULL_NAME = $studentVO->getFullName();
            $this->BAYFORM_NO = $studentVO->getBayForm();
            // $this->CONCESSION_TYPE = $studentVO->getConcessionType();
            $this->CONCESSION = $studentVO->getConcession();
            $this->GENDER = $studentVO->getGender();
            $this->PICTURE = $studentVO->getStudentPic();
            $this->RELIGION = $studentVO->getReligion();
            $this->HOME_LANDLINE = $studentVO->getHomeLandLine();
            $this->CURRENT_ADDRESS = $studentVO->getCurrentAddress();
            $this->PERMANENT_ADDRESS = $studentVO->getPermanentAddress();
            $this->NATIONALITY = $studentVO->getNationality();
            $this->BIRTH_DATE = $studentVO->getDOB();
            $this->BIRTH_PLACE = $studentVO->getBirthPlace();
            $this->REGISTRATION_DATE = $studentVO->getRegisterDate();
            $this->EMG_PERSON_NAME = $studentVO->getEmgName();
            $this->EMG_RELATION = $studentVO->getEmgRelation();
            $this->EMG_MOBILE_NUMBER = $studentVO->getEmgMobile();
            $this->EMG_LANDLINE = $studentVO->getEmgLandline();
            $this->EMG_ADDRESS = $studentVO->getEmgAddress();
            $this->CREATED_BY = $studentVO->getCreatedBy();
            $this->STATUS = $studentVO->getStatus();
            $this->save();
            $studentVO->setStudentId($this->STUDENT_ID);
            return $studentVO;
        }
    }


    public function getTutionFee(FeeChallanVO $studentVO)
    {

        $studentfee = DB::table('fin_fee_structure_vw')
                    ->where('FEE_CATEGORY_TYPE', '=', 'SCHOOL')
                    ->where('PARTICULAR_NAME', '=', 'Tuition Fee')
                    ->where('BRANCH_ID', $studentVO->getBranchId())
                    ->where('CLASS', $studentVO->getClass())
                    // ->groupBy('AMOUNT')
                    ->pluck('AMOUNT')->first();
        // dd($studentfee);
        return $studentfee;
    }


    public function updateStudentInfo(StudentVO $studentVO)
    {
        $this->where('STUDENT_ID',$studentVO->getStudentId())
        ->update(['ORG_ID'=>$studentVO->getOrgId(),
        'BRANCH_ID'=>$studentVO->getBranchId(),
        'STUDENT_CODE'=>$studentVO->getStudentCode(),
        'ROLL_NO'=>$studentVO->getRollNo(),
        'CLASS'=>$studentVO->getClass(),
        'SECTION_ID'=>$studentVO->getSection(),'FULL_NAME'=>$studentVO->getFullName(),
        'GENDER'=>$studentVO->getGender(),'PICTURE'=>$studentVO->getStudentPic(),
        'HOME_LANDLINE'=>$studentVO->getHomeLandLine(),
        'HOSTEL_ID'=> $studentVO->getHostelId(),
        'BAYFORM_NO'=> $studentVO->getBayForm(),
        'CURRENT_ADDRESS'=>$studentVO->getCurrentAddress(),
        'PERMANENT_ADDRESS'=>$studentVO->getPermanentAddress(),
        'NATIONALITY'=>$studentVO->getNationality(),'RELIGION'=>$studentVO->getReligion(),
        'REGISTRATION_DATE'=>$studentVO->getRegisterDate(),
        'BIRTH_DATE'=>$studentVO->getDOB(),'BIRTH_PLACE'=>$studentVO->getBirthPlace(),
        'EMG_PERSON_NAME'=>$studentVO->getEmgName(),
        'EMG_RELATION'=>$studentVO->getEmgRelation(),
        'EMG_MOBILE_NUMBER'=>$studentVO->getEmgMobile(),
        'EMG_LANDLINE'=>$studentVO->getEmgLandline(),
        'EMG_ADDRESS'=>$studentVO->getEmgAddress(),
        // 'CONCESSION_TYPE'=>$studentVO->getConcessionType(),
        'CONCESSION'=>$studentVO->getConcession(),
        'STATUS'=>$studentVO->getStatus(),
        'UPDATED_BY' => $studentVO->getModifiedBy(),
        'UPDATED_AT' => $studentVO->getModifiedAt()]);
    }

    public function getStudentByClass($class,$branch)
    {
        $students = $this->where([['CLASS',$class],['BRANCH_ID',$branch],['STATUS','=','ACTIVE'],['IS_DELETED','=','0']])->select('STUDENT_ID')->get();
        return $students;
    }

    public function getStudentFeeDetails(FeeChallanVO $vo) {
        $query = DB::table('fin_student_fee_challan_info_vw')
                    ->where('YEAR', '=', $vo->getYear())
                    ->where('MONTH', '=', $vo->getMonth())
                    ->where('BRANCH_ID', '=', $vo->getBranchId());

        if ($vo->getClass() != "") {
            $query->where('CLASS', '=', $vo->getClass());
        }
        if ($vo->getStudentId() > 0) {
            $query->where('STUDENT_ID', '=', $vo->getStudentId());
        }
        $students = $query->orderBy('CHALLAN_NO', 'asc')->get();
        $result = array();
        $count = 0;
        if ($students != null) {
            foreach ($students as $student) {
                $totalFee = $feeDetails = DB::table('fin_fee_challan_structure')
                    ->where('branch_id', '=', $vo->getBranchId())
                    ->where('class', '=', $student->CLASS)
                    ->sum('amount');
                $feeDetails = DB::table('fin_student_fee_challan_details_vw')->select('PARTICULAR_NAME', 'AMOUNT')->where('CHALLAN_ID', '=', $student->CHALLAN_ID)->get();
                $result[$count]['INFO'] = $student;
                $result[$count]['FEE_STRUCTURE'] = $feeDetails;
                $result[$count]['TOTAL_PAYABLE'] = $this->calculateFee($feeDetails);
                $result[$count]['TOTAL_FEE'] = round($totalFee, 0);
                $count++;
            }
        }
        return $result;
    }

    public function calculateFee($feeDetails) {
        $total = 0;
        foreach($feeDetails as $fee) {
            $total = $total + $fee->AMOUNT;
        }
        return round($total, 0);
    }

    public function StudentInfo(FeeChallanVO $challanVO)
    {
        $students = DB::table('adc_students')->where('BRANCH_ID', '=', $challanVO->getBranchId())->get();
        if(count($students)>0) {
            $students = array();
            if ($challanVO->getStudentId() != "") {
                $student = $challanVO->getStudentId();
                $branch = $challanVO->getBranchId();
                $year = $challanVO->getYear();
                $month = $challanVO->getMonth();
                $admissionFee = $challanVO->getAdmFeeStatus();
                $students[] = DB::select("call fin_student_detail_fee_proc(?,?,?,?,?)", [$branch, $student, $year, $month, $admissionFee]);
            // dd($students);
            } else {
                $studentsResult = DB::table('adc_students')
                    ->where([['CLASS', $challanVO->getClass()],['BRANCH_ID', $challanVO->getBranchId()],['STATUS','=','ACTIVE'],['IS_DELETED','=','0']])->get();
                foreach ($studentsResult as $student) {
                    $students[] = DB::select("call fin_student_detail_fee_proc(?,?,?,?,?)",
                        [$challanVO->getBranchId(), $student->STUDENT_ID, $challanVO->getYear(), $challanVO->getMonth(), $challanVO->getAdmFeeStatus()]);
                }
            }
            // dd('hi');

            return $students;
        }
        else{
            $challanVO->setErrorResponse(true, '0000043');
        }
    }

    public function Month(FeeChallanVO $studentVO)
    {
        // dd($studentFee);
        if ($studentVO->getStudentId() != "") {
        $month = DB::table('fin_fee_challans')->where('STUDENT_ID',$studentVO->getStudentId())
            ->where('BRANCH_ID',$studentVO->getBranchId())->where('CLASS',$studentVO->getClass())
            ->get();}
            else{
                $month =  DB::table('fin_fee_challans')
                    ->where('BRANCH_ID',$studentVO->getBranchId())
                    ->where('CLASS',$studentVO->getClass())
                    ->where('MONTH',$studentVO->getMonth())
                    ->get();
            }
        return $month;
    }

    public function  StudentFeeInfo(FeeChallanVO $challanVO)
    {
                // dd($challanVO);
        $studentfee = DB::table('fin_fee_bills_detail_vw')
            ->select('PARTICULAR_NAME','AMOUNT' , 'CONCESSION', 'CHALLAN_NO' , 'CATEGORY_NAME')
                ->OrderBy('FEE_PARTICULAR_ID', 'Asc')
                ->where('FEE_CATEGORY_TYPE', '=', 'SCHOOL')
                ->where('BRANCH_ID',$challanVO->getBranchId())
                ->where('STUDENT_ID',$challanVO->getStudentId())
                ->where('CLASS',$challanVO->getClass())
                ->where('MONTH',$challanVO->getMonth())
                ->where('YEAR',$challanVO->getYear())
                ->groupBy('PARTICULAR_NAME','AMOUNT')
                ->get();
                // dd($studentfee);
        if(count($studentfee)>0) {
            return $studentfee;
        }
        else{
            $challanVO->setErrorResponse(true, '0000045');
        }

    }

    public function SumFeeInfo(FeeChallanVO $studentVO)
    {

        $studentfee = DB::table('fin_fee_bills_detail_vw')
                    ->where('FEE_CATEGORY_TYPE', '=', 'SCHOOL')
                    // ->where('PARTICULAR_NAME', '=', 'Tuition Fee')
                    ->where('BRANCH_ID', $studentVO->getBranchId())
                    ->where('CLASS', $studentVO->getClass())
                    ->where('MONTH', $studentVO->getMonth())
                    ->where('STUDENT_ID', $studentVO->getStudentId())
                    // ->groupBy('AMOUNT')
                    ->where('YEAR' , $studentVO->getYear())
                    ->sum('AMOUNT');
                    // ->get();
        // dd($studentfee);
        return $studentfee;
    }

    public function SumFeeInfo1(FeeChallanVO $studentVO)
    {

        $studentfee = DB::table('fin_fee_bills_detail_vw')
                    ->where('FEE_CATEGORY_TYPE', '=', 'SCHOOL')
                    ->where('PARTICULAR_NAME', '=', 'Tuition Fee')
                    ->where('BRANCH_ID', $studentVO->getBranchId())
                    ->where('CLASS', $studentVO->getClass())
                    ->where('MONTH', $studentVO->getMonth())
                    ->where('STUDENT_ID', $studentVO->getStudentId())
                    // ->groupBy('AMOUNT')
                    ->where('YEAR' , $studentVO->getYear())
                    ->sum('AMOUNT');
                    // ->get();
        // dd($studentfee);
        return $studentfee;
    }

    public function discount(FeeChallanVO $studentVO)
    {
        $challan = DB::table('fin_fee_challans')->select('CHALLAN_NO')
            ->where('STUDENT_ID',$studentVO->getStudentId())->get();
        for($i=0;$i<count($challan);$i++) {
            $discount = DB::table('fin_fee_challan_vw')->where('CHALLAN_NO', $challan[$i]->CHALLAN_NO)->where('FEE_CATEGORY_TYPE', '=', 'DISCOUNTS')
                ->sum('AMOUNT');
        }
        return $discount;
    }

    public function totalFee(FeeChallanVO $studentVO)
    {
        $challan = DB::table('fin_fee_challans')->select('CHALLAN_NO')
            ->where('STUDENT_ID',$studentVO->getStudentId())->get();
        for($i=0;$i<count($challan);$i++) {
            $studentfee = DB::table('fin_fee_challan_vw')->where('CHALLAN_NO', $challan[$i]->CHALLAN_NO)->where('FEE_CATEGORY_TYPE', '=', 'SCHOOL')
                ->sum('AMOUNT');
        }
        $student = DB::select("call fin_student_detail_fee_proc(?,?,?,?)",
            [$studentVO->getBranchId(), $studentVO->getStudentId(),$studentVO->getYear(),$studentVO->getMonth()]);
        for($i=0;$i<count($student);$i++) {
           $sum = $student[$i]->FEE_DISCOUNT;
        }
        return $studentfee - $sum;

    }

    public function HostelsStudent(StudentVO $studentVO)
    {
        $month = $studentVO->getMonth();
        $month = $month;
        $student = DB::table('fin_hostel_fee_challan_vw')
            ->select('STUDENT_ID','STUDENT_NAME','CLASS','CHALLAN_NO','ADDRESS','FULL_NAME','BRANCH_LANDLINE_NUMBER','HOSTEL_NAME','MONTH','YEAR')->where('STUDENT_ID',$studentVO->getStudentId())
            ->where('HOSTEL_ID',$studentVO->getHostelId())
            ->where('MONTH' , $month)
            ->groupBy('STUDENT_ID','STUDENT_NAME','CLASS','CHALLAN_NO','ADDRESS','FULL_NAME','BRANCH_LANDLINE_NUMBER','HOSTEL_NAME','MONTH','YEAR')
            ->get();
        if(count($student)>0) {
            return $student;
        }
        else{
            $studentVO->setErrorResponse(true, '0000050');
        }

    }

    public function StudentHostelFeeInfo(StudentVO $studentVO)
    {
        $month = $studentVO->getMonth();
        $studentfee = DB::table('fin_hostel_fee_challan_vw')->where('STUDENT_ID',$studentVO->getStudentId())
            ->where('FEE_CATEGORY_TYPE','=','HOSTEL')
            ->where('MONTH' , '=' , $month)
            ->get();
        if(count($studentfee)>0) {
            return $studentfee;
        }
        else{
            $studentVO->setErrorResponse(true, '0000050');
        }
    }

    public function SumHostelFeeInfo(StudentVO $studentVO)
    {
        $month = $studentVO->getMonth();
        // $month = 'JAN';
        $studentfee =DB::table('fin_hostel_fee_challan_vw')->where('STUDENT_ID',$studentVO->getStudentId())
            ->where('FEE_CATEGORY_TYPE','=','HOSTEL')
            ->where('MONTH' , '=' , $month)
            ->sum('AMOUNT');

        if(count($studentfee)>0) {
            return $studentfee;
        }
        else{
            $studentVO->setErrorResponse(true, '0000050');
        }

    }

    public function totalStudents($orgid, $branchid, $branchtype) {
        $column = '';
        if ($branchtype == 'hostel') {
            $column = 'HOSTEL_ID';
        } else if ($branchtype == 'school') {
            $column = 'BRANCH_ID';
        } else {
            $column = 'ORG_ID';
            $branchid = $orgid;
        }
        return $this->where($column, '=', $branchid)->count();
    }

    public function totalMaleStudents($orgid, $branchid, $branchtype) {
        $column = '';
        if ($branchtype == 'hostel') {
            $column = 'HOSTEL_ID';
        } else if ($branchtype == 'school') {
            $column = 'BRANCH_ID';
        } else {
            $column = 'ORG_ID';
            $branchid = $orgid;
        }
        return $this->where($column, '=', $branchid)->where('GENDER', '=', 'MALE')->count();
    }

    public function totelFemaleStudents($orgid, $branchid, $branchtype) {
        $column = '';
        if ($branchtype == 'hostel') {
            $column = 'HOSTEL_ID';
        } else if ($branchtype == 'school') {
            $column = 'BRANCH_ID';
        } else {
            $column = 'ORG_ID';
            $branchid = $orgid;
        }
        return $this->where($column, '=', $branchid)->where('GENDER', '=', 'FEMALE')->count();
    }

    public function totalNewStudents($orgid, $branchid, $branchtype) {
        $column = '';
        if ($branchtype == 'hostel') {
            $column = 'HOSTEL_ID';
        } else if ($branchtype == 'school') {
            $column = 'BRANCH_ID';
        } else {
            $column = 'ORG_ID';
            $branchid = $orgid;
        }
        return $this
                ->where($column, '=', $branchid)
                ->whereMonth('REGISTRATION_DATE', '=', date('M'))
                ->whereYear('REGISTRATION_DATE', '=',date('Y'))->count();
    }

}
