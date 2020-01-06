<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/7/2017
 * Time: 7:49 PM
 */

namespace App\Models\Finance\Settings;


use App\Models\BaseModel;
use App\Vos\FinanceVOS\Settings\CurrencyVO;

class CurrencyModel extends BaseModel
{
    protected $primaryKey = 'CURRENCY_ID';
    protected $table = 'fin_currencies';
    protected $fillable = ['CURRENCY_ABBREVIATION','CURRENCY_SYMBOL','CURRENCY_NAME','HUNDRETHS_NAME','COUNTRY_ID'];

    public function saveCurrencyInfo(CurrencyVO $currencyVO)
    {
        $result = $this->select()->where('CURRENCY_NAME', '=', $currencyVO->getCurrencyName())->get();
        if (count($result) > 0) {
            $currencyVO->setErrorResponse(true, '0000028');
        } else {
            $this->CURRENCY_ABBREVIATION = $currencyVO->getCurrencyAbbreviation();
            $this->CURRENCY_SYMBOL = $currencyVO->getCurrencySymbol();
            $this->CURRENCY_NAME = $currencyVO->getCurrencyName();
            $this->HUNDRETHS_NAME = $currencyVO->getHundrethsname();
            $this->COUNTRY_ID = $currencyVO->getCountry();
            $this->CREATED_BY = $currencyVO->getCreatedBy();
            $this->save();
        }
    }

    public function updateCurrencyInfo(CurrencyVO $currencyVO)
    {
        $this->where('CURRENCY_ID',$currencyVO->getCurrencyId())
            ->update(['CURRENCY_ABBREVIATION'=>$currencyVO->getCurrencyAbbreviation(),
                'CURRENCY_SYMBOL'=>$currencyVO->getCurrencySymbol(),
                'CURRENCY_NAME'=> $currencyVO->getCurrencyName(),
                'HUNDRETHS_NAME'=>$currencyVO->getHundrethsname(),
                'COUNTRY_ID'=>$currencyVO->getCountry(),
                'UPDATED_BY' => $currencyVO->getModifiedBy(),
                'UPDATED_AT' => $currencyVO->getModifiedAt()]);
    }

    public function loadCurrencies()
    {
       $currency =  $this->select('CURRENCY_NAME','CURRENCY_ID')->get();
       return $currency;

    }
}