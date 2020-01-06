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
 * Developer Name: by nayab on 08-Aug-17 / 3:33 PM
 * All information contained herein is, and remains
 * the property of Prosigns Technologies
 */

namespace Models\Common;

use App\Models\BaseModel;
use App\Vos\Common\DropDownVO;
use Illuminate\Support\Collection;
use DB;

class DropDownModel extends BaseModel
{

    public function getDropDownList($tableName, $columns, $where = null, $value = null)
    {
        $query = DB::table($tableName)->select($columns[0] . ' as VALUE', $columns[1] . ' as LABEL')->where('IS_DELETED', '=' , '0');
        if ($tableName == 'ptf_branches' || $tableName == 'ptf_branches_vw') {
            $where[] = 'IS_DROPDOWN';
            $value[] = 'YES';
        }
        if ($value[0] != "") {
            return $query->where($where[0], '=' , $value[0])->orderBy($columns[0])->get();
        } else {
            return $query->orderBy($columns[0])->get();
        }
    }
}
