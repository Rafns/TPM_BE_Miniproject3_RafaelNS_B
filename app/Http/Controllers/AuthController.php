<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Container\Attributes\Auth as AttributesAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function ShowRegisterForm(){
        return view('auth.register');
    }

    public function Register(Request $request){
        try{
            $request->validate(
                rules: [
                'name' => 'required|string|max:225',
                'email'=> 'required|string|max:225|unique:users',
                'password'=> 'required|string|min:8',
                ]
            );
            User::create([
                'name'=> $request->name,
                'email'=> $request->email,
                'password'=>Hash::make($request->password),
                ]);
                return redirect()->route('welcome')->with('success','register succesfull.');
    } catch (\Exception $error){
        dump($error->getMessage());
        // return back()->with('error', $error->getMessage());
    }
}

    public function ShowLoginForm(){
        return view('auth.login');
    }

    public function Login(Request $request){
        try{
            $request->validate([
                'email'=> 'required|email',
                'password'=>'required'
            ]);

            if (Auth::attempt(credentials: $request->only('email','password'))){
                $request->session()->regenerate();
                return redirect()->route('welcome')->with('success','login success');
            }else{
                dump('login failed credentials is not found please try again');
                return redirect()->route('login')->with('succes','login success');
            }
    }catch (\Exception $error){
        dump($error->getMessage());
}
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
