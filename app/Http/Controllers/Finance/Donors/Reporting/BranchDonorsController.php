<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 10/16/2017
 * Time: 7:31 PM
 */

namespace App\Http\Controllers\Finance\Donors\Reporting;


use App\Http\Controllers\BaseController;
use App\Models\Finance\Donors\AllocateDonorModel;
use App\Models\Finance\Donors\DonorModel;
use App\Vos\FinanceVOS\DonorsVOS\AllocateDonorVO;
use PDF;

class BranchDonorsController extends BaseController
{

    public function loadView()
    {
        return view('Finance.Donors.Reporting.searchBranchwise');
    }

    public function donorAdoptionPDF()
    {
        $allocateVO = new AllocateDonorVO();
        $allocateVO->setBranchId(request('branch'));
        $donorsModel = new DonorModel();
        $donors = $donorsModel->donorsList();
        $donorAllocationModel = new AllocateDonorModel();
        $donorList = $donorAllocationModel->BranchWise($allocateVO);
        $totalAdopted = $donorAllocationModel->totalAdopted($allocateVO);
        $donoramount = $donorAllocationModel->donorAmount($allocateVO);
        if ($allocateVO->getError()) {
            return $this->getMessageWithRedirect($allocateVO->getErrorCode());
        }
            else {
                //return view('Finance.Donors.Reporting.branchwiseReport',compact('donors','donorList','totalAdopted'));
                $pdf = PDF::loadview('Finance.Donors.Reporting.branchwiseReport', compact('donors', 'donorList', 'totalAdopted'))
                    ->setPaper('a4', 'portrait');
                return $pdf->stream('Finance.Donors.Reporting.branchwiseReport.pdf');
            }
    }

    public function AllBranchDonorAdoptionPDF()
    {
        $donorsModel = new DonorModel();
        $donors = $donorsModel->donorsList();
        $donorAllocationModel = new AllocateDonorModel();
        $detail = $donorAllocationModel->DonorWise();
        $branches = $donorAllocationModel->branches();
        $funds = $donorsModel->donorFunds();
        //return view('Finance.Donors.Reporting.branchwiseReport',compact('donors','detail'));
        $pdf = PDF::loadview('Finance.Donors.Reporting.allBranchesDonor',compact('donors','detail','branches','funds'))
            ->setPaper( 'a4', 'portrait');
        return $pdf->stream('Finance.Donors.Reporting.allBranchesDonor.pdf');
    }

}