<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/7/2017
 * Time: 7:46 PM
 */

namespace App\Http\Controllers\Finance\Settings;


use App\Http\Controllers\BaseController;
use App\Models\Finance\Settings\CurrencyModel;
use App\Vos\FinanceVOS\Settings\CurrencyVO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CurrencyController extends BaseController
{
    public function loadView()
    {
        return view('Finance.Settings.currency');
    }

    public function add(Request $request)
    {
        $currencyVO = new CurrencyVO();
        $currencyVO->setCurrencyId($request->input('primary'));
        $currencyVO->setCurrencyAbbreviation($request->input('abbreviation'));
        $currencyVO->setCurrencySymbol($request->input('currencysymbol'));
        $currencyVO->setCurrencyName($request->input('currencyname'));
        $currencyVO->setHundrethsname($request->input('hundrethsname'));
        $currencyVO->setCountry($request->input('country'));
        $currencyModel = new CurrencyModel();
        if($currencyVO->getCurrencyId() <= 0 || $currencyVO->getCurrencyId() == '') {
            $currencyVO->setCreatedBy($this->getUserName());
            $currencyModel->saveCurrencyInfo($currencyVO);
            if ($currencyVO->getError()) {
                return $this->getMessageWithRedirect($currencyVO->getErrorCode());
            } else {
                Session::flash('currency', "Currency Added Successfully");
                return redirect('finance/settings/currencies');
            }
        }
        else{
            $currencyVO->setModifiedBy($this->getUserName());
            $currencyVO->setModifiedAt($this->getTimeStamp());
            $currencyModel->updateCurrencyInfo($currencyVO);
            Session::flash('currency', "Currency Updated Successfully");
            return redirect()->back();
        }
    }
}