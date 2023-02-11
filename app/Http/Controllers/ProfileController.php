<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $data = User::findOrFail(Auth::user()->id);
        return view('profile',compact('data'));
    }

    public function Edit_Profile_Validation(Request $request){
        Validator::make($request->all(),
            [
                'username'  => 'required|min:3|max:10',
                'email'     => 'required|email',
            ],
            [
                'username.required'  => 'Username field is Required?',
                'username.min'       => 'Username minimum require 3 character',
                'username.max'       => 'Username maximum require 10 character',
                'email.required'     => 'Email field is Required?',
                'email.email'        => 'Please Enter correct email',
                'email.unique'       => 'This Email already has been taten',
            ])->validate();

            $data = $request->all();
            if (!empty($data['password'])) {
                $form_data = array(
                    'name' => $data['username'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password'])
                );
            }else{
                $form_data = array(
                    'name' => $data['username'],
                    'email' => $data['email'],
                ); 
            }
            User::whereId(Auth::user()->id)->update($form_data);
            return redirect('profile')->with('success', 'Profile Data Updated');
    }
}
