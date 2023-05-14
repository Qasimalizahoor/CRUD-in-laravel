const employeeTable = $('#employeeTable');
const btnSubmit = $('.btnSubmit');
const employeeId = $('#employeeId');
// const addCompany = $('#addCompany');
const cancelButtonColor = 'Blue';
const deleteButtonColor = 'Red';
const deleteEmployeeForm=$('#deleteEmployeeForm');

var i = 1;

$(document).on('click', '.delete-employee', function () {
    
       destroy($(this).data('id'));
});


var optionsDateTime = {
  year: "numeric",
  month: "short",
  day: "numeric",
  hour: "2-digit",
  minute: "2-digit"
};
$(document).ready(function () {
    employeeTable.DataTable({
    lengthMenu: [[10, 25, 50, -1], ["10", "25", "50", "All"]],
    order: [[0, "desc"]],
    language: {
      searchPlaceholder: "Search Empolyee",
    },
    processing: true,
    serverSide: true,
    ajax: {
      url: employeeRoute,
    },
    columns: [ {

      data: 'DT_RowIndex',
      name: 'DT_RowIndex',
      render: function render(data) {
          return data;

      }
  },{
      data: "first_name",
      name: "first_name",
      render: function render(data) {
        return data;
      }
    },
    {
        data: "last_name",
        name: "last_name",
        render: function render(data) {
          return data;
        }
      },
      {
        data: "email",
        name: "email",
        render: function render(data) {
          return data;
        }
      },
      {
        data: "phone",
        name: "phone",
        render: function render(data) {
          return data;
        }
      },  
      {
        data: "company.name",
        name: "company.name",
        render: function render(data) {
          return data;
        }
      }, 
       
    {
      data: 'id',
      name: 'id',
      orderable: true,
      searchable: true,
      render: function render(data) {
        return '<a href="/employee/'+data+'/edit" class=" btn btn-primary btn-sm">Edit</a> <a href="javascrzipt:void(0)" data-id="'+data+'" class="delete-employee btn btn-danger  btn-sm">Delete</a>';
      }
    }
]
  });
});

function destroy(id) {
  
  Swal.fire({
    title: 'Are you sure?',
    text: 'Do you want to delete this Employee!',
    icon: "question",
    showCancelButton: true,
    confirmButtonColor: deleteButtonColor,
    cancelButtonColor: cancelButtonColor,
    confirmButtonText: "Delete",
    reverseButtons: true,
  }).then((result) => {
    if(result.value === true){
        employeeId.val(id);
        deleteEmployeeForm.submit();
    }

  });
}