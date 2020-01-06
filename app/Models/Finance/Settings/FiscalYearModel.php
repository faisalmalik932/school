<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/7/2017
 * Time: 7:49 PM
 */

namespace App\Models\Finance\Settings;

use App\Models\BaseModel;
use App\Vos\FinanceVOS\Settings\FiscalYearVO;
use DB;

class FiscalYearModel extends BaseModel
{
    protected $primaryKey = 'FISCAL_YEAR_ID';
    protected $table = 'fin_fiscal_year';
    protected $fillable = ['START_DATE','END_DATE','IS_CLOSED'];

    public function addFiscalYear(FiscalYearVO $fiscalYearVO)
    {
        $fiscal = $this->whereDate('START_DATE', '>=' , $fiscalYearVO->getStartdate())->orWhereDate('END_DATE' , '<=' , $fiscalYearVO->getEnddate())->get();
        if($fiscal->first()){
            $fiscalYearVO->setErrorResponse(true, '0000051');
        }
        // $fiscalYear = $this->select('IS_CLOSED')->get();
        if($fiscalYearVO->getisClosed() == 'Yes') {
            $start_date = \Carbon\Carbon::parse($fiscalYearVO->getStartdate())->format('Y-m-d');
            $end_date = \Carbon\Carbon::parse($fiscalYearVO->getEnddate())->format('Y-m-d');
            $this->START_DATE = $start_date;
            $this->END_DATE = $end_date;
            $this->IS_CLOSED = $fiscalYearVO->getisClosed();
            $this->CREATED_BY = $fiscalYearVO->getCreatedBy();
            $this->save();
        }
        else{
            $affected = $this->where('IS_CLOSED', '=', 'NO')->update(array('IS_CLOSED' => 'YES'));
            $start_date = \Carbon\Carbon::parse($fiscalYearVO->getStartdate())->format('Y-m-d');
            $end_date = \Carbon\Carbon::parse($fiscalYearVO->getEnddate())->format('Y-m-d');
            $this->START_DATE = $start_date;
            $this->END_DATE = $end_date;
            $this->IS_CLOSED = $fiscalYearVO->getisClosed();
            $this->CREATED_BY = $fiscalYearVO->getCreatedBy();
            $this->save();
        }
    }

    public function updateFiscalYear(FiscalYearVO $fiscalYearVO)
    {
        $start_date = \Carbon\Carbon::parse($fiscalYearVO->getStartdate())->format('Y-m-d');
            $end_date = \Carbon\Carbon::parse($fiscalYearVO->getEnddate())->format('Y-m-d');
            $fiscalYearVO->setStartdate($start_date);
        $fiscalYearVO->setEnddate($end_date);
        $this->where('FISCAL_YEAR_ID',$fiscalYearVO->getFiscalyearId())
            ->update(['START_DATE'=>$fiscalYearVO->getStartdate(),
                'END_DATE'=>$fiscalYearVO->getEnddate(),
                'IS_CLOSED'=>$fiscalYearVO->getisClosed(),
                'UPDATED_BY' => $fiscalYearVO->getModifiedBy(),
                'UPDATED_AT' => $fiscalYearVO->getModifiedAt()]);
    }

    public function getCurrentFiscalYear() {
       $fiscal = DB::table('fin_fiscal_year_current_vw')->select('FISCAL_YEAR')->get();
        return $fiscal;
    }
}