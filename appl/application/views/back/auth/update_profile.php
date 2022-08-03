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
	<div class="page-content p-3">
        <div class="content container">
            <div class="row">
				<div class="col-12">
                    <div class="card">
						<div class="card-header">
							<div class="description">
								<div class="description-text">
									<h5>DATA L.O</h5>
								</div>
							</div>
						</div>
						<div class="card-body">
								<?php echo form_open_multipart($action) ?>
								<?php echo validation_errors() ?>
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
										<div class="form-group col-md-4"><label>Current ktp</label>
											<?php if(pathinfo(base_url('uploads/file_ktp/'.$user->file_ktp), PATHINFO_EXTENSION)=='pdf'){
												$pregmb3 = '<img src="'.base_url('/assets/images/pdf_thumb.png').'" height="150" onClick="ViewAttachmentPdf('."'".base_url('uploads/file_ktp/'.$user->file_ktp)."'".','."'".pathinfo(base_url('uploads/file_ktp/'.$user->file_ktp),PATHINFO_FILENAME)."'".');" alt="current KTP">';
											}else if(pathinfo(base_url('uploads/file_ktp/'.$user->file_ktp), PATHINFO_EXTENSION)=='docx'){
												$pregmb3 = '<img src="'.base_url('/assets/images/docx_thumb.png').'" height="150" alt="current KTP">';
											}else if(pathinfo(base_url('uploads/file_ktp/'.$user->file_ktp), PATHINFO_EXTENSION)=='xlsx'){
												$pregmb3 = '<img src="'.base_url('/assets/images/excel_thumb.png').'" height="150" alt="current KTP">';
											}else{
												$pregmb3 = '<img src="'.base_url('uploads/file_ktp/'.$user->file_ktp).'" height="150" alt="current KTP">';
											}
											?>
											<div class="form-row">
												<?php echo $pregmb3 ?>
											</div>
											<div class="form-row">
												<input type="file" name="file_ktp" id="file_ktp" class="form-control" onchange="ktpPreview(this,'kpreview')"/>
												<p class="help-block">Hasil Pindai KTP Asli </p>
											</div>
											<div class="form-row"><label>Preview</label>
												<img id="kpreview" width="100%"/>
											</div>
										</div>
										<div class="form-group col-md-4"><label>Current Surat Tugas</label>
											<?php if(pathinfo(base_url('uploads/file_sk/'.$user->file_sk), PATHINFO_EXTENSION)=='pdf'){
												$pregmb2 = '<img src="'.base_url('/assets/images/pdf_thumb.png').'" height="150" onClick="ViewAttachmentPdf('."'".base_url('uploads/file_sk/'.$user->file_sk)."'".','."'".pathinfo(base_url('uploads/file_sk/'.$user->file_sk),PATHINFO_FILENAME)."'".');" alt="current SK">';
											}else if(pathinfo(base_url('uploads/file_sk/'.$user->file_sk), PATHINFO_EXTENSION)=='docx'){
												$pregmb2 = '<img src="'.base_url('/assets/images/docx_thumb.png').'" height="150" alt="current SK">';
											}else if(pathinfo(base_url('uploads/file_sk/'.$user->file_sk), PATHINFO_EXTENSION)=='xlsx'){
												$pregmb2 = '<img src="'.base_url('/assets/images/excel_thumb.png').'" height="150" alt="current SK">';
											}else{
												$pregmb2 = '<img src="'.base_url('uploads/file_sk/'.$user->file_sk).'" height="150" alt="current SK">';
											}
											?>
											<div class="form-row">
												<?php echo $pregmb2 ?>
											</div>
											<div class="form-row">
												<input type="file" name="file_sk" id="file_sk" class="form-control" onchange="skPreview(this,'spreview')"/>
												<p class="help-block">Hasil Pindai Surat Tugas / Surat Kuasa</p>
											</div>
											<div class="form-row"><label>Preview</label>
											  <img id="spreview" width="100%"/>
											</div>
										</div>
										<div class="form-group col-md-4"><label>Current Photo</label>
											<div class="form-row">
												<img height="150" src="<?php echo base_url('uploads/user/'.$user->photo) ?>" onClick="ViewAttachmentImage('<?php echo base_url('uploads/user/'.$user->photo) ?>','<?php echo pathinfo(base_url('uploads/user/'.$user->photo),PATHINFO_FILENAME) ?>')" alt="current Photo">
											</div>
											<div class="form-row">
												<input type="file" name="photo" id="photo" class="form-control" onchange="photoPreview(this,'ppreview')"/>
											  <p class="help-block">Maximum file size is 2Mb</p>
											</div>
											<div class="form-row"><label>Preview</label>
											  <img id="ppreview" width="100%"/>
											</div>
										</div>
									</div>
						</div>
						<div class="card-footer">
							<div class="form-row">
								<button type="submit" name="button" class="btn btn-success"><i class="icon-content-save"></i> <?php echo $btn_submit ?></button>
								<button type="reset" name="button" class="btn btn-danger"><i class="icon-backup-restore"></i> <?php echo $btn_reset ?></button>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<div class="description">
								<div class="description-text">
									<h5>DATA AutentifikasiL.O</h5>
								</div>
							</div>
						</div>
						<div class="card-body">
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
							<?php echo form_input($id_users, $user->id_users) ?>
						</div>
						<div class="card-footer">
							<div class="form-row">
								<button type="submit" name="button" class="btn btn-success"><i class="icon-content-save"></i> <?php echo $btn_submit ?></button>
								<button type="reset" name="button" class="btn btn-danger"><i class="icon-backup-restore"></i> <?php echo $btn_reset ?></button>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<div class="description">
								<div class="description-text">
									<h5>DATA PERUSAHAAN</h5>
								</div>
							</div>
						</div>
						<div class="card-body">
							<div class="form-row">
								<div class="form-group col-md-12">
									<?php echo form_input($nama_perusahaan, $user->nama_perusahaan) ?>
									<label for="nama_perusahaan" class="col-form-label">Nama Perusahaan</label>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<?php echo form_dropdown('', $get_all_combobox_provinsi, $user->provinsi, $provinsi) ?>
									<label for="name" class="col-form-label">Provinsi</label>
								</div>
								<div class="form-group col-md-6">
								<?php $query = $this->db->get_where('wilayah_kabupaten',array('id'=>$user->kabupaten));
									foreach ($query->result() as $value) {
											$datakab = $value->nama;
										}
									?>
									<select name="kabupaten" class="form-control" id="kabupaten" onchange="setpetakota(this.options[this.selectedIndex].value)">
										<option value='<?php echo $user->kabupaten ?>'><?php echo $datakab ?></option>
									</select>
									<label for="name" class="col-form-label">Kabupaten</label>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
								    <?php $query = $this->db->get_where('wilayah_kecamatan',array('id'=>$user->kecamatan));
									foreach ($query->result() as $value) {
											$datakec = $value->nama;
										}
									?>
									<select name="kecamatan" class="form-control" id="kecamatan">
										<option value='<?php echo $user->kecamatan ?>'><?php echo $datakec ?></option>
									</select>
									<label for="name" class="col-form-label">Kecamatan</label>
								</div>
								<div class="form-group col-md-6">
									<?php $query = $this->db->get_where('wilayah_desa',array('id'=>$user->desa));
									foreach ($query->result() as $value) {
											$datadesa = $value->nama;
										}
									?>
									<select name="desa" class="form-control" id="desa">
										<option value='<?php echo $user->desa ?>'><?php echo $datadesa ?></option>
									</select>
									<label for="name" class="col-form-label">Desa</label>
								</div>
							</div>
							<div class="form-row">
									<div class="form-group col-md-12">
										<?php echo form_textarea($alamat, $user->alamat) ?>
										<label for="address" class="col-form-label">Alamat</label>
									</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<?php echo form_input($phone_number, $user->phone_number) ?>
									<label for="phone_number" class="col-form-label">Nomor Telephone</label>
								</div>
								<div class="form-group col-md-6">
									<?php echo form_input($kode_pos, $user->kode_pos) ?>
									<label for="kode_pos" class="col-form-label">Kode Pos</label>
								</div>
							</div>
							<div class="form-group col-md-4"><label>Current Logo</label>
								<div class="form-row">
									<img height="150" src="<?php echo base_url('uploads/company/'.$user->logo_perusahaan) ?>" onClick="ViewAttachmentImage('<?php echo base_url('uploads/company/'.$user->logo_perusahaan) ?>','<?php echo pathinfo(base_url('uploads/company/'.$user->logo_perusahaan),PATHINFO_FILENAME) ?>')" alt="current Logo">
									
								</div>
								<div class="form-row">
									<input type="file" name="logo_perusahaan" id="logo_perusahaan" class="form-control" onchange="photoPreview(this,'lpreview')"/>
									<p class="help-block">Maximum file size is 2Mb</p>
								</div>
								<div class="form-row"><label>Preview</label>
									<img id="lpreview" width="100%"/>
								</div>
							</div>
							
						</div>
						<div class="card-footer">
							<div class="form-row">
								<button type="submit" name="button" class="btn btn-success"><i class="icon-content-save"></i> <?php echo $btn_submit ?></button>
								<button type="reset" name="button" class="btn btn-danger"><i class="icon-backup-restore"></i> <?php echo $btn_reset ?></button>
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
	function ViewAttachmentImage(image_url,imageTitle){
	$('#modelTitle').html(imageTitle); 
	$('#modalImgs').attr('src',image_url);
	$('#myModalImg').modal('show');
	}
	function ViewAttachmentPdf(pdf_url,pdfTitle){
	$('#modelTitle').html(pdfTitle); 
	$('#modalPdf').attr('src',pdf_url);
	$('#myModalPdf').modal('show');
	}
  </script>

	<div class="quick-panel-sidebar custom-scrollbar" fuse-cloak data-fuse-bar="quick-panel-sidebar" data-fuse-bar-position="right">
                 <?php $this->load->view('back/template/quickpanel'); ?>
    </div>

        </div>
		
<!-- Modal -->
  <div class="modal fade" id="myModalImg">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" id="modelTitle">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <img id="modalImgs" src="uploads/attachment/21_preview.png" width="100%" height="400px" class="img-thumbnail" alt="Cinque Terre">
        </div>
        
        <!-- Modal footer -->
         
        
      </div>
    </div>
  </div>
  <div class="modal fade" id="myModalPdf">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" id="modelTitle">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
		  <embed id="modalPdf" src="file:///C:/Users/hp/Downloads/sb_finance.pdf" frameborder="0" width="100%" height="400px">
        </div>
        
        <!-- Modal footer -->
         
        
      </div>
    </div>
  </div>
  
    </main>
</body>
</html>

