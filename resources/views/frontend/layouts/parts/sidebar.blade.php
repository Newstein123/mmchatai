
    <div class="overflow-scroll bg-light p-2" id="chat_history">
        <ul class="list-group chat_history_list">
            <li class="list-group-item">
                <button type="button" class="btn btn-outline-light btn-sm w-100 text-dark" id="new_conversation"> New Conversation </button>  
            </li>
            @if (count($chats) > 0)
                @foreach ($chats as $row) 
                @php
                    $value = Request::segment(2);
                @endphp
                    <li class="list-group-item {{$value == $row->conversation_id ? 'list-active' : '' }} ">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{route('chatDetail', $row->conversation_id)}}" class="text-decoration-none text-dark">
                                {{$row->name}}
                            </a>
                            <div class="action-button">
                                <button class="btn btn-sm editChatName" data-bs-toggle="modal" data-bs-target="#editChatName" data-chatName="{{$row->name}}"
                                data-conversationId="{{$row->conversation_id}}"    
                                >
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>
                                <button class="btn btn-sm delete_chat" data-conversationId="{{$row->conversation_id}}" >
                                    <i class="fa-solid fa-trash-can" ></i>
                                </button>
                            </div>
                        </div>
                    </li>
                @endforeach
            @else              
                <li class="list-group-item">
                    <p> No Conversations Yet </p>
                </li>
        @endif
    </div>
    @if (session('user'))
        <div  class="bg-light px-3 py-2 w-100">
            <p><i class="fa-solid fa-user-tie me-3"></i> {{session('user')->name}} </p>
        </div>
    @endif
    <button type="button" class="btn bg-danger text-white w-100" id="clear_all">
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
