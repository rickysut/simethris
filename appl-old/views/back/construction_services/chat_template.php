<?php $this->load->view('back/template/meta'); ?>
  <?php $this->load->view('back/template/sidebar'); ?>
  <div class="content-wrapper">
  <?php $this->load->view('back/template/navbar'); ?>
  <div class="content custom-scrollbar">

                    <div id="chat" class="page-layout carded full-width">

                        <div class="top-bg bg-primary"></div>

                        <!-- CONTENT -->
                        <div class="page-content-wrapper w-100 mx-auto px-0 pt-0 pt-sm-4 px-sm-4 pt-sm-8">

                            <div class="page-content-card">

                                <aside class="left-sidebar" data-fuse-bar="chat-left-sidebar" data-fuse-bar-media-step="lg">

                                    <div id="chat-left-sidebar-views" class="views">

                                        <div id="chats-view" class="view d-flex flex-column no-gutters">
                                            <!-- CHATS TOOLBAR -->
                                            <div class="toolbar">

                                                <!-- TOOLBAR TOP -->
                                                <div class="toolbar-top row no-gutters align-items-center justify-content-between px-4">

                                                    <!-- USER AVATAR WRAPPER -->
                                                    <div class="avatar-wrapper">

                                                        <!-- USER AVATAR -->
                                                        <img id="user-avatar-button" src="<?php echo base_url('uploads/user/'.$this->session->photo) ?>" class="avatar" alt="<?php echo $this->session->name ?>" />
                                                        <!-- / USER AVATAR -->

                                                        <!-- USER STATUS -->
                                                        <i class="icon- status online s-4"></i>
                                                        <!-- / USER STATUS -->

                                                    </div>
                                                    <!-- / USER AVATAR -->
													
                                                </div>
                                                <!-- / TOOLBAR TOP -->

                                                <!-- TOOLBAR BOTTOM -->
                                                <div class="toolbar-bottom row align-items-center no-gutters px-4">

													<span class="badge badge-pill badge-success"><?=count($vendorslist);?> <?=$strsubTitle;?></span>
                                                    <!-- / SEARCH -->
                                                </div>
                                                <!-- / TOOLBAR BOTTOM -->

                                            </div>
                                            <!-- / CHATS TOOLBAR -->

                                            <!-- CHATS CONTENT -->
                                            <div class="content col custom-scrollbar">

                                                <!-- CHATS LIST-->
                                                <div class="chat-list">
													<?php if(!empty($vendorslist)){
														foreach($vendorslist as $v):
														$idpenerima = $this->session->id_users;
														$idpengirim =$v['pengirim'];
														?>
														<?php
															$obj1=&get_instance();
															$obj1->load->model('UserModel');
															$detail=$obj1->UserModel->caripesan($idpenerima,$idpengirim);
															if(is_null($detail)){
																$pesanakhir='';
																$tglpesan='';
																$gaya='class="contact ripple flex-wrap flex-sm-nowrap row p-4 no-gutters align-items-center selectVendor"';
																$uread ='class="">';
																$tpesan = 'class="">';
															}
															else
															{
																$pesanakhir=$detail['pesanakhir'];
																$tglpesan=$detail['tglpesan'];
																$jmlpesan=$detail['jmlpesan'];
																$gaya ='class="contact ripple flex-wrap flex-sm-nowrap row p-4 no-gutters align-items-center unread selectVendor"';
																$uread ='class="bg-secondary text-auto unread-message-count mt-2">'.$jmlpesan;
																$tpesan= 'class="last-message-time">'.$tglpesan;
															}
														?>
														<div <?php echo $gaya ?> id="<?=$v['id_users'];?>" title="<?=$v['name'];?>" src="<?=$v['photo'];?>">

															<div class="col-auto avatar-wrapper">
																<img src="<?=$v['photo'];?>" class="avatar" alt="<?=$v['name'];?>" />
																<i class="icon- status do-not-disturb s-4"></i>
															</div>

															<div class="col px-4">
																<span class="name h6"><?=$v['name'];?></span>
																<p class="last-message text-truncate text-muted"><?=$pesanakhir;?></p>
															</div>

															<div class="col-12 col-sm-auto d-flex flex-column align-items-end">
																<div <?php echo $tpesan ?></div>

																<div <?php echo $uread ?></div>

															</div>
														</div>
														<div class="divider"></div>
														<?php endforeach;?>
														
													   <?php }else{?>
														<div class="contact ripple flex-wrap flex-sm-nowrap row p-4 no-gutters align-items-center">

															<div class="col-auto avatar-wrapper">
																<img src="" class="avatar" alt="" />
																<i class="icon- status do-not-disturb s-4"></i>
															</div>

															<div class="col px-4">
																<span class="name h6">Tidak Ada yang Online</span>
																<p class="last-message text-truncate text-muted"></p>
															</div>

															<div class="col-12 col-sm-auto d-flex flex-column align-items-end">
																<div class="last-message-time"></div>

																<div class="bg-secondary text-auto unread-message-count mt-2"></div>

															</div>
														</div>
														<div class="divider"></div>
													<?php } ?>

                                                </div>
                                                <!-- / CHATS LIST-->
                                            </div>
                                            <!-- / CHATS CONTENT -->

                                            <!-- CONTACTS BUTTON 
                                            <button id="contacts-button" type="button" class="btn btn-fab btn-secondary a-align-bottom-right m-2" aria-label="contacts button">
                                                <i class="icon icon-plus"></i>
                                            </button>
                                            CONTACTS BUTTON -->
                                        </div>

                                        <div id="contacts-view" class="view d-none flex-column no-gutters">
                                            <!-- CONTACTS TOOLBAR -->
                                            <div class="toolbar bg-secondary text-auto">

                                                <!-- TOOLBAR TOP -->
                                                <div class="toolbar-top row no-gutters align-items-center px-4">

                                                    <button type="button" class="back-to-chats-button btn btn-icon" aria-label="back button">
                                                        <i class="icon icon-arrow-left"></i>
                                                    </button>

                                                    <span class="h6">CONTACTS</span>
                                                </div>
                                                <!-- / TOOLBAR TOP -->

                                                <!-- TOOLBAR BOTTOM -->
                                                <div class="toolbar-bottom row align-items-center no-gutters px-4">

                                                    <div class="search-wrapper md-elevation-1 row no-gutters align-items-center w-100 p-2">
                                                        <i class="icon-magnify s-4"></i>
                                                        <input class="col pl-2" type="text" placeholder="Search contact">
                                                    </div>
                                                </div>
                                                <!-- / TOOLBAR BOTTOM -->
                                            </div>
                                            <!-- / CONTACTS TOOLBAR -->

                                            <!-- CONTACTS CONTENT -->
                                            <div class="content col custom-scrollbar">

                                                <!-- CONTACTS LIST-->
                                                <div class="contact-list">
												
                                                </div>
                                                <!-- / CONTACTS LIST-->
                                            </div>
                                            <!-- / CONTACTS CONTENT -->
                                        </div>

                                        <div id="user-view" class="view d-none flex-column no-gutters">
                                            <!-- CONTACTS TOOLBAR -->
                                            <div class="toolbar bg-secondary text-auto d-flex flex-column no-gutters">

                                                <!-- TOOLBAR TOP -->
                                                <div class="toolbar-top row no-gutters align-items-center px-4">

                                                    <button type="button" class="back-to-chats-button btn btn-icon" aria-label="back button">
                                                        <i class="icon icon-arrow-left"></i>
                                                    </button>
                                                </div>
                                                <!-- / TOOLBAR TOP -->

                                                <!-- TOOLBAR BOTTOM -->
                                                <div class="toolbar-bottom col d-flex flex-column align-items-center justify-content-center">

                                                    <img src="<?php echo base_url('uploads/user/'.$this->session->photo) ?>" class="avatar huge" alt="<?php echo $this->session->name ?>" />

                                                    <div class="user-name h4 my-2"><?php echo $this->session->name ?></div>

                                                </div>
                                                <!-- / TOOLBAR BOTTOM -->
                                            </div>
                                            <!-- / CONTACTS TOOLBAR -->

                                            <!-- CONTACTS CONTENT -->
                                            <div class="content col bg-light p-4">

                                                <div class="card p-4">
                                                    <form>
                                                        <div class="form-group mt-4">
                                                            <textarea class="form-control" id="exampleTextarea" rows="3">it's a status....not your diary...</textarea>
                                                            <label for="exampleTextarea">Mood</label>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                            <!-- / CONTACTS CONTENT -->
                                        </div>

                                    </div>
                                </aside>

                                <div class="page-content">

                                    <div id="chat-content-views" class="views">

                                        <!-- START -->
                                        <div id="start-view" class="view d-flex flex-column align-items-center justify-content-center">
                                            <div class="big-circle md-elevation-4 row align-items-center justify-content-center no-gutters">

                                                <i class="s-32 text-secondary icon-hangouts"></i>

                                            </div>

                                            <span class="app-title h3 my-3">Help Desk App</span>

                                            <span class="text-muted h6 d-none d-xl-block">Pilih Kontak untuk Memulai!..</span>

                                            <button type="button" class="btn btn-secondary d-block d-xl-none" data-fuse-bar-toggle="chat-left-sidebar">
                                                Pilih Kontak untuk Memulai!..
                                            </button>

                                        </div>
                                        <!-- / START -->

                                        <!-- CHAT -->
                                        <div id="chat-view" class="view flex-column align-items-center justify-content-center d-none">
                                            <!-- CHAT TOOLBAR -->
                                            <div class="toolbar row no-gutters align-items-center justify-content-between w-100 px-4">

                                                <div class="col">

                                                    <div class="row no-gutters align-items-center">

                                                        <!-- RESPONSIVE CHATS BUTTON-->
                                                        <button type="button" class="btn btn-icon" data-fuse-bar-toggle="chat-left-sidebar">
                                                            <i class="icon icon-hangouts s-8"></i>
                                                        </button>
                                                        <!-- / RESPONSIVE CHATS BUTTON-->

                                                        <!-- CHAT CONTACT-->
                                                        <div class="chat-contact row no-gutters align-items-center">

                                                            <div class="avatar-wrapper mr-4" >
                                                                <div id="gambar"></div>
                                                                <i class="icon icon- s-4 status do-not-disturb"></i>
                                                            </div>

                                                            <div class="chat-contact-name" id="ReciverName_txt">
                                                                <?=$chatTitle;?>
                                                            </div>
                                                        </div>
                                                        <!-- / CHAT CONTACT-->

                                                    </div>
                                                </div>

                                                <button type="button" class="btn btn-icon">
													<span data-toggle="tooltip" title="Clear Chat" class="ClearChat"><i class="icon icon-autorenew"></i></span>
                                                    
                                                </button>
                                            </div>
                                            <!-- / CHAT TOOLBAR -->

                                            <!-- CHAT CONTENT -->
                                            <div class="chat-content col custom-scrollbar"  id="content">

                                                <!-- CHAT MESSAGES -->
                                                <div class="chat-messages" id="dumppy">
													
                                                </div>
                                                <!-- CHAT MESSAGES -->
                                            </div>
                                            <!-- / CHAT CONTENT -->

                                            <!-- CHAT FOOTER -->
                                            <div class="chat-footer row align-items-center justify-content-center w-100 p-2 pl-4">
												<div class="input-group">
													<?php
														$obj=&get_instance();
														$obj->load->model('UserModel');
														$profile_url = $obj->UserModel->PictureUrl();
														$user=$obj->UserModel->GetUserData();
													?>
													<input type="hidden" id="Sender_Name" value="<?=$user['name'];?>">
													<input type="hidden" id="Sender_ProfilePic" value="<?=$profile_url;?>">
													<input type="hidden" id="ReciverId_txt">
													<input type="text" name="message" placeholder="Ketik dan tekan ENTER untuk mengirim pesan" class="form-control message" aria-label="Ketik dan tekan ENTER untuk mengirim pesan" aria-describedby="basic-addon2">
													<div class="input-group-append">
														<button type="button" class="btn btn-secondary btnSend" id="nav_down"><i class="icon icon-arrow-right-drop-circle"></i></button>
														<div class="btn btn-secondary ">
														<input type="file" name="file" class="upload_attachmentfile"/>
														<i class="icon icon-attachment"></i>
														</div>
													</div>
												</div>
                                                <!-- / REPLY FORM -->
                                            </div>
                                            <!-- / CHAT FOOTER-->
                                        </div>
                                        <!-- / CHAT -->

                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- / CONTENT -->
                    </div>

                    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/apps/chat/chat.js"></script>

                </div>

<!-- /.content-wrapper --> 


 <?php $this->load->view('back/template/footer'); ?>

<script>
$(function() {
$('.message').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
       sendTxtMessage($(this).val());
    }
});
$('.btnSend').click(function(){
       sendTxtMessage($('.message').val());
});
$('.selectVendor').click(function(){
      var receiver_id = $(this).attr('id');
	  $('#ReciverId_txt').val(receiver_id);
	  $('#ReciverName_txt').html($(this).attr('title'));
	  var Reciverphoto = $(this).attr('src');
	  var str1 = '<img src="'+Reciverphoto+'" class="avatar">';
	  $('#gambar').html('<img src="'+Reciverphoto+'" class="avatar">');
	  
	  GetChatHistory(receiver_id);
	  Updatestatusbaca(receiver_id);
 				
});
$('.upload_attachmentfile').change(function(){
	
	DisplayMessage('<div class="spiner"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
	ScrollDown();
	
	var file_data = $('.upload_attachmentfile').prop('files')[0];
	var receiver_id = $('#ReciverId_txt').val();   
    var form_data = new FormData();
    form_data.append('attachmentfile', file_data);
	form_data.append('type', 'Attachment');
	form_data.append('receiver_id', receiver_id);
	
	$.ajax({
                url: 'chat-attachment/upload', 
                dataType: 'json',  
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                        
                type: 'post',
                success: function(response){
					
					$('.upload_attachmentfile').val('');
					GetChatHistory(receiver_id);
				},
				error: function (jqXHR, status, err) {
 							 // alert('Local error callback');
				}
	 });
	
});
$('.ClearChat').click(function(){
       var receiver_id = $('#ReciverId_txt').val();
  	 			$.ajax({
						  //dataType : "json",
  						  url: 'chat-clear?receiver_id='+receiver_id,
						  success:function(data)
						  {
  							 GetChatHistory(receiver_id);		 
						  },
						  error: function (jqXHR, status, err) {
 							 // alert('Local error callback');
						  }
 					});
 				
});

 

});	///end of jquery

function ViewAttachment(message_id){
//alert(message_id);
			/*$.ajax({
						  //dataType : "json",
  						  url: 'view-chat-attachment?message_id='+message_id,
						  success:function(data)
						  {
  							 		 
						  },
						  error: function (jqXHR, status, err) {
 							 // alert('Local error callback');
						  }
 					});*/
}
function ViewAttachmentImage(image_url,imageTitle){
	$('#modelTitle').html(imageTitle); 
	$('#modalImgs').attr('src',image_url);
	$('#myModalImg').modal('show');
}

function ScrollDown(){
	var elmnt = document.getElementById("content");
    var h = elmnt.scrollHeight;
   $('#content').animate({scrollTop: h}, 1000);
}
window.onload = ScrollDown();

function DisplayMessage(message){
	var Sender_Name = $('#Sender_Name').val();
	var Sender_ProfilePic = $('#Sender_ProfilePic').val();
	
		var str = '<div class="row flex-nowrap message-row user p-4">';
				str+='<img class="avatar mr-4" src="'+Sender_ProfilePic+'" />';
				 str+='<div class="bubble">';
				 str+='<div class="message">'+message+'</div>'; //23 Jan 2:05 pm
				 str+='<div class="time text-muted text-right mt-2">02 May 16 16:40</div>';
				 str+='</div></div>';
		$('#dumppy').append(str);
}

function sendTxtMessage(message){
	var messageTxt = message.trim();
	if(messageTxt!=''){
		//console.log(message);
 		DisplayMessage(messageTxt);
		
				var receiver_id = $('#ReciverId_txt').val();
				$.ajax({
						  dataType : "json",
						  type : 'post',
						  data : {messageTxt : messageTxt, receiver_id : receiver_id },
						  url: 'send-message',
						  success:function(data)
						  {
  							GetChatHistory(receiver_id)		 
						  },
						  error: function (jqXHR, status, err) {
 							 // alert('Local error callback');
						  }
 					});
					
		//alert(url);
		//alert(receiver_id);
		ScrollDown();
		$('.message').val('');
		$('.message').focus();
	}else{
		$('.message').focus();
	}
}

function GetChatHistory(receiver_id){
				$.ajax({
						  //dataType : "json",
  						  url: 'get-chat-history-vendor?receiver_id='+receiver_id,
						  success:function(data)
						  {
  							$('#dumppy').html(data);
							ScrollDown();	 
						  },
						  error: function (jqXHR, status, err) {
 							 // alert('Local error callback');
						  }
 					});
}

function Updatestatusbaca(receiver_id){
				$.ajax({
						  //dataType : "json",
  						  url: 'update_status_baca?receiver_id='+receiver_id,
						  success:function(data)
						  {
  							$('#dumppy').html(data);
							ScrollDown();	 
						  },
						  error: function (jqXHR, status, err) {
 							 // alert('Local error callback');
						  }
 					});
}

setInterval(function(){ 
	var receiver_id = $('#ReciverId_txt').val();
	if(receiver_id!=''){GetChatHistory(receiver_id);}
}, 3000);
</script> 
 
<div class="quick-panel-sidebar custom-scrollbar" fuse-cloak data-fuse-bar="quick-panel-sidebar" data-fuse-bar-position="right">
                 <?php $this->load->view('back/template/quickpanel'); ?>
    </div>

        </div>
		<!-- Modal -->
<div class="modal fade" id="myModalImg" tabindex="-1">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" id="modelTitle">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <img id="modalImgs" src="uploads/attachment/21_preview.png" class="img-thumbnail" alt="Cinque Terre">
        </div>
        
        <!-- Modal footer -->
         
        
      </div>
    </div>
  </div>
    </main>
</body>
</html>