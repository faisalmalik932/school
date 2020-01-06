<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 10/11/2017
 * Time: 4:34 PM
 */

namespace App\Models\Finance\Settings;
use App\Models\BaseModel;
use App\Vos\FinanceVOS\Settings\AccountHeadVO;
use Models\Common\SeedModel;
use DB;

class AccountClassModel extends BaseModel
{
    protected $primaryKey = 'ACCOUNT_HEAD_ID';
    protected $table = 'fin_gl_accounts';

    public function loadAccountHeads()
     {
        $select = "";
        $seedModel = new SeedModel();
        $accountClasses = $seedModel->fetchSeedValues("CLASS_TYPE");
        foreach  ($accountClasses as $classType) {
            $className = $classType->CODE_VALUE;
            $glAccounts = $this->select('HEAD_PARENT_ID','ACCOUNT_HEAD_CODE','ACCOUNT_HEADS','ACCOUNT_HEAD_ID')->where('CLASS_TYPE', '=', $className)->orderBy('ACCOUNT_HEAD_CODE', 'asc')->get();
            $select = $select . "<optgroup label='". $className ."'>";
            foreach  ($glAccounts as $account) {
                $select = $select . "<option value='". $account->ACCOUNT_HEAD_ID ."'> (". $account->ACCOUNT_HEAD_CODE .") ". $account->ACCOUNT_HEADS ."</option>";
            }
            $select = $select . "</optgroup>";
        }
        return $select;
    }

}