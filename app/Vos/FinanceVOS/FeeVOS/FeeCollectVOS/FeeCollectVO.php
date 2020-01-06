<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/18/2017
 * Time: 1:15 PM
 */
namespace App\Vos\FinanceVOS\FeeVOS\FeeCollectVOS;

use App\Vos\BaseVO;

class FeeCollectVO extends BaseVO
{
    protected $branchId;
    protected $classId;
    protected $rollno;
    protected $status;
    protected $feeCollectId;
    protected $studentId;
    protected $challanNo;

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
    public function getClassId()
    {
        return $this->classId;
    }

    /**
     * @param mixed $classId
     */
    public function setClassId($classId)
    {
        $this->classId = $classId;
    }

    /**
     * @return mixed
     */
    public function getRollno()
    {
        return $this->rollno;
    }

    /**
     * @param mixed $rollno
     */
    public function setRollno($rollno)
    {
        $this->rollno = $rollno;
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

    /**
     * @return mixed
     */
    public function getFeeCollectId()
    {
        return $this->feeCollectId;
    }

    /**
     * @param mixed $feeCollectId
     */
    public function setFeeCollectId($feeCollectId)
    {
        $this->feeCollectId = $feeCollectId;
    }


}