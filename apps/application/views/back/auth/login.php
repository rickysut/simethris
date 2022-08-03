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
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/back/') ?>dist/css/AdminLTE.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- Favicon -->
  <link rel="shortcut icon" href="<?php echo base_url('assets/images/company/'.$company_data->company_photo_thumb) ?>" />
  <style>
		.imgkuresponsive {
		width: 100%;
		height: auto;
		}
	</style>
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
	 <a href="<?php echo base_url() ?>"><img src="<?php echo base_url('assets') ?>/images/logosimethris.png" alt="Simethris" class="img-fluid" width="300"></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
      <?php echo validation_errors() ?>
      <?php echo form_open($action) ?>
        <div class="form-group has-feedback">
          <?php echo form_input($username) ?>
          <span class="fa fa-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <?php echo form_password($password) ?>
          <span class="fa fa-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="row">
          <div class="col-lg-12">
            <a href="<?php echo base_url('auth/forgot_password') ?>">I forgot my password</a> 
          </div>
	  </div>
	  <div class="d-flex">
		
			<div align="center" class="px-4">OR</div>
			
	  </div>
	  <div class="row">
		 <form>
		 <div class="col-lg-12">
         <button type="submit" class="btn btn-primary btn-block btn-flat" formaction="<?php echo base_url('auth/registration') ?>">Create New Account</button>
		 </div>
        </form>
          <!-- /.col -->
        </div>

    </div>
<div class="row">
		 <div class="col-lg-12">
               <br><p style="text-align:center"><a href="https://simethris.hortikultura.pertanian.go.id"><i class="fa fa-home"></i> Website simeTHRIS</a></p><br>
		 </div>
          <!-- /.col -->
        </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

</body>
</html>
