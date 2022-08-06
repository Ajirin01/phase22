<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm(){
        return view('Admin.login');
    }

    public function login(Request $request){
        $user = Auth::attempt(['email'=>$request->email, 'password'=>$request->password], $request->remember);
        if($user){
            return redirect()->route('dashboard');
        }else{
            return redirect()->back();
        }
    }
}
