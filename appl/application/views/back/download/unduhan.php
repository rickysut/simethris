<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/sidebar'); ?>
<div class="content-wrapper">
	<?php $this->load->view('back/template/navbar'); ?>
	<div class="content custom-scrollbar">
  
    <!-- Main content -->
    <div class="doc data-table-doc page-layout simple full-width">
		
		 <div class="page-content p-3">
            <div class="content container">
                <div class="row">
					<div class="col-12">
                    <div class="card">
						<div class="card-body">
							<div class="table-responsive table-hover">
								<table class="table table-bordered w-100">
									<thead>
										<tr>
											<th>No.</th>
											<th>Nama Berkas</th>										
											<th>Jenis Berkas</th>
											<th>Keterangan</th>
											<th style="text-align: center;">Action</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>Form-SPTJM</td>
											<td>Documents</td>
											<td>Form SURAT PERNYATAAN TANGGUNG JAWAB MUTLAK</td>
											<td><a class="btn btn-info btn-sm btn-fab" class="btn btn-info btn-sm btn-fab" href="<?php echo base_url() ?>uploads/attachment/Form-SPTJM.docx" download><i class="fa fa-download"></i></a></td>
										</tr>
										<tr>
											<td>2</td>
											<td>Form-BA-Kemitraan</td>
											<td>Documents</td>
											<td>Form Berita Acara Verifikasi Produksi Bawang Putih - Model Kemitraan</td>
											<td><a class="btn btn-info btn-sm btn-fab" class="btn btn-info btn-sm btn-fab" href="<?php echo base_url() ?>uploads/attachment/Form-BA-Kemitraan.docx" download><i class="fa fa-download"></i></a></td>
										</tr>
										<tr>
											<td>3</td>
											<td>Form-BA-Swa</td>
											<td>Documents</td>
											<td>Form Berita Acara Verifikasi Produksi Bawang Putih - Model Swakelola</td>
											<td><a class="btn btn-info btn-sm btn-fab" class="btn btn-info btn-sm btn-fab" href="<?php echo base_url() ?>uploads/attachment/Form-BA-Swa.docx" download><i class="fa fa-download"></i></a></td>
										</tr>
										<tr>
											<td>4</td>
											<td>Form-LA-Kemitraan</td>
											<td>Documents</td>
											<td>Form Laporan Akhir Pelaksanaan Pengembangan Kawasan Bawang Putih oleh Importir - Model Kemitraan</td>
											<td><a class="btn btn-info btn-sm btn-fab" class="btn btn-info btn-sm btn-fab" href="<?php echo base_url() ?>uploads/attachment/Form-LA-Kemitraan.docx" download><i class="fa fa-download"></i></a></td>
										</tr>
										<tr>
											<td>5</td>
											<td>Form-LA-Swa</td>
											<td>Documents</td>
											<td>Form Laporan Akhir Pelaksanaan Pengembangan Kawasan Bawang Putih oleh Importir - Model Swakelola</td>
											<td><a class="btn btn-info btn-sm btn-fab" class="btn btn-info btn-sm btn-fab" href="<?php echo base_url() ?>uploads/attachment/Form-LA-Swa.docx" download><i class="fa fa-download"></i></a></td>
										</tr>
										<tr>
											<td>6</td>
											<td>Form-RPO-Kemitraan</td>
											<td>Documents</td>
											<td>Form Laporan Realisasi Produksi - Model Kemitraan</td>
											<td><a class="btn btn-info btn-sm btn-fab" class="btn btn-info btn-sm btn-fab" href="<?php echo base_url() ?>uploads/attachment/Form-RPO-Kemitraan.docx" download><i class="fa fa-download"></i></a></td>
										</tr>
										<tr>
											<td>7</td>
											<td>Form-RPO-Swa</td>
											<td>Documents</td>
											<td>Form Laporan Realisasi Produksi - Model Swakelola</td>
											<td><a class="btn btn-info btn-sm btn-fab" class="btn btn-info btn-sm btn-fab" href="<?php echo base_url() ?>uploads/attachment/Form-RPO-Swa.docx" download><i class="fa fa-download"></i></a></td>
										</tr>
										<tr>
											<td>8</td>
											<td>Form-RTA-Kemitraan</td>
											<td>Documents</td>
											<td>Form Laporan Realisasi Penanaman Bawang Putih di Dalam Negeri - Model Kemitraan</td>
											<td><a class="btn btn-info btn-sm btn-fab" class="btn btn-info btn-sm btn-fab" href="<?php echo base_url() ?>uploads/attachment/Form-RTA-Kemitraan.docx" download><i class="fa fa-download"></i></a></td>
										</tr>
										<tr>
											<td>9</td>
											<td>Form-RTA-Swa</td>
											<td>Documents</td>
											<td>Form Laporan Realisasi Penanaman Bawang Putih di Dalam Negeri - Model Swakelola</td>
											<td><a class="btn btn-info btn-sm btn-fab" class="btn btn-info btn-sm btn-fab" href="<?php echo base_url() ?>uploads/attachment/Form-RTA-Swa.docx" download><i class="fa fa-download"></i></a></td>
										</tr>
									</tbody>
									<tfoot>
										<tr>
											<th>No.</th>
											<th>Nama Berkas</th>										
											<th>Jenis Berkas</th>
											<th>Keterangan</th>
											<th style="text-align: center;">Action</th>
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
	});
  </script>

</div>

</body>
</html>
