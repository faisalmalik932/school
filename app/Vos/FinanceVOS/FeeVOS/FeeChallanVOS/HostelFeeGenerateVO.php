<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 10/21/2017
 * Time: 12:21 PM
 */

namespace App\Vos\FinanceVOS\FeeVOS\FeeChallanVOS;


use App\Vos\BaseVO;

class HostelFeeGenerateVO extends BaseVO
{
    protected $hostelId;
    protected $studentID;
    protected $challanNo;
    protected $hostelFeeAllocationId;
    protected $month;
    protected $feeStatus;
    protected $year;
    protected $hostelFeeChallanId;
    protected $class;

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
    public function getHostelFeeChallanId()
    {
        return $this->hostelFeeChallanId;
    }

    /**
     * @param mixed $hostelFeeChallanId
     */
    public function setHostelFeeChallanId($hostelFeeChallanId)
    {
        $this->hostelFeeChallanId = $hostelFeeChallanId;
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

    /**
     * @return mixed
     */
    public function getStudentID()
    {
        return $this->studentID;
    }

    /**
     * @param mixed $studentID
     */
    public function setStudentID($studentID)
    {
        $this->studentID = $studentID;
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
    public function getHostelFeeAllocationId()
    {
        return $this->hostelFeeAllocationId;
    }

    /**
     * @param mixed $hostelFeeAllocationId
     */
    public function setHostelFeeAllocationId($hostelFeeAllocationId)
    {
        $this->hostelFeeAllocationId = $hostelFeeAllocationId;
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