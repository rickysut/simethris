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
					<div class="col-12">
                        <div class="card p-3">
						  <div class="table-responsive">
							<table id="dataTable" class="table">
							  <thead>
								 <tr>
									<th style="text-align: center">
										No
									</th>
									
									<th style="text-align: center">
										Type Kelola
									</th>
									<th style="text-align: center" >
										Nama Pengelola
									</th>
									<th style="text-align: center" >
										Status
									</th>
									<th style="text-align: center">
										Action
									</th>
									<th style="text-align: center">
										Realisasi Tanam
									</th>
									<th style="text-align: center" >
										Produksi
									</th>
									<th style="text-align: center">
										Desa
									</th>
									
								</tr>
							</thead>
                
							  <tbody>
								<?php $no = 1; foreach($get_all_cpcl_by_iduser as $user){
								  // status active
								  if($user->is_active == '1'){$is_active = '<a  data-toggle="tooltip" title="Aktif">A</a>';}
								  else{$is_active = '<a  data-toggle="tooltip" title="Tidak Aktif" >NA</a>';}
								  if($user->is_verifikasi == '1'){$is_verifikasi = '<a  data-toggle="tooltip" title="Sudah Terverifikasi"><i style="color:green" class="fa fa-check-circle"></i></a>';}
								  elseif($user->is_verifikasi == '3'){$is_verifikasi = '<a  data-toggle="tooltip" title="Verifikasi Ditolak" ><i style="color:red" class="fa fa-minus-circle"></i></a>';}
								  else{$is_verifikasi = '<a data-toggle="tooltip" title="Belum Terverifikasi" ><i style="color:blue" class="fa fa-question-circle"></i></a>';}
								  // action
								  $download = '<a href="'.base_url('uploads/file_surat/konbert-export-2c29d78493e14.sql').'" data-toggle="tooltip" title="Download File Format PKS" ><i class="fa fa-download"></i></a>';
								  if($user->is_aju_verifikasi=='0'){
									$new = '<a href="'.base_url('realisasi/daftarrealisasi/'.$user->id_cpcl).'" data-toggle="tooltip" title="Tambah Data Realisasi" ><i class="fa fa-plus"></i></a>';
									$verif = '<a href="'.base_url('cpcl/aju_verifikasi/'.$user->id_cpcl).'" data-toggle="tooltip" title="Ajukan Verifikasi PKS" ><i class="fa fa-bookmark"></i></a>';
									$edit = '<a href="'.base_url('cpcl/update/'.$user->id_cpcl).'" data-toggle="tooltip" title="Edit PKS" ><i class="fa fa-pencil"></i></a>';
									$delete = '<a href="'.base_url('cpcl/delete/'.$user->id_cpcl).'" data-toggle="tooltip" title="Hapus PKS" onClick="return confirm(\'Are you sure?\');" ><span><i class="fa fa-trash"></i></span></a>';
								  }else{
									$new = '<a href="'.base_url('realisasi/daftarrealisasi/'.$user->id_cpcl).'" data-toggle="tooltip" title="Tambah Data Realisasi"  aria-disabled="true"><i class="fa fa-plus"></i></a>';
									$verif = '<a href="'.base_url('cpcl/aju_verifikasi/'.$user->id_cpcl).'" data-toggle="tooltip" title="Ajukan Verifikasi PKS" aria-disabled="true"><i class="fa fa-bookmark"></i></a>';
									$edit = '<a href="'.base_url('cpcl/update/'.$user->id_cpcl).'" data-toggle="tooltip" title="Edit PKS" c aria-disabled="true"><i class="fa fa-pencil"></i></a>';
									$delete = '<a href="'.base_url('cpcl/delete/'.$user->id_cpcl).'" data-toggle="tooltip" title="Hapus PKS" onClick="return confirm(\'Are you sure?\');" role="button" aria-disabled="true"><span><i class="fa fa-trash"></i></span></a>';  
								  }
								?>
								
								  <tr>
									<td style="text-align: center"><?php echo $no++ ?></td>
									<td style="text-align: left"><?php echo $user->namapengelola ?></td>
									<td style="text-align: left"><?php echo $user->nama_pelaksana ?></td>
									<td style="text-align: center">
										<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
											<div class="btn-group mr-2" role="group" aria-label="First group">
												<?php echo $is_active ?>
												<?php echo $is_verifikasi ?>
												<?php echo $download ?>
											</div>
										</div>
									</td>
									<td style="text-align: center">
										<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
											<div class="btn-group mr-2" role="group" aria-label="First group">
												<?php echo $new ?>
												<?php echo $edit ?>
												<?php echo $verif ?>
												<?php echo $delete ?>
											</div>
										</div>
									</td>
									<td style="text-align: right"><?php echo $user->jmlrealisasi ?> Ha</td>
									<td style="text-align: right"><?php echo $user->jmlproduksi ?> Ton</td>
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
	  
      <!-- /.box -->
    </div>
    <!-- /.content -->
  <!-- /.content-wrapper -->

  <?php $this->load->view('back/template/footer'); ?>
   <script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/datatables.net/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/datatables-responsive/js/dataTables.responsive.js"></script>
<script>
	$(document).ready(function() {
    $('#dataTable').DataTable({
       "dom": '<lf<t>ip>',
	   "responsive": 'true'
    });
	//new $.fn.dataTable.FixedHeader(table);
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