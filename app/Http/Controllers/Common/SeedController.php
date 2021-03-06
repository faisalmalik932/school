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
 * Developer Name: by nayab on 08-Aug-17 / 1:31 AM
 * All information contained herein is, and remains
 * the property of Prosigns Technologies
 */

namespace App\Http\Controllers\Common;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Models\Common\SeedModel;

class SeedController extends BaseController
{

    public function fetchSeedValues($codeName) {
        $seedModel = new SeedModel();
        $rows = $seedModel->fetchSeedValues($codeName);
        return $rows->toJson();
    }

}