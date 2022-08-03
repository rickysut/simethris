</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo base_url() ?>">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="<?php echo base_url('asset/') ?>images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         <!-- dark Logo text -->
                         <!-- Light Logo text
						 <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div> -->
						 </a>
						 
                        
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown mega-dropdown">
							<img src="<?php echo base_url('assets') ?>/images/logosimethris.png" alt="Simethris" class="img-fluid" style="height: 40px;">
                        </li>
						
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== mdi-login-variant -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item m-t-3">
							<?php
								$ChatReceiver = $this->session->userdata('id_users');
								$jml_data_unverifikasi = $this->r_verifikasi->total_rows_unverif();
								$jml_chat_unread = $this->ChatModel->total_rows_unread($ChatReceiver);
							?>
							<a class="nav-link text-muted waves-effect waves-dark" data-toggle="tooltip" title="Anda memiliki <?php echo $jml_chat_unread ?> percakapan" href="<?php echo base_url('chat')?>">
								<i class="fa fa-comments-o" style="font-size: 24px"></i>
								<sup style="font-size: 10px">
									<span class="font-bold badge badge-warning status" id="total_unread_nav"><?php echo $jml_chat_unread ?></span>
								</sup>
							</a>
						</li>
						<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<div class="u-img">
									<img src="<?php echo $this->session->logo_perusahaan ?>" class="img-circle" alt="user" style="height: 40px;width:40px">
								</div>
								<div class="u-text">
									
								</div>
							</a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="small dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            
                                            <div class="u-text  d-flex align-items-center">
                                                <?php echo $this->session->name ?>
                                                <p class="text-muted"<?php echo $this->session->id_users ?>></p><a href="<?php echo base_url('auth/update_profile/'.$this->session->id_users) ?>" class="bagde btn btn-danger btn-sm">View</a>
											</div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="<?php echo base_url('auth/update_profile/'.$this->session->id_users) ?>"><i class="ti-user"></i> Update Profile</a></li>
                                    <li><a href="<?php echo base_url('auth/change_password') ?>"><i class="ti-wallet"></i> Change Password</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="<?php echo base_url('auth/logout') ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>