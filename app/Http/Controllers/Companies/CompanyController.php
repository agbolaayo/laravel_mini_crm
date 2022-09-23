<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$logo = '';
        $request->validate([
            'name' => 'required|min:2|max:191',
            'email' => 'nullable|email|min:5|max:191',
            'website' => 'nullable|min:5|max:191|url',
            'logo' => 'bail|nullable|image|dimensions:min_width=100,min_height=100'
        ]);

        if(isset($request->logo)){
            $storage =  Storage::put('public', $request->logo);
			$logo = basename($storage);
        }

        Company::create([
			'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'logo' => $logo,
		]);

        return redirect()->route('companies.index')->with('success', 'Company is added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);

        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);

        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:2|max:191',
            'email' => 'nullable|email|min:5|max:191',
            'website' => 'nullable|min:5|max:191'
        ]);

        $company = Company::find($id);
        $company->update($request->all());

        return redirect()->route('companies.index')->with('success', 'Company is Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Company deleted successfully');
    }
}
