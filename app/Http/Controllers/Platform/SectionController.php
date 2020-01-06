<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/30/2017
 * Time: 4:26 PM
 */

namespace App\Http\Controllers\Platform;


use App\Http\Controllers\BaseController;
use App\Models\Platform\ClassModel;
use App\Models\Platform\SectionModel;
use App\Vos\Common\SectionVO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class SectionController extends BaseController
{
    public function loadView()
    {
        return view('Platform.section');
    }

    public function add(Request $request)
    {
        $sectionVO = new SectionVO();
        $sectionVO->setSectionId($request->input('primary'));
        $sectionVO->setClassId($request->input('className'));
        $sectionVO->setSectionName(strtoupper($request->input('section')));
        $sectionModel = new SectionModel();
        if($sectionVO->getSectionId() <= 0 || $sectionVO->getSectionId() == '') {
            $sectionVO->setCreatedBy($this->getUserName());
            $sectionModel->saveSectionInfo($sectionVO);
            if ($sectionVO->getError()) {
                return $this->getMessageWithRedirect($sectionVO->getErrorCode());
            } else {
                Session::flash('section', "Section Added Successfully");
                return redirect('platform/sections');
            }
        }
        else{
            $sectionVO->setModifiedBy($this->getUserName());
            $sectionVO->setModifiedAt($this->getTimeStamp());
            $sectionModel->updateSectionInfo($sectionVO);
            Session::flash('section', "Section Added Successfully");
            return redirect('platform/sections');
        }
    }

}