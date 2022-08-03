<?php $this->load->view('back/template/meta'); ?>
  <?php $this->load->view('back/template/sidebar'); ?>
  <div class="content-wrapper">
  <?php $this->load->view('back/template/navbar'); ?>
  <div class="content custom-scrollbar">
  
    <!-- Main content -->
    <div class="doc data-table-doc page-layout simple full-width">
		<div class="page-header bg-primary text-auto p-6 row no-gutters align-items-center justify-content-between">
            <h1 class="doc-title h4" id="content">Daftar Sub Menu</h1>
			<?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
			<a href="<?php echo $add_action ?>" class="btn btn-light fuse-ripple-ready"><i class="icon-account-plus"></i>
            <span><?php echo $btn_add ?></span>
            </a>

         </div>
		 <div class="page-content p-6">
            <div class="content container">
                <div class="row">
					<div class="col-12">
                        <div class="example ">
						  <div class="table-responsive">
							<table id="sample-data-table" class="table">
							  <thead>
								 <tr>
									<th style="text-align: center" class="secondary-text">
										<div class="table-header">
											<span class="column-title">No</span>
										</div>
									</th>
									<th style="text-align: center" class="secondary-text">
										<div class="table-header">
											<span class="column-title">Nama Sub Menu</span>
										</div>
									</th>
									<th style="text-align: center" class="secondary-text">
										<div class="table-header">
											<span class="column-title">URL</span>
										</div>
									</th>
									<th style="text-align: center" class="secondary-text">
										<div class="table-header">
											<span class="column-title">Order No</span>
										</div>
									</th>
									<th style="text-align: center" class="secondary-text">
										<div class="table-header">
											<span class="column-title">Nama Menu</span>
										</div>
									</th>
									<th style="text-align: center" class="secondary-text">
										<div class="table-header">
											<span class="column-title">Action</span>
										</div>
									</th>
								</tr>
							</thead>
							  <tbody>
								<?php $no = 1; foreach($get_all as $data){
								  // action
								  $edit = '<a href="'.base_url('submenu/update/'.$data->id_submenu).'" class="btn btn-warning"><i class="icon-chart-timeline"></i></a>';
								  $delete = '<a href="'.base_url('submenu/delete/'.$data->id_submenu).'" onClick="return confirm(\'Are you sure?\');" class="btn btn-danger"><i class="icon-delete-sweep"></i></a>';
								?>
								  <tr>
									<td style="text-align: center"><?php echo $no++ ?></td>
									<td style="text-align: left"><?php echo $data->submenu_name ?></td>
									<td style="text-align: left"><?php echo $data->submenu_url ?></td>
									<td style="text-align: center"><?php echo $data->order_no ?></td>
									<td style="text-align: left"><?php echo $data->menu_name ?></td>
									<td style="text-align: center"><?php echo $edit ?> <?php echo $delete ?></td>
								  </tr>
								<?php } ?>
							  </tbody>
							</table>
						  </div>
						</div>
        <!-- /.box-body -->
					</div>
				</div>
			</div>
		</div>
	  </div>
	  
      <!-- /.box -->
    </div>
    <!-- /.content -->
  <!-- /.content-wrapper -->

  <?php $this->load->view('back/template/footer'); ?>
  <!-- DataTables 
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>datatables-bs/css/dataTables.bootstrap.min.css">
  <script src="<?php echo base_url('assets/plugins/') ?>datatables/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url('assets/plugins/') ?>datatables-bs/js/dataTables.bootstrap.min.js"></script> -->
  <script type="text/javascript">
    $('#sample-data-table').DataTable({
        responsive: true,
        dom       : 'rt<"dataTables_footer"ip>'
    });
</script>

</div>
<div class="quick-panel-sidebar custom-scrollbar" fuse-cloak data-fuse-bar="quick-panel-sidebar" data-fuse-bar-position="right">
                 <?php $this->load->view('back/template/quickpanel'); ?>
    </div>

        </div>
    </main>
</body>
</html>