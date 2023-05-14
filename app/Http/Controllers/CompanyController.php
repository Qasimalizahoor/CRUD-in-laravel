<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompanyStoreRequest;
use App\Models\Company;
use DataTables;
// use Yajra\DataTables\Facades\DataTables;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return "hello";
               
        return view('Admin.Company.index');
    }

    public function getCompanies(Request $request)
    {
        $data = Company::get();
        if ($request->ajax()) {
        return Datatables::of($data)
        ->addIndexColumn()
            ->addColumn('action', function ($row) {
                    return '<a href="/company/' . $row->id . '/edit" class="edit btn btn-primary btn-sm me-1">Edit</a><a href="javascript:void(0)" data-id="' . $row->id . '" class="delete-company  btn btn-danger btn-sm">Delete</a>';
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
        // return 'hello';
        return view('Admin.Company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyStoreRequest $request)
    {
        // $company = new company;
        $company = new Company;
        $company->name = $request->name;
        $company->email = $request->email;
        $company->logo = 'not working yet';
        $company->website = $request->website;
        $company->save();
        return view('Admin.Company.index');

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
        $company = Company::findOrFail($id);
        return view('Admin.Company.edit',compact('company'));
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
        $this->validate($request,[
            'name'=> 'required',
            'email'=>'required',
            'website'=>'nullable'
        ]);
        
        $company = Company::find($id);
        // $reqAll = $request->all();
        // $result = array_diff($reqAll, ['_token']);
        // $company->fill($result);
        $company->update([
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
        ]);
        return view('Admin.Company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req,$id)
    {
        $company =  Company::Find($req->company_id);
        $company->delete();
        return view('Admin.Company.index');
    }
}
