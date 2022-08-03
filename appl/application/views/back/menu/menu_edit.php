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
	<div class="page-content p-6">
        <div class="content container">
            <div class="row">
				<div class="col-12">
                    <div class="example">
						<div class="description">
                            <div class="description-text">
                                <h5>Menu Utama</h5>
                            </div>
                        </div>
						<div class="source-preview-wrapper">
                            <div class="preview">
								<?php echo validation_errors() ?>
                                <div class="preview-elements">
								<?php echo form_open($action) ?>
								<div class="container">
									<div class="form-group">
										<?php echo form_input($menu_name, $menu->menu_name) ?>
										<label for="menu_name" class="col-form-label">Nama Menu *</label>
									</div>
									<div class="form-group">
										<?php echo form_input($menu_url, $menu->menu_url) ?>
										<label for="menu_url" class="col-form-label">URL *</label>
									</div>
									<div class="form-group">
										<?php echo form_input($menu_icon, $menu->menu_icon) ?>
										<label for="menu_icon" class="col-form-label">Icon</label>
									</div>
									<div class="form-group">
										<?php echo form_input($order_no, $menu->order_no) ?>
										<label for="name" class="col-form-label">Order No *</label>
									</div>
									<?php echo form_input($id_menu, $menu->id_menu) ?>
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
			<div class="row">
				<?php $this->load->view('back/menu/icon_list'); ?>
			</div>
		</div>
	</div>
  </div>
  <!-- /.content-wrapper -->
  </div>
   <?php $this->load->view('back/template/footer'); ?>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>datatables-bs/css/dataTables.bootstrap.min.css">
  <script src="<?php echo base_url('assets/plugins/') ?>datatables/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url('assets/plugins/') ?>datatables-bs/js/dataTables.bootstrap.min.js"></script>
  <script>
  $(document).ready( function () {
    $('#dataTable').DataTable();
  } );
  </script>
<div class="quick-panel-sidebar custom-scrollbar" fuse-cloak data-fuse-bar="quick-panel-sidebar" data-fuse-bar-position="right">
                 <?php $this->load->view('back/template/quickpanel'); ?>
    </div>

        </div>
    </main>
</body>
</html>
