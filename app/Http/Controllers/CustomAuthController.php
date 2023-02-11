<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function Custom_Login(Request $req){
        Validator::make($req->all(),
            [
                'email' => 'required|email',
                'password' => 'required|min:3'
            ],
            [
                'email.required'  => 'Username field is Required?',
                'email.email'     => 'Please Enter correct email',
                'password.required'  => 'Password field is Required',
                'password.min'       => 'Password minimum require 3 character'
            ])->validate();

            $credential = $req->only('email','password');
            if (Auth::attempt($credential)) {
                $req->session()->put('user', $credential);
                return redirect()->intended('dashboard')->withSuccess('Login');
            }else{
                return redirect('login')->with('error','Credential are not match.');
            }
    }
    public function Register(){
        return view('auth.register');
    }
    public function Custom_Registration(Request $req){
        // $req->validate([
        //     'username' => 'required',
        //     'email' => 'required|unique:users',
        //     'password' => 'required',
        // ]);
        Validator::make($req->all(),
            [
                'username'  => 'required|min:3|max:10',
                'email'     => 'required|email|unique:users',
                'password'  => 'required|min:3'
            ],
            [
                'username.required'  => 'Username field is Required?',
                'username.min'       => 'Username minimum require 3 character',
                'username.max'       => 'Username maximum require 10 character',
                'email.required'     => 'Email field is Required?',
                'email.email'        => 'Please Enter correct email',
                'email.unique'       => 'This Email already has been taken',
                'password.required'  => 'Password field is Required',
                'password.min'       => 'Password minimum require 3 character'
            ])->validate();
        $data = $req->all();
        User::create([
            'name' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'type' => 'Admin'
        ]);
        return redirect('/')->with('success','Registration Complete, you can login now. '. $data['username']);
    }


    public function Dashboard(){
        if (Auth::check()) {
            return view('dashboard');
        }
        return redirect('/')->with('error','Make Sure login first!');
    }

    public function Logout(){
        Session::forget('user');
        Auth::logout();
        return redirect('/');
    }
}
