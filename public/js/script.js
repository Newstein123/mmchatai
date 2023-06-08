

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
        $('#data').append(`<h5 class="lh-base p-3 rounded bg-mute text-gray my-2"> <i class="fa-solid fa-user p-2 text-white bg-custom rounded-circle me-2"></i>  ${prompt}</h5>`);
        $('.data-container').scrollTop($('.data-container')[0].scrollHeight);
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
                addResult(response) 
                if(response.chat_count) {
                    window.location.reload();
                }
                $('#prompt').val('')
                $('.data-container').scrollTop($('.data-container')[0].scrollHeight);
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
            $('.alert-warning').show()
            $('#data').html('')
            $('#prompt').val('')
        } else {
            if(response.success) {                
                res = `
                <p class="history-answer lh-lg p-3 my-2 text-mute"> <i class="fa-solid fa-exclamation px-3 py-2 text-white bg-success rounded-circle me-2"></i> ${response.data} </p>
                `
            } else {
                res = `
                <p class="history-answer lh-lg p-3 my-2 text-mute"> <i class="fa-solid fa-exclamation px-3 py-2 text-white bg-success rounded-circle me-2"></i> ${response.message} </p>
                `
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
            $('#chat_history_container').hide()
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

    showAndHideToggle()

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
                        res.message,
                        'success'
                      ).then(result => {
                        if(result.isConfirmed) {
                            window.location.reload();
                        }
                      })
                } else {
                    swal.fire(
                        'Deleted!',
                        res.message,
                        'success'
                      )
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