<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/13/2017
 * Time: 8:38 PM
 */

namespace App\Vos\FinanceVOS\VoucherVOS;


use App\Vos\BaseVO;

class VoucherHeadVO extends BaseVO
{
    protected $voucherHeadId;
    protected $accountheadId;
    protected $voucherHeadName;
    protected $voucherType;
    protected $status;

    /**
     * @return mixed
     */
    public function getVoucherHeadId()
    {
        return $this->voucherHeadId;
    }

    /**
     * @param mixed $voucherHeadId
     */
    public function setVoucherHeadId($voucherHeadId)
    {
        $this->voucherHeadId = $voucherHeadId;
    }

    /**
     * @return mixed
     */
    public function getAccountheadId()
    {
        return $this->accountheadId;
    }

    /**
     * @param mixed $accountheadId
     */
    public function setAccountheadId($accountheadId)
    {
        $this->accountheadId = $accountheadId;
    }

    /**
     * @return mixed
     */
    public function getVoucherHeadName()
    {
        return $this->voucherHeadName;
    }

    /**
     * @param mixed $voucherHeadName
     */
    public function setVoucherHeadName($voucherHeadName)
    {
        $this->voucherHeadName = $voucherHeadName;
    }

    /**
     * @return mixed
     */
    public function getVoucherType()
    {
        return $this->voucherType;
    }

    /**
     * @param mixed $voucherType
     */
    public function setVoucherType($voucherType)
    {
        $this->voucherType = $voucherType;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }



}