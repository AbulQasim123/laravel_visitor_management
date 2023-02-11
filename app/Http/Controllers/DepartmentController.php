<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Department;
use DataTables;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('department');
    }

    public function FetchAll(Request $request){
        if ($request->ajax()) {
            $data = Department::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return '<a href="/department/edit/'.$row->id.'" class="btn btn-primary btn-sm">Edit</a>&nbsp;<button type="button" data-id="'.$row->id.'" class="btn btn-danger btn-sm delete">Delete</button>';
                })
                ->rawColumns(['action'])->make(true);
        }
    }

    public function AddDepartment(){
        return view('add_department');
    }

    public function AddValidation(Request $request){
        Validator::make($request->all(),
            [
                'department_name'  => 'required|min:3|max:25',
                'contact_person'   => 'required|min:3|max:25'
            ],
            [
                'department_name.required' => 'Department name field is Required?',
                'department_name.min'      => 'Department name minimum require 3 character',
                'department_name.max'      => 'Department name maximum require 25 character',
                'contact_person.required'  => 'Contact Person field is Required?',
                'contact_person.min'       => 'Contact Person minimum require 3 character',
                'contact_person.max'       => 'Contact Person maximum require 25 character',
            ])->validate();
        $data = $request->all();
        Department::create([
            'department_name' => $data['department_name'],
            'contact_person' => $data['contact_person'],
        ]);
        return redirect('department')->with('success','New Department Added.');
    }

    public function DepartmentEdit($id){
        $data = Department::findOrFail($id);
        return view('edit_department',compact('data'));
    }
    
    public function Edit_Department_Validation(Request $request){
        Validator::make($request->all(),
            [
                'department_name'  => 'required|min:3|max:25',
                'contact_person'   => 'required|min:3|max:25'
            ],
            [
                'department_name.required' => 'Department name field is Required?',
                'department_name.min'      => 'Department name minimum require 3 character',
                'department_name.max'      => 'Department name maximum require 25 character',
                'contact_person.required'  => 'Contact Person field is Required?',
                'contact_person.min'       => 'Contact Person minimum require 3 character',
                'contact_person.max'       => 'Contact Person maximum require 25 character',
            ])->validate();

            $data = $request->all();
            $form_data = array(
                'department_name' => $data['department_name'],
                'contact_person' => $data['contact_person'],
            );
            Department::whereId($data['hidden_id'])->update($form_data);
            return redirect('department')->with('success','Department Data Updated');
    }

    public function DeleteDepartment($id){
        $data = Department::findOrFail($id);
        $data->delete();
        return redirect('department')->with('success','Department Data Removed');
    }
}

