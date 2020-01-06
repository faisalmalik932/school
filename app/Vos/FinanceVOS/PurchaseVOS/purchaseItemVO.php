<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/17/2017
 * Time: 1:57 PM
 */

namespace App\Vos\FinanceVOS\PurchaseVOS;


use App\Vos\BaseVO;

class purchaseItemVO extends BaseVO
{
    protected $purchaseOrderId;
    protected $PurchaseItemId;
    protected $itemCode;
    protected $quantity;
    protected $price;
    protected $totalPrice;
    protected $itemDescription;
    protected $deliveryDate;

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
    public function getPurchaseItemId()
    {
        return $this->PurchaseItemId;
    }

    /**
     * @param mixed $PurchaseItemId
     */
    public function setPurchaseItemId($PurchaseItemId)
    {
        $this->PurchaseItemId = $PurchaseItemId;
    }

    /**
     * @return mixed
     */
    public function getItemCode()
    {
        return $this->itemCode;
    }

    /**
     * @param mixed $itemCode
     */
    public function setItemCode($itemCode)
    {
        $this->itemCode = $itemCode;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    /**
     * @param mixed $totalPrice
     */
    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;
    }

    /**
     * @return mixed
     */
    public function getItemDescription()
    {
        return $this->itemDescription;
    }

    /**
     * @param mixed $itemDescription
     */
    public function setItemDescription($itemDescription)
    {
        $this->itemDescription = $itemDescription;
    }

    /**
     * @return mixed
     */
    public function getDeliveryDate()
    {
        return $this->deliveryDate;
    }

    /**
     * @param mixed $deliveryDate
     */
    public function setDeliveryDate($deliveryDate)
    {
        $this->deliveryDate = $deliveryDate;
    }

}