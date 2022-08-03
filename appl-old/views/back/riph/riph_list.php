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
			<a href="<?php echo $add_action ?>" class="btn btn-light fuse-ripple-ready"><i class="icon-account-plus"></i>
            <span><?php echo $btn_add ?></span>
            </a>

         </div>
		 <div class="page-content p-3">
            <div class="content container">
                <div class="row">
					<div class="col-12">
                    <div class="card">
						<div class="card-body">
							<div class="table-responsive">
								<table id="dataTable" class="table table-bordered table-striped">
								  <thead>
									<tr>
									  <th style="text-align: center">No</th>
									  <th style="text-align: center">Nama Perusahaan</th>
									  <th style="text-align: center">No RIPH</th>
									  <th style="text-align: center">TGL Terbit RIPH</th>
									  <th style="text-align: center">TGL Maks Pelunasan</th>
									  <th style="text-align: center">Volume Pengajuan</th>
									  <th style="text-align: center">Target Produksi</th>
									  <th style="text-align: center">Target Tanam</th>
									  <th style="text-align: center">Action</th>
									</tr>
								  </thead>
								  <tbody>
									<?php $no = 1; foreach($get_all_riph as $user){
									  // status active
									  $edit = '<a href="'.base_url('riph/update/'.$user->id_riph).'" data-toggle="tooltip" title="Edit Data RIPH" class="btn btn-warning btn-sm"><i class="icon-grease-pencil"></i></a>';
									  $delete = '<a href="'.base_url('riph/delete/'.$user->id_riph).'" data-toggle="tooltip" title="Hapus Data RIPH" onClick="return confirm(\'Are you sure?\');" class="btn btn-danger btn-sm"><i class="icon-filter-remove-outline"></i></a>';
									?>
									
									  <tr>
										<td style="text-align: center"><?php echo $no++ ?></td>
										<td style="text-align: left"><?php echo $user->nama_perusahaan ?></td>
										<td style="text-align: left"><?php echo $user->no_riph ?></td>
										<td style="text-align: left"><?php echo date('d-m-Y',strtotime($user->tgl_terbit_riph)) ?></td>
										<td style="text-align: left"><?php echo date('d-m-Y',strtotime($user->tgl_max_lunas)) ?></td>
										<td style="text-align: right"><?php echo $user->v_pengajuan ?></td>
										<td style="text-align: right"><?php echo $user->target_produksi ?></td>
										<td style="text-align: right"><?php echo $user->target_tanam ?></td>
										<td style="text-align: center"><div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
											<div class="btn-group mr-2" role="group" aria-label="First group">
												<?php echo $edit ?>
												<?php echo $delete ?>
											</div>
										</div></td>
									  </tr>
									<?php } ?>
								  </tbody>
								  <tfoot>
									<tr>
									  
									</tr>
								  </tfoot>
								</table>
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

  <?php $this->load->view('back/template/footer'); ?>
  <div class="quick-panel-sidebar custom-scrollbar" fuse-cloak data-fuse-bar="quick-panel-sidebar" data-fuse-bar-position="right">
                 <?php $this->load->view('back/template/quickpanel'); ?>
            </div>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>datatables-bs/css/dataTables.bootstrap.min.css">
  <script src="<?php echo base_url('assets/plugins/') ?>datatables/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url('assets/plugins/') ?>datatables-bs/js/dataTables.bootstrap.min.js"></script>
  <script>
  $(document).ready( function () {
    $('#dataTable').DataTable({ 
		scrollX: true,
        responsive: true,
        dom       : '<"top"f<"clear">>rt<"bottom"ip<"clear">>'
    });
  </script>

</div>
<!-- ./wrapper -->

</body>
</html>
