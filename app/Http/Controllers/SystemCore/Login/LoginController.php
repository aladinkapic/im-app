<?php

namespace App\Http\Controllers\SystemCore\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller{
    public function login(){
        if(Auth::check()) return redirect()->route('system-core.app.dashboard');
        return view('app.system.login.login');
    }
    public function loginMeIn(Request $request){
        try{
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                return json_encode(array('code' => '0000', 'message' => route('system-core.app.dashboard')));
            }else{
                return json_encode(array('code' => '4004', 'message' => 'Korisnički podaci nisu ispravni, molimo pokušajte ponovo!'));
            }
        }catch (\Exception $e){}
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
