<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/26/2017
 * Time: 12:41 PM
 */

namespace App\Http\Controllers\Finance\Transactions;


use App\Http\Controllers\BaseController;
use App\Models\Finance\Settings\AccountHeadModel;
use App\Models\Finance\FinanceCategory\FinanceCategoryModel;
use App\Models\Finance\Transactions\IncomeModel;
use App\Vos\FinanceVOS\TransactionVOS\IncomeVO;
use Illuminate\Http\Request;

class AddIncomeController extends BaseController
{
    public function loadView()
    {
        $accHeadModel = new AccountHeadModel();
        $category = $accHeadModel->loadIncomeHead();
        return view('Finance.Transactions.AddIncome')->with('category',$category);
    }

    public function add(Request $request)
    {
        $incomeVO = new IncomeVO();
        $incomeVO->setAccountHeadId($request->input('category'));
        $incomeVO->setIncomeTitle($request->input('title'));
        $incomeVO->setDescription($request->input('description'));
        $incomeVO->setAmount($request->input('amount'));
        $incomeVO->setDate($request->input('date'));
        $incomeModel = new IncomeModel();
        $primary = $request->input('primary');
        if(count($primary)==0) {
            $incomeModel->saveIncomeInfo($incomeVO);
            return redirect('finance/transactions/income');
        }
        else{
            $incomeVO->setIncomeId($primary);
            $incomeModel->updateIncomeInfo($incomeVO);
            return redirect('finance/transactions/income');
        }
    }

}