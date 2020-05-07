<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Use_Case\MedicalUtilitiesUseCase;
use App\Use_Case\ElectronicsUseCase;
use App\Use_Case\MedicineUseCase;

class AddInventoryController extends Controller
{
    public function index()
    {
        return view('Warehouse/input_inventory_main');
    }

    public function detail()
    {
        $tipe = $_GET['tipe'];
        session()->put('tipe', $tipe);
        return view('Warehouse/input_inventory_detail');
    }

    public function store(Request $request)
    {
        $tipe = $_GET['tipe'];

        if ($tipe == "Medicine") {
            $this->validate($request, [
                'medicine_name' => 'required',
                'medicine_level' => 'required|numeric',
                'medicine_price' => 'required|numeric',
                'medicine_type' => 'required',
                'medicine_qty' => 'required|numeric',
                'medicine_vendor' => 'required',
                'medicine_exp_date' => 'required'
            ]);

            $name = $_GET['medicine_name'];
            $level = $_GET['medicine_level'];
            $price = $_GET['medicine_price'];
            $type = $_GET['medicine_type'];
            $qty = $_GET['medicine_qty'];
            $vendor = $_GET['medicine_vendor'];
            $exp_date = $_GET['medicine_exp_date'];

            if ($qty > 0 and $price > 0 and $level > 0) {
                $medicine = new MedicineUseCase;
                $medicine_add = $medicine->addMedicine($exp_date, $level, $name, $price, $qty, $type, $vendor);
                return redirect('/warehouse_input')->with('alert', 'Medicine Berhasil Ditambahkan');
            } else {
                return redirect()->back()->with('alert', 'Nilai Numeric yang anda masukkan kurang dari 1');
            }
        } else if ($tipe == "Electronics") {
            $this->validate($request, [
                'electronic_name' => 'required',
                'electronic_qty' => 'required|numeric',
                'electronic_type' => 'required'
            ]);

            $name = $_GET['electronic_name'];
            $type = $_GET['electronic_type'];
            $qty = $_GET['electronic_qty'];

            if ($qty > 0) {
                $electronics = new ElectronicsUseCase;
                $electronics_add = $electronics->addElectronic($name, $qty, $type);

                return redirect('/warehouse_input')->with('alert', 'Electronics Berhasil Ditambahkan');
            } else {
                return redirect()->back()->with('alert', 'Nilai Quantity yang anda masukkan kurang dari 1');
            }
        } else {
            $this->validate($request, [
                'util_name' => 'required',
                'util_qty' => 'required|numeric',
                'util_type' => 'required'
            ]);

            $name = $_GET['util_name'];
            $type = $_GET['util_type'];
            $qty = $_GET['util_qty'];

            if ($qty > 0) {
                $med_util = new MedicalUtilitiesUseCase;
                $med_util_add = $med_util->addUtil($name, $qty, $type);
                return redirect('/warehouse_input')->with('alert', 'Medical Utilities Berhasil Ditambahkan');
            } else {
                return redirect()->back()->with('alert', 'Nilai Quantity yang anda masukkan kurang dari 1');
            }
        }
    }
}
