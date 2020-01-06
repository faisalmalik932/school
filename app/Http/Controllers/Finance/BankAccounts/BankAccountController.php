<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/7/2017
 * Time: 5:50 PM
 */

namespace App\Http\Controllers\Finance\BankAccounts;


use App\Http\Controllers\BaseController;
use App\Models\Finance\BankAccounts\BankAccountModel;
use App\Models\Finance\Settings\AccountHeadModel;
use App\Models\Finance\Settings\CurrencyModel;
use App\Vos\FinanceVOS\BankAccountVOS\BankAccountVO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BankAccountController extends BaseController
{
    public function loadView()
    {
        $currencyModel = new CurrencyModel();
        $currency = $currencyModel->loadCurrencies();
        $accountHeads = new AccountHeadModel();
        $accountHead = $accountHeads->loadAccountHeadsByClassType();
        return view('Finance.Banking&Ledger.bankingAccounts')->with('currency',$currency)->with('accountheads',$accountHead);
    }

    public function add(Request $request)
    {
        $bankAccountVO = new BankAccountVO();
        $bankAccountVO->setBankaccountId($request->input('primary'));
        $bankAccountVO->setBankaccountName($request->input('accounttitle'));
        $bankAccountVO->setBankaccountNumber($request->input('accountnumber'));
        $bankAccountVO->setBankName($request->input('bankname'));
        $bankAccountVO->setAccountType($request->input('accounttype'));
        $bankAccountVO->setBankAddress($request->input('bankaddress'));
        $bankAccountVO->setDefaultCurrentAccount($request->input('currencyaccount'));
        $bankAccountVO->setAccountCurrency($request->input('accountcurrency'));
        $bankAccountVO->setGlCode($request->input('accountcode'));
        $bankAccountVO->setChargesAccount($request->input('chargesaccount'));
        $bankAccountModel = new BankAccountModel();
        if($bankAccountVO->getBankaccountId()<= 0 || $bankAccountVO->getBankaccountId() == '') {
            $bankAccountVO->setCreatedBy($this->getUserName());
            $bankAccountModel->saveBankAccountInfo($bankAccountVO);
            if ($bankAccountVO->getError()) {
                return $this->getMessageWithRedirect($bankAccountVO->getErrorCode());
            } else {
                Session::flash('bankaccount', "Bank Account Added Successfully");
                return redirect('finance/bank-accounts');
            }
        }
        else{
            $bankAccountVO->setModifiedBy($this->getUserName());
            $bankAccountVO->setModifiedAt($this->getTimeStamp());
            $bankAccountModel->UpdateBankAccountInfo($bankAccountVO);
            Session::flash('bankaccount', "Bank Account Updated Successfully");
            return redirect('finance/bank-accounts');
        }

    }
}