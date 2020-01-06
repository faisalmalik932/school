<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/22/2017
 * Time: 6:25 PM
 */

namespace App\Http\Controllers\Platform;


use App\Http\Controllers\BaseController;
use App\Models\Platform\StateModel;
use App\Vos\Common\SectionVO;
use App\Vos\Common\StateVO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StateController extends BaseController
{
    public function loadStateView(Request $request)
    {
        return view('Platform.states');
    }

    public function addStates(Request $request)
    {
        $stateVO = new StateVO();
        $stateVO->setStateId($request->input('primary'));
        $stateVO->setCountryId($request->input('country'));
        $stateVO->setStateName($request->input('state'));
        $stateVO->setStateCode($request->input('statecode'));
        $stateVO->setDescription($request->input('description'));
        $stateModel = new StateModel();
        if($stateVO->getStateId() <= 0 || $stateVO->getStateId() == '') {
            $stateVO->setCreatedBy($this->getUserName());
            $stateModel->saveStateInfo($stateVO);
            if ($stateVO->getError()) {
                return $this->getMessageWithRedirect($stateVO->getErrorCode());
            } else {
                Session::flash('state', "State Added Successfully");
                return redirect('platform/states');
            }
        }
        else{
                $stateVO->setModifiedBy($this->getUserName());
                $stateVO->setModifiedAt($this->getTimeStamp());
                $stateModel->updateStateInfo($stateVO);
                Session::flash('state', "State Updated Successfully");
                return redirect('platform/states');
        }
    }

}