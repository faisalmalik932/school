<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/30/2017
 * Time: 2:39 PM
 */

namespace App\Models\Finance\Settings;


use App\Models\BaseModel;
use App\Vos\FinanceVOS\Settings\AccountHeadVO;
use Models\Common\SeedModel;
use DB;

class AccountHeadModel extends BaseModel
{
    protected $primaryKey = 'ACCOUNT_HEAD_ID';
    protected $table = 'fin_gl_accounts';
    protected $fillable = ['ORG_ID','ACCOUNT_HEADS','CLASS_TYPE','DESCRIPTION','HEAD_PARENT_ID','ACCOUNT_HEAD_CODE','ACCOUNT_CLASS_ID','FISCAL_YEAR'];

    public function saveAccountHeads(AccountHeadVO $accountHeadVO)
    {
        $result = $this->select()->where([['ACCOUNT_HEADS', '=', $accountHeadVO->getAccountHead()],
            ['CLASS_TYPE', '=', $accountHeadVO->getAccountClass()],
            ['ACCOUNT_HEAD_CODE','=', $accountHeadVO->getAccountHeadCode()]])->get();
        $glcode =  $this->select()->where('ACCOUNT_HEAD_CODE','=', $accountHeadVO->getAccountHeadCode())->get();
        if (count($result) > 0) {
            $accountHeadVO->setErrorResponse(true, '0000025');
        }
        elseif(count($glcode)>0)
        {
            $accountHeadVO->setErrorResponse(true, '0000054');
        }
        else {
            $this->ACCOUNT_HEADS = $accountHeadVO->getAccountHead();
            $this->CLASS_TYPE = $accountHeadVO->getAccountClass();
            $this->HEAD_PARENT_ID = $accountHeadVO->getParentID();
            $this->DESCRIPTION = $accountHeadVO->getDescription();
            $this->ACCOUNT_HEAD_CODE = $accountHeadVO->getAccountHeadCode();
            $this->ORG_ID = $accountHeadVO->getOrgId();
            $this->CREATED_BY = $accountHeadVO->getCreatedBy();
            $this->FISCAL_YEAR = $accountHeadVO->getFiscalYear();
            $this->HAS_CHILD = $accountHeadVO->getHasChild();
            $this->save();
        }
    }
    public function UpdateAccountHeads(AccountHeadVO $accountHeadVO)
    {
        return $this->where('ACCOUNT_HEAD_ID', $accountHeadVO->getAccountHeadId())
            ->update([
                'ACCOUNT_HEADS'=> $accountHeadVO->getAccountHead(),
                'CLASS_TYPE'=>$accountHeadVO->getAccountClass(),
                'HEAD_PARENT_ID'=>$accountHeadVO->getParentID(),
                'ACCOUNT_HEAD_CODE' => $accountHeadVO->getAccountHeadCode(),
                'DESCRIPTION'=>$accountHeadVO->getDescription(),
                'FISCAL_YEAR'=>$accountHeadVO->getFiscalYear(),
                'HAS_CHILD'=>$accountHeadVO->getHasChild(),
                'UPDATED_BY' => $accountHeadVO->getModifiedBy(),
                'UPDATED_AT' => $accountHeadVO->getModifiedAt()
            ]);
    }

    public function loadExpenseHead()
    {
        $expenses = $this->select('ACCOUNT_HEADS','ACCOUNT_HEAD_ID')->where('CLASS_TYPE','=','EXPENSE')->get();
        return $expenses;
    }
    public function loadIncomeHead()
    {
        $income = $this->select('ACCOUNT_HEADS','ACCOUNT_HEAD_ID')->where('CLASS_TYPE','=','INCOME')->get();
        return $income;
    }

    public function loadAccountHeads()
    {
        $accountClass = $this->select('ACCOUNT_CLASS_ID','ACCOUNT_CLASS_CODE','ACCOUNT_CLASS')->get();
        return $accountClass;
    }

    public function loadAccountHeadsByClassType()
    {
        $select = "";
        $seedModel = new SeedModel();
        $accountClasses = $seedModel->fetchSeedValues("CLASS_TYPE");
        foreach  ($accountClasses as $classType) {
            $className = $classType->CODE_VALUE;
            $glAccounts = $this->select('HEAD_PARENT_ID','ACCOUNT_HEAD_CODE','ACCOUNT_HEADS','ACCOUNT_HEAD_ID')->where('CLASS_TYPE', '=', $className)->orderBy('ACCOUNT_HEAD_CODE', 'asc')->get();
            $select = $select . "<optgroup label='". $className ."'>";
            foreach  ($glAccounts as $account) {
                $select = $select . "<option value='". $account->ACCOUNT_HEAD_ID ."'>". $account->ACCOUNT_HEAD_CODE ." :: ". $account->ACCOUNT_HEADS ."</option>";
            }
            $select = $select . "</optgroup>";
        }
        return $select;
    }

    public function AccountHeadsPDFReport()
    {
        $accountHeads = DB::table('fin_gl_accounts_vw')->orderBy('ACCOUNT_HEAD_CODE')->orderBy('PARENT_NAME')->get();
        return $accountHeads;
    }
}