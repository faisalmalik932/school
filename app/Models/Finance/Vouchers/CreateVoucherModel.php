<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/13/2017
 * Time: 8:05 PM
 */
namespace App\Models\Finance\Vouchers;
use App\Models\BaseModel;
use App\Vos\FinanceVOS\Settings\AccountHeadVO;
use App\Vos\FinanceVOS\VoucherVOS\CreateVoucherVO;
use Illuminate\Database\Eloquent\Collection;
use DB;


class CreateVoucherModel extends BaseModel
{
    //protected $table = "fin_journal_voucher_vw"; 

    protected $primaryKey = 'VOUCHER_ID';
    protected $table = 'fin_vouchers';
    protected $fillable =  ['FISCAL_YEAR','CHEQUE_NO','TRANSACTION_CODE','TRANSACTION_DATE','ACCOUNT_HEAD_CODE','LEDGER_ACCOUNT','DEBIT_AMOUNT','CREDIT_AMOUNT','DESCRIPTION','TRANSACTION_CODE_PREFIX','GL_CODE','BANK_ID'];

    public function addDoubleEntry(Collection $Collection)
    {
            $Collection->each(function ($VO) {
                $this->insert(array(
                    array(
                        // 'VOUCHER_HEAD_ID' => $VO->getVoucherHeadId(),
                        'TRANSACTION_DATE' => $VO->getTransactionDate(),
                        'LEDGER_ACCOUNT' => $VO->getLedgerAccount(),
                        'DEBIT_AMOUNT' => $VO->getDebitAmount(),
                        'CREDIT_AMOUNT' => $VO->getCreditAmount(),
                        'TRANSACTION_CODE' => $VO->getTransactionCode(),
                        'DESCRIPTION' => $VO->getDescription(),
                        'CHEQUE_NO'=> $VO->getChequeno(),
                        'CREATED_BY'=>$VO->getCreatedBy(),
                        'GL_CODE'=>$VO->getGlcode(),
                        'TRANSACTION_CODE_PREFIX'=>$VO->getTransactionCodeprefix(),
                        'FISCAL_YEAR'=>$VO->getFiscalYear(),
                        'BANK_ID'=>$VO->getBankId()
                    )));
            });
    }

    public function banks(){
        return $this->BelongsTo();
    }
   /* public function UpdateVoucherInfo(CreateVoucherVO $credit, CreateVoucherVO $debit)
    {
        $this->where('VOUCHER_ID',$credit->getVoucherId())
            ->update(array(
                array(
                    'VOUCHER_HEAD_ID' => $credit->getVoucherHeadId(),
                    'TRANSACTION_DATE' => $credit->getTransactionDate(),
                    'FROM_LEDGER_ACCOUNT' => $credit->getFromledgerAccount(),
                    'TO_LEDGER_ACCOUNT' => $credit->getToLedgerAccount(),
                    'AMOUNT' => $credit->getAmount(),
                    'ACCOUNT_TYPE' => $credit->getAccountType()
                ),
                array(
                    'VOUCHER_HEAD_ID' => $debit->getVoucherHeadId(),
                    'TRANSACTION_DATE' => $debit->getTransactionDate(),
                    'FROM_LEDGER_ACCOUNT' => $debit->getFromledgerAccount(),
                    'TO_LEDGER_ACCOUNT' => $debit->getToLedgerAccount(),
                    'AMOUNT' => $debit->getAmount(),
                    'ACCOUNT_TYPE' => $debit->getAccountType()
                )
            ));
    }*/

    public function LoadTransactionCode()
    {
        $transactionCode = $this->count();
        return $transactionCode;
    }

    public function getLedgerPeriodWise(AccountHeadVO $accountHeadVO)
    {
        $ledger = DB::table('fin_journal_voucher_vw')
            ->whereBetween('TRANSACTION_DATE', [$accountHeadVO->getStartdate(),$accountHeadVO->getEnddate()])
            ->whereBetween('LEDGER_ACCOUNT', [$accountHeadVO->getFromaccounthead(),$accountHeadVO->getToaccounthead()])
            ->get();
        if(count($ledger)>0) {
            return $ledger;
        }
        else{
            $accountHeadVO->setErrorResponse(true, '0000053');
        }
    }

    public function getLedgerTotalPeriodWise(AccountHeadVO $accountHeadVO)
    {
        $ledgerTotal = DB::select("call fin_general_ledger_report_proc(?,?,?)",[$accountHeadVO->getStartdate(),$accountHeadVO->getEnddate(),$accountHeadVO->getToaccounthead()]);
        if(count($ledgerTotal)>0) {
            return $ledgerTotal;
        }
        else{
            $accountHeadVO->setErrorResponse(true, '0000053');
        }
    }

    public  function getendingBalance(AccountHeadVO $accountHeadVO)
    {
        $ledger = DB::table('fin_journal_voucher_vw')->selectRaw(' sum(DEBIT_AMOUNT) as Sum')
            ->whereBetween('TRANSACTION_DATE', [$accountHeadVO->getStartdate(),$accountHeadVO->getEnddate()])
            ->whereBetween('LEDGER_ACCOUNT', [$accountHeadVO->getFromaccounthead(),$accountHeadVO->getToaccounthead()])
            ->groupBy('Year','month')
             ->get();
        return $ledger;
    }

    public function getDebitBalance(AccountHeadVO $accountHeadVO)
    {
        $ledger = DB::table('fin_journal_voucher_vw')->select('Year','month')->selectRaw(' sum(DEBIT_AMOUNT) as DEBIT_AMOUNT')
            ->whereBetween('TRANSACTION_DATE', [$accountHeadVO->getStartdate(),$accountHeadVO->getEnddate()])
            ->whereBetween('LEDGER_ACCOUNT', [$accountHeadVO->getFromaccounthead(),$accountHeadVO->getToaccounthead()])
            ->groupBy('Year','month')
            ->get();
        return $ledger;

    }

    public function getCreditBalance(AccountHeadVO $accountHeadVO)
    {
        $ledger = DB::table('fin_journal_voucher_vw')->selectRaw(' sum(CREDIT_AMOUNT) as CREDIT_AMOUNT')
            ->whereBetween('TRANSACTION_DATE', [$accountHeadVO->getStartdate(),$accountHeadVO->getEnddate()])
            ->whereBetween('LEDGER_ACCOUNT', [$accountHeadVO->getFromaccounthead(),$accountHeadVO->getToaccounthead()])
            ->groupBy('Year','month')
            ->get();
        return $ledger;

    }

    public function gettotalbalance(AccountHeadVO $accountHeadVO)
    {
        $debitamount = DB::table('fin_journal_voucher_vw')
            ->whereBetween('TRANSACTION_DATE', [$accountHeadVO->getStartdate(),$accountHeadVO->getEnddate()])
            ->whereBetween('LEDGER_ACCOUNT', [$accountHeadVO->getFromaccounthead(),$accountHeadVO->getToaccounthead()])
            ->sum('DEBIT_AMOUNT');

        $creditamount = DB::table('fin_journal_voucher_vw')
            ->whereBetween('TRANSACTION_DATE', [$accountHeadVO->getStartdate(),$accountHeadVO->getEnddate()])
            ->whereBetween('LEDGER_ACCOUNT', [$accountHeadVO->getFromaccounthead(),$accountHeadVO->getToaccounthead()])
            ->sum('CREDIT_AMOUNT');

        $totalbalnce = $debitamount-$creditamount;
        return $totalbalnce;
    }

    public function getTrialBalancePeriodWise(AccountHeadVO $accountHeadVO)
    {
        $trialbalanceTotal = DB::select("call fin_trial_balance_periodwise_proc(?,?)", [$accountHeadVO->getStartdate(),$accountHeadVO->getEnddate()]);
        if(count($trialbalanceTotal)>0){
        return $trialbalanceTotal;}
        else{
                $accountHeadVO->setErrorResponse(true, '0000049');
        }

    }

    public function getTrialBalanceTotal(AccountHeadVO $accountHeadVO)
    {
        $total = DB::table('fin_journal_voucher_vw')->selectRaw(' sum(CREDIT_AMOUNT) as CREDIT_SUM')
            ->selectRaw('sum(DEBIT_AMOUNT) as DEBIT_SUM')
            ->whereBetween('TRANSACTION_DATE', [$accountHeadVO->getStartdate(),$accountHeadVO->getEnddate()])
            ->get();
        if(count($total)>0) {
            return $total;
        }
    else{
        $accountHeadVO->setErrorResponse(true, '0000053');
    }

    }

    public function gettrialBalanceInfo(AccountHeadVO $accountHeadVO)
    {
        $trialbalanceInfo = DB::select("call fin_trial_balance_info_proc(?,?)", [$accountHeadVO->getStartdate(),$accountHeadVO->getEnddate()]);
        if(count($trialbalanceInfo)>0){
            return $trialbalanceInfo;}
        else{
            $accountHeadVO->setErrorResponse(true, '0000049');
        }
    }

    public function ledgerName(AccountHeadVO $accountHeadVO)
    {
        $ledgername = DB::table('fin_journal_voucher_vw')->select('LEDGER_ACCOUNT_NAME')
            ->where('LEDGER_ACCOUNT','=',$accountHeadVO->getFromaccounthead())->pluck('LEDGER_ACCOUNT_NAME')->first();
        return $ledgername;
    }

    public function getBalanceSheetAssetsPeriodWise(AccountHeadVO $accountHeadVO)
    {
        $balanceSheetInfo = DB::select("call fin_balance_sheet_assets_proc(?,?)", [$accountHeadVO->getStartdate(),$accountHeadVO->getEnddate()]);
        if(count($balanceSheetInfo)>0){
            return $balanceSheetInfo;}
        else{
            $accountHeadVO->setErrorResponse(true, '0000049');
        }

    }
    public function getBalanceSheetLiabilitiesPeriodWise(AccountHeadVO $accountHeadVO)
    {
        $balanceSheetInfo = DB::select("call fin_balance_sheet_liabilities_proc(?,?)", [$accountHeadVO->getStartdate(),$accountHeadVO->getEnddate()]);
        if(count($balanceSheetInfo)>0){
            return $balanceSheetInfo;}
        else{
            $accountHeadVO->setErrorResponse(true, '0000049');
        }

    }

}