<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/15/2017
 * Time: 4:37 PM
 */

namespace App\Vos\FinanceVOS\PurchaseVOS;


use App\Vos\BaseVO;

class purchaseOrderVO extends BaseVO
{
    protected $purchaseOrderId;
    protected $PONumber;
    protected $supplierId;
    protected $supplierCredit;
    protected $supplierCurrency;
    protected $supplierReference;
    protected $orderDate;
    protected $deliverTo;

    /**
     * @return mixed
     */
    public function getPONumber()
    {
        return $this->PONumber;
    }

    /**
     * @param mixed $PONumber
     */
    public function setPONumber($PONumber)
    {
        $this->PONumber = $PONumber;
    }


    /**
     * @return mixed
     */

    public function getPurchaseOrderId()
    {
        return $this->purchaseOrderId;
    }

    /**
     * @param mixed $purchaseOrderId
     */
    public function setPurchaseOrderId($purchaseOrderId)
    {
        $this->purchaseOrderId = $purchaseOrderId;
    }

    /**
     * @return mixed
     */
    public function getSupplierId()
    {
        return $this->supplierId;
    }

    /**
     * @param mixed $supplierId
     */
    public function setSupplierId($supplierId)
    {
        $this->supplierId = $supplierId;
    }

    /**
     * @return mixed
     */
    public function getSupplierCredit()
    {
        return $this->supplierCredit;
    }

    /**
     * @param mixed $supplierCredit
     */
    public function setSupplierCredit($supplierCredit)
    {
        $this->supplierCredit = $supplierCredit;
    }

    /**
     * @return mixed
     */
    public function getSupplierCurrency()
    {
        return $this->supplierCurrency;
    }

    /**
     * @param mixed $supplierCurrency
     */
    public function setSupplierCurrency($supplierCurrency)
    {
        $this->supplierCurrency = $supplierCurrency;
    }

    /**
     * @return mixed
     */
    public function getSupplierReference()
    {
        return $this->supplierReference;
    }

    /**
     * @param mixed $supplierReference
     */
    public function setSupplierReference($supplierReference)
    {
        $this->supplierReference = $supplierReference;
    }

    /**
     * @return mixed
     */
    public function getOrderDate()
    {
        return $this->orderDate;
    }

    /**
     * @param mixed $orderDate
     */
    public function setOrderDate($orderDate)
    {
        $this->orderDate = $orderDate;
    }

    /**
     * @return mixed
     */
    public function getDeliverTo()
    {
        return $this->deliverTo;
    }

    /**
     * @param mixed $deliverTo
     */
    public function setDeliverTo($deliverTo)
    {
        $this->deliverTo = $deliverTo;
    }

    /**
     * @return mixed
     */


}