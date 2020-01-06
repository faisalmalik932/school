<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/29/2017
 * Time: 12:48 PM
 */

namespace App\Vos\FinanceVOS\FeeVOS\FeeStructureVOS;


use App\Vos\BaseVO;

class FeeStructureVO extends BaseVO
{
    protected $feeStructureId;
    protected $feeCategoryId;
    protected $feeSubCategoryId;
    protected $branchId;
    protected $orgId;
    protected $amount;
    protected $classId;
    protected $feeType;
    protected $studentId;
    protected $feeHeader;
    protected $fiscalYear;

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
    public function getFeeHeader()
    {
        return $this->feeHeader;
    }

    /**
     * @param mixed $feeHeader
     */
    public function setFeeHeader($feeHeader)
    {
        $this->feeHeader = $feeHeader;
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

    /**
     * @return mixed
     */
    public function getFeeSubCategoryId()
    {
        return $this->feeSubCategoryId;
    }

    /**
     * @param mixed $feeSubCategoryId
     */
    public function setFeeSubCategoryId($feeSubCategoryId)
    {
        $this->feeSubCategoryId = $feeSubCategoryId;
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
    public function getOrgId()
    {
        return $this->orgId;
    }

    /**
     * @param mixed $orgId
     */
    public function setOrgId($orgId)
    {
        $this->orgId = $orgId;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

}