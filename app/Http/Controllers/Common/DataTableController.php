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

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Models\Common\DataTableModel;

class DataTableController extends Controller
{
    public function fetchDataTableHeader($codename, Response $response) {
        $results = array(); $titles = array(); $columns = array(); $data = array();
        $xml = simplexml_load_string(file_get_contents(storage_path('xml/mapping.xml')));
        $pages = $xml->page;
        foreach ($pages as $page) {
            if ($page['codename'] == strtoupper ($codename)) {
                $datatable = $page->datatable;
                $title = $datatable->options->title[0];
                $tableName = $datatable['viewname'];
                $datatableModel = new DataTableModel();
                if(strtoupper ($codename) == "CREATEBANKVOUCHER"){
                    $results = $datatableModel->fetchDataTableBank($tableName, ((array) $datatable->body[0]->column));
                }
                elseif(strtoupper ($codename) == "CREATEVOUCHER"){
                    $results = $datatableModel->fetchDataTableVoucher($tableName, ((array) $datatable->body[0]->column));
                }
                else{

                    $results = $datatableModel->fetchDataTable($tableName, ((array) $datatable->body[0]->column));
                }
                
                

                // return response()->json(['result' => $tableName , 'columns' => $datatable->body[0]->column , 'res' => $results]);
                foreach ($results as $result) {
                    
                    if($tableName == "hrm_employees_payslip_vw"){
                    $btn = '<a href="downloadpdf/'.$result->MONTH.'/'.$result->YEAR.'/'.$result->EMPLOYEE_ID.'"><button class="btn btn-primary"><i class="icon-file-pdf"></i></button> </a>';
                    $result->btn = $btn;
                    }
                    if(strtoupper ($codename) == "CREATEBANKVOUCHER"){
                       $btn = '<a href="download-bank-pdf/'.$result->DT_RowId.'"><button class="btn btn-primary"><i class="icon-file-pdf"></i></button> </a>';
                       $result->BTN = $btn;
                       unset($result->DT_RowId);
                       
                    }
                    elseif(strtoupper ($codename) == "CREATEVOUCHER"){
                       $btn = '<a href="download-journal-pdf/'.$result->DT_RowId.'"><button class="btn btn-primary"><i class="icon-file-pdf"></i></button> </a>';
                       $result->BTN = $btn;
                       unset($result->DT_RowId);
                       
                    }
                    elseif($tableName == "fin_fee_challan_student_vw"){
                       $btn = '<button type="button" id="" value="'.$result->CHALLAN_ID.'" class="btn btn-primary ADD feeChallanDetail" >Detail</button>';
                       $result->CHALLAN_ID = $btn;
                       unset($result->DT_RowId);
                       
                    }
                    $columns[] = array_values ( (array) $result);
                }

                $headers = array_values( (array) $datatable->header[0]->title );
                foreach ($headers as $header) {
                    $titles[] = array('title' => $header);
                }
                $data['draw'] = 1;
                $data['recordsTotal'] = count($columns);
                $data['recordsFiltered'] = count($columns);
                $data['datatableTitle'] = $title;
                $data['data'] = $columns;
                $data['columns'] = $titles;
                return json_encode($data);
            }
        }
        return $results;
    }
}