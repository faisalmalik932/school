<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/29/2017
 * Time: 7:40 PM
 */

namespace App\Models\Platform;


use App\Models\BaseModel;
use App\Vos\Common\ClassVO;
use DB;

class ClassModel extends BaseModel
{

    protected $primaryKey = 'CLASS_ID';
    protected $table = 'adc_classes';
    protected $fillable = ['BRANCH_ID','STATE_ID','CITY_ID','CLASS_NAME'];

    public function saveClassInfo(ClassVO $classVO)
    {
        $result = $this->select()->where([['BRANCH_ID', '=', $classVO->getBranchId()], ['CLASS_NAME', '=', $classVO->getClassName()],['IS_DELETED','=',0]])->get();
        // dd($result);
        if (count($result) > 0) {
            $classVO->setErrorResponse(true, '0000031');
        } else {
            $this->insert(array(
                'BRANCH_ID'=>  $classVO->getBranchId(),
                'STATE_ID'=>$classVO->getStateId(),
                'CITY_ID'=>$classVO->getCityId(),
                'CLASS_NAME'=>$classVO->getClassName(),
                'CREATED_BY'=>$classVO->getCreatedBy()
            ));
        }
    }

    public function updateClassInfo(ClassVO $classVO)
    {
        $this->where('CLASS_ID',$classVO->getClassId())
            ->update(['BRANCH_ID'=>$classVO->getBranchId(),
                'STATE_ID'=>$classVO->getStateId(),
                'CITY_ID'=>$classVO->getCityId(),
                'CLASS_NAME'=> $classVO->getClassName(),
                'UPDATED_BY' => $classVO->getModifiedBy(),
                'UPDATED_AT' => $classVO->getModifiedAt()]);
    }

    public function loadClasses()
    {
        $class = DB::table('ptf_seed_codes')->select('CODE_LABEL', 'CODE_ID')->where('CODE_NAME','=','CLASSES')->get();
        return $class;
    }
}