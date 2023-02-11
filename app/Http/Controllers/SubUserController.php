<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DataTables;

class SubUserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('sub_user');
    }

    public function FetchAll(Request $request){
        if ($request->ajax()) {
            $data = User::where('type', '=', 'User')->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addcolumn('action', function($row){
                        return '<a href="/sub_user/edit/'.$row->id.'" class="btn btn-info btn-sm">Edit</a>&nbsp; <button type="button" class="btn btn-danger btn-sm delete" data-id="'.$row->id.'">Delete</button>';
                    })->rawColumns(['action'])->make(true);
        }
    }

    public function AddSubUser(){
        return view('add_sub_user');
    }

    public function AddValidation(Request $req){
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
                'email.unique'       => 'This Email already has been taten',
                'password.required'  => 'Password field is Required',
                'password.min'       => 'Password minimum require 3 character'
            ])->validate();
        $data = $req->all();
        User::create([
            'name' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'type' => 'User'
        ]);
        return redirect('sub_user')->with('success','New User Added. '. $data['username']);
    }

    public function SubUserEdit($id){
        $data = User::findOrFail($id);
        return view('edit_sub_user',compact('data'));
    }

    public function Edit_SubUser_Validation(Request $request){
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
        User::whereId($data['hidden_id'])->update($form_data);
        return redirect('sub_user')->with('success', 'User Data Updated');
    }

    public function DeleteSubUser($id){
        $data = User::findOrFail($id);
        $data->delete();
        return redirect('sub_user')->with('success', 'User Data Removed');
    }
}
