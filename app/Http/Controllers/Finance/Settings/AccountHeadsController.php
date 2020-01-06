<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/30/2017
 * Time: 2:35 PM
 */

namespace App\Http\Controllers\Finance\Settings;


use App\Http\Controllers\BaseController;
use App\Models\Finance\Settings\AccountClassModel;
use App\Models\Finance\Settings\AccountHeadModel;
use App\Models\Finance\Settings\FiscalYearModel;
use App\Vos\FinanceVOS\Settings\AccountHeadVO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AccountHeadsController extends BaseController
{
    public function loadView()
    {
        $accountHeadModel = new AccountClassModel();
        $accountclass = $accountHeadModel->loadAccountHeads();
        return view('Finance.AccountHeads.accountHeads')->with('accountclass',$accountclass);
    }

    public function add(Request $request)
    {
        $fiscalYearModel = new FiscalYearModel();
        $accountHeadModel = new AccountHeadModel();
        $fiscalYear = $fiscalYearModel->getCurrentFiscalYear();
        if(!$fiscalYear->first()){
            $fiscalyear = "";
        }
        else{
         $fiscalyear = $fiscalYear->first()->FISCAL_YEAR;
        }


        $accountHeadVO = new AccountHeadVO();
        $accountHeadVO->setAccountHeadId($request->input('primary'));
        $accountHeadVO->setOrgId($this->getOrgID());
        $accountHeadVO->setAccountHead($request->input('accounthead'));
        $accountHeadVO->setParentID($request->input('accountheads'));
        if ($accountHeadVO->getParentID() > 0) {
            $accountHeadVO->setHasChild("YES");
        }
        $accountHeadVO->setFiscalYear($fiscalyear);
        $accountHeadVO->setAccountClass($request->input('accountClass'));
        $accountHeadVO->setAccountHeadCode($request->input('accountcode'));
        $accountHeadVO->setDescription($request->input('description'));

        if($accountHeadVO->getAccountHeadId() <= 0 || $accountHeadVO->getAccountHeadId() == '') {
            $accountHeadVO->setCreatedBy($this->getUserName());
            $accountHeadModel->saveAccountHeads($accountHeadVO);
            if ($accountHeadVO->getError()) {
                return $this->getMessageWithRedirect($accountHeadVO->getErrorCode());
            } else {
                Session::flash('accounthead', "Account Head Added Successfully");
                return redirect('finance/account-heads');
            }
        }
        else{
            $accountHeadVO->setModifiedBy($this->getUserName());
            $accountHeadVO->setModifiedAt($this->getTimeStamp());
            $accountHeadModel->UpdateAccountHeads($accountHeadVO);
            Session::flash('accounthead', "Account Head Updated Successfully");
            return redirect('finance/account-heads');
        }
    }
}