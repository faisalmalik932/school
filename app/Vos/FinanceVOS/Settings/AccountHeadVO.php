<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/30/2017
 * Time: 2:36 PM
 */

namespace App\Vos\FinanceVOS\Settings;


use App\Vos\BaseVO;

class AccountHeadVO extends BaseVO
{
    protected $accountHeadId;
    protected $accountHead;
    protected $accountClass;
    protected $description;
    protected $parentID;
    protected $accountHeadCode;
    protected $date;
    protected $startdate;
    protected $enddate;
    protected $fromaccounthead;
    protected $toaccounthead;
    protected $fiscalYear;
    protected $hasChild;

    /**
     * @return mixed
     */
    public function getFiscalYear()
    {
        return $this->fiscalYear;
    }

    /**
     * @param mixed $fiscalYear
     */
    public function setFiscalYear($fiscalYear)
    {
        $this->fiscalYear = $fiscalYear;
    }

    /**
     * @return mixed
     */
    public function getFromaccounthead()
    {
        return $this->fromaccounthead;
    }

    /**
     * @param mixed $fromaccounthead
     */
    public function setFromaccounthead($fromaccounthead)
    {
        $this->fromaccounthead = $fromaccounthead;
    }

    /**
     * @return mixed
     */
    public function getToaccounthead()
    {
        return $this->toaccounthead;
    }

    /**
     * @param mixed $toaccounthead
     */
    public function setToaccounthead($toaccounthead)
    {
        $this->toaccounthead = $toaccounthead;
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

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getAccountHeadCode()
    {
        return $this->accountHeadCode;
    }

    /**
     * @param mixed $accountHeadCode
     */
    public function setAccountHeadCode($accountHeadCode)
    {
        $this->accountHeadCode = $accountHeadCode;
    }

    /**
     * @return mixed
     */
    public function getParentID()
    {
        return $this->parentID;
    }

    /**
     * @param mixed $parentID
     */
    public function setParentID($parentID)
    {
        $this->parentID = $parentID == '' ? '0' : $parentID;
    }

    /**
     * @return mixed
     */
    public function getAccountClass()
    {
        return $this->accountClass;
    }

    /**
     * @param mixed $accountClass
     */
    public function setAccountClass($accountClass)
    {
        $this->accountClass = $accountClass;
    }

    /**
     * @return mixed
     */
    public function getAccountHeadId()
    {
        return $this->accountHeadId;
    }

    /**
     * @param mixed $accountHeadId
     */
    public function setAccountHeadId($accountHeadId)
    {
        $this->accountHeadId = $accountHeadId;
    }

    /**
     * @return mixed
     */
    public function getAccountHead()
    {
        return $this->accountHead;
    }

    /**
     * @param mixed $accountHead
     */
    public function setAccountHead($accountHead)
    {
        $this->accountHead = $accountHead;
    }

    /**
     * @return mixed
     */

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getHasChild()
    {
        return $this->hasChild;
    }

    /**
     * @param mixed $hasChild
     */
    public function setHasChild($hasChild)
    {
        $this->hasChild = $hasChild;
    }


}