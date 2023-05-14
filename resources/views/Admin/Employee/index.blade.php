@extends('layout.app')

@section('content')



<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <h1>
                Empolyees
            </h1>
        </div>
        
        <div class="col-sm-6 text-right ">

                <a href="{{ route('employee.create') }}" class=" btn btn-success float-end employee">Add New Employee</a>
                 </div>
       
    </div>
    <div class="row">
        <div class="col-lg-12">
            <hr>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="employeeTable" width="100%">
                            <thead>
                                <tr>
                                    <th>Sr. No</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email </th>
                                    <th>Phone</th>
                                    <th>Company</th>
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
 <form id="deleteEmployeeForm" method="POST" action="{{ route('employee.destroy',['employee'=>0]) }}">
    @csrf
    @method('delete')
    <input type="hidden" name="employee_id" id="employeeId" value="0">
</form> 
<script src="{{asset('js/pages/employee.js')}}"></script>
<script>
    employeeRoute = "{{route('get.ajax.employee')}}"; 
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


