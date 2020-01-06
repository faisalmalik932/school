<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/7/2017
 * Time: 7:41 PM
 */

namespace App\Http\Controllers\Finance\Settings;


use App\Http\Controllers\BaseController;
use App\Models\Finance\Settings\AccountHeadModel;
use App\Models\Finance\Settings\CurrencyModel;
use App\Models\Finance\Settings\SupplierModel;
use App\Models\Finance\Vouchers\VoucherHeadModel;
use App\Vos\FinanceVOS\Settings\SupplierVO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SupplierController extends BaseController
{
    public function loadView()
    {
        $accountHeads = new AccountHeadModel();
        $accountHead = $accountHeads->loadAccountHeadsByClassType();
        $currencyModel = new CurrencyModel();
        $currency = $currencyModel->loadCurrencies();
        return view('Finance.Settings.suppliers')->with('accountheads', $accountHead)->with('currency',$currency);
    }

    public function add(Request $request)
    {
        $supplierVO = new SupplierVO();
        $supplierVO->setSupplierId($request->input('primary'));
        $supplierVO->setSupplierName($request->input('suppliername'));
        $supplierVO->setBankName($request->input('accountname'));
        $supplierVO->setBankaccountTitle($request->input('accounttitle'));
        $supplierVO->setBankaccountNumber($request->input('accountnumber'));
        $supplierVO->setGstNo($request->input('gstnumber'));
        $supplierVO->setCreditLimit($request->input('credit'));
        $supplierVO->setPaymentTerm($request->input('paymentterm'));
        $supplierVO->setCurrency($request->input('currency'));
        $supplierVO->setPayableAccount($request->input('accountpayable'));
        $supplierVO->setPurchaseAccount($request->input('purchaseaccount'));
        $supplierVO->setDiscountAccount($request->input('discountaccount'));
        $supplierVO->setContactPersonName($request->input('contactpersonname'));
        $supplierVO->setMobileNumber($request->input('mobilenumber'));
        $supplierVO->setEmail($request->input('email'));
        $supplierVO->setWebsite($request->input('website'));
        $supplierVO->setFaxNo($request->input('faxnumber'));
        $supplierVO->setLandLine($request->input('landline'));
        $supplierVO->setAddress($request->input('address'));
        $supplierVO->setDescription($request->input('description'));
        $supplierModel = new SupplierModel();
        if($supplierVO->getSupplierId() <= 0 || $supplierVO->getSupplierId() == '') {
            $supplierVO->setCreatedBy($this->getUserName());
            $supplierModel->saveSupplierInfo($supplierVO);
            if ($supplierVO->getError()) {
                return $this->getMessageWithRedirect($supplierVO->getErrorCode());
            } else {
                Session::flash('supplier', "Supplier Added Successfully");
                return redirect('finance/settings/suppliers');
            }
        }
        else{
                $supplierVO->setModifiedBy($this->getUserName());
                $supplierVO->setModifiedAt($this->getTimeStamp());
                $supplierModel->updateSupplierInfo($supplierVO);
                Session::flash('supplier', "Supplier Added Successfully");
                return redirect('finance/settings/suppliers');
            }


    }

}