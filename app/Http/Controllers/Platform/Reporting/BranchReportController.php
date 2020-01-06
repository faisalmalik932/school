<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 10/10/2017
 * Time: 3:57 PM
 */

namespace App\Http\Controllers\Platform\Reporting;


use App\Http\Controllers\BaseController;
use App\Models\Platform\BranchModel;
use App\Models\Platform\Reporting\BranchReportModel;
use App\Vos\BranchVOS\BranchVO;
use Illuminate\Http\Request;
use PDF;

class BranchReportController extends BaseController
{
    public function loadView()
    {
        return view('Platform.Reporting.BranchWiseReporting.SearchByMonth');
    }

    public function monthlyPdfReport(Request $request)
    {
        $branchVO = new BranchVO();
        $branchModel = new BranchReportModel();
        $branchVO->setBranchId($request->input('branch'));
        $branchVO->setStartDate($request->input('startdate'));
        $branchVO->setEndDate($request->input('enddate'));
        $branchData = $branchModel->monthlyBranchReport($branchVO);
        return view('Platform.Reporting.BranchWiseReporting.branchReport')->with('branchData',$branchData);
        /*$pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadview('Platform.Reporting.BranchWiseReporting.branchReport',['branchData'=>$branchData])->setPaper('a4', 'portrait');
        return $pdf->stream('Platform.Reporting.BranchWiseReporting.branchReport.pdf');*/

    }

}