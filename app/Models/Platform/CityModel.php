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
 * Time: 5:53 PM
 */

namespace App\Models\Platform;


use App\Models\BaseModel;
use App\Vos\CityVO;

class CityModel extends BaseModel
{
    protected $primaryKey = 'CITY_ID';
    protected $table = 'ptf_loc_cities';
    protected $fillable = ['COUNTRY_ID','STATE_ID','CITY_NAME','DESCRIPTION'];

    public function saveCityInfo(CityVO $cityVO)
    {
        $result = $this->select()->where('CITY_NAME', '=', $cityVO->getCityName())->get();
        if (count($result) > 0) {
            $cityVO->setErrorResponse(true, '000007');
        } else {
            $this->CITY_CODE = $cityVO->getCityCode();
            $this->COUNTRY_ID = $cityVO->getCountryId();
            $this->STATE_ID = $cityVO->getStateId();
            $this->CITY_NAME = $cityVO->getCityName();
            $this->DESCRIPTION = $cityVO->getDescription();
            $this->CREATED_BY = $cityVO->getCreatedBy();
            $this->save();
        }
    }

    public function updateCityInfo(CityVO $cityVO)
    {
        $this->where('CITY_ID',$cityVO->getCityId())
            ->update(['COUNTRY_ID'=> $cityVO->getCountryId(),
                'STATE_ID'=>$cityVO->getStateId(),
                'CITY_NAME'=>$cityVO->getCityName(),
                'DESCRIPTION'=>$cityVO->getDescription(),
                'CITY_CODE'=>$cityVO->getCityCode(),
                'UPDATED_BY' => $cityVO->getModifiedBy(),
                'UPDATED_AT' => $cityVO->getModifiedAt()]);
    }
}