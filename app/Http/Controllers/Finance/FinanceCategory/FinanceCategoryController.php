<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/29/2017
 * Time: 4:57 PM
 */

namespace App\Http\Controllers\Finance\FinanceCategory;


use App\Http\Controllers\BaseController;
use App\Models\Finance\FinanceCategory\FinanceCategoryModel;
use App\Vos\FinanceVOS\FinanceCategoryVO;
use Illuminate\Http\Request;

class FinanceCategoryController extends BaseController
{
    public function loadView()
    {
        return view('Finance.Category.financeCategory');
    }

    public function add(Request $request)
    {
        $finCategoryVO = new FinanceCategoryVO();
        $finCategoryVO->setFinanceCategory($request->input('categoryname'));
        $finCategoryVO->setDescription($request->input('description'));
        $finCategoryModel = new FinanceCategoryModel();
        $primary = $request->input('primary');
        if(count($primary)==0) {
            $finCategoryModel->saveFinanceCategory($finCategoryVO);
            if ($finCategoryVO->getError()) {
                return $this->getMessageWithRedirect($finCategoryVO->getErrorCode());
            } else {
                return redirect('finance/fees/finance-category');
            }
        }
        else
            {
                $finCategoryVO->setFinanceCategoryId($primary);
                $finCategoryModel->updateFinanceCategory($finCategoryVO);
                return redirect('finance/fees/finance-category');
            }

    }
}