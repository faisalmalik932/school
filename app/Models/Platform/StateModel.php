<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/22/2017
 * Time: 6:27 PM
 */

namespace App\Models\Platform;


use App\Models\BaseModel;
use App\Vos\Common\StateVO;
use Illuminate\Http\Request;

class StateModel extends BaseModel
{
    protected $primaryKey = 'STATE_ID';
    protected $table = 'ptf_loc_states';
    protected $fillable = ['COUNTRY_ID','STATE_CODE','STATE_NAME','DESCRIPTION'];

    public function saveStateInfo(StateVO $stateVO)
    {
        $result = $this->select()->where('STATE_NAME', '=', $stateVO->getStateName())->get();
        if (count($result) > 0) {
            $stateVO->setErrorResponse(true, '0000029');
        } else {
            $this->COUNTRY_ID = $stateVO->getCountryId();
            $this->STATE_CODE = $stateVO->getStateCode();
            $this->STATE_NAME = $stateVO->getStateName();
            $this->DESCRIPTION = $stateVO->getDescription();
            $this->CREATED_BY = $stateVO->getCreatedBy();
            $this->save();
        }
    }
    public function updateStateInfo(StateVO $stateVO)
    {
        $this->where('STATE_ID',$stateVO->getStateId())
            ->update(['COUNTRY_ID'=> $stateVO->getCountryId(),
                'STATE_CODE'=>$stateVO->getStateCode(),
                'STATE_NAME'=>$stateVO->getStateName(),
                'DESCRIPTION'=>$stateVO->getDescription(),
                'UPDATED_BY' => $stateVO->getModifiedBy(),
                'UPDATED_AT' => $stateVO->getModifiedAt()]);
    }
}