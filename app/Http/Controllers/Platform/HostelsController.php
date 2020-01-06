<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/21/2017
 * Time: 11:09 AM
 */

namespace App\Http\Controllers\Platform;


use App\Http\Controllers\BaseController;
use App\Models\Platform\HostelModel;
use App\Vos\RegistrationVOS\HostelVO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HostelsController extends BaseController
{
    public function loadView()
    {
        return view('Platform.hostel');
    }

    public function add(Request $request)
    {
        $hostelVO = new HostelVO();
        $hostelVO->setOrgId(1);
        $hostelVO->setHostelId($request->input('primary'));
        $hostelVO->setBranchId($request->input('branch'));
        $hostelVO->setHostelName($request->input('hostelName'));
        $hostelVO->setAddress($request->input('hosteladdress'));
        $hostelVO->setHostelManager($request->input('hostelmanager'));
        $hostelVO->setHostelType($request->input('hosteltype'));
        $hostelModel = new HostelModel();
        if($hostelVO->getHostelId() <= 0 || $hostelVO->getHostelId() == '') {
            $hostelVO->setCreatedBy($this->getUserName());
            $hostelModel->saveHostelInfo($hostelVO);
            if ($hostelVO->getError()) {
                return $this->getMessageWithRedirect($hostelVO->getErrorCode());
            } else {
                Session::flash('hostel', "Hostel Added Successfully");
                return redirect('platform/hostels');
            }
        }
        else
        {
            $hostelVO->setModifiedBy($this->getUserName());
            $hostelVO->setModifiedAt($this->getTimeStamp());
            $hostelModel->updateHostelInfo($hostelVO);
            Session::flash('hostel', "Hostel Updated Successfully");
            return redirect('platform/hostels');
        }
    }
}