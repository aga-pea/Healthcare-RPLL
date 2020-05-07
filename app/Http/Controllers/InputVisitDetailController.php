<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Use_Case\VisitCostUseCase;

class InputVisitDetailController extends Controller
{
    public function index(Request $request){
        $id= session()->get('doctor_id');
        $cost = new VisitCostUseCase;
        $cost_data = $cost->searchCostByMedstaff($id);
        return view("Doctor/input_visit_cost",['cost' => $cost_data]);
    }
}
