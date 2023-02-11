<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Language;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();

        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Language::all();
        return view('employees.create', compact('languages'));
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
            'first_name' => 'required',
            'last_name' => 'required',
            'willing_to_work' => 'required',
            'languages' => 'required',
        ]);

        $employee = Employee::create([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'willing_to_work' => $request->get('willing_to_work'),
            'languages_known' => implode(',',$request->get('languages')),
        ]);
        
        return redirect('/employees')->with('success', 'Employee created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $languages = Language::all();
        $employee = Employee::find($id);
        return view('employees.edit', compact(['employee','languages']));

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
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'willing_to_work' => 'required',
            'languages' => 'required',
        ]);

        $employee = Employee::find($id);
        $employee->first_name = $request->get('first_name');
        $employee->last_name = $request->get('last_name');
        $employee->willing_to_work = $request->get('willing_to_work');
        $employee->languages_known = implode(',',$request->get('languages'));
        $employee->save();
        return redirect('/employees')->with('success', 'Employee updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        return redirect('/employees')->with('success', 'Employee deleted!');

    }
}
