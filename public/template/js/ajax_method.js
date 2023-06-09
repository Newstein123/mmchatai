$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-white btn-sm';    
    $('.dataTables-example').DataTable({
        pageLength: 25,
        responsive: true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
            { extend: 'copy'},
            {extend: 'csv'},
            {extend: 'excel', title: 'ExampleFile'},
            {extend: 'pdf', title: 'ExampleFile'},

            {extend: 'print',
                customize: function (win){
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
            }
            }
        ]

    });

        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "5000",
        }

     // view datial
     $(document).on('click','#AjaxModalCall',function(e){
        e.preventDefault();
        var url = $(this).attr('data-url');
        console.log(url);
        $('.modal-body').html('');     
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'html'
        })
        .done(function(data){
            console.log(data)
            $('.modal-body').html(data); // load response 
            $('#AjaxModal').modal('show');  
        })
        .fail(function(e, xhr){
            console.log(e, xhr)
            $('#dynamic-content').html('<i class="fa fa-sign"></i> Something went wrong, Please try again...');
            $('#modal-loader').hide();
        });
    });
    
})



function changeState(url, id) {
    console.log(url)
    $.ajax({
        url : url,
        method : 'POST',
        data : {id : id},
        success : function(res) {
            console.log(res)
            if(res.success) {
                toastr.success(res.message);
                setInterval(function() {
                   location.reload()
                }, 1000); 
            } else {
                toastr.danger(res.message)
            }
        },
        error : function(e) {
            toastr.danger(res.message)
        }
    })
}

function deleteForm(url, id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {    
            $.ajax({
                url : url,
                method : 'POST',
                data : {id : id},
                success : function(res) {
                    console.log(res)
                    if(res.success) {
                        Swal.fire({
                            title: 'Deleted',
                            text: res.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if(result.isConfirmed) {
                               location.reload()
                            }
                        })
                    } else {
                        Swal.fire({
                            title: 'Something Wrong',
                            text: res.message,
                            icon: 'danger',
                            confirmButtonText: 'OK'
                        })
                    }
                },
                error : function(e) {
                    console.log(e)
                }
            })
        }
      })
}

function grantPermission(id, name, permissionId) {
    var checkbox = $('#' + permissionId);
    var isChecked = checkbox.is(':checked') ? true : false;
    $.ajax({
        url: "/admin/setting/permission/give",
        type: 'POST',
        data: {
            id : id,
            name : name,
            status : isChecked,
        },
        success: function(res) {
          if(res.success) {
            toastr.success(res.message)
          } else {
            toastr.warning(res.message)
          }
        },
        error: function(xhr, status, error) {
          console.log(error)
        }
    });
}

// Ad Status on/off

$(document).ready(function(e) {
    $('.adsView').on('change', function(e) {
        e.preventDefault();
        var url = $(this).attr('route');
        $.ajax({
            url: url,
            type: 'GET',
            data: {
                'id': $(this).val(),
                'token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(res) {
                console.log(res)
                if (res) {
                    toastr.success("success!");
                    location.reload();
                } else {
                    toastr.error("error!");
                }
            },
            error : function(e, xhr) {
                console.log(e, xhr)
            }
        });
    });
});