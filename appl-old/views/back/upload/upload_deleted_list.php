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
                <?php $no = 1; foreach($get_all_deleted as $user){
                  // gender
                  if($user->gender == '1'){$gender = 'Male';}else{$gender = 'Female';}
                  // status active
                  if($user->is_active == '1'){$is_active = '<a href="'.base_url('auth/deactivate/'.$user->id_users).'" class="btn btn-xs btn-success">ACTIVE</a>';}
                  else{$is_active = '<a href="'.base_url('auth/activate/'.$user->id_users).'" class="btn btn-xs btn-danger">INACTIVE</a>';}
                  // action
                  $restore = '<a href="'.base_url('auth/restore/'.$user->id_users).'" class="btn btn-info"><i class="fa fa-refresh"></i></a>';
                  $delete = '<a href="'.base_url('auth/delete_permanent/'.$user->id_users).'" onClick="return confirm(\'Are you sure to delete permanently?\');" class="btn btn-danger"><i class="fa fa-remove"></i></a>';
                ?>
                  <tr>
                    <td style="text-align: center"><?php echo $no++ ?></td>
                    <td style="text-align: left"><?php echo $user->name ?></td>
                    <td style="text-align: center"><?php echo $gender ?></td>
                    <td style="text-align: center"><?php echo $user->username ?></td>
                    <td style="text-align: center"><?php echo $user->email ?></td>
                    <td style="text-align: center"><?php echo $user->usertype_name ?></td>
                    <td style="text-align: center"><?php echo $is_active ?></td>
                    <td style="text-align: center"><?php echo $restore ?> <?php echo $delete ?></td>
                  </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th style="text-align: center">No</th>
                  <th style="text-align: center">Name</th>
                  <th style="text-align: center">Gender</th>
                  <th style="text-align: center">Username</th>
                  <th style="text-align: center">Email</th>
                  <th style="text-align: center">Usertype</th>
                  <th style="text-align: center">Status</th>
                  <th style="text-align: center">Action</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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

</div>
<!-- ./wrapper -->

</body>
</html>
