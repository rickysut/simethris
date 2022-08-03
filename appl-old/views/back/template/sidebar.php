<aside id="aside" class="aside aside-left" data-fuse-bar="aside" data-fuse-bar-media-step="md" data-fuse-bar-position="left">
                <?php
					$ChatReceiver = $this->session->userdata('id_users');
					$jml_data_unverifikasi = $this->r_verifikasi->total_rows_unverif();
					$jml_chat_unread = $this->ChatModel->total_rows_unread($ChatReceiver);
				?>
				<div class="aside-content bg-primary-700 text-auto">

                    <div class="aside-toolbar">

                        <div class="logo">
                            <span class="logo-icon">S</span>
                            <span class="logo-text">simeTHRIS</span>
                        </div>

                        <button id="toggle-fold-aside-button" type="button" class="btn btn-icon d-none d-lg-block" data-fuse-aside-toggle-fold>
                            <i class="icon icon-backburger"></i>
                        </button>

                    </div>

                    <ul class="nav flex-column custom-scrollbar" id="sidenav" data-children=".nav-item">

                        <li class="subheader">
                            <span>APPS</span>
                        </li>

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
							  <?php if(current_url() == base_url().$m->menu_url){$active = 'class="nav-link ripple active"';}else{$active = 'class="nav-link ripple "';} ?>
							  <li class="nav-item"><a <?php echo $active ?> href="<?php echo base_url().$m->menu_url ?>" data-url="<?php echo base_url()?>">
								<?php if($m->menu_name == 'Verifikator'){ ?>
									<i class="icon s-4 <?php echo $m->menu_icon ?>"></i> <span><?php echo str_pad($m->menu_name,15); ?>
									<?php if($jml_data_unverifikasi==0){ ?></span> </a><?php }else{ ?><span class="badge badge-pill badge-warning" id="total_unverifikasi"> <?php echo $jml_data_unverifikasi ?></span></span> </a><?php } ?>
								<?php }elseif($m->menu_name == 'Help Desk'){ ?>
								<i class="icon s-4 <?php echo $m->menu_icon ?>"></i> <span><?php echo str_pad($m->menu_name,15); ?>
									<?php if($jml_chat_unread==0){ ?></span> </a><?php }else{ ?><span class="badge badge-pill badge-warning" id="total_unread"> <?php echo $jml_chat_unread ?></span></span> </a><?php } ?>
								<?php }else{ ?>
								<i class="icon s-4 <?php echo $m->menu_icon ?>"></i> <span><?php echo $m->menu_name ?></span> </a>
								<?php } ?>
							  </li>
							<?php }
							else
							{
							  $this->db->join('menu', 'submenu.menu_id = menu.id_menu', 'LEFT');
							  $this->db->join('menu_access', 'submenu.id_submenu = menu_access.submenu_id');
							  $this->db->where('submenu.menu_id', $m->id_menu);
							  $this->db->where('menu_access.usertype_id', $this->session->usertype);
							  $this->db->order_by('submenu.order_no');
							  $submenu = $this->db->get('submenu')->result();

							  if($this->uri->segment(1) == $m->menu_slug){$actives = 'class="nav-link ripple with-arrow"';}
							  else{$actives = 'class="nav-link ripple with-arrow collapsed"';}
							?>
							  <li class="nav-item" role="tab" id="heading<?php echo $m->menu_name ?>">
								<a <?php echo $actives ?> data-toggle="collapse" data-target="#collapse<?php echo $m->menu_slug ?>" href="#" aria-expanded="false" aria-controls="collapse<?php echo $m->menu_slug ?>">
								  <i class="icon s-4 <?php echo $m->menu_icon ?>"></i> <span><?php echo $m->menu_name ?></span>
								</a>
								<ul id="collapse<?php echo $m->menu_slug ?>" class="collapse" role="tabpanel" aria-labelledby="heading<?php echo $m->menu_name ?>" data-children=".nav-item">
								  <?php foreach($submenu as $sm){ ?>
									<?php if(current_url() == base_url().$sm->submenu_url){$active = 'class="nav-link ripple active"';}else{$active = 'class="nav-link ripple "';} ?>
									<li class="nav-item"><a <?php echo $active ?> href="<?php echo base_url().$sm->submenu_url ?>" data-url="<?php echo base_url()?>"><i class="icon s-4 icon-arrow-right-drop-circle"></i> <?php echo $sm->submenu_name ?></a> </li>
								  <?php } ?>
								</ul>
							  </li>
						  <?php }} ?>

                        <li class="subheader">
                            <span>SETTINGS</span>
                        </li>
						<?php if(is_superadmin()){ ?>
						<li class="nav-item"><a class="<?php if($this->uri->segment(1) == 'auth' && $this->uri->segment(2) == 'log_list'){echo "nav-link ripple active";}else{echo "nav-link ripple ";} ?>" href="<?php echo base_url('auth/log_list') ?>"><i class="icon s-4 icon-chip"></i> <span>Log System Process</span></a></li>
						<li class="nav-item"><a class="<?php if($this->uri->segment(1) == 'company'){echo "nav-link ripple active";}else{echo "nav-link ripple ";} ?>" href="<?php echo base_url('company/update/1') ?>"><i class="icon s-4 icon-city"></i> <span>Company Profile</span></a></li>
						<li class="nav-item" role="tab" id="heading-users">
						  <a class="nav-link ripple with-arrow collapsed" data-toggle="collapse" data-target="#collapse-users" href="#" aria-expanded="false" aria-controls="collapse-users">
							<i class="icon s-4 icon-human-male-female"></i> <span>User Management</span>
						  </a>
						  <ul id="collapse-users" class="collapse " role="tabpanel" aria-labelledby="heading-users" data-children=".nav-item">
							<li class="nav-item"><a class="<?php if($this->uri->segment(1) == 'auth' && $this->uri->segment(2) == 'create'){echo "nav-link ripple active";}else{echo "nav-link ripple ";} ?>" href="<?php echo base_url('auth/create') ?>"><i class="icon s-4 icon-arrow-right-drop-circle"></i> Add User</a></li>
							<li class="nav-item"><a class="<?php if($this->uri->segment(1) == 'auth' && $this->uri->segment(2) == ''){echo "nav-link ripple active";}else{echo "nav-link ripple ";} ?>" href="<?php echo base_url('auth') ?>"><i class="icon s-4 icon-arrow-right-drop-circle"></i> User List</a></li>
							<li class="nav-item"><a class="<?php if($this->uri->segment(1) == 'auth' && $this->uri->segment(2) == 'deleted_list'){echo "nav-link ripple active";}else{echo "nav-link ripple ";} ?>" href="<?php echo base_url('auth/deleted_list') ?>"><i class="icon s-4 icon-arrow-right-drop-circle"></i> Recycle Bin</a></li>
						  </ul>
						</li>
						<li class="nav-item" role="tab" id="heading-userstype">
						  <a class="nav-link ripple with-arrow collapsed" data-toggle="collapse" data-target="#collapse-userstype" href="#" aria-expanded="false" aria-controls="collapse-userstype">
							<i class="icon s-4 icon-human-greeting"></i> <span>Usertype Management</span>
						  </a>
						  <ul id="collapse-userstype" class="collapse " role="tabpanel" aria-labelledby="heading-userstype" data-children=".nav-item">
							<li class="nav-item"><a class="<?php if($this->uri->segment(1) == 'usertype' && $this->uri->segment(2) == 'create'){echo "nav-link ripple active";}else{echo "nav-link ripple ";} ?>" href="<?php echo base_url('usertype/create') ?>"><i class="icon s-4 icon-arrow-right-drop-circle"></i> Add Usertype</a></li>
							<li class="nav-item"><a class="<?php if($this->uri->segment(1) == 'usertype' && $this->uri->segment(2) == ''){echo "nav-link ripple active";}else{echo "nav-link ripple ";} ?>" href="<?php echo base_url('usertype') ?>"><i class="icon s-4 icon-arrow-right-drop-circle"></i> Usertype List</a></li>
						  </ul>
						</li>
						<li class="nav-item" role="tab" id="heading-menumanagement">
						  <a class="nav-link ripple with-arrow collapsed" data-toggle="collapse" data-target="#collapse-menumanagement" href="#" aria-expanded="false" aria-controls="collapse-menumanagement">
							<i class="icon s-4 icon-library-books"></i> <span>Menu Management</span>
						  </a>
						  <ul id="collapse-menumanagement" class="collapse " role="tabpanel" aria-labelledby="heading-menumanagement" data-children=".nav-item">
							<li class="nav-item"><a class="<?php if($this->uri->segment(1) == 'menu' && $this->uri->segment(2) == 'create'){echo "nav-link ripple active";}else{echo "nav-link ripple ";} ?>" href="<?php echo base_url('menu/create') ?>"><i class="icon s-4 icon-arrow-right-drop-circle"></i> Add Menu</a></li>
							<li class="nav-item"><a class="<?php if($this->uri->segment(1) == 'menu' && $this->uri->segment(2) == ''){echo "nav-link ripple active";}else{echo "nav-link ripple ";} ?>" href="<?php echo base_url('menu') ?>"><i class="icon s-4 icon-arrow-right-drop-circle"></i> Menu List</a></li>
						  </ul>
						</li>
						<li class="nav-item" role="tab" id="heading-submenu">
						  <a class="nav-link ripple with-arrow collapsed" data-toggle="collapse" data-target="#collapse-submenu" href="#" aria-expanded="false" aria-controls="collapse-submenu">
							<i class="icon s-4 icon-link-variant"></i> <span>SubMenu Management</span>
						  </a>
						  <ul id="collapse-submenu" class="collapse " role="tabpanel" aria-labelledby="heading-submenu" data-children=".nav-item">
							<li class="nav-item"><a class="<?php if($this->uri->segment(1) == 'submenu' && $this->uri->segment(2) == 'create'){echo "nav-link ripple active";}else{echo "nav-link ripple ";} ?>" href="<?php echo base_url('submenu/create') ?>"><i class="icon s-4 icon-arrow-right-drop-circle"></i> Add SubMenu</a></li>
							<li class="nav-item"><a class="<?php if($this->uri->segment(1) == 'submenu' && $this->uri->segment(2) == ''){echo "nav-link ripple active";}else{echo "nav-link ripple ";} ?>" href="<?php echo base_url('submenu') ?>"><i class="icon s-4 icon-arrow-right-drop-circle"></i> SubMenu List</a></li>
						  </ul>
						</li>
						<li class="nav-item" role="tab" id="heading-menuaccess">
						  <a class="nav-link ripple with-arrow collapsed" data-toggle="collapse" data-target="#collapse-menuaccess" href="#" aria-expanded="false" aria-controls="collapse-menuaccess">
							<i class="icon s-4 icon-key-plus"></i> <span>Menu Access Management</span>
						  </a>
						  <ul id="collapse-menuaccess" class="collapse " role="tabpanel" aria-labelledby="heading-menuaccess" data-children=".nav-item">
							<li class="nav-item"><a class="<?php if($this->uri->segment(1) == 'menuaccess' && $this->uri->segment(2) == 'create'){echo "nav-link ripple active";}else{echo "nav-link ripple ";} ?>" href="<?php echo base_url('menuaccess/create') ?>"><i class="icon s-4 icon-arrow-right-drop-circle"></i> Add Menu Access</a></li>
							<li class="nav-item"><a class="<?php if($this->uri->segment(1) == 'menuaccess' && $this->uri->segment(2) == ''){echo "nav-link ripple active";}else{echo "nav-link ripple ";} ?>" href="<?php echo base_url('menuaccess') ?>"><i class="icon s-4 icon-arrow-right-drop-circle"></i> Menu Access List</a></li>
						  </ul>
						</li>
					  <?php } ?>
					  <li class="nav-item"><a class="<?php if($this->uri->segment(2) == 'update_profile'){echo "nav-link ripple active";}else{echo "nav-link ripple ";} ?>" href="<?php echo base_url('auth/update_profile/'.$this->session->id_users) ?>"><i class="icon s-4 icon-folder-account"></i> <span>Edit Profile</span></a></li>
					  <li class="nav-item"><a class="<?php if($this->uri->segment(2) == 'change_password'){echo "nav-link ripple active";}else{echo "nav-link ripple ";} ?>" href="<?php echo base_url('auth/change_password') ?>"><i class="icon s-4 icon-lock"></i> <span>Change Password</span></a></li>
					  <li class="nav-item"><a class="nav-link ripple" href="<?php echo base_url('auth/logout') ?>"><i class="icon s-4 icon-logout-variant"></i> <span>Logout</span></a></li>
					</ul>
				</div>

            </aside>           
			