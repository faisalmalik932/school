<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/11/2017
 * Time: 11:40 AM
 */

namespace App\Models\Finance\Purchase;


use App\Models\BaseModel;
use App\Vos\FinanceVOS\PurchaseVOS\purchaseItemVO;
use Illuminate\Database\Eloquent\Collection;

class PurchaseItemModel extends BaseModel
{
    protected $primaryKey = 'PURCHASE_ITEM_ID';
    protected $table = 'fin_purchase_items';
    protected $fillable = ['PURCHASE_ORDER_ID','ITEM_DESCRIPTION','QUANTITY','DELIVERY_DATE','TOTAL_PRICE','PRICE'];

    public function addPurchaseItem(Collection $collection)
    {
        $collection->each(function($vo) {
           echo($vo->getItemDescription());
            $this->insert(array(
                'ITEM_DESCRIPTION'=>$vo->getItemDescription(),
                'PURCHASE_ORDER_ID'=>$vo->getPurchaseOrderId(),
                'QUANTITY'=>$vo->getQuantity(),
                'DELIVERY_DATE'=>$vo->getDeliveryDate(),
                'PRICE'=>$vo->getPrice(),
                'TOTAL_PRICE'=>$vo->getTotalPrice()
            ));
        });
    }
}