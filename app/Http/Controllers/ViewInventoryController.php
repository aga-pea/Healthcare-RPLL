<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Use_Case\MedicalUtilitiesUseCase;
use App\Use_Case\ElectronicsUseCase;
use App\Use_Case\MedicineUseCase;

class ViewInventoryController extends Controller
{
    public function index(){
        return view('Warehouse/view_inventory_main');
    }

    public function list(Request $request){
        if($request->submit == "submit")
        {
            $tipe = $_GET['tipe'];
            session()->put('tipe',$tipe);
        }
        else
        {
            $tipe = session()->get('tipe');
        }

        if($tipe=='Medicine')
        {
            $medicine = new MedicineUseCase;
            $list=$medicine->getListMedicine();
        }
        else if($tipe=='Electronics')
        {
            $electronics = new ElectronicsUseCase;
            $list=$electronics->getListElectronics();
        }
        else
        {
            $med_util = new MedicalUtilitiesUseCase;
            $list=$med_util->getListUtil();
        }
        return view('Warehouse/view_inventory_list',['list'=>$list]);
    }

    public function detail(Request $request){
        $id = $_GET['id'];
        $tipe = $_GET['tipe'];
        if($request->submit=="edit")
        {
            if($tipe=='Medicine')
            {
                $medicine = new MedicineUseCase;
                $detail=$medicine->getMedicineById($id);
            }
            else if($tipe=='Electronics')
            {
                $electronics = new ElectronicsUseCase;
                $detail=$electronics->getElectronicsById($id);
            }
            else
            {
                $med_util = new MedicalUtilitiesUseCase;
                $detail=$med_util->getUtilById($id);
            }
            return view('Warehouse/view_inventory_detail',['detail'=>$detail]);
        }
        else if($request->submit=="delete")
        {
            if($tipe=='Medicine')
            {
                $medicine = new MedicineUseCase;
                $delete=$medicine->getDeleteMedicine($id);
            }
            else if($tipe=='Electronics')
            {
                $electronics = new ElectronicsUseCase;
                $delete=$electronics->getDeleteElectronics($id);
            }
            else
            {
                $med_util = new MedicalUtilitiesUseCase;
                $delete=$med_util->getDeleteUtil($id);
            }
            
            return redirect()->back()->with('alert', 'Inventory sudah di delete');
        }
    }

    public function update(Request $request){
        $id=$_GET['id'];
        $tipe=$_GET['tipe'];
        if($tipe=='Medicine')
        {
            $name= $_GET['medicine_name'];
            $level= $_GET['medicine_level'];
            $price= $_GET['medicine_price'];
            $type= $_GET['medicine_type'];
            $qty= $_GET['medicine_qty'];
            $vendor= $_GET['medicine_vendor'];
            $exp_date= $_GET['medicine_exp_date'];
            $medicine = new MedicineUseCase;
            $list=$medicine->getMedicineById($id);

            if($name==$list->medicine_name and $level==$list->medicine_level and $price==$list->medicine_price and $type==$list->medicine_type and $qty==$list->medicine_qty and $vendor==$list->medicine_vendor and $exp_date==$list->medicine_exp_date)
            {
                return redirect()->back()->with('alert', 'Tidak ada data yang di update');
            }
            else
            {
                $update=$medicine->updateMedicineData($id,$exp_date,$level,$name, $price,$qty, $type,$vendor);
                return redirect('/warehouse_view_list')->with('alert', 'Data berhasil di update');
            }
        }
        else if($tipe=='Electronics')
        {
            $name= $_GET['electronic_name'];
            $type= $_GET['electronic_type'];
            $qty= $_GET['electronic_qty'];
            $electronics = new ElectronicsUseCase;
            $list=$electronics->getElectronicsById($id);

            if($name==$list->electronic_name and $type==$list->electronic_type and $qty==$list->electronic_qty)
            {
                return redirect()->back()->with('alert', 'Tidak ada data yang di update');
            }
            else
            {
                $update=$electronics->updateElectronicData($id,$name,$qty,$type);
                return redirect('/warehouse_view_list')->with('alert', 'Data berhasil di update');
            }
        }
        else
        {
            $name= $_GET['util_name'];
            $type= $_GET['util_type'];
            $qty= $_GET['util_qty'];
            $med_util = new MedicalUtilitiesUseCase;
            $list=$med_util->getUtilById($id);
            if($name==$list->util_name and $type==$list->util_type and $qty==$list->util_qty)
            {
                return redirect()->back()->with('alert', 'Tidak ada data yang di update');
            }
            else
            {
                $update=$med_util->updateUtilData($id,$name,$qty,$type);
                return redirect('/warehouse_view_list')->with('alert', 'Data berhasil di update');
            }
        }
    }
}
