<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/20/2017
 * Time: 4:57 PM
 */

namespace App\Vos\FinanceVOS\FeeVOS\FeeAllocationVOS;


use App\Vos\BaseVO;

class FeeAllocateVO extends BaseVO
{
    protected $branchId;
    protected $classId;
    protected $studentId;
    protected $feeCategoryId;
    protected $feesubCategoryId;
    protected $feeType;
    protected $feeAllocationId;

    /**
     * @return mixed
     */
    public function getFeeAllocationId()
    {
        return $this->feeAllocationId;
    }

    /**
     * @param mixed $feeAllocationId
     */
    public function setFeeAllocationId($feeAllocationId)
    {
        $this->feeAllocationId = $feeAllocationId;
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
    public function getFeeCategoryId()
    {
        return $this->feeCategoryId;
    }

    /**
     * @param mixed $feeCategoryId
     */
    public function setFeeCategoryId($feeCategoryId)
    {
        $this->feeCategoryId = $feeCategoryId;
    }

    /**
     * @return mixed
     */
    public function getFeesubCategoryId()
    {
        return $this->feesubCategoryId;
    }

    /**
     * @param mixed $feesubCategoryId
     */
    public function setFeesubCategoryId($feesubCategoryId)
    {
        $this->feesubCategoryId = $feesubCategoryId;
    }

    /**
     * @return mixed
     */
    public function getFeeType()
    {
        return $this->feeType;
    }

    /**
     * @param mixed $feeType
     */
    public function setFeeType($feeType)
    {
        $this->feeType = $feeType;
    }

}