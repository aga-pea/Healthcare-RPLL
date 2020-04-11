<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Receptionist;

class LoginReceptionistController extends Controller
{
    public function proses(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
        $usercek = Receptionist::where('receptionist_uname', $username)->first(); 
        
        if($usercek){
            if($usercek->med_staff_pwd==$password){
                $request->session()->put('username',$username);
                $request->session()->put('name',$usercek->med_staff_name);
                return redirect('/receptionist_main');
            }else{
                return "Password Salah";
            }
        }else{
            return "Username salah";
        }
    }

    public function logout(Request $request) {
        $request->session()->forget('username');
        $request->session()->forget('name');
        return redirect('/login');
    }
}
