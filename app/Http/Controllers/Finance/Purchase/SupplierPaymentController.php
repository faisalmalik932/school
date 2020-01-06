<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/11/2017
 * Time: 3:04 PM
 */

namespace App\Http\Controllers\Finance\Purchase;


use App\Http\Controllers\BaseController;
use App\Models\Finance\Purchase\PurchaseOrderModel;
use App\Models\Finance\Purchase\SupplierPaymentModel;
use App\Models\Finance\Settings\SupplierModel;
use App\Vos\FinanceVOS\PurchaseVOS\SupplierPaymentVO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SupplierPaymentController extends BaseController
{
    public function loadView()
    {
        $supplierModel = new SupplierModel();
        $supplier = $supplierModel->loadSuppliers();
        $purchaseOrderModel = new PurchaseOrderModel();
        $poNumber = $purchaseOrderModel->getPONumber();
        return view('Finance.Purchase.supplierPayment')->with('supplier',$supplier)->with('poNumber',$poNumber);
    }

    public function add(Request $request)
    {
        $supplierpaymentVO = new SupplierPaymentVO();
        $supplierpaymentModel = new SupplierPaymentModel();
        $supplierpaymentVO->setSupplierPaymentId($request->input('primary'));
        $supplierpaymentVO->setSupplierId($request->input('supplier'));
        $supplierpaymentVO->setDatePaid($request->input('datepaid'));
        $supplierpaymentVO->setBankName($request->input('bankname'));
        $supplierpaymentVO->setBankaccountTitle($request->input('accounttitle'));
        $supplierpaymentVO->setBankacountNumber($request->input('accountnumber'));
        $supplierpaymentVO->setChecqueNumber($request->input('chequeno'));
        $supplierpaymentVO->setDiscountAmount($request->input('discountamount'));
        $supplierpaymentVO->setPaymentAmount($request->input('paymentamount'));
        $supplierpaymentVO->setPoNumber($request->input('ponumber'));
        $supplierpaymentVO->setPaymentMode($request->input('paymentmode'));
        if($supplierpaymentVO->getSupplierPaymentId() <= 0 || $supplierpaymentVO->getSupplierPaymentId() == '') {
            $supplierpaymentVO->setCreatedBy($this->getUserName());
            $supplierpaymentModel->addSupplierPayment($supplierpaymentVO);
            Session::flash('supplierpayment', "Supplier Payment Added Successfully");
            return redirect('finance/purchase/supplier-payment');
        }
        else{
            $supplierpaymentVO->setModifiedBy($this->getUserName());
            $supplierpaymentVO->setModifiedAt($this->getTimeStamp());
            $supplierpaymentModel->updateSupplierPayment($supplierpaymentVO);
            Session::flash('supplierpayment', "Supplier Payment Updated Successfully");
            return redirect('finance/purchase/supplier-payment');
        }
    }

}