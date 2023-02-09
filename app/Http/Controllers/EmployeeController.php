<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Employees;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeePostRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function RetrieveEmployees () {
        return view('Employees', ['employees' => DB::table('employees')->simplepaginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function insertform(){
        return view('employees');
    }

    
    public function insert(Request $request){
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'company'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
        ]); 
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $company = $request->input('company');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $data=array('firstname'=>$firstname,"lastname"=>$lastname,"company"=>$company,"email"=>$email,"phone"=>$phone);
        DB::table('employees')->insert($data);
        return redirect('/employeessuccess'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'company'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
        ]); 
        // Getting values from the blade template form
        $employee = new Employee([
            'firstname' => $request->get('firstname'),
            'lastname' => $request->get('lastname'),
            'company' => $request->get('company'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
        ]);
        $employee->save();
        return redirect('/employees')->with('success', 'Employee saved.'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = employees::find($id);
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validation for required fields (and using some regex to validate our numeric value)
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'company'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
        ]); 
        $employee = employees::find($id);
        // Getting values from the blade template form
        $employee->firstname =  $request->get('firstname');
        $employee->lastname =  $request->get('lastname');
        $employee->company =  $request->get('company');
        $employee->email =  $request->get('email');
        $employee->phone =  $request->get('phone');
        $employee->save();
 
        return redirect('/employees')->with('success', 'Employee updated.'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = employees::find($id);
        $employee->delete();
        return redirect('/employees')->with('success', 'Employee removed.'); 
    }
}
