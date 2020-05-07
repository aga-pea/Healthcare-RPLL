<?php

namespace App\Use_Case;

use App\Dao\VisitDao;

class VisitUseCase
{
    public static function searchVisitById($id)
    {
        $visit = new VisitDao();
        $visitData = $visit->getVisitById($id);
        return $visitData;
    }
}