<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/18/2017
 * Time: 5:30 PM
 */

namespace App\Http\Controllers\Finance\Donors;


use App\Http\Controllers\BaseController;
use App\Models\Finance\Donors\AllocateDonorModel;
use App\Vos\FinanceVOS\DonorsVOS\AllocateDonorVO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class AllocateDonorController extends BaseController
{
    public function loadView()
    {
        return view('Finance/Donors/donorAllocation');
    }

    public function add(Request $request)
    {
        $allocateDonorVO = new AllocateDonorVO();
        $allocateModel = new AllocateDonorModel();
        $student = Input::get('student');
        foreach ($student as $key=>$students){
            $allocateDonorVO->setOrgId(1);
            $allocateDonorVO->setBranchId($request->input('branch'));
            $allocateDonorVO->setClassId($request->input('class'));
            $allocateDonorVO->setDonorId($request->input('donor'));
            $allocateDonorVO->setStudentId($students);
            $allocateDonorVO->setCreatedBy($this->getUserName());
            $allocateModel->add($allocateDonorVO);}
        if ($allocateDonorVO->getError()) {
            return $this->getMessageWithRedirect($allocateDonorVO->getErrorCode());
        } else {

            Session::flash('donor', "Donor Allocated Successfully");
            return redirect('finance/donors/donor-allocation');
        }
    }

}