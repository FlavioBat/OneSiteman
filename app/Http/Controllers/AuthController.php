<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use illuminate\Support\facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;


class AuthController extends Controller

{
    public function Registeruser()
    {
        return view('Registeruser');
    }
    public function RegisterPost(Request $request)
    {
    $user = new User();
    $user->name= $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->save();
        return back()->with('success','Register successfully');

    }
    public function login()
    {
        return view('login'); 
    }

    public function loginPost(Request $request)
    {
        $credetials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        
        if (Auth::attempt($credetials)){
            return redirect ('/home')->with('success','Login');
        }
        return back()->with('error','email or password is wrong');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
