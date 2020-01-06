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
 * Developer Name: by nayab on 11-Aug-17 / 9:56 PM
 * All information contained herein is, and remains
 * the property of Prosigns Technologies
 */

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\Common\DeleteRecordsModel;
use App\Models\Common\PageDataModel;
use Illuminate\Support\Facades\Input;

class PageController extends Controller
{
    public function deleteRecord($codename,$id) {

        $xml = simplexml_load_string(file_get_contents(storage_path('xml/mapping.xml')));
        $pages = $xml->page;
        foreach ($pages as $page) {
            if ($page['codename'] == strtoupper ($codename)) {
                $primary = $page->primary;
                $deleteModel = new DeleteRecordsModel();
                $response = $deleteModel->deleteRecord($primary, $page['tablename'],$id);
                return $response;
            }
        }
    }

    public function fetchPageData($codename, $id) {
        $data = array();
        $xml = simplexml_load_string(file_get_contents(storage_path('xml/mapping.xml')));
        $pages = $xml->page;
        foreach ($pages as $page) {
            if ($page['codename'] == strtoupper($codename)) {
                $pageModel = new PageDataModel();
                $result = $pageModel->fetchPageData($page['viewname'], $page->primary, $id);
                foreach ($result[0] as $key => $value) {
                    foreach ($page->fields->children() as $field) {
                        if ($field == $key) {
                            $id = array_values ( (array) $field->attributes()->id);
                            $data[] = array((string) $id[0] => (string) $value);
                        }
                    }
                }
                return json_encode($data);

            }
        }
    }
}