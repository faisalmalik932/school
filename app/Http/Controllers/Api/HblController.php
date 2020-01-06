<?php
/**
 * Created by PhpStorm.
 * User: nayabraheel
 * Date: 05/04/2018
 * Time: 12:21 AM
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use DB;
use Illuminate\Http\Request;

class HblController extends BaseController
{

    public function error() {
        return $this->sendJsonDataResponse("500", "Invalid route or parameters", array());
    }

    public function verifyChallan($challan, Request $request) {
        if ($request->isMethod('get')) {
            if ($challan != '') {
                $result = DB::table('hbl_fee_challans_vw')->where('CHALLAN_NO', '=', $challan)->get();
                if ($result != null && count($result) > 0) {
                    if ($result[0]->FEE_STATUS == 'UNPAID') {
                        return $this->sendJsonDataResponse('700', 'Fee Challan is unpaid', $result);
                    } else {
                        return $this->sendJsonDataResponse('701', 'Fee Challan is already paid', $result);
                    }
                } else {
                    return $this->sendJsonDataResponse("702", 'Fee Challan number  ('.$challan.') is invalid', array());
                }
            } else {
                return $this->sendJsonDataResponse("703", 'Fee Challan number is missing', array());
            }
        } else {
            return $this->sendJsonDataResponse("001", 'HTTP method should be Get.', array());
        }
    }

    public function updateChallan( Request $request, $challan, $transaction, $status ) {
        $data = array();
        if ($request->isMethod('get')) {
            if ($challan != '') {
                if ($transaction != '') {
                    $result = DB::table('hbl_fee_challans_vw')->where('CHALLAN_NO', '=', $challan)->get();
                    if ($result == null || count($result) <= 0) {
                        return $this->sendJsonDataResponse("702", 'Fee Challan number  ('.$challan.') is invalid', array());
                    } else {
                        $resultHbl = DB::table('fin_fee_challans_hbl')->where('HBL_TRANSACTION_ID', '=', $transaction)->get();
                        if ($resultHbl != null && count($resultHbl) > 0) {
                            return $this->sendJsonDataResponse("702", 'HBL Transaction Id ('.$transaction.') already exists.', array());
                        } else {
                            if ($status != '') {
                                $transactionDate = self::getTimeStamp();
                                if ($status == 'paid') {
                                    DB::table('fin_fee_challans')->where('CHALLAN_NO', '=', $challan)->update(array(
                                        'FEE_STATUS' => $status,
                                        'PAYMENT_METHOD' => 'BANK',
                                        'RECEIVED_DATE' => $transactionDate
                                    ));
                                    $id = DB::table('fin_fee_challans_hbl')
                                        ->insertGetId(array(
                                            'CHALLAN_NO' => $challan,
                                            'HBL_TRANSACTION_ID' => $transaction,
                                            'TRANSACTION_DATE' => $transactionDate
                                        ));
                                    $data['peb_transaction_id'] = $id;
                                    $data['peb_transaction_date'] = $transactionDate;
                                    return $this->sendJsonDataResponse("800", 'Challan is ('.$status.') successfully.', $data);
                                } else {
                                    return $this->sendJsonDataResponse("801", 'Status is ('.$status.') is invalid', array());
                                }
                            } else {
                                return $this->sendJsonDataResponse("802", 'Status is missing', array());
                            }
                        }
                    }
                } else {
                    return $this->sendJsonDataResponse("804", 'HBL Transaction id is missing.', array());
                }
            } else {
                return $this->sendJsonDataResponse("703", 'Challan number is missing', array());
            }
        } else {
            return $this->sendJsonDataResponse("000", 'HTTP method should be Post.', array());
        }
    }
}