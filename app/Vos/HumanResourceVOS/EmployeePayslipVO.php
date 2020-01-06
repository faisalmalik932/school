<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 10/17/2017
 * Time: 6:02 PM
 */

namespace App\Vos\HumanResourceVOS;


use App\Vos\BaseVO;

class EmployeePayslipVO extends BaseVO
{
    protected $payslipId;
    protected $employeeId;
    protected $month;
    protected $basicSalary;
    protected $houseRent;
    protected $utilityAllowance;
    protected $providentFund;
    protected $Advance;
    protected $grossSalary;
    protected $year;
    protected $departmentID;
    protected $titleID;
    protected $payslipNO;
    protected $payslipStrucureID;
    protected $detailPayslipId;
    protected $reason;
    protected $deductionId;
    protected $salaryCategoryId;
    protected $amount;
    protected $salary_type;

    /**
     * @return mixed
     */
    public function getSalaryCategoryId()
    {
        return $this->salaryCategoryId;
    }

    /**
     * @param mixed $salaryCategoryId
     */
    public function setSalaryCategoryId($salaryCategoryId)
    {
        $this->salaryCategoryId = $salaryCategoryId;
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
    public function getSalaryType()
    {
        return $this->salary_type;
    }
    public function setSalaryType($salary_type)
    {
        $this->salary_type = $salary_type;
    }

    

    /**
     * @return mixed
     */
    public function getDeductionId()
    {
        return $this->deductionId;
    }

    /**
     * @param mixed $deductionId
     */
    public function setDeductionId($deductionId)
    {
        $this->deductionId = $deductionId;
    }

    /**
     * @return mixed
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @param mixed $reason
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
    }

    /**
     * @return mixed
     */
    public function getDetailPayslipId()
    {
        return $this->detailPayslipId;
    }

    /**
     * @param mixed $detailPayslipId
     */
    public function setDetailPayslipId($detailPayslipId)
    {
        $this->detailPayslipId = $detailPayslipId;
    }

    /**
     * @return mixed
     */
    public function getPayslipStrucureID()
    {
        return $this->payslipStrucureID;
    }

    /**
     * @param mixed $payslipStrucureID
     */
    public function setPayslipStrucureID($payslipStrucureID)
    {
        $this->payslipStrucureID = $payslipStrucureID;
    }

    /**
     * @return mixed
     */
    public function getPayslipNO()
    {
        return $this->payslipNO;
    }

    /**
     * @param mixed $payslipNO
     */
    public function setPayslipNO($payslipNO)
    {
        $this->payslipNO = $payslipNO;
    }

    /**
     * @return mixed
     */
    public function getDepartmentID()
    {
        return $this->departmentID;
    }

    /**
     * @param mixed $departmentID
     */
    public function setDepartmentID($departmentID)
    {
        $this->departmentID = $departmentID;
    }

    /**
     * @return mixed
     */
    public function getTitleID()
    {
        return $this->titleID;
    }

    /**
     * @param mixed $titleID
     */
    public function setTitleID($titleID)
    {
        $this->titleID = $titleID;
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
    public function getGrossSalary()
    {
        return $this->grossSalary;
    }

    /**
     * @param mixed $grossSalary
     */
    public function setGrossSalary($grossSalary)
    {
        $this->grossSalary = $grossSalary;
    }

    /**
     * @return mixed
     */
    public function getPayslipId()
    {
        return $this->payslipId;
    }

    /**
     * @param mixed $payslipId
     */
    public function setPayslipId($payslipId)
    {
        $this->payslipId = $payslipId;
    }

    /**
     * @return mixed
     */
    public function getEmployeeId()
    {
        return $this->employeeId;
    }

    /**
     * @param mixed $employeeId
     */
    public function setEmployeeId($employeeId)
    {
        $this->employeeId = $employeeId;
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
    public function getBasicSalary()
    {
        return $this->basicSalary;
    }

    /**
     * @param mixed $basicSalary
     */
    public function setBasicSalary($basicSalary)
    {
        $this->basicSalary = $basicSalary;
    }

    /**
     * @return mixed
     */
    public function getHouseRent()
    {
        return $this->houseRent;
    }

    /**
     * @param mixed $houseRent
     */
    public function setHouseRent($houseRent)
    {
        $this->houseRent = $houseRent;
    }

    /**
     * @return mixed
     */
    public function getUtilityAllowance()
    {
        return $this->utilityAllowance;
    }

    /**
     * @param mixed $utilityAllowance
     */
    public function setUtilityAllowance($utilityAllowance)
    {
        $this->utilityAllowance = $utilityAllowance;
    }

    /**
     * @return mixed
     */
    public function getProvidentFund()
    {
        return $this->providentFund;
    }

    /**
     * @param mixed $providentFund
     */
    public function setProvidentFund($providentFund)
    {
        $this->providentFund = $providentFund;
    }

    /**
     * @return mixed
     */
    public function getAdvance()
    {
        return $this->Advance;
    }

    /**
     * @param mixed $Advance
     */
    public function setAdvance($Advance)
    {
        $this->Advance = $Advance;
    }

}