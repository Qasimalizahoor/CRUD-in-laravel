@extends('layout.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-3 offset-lg-3 ">
            <h3 >Edit Company </h3>
         </div>
         <div class="col-lg-3">
            <a href="{{ route('company.index') }}" class="btn btn-success float-end mb-3">Back</a>

         </div>
    </div>
       <div class="row">
           <div class="col-lg-6 offset-lg-3 ">
            <div class="card">

                <div class="card-body">
                        <form id="companyId"   method="POST" action="{{ route('company.update',$company->id) }}" class="justify-content-center" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                                <div class="mb-3 ">
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" name="name" placeholder="Enter Your Company Name" class="form-control" value="{{$company->name}}">
                                    @error('name')
                                    <span class="text-danger ">{{ $message }}</span>
                                     @enderror
                                </div>
                                <div class="mb-3 ">
                                    <label for="" class="form-label">Email</label>
                                    <input type="text" name="email" placeholder="Enter Your Company Email" class="form-control " value="{{$company->email}}">
                                    @error('email')
                                    <span class="text-danger ">{{ $message }}</span>
                                     @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Website Link</label>
                                    <input type="text" name="website" placeholder="Enter Your Company webiste link" class="form-control" value="{{$company->email}}">
                                    @error('website')
                                    <span class="text-danger ">{{ $message }}</span>
                                     @enderror
                                </div>
                                
                                <div class="mb-3">
                                    {{-- <x-form.input type="file"  name="image" label="Logo"></x-form.input> --}}
                                </div>
                                <div class="mb-3">
                                    
                                </div>
                                <div class="mb-3 text-center">
                                    <button class="btn btn-primary btnSubmit" type="submit" name="Add Company">Edit Company</button>
                                    
                                </div>

                        </form>
                    </div>
                </div>
           </div>

            </div>
        </div>

@endsection

