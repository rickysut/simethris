<?php $this->load->view('back/template/meta'); ?>
  <?php $this->load->view('back/template/sidebar'); ?>
  <div class="content-wrapper">
  <?php $this->load->view('back/template/navbar'); ?>
  <div class="content custom-scrollbar">
	<?php if($surplus_produksi->selisih_produksi <= 0){
		$PSurplus = "Belum Ada Perusahaan";
		$AlmSurplus = "Yang Surplus";
		$JmlSurplus = "-";
	}
	else
	{
		$PSurplus = $surplus_produksi->nama_perusahaan;
		$Pid = $surplus_produksi->id_users;
		$AlmSurplus = $surplus_produksi->alamat;
		$JmlSurplus = $surplus_produksi->selisih_produksi;
	}
	$PImport = $import_terbesar->nama_perusahaan;
	$PImportID = $import_terbesar->id_users;
	$AlmImport = $import_terbesar->alamat;
	$JmlImport = $import_terbesar->volume;
	$PSelisih = $selisih_produksi->nama_perusahaan;
	$PSelisihID = $import_terbesar->id_users;
	$AlmSelisih = $selisih_produksi->alamat;
	$JmlSelisih = $selisih_produksi->selisih_produksi;
	?>
    <!-- Main content -->
    <div class="doc data-table-doc page-layout simple full-width">
		<div class="page-header bg-primary text-auto p-6 row no-gutters align-items-center justify-content-between">
            <h1 class="doc-title h4" id="content">Daftar Importir</h1>
			<?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
         </div>
		
		 <div class="page-content p-6">
            <div class="content container">
				<div class="row">
					<div class="col-sm-4">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Volume Import Terbesar</h4>
								<p class="card-text"><b><?php echo $PImport;?></b><br><?php echo $AlmImport;?>
								</p>
								<a href="<?php echo base_url('data_import/detail_perusahaan/'.$PImportID); ?>" class="btn btn-primary"><?php echo $JmlImport;?><span> Ton <i class="icon icon-alert-circle-outline"></i></span></a>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Selisih Produksi Terbesar</h4>
								<p class="card-text"><b><?php echo $PSelisih;?></b><br><?php echo $AlmSelisih;?>
								</p>
								<a href="<?php echo base_url('data_import/detail_perusahaan/'.$PSelisihID); ?>" class="btn btn-primary"><?php echo $JmlSelisih;?><span> Ton <i class="icon icon-alert-circle-outline"></i></span></a>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Surplus Produksi Terbesar</h4>
								<p class="card-text"><b><?php echo $PSurplus;?></b><br><?php echo $AlmSurplus;?>
								</p>
								<a href="<?php echo base_url('data_import/detail_perusahaan/'.$Pid); ?>" class="btn btn-primary"><?php echo $JmlSurplus;?><span> Ton <i class="icon icon-alert-circle-outline"></i></span></a>
							</div>
						</div>
					</div>
				</div>
                <div class="row">
					<div class="col-12">
						<div class="example ">
						  <div class="table-responsive">
							<table id="dataTable" class="display" style="width:100%">
							  <thead>
								 <tr>
									<th style="text-align: center" class="secondary-text">
										<div class="table-header">
											<span class="column-title">No</span>
										</div>
									</th>
									<th style="text-align: center" class="secondary-text">
										<div class="table-header">
											<span class="column-title">Nama Perusahaan</span>
										</div>
									</th>
									<th style="text-align: center" class="secondary-text">
										<div class="table-header">
											<span class="column-title">Provinsi</span>
										</div>
									</th>
									
									<th style="text-align: center" class="secondary-text">
										<div class="table-header">
											<span class="column-title">Nama Kontak</span>
										</div>
									</th>
									<th style="text-align: center" class="secondary-text">
										<div class="table-header">
											<span class="column-title">No. Telepon</span>
										</div>
									</th>
									<th style="text-align: center" class="secondary-text">
										<div class="table-header">
											<span class="column-title">V. RIPH</span>
										</div>
									</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1; foreach($get_data_perusahaan as $user){
							  // status active
							   // action
								?>
								<tr>
									<td style="text-align: center"><?php echo $no++ ?></td>
									<td style="text-align: left"><?php echo $user->nama_perusahaan ?></td>
									<td style="text-align: left"><?php echo $user->nama_prov ?></td>
									<td style="text-align: left"><?php echo $user->nama_kontak ?></td>
									<td style="text-align: left"><?php echo $user->phone_number ?></td>
									<td style="text-align: right"><?php echo $user->volume ?></td>
								</tr>
								<?php } ?>
							</tbody>
							<tfoot>
								<tr>
									<th colspan="5" style="text-align:left"></th>
									<th></th>
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
      <!-- /.box -->
</div>
  <!-- /.content-wrapper -->

<?php $this->load->view('back/template/footer'); ?>
  <!-- DataTables -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/node_modules/') ?>Datatables/datatables.min.css"/>
<script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/datatables.net/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/node_modules/') ?>DataTables/datatables.min.js"></script>
<script>
	$(document).ready(function() {
		$('#dataTable').DataTable({
			"footerCallback": function ( row, data, start, end, display ) {
				var api = this.api(), data;
	 
				// Remove the formatting to get integer data for summation
				var intVal = function ( i ) {
					return typeof i === 'string' ?
						i.replace(/[\$,]/g, '')*1 :
						typeof i === 'number' ?
							i : 0;
				};
	 
				// Total over all pages
				total = api
					.column(5)
					.data()
					.reduce( function (a, b) {
						return intVal(a) + intVal(b);
					}, 0 );
	 
				// Total over this page
				pageTotal = api
					.column(5, { page: 'current'} )
					.data()
					.reduce( function (a, b) {
						return intVal(a) + intVal(b);
					}, 0 );
	 
				// Update footer
				$( api.column(1).footer() ).html(
					'Total halaman ini : '+convertToRupiah(pageTotal)+' Ton ( Total Semua : '+ convertToRupiah(total) +' Ton)'
				);
			},
			"dom": 'Brt<"dataTables_footer"ip>',
			"responsive": 'true',
			 "buttons": [
				{
					extend: 'collection',
					text: 'Export',
					buttons: [
						'copy',
						'excel',
						'csv',
						'pdf',
						'print'
					]
				}
			]
		});
		new $.fn.dataTable.FixedHeader( table );
		
		function convertToRupiah(angka)
		{
			var rupiah = '';		
			var angkarev = angka.toString().split('').reverse().join('');
			for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
			return ''+rupiah.split('',rupiah.length-1).reverse().join('');
		};
	});
</script>


<div class="quick-panel-sidebar custom-scrollbar" fuse-cloak data-fuse-bar="quick-panel-sidebar" data-fuse-bar-position="right">
                 <?php $this->load->view('back/template/quickpanel'); ?>
    </div>

        </div>
    </main>
</body>
</html>