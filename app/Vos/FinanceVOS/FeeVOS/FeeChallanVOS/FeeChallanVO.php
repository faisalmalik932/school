<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 10/24/2017
 * Time: 10:54 AM
 */

namespace App\Vos\FinanceVOS\FeeVOS\FeeChallanVOS;


use App\Vos\BaseVO;

class FeeChallanVO extends BaseVO
{
    protected $feeChallanId;
    protected $feeStructureId;
    protected $ordId;
    protected $branchId;
    protected $class;
    protected $studentId;
    protected $challanNo;
    protected $month;
    protected $year;
    protected $feeStatus;
    protected $admFeeStatus;
    protected $hostelId;
    protected $concession;

    /**
     * @return mixed
     */
    public function getHostelId()
    {
        return $this->hostelId;
    }

    /**
     * @param mixed $hostelId
     */
    public function setHostelId($hostelId)
    {
        $this->hostelId = $hostelId;
    }

    public function getConcession()
    {
        return $this->concession;
    }

    /**
     * @param mixed $hostelId
     */
    public function setConcession($concession)
    {
        $this->concession = $concession;
    }

    /**
     * @return mixed
     */
    public function getAdmFeeStatus()
    {
        return $this->admFeeStatus;
    }

    /**
     * @param mixed $admFeeStatus
     */
    public function setAdmFeeStatus($admFeeStatus)
    {
        $this->admFeeStatus = $admFeeStatus;
    }

    /**
     * @return mixed
     */
    public function getFeeChallanId()
    {
        return $this->feeChallanId;
    }

    /**
     * @param mixed $feeChallanId
     */
    public function setFeeChallanId($feeChallanId)
    {
        $this->feeChallanId = $feeChallanId;
    }

    /**
     * @return mixed
     */
    public function getFeeDetailId()
    {
        return $this->feeDetailId;
    }

    /**
     * @param mixed $feeDetailId
     */
    public function setFeeDetailId($feeDetailId)
    {
        $this->feeDetailId = $feeDetailId;
    }

    /**
     * @return mixed
     */
    public function getFeeStructureId()
    {
        return $this->feeStructureId;
    }

    /**
     * @param mixed $feeStructureId
     */
    public function setFeeStructureId($feeStructureId)
    {
        $this->feeStructureId = $feeStructureId;
    }

    /**
     * @return mixed
     */
    public function getOrdId()
    {
        return $this->ordId;
    }

    /**
     * @param mixed $ordId
     */
    public function setOrdId($ordId)
    {
        $this->ordId = $ordId;
    }

    /**
     * @return mixed
     */
    public function getBranchId()
    {
        return $this->branchId;
    }

    /**
     * @param mixed $branchId
     */
    public function setBranchId($branchId)
    {
        $this->branchId = $branchId;
    }

    /**
     * @return mixed
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param mixed $class
     */
    public function setClass($class)
    {
        $this->class = $class;
    }

    /**
     * @return mixed
     */
    public function getStudentId()
    {
        return $this->studentId;
    }

    /**
     * @param mixed $studentId
     */
    public function setStudentId($studentId)
    {
        $this->studentId = $studentId;
    }

    /**
     * @return mixed
     */
    public function getChallanNo()
    {
        return $this->challanNo;
    }

    /**
     * @param mixed $challanNo
     */
    public function setChallanNo($challanNo)
    {
        $this->challanNo = $challanNo;
    }

    /**
     * @return mixed
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * @param mixed $month
     */
    public function setMonth($month)
    {
        $this->month = $month;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @return mixed
     */
    public function getFeeStatus()
    {
        return $this->feeStatus;
    }

    /**
     * @param mixed $feeStatus
     */
    public function setFeeStatus($feeStatus)
    {
        $this->feeStatus = $feeStatus;
    }

}