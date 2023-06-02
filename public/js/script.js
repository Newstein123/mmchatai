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
            url: 'ai.php',
            method: 'GET', // or 'GET' depending on your requirement
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
                <p> You have spend ${response.token} tokens for this conversation. You have ${4000 - parseInt(response.token)} tokens left. </p>
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

    // get english version 
    $('#lang').on('click', function(){
        const text = $('#data').find('p').html()
        $.ajax({
            method : 'get',
            url : 'translate_english.php',
            data : {text : text},
            success : function(res){
                $('#data').append(`<small class="lh-base"> ${res} </small>`)
            },
            error : function(e) {
                console.log(e)
            }
        })
    })

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
        const chat_name = $('#chat_name').val();
        $.ajax({
            method : 'GET',
            url : 'new_conversation.php',
            data : {chat_name : chat_name},
            success : function(res) {
                console.log(res)
                if(res.success) {
                    $('#data').html("");
                    $('#exampleModal').modal('hide')
                } else {
                    alert('Error')
                }
            },
            error : function(err, xhr) {
                console.log(err, xhr)
            }
        })
    })

    $('ul').on('click', '.editChatName', function() {
        const name = $(this).attr('data-chatName');
        console.log(name);
      });
      
})