<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Use_Case\VisitCostUseCase;
use App\Use_Case\MedicalStaffUseCase;

class VisitCostController extends Controller
{
    public function createVisitCost(Request $request)
    {
        $this->validate($request,[
            'treatment' => 'required',
            'price' => 'required|numeric'
        ]);
        $treatment = $request->input('treatment');
        $price = $request->input('price');
        $medstaff_id = session()->get('doctor_id');
        
        $addCost = new VisitCostUseCase();
        $costData = $addCost->searchCostByMedStaffTreatmentPrice($medstaff_id,$treatment,$price);

        if($costData==null)
        {
            $addCost->addVisitCost($treatment, $price, $medstaff_id);
            return redirect()->back()->with("alert","Visit Cost Berhasil Ditambah !");
        }
        else
        {
            return redirect()->back()->with("alert","Visit Cost Sudah Pernah Ditambahkan !");
        }
        
    }
}
