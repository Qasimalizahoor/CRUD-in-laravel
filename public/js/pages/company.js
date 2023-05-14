const companyTable = $('#companyTable');
const btnSubmit = $('.btnSubmit');
const companyId = $('#companyId');
// const addCompany = $('#addCompany');
const cancelButtonColor = 'Blue';
const deleteButtonColor = 'Red';
const deletecompanyForm=$('#deleteCompanyForm');

var i = 1;

$(document).on('click', '.delete-company', function () {
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

    companyTable.DataTable({
    lengthMenu: [[10, 25, 50, -1], ["10", "25", "50", "All"]],
    order: [[0, "desc"]],
    language: {
      searchPlaceholder: "Search Company",
    },
    processing: true,
    serverSide: true,
    ajax: {
      url: companyRoute,
      // error: function (xhr, error, thrown) {
      //   console.log('xhr: ', xhr, 'error : ', error, ' thrown :', thrown);
      // }
    },
    columns: [ {

      data: 'DT_RowIndex',
      name: 'DT_RowIndex',
      render: function render(data) {
          return data;

      }
  },{
      data: "name",
      name: "name",
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
        data: "website",
        name: "website",
        render: function render(data) {
          return data;
        }
      },
    //   {
    //     data: "image",
    //     name: "image",
    //     render: function render(data) {
    //       if(!data){
    //         return `<h5>No Image</h5>`;
    //       }else{
    //         return `<img src="${data.name}" height="50" />`;
    //       }
    //     }
    //   },
   
    {
      data: 'id',
      name: 'id',
      orderable: true,
      searchable: true,
      render: function render(data) {
        return '<a href="company/'+data+'/edit" class=" btn btn-primary btn-sm">Edit</a> <a href="javascript:void(0)" data-id="'+data+'" class="delete-company btn btn-danger  btn-sm">Delete</a>';
      }
    }]
  });
});

function destroy(id) {
  Swal.fire({
    title: 'Are you sure?',
    text: 'Do you want to delete this Company!',
    icon: "question",
    showCancelButton: true,
    confirmButtonColor: deleteButtonColor,
    cancelButtonColor: cancelButtonColor,
    confirmButtonText: "Delete",
    reverseButtons: true,
  }).then((result) => {
    if(result.value === true){
      companyId.val(id);
      deleteCompanyForm.submit();
    }

  });
}