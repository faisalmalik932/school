<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/26/2017
 * Time: 4:08 PM
 */

namespace App\Models\Finance\Transactions;


use App\Models\BaseModel;
use App\Vos\FinanceVOS\TransactionVOS\ExpenseVO;

class ExpenseModel extends BaseModel
{
    protected $primaryKey = 'EXPENSE_ID';
    protected $table = 'fin_expenses';
    protected $fillable =['ACCOUNT_HEAD_ID','TITLE','DESCRIPTION','AMOUNT','DATE'];

    public function saveExpenses(ExpenseVO $expenseVO)
    {
        $this->ACCOUNT_HEAD_ID = $expenseVO->getAccountHeadId();
        $this->TITLE = $expenseVO->getExpenseTitle();
        $this->DESCRIPTION = $expenseVO->getDescription();
        $this->AMOUNT = $expenseVO->getAmount();
        $this->DATE = $expenseVO->getDate();
        $this->save();
    }

    public function updateExpense(ExpenseVO $expenseVO)
    {
        $this->where('EXPENSE_ID',$expenseVO->getExpenseId())
            ->update(['ACCOUNT_HEAD_ID'=>$expenseVO->getAccountHeadId(),
                'TITLE'=>$expenseVO->getExpenseTitle(),
                'DESCRIPTION'=>$expenseVO->getDescription(),
                'AMOUNT'=>$expenseVO->getAmount(),
                'DATE'=>$expenseVO->getDate()]);
    }
}