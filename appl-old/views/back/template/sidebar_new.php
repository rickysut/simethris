<aside class="left-sidebar">
	<!-- Sidebar scroll-->
	<div class="scroll-sidebar">
		<!-- User profile -->
		<div class="user-profile">
			<!-- User profile image -->
			<div class="profile-img">
				<?php if($this->session->photo_thumb == NULL){ ?>
					<img src="<?php echo base_url('asset/images/noimage.jpg') ?>" alt="No Image Found">
				<?php } else{ ?>
					<img src="<?php echo base_url('uploads/user/'.$this->session->photo_thumb) ?>" class="avatar" alt="<?php echo $this->session->name ?>">
				<?php } ?>
			</div>
			<!-- User profile text-->
			<div class="profile-text">
				<h5><?php echo $this->session->name ?></h5>
				<a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="mdi mdi-settings"></i></a>
				<a href="<?php echo base_url('auth/logout') ?>" class="" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
				<div class="dropdown-menu animated flipInY">
					<!-- text-->
					<a href="<?php echo base_url('auth/update_profile/'.$this->session->id_users) ?>" class="dropdown-item"><i class="ti-user"></i> Update Profile</a>
					<!-- text-->
					<a href="<?php echo base_url('auth/change_password') ?>" class="dropdown-item"><i class="ti-wallet"></i> Change Password</a>
					<!-- text-->
					<div class="dropdown-divider"></div>
					<!-- text-->
					<a href="<?php echo base_url('auth/logout') ?>" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
					<!-- text-->
				</div>
			</div>
		</div>
		<!-- End User profile text-->
		<!-- Sidebar navigation-->
		<nav class="sidebar-nav">
			<ul id="sidebarnav">
				<li class="nav-devider"></li>
				<li class="nav-small-cap">MENU UTAMA</li>
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
							<li><a class="waves-effect waves-dark" href="<?php echo base_url().$m->menu_url ?>" aria-expanded="false"><i class="fa <?php echo $m->menu_icon ?>"></i><span class="hide-menu"><?php echo $m->menu_name ?></span></a>
							</li>
						<?php }
						else{
							$this->db->join('menu', 'submenu.id_submenu = menu.id_menu', 'LEFT');
							$this->db->join('menu_access', 'submenu.id_submenu = menu_access.submenu_id');
							$this->db->where('submenu.menu_id', $m->id_menu);
							$this->db->where('menu_access.usertype_id', $this->session->usertype);
							$this->db->order_by('submenu.order_no');
							$submenu = $this->db->get('submenu')->result();
						?>
						<li>
							<a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi <?php echo $m->menu_icon ?>"></i><span class="hide-menu"><?php echo $m->menu_name ?></span></a>
							<ul aria-expanded="false" class="collapse">
								<?php foreach($submenu as $sm){ ?>
								<li><a href="<?php echo base_url().$sm->submenu_url ?>"><i class="fa fa-circle-o"></i> <?php echo $sm->submenu_name ?></a> </li>
								<?php } ?>
							</ul>
						 </li>
					  <?php }} ?>
				<li class="nav-small-cap">
					SETTING &amp; WIDGETS
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
			</ul>
		</nav>
		<!-- End Sidebar navigation -->
	</div>
	<!-- End Sidebar scroll-->
</aside>
