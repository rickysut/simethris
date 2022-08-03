<?php $this->load->view('back/template/meta'); ?>
  <?php $this->load->view('back/template/sidebar'); ?>
  <div class="content-wrapper">
  <?php $this->load->view('back/template/navbar'); ?>
  <div class="content custom-scrollbar">
  
    <!-- Main content -->
    <div class="doc data-table-doc page-layout simple full-width">
		<div class="page-header bg-primary text-auto p-6 row no-gutters align-items-center justify-content-between">
            <h1 class="doc-title h4" id="content">Contact List</h1>
			<?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>

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
											<span class="column-title">Photo</span>
										</div>
									</th>
									<th style="text-align: center" class="secondary-text">
										<div class="table-header">
											<span class="column-title">Nama</span>
										</div>
									</th>
									<th style="text-align: center" class="secondary-text">
										<div class="table-header">
											<span class="column-title">Phone</span>
										</div>
									</th>
									<th style="text-align: center" class="secondary-text">
										<div class="table-header">
											<span class="column-title">Email</span>
										</div>
									</th>
									<th style="text-align: center" class="secondary-text">
										<div class="table-header">
											<span class="column-title">Nama Perusahaan</span>
										</div>
									</th>
									<th style="text-align: center" class="secondary-text">
										<div class="table-header">
											<span class="column-title">Status</span>
										</div>
									</th>
								</tr>
							</thead>
							 
							  <tbody>
								<?php $no = 1; foreach($get_all as $user){
								  // status active
								  if($user->is_active == '1'){$is_active = '<a href="'.base_url('auth/deactivate/'.$user->id_users).'" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top"
            title="Non Aktifkan User">A</a>';}
								  else{$is_active = '<a href="'.base_url('auth/activate/'.$user->id_users).'" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top"
            title="Aktifkan User">I</a>';}
								?>
								  <tr>
									<td style="text-align: center"><?php echo $no++ ?></td>
									<td style="text-align: center"><img class="avatar mx-4" src="<?php echo base_url('uploads/user/'.$user->photo) ?>" /></td>
									<td style="text-align: left"><div class="col text-truncate font-weight-bold"><?php echo $user->name ?></div></td>
									<td style="text-align: left"><?php echo $user->phone ?></td>
									<td style="text-align: left"><?php echo $user->email ?></td>
									<td style="text-align: left"><?php echo $user->nama_perusahaan ?></td>
									<td style="text-align: center">
										<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
											<div class="btn-group mr-2" role="group" aria-label="First group">
												<?php echo $is_active ?>
											</div>
										</div>
									</td>
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
  <!--script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/datatables.net/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/datatables-responsive/js/dataTables.responsive.js"></script>
								  -->
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
