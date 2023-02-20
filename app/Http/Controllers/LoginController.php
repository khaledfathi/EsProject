<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Flash\AutoExpireFlashBag;

class LoginController extends Controller
{
    public function LoginPage(){
        return view('login'); 
    }
    public function Login(Request $request){
        if (Auth::attempt(['email'=> $request->email , 'password'=>$request->password])){
            return redirect('dashboard/statistics'); 
        }
        return back()->with(['LoginError'=> 'Invalid User Name or Password ']); 
    }
    public function Logout(){
        Auth::logout();
        return redirect('/'); 
    }
}
