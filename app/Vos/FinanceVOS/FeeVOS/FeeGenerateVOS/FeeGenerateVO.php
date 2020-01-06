<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 10/20/2017
 * Time: 12:15 PM
 */

namespace App\Vos\FinanceVOS\FeeVOS\FeeGenerateVOS;


use App\Vos\BaseVO;

class FeeGenerateVO extends BaseVO
{
    protected $feeGenerateId;
    protected $branchId;
    protected $Class;
    protected $studentId;
    protected $feeAllocateId;
    protected $month;
    protected $challan;
    protected $feeStructureId;
    protected $feeDetailId;

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
    public function getChallan()
    {
        return $this->challan;
    }

    /**
     * @param mixed $challan
     */
    public function setChallan($challan)
    {
        $this->challan = $challan;
    }

    /**
     * @return mixed
     */
    public function getFeeGenerateId()
    {
        return $this->feeGenerateId;
    }

    /**
     * @param mixed $feeGenerateId
     */
    public function setFeeGenerateId($feeGenerateId)
    {
        $this->feeGenerateId = $feeGenerateId;
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
        return $this->Class;
    }

    /**
     * @param mixed $Class
     */
    public function setClass($Class)
    {
        $this->Class = $Class;
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
    public function getFeeAllocateId()
    {
        return $this->feeAllocateId;
    }

    /**
     * @param mixed $feeAllocateId
     */
    public function setFeeAllocateId($feeAllocateId)
    {
        $this->feeAllocateId = $feeAllocateId;
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


}