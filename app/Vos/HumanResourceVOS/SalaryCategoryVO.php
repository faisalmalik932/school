<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 12/12/2017
 * Time: 12:28 PM
 */

namespace App\Vos\HumanResourceVOS;


use App\Vos\BaseVO;

class SalaryCategoryVO extends BaseVO
{
    protected $salarycategoryId;
    protected $salaryCategory;
    protected $salaryType;
    protected $description;

    /**
     * @return mixed
     */
    public function getSalarycategoryId()
    {
        return $this->salarycategoryId;
    }

    /**
     * @param mixed $salarycategoryId
     */
    public function setSalarycategoryId($salarycategoryId)
    {
        $this->salarycategoryId = $salarycategoryId;
    }

    /**
     * @return mixed
     */
    public function getSalaryCategory()
    {
        return $this->salaryCategory;
    }

    /**
     * @param mixed $salaryCategory
     */
    public function setSalaryCategory($salaryCategory)
    {
        $this->salaryCategory = $salaryCategory;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
    
     public function getSalaryType()
    {
        return $this->salaryType;
    }

    /**
     * @param mixed $type
     */
    public function setSalaryType($salaryType)
    {
        $this->salaryType = $salaryType;
    }

}