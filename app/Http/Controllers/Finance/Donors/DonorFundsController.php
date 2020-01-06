<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/16/2017
 * Time: 12:01 PM
 */

namespace App\Http\Controllers\Finance\Donors;


use App\Http\Controllers\BaseController;
use App\Models\Finance\Donors\DonorFundModel;
use App\Models\Finance\Donors\DonorModel;
use App\Vos\FinanceVOS\DonorsVOS\DonorFundVO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DonorFundsController extends BaseController
{
    public function loadView()
    {
        $donorModel = new DonorModel();
        $donor = $donorModel->loadDonors();
        return view('Finance.Donors.addDonorFunds')->with('donor',$donor);
    }

    public function add(Request $request)
    {
        $donorFundVO = new DonorFundVO();
        $donorFundVO->setDonorId($request->input('donorname'));
        $donorFundVO->setDonationId($request->input('primary'));
        $donorFundVO->setDescription($request->input('description'));
        $donorFundVO->setOrgId(1);
        $donorFundVO->setTransactionDate($request->input('transactiondate'));
        $donorFundVO->setAmount($request->input('amount'));
        $donorFundVO->setFundCategory($request->input('fundcategory'));
        $donorFundModel = new DonorFundModel();
        if($donorFundVO->getDonationId()<= 0 || $donorFundVO->getDonationId() == '') {
            $donorFundVO->setCreatedBy($this->getUserName());
            $donorFundModel->addDonorFunds($donorFundVO);
            Session::flash('donorfund', "Donor funds Added Successfully");
            return redirect('finance/donors/funds');
        }
        else{
            $donorFundVO->setModifiedBy($this->getUserName());
            $donorFundVO->setModifiedAt($this->getTimeStamp());
            $donorFundModel->updateDonorFunds($donorFundVO);
            Session::flash('donorfund', "Donorfund Updated Successfully");
            return redirect('finance/donors/funds');
        }
    }

}