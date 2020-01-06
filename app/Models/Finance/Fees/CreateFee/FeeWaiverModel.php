<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/20/2017
 * Time: 5:54 PM
 */

namespace App\Models\Finance\Fees\CreateFee;


use App\Models\BaseModel;
use App\Vos\FinanceVOS\FeeVOS\CreateFeeVOS\FeeWaiverVO;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class FeeWaiverModel extends BaseModel
{
    protected $primaryKey = 'FEE_WAIVER_ID';
    protected $table = 'fin_fee_waivers';
    protected $fillable = ['FEE_CATEGORY_ID','FEE_PARTICULAR_ID','WAIVER_CATEGORY','STUDENT_CATEGORY','AMOUNT'];

    public function addFeeWaivers(Collection $collection)
    {
        $collection->each(function($vo) {
            $result = $this->select()->where([['FEE_CATEGORY_ID', '=', $vo->getFeeCategoryId()],
                ['FEE_PARTICULAR_ID', $vo->getFeeParticularId()], ['WAIVER_CATEGORY', $vo->getFeeWaiverId()]])->get();
            if (count($result) > 0) {
                $vo->setErrorResponse(true, '0000033');
            } else {
                $this->insert(array(
                    'FEE_CATEGORY_ID'=>$vo->getFeeCategoryId(),
                    'FEE_PARTICULAR_ID'=>$vo->getFeeParticularId(),
                    'WAIVER_CATEGORY'=>$vo->getWaiverCategory(),
                    'STUDENT_CATEGORY'=>$vo->getStudentCategory(),
                    'AMOUNT'=>$vo->getAmount(),
                    'CREATED_BY'=>$vo->getCreatedBy()
                ));
            }
        });
    }

    public function UpdateWaiver(FeeWaiverVO $feeWaiverVO)
    {
        $this->where('FEE_WAIVER_ID',$feeWaiverVO->getFeeWaiverId())
            ->update(['FEE_CATEGORY_ID'=>$feeWaiverVO->getFeeCategoryId(),
                'FEE_PARTICULAR_ID'=>$feeWaiverVO->getFeeParticularId(),
                'WAIVER_CATEGORY'=>$feeWaiverVO->getWaiverCategory(),
                'STUDENT_CATEGORY'=>$feeWaiverVO->getStudentCategory(),
                'AMOUNT'=>$feeWaiverVO->getAmount(),
                'UPDATED_BY' => $feeWaiverVO->getModifiedBy(),
                'UPDATED_AT' => $feeWaiverVO->getModifiedAt()]);

    }

}