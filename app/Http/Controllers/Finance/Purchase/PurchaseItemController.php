<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/11/2017
 * Time: 11:39 AM
 */

namespace App\Http\Controllers\Finance\Purchase;


use App\Http\Controllers\BaseController;
use App\Models\Finance\Purchase\PurchaseItemModel;
use App\Models\Finance\Purchase\PurchaseOrderModel;
use App\Models\Finance\Settings\CurrencyModel;
use App\Models\Finance\Settings\SupplierModel;
use App\Vos\FinanceVOS\PurchaseVOS\purchaseItemVO;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Vos\FinanceVOS\PurchaseVOS\purchaseOrderVO;

class PurchaseItemController extends BaseController
{
    public function loadView()
    {
        $supplierModel = new SupplierModel();
        $supplier = $supplierModel->loadSuppliers();
        $currencyModel = new CurrencyModel();
        $currency = $currencyModel->loadCurrencies();
        $purchaseOrderModel = new PurchaseOrderModel();
        $poNumber = $purchaseOrderModel->LoadPONumber();
        return view('Finance.Purchase.purchaseItem')->with('supplier',$supplier)->with('currency',$currency)->with('ponumber',$poNumber);
    }

    public function add(Request $request)
    {
        $purchaseorderVO = new PurchaseOrderVO();
        $purchaseOrderModel = new PurchaseOrderModel();
        $purchaseorderVO->setSupplierId($request->input('supplier'));
        $purchaseorderVO->setPONumber($request->input('ponumber'));
        $purchaseorderVO->setSupplierCredit($request->input('suppliercredit'));
        $purchaseorderVO->setSupplierCurrency($request->input('currency'));
        $purchaseorderVO->setSupplierReference($request->input('supplierreference'));
        $purchaseorderVO->setOrderDate($request->input('orderdate'));
        $purchaseorderVO->setDeliverTo($request->input('deliveryperson'));
        $purchaseorderVO->setCreatedBy($this->getUserName());
        $purchaseOrderModel->addPurchaseOrder($purchaseorderVO);

        $purchaseitemVO = new purchaseItemVO();
        $purchaseItemModel = new PurchaseItemModel();
        $allocations = $request->input('tabledata');
        $value = json_decode($allocations, true);
        $purchaseItemList = new Collection();
        for ($i = 0; $i < count($value); $i++) {
            $purchaseitemVO = new purchaseItemVO();
            $purchaseitemVO->setPurchaseOrderId($purchaseorderVO->getPurchaseOrderId());
            $purchaseitemVO->setItemDescription($value[$i]['item']);
            $purchaseitemVO->setQuantity($value[$i]['quantity']);
            $purchaseitemVO->setDeliveryDate($value[$i]['deliverydate']);
            $purchaseitemVO->setPrice($value[$i]['price']);
            $purchaseitemVO->setTotalPrice($value[$i]['total']);
            $purchaseitemVO->setCreatedBy($this->getUserName());
            $purchaseItemList->add($purchaseitemVO);
        }
            if ($purchaseItemList->count() > 0) {
            $purchaseItemModel->addPurchaseItem($purchaseItemList);
        }
       return redirect('finance/purchase/purchase-order');
    }
}