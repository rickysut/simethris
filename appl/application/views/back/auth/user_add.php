<?php $this->load->view('back/template/meta'); ?>
  <?php $this->load->view('back/template/sidebar'); ?>

  <style>
  	.custom-file>input {
    	display: none;
	}
  </style>
  <div class="content-wrapper">
  <?php $this->load->view('back/template/navbar'); ?>
  <div class="content custom-scrollbar">
  
  <!-- Content Wrapper. Contains page content -->
  <div class="doc forms-doc page-layout simple full-width">
    <!-- Content Header (Page header) -->
	<!-- HEADER -->
    <div class="page-header bg-primary text-auto p-6 row no-gutters align-items-center justify-content-between">
        <h1 class="doc-title h4" id="content"><?php echo $page_title ?></h1>

    </div>
    <!-- / HEADER -->

    <!-- Main content -->
	<div class="page-content p-6">
        <div class="content container">
            <div class="row">
				<div class="col-12">
                    <div class="example">
						<div class="description">
                            <div class="description-text">
                                <h5>Data Personal</h5>
                            </div>
                        </div>
						<div class="source-preview-wrapper">
                            <div class="preview">
                                <div class="preview-elements">
								<?php echo form_open_multipart($action) ?>
								<?php echo validation_errors() ?>
								<div class="container">
									<div class="form-group">
										<?php echo form_input($name) ?>
										<label for="name" class="col-form-label">Nama Lengkap</label>
									</div>
									<div class="form-group">
										<?php echo form_textarea($address) ?>
										<label for="address" class="col-form-label">Alamat</label>
									</div>
									<div class="form-group">
										<?php echo form_input($phone) ?>
										<label for="phone" class="col-form-label">Phone</label>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<div >
												<img id="preview" class="rounded-circle" width="175px" height="175px" src="<?php echo base_url('assets') ?>/images/userblank.png" data-src="<?php echo base_url('assets') ?>/images/userblank.png" alt="img" style="cursor:pointer;"/>
												
											</div>
											<div class="custom-file" >
												<input type="file" id="photo" accept="image/*" onchange="photoPreview(this,'preview')">
												<label class="custom-file-label" for="photo">Ganti foto, max 2MB</label>
												<small id="PhotoHelpBlock" class="form-text text-muted"></small>
											</div>
											
											
										</div>
										
									</div>

									<!--button type="submit" name="button" class="btn btn-success"><i class="fa fa-save"></i> <?php echo $btn_submit ?></button>
									<button type="reset" name="button" class="btn btn-danger"><i class="fa fa-refresh"></i> <?php echo $btn_reset ?></button>
									
								</div>
							</div>
						</div>
						</div>
					</div>
				</div>
				< !-- Box 2 -- >
				<div class="col-12">
                    <div class="example">
						<div class="description">
                            <div class="description-text">
                                <h5>Autentifikasi</h5>
                            </div>
                        </div>
						<div class="source-preview-wrapper">
                            <div class="preview">
                                <div class="preview-elements">
									<div class="container"-->
										<div class="form-row">
											<div class="form-group col-md-6">
												<?php echo form_input($username) ?>
												<label for="username" class="col-form-label">Username *</label>
											</div>
											<div class="form-group col-md-6">
												<?php echo form_input($email) ?>
												<label for="email" class="col-form-label">Email *</label>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-md-6">
												<?php echo form_password($password) ?>
												<label for="password" class="col-form-label">Password *</label>
												<small id="passwordHelpBlock" class="form-text text-muted">
				Password anda harus terdiri dari 8-20 Karakter, Huruf dan angka, Jangan memasukan spasi, spesial karakter atau emoji
				</small>
											</div>
											<div class="form-group col-md-6">
												<?php echo form_password($password_confirm) ?>
												<label for="password_confirm" class="col-form-label">Konfirmasi Password</label>
												<small id="passwordHelpBlock" class="form-text text-muted">
				Konfirmasi password harus sama dengan password yang anda masukan pertama kali.</small>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-md-6">
												<?php echo form_dropdown('', $get_all_combobox_usertype, '', $usertype) ?>
												<small id="usertypeHelpBlock" class="form-text text-muted">
				Silahkan pilih Type User yang sesuai.</small>
											</div>
											<div class="form-group col-md-6">
												<?php echo form_dropdown('', $get_all_combobox_data_access, '', $data_access_id) ?>
												<small id="passwordHelpBlock" class="form-text text-muted">
				Silahkan pilih hak akses data.</small>
											</div>
										</div>
										
										
										<button type="submit" name="button" class="btn btn-success"><i class="fa fa-save"></i> <?php echo $btn_submit ?></button>
										<button type="reset" name="button" class="btn btn-danger"><i class="fa fa-refresh"></i> <?php echo $btn_reset ?></button>
									
									</div>
								</div>
							</div>
						</div>
						<?php echo form_close() ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<?php $this->load->view('back/template/footer'); ?>
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>select2/dist/css/select2-flat-theme.min.css">
  <script src="<?php echo base_url('assets/plugins/') ?>select2/dist/js/select2.full.min.js"></script>

  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <script src="<?php echo base_url('assets/plugins/') ?>bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

  <script type="text/javascript">
    $('#birthdate').datepicker({
      autoclose: true,
      zIndexOffset: 9999
    })

    $("#data_access_id").select2({
      placeholder: "- Please Choose Data Access -",
      theme: "flat"
    });

    function photoPreview(photo,idpreview)
    {
      var gb = photo.files;
      for (var i = 0; i < gb.length; i++)
      {
        var gbPreview = gb[i];
        var imageType = /image.*/;
        var preview=document.getElementById(idpreview);
        var reader = new FileReader();
        if (gbPreview.type.match(imageType))
        {
          //jika tipe data sesuai
          preview.file = gbPreview;
          reader.onload = (function(element)
          {
            return function(e)
            {
              element.src = e.target.result;
            };
          })(preview);
          //membaca data URL gambar
          reader.readAsDataURL(gbPreview);
        }
          else
          {
            //jika tipe data tidak sesuai
            alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
          }
      }
    }
  </script>


	<div class="quick-panel-sidebar custom-scrollbar" fuse-cloak data-fuse-bar="quick-panel-sidebar" data-fuse-bar-position="right">
                 <?php $this->load->view('back/template/quickpanel'); ?>
    </div>

        </div>
    </main>
</body>
</html>

