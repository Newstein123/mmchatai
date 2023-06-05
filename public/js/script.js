

$(document).ready(function(){   
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#form').submit(function(e){  
        e.preventDefault();
        const prompt = $('#prompt').val();
        $('#generate').hide();
        $('#text-loading').show();
        $('#data').append(`<h5 class="lh-base"> <span class="badge ms-3 bg-custom"> User </span> ${prompt} </h5>`);
        getResponse(prompt)
          
    })

    function getResponse(prompt) {
        $.ajax({
            method: 'GET', // or 'GET' depending on your requirement
            url: "/ai_response",
            data : {prompt : prompt},
            beforeSend :  function(){
                $('#loading').show();
            },
            success: function(response) { 
                console.log(response);   
                addResult(response)  
            },
            error : function(e, xhr) {
                console.log(e);
                console.log(xhr);
            }
        });
    }

    function addResult(response) {
        let res = ""
        if(response.status == 401) {
            res = `<div class="alert alert-primary" role="alert">
            ${response.message}
          </div>`
        } else {
            if(response.success) {
                res = `<p class="history-answer lh-lg"> <span class="badge ms-3 bg-custom"> Answer </span>${response.data} </p>
                `
            } else {
                res = `<p class="history-answer lh-lg"> ${response.message} </p>`
            }
        }
        
        $('#loading').hide();
        $('#text-loading').hide();
        $('#generate').show();
        $('#data').append(res);
    }

    function showAndHideToggle() {
        if ($(window).width() > 768) {           
            $('#chat_history_container').show() 
        } else {
            $('#toggle').show()
            $('#toggle').on('click', function() {
                $(this).hide()
                $('#close').show()
                $('#chat_history_container').addClass('active')
                $('#chat_history_container').show() 
            })

            $('#close').on('click', function() {
                $('#chat_history_container').hide()
                $(this).hide()
                $('#toggle').show()
            })
        }
    }


    // clear all conversation 
    $('#clear_all').on('click', function(){
        swal.fire({
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
            url : '/chat/clear',
            method  : 'POST',
            success : function(res) {
                if(res.success) {
                    swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                      ).then(result => {
                        if(result.isConfirmed) {
                            window.location.reload();
                        }
                      })
                }
            },
            error : function(e, xhr) {
                console.log(e, xhr)
            }
        })
            }
          })
    })

    // new conversation 

    $('#new_conversation').on('click', function() {
        $.ajax({
            method : 'GET',
            url : "/",
            success : function(res) {
                if (res.success) {
                    window.location.href = '/';
                }                
            },
            error : function(err, xhr) {
                console.log(err, xhr)
            }
        })
    })

    // Update Chat Name 

    $('ul').on('click', '.editChatName', function() {
        const name = $(this).attr('data-chatName');
        const conversationId = $(this).attr('data-conversationId');
        console.log(conversationId)
        $('#chat_name').val(name)

        $('#update_name').on('click', function() {
            const chat_name = $('#chat_name').val();
            $.ajax({
                'url' : `/chat/update/${conversationId}`,
                'method' : 'POST',
                'data' : {name : chat_name},
                success  : function(res) {
                    if(res.success) {
                        $('#editChatName').modal('hide');
                        window.location.reload();
                    }
                },
                error : function(e) {
                    console.log(e)
                }
            })
        })
      });

    //   Delete Conversation 

    $('.delete_chat').on('click', function() {
        const conversationId = $(this).attr('data-conversationId');
        $.ajax({
            url : `/chat/delete/${conversationId}`,
            method : 'POST',
            success : function(res) {
                if(res.success) {
                    window.location.reload();
                }
            },
            error : function(e, xhr) {
                console.log(e, xhr)
            }
        })
    })
      
})