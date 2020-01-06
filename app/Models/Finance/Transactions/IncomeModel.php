<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/26/2017
 * Time: 4:08 PM
 */

namespace App\Models\Finance\Transactions;


use App\Models\BaseModel;
use App\Vos\FinanceVOS\TransactionVOS\IncomeVO;

class IncomeModel extends BaseModel
{
    protected $primaryKey = 'INCOME_ID';
    protected $table = 'fin_income';
    protected $fillable =['ACCOUNT_HEAD_ID','TITLE','DESCRIPTION','AMOUNT','DATE'];

    public function saveIncomeInfo(IncomeVO $incomeVO)
    {
        $this->ACCOUNT_HEAD_ID = $incomeVO->getAccountHeadId();
        $this->TITLE = $incomeVO->getIncomeTitle();
        $this->DESCRIPTION = $incomeVO->getDescription();
        $this->AMOUNT = $incomeVO->getAmount();
        $this->DATE = $incomeVO->getDate();
        $this->save();
    }

    public function updateIncomeInfo(IncomeVO $incomeVO)
    {
        $this->where('INCOME_ID',$incomeVO->getIncomeId())
            ->update(['ACCOUNT_HEAD_ID'=>$incomeVO->getAccountHeadId(),
                'TITLE'=>$incomeVO->getIncomeTitle(),
                'DESCRIPTION'=>$incomeVO->getDescription(),
                'AMOUNT'=>$incomeVO->getAmount(),
                'DATE'=>$incomeVO->getDate()]);
    }
}