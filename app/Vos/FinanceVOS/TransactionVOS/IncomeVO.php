<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/26/2017
 * Time: 4:19 PM
 */

namespace App\Vos\FinanceVOS\TransactionVOS;


use App\Vos\BaseVO;

class IncomeVO extends BaseVO
{
    protected $incomeId;
    protected $incomeTitle;
    protected $accountHeadId;
    protected $description;
    protected $date;
    protected $amount;

    /**
     * @return mixed
     */
    public function getIncomeId()
    {
        return $this->incomeId;
    }

    /**
     * @param mixed $incomeId
     */
    public function setIncomeId($incomeId)
    {
        $this->incomeId = $incomeId;
    }

    /**
     * @return mixed
     */
    public function getIncomeTitle()
    {
        return $this->incomeTitle;
    }

    /**
     * @param mixed $incomeTitle
     */
    public function setIncomeTitle($incomeTitle)
    {
        $this->incomeTitle = $incomeTitle;
    }

    /**
     * @return mixed
     */
    public function getAccountHeadId()
    {
        return $this->accountHeadId;
    }

    /**
     * @param mixed $accountHeadId
     */
    public function setAccountHeadId($accountHeadId)
    {
        $this->accountHeadId = $accountHeadId;
    }

    /**
     * @return mixed
     */
    public function getExpenseId()
    {
        return $this->expenseId;
    }

    /**
     * @param mixed $expenseId
     */
    public function setExpenseId($expenseId)
    {
        $this->expenseId = $expenseId;
    }

    /**
     * @return mixed
     */
    public function getExpenseTitle()
    {
        return $this->expenseTitle;
    }

    /**
     * @param mixed $expenseTitle
     */
    public function setExpenseTitle($expenseTitle)
    {
        $this->expenseTitle = $expenseTitle;
    }

    /**
     * @return mixed
     */
    public function getFinCategoryId()
    {
        return $this->finCategoryId;
    }

    /**
     * @param mixed $finCategoryId
     */
    public function setFinCategoryId($finCategoryId)
    {
        $this->finCategoryId = $finCategoryId;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
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