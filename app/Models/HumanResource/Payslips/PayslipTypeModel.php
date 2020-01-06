<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 12/5/2017
 * Time: 12:04 PM
 */

namespace App\Models\HumanResource\Payslips;


use App\Models\BaseModel;
use App\Vos\HumanResourceVOS\EmployeePayslipVO;
use App\Vos\HumanResourceVOS\SalaryCategoryVO;
use DB;
use Illuminate\Database\Eloquent\Collection;

class PayslipTypeModel extends BaseModel
{
    protected $primaryKey = 'ID';
    protected $table = 'hrm_employees_payslips_type';
    protected $fillable = ['PAYSLIP_ID','PAYSLIP_NO','PAYSLIP_TYPE','AMOUNT'];

    public function addPayslipType( $details , $id)
    {

        $slipType = new $this;
        $slipType->PAYSLIP_ID = $id;
        $slipType->PAYSLIP_NO = $this->countPayslipTypes();
        $slipType->PAYSLIP_TYPE = $details->SALARY_CATEGORY_ID;
        $slipType->AMOUNT = $details->AMOUNT;
        $slipType->SALARY_TYPE = $details->SALARY_TYPE;
        $slipType->save();
        return $slipType;
    }
    public function countPayslipTypes()
    {
        $payslips = $this->count();
        return $payslips+1;
    }

}