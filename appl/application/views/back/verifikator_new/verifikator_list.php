<?php $this->load->view('back/template/meta'); ?>
  <?php $this->load->view('back/template/sidebar_new'); ?>
  <div class="content-wrapper">
  <?php $this->load->view('back/template/navbar_new'); ?>
  <div class="content custom-scrollbar">
  
    <!-- Main content -->
    <div class="doc data-table-doc page-layout simple full-width">
		<div class="page-header bg-primary text-auto p-3 row no-gutters align-items-left justify-content-between">
            <h1 class="doc-title h4" id="content"><?php echo $page_title ?></h1>
			<?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
            </a>

        </div>
		<div class="page-content p-1">
            <div class="content container">
                <div class="row">
					<div class="col-12">
						<div class="card">
							
							<div class="card-body">
								<div class="table-responsive">
									<table id="dataTable" class="table table-bordered table-striped">
									<thead>
										<tr>
										<th style="text-align: left">Nama Perusahaan</th>
										<th style="text-align: left">Provinsi</th>
										<th style="text-align: left">Kabupaten</th>
										<th style="text-align: left">Kecamatan</th>
										<th style="text-align: left">Desa</th>
										<!--th style="text-align: left">Status</th-->
										<th style="text-align: center">Action</th>
										</tr>
									</thead>
									<tbody>
										
										
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
	</div>
  <!-- /.content-wrapper -->
  <?php $this->load->view('back/template/footer'); ?>
  <div class="quick-panel-sidebar custom-scrollbar" fuse-cloak data-fuse-bar="quick-panel-sidebar" data-fuse-bar-position="right">
                 <?php $this->load->view('back/template/quickpanel'); ?>
            </div>
  <script>
  var table;
  $(document).ready( function () {
	
    table = $('#dataTable').DataTable({ 
			'processing': true,
          	'serverSide': true,
			'dom' : '<l<t>ip>',
          	'order': [],
          	'ajax': {
             	'url':'<?=base_url()?>verifikator_new/ajaxcompanylist/<?=$period_year?>',
				 "type": "POST"
          	},
			'columns': [
             { data: 'nama_perusahaan' },
             { data: 'provinsi' },
             { data: 'kabupaten' },
             { data: 'kecamatan' },
             { data: 'desa' },
             { className: 'dt-center', data: 'status' },
          ]
          	
    });
    
	$("#date-dropdown").change(function(){
		var thn = $(this).val();
		table.ajax.url('<?=base_url()?>verifikator_new/ajaxcompanylist/' + thn).load();

  	});
	});
  </script>
</div>
<!-- ./wrapper -->

</body>
</html>
