<?php $this->load->view('back/template/meta'); ?>
  <?php $this->load->view('back/template/sidebar'); ?>
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

    <!-- Main content -->
	<div class="page-content p-6">
        <div class="content container">
            <div class="row">
				<div class="col-12">
					<div class="example">
						<div class="description">
                            <div class="description-text">
                                <h5>Data Personal</h5><?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
                            </div>
                        </div>
						
						<div class="source-preview-wrapper">
                            <div class="preview">
                                <div class="preview-elements">
								<?php echo form_open_multipart($action) ?>
								<?php echo validation_errors() ?>
								<div class="container">
									<div class="form-group">
										<?php echo form_input($name, $user->name, $user->name) ?>
										<label for="name" class="col-form-label">Nama Lengkap</label>
									</div>
									<div class="form-group">
										<?php echo form_textarea($address, $user->address) ?>
										<label for="address" class="col-form-label">Alamat</label>
									</div>
									<div class="form-group">
										<?php echo form_input($phone, $user->phone) ?>
										<label for="phone" class="col-form-label">Phone</label>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<div class="custom-file">
												<input type="file" class="custom-file-input" name="photo" id="photo" onchange="photoPreview(this,'preview')">
												<label class="custom-file-label" for="photo">Photo</label>
												<small id="PhotoHelpBlock" class="form-text text-muted">photo close up, ukuran file tidak boleh lebih dari 2MB</small>
											</div>
										</div>
										<div class="form-group col-md-6">
											<label class="img" for="img">Photo Sekarang</label><span>
											<img src="<?php echo base_url('assets/images/user/'.$user->photo) ?>" width="175px" alt="current photo"></span>
										</div>
										<div class="form-group col-md-6">
											<img id="preview" width="175px"/>
										</div>
									</div>
									<div class="form-row">
										<button type="submit" name="button" class="btn btn-success"><i class="icon-content-save"></i> <?php echo $btn_submit ?></button>
										<button type="reset" name="button" class="btn btn-danger"><i class="icon-backup-restore"></i> <?php echo $btn_reset ?></button>
									</div>
								</div>
								</div>
						</div>
						</div>
					</div>
				</div>
				
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
									<div class="container">
										<div class="form-row">
											<div class="form-group col-md-6">
												<?php echo form_input($username, $user->username) ?>
												<label for="username" class="col-form-label">Username *</label>
											</div>
											<div class="form-group col-md-6">
												<?php echo form_input($email, $user->email) ?>
												<label for="email" class="col-form-label">Email *</label>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-md-4">
												<?php echo form_dropdown('', $get_all_combobox_usertype, $user->usertype, $usertype) ?>
												<small id="passwordHelpBlock" class="form-text text-muted">
				Silahkan pilih Type User yang sesuai.</small>
											</div>
											<div class="form-group col-md-4">
												<label for="email" class="col-form-label">Data Akses Sekarang</label>
												<p>
													<?php
													if($get_all_data_access_old == NULL)
													{
													  echo '<button class="btn btn-sm btn-danger">No Data</button>';
													}
													else
													{
													  foreach($get_all_data_access_old as $data_access)
													  {
														$string = chunk_split($data_access->data_access_name, 9, "</button> ");
														echo '<button class="btn btn-sm btn-success">'.$string;
													  }
													}
													?>
												  </p>
											</div>
											<div class="form-group col-md-4">
												<?php echo form_dropdown('', $get_all_combobox_data_access, '', $data_access_id) ?>
												<small id="passwordHelpBlock" class="form-text text-muted">
				Silahkan pilih hak akses data.</small>
											</div>
										</div>
										<?php echo form_input($id_users, $user->id_users) ?>
										<div class="form-row">
											<button type="submit" name="button" class="btn btn-success"><i class="icon-content-save"></i> <?php echo $btn_submit ?></button>
											<button type="reset" name="button" class="btn btn-danger"><i class="icon-backup-restore"></i> <?php echo $btn_reset ?></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php echo form_close() ?>
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
