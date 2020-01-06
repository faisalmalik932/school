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

namespace Models\Common;

use App\Models\BaseModel;
use DB;
use Illuminate\Http\Request;



class DataTableModel extends BaseModel {


    public function fetchDataTable($tableName, $columns) {
        return DB::table($tableName)->select($columns)->get();
        
    }

    public function fetchDataTableWithId($tableName, $columns , $variable , $except) {
        $table =  DB::table($tableName);
        $table->select($columns);
        foreach ($variable as $key => $value) {
            if($key == $except){
                continue;
            }
        $table->where($key , $value);
        }
        return $table->get();   
    }
    public function fetchDataTableBank($tableName, $columns) {
        $table =  DB::table($tableName)->select($columns)->whereNotNull('BANK_ID')->get();
        return $table;  
    }
    public function fetchDataTableVoucher($tableName, $columns) {
        $table =  DB::table($tableName)->select($columns)->whereNull('BANK_ID')->get();
        return $table;	
    }

}