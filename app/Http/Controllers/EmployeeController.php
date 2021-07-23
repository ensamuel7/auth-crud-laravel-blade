<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::latest()->paginate(10);

        return view('employees.index', compact('employees'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('employees.create', compact('companies'));
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
            'FirstName' => 'required|alpha',
            'LastName' => 'required|alpha',
            'CompanyId' => 'required|exists:companies,id',
            'Email' => 'required|email|unique:employees',
            'Phone' => 'alpha_dash',
            'Picture' => 'image|max:4096|dimensions:min_width=100,min_height=100',
        ]);
        
        $validated = $request->all();
  
        if ($image = $request->file('Picture')) {
            $destinationPath = 'storage/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $validated['Picture'] = "$profileImage";
        }

        Employee::create($validated);

        return redirect()->route('employee.index')
            ->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $companies = Company::all();
        return view('employees.edit', compact('employee','companies'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'FirstName' => 'required|alpha',
            'LastName' => 'required|alpha',
            'CompanyId' => 'required|exists:companies,id',
            'Email' => 'required|email|unique:employees,id,' . $request->id,
            'Phone' => 'alpha_dash',
            'Picture' => 'image|max:4096|dimensions:min_width=100,min_height=100',
        ]);

        $validated = $request->all();
  
        if ($image = $request->file('Picture')) {
            $destinationPath = 'storage/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $validated['Picture'] = "$profileImage";
        }

        $employee->update($validated);

        return redirect()->route('employee.index')
            ->with('success', 'Employee updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employee.index')
            ->with('success', 'Employee deleted successfully');
    }
}

