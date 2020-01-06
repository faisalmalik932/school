<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/18/2017
 * Time: 5:30 PM
 */

namespace App\Vos\FinanceVOS\DonorsVOS;


use App\Vos\BaseVO;

class AllocateDonorVO extends BaseVO
{
    protected $donorAllocateId;
    protected $branchId;
    protected $classId;
    protected $studentId;
    protected $donorId;

    /**
     * @return mixed
     */
    public function getDonorAllocateId()
    {
        return $this->donorAllocateId;
    }

    /**
     * @param mixed $donorAllocateId
     */
    public function setDonorAllocateId($donorAllocateId)
    {
        $this->donorAllocateId = $donorAllocateId;
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
    public function getDonorId()
    {
        return $this->donorId;
    }

    /**
     * @param mixed $donorId
     */
    public function setDonorId($donorId)
    {
        $this->donorId = $donorId;
    }

}