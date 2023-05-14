@extends('layout.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-3 offset-lg-3 ">
            <h3 >Add New Employee</h3>
         </div>
         <div class="col-lg-3">
            <a href="{{ route('employee.index') }}" class="btn btn-success float-end mb-3">Back</a>

         </div>
    </div>
       <div class="row">
           <div class="col-lg-6 offset-lg-3 ">
            <div class="card">

                <div class="card-body">
                        <form id="employeeId"   method="POST" action="{{ route('employee.store') }}" class="justify-content-center">
                            @csrf
                                <div class="mb-3 ">
                                    <label for="" class="form-label">First Name</label>
                                    <input type="text" name="first_name" placeholder="Enter Employee First Name" class="form-control" value="{{ old('first_name') }}">
                                    @error('first_name')
                                        <span class="text-danger ">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 ">
                                    <label for="" class="form-label">Last Name</label>
                                    <input type="text" name="last_name" placeholder="Enter Employee Last Name" class="form-control " value="{{ old('last_name') }}">
                                    @error('last_name')
                                        <span class="text-danger ">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Email</label>
                                    <input type="text" name="email" placeholder="Enter Your Employee email" class="form-control" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="text-danger ">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Phone</label>
                                    <input type="text" name="phone" placeholder="Enter Your Employee Phone" class="form-control" value="{{ old('phone') }}">
                                    @error('phone')
                                    <span class="text-danger ">{{ $message }}</span>
                                     @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label for="" class="form-label">Company</label>
                                    @if ($companies)
                                        
                                        <select  id="" name="company_id" class="form-select">
                                        <option value='' disabled>Select Company</option>

                                            @foreach ($companies as $company)     
                                        <option value="{{$company->id}}">{{$company->name}}</option>
                                        @endforeach
                                    </select>
                                    @endif
                                    @error('company_id')
                                    <span class="text-danger ">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="mb-3">
                                    
                                </div>
                                <div class="mb-3 text-center">
                                    <button class="btn btn-primary btnSubmit" type="submit" name="Add Employee">Add Employee</button>
                                    
                                </div>

                        </form>
                    </div>
                </div>
           </div>

            </div>
        </div>

@endsection

