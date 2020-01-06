<?php

namespace App\Http\Controllers\Platform;

use App\Http\Controllers\BaseController;
use App\Models\Platform\BranchModel;
use App\Models\Finance\BankAccounts\BankAccountModel;
use Illuminate\Http\Request;
use App\Vos\BranchVOS\BranchVO;
use DB;
use Illuminate\Support\Facades\Session;

class BranchesController extends BaseController
{
    public function loadView()
    {
        $bank = BankAccountModel::OrderBy('BANK_NAME', 'Asc')->pluck('BANK_NAME', 'ACCOUNT_ID');
        return view('Platform.branches', compact('bank'));

    }

    public function add(Request $request)
    {
        // if($date->gt(\Carbon\Carbon::now()->addWeeks('4')) || $date->lt(\Carbon\Carbon::now()->subDays('1'))){
        //     session::flash('branch','Date is not valid!');
        //     return redirect()->back()->withInput();
        // }
        $date = \Carbon\Carbon::parse($request->reg_date)->format('Y-m-d');
        $branchVO = new BranchVO();
        $branchModel = new BranchModel();
        $branchVO->setBranchId($request->input('primary'));
        $branchVO->setOrgId('1');
        $string = $request->input('branch');
        $result = '';
        foreach (preg_split('#[^a-z]+#i', $string, -1, PREG_SPLIT_NO_EMPTY) as $word) {
            $result .= $word[0];
        }
        $branchVO->setBranchCode($request->input('branchcode'));
        $branchVO->setBranchName($request->input('branch'));
        $branchVO->setStateId($request->input('state'));
        $branchVO->setCityID($request->input('city'));
        $branchVO->setFeefine($request->input('latefine'));
        $branchVO->setAddress($request->input('address'));
        $branchVO->setLandline($request->input('landLine'));
        $branchVO->setFaxNumb($request->input('fax'));
        $branchVO->setEmail($request->input('email'));
        $branchVO->setBranchType($request->input('branch_type'));
        $branchVO->setBranchLevel($request->input('branch_level'));
        $branchVO->setRegisterDate($date);
        $branchVO->setDescription($request->input('description'));
        $branchVO->setStatus($request->input('status'));
        $file = $request->file('branchlogo');
        if(count($file)>0){
            $destination = base_path() . '/uploads/branches/';
            $guessFileExtension = $request->file('branchlogo')->guessExtension();
             if(check_image_format($guessFileExtension)){
            $file->move($destination, $request->branch . '.' . $guessFileExtension);
            $branchVO->setBranchLogo($request->branch . '.' . $guessFileExtension);
            }
            else{
                session::flash('employee',  __('messages.image-format'));
                return redirect()->back();
            }
        }
        else {
            $branchVO->setBranchLogo($request->input('updatedPic'));
        }
        if($branchVO->getBranchId() <= 0 || $branchVO->getBranchId() == '') {
            $branchVO->setCreatedBy($this->getUserName());
            $branchModel->saveBranchInfo($branchVO);
            if ($branchVO->getError()) {
                return $this->getMessageWithRedirect($branchVO->getErrorCode());
            } else {
                Session::flash('branch', "Branch Added Successfully");
                return redirect('platform/branches/');
            }
        }
        else {
            $branchVO->setModifiedBy($this->getUserName());
            $branchVO->setModifiedAt($this->getTimeStamp());
            $branchModel->updateBranch($branchVO);
            Session::flash('branch', "Branch Updated/Deleted Successfully");
            return redirect('platform/branches/');
        }
    }
    public function showBranches()
    {
        return view('Branches.branchList');
    }

    public function getBranchName($orgId, $branchId) {
        $branchModel = new BranchModel();
        return $branchModel->getBranchName($orgId, $branchId);
    }

}
