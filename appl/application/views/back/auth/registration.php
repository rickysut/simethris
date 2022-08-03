<!DOCTYPE html>
<html>
<head>
  <title><?php echo $page_title.' | '.$company_data->company_name ?></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<!--     Fonts and icons     -->
    <link href="<?php echo base_url('assets/plugins/font-awesome/') ?>css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/daftar/') ?>css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url('assets/daftar/') ?>css/gsdk-bootstrap-wizard.css" rel="stylesheet" />

  <!-- Favicon -->
  <style>
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
  <link rel="shortcut icon" href="<?php echo base_url('assets/images/company/'.$company_data->company_photo_thumb) ?>" />
</head>
<body>
<div class="image-container set-full-height" style="background-image: url('<?php echo base_url('assets/daftar/') ?>img/wizard.jpg')">
    <!--   Big container   -->
    <div class="container">
		
        <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
			
            <!--      Wizard container        -->
            <div class="wizard-container">

                <div class="card wizard-card" data-color="green" id="wizardProfile">
                    <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
					<?php echo form_open_multipart($action) ?>
					<?php echo validation_errors() ?>
                <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->

                    	<div class="wizard-header">
                        	<h3>
                        	   <b>REGISTRASI</b> simeTHRIS <br>
                        	   <small>Informasi ini akan memberi tahu kami lebih banyak tentang Anda</small>
                        	</h3>
                    	</div>

						<div class="wizard-navigation">
							<ul>
								<li><a href="#siap" data-toggle="tab">Persiapan</a></li>
	                            <li><a href="#about" data-toggle="tab">Data L.O</a></li>
	                            <li><a href="#account" data-toggle="tab">Upload Persyaratan</a></li>
	                            <li><a href="#dataperusahaan" data-toggle="tab">Data Perusahaan</a></li>
	                        </ul>

						</div>

                        <div class="tab-content">
							<div class="tab-pane" id="siap">
                              <div class="row">
                                  <div class="col-sm-10 col-sm-offset-1">
                                     <div class="box box-default">
										<div class="box-body">
										  <div class="alert alert-info alert-dismissible">
											<h4><i class="icon fa fa-ban"></i> Data Pribadi Dan Data Perusahaan!</h4>
											<p style="text-align:justify">Pastikan Data yang anda berikan adalah benar. Selanjutnya untuk informasi lainnya, Kami akan menghubungi Anda melalui data yang diberikan</p>
										  </div>
										</div>
										<!-- /.box-body -->
									  </div>
                                  </div>
								  <div class="col-sm-10 col-sm-offset-1">
									<div class="box box-default">
										<div class="box-body">
										  <div class="alert alert-info alert-dismissible">
											<h4><i class="icon fa fa-info"></i> Berkas!</h4>
											<p style="text-align:justify">Siapkan berkas atau data Perusahaan (Scan/photo Pengguna, Scan KTP Pengguna, Surat Tugas Pengguna dan Logo Perusahaan) sebagai syarat mendaftar di Situs ini.</p>
										  </div>
										</div>
										<!-- /.box-body -->
									  </div>
								  </div>
                              </div>
                            </div>
                            <div class="tab-pane" id="about">
                              <div class="row">
                                  <div class="col-sm-4 col-sm-offset-1">
                                     <div class="picture-container">
                                          <div class="picture">
                                              <img src="<?php echo base_url('assets/daftar/') ?>img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
                                              <input type="file" name="photo" id="photo" class="form-control">
                                          </div>
                                          <h6>Choose Picture</h6>
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>Nama Lengkap <small>(required)</small></label>
                                        <?php echo form_input($name) ?>
                                      </div>
                                      <div class="form-group">
                                        <label>No Handphone <small>(required)</small></label>
                                        <?php echo form_input($phone) ?>
                                      </div>
                                  </div>
								  </div>
								   <div class="row">
                                  <div class="col-sm-5 col-sm-offset-1">
                                      <div class="form-group">
                                          <label>Email <small>(required)</small></label>
                                          <?php echo form_input($email) ?>
                                      </div>
                                  </div>
								  <div class="col-sm-5">
                                      <div class="form-group">
                                          <label>Username <small>(required)</small></label>
                                           <?php echo form_input($username) ?>
                                      </div>
                                  </div>
								  </div>
								   <div class="row">
                                  <div class="col-sm-5 col-sm-offset-1">
                                      <div class="form-group">
                                          <label>Password <small>(required)</small></label>
											<div class="input-container">
											  <?php echo form_password($password) ?>
											  <i class="fa fa-eye" id="togglePassword"></i>
											</div>
                                          
                                      </div>
                                  </div>
								  <div class="col-sm-5">
                                      <div class="form-group">
                                          <label>Konfirmasi Password <small>(required)</small></label>
										  <div class="input-container">
                                          <?php echo form_password($password_confirm) ?>
											  <i class="fa fa-eye" id="togglePassword2"></i>
										  </div>
                                      </div>
                                  </div>
								  </div>
								   <div class="row">
								  <div class="col-sm-10 col-sm-offset-1">
                                      <div class="form-group">
                                          <label>Alamat <small>(required)</small></label>
                                          <?php echo form_input($address) ?>
                                      </div>
                                  </div>
                              </div>
                            </div>
                            <div class="tab-pane" id="account">
                                <h4 class="info-text"> Silahkan Upload Scan KTP, Surat Tugas dan Logo Perusahaan 
								<br>Ukuran File Max 2MB, Type File jpeg, jpg, dan png</h4><br>
                                <div class="row">

                                    <div class="col-sm-10 col-sm-offset-1">
                                        <div class="col-sm-4">
                                            <div class="picture-container">
											  <div class="picture">
												  <img src="<?php echo base_url('assets/daftar/') ?>img/default-avatar.png" class="picture-src" id="wizardPicturePreview2" title=""/>
												  <input type="file" name="file_ktp" id="file_ktp" class="form-control" />
											  </div>
											  <h6>KTP L.O</h6>
											</div>
                                        </div>
										
                                        <div class="col-sm-4">
											<div class="picture-container">
											  <div class="picture">
												  <img src="<?php echo base_url('assets/daftar/') ?>img/image_placeholder.jpg" class="picture-src" id="wizardPicturePreview3" title=""/>
												  <input type="file" name="file_sk" id="file_sk" class="form-control" />
											  </div>
											  <h6>Surat Tugas</h6>
											</div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="picture-container">
											  <div class="picture">
												  <img src="<?php echo base_url('assets/daftar/') ?>img/default-avatar.png" class="picture-src" id="wizardPicturePreview4" title=""/>
												  <input type="file" name="logo_perusahaan" id="logo_perusahaan" class="form-control" />
											  </div>
											  <h6>Logo Perusahaan</h6>
											</div>
                                        </div>
                                    </div>

                                </div>
								<br><br>
                            </div>
                            <div class="tab-pane" id="dataperusahaan">
                                <div class="row">
              
                                    <div class="col-sm-5 col-sm-offset-1">
                                         <div class="form-group">
                                            <label>Nama Perusahaan</label>
                                            <?php echo form_input($nama_perusahaan) ?>
                                          </div>
                                    </div>
									<div class="col-sm-5">
                                         <div class="form-group">
                                            <label>Direktur Perusahaan</label>
                                             <?php echo form_input($direktur_perusahaan) ?>
                                          </div>
                                    </div>
                                    <div class="col-sm-5 col-sm-offset-1">
                                         <div class="form-group">
                                            <label>Provinsi</label>
                                            <?php echo form_dropdown('', $get_all_combobox_provinsi, '', $provinsi) ?>
                                          </div>
                                    </div>
                                    <div class="col-sm-5">
                                         <div class="form-group">
                                            <label>Kabupaten</label>
                                             <select name="kabupaten" class="form-control" id="kabupaten">
												<option value=''>Pilih Kabupaten</option>
											  </select>
                                          </div>
                                    </div>
									<div class="col-sm-5 col-sm-offset-1">
                                         <div class="form-group">
                                            <label>Kecamatan</label>
                                            <select name="kecamatan" class="form-control" id="kecamatan">
												<option>Select Kecamatan</option>
											  </select>
                                          </div>
                                    </div>
                                    <div class="col-sm-5">
                                         <div class="form-group">
                                            <label>Desa</label>
                                             <select name="desa" class="form-control" id="desa">
												<option>Select Desa</option>
											  </select>
                                          </div>
                                    </div>
									<div class="col-sm-10 col-sm-offset-1">
                                         <div class="form-group">
                                            <label>Alamat</label>
                                            <?php echo form_input($alamat) ?>
                                          </div>
                                    </div>
                                    <div class="col-sm-5 col-sm-offset-1">
                                         <div class="form-group">
                                            <label>Kode Pos</label>
                                            <?php echo form_input($kode_pos) ?>
                                          </div>
                                    </div>
									<div class="col-sm-5">
                                         <div class="form-group">
                                            <label>No Telp. Perusahaan</label>
                                            <?php echo form_input($phone_number) ?>
                                          </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wizard-footer height-wizard">
                            <div class="pull-right">
                                <input type='button' class='btn btn-next btn-fill btn-success btn-wd btn-sm' name='next' value='Next' />
                                <input type='submit' class='btn btn-finish btn-fill btn-success btn-wd btn-sm' name='finish' value='Finish' <?php echo $btn_submit ?> />

                            </div>

                            <div class="pull-left">
                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Previous' />
                            </div>
                            <div class="clearfix"></div>
                        </div>

					<?php echo form_close() ?>
                </div>
            </div> <!-- wizard container -->
			
        </div>
        </div><!-- end row -->
    </div> <!--  big container -->

    <div class="footer">
        <div class="container">
             Made with <i class="fa fa-heart heart"></i> by <a href="http://www.anuwani.online">Creative Tim simeTHRIS</a>. Back To Login <a href="<?php echo base_url('auth/login') ?>"> Click here.</a>
        </div>
    </div>

</div>

</body>
	<!--   Core JS Files   -->
	<script src="<?php echo base_url('assets/daftar/') ?>js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/daftar/') ?>js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/daftar/') ?>js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/daftar/') ?>js/gsdk-bootstrap-wizard.js"></script>
	<script src="<?php echo base_url('assets/daftar/') ?>js/jquery.validate.min.js"></script>
 <script>
        $(document).ready(function(){
            $("#provinsi").change(function (){
				var myuri = $(this).val().split('|');
				var iduri = myuri[0];
                var url = "<?php echo site_url('wilayah/add_ajax_kab');?>/"+iduri;
                $('#kabupaten').load(url);
                return false;
            })
			
			$("#kabupaten").change(function (){
				var myuri = $(this).val().split('|');
				var iduri = myuri[0];
                var url = "<?php echo site_url('wilayah/add_ajax_kec');?>/"+iduri;
                $('#kecamatan').load(url);
                return false;
            })
			
			$("#kecamatan").change(function (){
                var url = "<?php echo site_url('wilayah/add_ajax_des');?>/"+$(this).val();
                $('#desa').load(url);
                return false;
            })
        });
    </script>
   <script>
   
	const togglePassword = document.querySelector('#togglePassword');
	const password = document.querySelector('#password');
	
	const togglePassword2 = document.querySelector('#togglePassword2');
	const password_confirm = document.querySelector('#password_confirm');

	togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
	});

	togglePassword2.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password_confirm.getAttribute('type') === 'password' ? 'text' : 'password';
    password_confirm.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
	});
   </script>
</body>
</html>
