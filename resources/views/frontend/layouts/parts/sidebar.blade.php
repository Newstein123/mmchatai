    <div class="overflow-auto p-2 mt-md-3 d-md-block" id="chat_history">
        <ul class="list-group chat_history_list">
            <li class="list-group-item">
                <button type="button" class="btn btn-outline-light btn-sm w-100 text-dark fw-bold fs-6" id="new_conversation"> <i class="fa-solid fa-plus me-2"></i> New Conversation </button>  
            </li>
            @if (count($chats) > 0)
                @foreach ($chats as $row) 
                @php
                    $value = Request::segment(2);
                @endphp
                    <li class="list-group-item sidebar-item {{$value == $row->conversation_id ? 'list-active' : '' }} ">
                        <div class="row">
                            <div class="col-8 col-lg-7 col-xl-9">
                                <a href="{{route('chatDetail', $row->conversation_id)}}" class="text-decoration-none text-dark overflow-hidden myanmar-font"    
                                    >
                                        {{Str::limit($row->name, 50, "...")}}
                                </a>
                            </div>
                            <div class="col-4 col-lg-5 col-xl-3">
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
                        </div>
                    </li>
                @endforeach
            @else              
                <li class="list-group-item text-center">
                    <small> No Conversations Yet </small>
                </li>
        @endif
    </div>
    @if (session('user'))
        <div class="dropup-center dropup">
            <button class="btn bg-custom w-100 dropdown-toggle text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
               <i class="fa-solid fa-user"></i> {{session('user')->name}}
            </button>
            <ul class="dropdown-menu w-100 lh-lg">
                <li class="dropdown-item">                 
                    <form action="{{route('logout')}}" method="POST">
                        @csrf 
                        <button type="submit" class="dropdown-item"> <i class="fa-solid fa-right-from-bracket me-2"></i> Logout </button>
                    </form>
                </li>
                <li class="dropdown-item w-100 clear_all" data-url={{route('clearAll')}}>        
                    <p class="cursor-pointer ms-3"><i class="fa-solid fa-trash-can me-2"></i> Clear Conversation</p>
                </li>
            </ul>
        </div>
    @endif

    <!-- Edit Conversation  -->
<div class="modal fade edit-chat-box" id="editChatName" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <small class="modal-title fw-bold" id="exampleModalLabel"> Edit Conversation Name </small>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="text" id="chat_name" class="form-control">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn bg-custom" id="update_name"> Save </button>
        </div>
      </div>
    </div>
</div>
