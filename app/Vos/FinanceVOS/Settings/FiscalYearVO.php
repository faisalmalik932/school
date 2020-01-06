<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/7/2017
 * Time: 7:50 PM
 */

namespace App\Vos\FinanceVOS\Settings;


use App\Vos\BaseVO;

class FiscalYearVO extends BaseVO
{
    protected $fiscalyearId;
    protected $startdate;
    protected $enddate;
    protected $isClosed;

    /**
     * @return mixed
     */
    public function getisClosed()
    {
        return $this->isClosed;
    }

    /**
     * @param mixed $isClosed
     */
    public function setIsClosed($isClosed)
    {
        $this->isClosed = $isClosed;
    }

    /**
     * @return mixed
     */
    public function getFiscalyearId()
    {
        return $this->fiscalyearId;
    }

    /**
     * @param mixed $fiscalyearId
     */
    public function setFiscalyearId($fiscalyearId)
    {
        $this->fiscalyearId = $fiscalyearId;
    }

    /**
     * @return mixed
     */
    public function getStartdate()
    {
        return $this->startdate;
    }

    /**
     * @param mixed $startdate
     */
    public function setStartdate($startdate)
    {
        $this->startdate = $startdate;
    }

    /**
     * @return mixed
     */
    public function getEnddate()
    {
        return $this->enddate;
    }

    /**
     * @param mixed $enddate
     */
    public function setEnddate($enddate)
    {
        $this->enddate = $enddate;
    }



}