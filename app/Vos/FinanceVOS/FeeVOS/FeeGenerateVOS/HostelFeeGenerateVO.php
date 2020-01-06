<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 10/21/2017
 * Time: 12:21 PM
 */

namespace App\Vos\FinanceVOS\FeeVOS\FeeGenerateVOS;


use App\Vos\BaseVO;

class HostelFeeGenerateVO extends BaseVO
{
    protected $hostelId;
    protected $studentID;
    protected $challanNo;
    protected $hostelFeeAllocationId;
    protected $month;
    protected $feeStatus;

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