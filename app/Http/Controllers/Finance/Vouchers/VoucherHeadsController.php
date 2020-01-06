<?php
/**
 * Created by IntelliJ IDEA.
 * User: nayab
 * Date: 13-Sep-17
 * Time: 4:58 PM
 */

namespace App\Http\Controllers\Finance\Vouchers;

use App\Http\Controllers\BaseController;
use App\Models\Finance\Settings\AccountHeadModel;
use App\Models\Finance\Vouchers\VoucherHeadModel;
use App\Vos\FinanceVOS\VoucherVOS\VoucherHeadVO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Models\Common\SeedModel;

class VoucherHeadsController extends BaseController
{
    public function loadView()
    {
        $accountHeads = new AccountHeadModel();
        $accountHead = $accountHeads->loadAccountHeadsByClassType();
        return view('Finance.Vouchers.voucherheads')->with('accountheads', $accountHead);
    }

    public function add(Request $request)
    {
        $voucherheadVO = new VoucherHeadVO();
        $voucherheadVO->setVoucherHeadId($request->input('primary'));
        $voucherheadVO->setOrgId(1);
        $voucherheadVO->setVoucherHeadName($request->input('voucherheader'));
        $voucherheadVO->setAccountheadId($request->input('glaccount'));
        $voucherheadVO->setVoucherType($request->input('vouchertype'));
        $voucherheadVO->setStatus($request->input('voucherstatus'));
        $voucherheadModel = new VoucherHeadModel();
        if($voucherheadVO->getVoucherHeadId() <= 0 || $voucherheadVO->getVoucherHeadId() == '') {
            $voucherheadVO->setCreatedBy($this->getUserName());
            $voucherheadModel->addVoucherHead($voucherheadVO);
            if ($voucherheadVO->getError()) {
                return $this->getMessageWithRedirect($voucherheadVO->getErrorCode());
            } else {
                Session::flash('voucherhead', "Voucher Head Added Successfully");
                return redirect('finance/vouchers/voucher-head');
            }
        }
        else{
            $voucherheadVO->setModifiedBy($this->getUserName());
            $voucherheadVO->setModifiedAt($this->getTimeStamp());
            $voucherheadModel->updateVoucherHead($voucherheadVO);
            Session::flash('voucherhead', "Voucher Head Updated Successfully");
            return redirect('finance/vouchers/voucher-head');
        }
    }
}