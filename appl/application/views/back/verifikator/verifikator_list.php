<?php $this->load->view('back/template/meta'); ?>
  <?php $this->load->view('back/template/sidebar'); ?>
  <div class="content-wrapper">
  <?php $this->load->view('back/template/navbar'); ?>
  <div class="content custom-scrollbar">
  
    <!-- Main content -->
    <div class="doc data-table-doc page-layout simple full-width">
		<div class="page-header bg-primary text-auto p-3 row no-gutters align-items-center justify-content-between">
            <h1 class="doc-title h4" id="content"><?php echo $page_title ?></h1>
			<?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
            </a>

        </div>
		<div class="page-content p-1">
            <div class="content container">
                <div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<div class="description">
									<div class="description-text">
										<h5>Daftar Verifikasi Wajib Tanam</h5>
									</div>
								</div>
							</div>
							<div class="card-body">
								<?php
									$json_table = json_encode($data_for_table, true);
									$json_table1 = $json_table;
								?>
								 
								<div id="datatableku" class='display table-bordered table-striped'></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
  <!-- /.content-wrapper -->
  <?php $this->load->view('back/template/footer'); ?>
  <div class="quick-panel-sidebar custom-scrollbar" fuse-cloak data-fuse-bar="quick-panel-sidebar" data-fuse-bar-position="right">
                 <?php $this->load->view('back/template/quickpanel'); ?>
            </div>
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/nested-datatable') ?>/src/styles/style.css?v=cd7a2da0f2f66a8c86379cbde71985cbd9e0c742">
<script src="<?php echo base_url('assets/plugins/nested-datatable') ?>/dist/nested.tables.min.js"></script>
  <script>
 //var dataInJson = [{
 var dataInJson = [<?php echo $data_for_table ?>];
 var settings = {
  "iDisplayLength": 20,
  "bLengthChange": false,
  "bFilter": false,
  "bSort": false,
  "bInfo": false
};
	var table = new nestedTables.TableHierarchy("datatableku", dataInJson, settings);
	table.initializeTableHierarchy();
  </script>
</div>
<!-- ./wrapper -->

</body>
</html>
