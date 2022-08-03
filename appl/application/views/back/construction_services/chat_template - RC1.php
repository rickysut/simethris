<!DOCTYPE html>
<html>
<head>
  <title><?php echo $page_title.' | '.$company_data->company_name ?></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/back/') ?>dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/back/') ?>dist/css/skins/_all-skins.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- Favicon -->
  <link rel="shortcut icon" href="<?php echo base_url('assets/images/company/'.$company_data->company_photo_thumb) ?>" />
<script src="<?php echo base_url('assets/plugins/jquery/dist') ?>/jquery.min.js"></script>
<script src="<?php echo base_url('assets/plugins/nested-datatable') ?>/nested.tables.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/smoothness/jquery-ui.css">	
<style type="text/css">
	.fileDiv {
  position: relative;
  overflow: hidden;
}
.upload_attachmentfile {
  position: absolute;
  opacity: 0;
  right: 0;
  top: 0;
}
.btnFileOpen {margin-top: -50px; }

.direct-chat-warning .right>.direct-chat-text {
    background: #d2d6de;
    border-color: #d2d6de;
    color: #444;
	text-align: right;
}
.direct-chat-primary .right>.direct-chat-text {
    background: #3c8dbc;
    border-color: #3c8dbc;
    color: #fff;
	text-align: right;
}
.spiner{}
.spiner .fa-spin { font-size:24px;}
.attachmentImgCls{ width:300px; margin-left: -25px; cursor:pointer; }
</style>
</head>
<body class="<?php echo $skins_template->value ?> sidebar-mini <?php echo $layout_template->value ?>">
<div class="wrapper">
<header class="main-header">
  <!-- Logo -->
  <a href="<?php echo base_url('dashboard') ?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels 
    <span class="logo-mini"><b>S</b></span> -->
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><img src="<?php echo base_url('assets') ?>/images/logo_admin.png" alt="Simethris" class="imgresponsive" height="125"></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
		
			<?php if($this->session->usertype != 3){ ?>
			<li><a href="verifikator" class="dropdown-toggle" data-toggle="dropdown">
				  <i class="fa fa-tasks"> </i><span class="label label-danger"><?php echo $get_jml_verifikasi->jumlahVerif ?></span>
				   </a></li>
				<?php } ?>
         
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<?php if($this->session->photo_thumb == NULL){ ?>
				  <img  src="<?php echo base_url('assets/images/noimage.jpg') ?>" class="user-image"  alt="No Image Found">
				<?php } else{ ?>
				  <img  src="<?php echo base_url('uploads/user/'.$this->session->photo_thumb) ?>" class="user-image"  alt="<?php echo $this->session->name ?>">
				<?php } ?>
              <span class="hidden-xs"><?php echo $this->session->name ?></span>
          </a>
          <ul class="dropdown-menu">
			<li class="user-header">
				<?php if($this->session->photo_thumb == NULL){ ?>
				  <img src="<?php echo base_url('assets/images/noimage.jpg') ?>" class="img-circle" alt="No Image Found">
				<?php } else{ ?>
				  <img src="<?php echo base_url('uploads/user/'.$this->session->photo_thumb) ?>" class="img-circle" alt="<?php echo $this->session->name ?>">
				<?php } ?>
                <p>
                  <?php echo $this->session->name ?>
                  <small><?php echo strtoupper($this->session->nama_perusahaan)?></small>
                </p>
              </li>
            <li class="user-body">
              <div class="row">
                <div class="col-xs-6 text-center">
                  <a href="<?php echo base_url('auth/update_profile/'.$this->session->id_users) ?>">Update Profile</a>
                </div>
                <div class="col-xs-6 text-center">
                  <a href="<?php echo base_url('auth/change_password') ?>">Change Password</a>
                </div>
              </div>
              <!-- /.row -->
            </li>
            <li class="user-footer">
              <div class="pull-right">
                <a href="<?php echo base_url('auth/logout') ?>" class="btn btn-default btn-flat">Logout</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
	
    
	<div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="user-header">
       
          <img style="position: relative; display: inline-block; left: 50%; transform: translate(-50%);" src="<?php echo $this->session->logo_perusahaan ?>" width="125px" class="img-circle" alt="No Image Found">
       
      </div>
	  <div class="row">
          <div class="text-center">
                <a href="#"><?php echo strtoupper($this->session->nama_perusahaan)?></a>
          </div>
      </div>
    </div>
	

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN MENU</li>
      <?php
      $this->db->join('menu_access', 'menu.id_menu = menu_access.menu_id');
      $this->db->join('submenu', 'menu.id_menu = submenu.id_submenu', 'LEFT');
      $this->db->where('menu_access.usertype_id', $this->session->usertype);
      $this->db->where('menu.is_active', '1');
      $this->db->group_by('menu.id_menu');
      $this->db->order_by('menu.order_no');
      $menu = $this->db->get('menu')->result();
      ?>

      <?php foreach($menu as $m){ ?>
        <!-- jika menu tidak punya submenu -->
        <?php if($m->submenu_id == NULL){ ?>
          <?php if(current_url() == base_url().$m->menu_url){$active = 'class="active"';}else{$active = '';} ?>
          <li <?php echo $active ?>> <a href="<?php echo base_url().$m->menu_url ?>">
            <i class="fa <?php echo $m->menu_icon ?>"></i> <span><?php echo $m->menu_name ?></span> </a>
          </li>
        <?php }
        else
        {
          $this->db->join('menu', 'submenu.id_submenu = menu.id_menu', 'LEFT');
          $this->db->join('menu_access', 'submenu.id_submenu = menu_access.submenu_id');
          $this->db->where('submenu.menu_id', $m->id_menu);
          $this->db->where('menu_access.usertype_id', $this->session->usertype);
          $this->db->order_by('submenu.order_no');
          $submenu = $this->db->get('submenu')->result();

          if($this->uri->segment(1) == $m->menu_slug){$actives = 'class="active treeview menu-open"';}
          else{$actives = 'class="treeview"';}
        ?>
          <li <?php echo $actives ?>>
            <a href="#">
              <i class="fa <?php echo $m->menu_icon ?>"></i> <span><?php echo $m->menu_name ?></span>
              <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
            </a>
            <ul class="treeview-menu">
              <?php foreach($submenu as $sm){ ?>
                <?php if(current_url() == base_url().$sm->submenu_url){$active = 'class="active"';}else{$active = '';} ?>
                <li <?php echo $active ?>><a href="<?php echo base_url().$sm->submenu_url ?>"><i class="fa fa-circle-o"></i> <?php echo $sm->submenu_name ?></a> </li>
              <?php } ?>
            </ul>
          </li>
      <?php }} ?>

      <li class="header">SETTINGS</li>
      <?php if(is_superadmin()){ ?>
        <li class="<?php if($this->uri->segment(1) == 'auth' && $this->uri->segment(2) == 'log_list'){echo "active";} ?>"><a href="<?php echo base_url('auth/log_list') ?>"><i class="fa fa-clock-o"></i> <span>Log System Process</span></a></li>
        <li class="<?php if($this->uri->segment(1) == 'company'){echo "active";} ?>" ><a href="<?php echo base_url('company/update/1') ?>"><i class="fa fa-building"></i> <span>Company Profile</span></a></li>
        <li class="<?php if($this->uri->segment(1) == 'auth' && $this->uri->segment(2) != 'log_list'){echo "active";} ?> treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>User Management</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($this->uri->segment(1) == 'auth' && $this->uri->segment(2) == 'create'){echo 'class="active"';} ?>><a href="<?php echo base_url('auth/create') ?>"><i class="fa fa-circle-o"></i> Add User</a></li>
            <li <?php if($this->uri->segment(1) == 'auth' && $this->uri->segment(2) == ''){echo 'class="active"';} ?>><a href="<?php echo base_url('auth') ?>"><i class="fa fa-circle-o"></i> User List</a></li>
            <li <?php if($this->uri->segment(1) == 'auth' && $this->uri->segment(2) == 'deleted_list'){echo 'class="active"';} ?>><a href="<?php echo base_url('auth/deleted_list') ?>"><i class="fa fa-circle-o"></i> Recycle Bin</a></li>
          </ul>
        </li>
        <li class="<?php if($this->uri->segment(1) == 'usertype'){echo "active";} ?> treeview">
          <a href="#">
            <i class="fa fa-legal"></i> <span>Usertype Management</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($this->uri->segment(1) == 'usertype' && $this->uri->segment(2) == 'create'){echo 'class="active"';} ?>><a href="<?php echo base_url('usertype/create') ?>"><i class="fa fa-circle-o"></i> Add Usertype</a></li>
            <li <?php if($this->uri->segment(1) == 'usertype' && $this->uri->segment(2) == ''){echo 'class="active"';} ?>><a href="<?php echo base_url('usertype') ?>"><i class="fa fa-circle-o"></i> Usertype List</a></li>
          </ul>
        </li>
        <li class="<?php if($this->uri->segment(1) == 'menu'){echo "active";} ?> treeview">
          <a href="#">
            <i class="fa fa-list"></i> <span>Menu Management</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($this->uri->segment(1) == 'menu' && $this->uri->segment(2) == 'create'){echo 'class="active"';} ?>><a href="<?php echo base_url('menu/create') ?>"><i class="fa fa-circle-o"></i> Add Menu</a></li>
            <li <?php if($this->uri->segment(1) == 'menu' && $this->uri->segment(2) == ''){echo 'class="active"';} ?>><a href="<?php echo base_url('menu') ?>"><i class="fa fa-circle-o"></i> Menu List</a></li>
          </ul>
        </li>
        <li class="<?php if($this->uri->segment(1) == 'submenu'){echo "active";} ?> treeview">
          <a href="#">
            <i class="fa fa-list"></i> <span>SubMenu Management</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($this->uri->segment(1) == 'submenu' && $this->uri->segment(2) == 'create'){echo 'class="active"';} ?>><a href="<?php echo base_url('submenu/create') ?>"><i class="fa fa-circle-o"></i> Add SubMenu</a></li>
            <li <?php if($this->uri->segment(1) == 'submenu' && $this->uri->segment(2) == ''){echo 'class="active"';} ?>><a href="<?php echo base_url('submenu') ?>"><i class="fa fa-circle-o"></i> SubMenu List</a></li>
          </ul>
        </li>
        <li class="<?php if($this->uri->segment(1) == 'menuaccess'){echo "active";} ?> treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Menu Access Management</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($this->uri->segment(1) == 'menuaccess' && $this->uri->segment(2) == 'create'){echo 'class="active"';} ?>><a href="<?php echo base_url('menuaccess/create') ?>"><i class="fa fa-circle-o"></i> Add Menu Access</a></li>
            <li <?php if($this->uri->segment(1) == 'menuaccess' && $this->uri->segment(2) == ''){echo 'class="active"';} ?>><a href="<?php echo base_url('menuaccess') ?>"><i class="fa fa-circle-o"></i> Menu Access List</a></li>
          </ul>
        </li>
        <li class="<?php if($this->uri->segment(1) == 'template'){echo "active";} ?> treeview">
          <a href="#">
            <i class="fa fa-gears"></i> <span>Template Management</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($this->uri->segment(1) == 'template' && $this->uri->segment(3) == '1'){echo 'class="active"';} ?>><a href="<?php echo base_url('template/update/1') ?>"><i class="fa fa-circle-o"></i> Layout</a></li>
            <li <?php if($this->uri->segment(1) == 'template' && $this->uri->segment(3) == '2'){echo 'class="active"';} ?>><a href="<?php echo base_url('template/update/2') ?>"><i class="fa fa-circle-o"></i> Skins</a></li>
          </ul>
        </li>
      <?php } ?>
      <li class="<?php if($this->uri->segment(2) == 'update_profile'){echo "active";} ?>" ><a href="<?php echo base_url('auth/update_profile/'.$this->session->id_users) ?>"><i class="fa fa-pencil"></i> <span>Edit Profile</span></a></li>
      <li class="<?php if($this->uri->segment(2) == 'change_password'){echo "active";} ?>" ><a href="<?php echo base_url('auth/change_password') ?>"><i class="fa fa-asterisk"></i> <span>Change Password</span></a></li>
      <li><a href="<?php echo base_url('auth/logout') ?>"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>

<div class="content-wrapper"> 
  <section class="content">
     <div class="row">          
            <div class="col-md-8" id="chatSection">
              <!-- DIRECT CHAT -->
              <div class="box box-warning direct-chat direct-chat-primary">
                <div class="box-header with-border">
                  <h3 class="box-title" id="ReciverName_txt"><?=$chatTitle;?></h3>

                  <div class="box-tools pull-right">
                    <span data-toggle="tooltip" title="Clear Chat" class="ClearChat"><i class="fa fa-comments"></i></span>
                    <!--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>-->
                   <!-- <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Clear Chat"
                            data-widget="chat-pane-toggle">
                      <i class="fa fa-comments"></i></button>-->
                   <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>-->
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <!-- Conversations are loaded here -->
                  <div class="direct-chat-messages" id="content">
                     <!-- /.direct-chat-msg -->

                     <div id="dumppy"></div>

                  </div>
                  <!--/.direct-chat-messages-->
 
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <!--<form action="#" method="post">-->
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
                        <input type="text" name="message" placeholder="Type Message ..." class="form-control message">
                      		<span class="input-group-btn">
                             <button type="button" class="btn btn-success btn-flat btnSend" id="nav_down">Send</button>
                             <div class="fileDiv btn btn-info btn-flat"> <i class="fa fa-upload"></i> 
                             <input type="file" name="file" class="upload_attachmentfile"/></div>
                          </span>
                    </div>
                  <!--</form>-->
                </div>
                <!-- /.box-footer-->
              </div>
              <!--/.direct-chat -->
            </div>




            <div class="col-md-4">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title"><?=$strTitle;?></h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger"><?=count($vendorslist);?> <?=$strsubTitle;?></span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                  
                    <?php if(!empty($vendorslist)){
						foreach($vendorslist as $v):
						?>
                        <li class="selectVendor" id="<?=$v['id_users'];?>" title="<?=$v['name'];?>">
                          <img src="<?=$v['photo'];?>" height="25" alt="<?=$v['name'];?>" title="<?=$v['name'];?>">
                          <a class="users-list-name" href="#"><?=$v['name'];?></a>
                          <!--<span class="users-list-date">Yesterday</span>-->
                        </li>
                    <?php endforeach;?>
                    
                   <?php }else{?>
                   	<li>
                       <a class="users-list-name" href="#">No Administrator's Find...</a>
                     </li>
                  	<?php } ?>
                    
                    
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
               <!-- <div class="box-footer text-center">
                  <a href="javascript:void(0)" class="uppercase">View All Users</a>
                </div>-->
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
            <!-- /.col -->            
          </div>
    
    <!-- /.row --> 
    
    
    
  </section>
  
  <!-- /.content --> 
  
</div>

<!-- /.content-wrapper --> 

<!-- Modal -->
<div class="modal fade" id="myModalImg">
    <div class="modal-dialog modal-lg">
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
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.13
    </div>
    <strong>Copyright &copy; 2019 <a href="https://anuwani.online">Anuwani</a> & <a href="#">Sistem Monitoring Tanam Hortikultura Strategis</a>.</strong> All rights reserved.
  </footer>

  <!-- jQuery 3 -->
  <script src="<?php echo base_url('assets/plugins/') ?>jquery/dist/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?php echo base_url('assets/plugins/') ?>jquery-ui/jquery-ui.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url('assets/plugins/') ?>bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- Slimscroll -->
  <script src="<?php echo base_url('assets/plugins/') ?>jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url('assets/plugins/') ?>fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url('assets/template/back/') ?>dist/js/adminlte.min.js"></script>
  
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
	ChatSection(1);
      var receiver_id = $(this).attr('id');
	  $('#ReciverId_txt').val(receiver_id);
	  $('#ReciverName_txt').html($(this).attr('title'));
	  
	  GetChatHistory(receiver_id);
 				
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

function ChatSection(status){
	//chatSection
	if(status==0){
		$('#chatSection :input').attr('disabled', true);
    } else {
        $('#chatSection :input').removeAttr('disabled');
    }   
}
ChatSection(0);


function ScrollDown(){
	var elmnt = document.getElementById("content");
    var h = elmnt.scrollHeight;
   $('#content').animate({scrollTop: h}, 1000);
}
window.onload = ScrollDown();

function DisplayMessage(message){
	var Sender_Name = $('#Sender_Name').val();
	var Sender_ProfilePic = $('#Sender_ProfilePic').val();
	
		var str = '<div class="direct-chat-msg right">';
				str+='<div class="direct-chat-info clearfix">';
				 str+='<span class="direct-chat-name pull-right">'+Sender_Name ;
				 str+='</span><span class="direct-chat-timestamp pull-left"></span>'; //23 Jan 2:05 pm
				 str+='</div><img class="direct-chat-img" src="'+Sender_ProfilePic+'" alt="">';
				 str+='<div class="direct-chat-text">'+message;
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
					
		alert(url);
		alert(receiver_id);
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

setInterval(function(){ 
	var receiver_id = $('#ReciverId_txt').val();
	if(receiver_id!=''){GetChatHistory(receiver_id);}
}, 3000);
</script> 
 
</body>
</html>