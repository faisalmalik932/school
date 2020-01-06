<?php

namespace App\Http\Controllers\Registration;

use App\Http\Controllers\BaseController;
use App\Models\Finance\Donors\AllocateDonorModel;
use App\Models\Finance\Fees\CreateFee\FeeCategoriesModel;
use App\Models\Finance\Fees\CreateFee\FeeParticularsModel;
use App\Models\Platform\BranchModel;
use App\Models\Platform\ClassModel;
use App\Models\Platform\HostelModel;
use App\Models\Platform\SectionModel;
use App\Models\Registration\GuardianModel;
use App\Models\Registration\SiblingModel;
use App\Models\Registration\StudentModel;
use App\Vos\FinanceVOS\DonorsVOS\AllocateDonorVO;
use App\Vos\FinanceVOS\FeeVOS\CreateFeeVOS\FeeCategoryVO;
use App\Vos\FinanceVOS\FeeVOS\CreateFeeVOS\FeeParticularsVO;
use App\Vos\RegistrationVOS\GuardiansVO;
use App\Vos\RegistrationVOS\SiblingVO;
use App\Vos\RegistrationVOS\StudentVO;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use DB;

class StudentController extends BaseController
{
    public function loadView()
    {
        $hostelModel = new HostelModel();
        $hostel = $hostelModel->getHostelsList();
        $sectionModel = new SectionModel();
        $sections = $sectionModel->loadSections();
        $feecategoriesModel = new FeeCategoriesModel();
        $concessiontype = $feecategoriesModel->feeCategories();
        return view('Registration.Students.student',compact('hostel','concessiontype', 'sections'));
    }

    public function add(Request $request)
    {
        $studentVO = new StudentVO();
        $branchModel = new BranchModel();
        $donorModel = new AllocateDonorModel();
        $allocateDonorVO = new AllocateDonorVO();
        $studentModel = new StudentModel();
        $feeCategoryVO = new FeeCategoryVO();
        $feeParticularVO = new FeeParticularsVO();
        $feecategoryModel = new FeeCategoriesModel();
        $feparticularModel = new FeeParticularsModel();
        $primary = $request->input('primary');
        $dob = new \Carbon\Carbon($request->birth_date);
        $DoReg = new \Carbon\Carbon($request->register_date);

        if($primary==null) {
            $studentVO->setOrgId(request()->session()->get('ORG_ID'));
            $branchId = $request->input('branch');
            // $branchCode = $branchModel->getBranchCode($branchId);
            // $newbranchCode = str_replace('-', '', $branchCode);
            // $stringbranchcode = substr($newbranchCode,17,6);
            $studentVO->setBranchId($branchId);
            // $studentCode = $stringbranchcode.''.$request->input('code');
            $studentCode = $request->input('code');
            $studentVO->setStudentCode($studentCode);
            $studentVO->setHostelId($request->input('hostel'));
            $studentVO->setRollNo($request->input('roll_no'));
            $studentVO->setClass($request->input('class'));
            $studentVO->setSection($request->input('section'));
            $studentVO->setBayForm($request->input('bayForm'));
            $studentVO->setFullName($request->input('studentfullname'));
            $studentVO->setBirthPlace($request->input('birth_place'));
            $studentVO->setDOB($request->input('birth_date'));
            $studentVO->setHomeLandLine($request->input('home_landline'));
            $studentVO->setNationality($request->input('nationality'));
            $studentVO->setRegisterDate($request->input('register_date'));
            $studentVO->setGender($request->input('gender'));
            $studentVO->setConcession($request->input('concession'));
            $studentVO->setStatus($request->input('status'));
            $file = $request->file('image');
            if($file!=null){
                $destination = base_path() . '/uploads/students/';
                $guessFileExtension = $request->file('image')->guessExtension();
                $file->move($destination, $request->studentfullname . '.' . $guessFileExtension);
                $studentVO->setStudentPic($request->studentfullname . '.' . $guessFileExtension);}
            else {
                $studentVO->setStudentPic($request->input('updatedPic'));
            }
            $studentVO->setCurrentAddress($request->input('curr_add'));
            $studentVO->setPermanentAddress($request->input('perm_add'));
            $studentVO->setReligion($request->input('religion'));
            $studentVO->setEmgName($request->input('emg_name'));
            $studentVO->setEmgMobile($request->input('emg_mobile'));
            $studentVO->setEmgRelation($request->input('emg_relation'));
            $studentVO->setHostelId($request->input('hostel'));
            $studentVO->setEmgLandline($request->input('emg_landline'));
            $studentVO->setEmgAddress($request->input('emg_add'));
            $studentVO->setCreatedBy($this->getUserName());
            // $concession = $request->input('concession');
            // if(count($concession)>0) {
            //     $studentVO->setConcessionType($concession);
            // }
            // else{
            //     $studentVO->setConcessionType($request->input('feecategory'));
            // }
            $studentModel->saveStudentInfo($studentVO);
            if ($studentVO->getError()) {
                return $this->getMessageWithRedirect($studentVO->getErrorCode());
            } else {
                $guardianVO = new GuardiansVO();
                $guardianVO->setOrgId(request()->session()->get('ORG_ID'));
                $guardianVO->setBranchId($request->input('branch'));
                $guardianVO->setStudentId($studentVO->getStudentId());
                $guardianVO->setFullName($request->input('guardianfullname'));
                $guardianVO->setRelation($request->input('relation'));
                $guardianVO->setCnic($request->input('cnic'));
                $guardianVO->setEmail($request->input('email'));
                $guardianVO->setCellPhone($request->input('cellphone'));
                $guardianVO->setLandline($request->input('landline'));
                $guardianVO->setOccupation($request->input('guardian_occupation'));
                $guardianVO->setJobTitle($request->input('job_title'));
                $guardianVO->setBusinessName($request->input('business_name'));
                $guardianVO->setBusinessAddress($request->input('business_add'));
                $guardianVO->setRegistrationDate($request->input('register_date'));
                $guardianVO->setCreatedBy($this->getUserName());
                $guardianModel = new GuardianModel();
                $guardianModel->saveGuardianInfo($guardianVO);
                $allocateDonorVO->setOrgId(1);
                $allocateDonorVO->setStudentId($studentVO->getStudentId());
                $allocateDonorVO->setDonorId($request->input('donor'));
                $allocateDonorVO->setBranchId($request->input('branch'));
                $allocateDonorVO->setClassId($request->input('class'));
                $allocateDonorVO->setCreatedBy($this->getUserName());
                $donorModel->add($allocateDonorVO);
                $feeCategoryVO->setFeeHeader($request->input('feeheader'));
                $feeCategoryVO->setCategoryName($request->input('feecategory'));
                $feeCategoryVO->setDescription($request->input('feecategory'));
                $feeCategoryVO->setCreatedBy($this->getUserName());
                $feecategoryModel->saveFeeCategory($feeCategoryVO);
                $feeParticularVO->setCategoryId($feeCategoryVO->getCategoryId());
                $feeParticularVO->setParticularName($request->input('feecategory'));
                $feeParticularVO->setCreatedBy($this->getUserName());
                $feparticularModel->saveFeeParticular($feeParticularVO);
                $result = $request->input('siblings');
                if ($result!=null) {
                    foreach ($result as $key => $value) {
                        $siblingVO = new SiblingVO();
                        $siblingVO->setBranchId($request->input('branch'));
                        $siblingVO->setOrgID(request()->session()->get('ORG_ID'));
                        $siblingVO->setSiblingName($value);
                        $siblingVO->setStudentId($studentVO->getStudentId());
                        $siblingVO->setGuardianId($guardianVO->getGuardianId());
                        $siblingModel = new SiblingModel();
                        $siblingModel->saveSiblingInfo($siblingVO);
                    }
                }
                session::flash('student', "Student Record Added Successfully");
                return redirect('register/student');
            }
        }
        else{
            $studentVO = new StudentVO();
            $studentVO->setStudentId($primary);
            $studentVO->setOrgId(request()->session()->get('ORG_ID'));
            $studentVO->setBranchId($request->input('branch'));
            $studentVO->setStudentCode($request->input('code'));
            $studentVO->setHostelId($request->input('hostel'));
            $studentVO->setRollNo($request->input('roll_no'));
            $studentVO->setClass($request->input('class'));
            $studentVO->setSection($request->input('section'));
            $studentVO->setBayForm($request->input('bayForm'));
            $studentVO->setFullName($request->input('studentfullname'));
            $studentVO->setBirthPlace($request->input('birth_place'));
            $studentVO->setDOB($dob);
            $studentVO->setHomeLandLine($request->input('home_landline'));
            $studentVO->setNationality($request->input('nationality'));
            $studentVO->setRegisterDate($DoReg);
            $studentVO->setGender($request->input('gender'));
            $studentVO->setStatus($request->input('status'));
            $studentVO->setConcession($request->input('concession'));
            $file = $request->file('image');
            if($file!=null){
                $destination = base_path() . '/uploads/students/';
                $guessFileExtension = $request->file('image')->guessExtension();
                if(check_image_format($guessFileExtension)){
                    $file->move($destination, $request->studentfullname . '.' . $guessFileExtension);
                    $studentVO->setStudentPic($request->studentfullname . '.' . $guessFileExtension);
                }
                else{
                    session::flash('student',  __('messages.image-format'));
                    return redirect()->back();
                }
            }
            else {
                $studentVO->setStudentPic($request->input('updatedPic'));
            }
            $studentVO->setCurrentAddress($request->input('curr_add'));
            $studentVO->setPermanentAddress($request->input('perm_add'));
            $studentVO->setReligion($request->input('religion'));
            $studentVO->setEmgName($request->input('emg_name'));
            $studentVO->setEmgMobile($request->input('emg_mobile'));
            $studentVO->setEmgRelation($request->input('emg_relation'));
            $studentVO->setHostelId($request->input('hostel'));
            $studentVO->setEmgLandline($request->input('emg_landline'));
            $studentVO->setEmgAddress($request->input('emg_add'));
            $studentVO->setModifiedBy($this->getUserName());
            $studentVO->setModifiedAt($this->getTimeStamp());
            $studentModel = new StudentModel();
            $studentModel->updateStudentInfo($studentVO);
            //Guardian Info
            $guardianVO = new GuardiansVO();
            $guardianVO->setOrgId(request()->session()->get('ORG_ID'));
            $guardianVO->setBranchId($request->input('branch'));
            $guardianVO->setStudentId($primary);
            $guardianVO->setFullName($request->input('guardianfullname'));
            $guardianVO->setRelation($request->input('relation'));
            $guardianVO->setCnic($request->input('cnic'));
            $guardianVO->setEmail($request->input('email'));
            $guardianVO->setCellPhone($request->input('cellphone'));
            $guardianVO->setLandline($request->input('landline'));
            $guardianVO->setOccupation($request->input('guardian_occupation'));
            $guardianVO->setJobTitle($request->input('job_title'));
            $guardianVO->setBusinessName($request->input('business_name'));
            $guardianVO->setBusinessAddress($request->input('business_add'));
            $guardianVO->setRegistrationDate($request->input('register_date'));
            $guardianVO->setModifiedBy($this->getUserName());
            $guardianVO->setModifiedAt($this->getTimeStamp());
            $guardianModel = new GuardianModel();
            $guardianModel->updateGuardianInfo($guardianVO);
            $result = $request->input('siblings');
            if ($result!=null) {
                foreach ($result as $key => $value) {
                    $siblingVO = new SiblingVO();
                    $siblingVO->setBranchId($request->input('branch'));
                    $siblingVO->setOrgID(request()->session()->get('ORG_ID'));
                    $siblingVO->setSiblingName($value);
                    $siblingVO->setStudentId($primary);
                    $siblingVO->setGuardianId($request->input('guardianId'));
                    $siblingModel = new SiblingModel();
                    $siblingVO->setModifiedBy($this->getUserName());
                    $siblingVO->setModifiedAt($this->getTimeStamp());
                    $siblingModel->updateSiblingInfo($siblingVO);
                }
            }
            session::flash('student', "Student Record Updated Successfully");
            return redirect('register/student');
        }
    }

}
