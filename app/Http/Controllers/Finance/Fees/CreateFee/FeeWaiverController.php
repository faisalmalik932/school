<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/20/2017
 * Time: 5:35 PM
 */

namespace App\Http\Controllers\Finance\Fees\CreateFee;


use App\Http\Controllers\BaseController;
use App\Models\Finance\Fees\CreateFee\FeeWaiverModel;
use App\Vos\FinanceVOS\FeeVOS\CreateFeeVOS\FeeWaiverVO;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FeeWaiverController extends BaseController
{
    public function loadView()
    {
        return view('Finance.Fees.CreateFee.feeWaivers');

    }

    public function add(Request $request)
    {
        $allocations = $request->input('tabledata');
        $value = json_decode($allocations, true);
        $feeWaiverList = new Collection();
        $feeWaiverModel = new FeeWaiverModel();
        $feeWaiverVO = new FeeWaiverVO();
        for ($i = 0; $i < count($value); $i++) {
            $feeWaiverVO = new FeeWaiverVO();
            $feeWaiverVO->setFeeWaiverId($request->input('primary'));
            $feeWaiverVO->setFeeCategoryId($value[$i]['feecategoryID']);
            $feeWaiverVO->setAmount($value[$i]['amount']);
            $feeWaiverVO->setFeeParticularId($value[$i]['feesubcategoryID']);
            $feeWaiverVO->setWaiverCategory($request->input('category'));
            $feeWaiverVO->setStudentCategory($request->input('studentcategory'));
            $feeWaiverVO->setCreatedBy($this->getUserName());
            $feeWaiverList->add($feeWaiverVO);
        }
            if ($feeWaiverList->count() > 0) {
                $feeWaiverModel->addFeeWaivers($feeWaiverList);
        }
                if ($feeWaiverVO->getError()) {
                    return $this->getMessageWithRedirect($feeWaiverVO->getErrorCode());
                } else {
                    Session::flash('feewaiver', "Fee Waiver Added Successfully");
                    return redirect('finance/fees/create-fee-waivers');
                }
            }
}