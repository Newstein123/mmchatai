
    <div class="overflow-scroll bg-light p-2" id="chat_history">
        @if (count($chats) > 0)
            <ul class="list-group">
                <li class="list-group-item">
                    <button type="button" class="btn btn-outline-light btn-sm w-100 text-dark" id="new_conversation"> New Conversation </button>  
                </li>
                @foreach ($chats as $row)    
                    <li class="list-group-item"> 
                        <a href="{{route('chatDetail', $row->conversation_id)}}">
                            {{$row->name}}
                        </a>
                        <button class="btn btn-sm editChatName" data-bs-toggle="modal" data-bs-target="#editChatName" data-chatName="{{$row->name}}"
                        data-conversationId="{{$row->conversation_id}}"    
                        >
                            <i class="fa-regular fa-pen-to-square fa-bounce"></i>
                        </button>
                        <i class="fa-solid fa-trash-can" id="delete"></i>
                    </li>
                @endforeach
            </ul>
        @else 
            <ul class="list-group">                  
                <li class="list-group-item">
                    <p> No Conversations Yet </p>
                </li>
            </ul>
        @endif
    </div>
    @if (session('user'))
        <div  class="bg-light px-3 py-2 w-100">
            <p><i class="fa-solid fa-user-tie me-3"></i> {{session('user')->name}} </p>
        </div>
    @endif
    <button type="button" class="btn bg-custom w-100" id="clear">
        <i class="fa-solid fa-trash-can"></i>
    </button>

    <!-- Edit Conversation  -->
<div class="modal fade" id="editChatName" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"> Edit Conversation Name </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="text" id="chat_name" class="form-control">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="update_name"> Save </button>
        </div>
      </div>
    </div>
  </div>
