<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Use_Case\VisitCostUseCase;
use App\Use_Case\MedicalStaffUseCase;

class VisitCostController extends Controller
{
    public function createVisitCost(Request $request)
    {
        $treatment = $request->input('treatment');
        $price = $request->input('price');
        $medstaff_id = session()->get('doctor_id');

        $getMedstaff = new MedicalStaffUseCase;
        $medstaffData = $getMedstaff->getMedStaffWithId($medstaff_id);
        $department_id = $medstaffData->department_id;

        $addCost = new VisitCostUseCase();
        $addCost->addVisitCost($treatment, $price, $medstaff_id);

        return redirect("/doctor_schedule");
    }
}
