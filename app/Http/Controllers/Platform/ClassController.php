<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 9/13/2017
 * Time: 2:56 PM
 */

namespace App\Http\Controllers\Platform;


use App\Http\Controllers\BaseController;
use App\Models\Platform\ClassModel;
use App\Vos\Common\ClassVO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClassController extends BaseController
{
    public function loadView()
    {
        return view('Platform.class');
    }

    public function add(Request $request)
    {
        $classVO = new ClassVO();
        $classModel = new ClassModel();
        $class = $request->input('classname');
        foreach ($class as $key => $classes)
        {
            $classVO->setClassId($request->input('primary'));
            $classVO->setBranchId($request->input('branch'));
            $classVO->setStateId($request->input('state'));
            $classVO->setCityId($request->input('city'));
            $classVO->setClassName($classes);
            $classVO->setCreatedBy($this->getUserName());
            $classModel->saveClassInfo($classVO);
        }
            if ($classVO->getError()) {
                return $this->getMessageWithRedirect($classVO->getErrorCode());
            } else {
                Session::flash('class', "Class Added Successfully");
                return redirect('platform/classes');
            }
        /*else{
            $classVO->setModifiedBy($this->getUserName());
            $classVO->setModifiedAt($this->getTimeStamp());
            $classModel->updateClassInfo($classVO);
            Session::flash('class', "Class Updated Successfully");
            return redirect('platform/classes');
        }*/
    }

}