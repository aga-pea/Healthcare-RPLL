<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Use_Case\NonMedicalStaffUseCase;

class LoginReceptionistController extends Controller
{
    public function proses(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
        $nonmed_staff = new NonMedicalStaffUseCase();
        $usercek = $nonmed_staff->getWithUsername($username);
        
        if($usercek==$username){
            $name = $nonmed_staff->getWithName($username);
            $id = $nonmed_staff->getWithId($username);
            $job = $nonmed_staff->getWithJob($username);
            if($job=="Receiptionist")
            {
                if($nonmed_staff->getWithPassword($username)==$password)
                {
                    $request->session()->put('username',$username);
                    $request->session()->put('name',$name);
                    $request->session()->put('nonmed_id',$id);
                    return redirect('/receiptionist_main');
                }
                else
                {
                    return redirect()->back()->with('alert', 'Password yang anda masukkan salah');
                }
            }
            else
            {
                return redirect()->back()->with('alert', 'Role tidak sesuai');
            }
                
        }
         else{
            return redirect()->back()->with('alert', 'Username tidak tersedia');
        }
    }

    public function logout(Request $request) {
        $request->session()->forget('username');
        $request->session()->forget('name');
        $request->session()->forget('nonmed_id');
        $request->session()->forget('id_patient');
        $request->session()->forget('tipe');
        return redirect('/');
    }
}
