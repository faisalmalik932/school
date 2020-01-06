<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 12/12/2017
 * Time: 12:32 PM
 */

namespace App\Http\Controllers\HumanResource\Settings;


use App\Http\Controllers\BaseController;
use App\Models\HumanResource\Payslips\PayslipModel;
use App\Vos\HumanResourceVOS\SalaryCategoryVO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SalaryCategoriesController extends BaseController
{
    public function loadView()
    {
        return view('HumanResource.SalaryStructure.salaryCategories');
    }

    public function addSalaryCategories(Request $request)
    {
        // dd($request);
        $salaryCategories = new SalaryCategoryVO();
        $payslipModel = new PayslipModel();
        $salaryCategories->setSalarycategoryId($request->input('primary'));
        $salaryCategories->setDescription($request->input('description'));
        $salaryCategories->setSalaryType($request->input('type'));
        $salaryCategories->setSalaryCategory($request->input('category'));
        if($salaryCategories->getSalarycategoryId() <= 0 || $salaryCategories->getSalarycategoryId() == '') {
            $salaryCategories->setCreatedBy($this->getUserName());
            $payslipModel->addSalaryCategories($salaryCategories);
            if ($salaryCategories->getError()) {
                return $this->getMessageWithRedirect($salaryCategories->getErrorCode());
            } else {
                Session::flash('salarycategory', "Salary Category Added Successfully");
                return redirect('hr/settings/salarycategories');
            }
        }
        else{
            $salaryCategories->setModifiedBy($this->getUserName());
            $salaryCategories->setModifiedAt($this->getTimeStamp());
            $payslipModel->updateSalaryCategories($salaryCategories);
            Session::flash('jobtitle', "Job Title Updated Successfully");
            return redirect('hr/settings/salarycategories');
        }

    }

}