<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\EmployeeStoreRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.Employee.index');
    }

    public function getEmployees(Request $request)
    {
        // return "heelo";
        $data = Employee::with('company')->get();
        // return $data;
        if ($request->ajax()) {
        return Datatables::of($data)
        ->addIndexColumn()
            ->addColumn('action', function ($row) {
                    return '<a href="/employee/' . $row->id . '/edit" class="edit btn btn-primary btn-sm me-1">Edit</a><a href="javascript:void(0)" data-id="' . $row->id . '" class="delete-employee  btn btn-danger btn-sm">Delete</a>';
            })

            ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('Admin.Employee.create',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeStoreRequest $request)
    {
        // $company = new company;
        $employee = new Employee;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->company_id = $request->company_id;
        $employee->save();
        return view('Admin.Employee.index');
        // return $request->all();
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
        $employee = Employee::findOrFail($id);
        $company = Company::get();

        return view('Admin.Employee.edit',compact('employee','company'));
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
        // return $request->all();

        $this->validate($request,[
            'first_name'=> 'required',
            'last_name'=> 'required',
            'company_id'=> 'required',
            'email'=>'required',
            'phone'=>['required','regex:/^[0-9]{11,20}$/'],
        ]);
        
        $employee = Employee::find($id);
        $employee->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'company_id' => $request->company_id,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        return view('Admin.Employee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req, $id)
    {
        
         $employee =  Employee::Find($req->employee_id);
        $employee->delete();
        return view('Admin.Employee.index');
    }
}
