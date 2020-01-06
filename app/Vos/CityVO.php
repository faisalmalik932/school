<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/15/2017
 * Time: 11:55 AM
 */

namespace App\Vos;


class CityVO extends BaseVO
{
    protected $CityId;
    protected $CityCode;
    protected $CountryId;
    protected $StateId;
    protected $CityName;
    protected $Description;

    /**
     * @return mixed
     */
    public function getCityId()
    {
        return $this->CityId;
    }

    /**
     * @param mixed $CityId
     */
    public function setCityId($CityId)
    {
        $this->CityId = $CityId;
    }

    /**
     * @return mixed
     */
    public function getCityCode()
    {
        return $this->CityCode;
    }

    /**
     * @param mixed $CityCode
     */
    public function setCityCode($CityCode)
    {
        $this->CityCode = $CityCode;
    }

    /**
     * @return mixed
     */
    public function getCountryId()
    {
        return $this->CountryId;
    }

    /**
     * @param mixed $CountryId
     */
    public function setCountryId($CountryId)
    {
        $this->CountryId = $CountryId;
    }

    /**
     * @return mixed
     */
    public function getStateId()
    {
        return $this->StateId;
    }

    /**
     * @param mixed $StateId
     */
    public function setStateId($StateId)
    {
        $this->StateId = $StateId;
    }

    /**
     * @return mixed
     */
    public function getCityName()
    {
        return $this->CityName;
    }

    /**
     * @param mixed $CityName
     */
    public function setCityName($CityName)
    {
        $this->CityName = $CityName;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->Type;
    }

    /**
     * @param mixed $Description
     */
    public function setType($Type)
    {
        $this->Type = $Type;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * @param mixed $Description
     */
    public function setDescription($Description)
    {
        $this->Description = $Description;
    }



}