<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('form',compact('employees'));
    }

    public function store(Request $request)
    {
       $request->validate([
         'name'=>'required',
         'email'=>'required|email',
         'image'=>'required|image',
         'gender'=>'required',
         'skill'=>'required|array'
       ]);
       if($request->hasFile('image'))
       {
        $image = $request->file('image');
        $filename =  $image->getClientOriginalName();
        $image -> storeAs ('/storage', $filename);
       }
        
       Employee::create([
            'name' => $request->name, 
            'email' => $request->email, 
            'image' => $filename ,
            'gender' => $request->gender ,
           'skill'=>$request->skill

       ]);

       
        
       return redirect()->back()->with('msg','created successfully!');
    }

    public function edit($id)
    {
        $employees = Employee::find($id);
       return view('edit',compact('employees'));
    }
    public function delete($id)
    {
        $employees = Employee::find($id)->delete();
        return redirect()->back()->with('msg','Deleted successfully!');

    }
}
