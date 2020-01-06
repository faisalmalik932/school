<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 8/29/2017
 * Time: 5:07 PM
 */

namespace App\Vos\FinanceVOS;


use App\Http\Controllers\BaseController;
use App\Vos\BaseVO;

class FinanceCategoryVO extends BaseVO
{
    protected $financeCategoryId;
    protected $financeCategory;
    protected $description;

    /**
     * @return mixed
     */
    public function getFinanceCategoryId()
    {
        return $this->financeCategoryId;
    }

    /**
     * @param mixed $financeCategoryId
     */
    public function setFinanceCategoryId($financeCategoryId)
    {
        $this->financeCategoryId = $financeCategoryId;
    }

    /**
     * @return mixed
     */
    public function getFinanceCategory()
    {
        return $this->financeCategory;
    }

    /**
     * @param mixed $financeCategory
     */
    public function setFinanceCategory($financeCategory)
    {
        $this->financeCategory = $financeCategory;
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



}