<?php $this->load->view('back/template/meta_new'); ?>
<?php $this->load->view('back/template/tablestyle'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar_new'); ?>


<div class="page-wrapper">
  <div class="content custom-scrollbar">
  
  <!-- Content Wrapper. Contains page content -->
  <div class="doc forms-doc page-layout simple full-width">
    <!-- Content Header (Page header) -->
	<!-- HEADER -->
	
	
	
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor"><?php echo $page_title ?></h3>
			<span><?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?></span>
		</div>
		<div class="col-md-7 align-self-center">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
				<li class="breadcrumb-item active"><?php echo $page_title ?></li>
			</ol>
		</div>
	</div>
    <!-- / HEADER -->
    <!-- Main content -->
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<div class="card-actions">
							<a href="<?php echo $add_action ?>" class="btn btn-info btn-sm text-white fuse-ripple-ready"><i class="icon-account-plus"></i>
								<span><?php echo $btn_add ?></span>
							</a>
						</div>
						<h4>Daftar Mitra Kelompok Tani</h4>
					</div>
					<div class="card-body">
						<div class="table table-responsive table-hover">
							<table class="table" id="dataTable" width="100%">
								<thead>
									<tr>
										<th>No</th>
										<th style="width:15%">No. PKS</th>
										<th style="width:15%">Mitra Tani</th>
										<th>Tanam</th>
										<th>Produksi</th>
										<th>Desa</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
									
								</thead>
								<tbody>
									<?php $no = 1; foreach($get_all_cpcl_by_iduser as $user){
										// status active
										if($user->is_active == '1'){$is_active = '<a href="#" data-toggle="tooltip" title="Aktif" class="btn btn-secondary btn-sm"><span class="badge">A</span></a>';}
										else{$is_active = '<a href="#" data-toggle="tooltip" title="Tidak Aktif" class="btn btn-danger btn-sm"><span class="badge">N</span></a>';}
										if($user->is_verifikasi == '1'){$is_verifikasi = '<button type="button" data-toggle="tooltip" title="Sudah Terverifikasi" class="btn btn-success btn-sm"><i class="icon-bookmark-check"></i></button>';}
										elseif($user->is_verifikasi == '3'){$is_verifikasi = '<button type="button" data-toggle="tooltip" title="Verifikasi Ditolak" class="btn btn-danger btn-sm"><i class="icon-bookmark-remove"></i></button>';}
										else{$is_verifikasi = '<button type="button" data-toggle="tooltip" title="Belum Terverifikasi" class="btn btn-danger btn-sm"><i class="icon-bookmark-remove"></i></button>';}
										// action
										$download = '<a href="'.base_url('uploads/file_surat/konbert-export-2c29d78493e14.sql').'" data-toggle="tooltip" title="Download File Format PKS" class="btn btn-primary btn-sm"><i class="icon-box-download"></i></a>';
										if($user->is_aju_verifikasi=='0'){
										$new = '<a href="'.base_url('realisasi/daftarrealisasi/'.$user->id_cpcl).'" data-toggle="tooltip" title="Tambah Data Realisasi" class="btn btn-primary btn-sm"><i class="icon-plus"></i></a>';
										$verif = '<a href="'.base_url('cpcl/aju_verifikasi/'.$user->id_cpcl).'" data-toggle="tooltip" title="Ajukan Verifikasi PKS" class="btn btn-warning btn-sm"><i class="icon-bookmark-check"></i></a>';
										$edit = '<a href="'.base_url('cpcl/update/'.$user->id_cpcl).'" data-toggle="tooltip" title="Edit PKS" class="btn btn-warning btn-sm"><i class="icon-grease-pencil"></i></a>';
										$delete = '<a href="'.base_url('cpcl/delete/'.$user->id_cpcl).'" data-toggle="tooltip" title="Hapus PKS" onClick="return confirm(\'Are you sure?\');" class="btn btn-danger btn-sm"><span><i class="icon-filter-remove-outline"></i></span></a>';
										}else{
										$new = '<a href="'.base_url('realisasi/daftarrealisasi/'.$user->id_cpcl).'" data-toggle="tooltip" title="Tambah Data Realisasi" class="btn btn-primary btn-sm" role="button" aria-disabled="true"><i class="icon-plus"></i></a>';
										$verif = '<a href="'.base_url('cpcl/aju_verifikasi/'.$user->id_cpcl).'" data-toggle="tooltip" title="Ajukan Verifikasi PKS" class="btn btn-warning btn-sm disabled" role="button" aria-disabled="true"><i class="icon-bookmark-check"></i></a>';
										$edit = '<a href="'.base_url('cpcl/update/'.$user->id_cpcl).'" data-toggle="tooltip" title="Edit PKS" class="btn btn-warning btn-sm disabled" role="button" aria-disabled="true"><i class="icon-grease-pencil"></i></a>';
										$delete = '<a href="'.base_url('cpcl/delete/'.$user->id_cpcl).'" data-toggle="tooltip" title="Hapus PKS" onClick="return confirm(\'Are you sure?\');" class="btn btn-danger btn-sm disabled" role="button" aria-disabled="true"><span><i class="icon-filter-remove-outline"></i></span></a>';  
										}
									?>
									<tr>
										<td style="text-align: center"><?php echo $no++ ?></td>
										<td style="text-align: left"><?php echo $user->no_pks ?></td>
										<td style="text-align: left"><?php echo $user->nama_pelaksana ?></td>
										<td style="text-align: left"><?php echo $user->jmlrealisasi ?> <sup>ha</sup></td>
										<td style="text-align: left"><?php echo $user->jmlproduksi ?> <sup>ton</sup></td>
										<td style="text-align: left"><?php echo $user->nama_des ?></td>
										<td style="text-align: center">
											<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
												<div class="btn-group mr-2" role="group" aria-label="First group">
													<?php echo $is_active ?>
													<?php echo $is_verifikasi ?>
													<!--<?php echo $download ?>-->
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
	
	  
      <!-- /.box -->
    </div>
    <!-- /.content -->
  <!-- /.content-wrapper -->

<?php $this->load->view('back/template/footer_new'); ?>
<?php $this->load->view('back/template/endscript'); ?>
<?php $this->load->view('back/template/endbody'); ?>
   
<script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/datatables.net/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/datatables-responsive/js/dataTables.responsive.js"></script>

<script>
	$(document).ready(function() {
    $('#dataTable').DataTable({
       "dom": 'rt<"dataTables_footer"ip>',
	   "responsive": 'true'
    });
	//new $.fn.dataTable.FixedHeader(table);
  });
</script>