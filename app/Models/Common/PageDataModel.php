<?php
/**
 * Created by IntelliJ IDEA.
 * User: nayab
 * Date: 17-Aug-17
 * Time: 2:05 AM
 */

namespace App\Models\Common;


use App\Models\BaseModel;
use DB;

class PageDataModel  extends BaseModel
{
    public function fetchPageData($tableName, $primaryid, $id) {
        return DB::table($tableName)->select()->where($primaryid, '=' , $id)->get();
    }
}