@extends('layout.app')

@section('content')



<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <h1>
                Companies
            </h1>
        </div>
        
        <div class="col-sm-6 text-right ">

                <a href="{{ route('company.create') }}" class=" btn btn-success float-end companies">Add New Company</a>
                 </div>
       
    </div>
    <div class="row">
        <div class="col-lg-12">
            <hr>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="companyTable" width="100%">
                            <thead>
                                <tr>
                                    <th>Sr. No</th>
                                    <th>Companies Name</th>
                                    <th>Email </th>
                                    <th>Website Link</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
<!-- Delete Permission Form -->
 <form id="deleteCompanyForm" method="POST" action="{{ route('company.destroy',['company'=>0]) }}">
    @csrf
    @method('delete')
    <input type="hidden" name="company_id" id="companyId" value="0">
</form> 
<script src="{{asset('js/pages/company.js')}}"></script>
<script>
    companyRoute = "{{route('get.ajax.company')}}"; 
</script>
{{-- <script type="text/javascript">
window.onload = function() {
    if (window.jQuery) {  
        $(function () {
    
    var table = $('#companyTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('company.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'website', name: 'website'},
            {data: 'action', name: 'action', 
            orderable: false,
            searchable: false},
        ]
    });
    
    });
    } else {
        alert("Doesn't Work");
    }
} 
 
{{-- // }) 
</script>--}}

@endsection


