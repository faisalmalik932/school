<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/8/2017
 * Time: 1:03 PM
 */

namespace App\Http\Controllers\Finance\Taxes;


use App\Http\Controllers\BaseController;
use App\Models\Finance\Settings\AccountHeadModel;
use App\Models\Finance\Taxes\TaxesModel;
use App\Vos\FinanceVOS\TaxVOS\TaxVO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TaxesController extends BaseController
{
    public function loadView()
    {
        $accountHeads = new AccountHeadModel();
        $accountHead = $accountHeads->loadAccountHeads();
        return view('Finance.Banking&Ledger.taxes')->with('accountheads',$accountHead);
    }

    public function add(Request $request)
    {
        $taxVO = new TaxVO();
        $taxVO->setTaxId($request->input('primary'));
        $taxVO->setDescription($request->input('description'));
        $taxVO->setDefaultRate($request->input('defaultrate'));
        $taxVO->setSalesAccount($request->input('salesaccount'));
        $taxVO->setPurchaseAccount($request->input('purchaseaccount'));
        $taxModel = new TaxesModel();
        if($taxVO->getTaxId() <= 0 || $taxVO->getTaxId() == '') {
            $taxVO->setCreatedBy($this->getUserName());
            $taxModel->saveTaxType($taxVO);
            Session::flash('tax', "Tax Added Successfully");
            return redirect('finance/taxes/tax-type');
        }
        else
        {
            $taxVO->setModifiedBy($this->getUserName());
            $taxVO->setModifiedAt($this->getTimeStamp());
            $taxModel->updateTaxType($taxVO);
            Session::flash('tax', "Tax Added Successfully");
            return redirect('finance/taxes/tax-type');
        }
    }

}