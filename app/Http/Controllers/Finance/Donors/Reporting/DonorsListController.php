<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 10/17/2017
 * Time: 10:41 AM
 */

namespace App\Http\Controllers\Finance\Donors\Reporting;


use App\Http\Controllers\BaseController;
use App\Models\Finance\Donors\AllocateDonorModel;
use App\Models\Finance\Donors\DonorModel;
use App\Vos\FinanceVOS\DonorsVOS\AllocateDonorVO;
use PDF;

class DonorsListController extends BaseController
{
    public function loadView()
    {
        $donorsModel = new DonorModel();
        $donors = $donorsModel->donorsList();
        $total = $donorsModel->totalDonors();
        $sum = $donorsModel->DonorsFunds();
        //return view('Finance.Donors.Reporting.donorsList',compact('donors','total','sum'));
       $pdf = PDF::loadview('Finance.Donors.Reporting.donorsList',compact('donors','total','sum'))
            ->setPaper( 'a4', 'landscape');
        return $pdf->stream('Finance.Donors.Reporting.donorsList.pdf');

    }

    public function donorWisePDF()
    {
        $donorsModel = new DonorModel();
        /*$donors = $donorsModel->donorsList();*/
        $donorAllocationModel = new AllocateDonorModel();
        $donorList = $donorAllocationModel->DonorWise();
        $donor = $donorsModel->donorFunded();
        $funds = $donorsModel->donorFunds();
        //return view('Finance.Donors.Reporting.donorWiseReport',compact('donors','donorList'));
        $pdf = PDF::loadview('Finance.Donors.Reporting.donorWiseReport',compact('donors','donorList','donor','funds'))
            ->setPaper( 'a4', 'portrait');
        return $pdf->stream('Finance.Donors.Reporting.donorWiseReport.pdf');

    }

    public function donorYearWisePDF()
    {
        $donorsModel = new DonorModel();
        $donors = $donorsModel->donorsList();
        $donorAllocationModel = new AllocateDonorModel();
        $donorList = $donorAllocationModel->DonorWise();
        $totalAdopted = $donorAllocationModel->totalAdopted();
        //return view('Finance.Donors.Reporting.donorYearWise',compact('donors','donorList','totalAdopted'));
        $pdf = PDF::loadview('Finance.Donors.Reporting.donorYearWise',compact('donors','donorList','totalAdopted'))
            ->setPaper( 'a4', 'portrait');
        return $pdf->stream('Finance.Donors.Reporting.donorYearWise.pdf');
    }

}