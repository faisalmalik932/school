<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/17/2017
 * Time: 2:00 PM
 */

namespace App\Models\Finance\Purchase;


use App\Models\BaseModel;
use App\Vos\FinanceVOS\PurchaseVOS\purchaseOrderVO;

class PurchaseOrderModel extends BaseModel
{
    protected $primaryKey = 'PURCHASE_ORDER_ID';
    protected $table = 'fin_purchase_order';
    protected $fillable = ['SUPPLIER_ID','PO_NUMBER','SUPPLIER_CREDIT','SUPPLIER_CURRENCY','SUPPLIER_REFERENCE','ORDER_DATE','DELIVER_TO'];

    public function addPurchaseOrder(purchaseOrderVO $purchaseOrderVO)
    {
        $this->SUPPLIER_ID = $purchaseOrderVO->getSupplierId();
        $this->PO_NUMBER = $purchaseOrderVO->getPONumber();
        $this->SUPPLIER_CREDIT = $purchaseOrderVO->getSupplierCredit();
        $this->SUPPLIER_CURRENCY = $purchaseOrderVO->getSupplierCurrency();
        $this->SUPPLIER_REFERENCE = $purchaseOrderVO->getOrderDate();
        $this->DELIVER_TO = $purchaseOrderVO->getDeliverTo();
        $this->ORDER_DATE = $purchaseOrderVO->getOrderDate();
        $this->save();
        $purchaseOrderVO->setPurchaseOrderId($this->PURCHASE_ORDER_ID);
        return $purchaseOrderVO;

    }

    public function LoadPONumber()
    {
        $poNumber = $this->count();
        return $poNumber;
    }

    public function getPONumber()
    {
        $poNumber = $this->select('PO_NUMBER')->get();
        return $poNumber;
    }

}