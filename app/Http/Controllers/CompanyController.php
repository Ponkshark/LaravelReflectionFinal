<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Companies;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function RetrieveCompanies () {
        return view('Companies', ['companies' => DB::table('companies')->simplepaginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return redirect('/companiessuccess'); 
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
            'name'=>'required',
            'email'=>'required|email',
            'logo'=>'required|dimensions:min_width=100,min_height=100|image',
            'website'=>'required',
        ]); 
        // Getting values from the blade template form
        $company = new Company([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'logo' => $request->file('logo')->store('public'),
            'website' => $request->get('website'),
        ]);
        $company->save();
        return redirect('/companies')->with('success', 'Company saved.'); 
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
        $company = companies::find($id);
        return view('companies.edit', compact('company'));
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
            'name'=>'required',
            'email'=>'required|email',
            'logo'=>'required|dimensions:min_width=100,min_height=100|image',
            'website'=>'required',
        ]); 
        $company = companies::find($id);
        // Getting values from the blade template form
        $company->name =  $request->get('name');
        $company->email =  $request->get('email');
        $company->logo =  $request->file('logo')->store('public');
        $company->website =  $request->get('website');
        $company->save();
 
        return redirect('/companies')->with('success', 'Company updated.'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = companies::find($id);
        $company->delete();
        return redirect('/companies')->with('success', 'Company removed.'); 
    }
}
