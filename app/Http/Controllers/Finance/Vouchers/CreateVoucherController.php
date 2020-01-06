<?php
/**
 * Created by IntelliJ IDEA.
 * User: nayab
 * Date: 13-Sep-17
 * Time: 4:56 PM
 */

namespace App\Http\Controllers\Finance\Vouchers;

use Illuminate\Support\Facades\Input;
use App\Http\Controllers\BaseController;
use App\Models\Finance\Settings\AccountHeadModel;
use App\Models\Finance\Settings\FiscalYearModel;
use App\Models\Finance\Vouchers\CreateVoucherModel;
use App\Models\Finance\Vouchers\VoucherHeadModel;
use App\Vos\FinanceVOS\VoucherVOS\CreateVoucherVO;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use function Sodium\increment;
use DB;

class CreateVoucherController extends BaseController
{
    public function loadView()
    {
        $accountHeads = new AccountHeadModel();
        $accountHead = $accountHeads->loadAccountHeadsByClassType();
        $voucherHeadModel = new VoucherHeadModel();
        $voucherHeads = $voucherHeadModel->loadVoucherHeads();
        $voucherModel = new CreateVoucherModel();
        $code = $voucherModel->LoadTransactionCode();
        return view('Finance.Vouchers.createvoucher')->with('accountheads', $accountHead)->with('voucherhead', $voucherHeads)->with('code',$code);
    }

    public function add(Request $request)
    {
        $fiscalYearModel = new FiscalYearModel();
        $fiscalYear = $fiscalYearModel->getCurrentFiscalYear();
        for($i=0; $i<count($request->GL_CODE); $i++){

            $q[] = ['GL_CODE' =>  $request->GL_CODE[$i] , 'TRANSACTION_CODE' => $request->transactioncode, 'TRANSACTION_DATE' => $request->transactiondate , 'LEDGER_ACCOUNT' => $request->LEDGER_ACCOUNT[$i] , 'DEBIT_AMOUNT' => $request->DEBIT_AMOUNT[$i] , 'CREDIT_AMOUNT' => $request->CREDIT_AMOUNT[$i] , 'DESCRIPTION' => $request->DESCRIPTION[$i] , 'FISCAL_YEAR' => $fiscalYear];
        }
        // $fiscalYearModel = new FiscalYearModel();
        // $fiscalYear = $fiscalYearModel->getCurrentFiscalYear();
        // $createVoucherModel = new CreateVoucherModel();
        // $debitVO = new CreateVoucherVO();
        // }
        // $allocations[] = $request->input('transactioncode');
        // $allocations[] = $request->input('transactiondate');
        // $allocations[] = $request->input('GL_CODE');
        // $allocations[] = $request->input('LEDGER_ACCOUNT');
        // $allocations[] = $request->input('DEBIT_AMOUNT');
        // $allocations[] = $request->input('CREDIT_AMOUNT');
        // $allocations[] = $request->input('DESCRIPTION');
        // foreach ($allocations as $alo) {
        //     echo implode(" ", $alo)."<br>";
        // }
        // dd($allocations);
        // $value = json_decode($allocations, true);
        // $GLAccountList = new Collection();
        // for($i=0;$i<count($value);$i++){
        //     // dd($value[$i]['ledgerAccountID']);
        //     $debitVO = new CreateVoucherVO();
        //     $debitVO->setVoucherheadId($request->input('vouncherhead'));
        //     $debitVO->setDescription($request->input('DESCRIPTION')).toString();
        //     $debitVO->setChequeno($request->input('chequeno'));
        //     $debitVO->setTransactionCodeprefix('JV');
        //     $debitVO->setTransactionDate($request->input('transactiondate'));
        //     $debitVO->setLedgerAccount($value[$i]['LEDGER_ACCOUNT']);
        //     $debitVO->setTransactionCode($value[$i]['transactioncode']);
        //     $debitVO->setCreatedBy($this->getUserName());
        //     $debitVO->setDebitAmount($value[$i]['debitamount']);
        //     $debitVO->setCreditAmount($value[$i]['creditamount']);
        //     $debitVO->setFiscalYear($fiscalYear[0]->FISCAL_YEAR);
        //     $GLAccountList->add($debitVO);
        // }
        CreateVoucherModel::insert($q);
            $vouchers =DB::table('fin_vouchers')->select('VOUCHER_ID')->get()->last()->VOUCHER_ID;
            Session::flash('createvoucher', "Voucher Added Successfully");
            return redirect('finance/vouchers/download-journal-pdf/'.$vouchers);
            // return redirect('finance/vouchers/create-voucher');

       //  $createVoucherModel->addDoubleEntry($GLAccountList);
       //  if($debitVO->getError()) {
       //      return $this->getMessageWithRedirect($debitVO->getErrorCode());
       //  } else {
       //      Session::flash('createvoucher', "Voucher Added Successfully");
       //      return redirect('finance/vouchers/create-voucher');
       // }
    }

    public function downloadDF($id){
       

        $vouchers = CreateVoucherModel::where('fin_vouchers.VOUCHER_ID', '=', $id)->first();
        $transactioncode = CreateVoucherModel::where('TRANSACTION_CODE', '=', $vouchers->TRANSACTION_CODE)->get();
        $transactioncode = CreateVoucherModel::join('fin_bank_accounts', 'fin_bank_accounts.ACCOUNT_ID', '=', 'fin_vouchers.BANK_ID')->where('TRANSACTION_CODE', '=', $vouchers->TRANSACTION_CODE)->get(['fin_vouchers.*', 'fin_bank_accounts.BANK_NAME']);
        if(!$transactioncode->isEmpty()){
        $pdf = \PDF::loadview('Finance/Vouchers/download-bank-pdf',['transactioncode' => $transactioncode]);
        return $pdf->stream('download.pdf');
        }else{
         Session::flash('createvoucher', "Bank is missing in your transaction");
            return redirect()->back();
        }
    }

    public function downloadDFJV($id){
       
        // dd('hello' , $id);
        // dd($id);

        $vouchers = CreateVoucherModel::where('fin_vouchers.VOUCHER_ID', '=', $id)->first();
        $transactioncode = CreateVoucherModel::where('TRANSACTION_CODE', '=', $vouchers->TRANSACTION_CODE)->get();
        $pdf = \PDF::loadview('Finance/Vouchers/download-journal-pdf',['transactioncode' => $transactioncode]);
        return $pdf->stream('download.pdf');
    }
}