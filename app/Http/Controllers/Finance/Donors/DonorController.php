<?php
/**
 * ************************************************************************
 *  *
 *  * PROSIGNS CONFIDENTIAL
 *  * __________________
 *  *
 *  *  Copyright (c) 2017. Prosigns Technologies
 *  *  All Rights Reserved.
 *  *
 *  * NOTICE:  All information contained herein is, and remains
 *  * the property of Prosigns Technologies and its suppliers,
 *  * if any.  The intellectual and technical concepts contained
 *  * herein are proprietary to Prosigns Technologies
 *  * and its suppliers and may be covered by Pakistan and Foreign Patents,
 *  * patents in process, and are protected by trade secret or copyright law.
 *  * Dissemination of this information or reproduction of this material
 *  * is strictly forbidden unless prior written permission is obtained
 *  * from Prosigns Technologies.
 *
 */

/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/9/2017
 * Time: 1:08 PM
 */

namespace App\Http\Controllers\Finance\Donors;


use App\Http\Controllers\BaseController;
use App\Models\Finance\Donors\DonorModel;
use App\Models\Platform\ClassModel;
use App\Vos\FinanceVOS\DonorsVOS\DonorVO;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DonorController extends BaseController
{

    public function loadView()
    {
        return view('Finance.Donors.donor');
    }

    public function add(Request $request)
    {
            $donorVO = new DonorVO();
            $donorVO->setOrgId('1');
            $donorVO->setDonorId($request->input('primary'));
            $donorVO->setDonorName($request->input('donor_name'));
            $donorVO->setGender($request->input('gender'));
            $donorVO->setCountry($request->input('country'));
            $donorVO->setState($request->input('state'));
            $donorVO->setCity($request->input('city'));
            $donorVO->setZipCode($request->input('zip_code'));
            $donorVO->setMobileNumber($request->input('donor_mobile'));
            $donorVO->setNic($request->input('donornic'));
            $donorVO->setEmail($request->input('donor_email'));
            $donorVO->setAddress($request->input('address'));
            $donorVO->setDonorType($request->input('type'));
            $donorVO->setDonorCategory($request->input('category'));
            $donorVO->setEmergencyContactName($request->input('emg_name'));
            $donorVO->setEmergencyContactNumber($request->input('emg_contact'));
            $donorModel = new DonorModel();
            if($donorVO->getDonorId() <= 0 || $donorVO->getDonorId() == '') {
                $donorVO->setCreatedBy($this->getUserName());
                $donorModel->saveDonorInfo($donorVO);
            if ($donorVO->getError()) {
                return $this->getMessageWithRedirect($donorVO->getErrorCode());
            } else {
                Session::flash('donor', "Donor Info Added Successfully");
                return redirect('finance/donors/');
            }
        }
        else
            {
                $donorVO->setModifiedBy($this->getUserName());
                $donorVO->setModifiedAt($this->getTimeStamp());
                $donorModel->updateDonorInfo($donorVO);
                Session::flash('donor', "Donor Info Updated Successfully");
                return redirect('finance/donors');
            }
    }
}