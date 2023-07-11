<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginView(){
        return view('auth.login');
    }

    public function profileView(){
        return view('admin.profile'); 
    }

    public function updatePassword(Request $request){
        if (Hash::check($request->currentpassword, Auth::user()->password)) {
            $validate['password'] = Hash::make($request->password);
            User::where('id',Auth::user()->id)->update($validate);
            return redirect()->back()->with('success', 'Berhasil Mengganti password');
        }else{
            return redirect()->back()->with('error', "Password tidak cocok ");
        }

    }
}
