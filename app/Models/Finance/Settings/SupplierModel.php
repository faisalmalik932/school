<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/7/2017
 * Time: 7:36 PM
 */

namespace App\Models\Finance\Settings;


use App\Models\BaseModel;
use App\Vos\FinanceVOS\Settings\SupplierVO;

class SupplierModel extends BaseModel
{
    protected $primaryKey = 'SUPPLIER_ID';
    protected $table = 'fin_suppliers';
    protected $fillable = ['SUPPLIER_NAME','GST_NO','BANK_ACCOUNT_TITLE','BANK_ACCOUNT_NUMBER','WEBSITE','CURRENCY','BANK_NAME','CREDIT_LIMIT',
        'PAYMENT_TERM','TAX_INCLUDED','ACCOUNT_PAYABLE_ACCOUNT','PURCHASE_ACCOUNT','DISCOUNT_ACCOUNT',
        'CONTACT_PERSON_NAME','MOBILE_NO','LANDLINE','FAX_NO','EMAIL','ADDRESS','DESCRIPTION'];

    public function saveSupplierInfo(SupplierVO $supplierVO)
    {
        $result = $this->select()->where('MOBILE_NO', '=', $supplierVO->getMobileNumber())->get();
        if (count($result) > 0) {
            $supplierVO->setErrorResponse(true, '0000027');
        } else {
            $this->SUPPLIER_NAME = $supplierVO->getSupplierName();
            $this->GST_NO = $supplierVO->getGstNo();
            $this->WEBSITE = $supplierVO->getWebsite();
            $this->CURRENCY = $supplierVO->getCurrency();
            $this->BANK_NAME = $supplierVO->getBankName();
            $this->BANK_ACCOUNT_TITLE = $supplierVO->getBankaccountTitle();
            $this->BANK_ACCOUNT_NUMBER = $supplierVO->getBankaccountNumber();
            $this->CREDIT_LIMIT = $supplierVO->getCreditLimit();
            $this->PAYMENT_TERM = $supplierVO->getPaymentTerm();
            $this->TAX_INCLUDED = $supplierVO->getTaxInclude();
            $this->ACCOUNT_PAYABLE_ACCOUNT = $supplierVO->getPayableAccount();
            $this->PURCHASE_ACCOUNT = $supplierVO->getPurchaseAccount();
            $this->DISCOUNT_ACCOUNT = $supplierVO->getDiscountAccount();
            $this->CONTACT_PERSON_NAME = $supplierVO->getContactPersonName();
            $this->MOBILE_NO = $supplierVO->getMobileNumber();
            $this->LANDLINE = $supplierVO->getLandLine();
            $this->FAX_NO = $supplierVO->getFaxNo();
            $this->EMAIL = $supplierVO->getEmail();
            $this->ADDRESS = $supplierVO->getAddress();
            $this->DESCRIPTION = $supplierVO->getDescription();
            $this->CREATED_BY = $supplierVO->getCreatedBy();
            $this->save();
        }
    }

    public function updateSupplierInfo(SupplierVO $supplierVO)
    {
        $this->where('SUPPLIER_ID',$supplierVO->getSupplierId())
            ->update(['SUPPLIER_NAME'=>$supplierVO->getSupplierName(),
                'GST_NO'=> $supplierVO->getGstNo(),
                'WEBSITE'=>$supplierVO->getWebsite(),
                'CURRENCY'=>$supplierVO->getCurrency(),
                'BANK_NAME'=>$supplierVO->getBankName(),
                'BANK_ACCOUNT_TITLE'=>$supplierVO->getBankaccountTitle(),
                'BANK_ACCOUNT_NUMBER'=>$supplierVO->getBankaccountNumber(),
                'CREDIT_LIMIT'=>$supplierVO->getCreditLimit(),
                'PAYMENT_TERM'=>$supplierVO->getPaymentTerm(),
                'TAX_INCLUDED'=>$supplierVO->getTaxInclude(),
                'ACCOUNT_PAYABLE_ACCOUNT'=>$supplierVO->getPayableAccount(),
                'PURCHASE_ACCOUNT'=>$supplierVO->getPurchaseAccount(),
                'DISCOUNT_ACCOUNT'=>$supplierVO->getDiscountAccount(),
                'CONTACT_PERSON_NAME'=>$supplierVO->getContactPersonName(),
                'MOBILE_NO'=>$supplierVO->getMobileNumber(),
                'LANDLINE'=>$supplierVO->getLandLine(),
                'FAX_NO'=>$supplierVO->getFaxNo(),
                'EMAIL'=>$supplierVO->getEmail(),
                'ADDRESS'=>$supplierVO->getAddress(),
                'DESCRIPTION'=> $supplierVO->getDescription(),
                'UPDATED_BY' => $supplierVO->getModifiedBy(),
                'UPDATED_AT' => $supplierVO->getModifiedAt()]);
    }

    public function loadSuppliers()
    {
        $supplier = $this->select('SUPPLIER_ID','SUPPLIER_NAME')->get();
        return $supplier;
    }

}