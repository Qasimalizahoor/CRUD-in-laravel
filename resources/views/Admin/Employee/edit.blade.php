@extends('layout.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-3 offset-lg-3 ">
            <h3 >Edit Employee Record </h3>
         </div>
         <div class="col-lg-3">
            <a href="{{ route('employee.index') }}" class="btn btn-success float-end mb-3">Back</a>

         </div>
    </div>
       <div class="row">
           <div class="col-lg-6 offset-lg-3 ">
            <div class="card">

                <div class="card-body">
                        <form id="employeeId"   method="POST" action="{{ route('employee.update',$employee->id) }}" class="justify-content-center" >
                            @csrf
                            @method('PUT')
                                <div class="mb-3 ">
                                    <label for="" class="form-label">First Name</label>
                                    <input type="text" name="first_name" placeholder="First Name" class="form-control" value="{{$employee->first_name}}">
                                    @error('first_name')
                                        <span class="text-danger ">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 ">
                                    <label for="" class="form-label">Last Name</label>
                                    <input type="text" name="last_name" placeholder="Last Name" class="form-control" value="{{$employee->last_name}}">
                                    @error('last_name')
                                        <span class="text-danger ">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 ">
                                    <label for="" class="form-label">Email</label>
                                    <input type="text" name="email" placeholder="abc@xyz.com" class="form-control " value="{{$employee->email}}">
                                    @error('email')
                                        <span class="text-danger ">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Phone</label>
                                    <input type="text" name="phone" placeholder="03331234567" class="form-control" value="{{$employee->email}}">
                                    @error('phone')
                                    <span class="text-danger ">{{ $message }}</span>
                                     @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Company</label>
                                    <select class="form-select" aria-label="Default select example" name="company_id">
                                        <option value='' disabled>Select Company</option>
                                        @foreach ($company as $item )
                                          <option value="{{ $item->id }}" @if($item->id==$employee->company_id) selected @endif  > {{  ucfirst($item->name)  }}</option>
                                        @endforeach
                                      </select>
                                </div>
                                <div class="mb-3 text-center">
                                    <button class="btn btn-primary btnSubmit" type="submit" name="Edit Emoloyee">Edit Emoloyee</button>
                                    
                                </div>

                        </form>
                    </div>
                </div>
           </div>

            </div>
        </div>

@endsection

