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
    <!-- / HEADER -->

    <!-- Main content -->
	<div class="page-content p-6">
        <div class="content container">
            <div class="row">
				<div class="col-12">
                    <div class="example">
						<div class="description">
                            <div class="description-text">
                                <h5>Data File</h5>
                            </div>
                        </div>
						<div class="source-preview-wrapper">
                            <div class="preview">
                                <div class="preview-elements">
								<?php echo form_open_multipart($action) ?>
								<?php echo validation_errors() ?>
								<div class="container">
									<div class="form-group">
										<?php echo form_input($file_judul) ?>
										<label for="name" class="col-form-label">Judul File</label>
									</div>
									<div class="form-group">
										<?php echo form_input($file_deskripsi) ?>
										<label for="address" class="col-form-label">Deskripsi File</label>
									</div>
									<div class="form-group">
										<div class="custom-file">
											<input type="file" class="custom-file-input" name="file_data" id="file_data">
											<label class="custom-file-label" for="file_data">File</label>
											<small id="file_dataHelpBlock" class="form-text text-muted">Ukuran file tidak boleh lebih dari 2MB</small>
										</div>
									</div>
									<div class="form-group">
										<button type="submit" name="button" class="btn btn-success"><i class="fa fa-save"></i> <?php echo $btn_submit ?></button>
										<button type="reset" name="button" class="btn btn-danger"><i class="fa fa-refresh"></i> <?php echo $btn_reset ?></button>
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php $this->load->view('back/template/footer'); ?>
<div class="quick-panel-sidebar custom-scrollbar" fuse-cloak data-fuse-bar="quick-panel-sidebar" data-fuse-bar-position="right">
                 <?php $this->load->view('back/template/quickpanel'); ?>
    </div>

        </div>
    </main>
</body>
</html>
