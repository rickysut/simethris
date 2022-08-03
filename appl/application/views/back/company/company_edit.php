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
        <h1 class="doc-title h4" id="content"><?php echo $page_title ?></h1><?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>

    </div>

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
										<?php echo form_input($company_name, $company->company_name, $company_name) ?>
										<label for="company_name" class="col-form-label">Nama Perusahaan</label>
									</div>
									<div class="form-group">
										<?php echo form_textarea($company_desc, $company->company_desc, $company_desc) ?>
										<label for="company_desc" class="col-form-label">Deskripsi Singkat</label>
									</div>
									<div class="form-group">
										<?php echo form_textarea($company_address, $company->company_address, $company_address) ?>
										<label for="company_address" class="col-form-label">Alamat</label>
									</div>
									<div class="form-group">
										<?php echo form_textarea($company_maps, $company->company_maps, $company_maps) ?>
										<label for="company_maps" class="col-form-label">Maps</label>
										<br>
										<p><?php echo $company->company_maps ?></p>
									</div>
									<div class="form-row">
										<div class="form-group col-md-4">
											<?php echo form_input($company_phone, $company->company_phone, $company_phone) ?>
											<label for="company_phone" class="col-form-label">Phone</label>
										</div>
										<div class="form-group col-md-4">
											<?php echo form_input($company_phone2, $company->company_phone2, $company_phone2) ?>
											<label for="company_phone2" class="col-form-label">Phone 2</label>
										</div>
										<div class="form-group col-md-4">
											<?php echo form_input($company_fax, $company->company_fax, $company_fax) ?>
											<label for="company_fax" class="col-form-label">Fax</label>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-4">
											<?php echo form_input($company_email, $company->company_email, $company_email) ?>
											<label for="company_email" class="col-form-label">Email</label>
										</div>
										<div class="form-group col-md-4">
											<?php echo form_input($company_gmail, $company->company_gmail, $company_gmail) ?>
											<label for="company_gmail" class="col-form-label">Gmail</label>
										</div>
										<div class="form-group col-md-4">
											<?php echo form_password($new_company_gmail_pass, '', $new_company_gmail_pass) ?>
											<label for="company_fax" class="col-form-label">GMail Password</label>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-2">
											<label class="img" for="img">Logo Sekarang</label><span>
											<img src="<?php echo base_url('assets/images/company/'.$company->company_photo_thumb) ?>" alt="current photo"></span>
										</div>
										<div class="form-group col-md-6">
											<div class="custom-file">
												<input type="file" class="custom-file-input" name="photo" id="photo" onchange="photoPreview(this,'preview')">
												<label class="custom-file-label" for="photo">Logo</label>
												<small id="PhotoHelpBlock" class="form-text text-muted">ukuran file tidak boleh lebih dari 2MB</small>
											</div>
										</div>
										
										<div class="form-group col-md-2">
											<img id="preview" width="175px"/>
										</div>
									</div>
									<?php echo form_input($id_company, $company->id_company) ?>
									<div class="form-row">
										<button type="submit" name="button" class="btn btn-success"><i class="icon-content-save"></i> <?php echo $btn_submit ?></button>
										<button type="reset" name="button" class="btn btn-danger"><i class="icon-backup-restore"></i> <?php echo $btn_reset ?></button>
									</div>
								</div>
								<?php echo form_close() ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
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
