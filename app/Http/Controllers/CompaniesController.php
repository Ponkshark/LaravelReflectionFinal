<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Companies;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CompaniesController extends Controller
{
    public function RetrieveCompanies () {
        return view('Companies', ['companies' => DB::table('companies')->simplepaginate(10)]);
    }

    public function insertform(){
        return view('companies');
        }

    
    public function insert(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'logo'=>'required|dimensions:min_width=100,min_height=100|image',
            'website'=>'required',
        ]); 
        $name = $request->input('name');
        $email = $request->input('email');
        $logo = $request->file('logo')->store('public');
        $website = $request->input('website');
        $data=array('name'=>$name,"email"=>$email,"logo"=>$logo,"website"=>$website);
        DB::table('companies')->insert($data);
        echo "Record inserted successfully.<br/>";
        echo '<a href = "/companies">Click Here</a> to go back.';
        }
}
