$(document).ready(function(){   
        
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


    // clear the form 
    $('#clear').on('click', function(){
        if($(window).width() < 786) {
            $('#clear').hide()
        }
        $('.history-data').empty();
        $('#chat_history_container').hide() 
        $('.question-container').removeClass('col-md-8')
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

    $('ul').on('click', '.editChatName', function() {
        const name = $(this).attr('data-chatName');
        const conversationId = $(this).attr('data-conversationId');
        $('#chat_name').val(name)
        $('#update_name').on('click', function() {
            $.ajax({
                'url' : `{{ route('chatNameUpdate', ${conversationId}) }}`,
                'method' : 'POST',
                'data' : {conversationId : conversationId},
                success  : function(res) {
                    console.log(res)
                },
                error : function(e) {
                    console.log(e)
                }
            })
        })
      });
      
})