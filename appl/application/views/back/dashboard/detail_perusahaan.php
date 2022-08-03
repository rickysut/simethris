<?php $this->load->view('back/template/meta'); ?>
  <?php $this->load->view('back/template/sidebar'); ?>
  <div class="content-wrapper">
  <?php $this->load->view('back/template/navbar'); ?>
  <div class="content custom-scrollbar">
  
  <!-- Content Wrapper. Contains page content -->
  <div class="doc forms-doc page-layout simple full-width">
    <!-- Content Header (Page header) -->
	<!-- HEADER -->
    <div class="page-header bg-primary text-auto p-6 row no-gutters align-items-center justify-content-between">
        <h1 class="doc-title h4" id="content"><?php echo $page_title ?></h1>

    </div>

    <!-- Main content -->
	<div class="page-content p-6">
        <div class="content container">
			<div class="row">
					<div class="col-sm-4">
						<div class="card">
							<div class="card-header">
								<h6 class="card-title"><?php echo $get_detail_perusahaan->nama_perusahaan;?></h6>
							</div>
							<div class="card-body">
								<p class="card-text"><b>RIPH : <?php echo $get_detail_perusahaan->nomor_riph;?></b><br><?php echo date("d-m-Y",strtotime($get_detail_perusahaan->tgl_mulai_berlaku));?> s.d <?php echo date("d-m-Y",strtotime($get_detail_perusahaan->tgl_mulai_berlaku));?>
								</p>
							</div>
							<div class="card-footer">
								V. RIPH : <b><?php echo $get_detail_perusahaan->volume;?></b><span> Ton </span>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="card">
							<div class="card-header">
								<h6 class="card-title">Informasi Tanam</h6>
							</div>
							<div class="card-body">
								<p class="card-text"><b>Kewajiban Tanam :<?php echo $get_detail_perusahaan->kewajiban_tanam;?> Ha</b><br>Luas Tanam : <?php echo $get_detail_perusahaan->luas_tanam;?> Ha
								</p>
							</div>
							<div class="card-footer">
								Selisih Tanam <b><?php echo $get_detail_perusahaan->selisih_tanam;?></b><span> Ha </span>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="card">
							<div class="card-header">
								<h6 class="card-title">Informasi Produksi</h6>
							</div>
							<div class="card-body">
								<p class="card-text"><b>Kewajiban Produksi :<?php echo $get_detail_perusahaan->kewajiban_produksi;?> Ton</b><br>Jumlah Produksi : <?php echo $get_detail_perusahaan->jmlproduksi;?> Ton
								</p>
							</div>
							<div class="card-footer">
								Selisih Produksi <b><?php echo $get_detail_perusahaan->selisih_produksi;?></b> Ton 
							</div>
						</div>
					</div>
			</div>
            <div class="row">
				<div class="col-12">
					<div class="example">
						<div class="description">
                            <div class="description-text">
                                <h5>Detail Perusahaan</h5><?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
                            </div>
                        </div>
						
						<div class="source-preview-wrapper">
                            <div class="preview">
                                <div class="preview-elements">
								<div class="container">
								<form>
								<fieldset disabled>
									<div class="form-group">
										<?php echo form_input($nama_perusahaan, $user->nama_perusahaan, $user->nama_perusahaan) ?>
										<label for="nama_perusahaan" class="col-form-label">Nama Perusahaan</label>
									</div>
									<div class="form-group">
										<?php echo form_textarea($alamat, $user->alamat) ?>
										<label for="alamat" class="col-form-label">Alamat</label>
									</div>
									<div class="form-group">
										<?php echo form_input($phone_number, $user->phone_number) ?>
										<label for="phone_number" class="col-form-label">No. Telepon</label>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<?php echo form_dropdown('', $get_all_combobox_provinsi, $user->provinsi, $provinsi) ?>
											<small id="provinsiHelpBlock" class="form-text text-muted">
								Provinsi.</small>
										</div>
										<div class="form-group col-md-6">
											<?php echo form_dropdown('',$get_all_combobox_kabupaten, $user->kabupaten, $kabupaten) ?>
											<small id="kabupatenHelpBlock" class="form-text text-muted">
								Kabupaten.</small>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<?php echo form_dropdown('', $get_all_combobox_kecamatan, $user->kecamatan, $kecamatan) ?>
											<small id="kecamatanHelpBlock" class="form-text text-muted">
								Kecamatan.</small>
										</div>
										<div class="form-group col-md-6">
											<?php echo form_dropdown('', $get_all_combobox_desa, $user->desa, $desa) ?>
											<small id="desaHelpBlock" class="form-text text-muted">
								Desa.</small>
										</div>
									</div>
									</fieldset>
								</form>
								</div>
								</div>
						</div>
						</div>
					</div>
				</div>
				
				<div class="col-12">
					<div class="example">
						<div class="description">
                            <div class="description-text">
                                <h5>Detail Perusahaan</h5><?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
                            </div>
                        </div>
						<ul class="nav nav-tabs" id="myTab" role="tablist">

											<li class="nav-item">
												<a class="nav-link btn active" id="home-tab" data-toggle="tab" href="#home-tab-pane" role="tab" aria-controls="home-tab-pane" aria-expanded="true">PKS</a>
											</li>

											<li class="nav-item">
												<a class="nav-link btn" id="budget-summary-tab" data-toggle="tab" href="#budget-summary-tab-pane" role="tab" aria-controls="budget-summary-tab-pane">Reaslisasi Tanam</a>
											</li>

						</ul>

						<div class="tab-content">
							<div class="tab-pane fade show active p-3" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab">
								<div class="table-responsive">
									<table id="dataTable" class="table">
									  <thead>
										 <tr>
											<th style="text-align: center" class="secondary-text">
												<div class="table-header">
													<span class="column-title">No</span>
												</div>
											</th>
											<th style="text-align: center" class="secondary-text">
												<div class="table-header">
													<span class="column-title">Rencana Tanam</span>
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
													<span class="column-title">Status</span>
												</div>
											</th>
											<th style="text-align: center" class="secondary-text">
												<div class="table-header">
													<span class="column-title">Realisasi Tanam</span>
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
										</tr>
									</thead>
						
									  <tbody>
										<?php $no = 1; foreach($get_all_cpcl_by_iduser as $user){
										  // status active
										  if($user->is_active == '1'){$is_active = '<a href="#" data-toggle="tooltip" title="Aktif" class="btn btn-secondary btn-sm"><span class="badge">A</span></a>';}
										  else{$is_active = '<a href="#" data-toggle="tooltip" title="Tidak Aktif" class="btn btn-danger btn-sm"><span class="badge">N</span></a>';}
										  if($user->is_verifikasi == '1'){$is_verifikasi = '<button type="button" data-toggle="tooltip" title="Sudah Terverifikasi" class="btn btn-success btn-sm"><i class="icon-bookmark-check"></i></button>';}
										  else{$is_verifikasi = '<button type="button" data-toggle="tooltip" title="Belum Terverifikasi" class="btn btn-danger btn-sm"><i class="icon-bookmark-remove"></i></button>';}
										  ?>
										
										  <tr>
											<td style="text-align: center"><?php echo $no++ ?></td>
											<td style="text-align: center"><?php echo $user->tgl_rencana_tanam ?></td>
											<td style="text-align: left"><?php echo $user->namapengelola ?></td>
											<td style="text-align: left"><?php echo $user->nama_pelaksana ?></td>
											<td style="text-align: center">
												<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
													<div class="btn-group mr-2" role="group" aria-label="First group">
														<?php echo $is_active ?>
														<?php echo $is_verifikasi ?>
													</div>
												</div>
											</td>
											<td style="text-align: left"><?php echo $user->jmlrealisasi ?> - Ha</td>
											<td style="text-align: left"><?php echo $user->jmlproduksi ?> - Ton</td>
											<td style="text-align: left"><?php echo $user->nama_prov ?></td>
											<td style="text-align: left"><?php echo $user->nama_kab ?></td>
											<td style="text-align: left"><?php echo $user->nama_kec ?></td>
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
							<div class="tab-pane fade p-3" id="budget-summary-tab-pane" role="tabpanel" aria-labelledby="budget-summary-tab">
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
													<span class="column-title">ID PKS</span>
												</div>
											</th>
											<th style="text-align: center" class="secondary-text">
												<div class="table-header">
													<span class="column-title">ID Realisasi</span>
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
										<?php $no = 1; foreach($get_all_realisasi_by_iduser as $user){
										  // status active
										  if($user->is_active == '1'){$is_active = '<a href="'.base_url('realisasi/deactivate/'.$user->id_cpcl).'" data-toggle="tooltip" title="Aktif" class="btn btn-xs btn-success"><span class="badge badge-light">A</span></a>';}
										  else{$is_active = '<a href="'.base_url('realisasi/activate/'.$user->id_cpcl).'" data-toggle="tooltip" title="Tidak Aktif" class="btn btn-xs btn-danger"><span class="badge badge-light">-</span></a>';}
										  if($user->is_produksi == '1'){
											  $is_produksi = '<button type="button" data-toggle="tooltip" title="Sudah Produksi" class="btn btn-xs btn-success"><span class="badge badge-light">P</span></button>';
											  $new = '<a href="'.base_url('produksi/update/'.$user->id_cpcl.'/'.$user->id_realisasi).'" data-toggle="tooltip" title="Edit Realisasi Tanam" class="btn btn-xs btn-warning"><i class="icon-grease-pencil"></i></a>';
										  }
										  else{
											  $is_produksi = '<button type="button" data-toggle="tooltip" title="Belum Produksi" class="btn btn-xs btn-danger"><span class="badge badge-light">X</span></button>';
											  $new = '<a href="'.base_url('produksi/create/'.$user->id_realisasi).'" data-toggle="tooltip" title="Tambah Data Produksi" class="btn btn-xs btn-success"><i class="icon-plus"></i></a>';
										  }
										  if($user->is_verifikasi == '1'){$is_verifikasi = '<button type="button" data-toggle="tooltip" title="Terverifikasi" class="btn btn-xs btn-success"><span class="badge badge-light">V</span></button>';}
										  else{$is_verifikasi = '<button type="button" data-toggle="tooltip" title="Belum Terverifikasi" class="btn btn-xs btn-danger"><span class="badge badge-light">U</span></button>';}
										  ?>
										<tr>
											<td style="text-align: center"><?php echo $no++ ?></td>
											<td style="text-align: center"><?php echo $user->id_cpcl ?></td>
											<td style="text-align: center"><?php echo $user->id_realisasi ?></td>
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
							
						</div>				
										
									
					</div>
				</div>
			</div>
		</div>
	</div>		
   <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
  <?php $this->load->view('back/template/footer'); ?>
  <!-- bootstrap datepicker -->
  <script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/datatables.net/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/datatables-responsive/js/dataTables.responsive.js"></script>
  <script>
	$(document).ready(function() {
    $('#dataTable').DataTable({
       dom: 'rt<"dataTables_footer"ip>',
	   responsive: true
    });
	new $.fn.dataTable.FixedHeader( table );
  });
</script>
<script>
	$(document).ready(function() {
    $('#sample-data-table').DataTable({
       dom: 'rt<"dataTables_footer"ip>',
	   responsive: true
    });
	new $.fn.dataTable.FixedHeader( table );
  });
</script>
  <script>
        $(document).ready(function(){
            $("#provinsi").change(function (){
                var url = "<?php echo site_url('wilayah/add_ajax_kab');?>/"+$(this).val();
                $('#kabupaten').load(url);
                return false;
            })
			
			$("#kabupaten").change(function (){
                var url = "<?php echo site_url('wilayah/add_ajax_kec');?>/"+$(this).val();
                $('#kecamatan').load(url);
                return false;
            })
			
			$("#kecamatan").change(function (){
                var url = "<?php echo site_url('wilayah/add_ajax_des');?>/"+$(this).val();
                $('#desa').load(url);
                return false;
            })
        });
    </script>


	<div class="quick-panel-sidebar custom-scrollbar" fuse-cloak data-fuse-bar="quick-panel-sidebar" data-fuse-bar-position="right">
                 <?php $this->load->view('back/template/quickpanel'); ?>
    </div>

        </div>
    </main>
</body>
</html>
