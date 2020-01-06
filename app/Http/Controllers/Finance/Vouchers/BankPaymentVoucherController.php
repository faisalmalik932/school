<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 11/1/2017
 * Time: 8:00 PM
 */

namespace App\Http\Controllers\Finance\Vouchers;


use App\Http\Controllers\BaseController;
use App\Models\Finance\BankAccounts\BankAccountModel;
use App\Models\Finance\Settings\AccountHeadModel;
use App\Models\Finance\Settings\FiscalYearModel;
use App\Models\Finance\Vouchers\CreateVoucherModel;
use App\Models\Finance\Vouchers\VoucherHeadModel;
use App\Vos\FinanceVOS\VoucherVOS\CreateVoucherVO;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

class BankPaymentVoucherController extends BaseController
{
    public function loadView()
    {
        $accountHeads = new AccountHeadModel();
        $accountHeads = $accountHeads->loadAccountHeadsByClassType();
        $voucherHeadModel = new VoucherHeadModel();
        $voucherhead = $voucherHeadModel->loadVoucherHeads();
        $bankAccountModel = new BankAccountModel();
        $bankname = $bankAccountModel->BankAccount();
        $voucherModel = new CreateVoucherModel();
        $code = $voucherModel->LoadTransactionCode();
        $banks = BankAccountModel::OrderBy('ACCOUNT_ID', 'asc')->pluck('BANK_NAME', 'ACCOUNT_ID')->toArray();
        // dd($banks);
        return view('Finance.Vouchers.bankpaymentVoucher',compact('accountHeads','voucherhead','code','bankname','banks'));
    }
    public function add(Request $request)
    {
        // dd($request->all());
        $fiscalYearModel = new FiscalYearModel();
        $fiscalYear = $fiscalYearModel->getCurrentFiscalYear();
        $createVoucherModel = new CreateVoucherModel();
        // $allocations = $request->input('tabledata');
        // $value = json_decode($allocations, true);
                // dd($request->all());
        $GLAccountList = new Collection();
            for($i=0; $i<count($request->GL_CODE); $i++){
                $y=$i;
                $y++;

                $q[] = ['GL_CODE' =>  $request->GL_CODE[$i] , 'TRANSACTION_CODE' => $request->transactioncode, 'TRANSACTION_DATE' => $request->transactiondate , 'LEDGER_ACCOUNT' => $request->LEDGER_ACCOUNT[$i] , 'DEBIT_AMOUNT' => $request->DEBIT_AMOUNT[$i], 'CHEQUE_NO' => $request->chequeno , 'CREDIT_AMOUNT' => $request->CREDIT_AMOUNT[$i] , 'DESCRIPTION' => $request->DESCRIPTION , 'FISCAL_YEAR' => $fiscalYear, 'BANK_ID' =>  $request->BANK_ID[$y]];
            }
        // dd($q);
        // for($i=0;$i<count($value);$i++){
        //     $debitVO = new CreateVoucherVO();
        //     $debitVO->setVoucherheadId($request->input('vouncherhead'));
        //     $debitVO->setDescription($request->input('description'));
        //     $debitVO->setTransactionDate($request->input('transactiondate'));
        //     $debitVO->setLedgerAccount($value[$i]['ledgerAccountID']);
        //     $debitVO->setTransactionCode($value[$i]['transactioncode']);
        //     $debitVO->setTransactionCodeprefix('BPV');
        //     $debitVO->setFiscalYear($fiscalYear[0]->FISCAL_YEAR);
        //     $debitVO->setCreatedBy($this->getUserName());
        //     $debitVO->setChequeno($request->input('chequeno'));
        //     $debitVO->setDebitAmount($value[$i]['debitamount']);
        //     $debitVO->setCreditAmount($value[$i]['creditamount']);
        //     $debitVO->setBankId($value[$i]['BANK_ID']);
        //     $GLAccountList->add($debitVO);
        // }
        // dd($q);
        CreateVoucherModel::insert($q);
        $vouchers =DB::table('fin_vouchers')->select('VOUCHER_ID')->get()->last()->VOUCHER_ID;
        Session::flash('createvoucher', "Bank Voucher Added Successfully");
        return redirect('finance/vouchers/download-bank-pdf/'.$vouchers);
        // return redirect('finance/vouchers/bank-payment-voucher');
        // $createVoucherModel->addDoubleEntry($GLAccountList);
        // Session::flash('createvoucher', "Bank Voucher Added Successfully");
        // return redirect('finance/vouchers/bank-payment-voucher');
    }

}