<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/sidebar'); ?>
<div class="content-wrapper">
	<?php $this->load->view('back/template/navbar'); ?>
	<div class="content custom-scrollbar">
  
    <!-- Main content -->
    <div class="doc data-table-doc page-layout simple full-width">
		<div class="page-header bg-primary text-auto p-6 row no-gutters align-items-center justify-content-between">
            <h1 class="doc-title h4" id="content">Daftar User</h1>
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
											<span class="column-title">Nama</span>
										</div>
									</th>
									<th style="text-align: center" class="secondary-text">
										<div class="table-header">
											<span class="column-title">Username</span>
										</div>
									</th>
									<th style="text-align: center" class="secondary-text">
										<div class="table-header">
											<span class="column-title">Email</span>
										</div>
									</th>
									<th style="text-align: center" class="secondary-text">
										<div class="table-header">
											<span class="column-title">Usertype</span>
										</div>
									</th>
									<th style="text-align: center" class="secondary-text">
										<div class="table-header">
											<span class="column-title">Status</span>
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
								<?php $no = 1; foreach($get_all as $user){
								  // status active
								  if($user->is_active == '1'){$is_active = '<a href="'.base_url('auth/deactivate/'.$user->id_users).'" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top"
            title="Non Aktifkan User">ACTIVE</a>';}
								  else{$is_active = '<a href="'.base_url('auth/activate/'.$user->id_users).'" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top"
            title="Aktifkan User">INACTIVE</a>';}
								  // action
								  $edit = '<a href="'.base_url('auth/update/'.$user->id_users).'" class="btn btn-sm btn-warning"><i class="icon icon-account-edit" data-toggle="tooltip" data-placement="top"
            title="Edit User"></i></a>';
								  $delete = '<a href="'.base_url('auth/delete/'.$user->id_users).'" onClick="return confirm(\'Are you sure?\');" class="btn btn-sm btn-danger"><i class="icon icon-account-remove" data-toggle="tooltip" data-placement="top"
            title="Hapus User"></i></a>';
								?>
								  <tr>
									<td style="text-align: center"><?php echo $no++ ?></td>
									<td style="text-align: left"><?php echo $user->name ?></td>
									<td style="text-align: left"><?php echo $user->username ?></td>
									<td style="text-align: left"><?php echo $user->email ?></td>
									<td style="text-align: left"><?php echo $user->usertype_name ?></td>
									<td style="text-align: center"><?php echo $is_active ?></td>
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
  <!--script type="text/javascript" src="< ?php echo base_url() ?>assets/node_modules/datatables.net/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="< ?php echo base_url() ?>assets/node_modules/datatables-responsive/js/dataTables.responsive.js"></script-->
  <!-- DataTables 
  <link rel="stylesheet" href="< ?php echo base_url('assets/plugins/') ?>datatables-bs/css/dataTables.bootstrap.min.css">
  <script src="< ?php echo base_url('assets/plugins/') ?>datatables/js/jquery.dataTables.min.js"></script>
  <script src="< ?php echo base_url('assets/plugins/') ?>datatables-bs/js/dataTables.bootstrap.min.js"></script> -->
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
