<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;

class LoginPatientController extends Controller
{
     public function proses(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
        $usercek = Patient::where('patient_uname', $username)->first(); 
        
        if($usercek){
            if($usercek->patient_pwd==$password){
                $request->session()->put('username',$username);
                $request->session()->put('name',$usercek->patient_name);
                return redirect('/patient_main');
            }else{
                return "Password Salah";
            }
        }else{
            return "Username salah";
        }
        
    }

    public function logout(Request $request) {
        $request->session()->forget('username');
        
        return redirect('/login');
    }
}
