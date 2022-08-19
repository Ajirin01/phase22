<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthController extends Controller
{
    public function loginForm(){
        return view('Admin.login');
    }

    public function login(Request $request){
        $user = Auth::attempt(['email'=>$request->email, 'password'=>$request->password], $request->remember);
        if($user){
            if(Auth::user()->role == 'retail rep' || Auth::user()->role == 'admin'){
                Session::put('sale_type', 'retail');
            }else if(Auth::user()->role == 'wholesale rep'){
                Session::put('sale_type', 'wholesale');
            }
            return redirect()->route('dashboard');
        }else{
            return redirect()->back();
        }
    }
}
