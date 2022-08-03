<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ChatController extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		is_login();

		$this->data['company_data']    				= $this->Company_model->company_profile();
		$this->data['layout_template']    			= $this->Template_model->layout();
		$this->data['skins_template']     			= $this->Template_model->skins();
		$this->load->model(['ChatModel','OuthModel','UserModel']);
		$this->load->helper('string');
		$this->data['module'] = 'Help Desk';
		$this->load->model('r_verifikasi');
	}
	
	public function index(){
		$this->data['page_title'] = $this->data['module'];
		$this->data['strTitle']='';
		$this->data['strsubTitle']='';
		$this->data['get_jml_verifikasi']				= $this->r_verifikasi->get_jml_r_verifikasi();
		$list=[];
		if($this->session->userdata['usertype'] == '3'){
			$list = $this->UserModel->VendorsList();
			$this->data['strTitle']='All Administrator';
			$this->data['strsubTitle']='Administrator';
			$this->data['chatTitle']='Select Administrator with Chat';
		}else{
			$list = $this->UserModel->ClientsListCs();
			$this->data['strTitle']='All Connected Users';
			$this->data['strsubTitle']='User';
			$this->data['chatTitle']='Select Users with Chat';
 
		}
		$vendorslist=[];
		foreach($list as $u){
			$vendorslist[]=
			[
				'id_users' => $this->OuthModel->Encryptor('encrypt', $u['id_users']),
				'name' => $u['name'],
				'photo' => $this->UserModel->PictureUrlById($u['id_users']),
				'pengirim' => $u['id_users'],
				'is_online' => $u['is_online'],
				'last_login' => $u['last_login'],
			];
		}
		$this->data['vendorslist']=$vendorslist;
		 
		$this->load->view('back/construction_services/chat_template',$this->data);
 		//$this->parser->parse('back/construction_services/chat_template',$this->$data);
    }
	
	public function loadchatlist(){
		$list=[];
		if($this->session->userdata['usertype'] == '3'){
			$list = $this->UserModel->VendorsList();
			$this->data['strTitle']='All Administrator';
			$this->data['strsubTitle']='Administrator';
			$this->data['chatTitle']='Select Administrator with Chat';
		}else{
			$list = $this->UserModel->ClientsListCs();
			$this->data['strTitle']='All Connected Users';
			$this->data['strsubTitle']='User';
			$this->data['chatTitle']='Select Users with Chat';
 
		}
		$vendorslist=[];
		foreach($list as $u){
			$vendorslist[]=
			[
				'id_users' => $this->OuthModel->Encryptor('encrypt', $u['id_users']),
				'name' => $u['name'],
				'photo' => $this->UserModel->PictureUrlById($u['id_users']),
				'pengirim' => $u['id_users'],
				'is_online' => $u['is_online'],
				'last_login' => $u['last_login'],
			];
		}
		$this->data['vendorslist']=$vendorslist;
		//$this->load->view('back/construction_services/chatlist',$this->data);
	}
	
	public function send_text_message(){
		$post = $this->input->post();
		$messageTxt='NULL';
		$attachment_name='';
		$file_ext='';
		$mime_type='';
		
		if(isset($post['type'])=='Attachment'){ 
		 	$AttachmentData = $this->ChatAttachmentUpload();
			//print_r($AttachmentData);
			$attachment_name = $AttachmentData['file_name'];
			$file_ext = $AttachmentData['file_ext'];
			$mime_type = $AttachmentData['file_type'];
			 
		}else{
			$messageTxt = reduce_multiples($post['messageTxt'],' ');
		}	
		 
				$data=[
 					'sender_id' => $this->session->userdata['id_users'],
					'receiver_id' => $this->OuthModel->Encryptor('decrypt', $post['receiver_id']),
					'message' =>   $messageTxt,
					'attachment_name' => $attachment_name,
					'file_ext' => $file_ext,
					'mime_type' => $mime_type,
					'message_date_time' => date('Y-m-d H:i:s'), //23 Jan 2:05 pm
					'ip_address' => $this->input->ip_address(),
				];
 				$query = $this->ChatModel->SendTxtMessage($this->OuthModel->xss_clean($data)); 
 				$response='';
				if($query == true){
					$response = ['status' => 1 ,'message' => '' ];
				}else{
					$response = ['status' => 0 ,'message' => 'sorry we re having some technical problems. please try again !' 						];
				}
             
 		   echo json_encode($response);
	}
	
	public function ChatAttachmentUpload(){
		$file_data='';
		if(isset($_FILES['attachmentfile']['name']) && !empty($_FILES['attachmentfile']['name'])){	
				$config['upload_path']          = './uploads/attachment';
				$config['allowed_types']        = 'jpeg|jpg|png|txt|pdf|docx|xlsx|pptx|rtf';
				//$config['max_size']             = 500;
				//$config['max_width']            = 1024;
				//$config['max_height']           = 768;
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('attachmentfile'))
				{
					echo json_encode(['status' => 0,
					'message' => '<span style="color:#900;">'.$this->upload->display_errors(). '<span>' ]); die;
				}
				else
				{
					$file_data = $this->upload->data();
					//$filePath = $file_data['file_name'];
					return $file_data;
				}
		    }
 		 
	}
	
	public function get_chat_history_by_vendor(){
		$receiver_id = $this->OuthModel->Encryptor('decrypt', $this->input->get('receiver_id') );
		
		$Logged_sender_id = $this->session->userdata['id_users'];
		 
		$history = $this->ChatModel->GetReciverChatHistory($receiver_id);
		//print_r($history);
		foreach($history as $chat):
			
			$message_id = $this->OuthModel->Encryptor('encrypt', $chat['id']);
			$sender_id = $chat['sender_id'];
			$userName = $this->UserModel->GetName($chat['sender_id']);
			$userPic = $this->UserModel->PictureUrlById($chat['sender_id']);
			
			$message = $chat['message'];
			$messagedatetime = date('d M H:i A',strtotime($chat['message_date_time']));
			
 		?>
        	<?php
				$messageBody='';
            	if($message=='NULL'){ //fetach media objects like images,pdf,documents etc
					$classBtn = 'right';
					if($Logged_sender_id==$sender_id){$classBtn = 'left';}
					
					$attachment_name = $chat['attachment_name'];
					$file_ext = $chat['file_ext'];
					$mime_type = explode('/',$chat['mime_type']);
					
					$document_url = base_url('uploads/attachment/'.$attachment_name);
					
				  if($mime_type[0]=='image'){
 					$messageBody.='<img src="'.$document_url.'" onClick="ViewAttachmentImage('."'".$document_url."'".','."'".$attachment_name."'".');" class="attachmentImgCls">';	
				  }else{
					$messageBody='';
					 $messageBody.='<div class="attachment">';
                          $messageBody.='<h4>Attachments:</h4>';
                           $messageBody.='<p class="filename">';
                            $messageBody.= $attachment_name;
                          $messageBody.='</p></br>';
        
                          $messageBody.='<div class="pull-'.$classBtn.'">';
                            $messageBody.='<a download href="'.$document_url.'"><button type="button" id="'.$message_id.'" class="btn btn-primary btn-sm btn-flat btnFileOpen">Open</button></a>';
                          $messageBody.='</div>';
                        $messageBody.='</div>';
					}
						
											
				}else{
					$messageBody = $message;
				}
			?>
            
            
        
             <?php if($Logged_sender_id!=$sender_id){?>     
                  <!-- Message. Default to the left -->
                    
					<!-- MESSAGE -->
                    <div class="row flex-nowrap message-row contact p-4">
						<img class="avatar mr-4" src="<?=$userPic;?>" alt="<?=$userName;?>">

                        <div class="bubble">
                            <div class="message"><?=$messageBody;?></div>
                            <div class="time text-muted text-right mt-2"><?=$messagedatetime;?></div>
                        </div>
                    </div>
                    <!-- /.direct-chat-msg -->
			<?php }else{?>
                    <!-- Message to the right -->
                    <div class="row flex-nowrap message-row user p-4">
					<img class="avatar mr-4" src="<?=$userPic;?>" />

                        <div class="bubble">
                            <div class="message"><?=$messageBody;?></div>
                            <div class="time text-muted text-right mt-2"><?=$messagedatetime;?></div>
                        </div>

                    </div>
             <?php }?>
        
        <?php
		endforeach;
 		
	}
	
	public function update_status_baca(){
		$receiver_id = $this->OuthModel->Encryptor('decrypt', $this->input->get('receiver_id') );
		$Logged_sender_id = $this->session->userdata['id_users'];
		$this->UserModel->updateStatusBaca($Logged_sender_id, $receiver_id, array('is_read'=>1));  
	}
	
	public function chat_clear_client_cs(){
		$receiver_id = $this->OuthModel->Encryptor('decrypt', $this->input->get('receiver_id') );
		
		$messagelist = $this->ChatModel->GetReciverMessageList($receiver_id);
		
		foreach($messagelist as $row){
			
			if($row['message']=='NULL'){
				$attachment_name = unlink('uploads/attachment/'.$row['attachment_name']);
			}
 		}
		
		$this->ChatModel->TrashById($receiver_id); 
 
 		
	}
	
	public function get_total_unread(){
		$totalunverifikasi = $this->ChatModel->total_rows_unread($this->session->userdata('id_users'));
		$result['total_unread'] = $totalunverifikasi;
		$result['msg'] = "Chat dari User";
		echo json_encode($result);
		
	}
	
}