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
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/8/2017
 * Time: 5:46 PM
 */

namespace App\Http\Controllers\Platform;

use App\Http\Controllers\BaseController;
use App\Models\Platform\CityModel;
use App\Vos\CityVO;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;

class CitiesController extends BaseController
{
    public function loadView()
    {
        return view('Platform.cities');
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'cityname' => 'bail|required|max:45'
        ]);
        $cityVO = new CityVO();
        $cityVO->setCityCode('001');
        $cityVO->setCityId($request->input('primary'));
        $cityVO->setCityName($request->input('cityname'));
        $cityVO->setCountryId($request->input('country'));
        $cityVO->setStateId($request->input('state'));
        $cityVO->setDescription($request->input('description'));
        $cityModel = new CityModel();
        if($cityVO->getCityId() <= 0 || $cityVO->getCityId() == '') {
            $cityVO->setCreatedBy($this->getUserName());
            $cityModel->saveCityInfo($cityVO);
            if ($cityVO->getError()) {
                return $this->getMessageWithRedirect($cityVO->getErrorCode());
            } else {
                Session::flash('City', "City Added Successfully");
                return redirect('platform/cities');
            }
        }
        else{
            $cityVO->setModifiedBy($this->getUserName());
            $cityVO->setModifiedAt($this->getTimeStamp());
            $cityModel->updateCityInfo($cityVO);
            Session::flash('City', "City Updated Successfully");
            return redirect('platform/cities');
        }
    }

}