<?php $this->load->view('back/template/meta'); ?>
  <?php $this->load->view('back/template/sidebar'); ?>
  <div class="content-wrapper">
  <?php $this->load->view('back/template/navbar'); ?>
  <div class="content custom-scrollbar">
  
    <!-- Main content -->
    <div class="doc data-table-doc page-layout simple full-width">
		<div class="page-header bg-primary text-auto p-6 row no-gutters align-items-center justify-content-between">
            <h1 class="doc-title h4" id="content">Daftar Kelompok Tani</h1>
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
									  <th style="text-align: center">ID Poktan</th>
									  <th style="text-align: center">NO Poktan</th>
									  <th style="text-align: center">NAMA</th>
									  <th style="text-align: center">ALAMAT </th>
									  <th style="text-align: center">JML ANGGOTA</th>
									  <th style="text-align: center">LUAS LAHAN</th>
									  <th style="text-align: center">ACTION</th>
									</tr>
								  </thead>
								  <tbody>
									<?php $no = 1; foreach($get_all as $user){
									  // action
									  $edit = '<a href="'.base_url('poktan/update/'.$user->id_poktan).'" data-toggle="tooltip" title="Edit Kelompok Tani" class="btn btn-warning btn-fab btn-sm"><i class="icon-auto-fix"></i></a>';
									  $tambah = '<a href="'.base_url('petani/daftar/'.$user->id_poktan).'" data-toggle="tooltip" title="Daftar Anggota Poktan :'.$user->id_poktan.'" class="btn btn-warning btn-fab btn-sm"><i class="icon-clipboard-plus"></i></a>';
									  $delete = '<a href="'.base_url('poktan/delete/'.$user->id_poktan).'" onClick="return confirm(\'Are you sure?\');" class="btn btn-sm btn-danger btn-fab"><i class="icon icon-delete-empty"></i></a>';
									  $alamat = $user->nama_prov.'-'.$user->nama_kab.'-'.$user->nama_kec.'-'.$user->nama_des;
									?>
									  <tr>
										<td style="text-align: center"><?php echo $no++ ?></td>
										<td style="text-align: left"><?php echo $user->id_poktan ?></td>
										<td style="text-align: center"><?php echo $user->no_poktan ?></td>
										<td style="text-align: left"><?php echo $user->nama_poktan ?></td>
										<td style="text-align: left"><?php echo $alamat ?></td>
										<td style="text-align: center"><?php echo $user->jml_anggota ?></td>
										<td style="text-align: center"><?php echo $user->luas_lahan ?></td>
										<td style="text-align: center"><?php echo $edit ?> <?php echo $tambah ?> <?php echo $delete ?></td>
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
	   "columnDefs": [
			{
				"targets": 1,
				"visible": false,
				"width": "20%"
			},
			{
				"targets": 2,
				"visible": false,
				"width": "20%"
			}
		],
    });
  });
  </script>

</div>
<!-- ./wrapper -->

</body>
</html>
