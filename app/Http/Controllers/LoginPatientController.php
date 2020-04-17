<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Use_Case\PatientUseCase;

class LoginPatientController extends Controller
{
    public function proses(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
        $patient = new PatientUseCase();
        $usercek = $patient->getWithUsername($username);

        if($usercek==$username)
        {
            $name = $patient->getWithName($username);
            $id = $patient->getWithId($username);
            if($patient->getWithPassword($username)==$password)
            {
                $request->session()->put('username',$username);
                $request->session()->put('name',$name);
                $request->session()->put('patient_id',$id);
                return redirect('/patient_main');
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
        $request->session()->forget('patient_id');
        return redirect('/');
    }
}
