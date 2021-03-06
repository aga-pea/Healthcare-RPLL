<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medical_Staff;
use App\Use_Case\MedicalStaffUseCase;

class LoginMedStaffController extends Controller
{
    public function proses(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
        $med_staff = new MedicalStaffUseCase();
        $usercek = $med_staff->getWithUsername($username);
        if($usercek==$username)
        {
            $name = $med_staff->getWithName($username);
            $id = $med_staff->getWithId($username);
            if($med_staff->getWithPassword($username)==$password)
            {
                $request->session()->put('username',$username);
                $request->session()->put('name',$name);
                $request->session()->put('doctor_id',$id);
                return redirect('/doctor_main');
            }
             else
             {
                return redirect()->back()->with('alert', 'Password yang anda masukkan salah');
            }
        }
        else
        {
            return redirect()->back()->with('alert', 'Username tidak tersedia');
        }
    }

    public function logout(Request $request) {
        $request->session()->forget('username');
        $request->session()->forget('name');
        $request->session()->forget('doctor_id');
        $request->session()->forget('medicine_list');
        $request->session()->forget('patient_id');
        $request->session()->forget('anamnesia');
        $request->session()->forget('disease');
        $request->session()->forget('hospital');
        $request->session()->forget('cost');
        return redirect('/');
    }
}
