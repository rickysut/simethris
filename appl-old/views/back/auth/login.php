<!DOCTYPE html>
<html lang="en-us">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>assets/favicon.ico" />

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700italic,700,900,900italic" rel="stylesheet">
	
	<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>font-awesome/css/font-awesome.min.css">
    <!-- STYLESHEETS -->
    <style type="text/css">
            [fuse-cloak],
            .fuse-cloak {
                display: none !important;
            }
			.imgkuresponsive {
		width: 100%;
		height: auto;
		}
		.input-container {
		  width: 100%;
		  display: flex;
		  align-items: center;
		  border: 1px solid #aaa;
		  border-radius: 3px;
		}
		.input-container input {
		  padding: 10px;
		  width: 100%;
		  font-size: 14px;
		  border: 0;
		  outline: none;
		  color: #333;
		}
		i {
		  margin: 0 10px;
		  color: #aaa;
		  cursor: default;
		}
        </style>

    <!-- Icons.css -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/icons/fuse-icon-font/style.css">
    <!-- Animate.css -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/node_modules/animate.css/animate.min.css">
    <!-- Perfect Scrollbar -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/node_modules/perfect-scrollbar/css/perfect-scrollbar.css" />
    <!-- Fuse Html -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/fuse-html/fuse-html.min.css" />
    <!-- Main CSS -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/toastr.min.css">

    <!-- / STYLESHEETS -->

    <!-- JAVASCRIPT -->
    <!-- jQuery -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/jquery/dist/jquery.min.js"></script>
    <!-- Mobile Detect -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/mobile-detect/mobile-detect.min.js"></script>
    <!-- Perfect Scrollbar -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
    <!-- Popper.js -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/popper.js/dist/umd/popper.min.js"></script>
    <!-- Bootstrap -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script> 
    <!-- Fuse Html -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/fuse-html/fuse-html.min.js"></script>
    <!-- Main JS -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/main.js"></script>
	
	<script src="<?php echo base_url() ?>assets/js/toastr.min.js"></script>
    <!-- / JAVASCRIPT -->
</head>

<body class="layout layout-vertical layout-left-navigation layout-below-toolbar layout-below-footer">
    <main>
        <div id="wrapper">
            <div class="content-wrapper">
                <div class="content custom-scrollbar">

                    <div id="login" class="p-8">

                        <div class="form-wrapper md-elevation-8 p-8">

                            <!--<div class="logo bg-secondary">
                                <span>S</span>
                            </div> -->
							<div class="title mt-4 mb-8">
                                <span><img src="<?php echo base_url('assets') ?>/images/logosimethris.png" alt="Simethris" class="img-fluid"></span>
                            </div>
							<div class="title mt-4 mb-8">Log in to your account</div>
							<?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
							<?php echo validation_errors() ?>
							<?php echo form_open($action) ?>
                            <form name="loginForm" novalidate>

                                <div class="input-group has-feedback mb-4">
                                    <!-- <input type="email" class="form-control" id="loginFormInputEmail" aria-describedby="emailHelp" placeholder=" " /> -->
                                    
									<?php echo form_input($username) ?>
                                </div>

                                <div class="input-group has-feedback mb-4">
                                    <!-- <input type="password" class="form-control" id="loginFormInputPassword" placeholder=" " /> 
                                    <label for="loginFormInputPassword">Password</label> -->
										
											  <?php echo form_password($password) ?>
										<div class="input-group-append">
											  <i class="fa fa-eye" id="togglePassword"></i>
										</div>
								</div>

                                <div class="remember-forgot-password row no-gutters align-items-center justify-content-between pt-4">

                                    <a href="<?php echo base_url('auth/forgot_password') ?>" class="forgot-password text-secondary mb-4">Lupa Password?</a>
                                </div>
                                <button type="submit" class="submit-button btn btn-block btn-secondary my-4 mx-auto" aria-label="LOG IN">
                                    LOG IN
                                </button>
                            </form>
                            <div class="separator">
                                <span class="text">ATAU</span>
                            </div>
                            <div class="register d-flex flex-column flex-sm-row align-items-center justify-content-center mt-8 mb-6 mx-auto">
                                <span class="text mr-sm-2">Tidak Mempunyai Akun?</span>
                                <a class="link text-secondary" href="<?php echo base_url('auth/registration') ?>">Daftar Akun Sekarang</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>
</body>
<script>
   
	const togglePassword = document.querySelector('#togglePassword');
	const password = document.querySelector('#password');
	
	togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
	});

   </script>
</html>
