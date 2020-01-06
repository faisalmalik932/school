<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/29/2017
 * Time: 5:04 PM
 */

namespace App\Models\Finance\FinanceCategory;


use App\Models\BaseModel;
use App\Vos\FinanceVOS\FinanceCategoryVO;

class FinanceCategoryModel extends BaseModel
{
    protected $primaryKey = 'FIN_CATEGORY_ID';
    protected $table = 'fin_categories';
    protected $fillable =['FINANCE_CATEGORY','DESCRIPTION'];

    public function saveFinanceCategory(FinanceCategoryVO $finCategoryVO)
    {
        $result = $this->select()->where('FINANCE_CATEGORY', '=', $finCategoryVO->getFinanceCategory())->get();
        if (count($result) > 0) {
            $finCategoryVO->setErrorResponse(true, '0000024');
        } else {
            $this->FINANCE_CATEGORY = $finCategoryVO->getFinanceCategory();
            $this->DESCRIPTION = $finCategoryVO->getDescription();
            $this->save();
        }
    }
    public function updateFinanceCategory(FinanceCategoryVO $finCategoryVO)
    {
        $this->where('FIN_CATEGORY_ID',$finCategoryVO->getFinanceCategoryId())->update(['FINANCE_CATEGORY'=>$finCategoryVO->getFinanceCategory(),
            'DESCRIPTION'=>$finCategoryVO->getDescription()]);
    }

    public function loadCategories()
    {
       $finCategory =  $this->select('FIN_CATEGORY_ID','FINANCE_CATEGORY')->get();
       return $finCategory;
    }
}