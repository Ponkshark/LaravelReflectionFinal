<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Employees;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeePostRequest;

class EmployeesController extends Controller
{
    public function store(Request $request) {
    employees::insert([$this->rules()]);
}

    public function RetrieveEmployees () {
        return view('Employees', ['employees' => DB::table('employees')->simplepaginate(10)]);
    }

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
        echo "Record inserted successfully.<br/>";
        echo '<a href = "/employees">Click Here</a> to go back.';
    }
}
