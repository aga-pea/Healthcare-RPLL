<?php

namespace App\Use_Case;

use App\Dao\VisitCostDao;

class VisitCostUseCase
{
    public static function addVisitCost($treatment, $price, $medstaff_id)
    {
        $addCost = new VisitCostDao();
        $cost = $addCost->createVisitCost($treatment, $price, $medstaff_id);
    }

    public static function getVisitCostList()
    {
        $getCost = new VisitCostDao();
        $cost_all = $getCost->getVisitCostAll();
        return $cost_all;
    }

    public static function searchCostById($cost_id)
    {
        $getCost = new VisitCostDao();
        $costData = $getCost->getVisitCostById($cost_id);
        return $costData;
    }

}
