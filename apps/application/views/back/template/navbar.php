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
