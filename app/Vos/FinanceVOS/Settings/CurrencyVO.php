<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/7/2017
 * Time: 7:50 PM
 */

namespace App\Vos\FinanceVOS\Settings;


use App\Vos\BaseVO;

class CurrencyVO extends BaseVO
{
    protected $currencyId;
    protected $currencyAbbreviation;
    protected $currencySymbol;
    protected $currencyName;
    protected $hundrethsname;
    protected $country;

    /**
     * @return mixed
     */
    public function getCurrencyAbbreviation()
    {
        return $this->currencyAbbreviation;
    }

    /**
     * @param mixed $currencyAbbreviation
     */
    public function setCurrencyAbbreviation($currencyAbbreviation)
    {
        $this->currencyAbbreviation = $currencyAbbreviation;
    }

    /**
     * @return mixed
     */
    public function getCurrencyId()
    {
        return $this->currencyId;
    }

    /**
     * @param mixed $currencyId
     */
    public function setCurrencyId($currencyId)
    {
        $this->currencyId = $currencyId;
    }

    /**
     * @return mixed
     */
    public function getCurrencySymbol()
    {
        return $this->currencySymbol;
    }

    /**
     * @param mixed $currencySymbol
     */
    public function setCurrencySymbol($currencySymbol)
    {
        $this->currencySymbol = $currencySymbol;
    }

    /**
     * @return mixed
     */
    public function getCurrencyName()
    {
        return $this->currencyName;
    }

    /**
     * @param mixed $currencyName
     */
    public function setCurrencyName($currencyName)
    {
        $this->currencyName = $currencyName;
    }

    /**
     * @return mixed
     */
    public function getHundrethsname()
    {
        return $this->hundrethsname;
    }

    /**
     * @param mixed $hundrethsname
     */
    public function setHundrethsname($hundrethsname)
    {
        $this->hundrethsname = $hundrethsname;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }



}