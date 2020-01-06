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
 * Developer Name: by nayab on 11-Aug-17 / 10:03 PM
 * All information contained herein is, and remains
 * the property of Prosigns Technologies
 */
namespace App\Models\Common;

use App\Models\BaseModel;
use DB;

class DeleteRecordsModel extends BaseModel
{
    public function deleteRecord($primaryId, $table,$Id)
    {
    	if($table == "hrm_entitlements_vw"){
    		$table = "hrm_entitlements";
    	}
        return DB::table($table)->where($primaryId,'=',$Id)->update(['IS_DELETED'=>1]);

    }
}