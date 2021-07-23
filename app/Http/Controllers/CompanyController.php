<?php

namespace App\Http\Controllers;

use Mail;
use App\Models\Company;
use Illuminate\Http\Request;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::latest()->paginate(10);

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
        $request->validate([
            'Name' => 'required',
            'Website' => 'required',
            'Email' => 'required|email|unique:companies',
            'Logo' => 'image|max:4096|dimensions:min_width=100,min_height=100',
        ]);

        $validated = $request->all();
  
        if ($image = $request->file('Logo')) {
            $destinationPath = 'storage/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $validated['Logo'] = "$profileImage";
        }

        if(Company::create($validated)){
            Mail::send('emails.newcompany', ['company' => $validated], function ($m) use ($validated) {
                $m->from('ensamuel7@realstudiostest.com', 'Enoch Real Studio');
                $m->to($validated['Email'], $validated['Name'])->subject('New Company Creation');
                $m->priority(2);
            });
        };

        return redirect()->route('company.index')
            ->with('success', 'Company created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'Name' => 'required',
            'Website' => 'required',
            'Email' => 'required|email|unique:companies,id,' . $request->id,
            'Logo' => 'image|max:4096|dimensions:min_width=100,min_height=100',
        ]);

        $validated = $request->all();
  
        if ($image = $request->file('Logo')) {
            $destinationPath = 'storage/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $validated['Logo'] = "$profileImage";
        }

        $company->update($validated);

        return redirect()->route('company.index')
            ->with('success', 'Company updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('company.index')
            ->with('success', 'Company deleted successfully');
    }

}
