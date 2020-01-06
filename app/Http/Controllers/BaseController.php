<?php
/**
 * ************************************************************************
 *  *
 *  * PROSIGNS CONFIDENTIAL
 *  * __________________
 *  *
 *  *  Copyright (c) 2017. Prosigns Technologies
 *  *  All Rights Reserved.
 *  *
 *  * NOTICE:  All information contained herein is, and remains
 *  * the property of Prosigns Technologies and its suppliers,
 *  * if any.  The intellectual and technical concepts contained
 *  * herein are proprietary to Prosigns Technologies
 *  * and its suppliers and may be covered by Pakistan and Foreign Patents,
 *  * patents in process, and are protected by trade secret or copyright law.
 *  * Dissemination of this information or reproduction of this material
 *  * is strictly forbidden unless prior written permission is obtained
 *  * from Prosigns Technologies.
 *
 */

/**
 * Product Name: IntelliJ IDEA.
 * Developer Name: by nayab on 07-Aug-17 / 4:08 PM
 * All information contained herein is, and remains
 * the property of Prosigns Technologies
 */

namespace App\Http\Controllers;

use App\Models\Platform\BranchModel;
use App\Models\Platform\HostelModel;
use Illuminate\Support\Facades\Redirect;

class BaseController extends Controller
{


    /**
     * BaseController constructor.
     */
    public function __construct()
    {

    }

    public function getMessage($messageCode)
    {
        return __('messages.' . $messageCode);
    }

    public function setMessage($message)
    {
        return __('messages.' . $message);
    }

    public function getMessageWithRedirect($messageCode)
    {
        return Redirect::back()->withErrors($this->getMessage($messageCode));
    }

    public function sendErrorMessage($message) {
        return Redirect::back()->withErrors($message);
    }

    public function getOrgID()
    {
        return \request()->session()->get("ORG_ID");
    }

    public function getBranchId() {
        return \request()->session()->get('BRANCH_ID');
    }

    public function getEmployeeId() {
        return \request()->session()->get('EMPLOYEE_ID');
    }

    public function getUserId() {
        return \request()->session()->get('USER_ID');
    }

    public function getUserName() {
        return strtoupper(\request()->session()->get('USER_ROLE_NAME'));
    }

    public function getRoleId() {
        return \request()->session()->get('USER_ROLE_ID');
    }

    public function getTimeStamp() {
        return date("Y-m-d h:i");
    }
    public function dateFormat($date){
        $date = \Carbon\Carbon::parse($date);
        return $date->format('D, j M Y');
    }

    public function getYear($date){
        $date = \Carbon\Carbon::parse($date);
        return $date->format('Y');
    }

    public function getDataJson($data) {
        return json_encode($data, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
    }

    public function sendJsonDataResponse($status, $message, $data = array()) {
        return strtolower(json_encode(array("CODE" => $status, "MESSAGE" => $message, "DATA" => $this->getDataJson($data)), JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE));
    }
}