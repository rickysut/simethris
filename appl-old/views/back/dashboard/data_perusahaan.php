<?php $this->load->view('back/template/meta'); ?>
  <?php $this->load->view('back/template/sidebar'); ?>
  <div class="content-wrapper">
  <?php $this->load->view('back/template/navbar'); ?>
  <div class="content custom-scrollbar">
  
    <!-- Main content -->
    <div class="doc data-table-doc page-layout simple full-width">
		<div class="page-header bg-primary text-auto p-6 row no-gutters align-items-center justify-content-between">
            <h1 class="doc-title h4" id="content">Daftar Perusahaan</h1>
			<?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
         </div>
		
		 <div class="page-content p-6">
            <div class="content container">
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
											<span class="column-title">V. Import</span>
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
									<td style="text-align: left"><div class="btn-group" role="group" aria-label="Third group">
                                                                <a href="<?php echo base_url('data_import/detail_perusahaan/'.$user->id_users); ?>" class="btn btn-secondary">D</a>
                                                            </div><?php echo $user->nama_perusahaan ?></td>
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