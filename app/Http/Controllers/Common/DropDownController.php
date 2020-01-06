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
 * Developer Name: by nayab on 08-Aug-17 / 1:32 AM
 * All information contained herein is, and remains
 * the property of Prosigns Technologies
 */

namespace App\Http\Controllers\Common;

use App\Http\Controllers\BaseController;
use App\Vos\Common\DropDownVO;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Mockery\Exception;
use Models\Common\DropDownModel;

class DropDownController extends BaseController
{

    public function fetchDropDownList($codename, Request $request) {
        try {
            $xml = simplexml_load_string(file_get_contents(storage_path('xml/dropdowns.xml')));
            $dropdowns = $xml->dropdown;
            foreach ($dropdowns as $dropdown) {
                if ($dropdown['codename'] == strtoupper($codename)) {
                    $tableName = $dropdown['viewname'];
                    $columns = $dropdown->datacolumn;
                    $dropdownModel = new DropDownModel();
                    if ($request->input('ID') != '') {
                        $where = $dropdown->where[0]->column[0];
                        $data = $dropdownModel->getDropDownList($tableName, $columns, $where, $request->input('ID'));
                    } else {
                        $data = $dropdownModel->getDropDownList($tableName, $columns);
                    }

                    return json_encode($data);
                }
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}