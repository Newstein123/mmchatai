<div class="col-sm-12 col-md-3">
    <div class="overflow-scroll bg-light p-2" id="chat_history">
        <?php if(isset($rows)) : ?>
            <?php if(count($rows) > 0) : ?>
                <ul class="list-group">
                    <li class="list-group-item">
                        <button type="button" class="btn btn-outline-light btn-sm w-100 text-dark" data-bs-toggle="modal" data-bs-target="#exampleModal"> New Conversation </button>  
                    </li>
                    <?php foreach($rows as $row) : ?>
                        <li class="list-group-item"> 
                            <a href="chat_history.php?chat_id=<?php echo $row['conversation_id'] ?>">
                             <?php echo $row['name'] ?> 
                            </a>
                            <button class="btn btn-sm editChatName" data-bs-toggle="modal" data-bs-target="#editChatName" data-chatName="<?php echo $row['name'] ?>">
                                <i class="fa-regular fa-pen-to-square fa-bounce"></i>
                            </button>
                            <i class="fa-solid fa-trash-can" id="delete"></i>
                        </li>
                    <?php endforeach ?>
                </ul>
            <?php else : ?>
                <ul class="list-group">                  
                    <li class="list-group-item">
                        <p> No Conversations Yet </p>
                    </li>
                </ul>
            <?php endif ?>
        <?php endif ?>
    </div>
    <?php if(isset($name)) : ?>
        <div  class="bg-light px-3 py-2 w-100">
            <p><i class="fa-solid fa-user-tie me-3"></i> <?php echo $name ?> </p>
    </div>
    <?php endif ?>
    <button type="button" class="btn bg-custom w-100" id="clear">
        <i class="fa-solid fa-trash-can"></i>
    </button>
</div>