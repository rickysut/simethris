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
		<span><?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?></span>
    </div>
	<div class="page-content p-3">
		<?php echo form_open_multipart($action) ?>
		<?php echo validation_errors() ?>
        <div class="content container">
			<div class="row">
				<div class="col-12">
                    <div class="card">
						<div class="card-header">
							<div class="description">
								<div class="description-text">
									<h5>ISI PENGUMUMAN </h5>
								</div>
							</div>
						</div>
						
						<div class="card-body">
							<div class="form-row">
								<div class="form-group col-md-6">
									<?php echo form_input($judul) ?>
									<label for="no_poktan" class="col-form-label">Judul Pengumuman</label>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<?php echo form_textarea($pengumuman) ?>
									<label for="nama_poktan" class="col-form-label">Isi Pengumuman</label>
								</div>
							</div>
						</div>
						<div class="card-footer">
									<div class="btn-group" role="group" aria-label="Default button group">
										<button class="btn btn-primary" type="submit"><i class="icon-content-save"></i> <?php echo $btn_submit ?></button>
										<button onclick="location.href='<?php echo base_url('pengumuman'); ?>'" class="btn btn-primary" type="reset"><i class="icon-loop"></i> Batal -> Back To List</button>
									</div>
						</div>
					</div>
				</div>
			</div>
		</div>
      <?php echo form_close() ?>
	</div>
  </div>
  <?php $this->load->view('back/template/footer'); ?>
  <div class="quick-panel-sidebar custom-scrollbar" fuse-cloak data-fuse-bar="quick-panel-sidebar" data-fuse-bar-position="right">
       <?php $this->load->view('back/template/quickpanel'); ?>
  </div>
  <!-- Select2 -->
  <script src="<?php echo base_url('assets/plugins/') ?>ckeditor/ckeditor.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('pengumuman')
  })
</script>

</div>
<!-- ./wrapper -->

</body>
</html>
