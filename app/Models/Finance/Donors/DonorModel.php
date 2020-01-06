<?php
/**
 * ************************************************************************
 *  *
 *  * PROSIGNS CONFIDENTIAL
 *  * __________________
 *  *
 *  *  Copyright (c) 2017. Prosigns Technologies
 *  *  All Rights Reserved.
 *  *
 *  * NOTICE:  All information contained herein is, and remains
 *  * the property of Prosigns Technologies and its suppliers,
 *  * if any.  The intellectual and technical concepts contained
 *  * herein are proprietary to Prosigns Technologies
 *  * and its suppliers and may be covered by Pakistan and Foreign Patents,
 *  * patents in process, and are protected by trade secret or copyright law.
 *  * Dissemination of this information or reproduction of this material
 *  * is strictly forbidden unless prior written permission is obtained
 *  * from Prosigns Technologies.
 *
 */

/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/9/2017
 * Time: 1:30 PM
 */

namespace App\Models\Finance\Donors;


use App\Models\BaseModel;
use App\Vos\FinanceVOS\DonorsVOS\DonorVO;
use DB;

class DonorModel extends BaseModel
{
    protected $primaryKey = 'DONOR_ID';
    protected $table = 'adc_donors';
    protected $fillable = ['ORG_ID','DONOR_NAME','GENDER','COUNTRY_ID','STATE_ID','CITY_ID','ZIP_CODE','NIC_NO','CELL_PHONE','EMAIL','ADDRESS','DONOR_CATEGORY','DONOR_TYPE','SIBLINGS_NAME','EMG_CONTACT_NAME','EMG_CONTACT_NO'];

    public function saveDonorInfo(DonorVO $donorVO)
    {
        $result = $this->select()->where('NIC_NO', '=', $donorVO->getNic())->get();
        if (count($result) > 0) {
            $donorVO->setErrorResponse(true, '0000013');
        } else {
            $this->ORG_ID = $donorVO->getOrgId();
            $this->DONOR_NAME = $donorVO->getDonorName();
            $this->GENDER = $donorVO->getGender();
            $this->COUNTRY_ID = $donorVO->getCountry();
            $this->STATE_ID = $donorVO->getState();
            $this->CITY_ID = $donorVO->getCity();
            $this->ZIP_CODE = $donorVO->getZipCode();
            $this->CELL_PHONE = $donorVO->getMobileNumber();
            $this->NIC_NO = $donorVO->getNic();
            $this->EMAIL = $donorVO->getEmail();
            $this->ADDRESS = $donorVO->getAddress();
            $this->DONOR_TYPE = $donorVO->getDonorType();
            $this->DONOR_CATEGORY = $donorVO->getDonorCategory();
            $this->EMG_CONTACT_NAME = $donorVO->getEmergencyContactName();
            $this->EMG_CONTACT_NO = $donorVO->getEmergencyContactNumber();
            $this->CREATED_BY = $donorVO->getCreatedBy();
            $this->save();
        }
    }

    public function updateDonorInfo(DonorVO $donorVO)
    {
        $this->where('DONOR_ID',$donorVO->getDonorId())
            ->update(['ORG_ID'=> $donorVO->getOrgId(),
                'DONOR_NAME'=>$donorVO->getDonorName(),
                'GENDER'=>$donorVO->getGender(),'COUNTRY_ID'=>$donorVO->getCountry(),
                'STATE_ID'=>$donorVO->getState(),'CITY_ID'=>$donorVO->getCity(),
                'ZIP_CODE'=>$donorVO->getZipCode(),'CELL_PHONE'=>$donorVO->getMobileNumber(),
                'NIC_NO'=>$donorVO->getNic(),'EMAIL'=>$donorVO->getEmail(),
                'ADDRESS'=>$donorVO->getAddress(),'DONOR_CATEGORY'=>$donorVO->getDonorCategory(),'DONOR_TYPE'=>$donorVO->getDonorType(),
                'EMG_CONTACT_NAME'=>$donorVO->getEmergencyContactName(),'EMG_CONTACT_NO'=>$donorVO->getEmergencyContactNumber(),
                'UPDATED_BY' => $donorVO->getModifiedBy(),
                'UPDATED_AT' => $donorVO->getModifiedAt()]);
    }

    public function loadDonors()
    {
        $donors = $this->select('DONOR_ID','DONOR_NAME')->get();
        return $donors;
    }

    public function donorsList()
    {
        $donors = DB::table('adc_donors_vw')->get();
        return $donors;
    }
    public function totalDonors()
    {
        $donors = DB::table('adc_donors_vw')->count();
        return $donors;
    }
    public function DonorsFunds()
    {
        $donors = DB::table('adc_donors_vw')->sum('FUND_AMOUNT');
        return $donors;
    }

    public function donorFunded()
    {
        $donors =  DB::table('adc_donor_allocation_vw')->groupBy('DONOR_NAME')->select('DONOR_NAME')->get();
        return $donors;
    }

    public function donorFunds()
    {
        $amount =  DB::table('adc_donor_allocation_vw')->sum('AMOUNT');
        return $amount;
    }
}