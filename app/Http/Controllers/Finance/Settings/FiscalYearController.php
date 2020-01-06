<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/7/2017
 * Time: 7:47 PM
 */

namespace App\Http\Controllers\Finance\Settings;


use App\Http\Controllers\BaseController;
use App\Models\Finance\Settings\FiscalYearModel;
use App\Vos\FinanceVOS\Settings\FiscalYearVO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FiscalYearController extends BaseController
{
    public function loadView()
    {
        return view('Finance.Settings.fiscalYear');
    }

    public function add(Request $request)
    {
        $fiscalyearVO = new FiscalYearVO();
         if($fiscalyearVO->getFiscalyearId() > 0 || $fiscalyearVO->getFiscalyearId() != '') {
        $date = new \Carbon\Carbon($request->startdate);
        if($date->lt(\Carbon\Carbon::now())){
            Session::flash('fiscalyear', __('messages.fiscal_year.date'));
            return redirect()->back();
        }
        }
        $fiscalyearVO->setFiscalyearId($request->input('primary'));
        $fiscalyearVO->setStartdate($request->input('startdate'));
        $fiscalyearVO->setEnddate($request->input('enddate'));
        $fiscalyearVO->setIsClosed($request->input('status'));
        $fiscalYearModel = new FiscalYearModel();
        if($fiscalyearVO->getFiscalyearId() <= 0 || $fiscalyearVO->getFiscalyearId() == '') {
            $fiscalyearVO->setCreatedBy($this->getUserName());
            $fiscalYearModel->addFiscalYear($fiscalyearVO);
            if ($fiscalyearVO->getError()) {
                return $this->getMessageWithRedirect($fiscalyearVO->getErrorCode());
            } else {
                Session::flash('fiscalyear', "Fiscal Year Added Successfully");
                return redirect('finance/settings/fiscalYear');
            }
        }
        else
        {
            $fiscalyearVO->setModifiedBy($this->getUserName());
            $fiscalyearVO->setModifiedAt($this->getTimeStamp());
            $fiscalYearModel->updateFiscalYear($fiscalyearVO);
            Session::flash('fiscalyear', "Fiscal Year Added Successfully");
            return redirect('finance/settings/fiscalYear');
        }
    }

}