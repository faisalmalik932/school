<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/26/2017
 * Time: 12:18 PM
 */

namespace App\Http\Controllers\Finance\Transactions;


use App\Http\Controllers\BaseController;
use App\Models\Finance\Settings\AccountHeadModel;
use App\Models\Finance\FinanceCategory\FinanceCategoryModel;
use App\Models\Finance\Transactions\ExpenseModel;
use App\Vos\FinanceVOS\TransactionVOS\ExpenseVO;
use Illuminate\Http\Request;

class AddExpenseController extends BaseController
{
    public function loadView()
    {
        $accountHeadModel = new AccountHeadModel();
        $category = $accountHeadModel->loadExpenseHead();
        return view('Finance.Transactions.AddExpense')->with('category',$category);
    }

    public function add(Request $request)
    {
        $expenseVO = new ExpenseVO();
        $expenseVO->setExpenseTitle($request->input('title'));
        $expenseVO->setDescription($request->input('description'));
        $expenseVO->setAccountHeadId($request->input('category'));
        $expenseVO->setDate($request->input('date'));
        $expenseVO->setAmount($request->input('amount'));
        $expenseModel = new ExpenseModel();
        $primary = $request->input('primary');
        if(count($primary)==0) {
            $expenseModel->saveExpenses($expenseVO);
            return redirect('finance/transactions/expenses');
        }
        else{
            $expenseVO->setExpenseId($primary);
            $expenseModel->updateExpense($expenseVO);
            return redirect('finance/transactions/expenses');
        }
    }
}