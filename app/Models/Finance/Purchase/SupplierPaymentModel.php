<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/17/2017
 * Time: 2:56 PM
 */

namespace App\Models\Finance\Purchase;


use App\Models\BaseModel;
use App\Vos\FinanceVOS\PurchaseVOS\SupplierPaymentVO;

class SupplierPaymentModel extends BaseModel
{
    protected $primaryKey = 'SUPPLIER_PAYMENT_ID';
    protected $table = 'fin_supplier_payments';
    protected $fillable = ['SUPPLIER_ID','PAYMENT_MODE','PO_NUMBER','BANK_ACCOUNT_TITLE','BANK_NAME','BANK_ACCOUNT_NUMBER','CHEQUE_NUMBER','DATE_PAID','REFERENCE','DISCOUNT_AMOUNT','PAYMENT_AMOUNT'];

    public function addSupplierPayment(SupplierPaymentVO $supplierPaymentVO)
    {
        $this->SUPPLIER_ID = $supplierPaymentVO->getSupplierId();
        $this->BANK_ACCOUNT_TITLE = $supplierPaymentVO->getBankaccountTitle();
        $this->BANK_NAME = $supplierPaymentVO->getBankName();
        $this->BANK_ACCOUNT_NUMBER = $supplierPaymentVO->getBankacountNumber();
        $this->CHEQUE_NUMBER = $supplierPaymentVO->getChecqueNumber();
        $this->DATE_PAID = $supplierPaymentVO->getDatePaid();
        $this->REFERENCE = $supplierPaymentVO->getReference();
        $this->DISCOUNT_AMOUNT = $supplierPaymentVO->getDiscountAmount();
        $this->PAYMENT_AMOUNT = $supplierPaymentVO->getPaymentAmount();
        $this->PO_NUMBER = $supplierPaymentVO->getPoNumber();
        $this->PAYMENT_MODE = $supplierPaymentVO->getPaymentMode();
        $this->CREATED_BY = $supplierPaymentVO->getCreatedBy();
        $this->save();
    }

    public function updateSupplierPayment(SupplierPaymentVO $supplierPaymentVO)
    {
        $this->where('SUPPLIER_PAYMENT_ID',$supplierPaymentVO->getSupplierPaymentId())
            ->update(['SUPPLIER_ID'=>$supplierPaymentVO->getSupplierId(),
                'BANK_ACCOUNT_TITLE'=> $supplierPaymentVO->getBankaccountTitle(),
                'BANK_NAME'=>$supplierPaymentVO->getBankName(),
                'BANK_ACCOUNT_NUMBER'=> $supplierPaymentVO->getBankacountNumber(),
                'CHEQUE_NUMBER'=>$supplierPaymentVO->getChecqueNumber(),
                'DATE_PAID'=>$supplierPaymentVO->getDatePaid(),
                'REFERENCE'=>$supplierPaymentVO->getReference(),
                'DISCOUNT_AMOUNT'=>$supplierPaymentVO->getDiscountAmount(),
                'PAYMENT_AMOUNT'=>$supplierPaymentVO->getPaymentAmount(),
                'PO_NUMBER'=>$supplierPaymentVO->getPoNumber(),
                'PAYMENT_MODE'=>$supplierPaymentVO->getPaymentMode(),
                'UPDATED_BY' => $supplierPaymentVO->getModifiedBy(),
                'UPDATED_AT' => $supplierPaymentVO->getModifiedAt()]);
    }

}