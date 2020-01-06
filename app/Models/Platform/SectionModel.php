<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/30/2017
 * Time: 4:20 PM
 */

namespace App\Models\Platform;


use App\Models\BaseModel;
use App\Vos\Common\SectionVO;

class SectionModel extends BaseModel
{
    protected $primaryKey = 'SECTION_ID';
    protected $table = 'adc_sections';
    protected $fillable = ['BRANCH_ID','CLASS','SECTION_NAME'];

    public function saveSectionInfo(SectionVO $sectionVO)
    {
        $result = $this->select()->where([['CLASS', '=', $sectionVO->getClassId()], ['SECTION_NAME', '=', $sectionVO->getSectionName()]])->get();
        if(($result->first()) && $result->first()->IS_DELETED == 1){
            $result->first()->IS_DELETED = 0;
            $result->first()->save();
        }
        elseif (count($result) > 0) {
            $sectionVO->setErrorResponse(true, '0000021');
        } else {
            $this->CLASS = $sectionVO->getClassId();
            $this->SECTION_NAME = $sectionVO->getSectionName();
            $this->CREATED_BY = $sectionVO->getCreatedBy();
            $this->save();
        }
    }

    public function UpdateSectionInfo(SectionVO $sectionVO)
    {
        $this->where('SECTION_ID',$sectionVO->getSectionId())
        ->update([  'CLASS'=>$sectionVO->getClassId(),
                    'SECTION_NAME'=>$sectionVO->getSectionName(),
                    'UPDATED_BY' => $sectionVO->getModifiedBy(),
                    'UPDATED_AT' => $sectionVO->getModifiedAt()]);
    }

    public function loadSections()
    {
        $sections = $this->select('SECTION_NAME')->groupBy('SECTION_NAME')->get();
        return $sections;
    }

}