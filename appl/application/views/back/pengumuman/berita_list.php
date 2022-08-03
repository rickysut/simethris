<?php $this->load->view('back/template/meta'); ?>
  <?php $this->load->view('back/template/sidebar'); ?>
  <div class="content-wrapper">
  <?php $this->load->view('back/template/navbar'); ?>
  <div class="content custom-scrollbar">
  
    <!-- Main content -->
    <div class="doc data-table-doc page-layout simple full-width">
		<div class="page-header bg-primary text-auto p-6 row no-gutters align-items-center justify-content-between">
            <h1 class="doc-title h4" id="content">Daftar Pengumuman</h1>
			<?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
			<div class="btn-group" role="group" aria-label="Basic example">
				<a href="<?php echo $add_action ?>" class="btn btn-light fuse-ripple-ready"><i class="icon-account-plus"></i>
				<span><?php echo $btn_add ?></span>
				</a>
			</div>
			
         </div>
		 <div class="page-content p-3">
					<div class="col-12">
                        <div class="card p-3 ">
							<div class="table-responsive">
								<table id="dataTable" class="table table-bordered table-striped">
								  <thead>
									<tr>
									  <th style="text-align: center">No</th>
									  <th style="text-align: center">Judul</th>
									  <th style="text-align: center">Isi Pengumuman</th>
									  <th style="text-align: center">Tanggal</th>
									  <th style="text-align: center">Status</th>
									  <th style="text-align: center">Action</th>
									</tr>
								  </thead>
								  <tbody>
									 <?php $no = 1; foreach($get_all as $user){
									  // status active
									  if($user->is_active == '1'){$is_active = '<a href="'.base_url('pengumuman/deactivate/'.$user->id).'" class="btn btn-xs btn-success">ACTIVE</a>';}
									  else{$is_active = '<a href="'.base_url('pengumuman/activate/'.$user->id).'" class="btn btn-xs btn-danger">INACTIVE</a>';}
									  // action
									  $edit = '<a href="'.base_url('pengumuman/update/'.$user->id).'" class="btn btn-warning"><i class="fa fa-pencil"></i></a>';
									  $delete = '<a href="'.base_url('pengumuman/delete/'.$user->id).'" onClick="return confirm(\'Are you sure?\');" class="btn btn-danger"><i class="fa fa-trash"></i></a>';
									?>
									  <tr>
										<td style="text-align: center"><?php echo $no++ ?></td>
										<td style="text-align: left"><?php echo $user->judul ?></td>
										<td style="text-align: center"><?php echo $user->pengumuman ?></td>
										<td style="text-align: center"><?php echo $user->tanggal ?></td>
										<td style="text-align: center"><?php echo $is_active ?></td>
										<td style="text-align: center"><div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
											<div class="btn-group mr-2" role="group" aria-label="First group">
												<?php echo $edit ?>
												<?php echo $delete ?>
											</div>
										</div></td>
										
									  </tr>
									<?php } ?>
								  </tbody>
								</table>
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
  <script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/datatables.net/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/datatables-responsive/js/dataTables.responsive.js"></script>
  
  <script>
  $(document).ready(function() {
    $('#dataTable').DataTable({
       "dom": 'rt<"dataTables_footer"ip>',
	   "responsive": 'true',
    });
	//new $.fn.dataTable.FixedHeader(dataTable);
  });
  </script>

</div>
<!-- ./wrapper -->

</body>
</html>