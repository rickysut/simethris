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
	 <a href="<?php echo base_url() ?>"><img src="<?php echo base_url('assets') ?>/images/logosimethris.png" alt="Simethris" class="imgresponsive" width="360"></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body" align="center">
      <p class="login-box-msg">Terima Kasih Sudah Bergabung Dengan simeTHRIS</p>
        <div class="row">
          <div class="alert alert-info alert-dismissible" align="center">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-ban"></i> DEKLARASI PENGGUNA</h4>
								<P>Saya menyatakan bahwa seluruh data yang tertuang dalam permohonan registrasi ini adalah benar dan merupakan tanggungjawab pemohon.</p>
							  </div>
        </div>
   
	  <div class="d-flex">
		
			<div align="center" class="px-4">Terima kasih telah bergabung di situs ini. Akun Anda akan aktif setelah kami berhasil melakukan verifikasi data yang Anda berikan pada saat pendaftaran. Sebuah e-mail konfirmasi akan dikirimkan selambat-lambatnya 14 (empat belas) hari kerja sejak Pengajuan Pendaftaran Akun Anda dibuat.</div>
			
	  </div>
	  <div class="row">
		 <form>
		 <div class="col-lg-12">
         <button type="submit" class="btn btn-primary btn-block btn-flat" formaction="<?php echo base_url() ?>">Lanjut</button>
		 </div>
        </form>
          <!-- /.col -->
        </div>

    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

</body>
</html>
