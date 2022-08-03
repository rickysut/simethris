<?php $this->load->view('back/template/meta'); ?>
  <?php $this->load->view('back/template/sidebar'); ?>
  <div class="content-wrapper">
  <?php $this->load->view('back/template/navbar'); ?>
  <div class="content custom-scrollbar">
  
    <!-- Main content -->
    <div class="doc data-table-doc page-layout simple full-width">
		<div class="page-header bg-primary text-auto p-6 row no-gutters align-items-center justify-content-between">
            <h1 class="doc-title h4" id="content"><?php echo $page_title ?></h1>
			<?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
			<div class="btn-group" role="group" aria-label="Basic example">
				<a href="<?php echo $add_action ?>" class="btn btn-light fuse-ripple-ready"><i class="icon-account-plus"></i>
				<span><?php echo $btn_add ?></span>
				</a>
				<a href="<?php echo $back_action ?>" class="btn btn-light fuse-ripple-ready"><i class="icon-account-plus"></i>
				<span><?php echo $btn_back ?></span>
				</a>
			</div>
			
         </div>
		 <div class="page-content p-3">
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
											<span class="column-title">Tangggal Tanam</span>
										</div>
									</th>
									<th style="text-align: center" class="secondary-text">
										<div class="table-header">
											<span class="column-title">Type Kelola</span>
										</div>
									</th>
									<th style="text-align: center" class="secondary-text">
										<div class="table-header">
											<span class="column-title">Nama Pengelola</span>
										</div>
									</th>
									<th style="text-align: center" class="secondary-text">
										<div class="table-header">
											<span class="column-title">Luas</span>
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
									<th style="text-align: center" class="secondary-text">
										<div class="table-header">
											<span class="column-title">Produksi</span>
										</div>
									</th>
									<th style="text-align: center" class="secondary-text">
										<div class="table-header">
											<span class="column-title">Provinsi</span>
										</div>
									</th>
									<th style="text-align: center" class="secondary-text">
										<div class="table-header">
											<span class="column-title">Kabupaten</span>
										</div>
									</th>
									<th style="text-align: center" class="secondary-text">
										<div class="table-header">
											<span class="column-title">Kecamatan</span>
										</div>
									</th>
									<th style="text-align: center" class="secondary-text">
										<div class="table-header">
											<span class="column-title">Desa</span>
										</div>
									</th>
								</tr>
							</thead>
							  <tbody>
								<?php $no = 1; foreach($get_all_realisasi_by_idcpcl as $user){
								  // status active
								  if($user->is_active == '1'){$is_active = '<a href="'.base_url('realisasi/deactivate/'.$user->id_cpcl).'" data-toggle="tooltip" title="Aktif" class="btn btn-xs btn-success"><span class="badge badge-light">A</span></a>';}
								  else{$is_active = '<a href="'.base_url('realisasi/activate/'.$user->id_cpcl).'" data-toggle="tooltip" title="Tidak Aktif" class="btn btn-xs btn-danger"><span class="badge badge-light">-</span></a>';}
								  if($user->is_produksi == '1'){
									  $is_produksi = '<button type="button" data-toggle="tooltip" title="Sudah Produksi" class="btn btn-xs btn-success"><span class="badge badge-light">P</span></button>';
									  $new = '<a href="'.base_url('produksi/update/'.$user->id_cpcl.'/'.$user->id_realisasi).'" data-toggle="tooltip" title="Edit Produksi" class="btn btn-xs btn-warning"><i class="icon-grease-pencil"></i></a>';
								  }
								  else{
									  $is_produksi = '<button type="button" data-toggle="tooltip" title="Belum Produksi" class="btn btn-xs btn-danger"><span class="badge badge-light">X</span></button>';
									  $new = '<a href="'.base_url('produksi/create/'.$user->id_realisasi).'" data-toggle="tooltip" title="Tambah Data Produksi" class="btn btn-xs btn-success"><i class="icon-plus"></i></a>';
								  }
								  if($user->is_verifikasi == '1'){$is_verifikasi = '<button type="button" data-toggle="tooltip" title="Terverifikasi" class="btn btn-xs btn-success"><span class="badge badge-light">V</span></button>';}
								  else{$is_verifikasi = '<button type="button" data-toggle="tooltip" title="Belum Terverifikasi" class="btn btn-xs btn-danger"><span class="badge badge-light">U</span></button>';}
								  // action
								  $edit = '<a href="'.base_url('realisasi/update/'.$user->id_cpcl.'/'.$user->id_realisasi).'" data-toggle="tooltip" title="Edit Realisasi Tanam" class="btn btn-xs btn-warning"><i class="icon-grease-pencil"></i></a>';
								  $delete = '<a href="'.base_url('realisasi/delete/'.$user->id_realisasi).'" onClick="return confirm(\'Are you sure?\');" data-toggle="tooltip" title="Hapus Realisasi Tanam" class="btn btn-xs btn-danger"><i class="icon-trash"></i></a>';
								  $edit2 = '<a href="'.base_url('updatemingguan/index/'.$user->id_users.'/'.$user->id_realisasi).'" data-toggle="tooltip" title="Update Mingguan" class="btn btn-xs btn-warning"><i class="icon-camera"></i></a>';
								?>
								<tr>
									<td style="text-align: center"><?php echo $no++ ?></td>
									<td style="text-align: center"><?php echo $user->tgl_realisasi_tanam ?></td>
									<td style="text-align: left"><?php echo $user->namapengelola ?></td>
									<td style="text-align: left"><?php echo $user->nama_pelaksana ?></td>
									<td style="text-align: left"><?php echo $user->luas_realisasi_tanam ?> - Ha</td>
									<td style="text-align: center">
										<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
											<div class="btn-group mr-2" role="group" aria-label="First group">
												<?php echo $is_active ?>
												<?php echo $is_produksi ?>
												<?php echo $is_verifikasi ?>
											</div>
										</div>
									</td>
									<td style="text-align: center">
										<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
											<div class="btn-group mr-2" role="group" aria-label="First group">
												<?php echo $edit ?>
												<?php echo $delete?>
												<?php echo $edit2?>
											</div>
										</div>
									</td>
									<td style="text-align: center">
										<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
											<div class="btn-group mr-2" role="group" aria-label="First group">
												<?php echo $new ?>
											</div>
										</div>
									</td>
									<td style="text-align: left"><?php echo $user->nama_prov ?></td>
									<td style="text-align: left"><?php echo $user->nama_kab ?></td>
									<td style="text-align: left"><?php echo $user->nama_kec ?></td>
									<td style="text-align: left"><?php echo $user->nama_des ?></td>
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
  <script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/datatables.net/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/datatables-responsive/js/dataTables.responsive.js"></script>
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