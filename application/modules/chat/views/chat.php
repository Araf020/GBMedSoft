<link href="common/extranal/css/chat.css" rel="stylesheet">
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <?php echo lang('chat'); ?>
            </header>
            
            <div class="panel-body panel-body_class">
                 
                    <div class="col-md-4 search_chat">
                        <input type="text" id="searchChat" class="form-control">
                        <div id="chattersBlock">
                        <p class="search_chat_p"><?php echo lang('admin');?></p>
                        <div id="adminChatters">
                            <?php for($i=0; $i < count($admins); $i++) { 
                            if($current_user != $admins[$i]['id']) { ?>
                            <button class="ca-btn ca-chat-btn d-block <?php if($receiver_id == $admins[$i]['id']) { ?>ca-selected-chat<?php } else if($admins[$i]['newChat'] == 'unread') { ?>newChat<?php } ?>" data-id="<?php echo $admins[$i]['id']; ?>"><?php echo $admins[$i]['username']; ?></button>
                        
                            <?php } } ?>
                        </div>
                        <p class="search_chat_p"><?php echo lang('employee');?></p>
                        <div id="employeeChatters">
                            <?php for($i=0; $i < count($employeeChat); $i++) { 
                            if($current_user != $employeeChat[$i]['ion_user_id']) { ?>
                                <button class="ca-btn ca-chat-btn d-block <?php if($receiver_id == $employeeChat[$i]['ion_user_id']) { ?>ca-selected-chat<?php }  else if($employeeChat[$i]['newChat'] == 'unread') { ?>newChat<?php } ?>" data-id="<?php echo $employeeChat[$i]['ion_user_id']; ?>"><?php echo $employeeChat[$i]['name']; ?></button>
                            <?php } } ?>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-8 chat_info">
                        <div>
                            <div class="chatInfo">
                            <?php echo $user; ?>
                            </div>
                            <hr class="chat_hr">
                        <div class="chatBox">
                            <?php echo $chats; ?>
                        </div>
                        <input type="hidden" id="receiverId" value="<?php echo $receiver_id; ?>">
                        <input type="hidden" id="lastMessageId" value="<?php echo $lastMessageId; ?>">
                        <input type="hidden" id="recentMessageId" value="<?php echo $recentMessageId; ?>">
                        </div>
                        <div id="sendDiv">
                            <input type="text" class="form-control chatInput">
                            <button class="caSendBtn"><?php echo lang('send'); ?></button>
                        </div>
                    </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->


<script src="common/js/codearistos.min.js"></script>
<script src="common/extranal/js/chat_module.js"></script>


