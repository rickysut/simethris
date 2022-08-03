<?php $this->load->view('back/template/meta'); ?>
  <?php $this->load->view('back/template/sidebar'); ?>
  <div class="content-wrapper">
  <?php $this->load->view('back/template/navbar'); ?>
  <div class="content custom-scrollbar">
  
    <!-- Main content -->
    <div class="doc data-table-doc page-layout simple full-width">
		<div class="page-header bg-primary text-auto p-6 row no-gutters align-items-center justify-content-between">
            <h1 class="doc-title h4" id="content">Daftar RIPH</h1>
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
									  <th style="text-align: center">ID RIPH</th>
									  <th style="text-align: center">NO RIPH</th>
									  <th style="text-align: center">TANGGAL BERLAKU</th>
									  <th style="text-align: center">V RIPH</th>
									  <th style="text-align: center">BEBAN TANAM</th>
									  <th style="text-align: center">BEBAN PRODUKSI</th>
									  <th style="text-align: center">ACTION</th>
									  <th style="text-align: center">STATUS</th>
									</tr>
								  </thead>
								  <tbody>
									<?php $no = 1; foreach($get_all as $user){
									  // status active
									  if($user->is_active == '0'){$is_active = '<a type="button"  data-toggle="tooltip" title="RIPH Tidak Aktif" >NA</a>';}
									  else{$is_active = '<a type="button" data-toggle="tooltip" title="RIPH Aktif" >A</a>';}
									  if($user->sts_lunas == '1'){$is_lunas = '<a href="# data-toggle="tooltip" title="RIPH Sudah Lunas"><i style="color:green" class="fa fa-check-circle"></i></a>';}
									  else{$is_lunas = '<a  data-toggle="tooltip" title="RIPH Belum Lunas"><i style="color:red" class="fa fa-minus-circle"></i></a>';}
									  // action
									  $edit = '<a href="'.base_url('ajuriph/update/'.$user->id_mst_riph).'" data-toggle="tooltip" title="Edit RIPH" ><i style="color:blue" class="fa fa-pencil"></i></a>';
									  $tambah = '<a href="'.base_url('cpcl/daftarriph/'.$user->id_mst_riph).'" data-toggle="tooltip" title="Daftar PKS RIPH :'.$user->id_mst_riph.'" ><i style="color:green" class="fa fa-list"></i></a>';
									  $verif = '<a href="'.base_url('ajuriph/aju_verifikasi/'.$user->id_mst_riph).'" data-toggle="tooltip" title="Ajukan Verifikasi LUNAS" ><i style="color:#F39C12" class="fa fa-bookmark"></i></a>';
									  //$delete = '<a href="'.base_url('ajuriph/delete/'.$user->id_mst_riph).'" onClick="return confirm(\'Are you sure?\');" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>';
									?>
									  <tr>
										<td style="text-align: center"><?php echo $no++ ?></td>
										<td style="text-align: left"><?php echo $user->id_mst_riph ?></td>
										<td style="text-align: left"><?php echo $user->nomor_riph ?></td>
										<td style="text-align: left"><?php echo date('d-m-Y', strtotime($user->tgl_mulai_berlaku)).' s.d '.date('d-m-Y', strtotime($user->tgl_akhir_berlaku)) ?></td>
										<td style="text-align: right"><?php echo $user->v_pengajuan_riph ?> Ton</td>
										<td style="text-align: right"><?php echo $user->beban_tanam ?> Ha</td>
										<td style="text-align: right"><?php echo $user->beban_produksi ?> Ton</td>
										<td><?php echo $edit ?> <?php echo $tambah ?> <?php echo $verif ?></td>
										<td><?php echo $is_active ?> <?php echo $is_lunas ?></td>
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
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
		{
			"targets": 0,
			"className": "text-left",
			"width": "4%"
		},
		{
			"targets": 1,
			"className": "text-left",
			"width": "6%"
		},
		{
			"targets": 2,
			"className": "text-left",
			"width": "18%"
		},
		{
			"targets": 3,
			"className": "text-left",
			"width": "12%"
		},
		{
			"targets": 4,
			"className": "text-right",
			"width": "10%"
		},
		{
			"targets": 5,
			"className": "text-right",
			"width": "10%"
		},
		{
			"targets": 6,
			"className": "text-right",
			"width": "10%"
		},
		{
			"targets": 7,
			"className": "text-right",
			"width": "15%"
		},
		{
			"targets": 8,
			"className": "text-center",
			"width": "10%"
		}
        ],
    });
	//new $.fn.dataTable.FixedHeader(dataTable);
  });
  </script>

</div>
<!-- ./wrapper -->

</body>
</html>
