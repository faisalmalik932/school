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
 * Developer Name: by nayab on 07-Aug-17 / 1:41 PM
 * All information contained herein is, and remains
 * the property of Prosigns Technologies
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model {
    
    const CREATED_BY = "CREATED_BY";
    const CREATED_AT = "CREATED_AT";
    const UPDATED_BY = "UPDATED_BY";
    const UPDATED_AT = "UPDATED_AT";

    public $timestamps = false;

    public function dateFormat($date){
        $date = \Carbon\Carbon::parse($date);
        return $date->format('D, j M Y');
    }

    public function getYear($date){
        $date = \Carbon\Carbon::parse($date);
        return $date->format('Y');
    }
}