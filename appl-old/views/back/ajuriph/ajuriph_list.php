<?php $this->load->view('back/template/meta_new'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar_new'); ?>

<style>
	
.td-table
{
word-wrap: break-word;
word-break: break-all;  
white-space: normal !important;
text-align: justify;
max-width: 20%;
}

.table thead th,
 .table tfoot th,
 .jsgrid .jsgrid-table thead th {
     border-top: 0;
     border-bottom-width: 1px;
     font-weight: 500;
     font-size: .8rem;
     text-transform: uppercase
 }

 .table td,
 .jsgrid .jsgrid-table td {
     font-size: 0.875rem;
     padding: .875rem 0.9375rem
 }
</style>

<div class="page-wrapper">
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
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<div class="card-actions">
							<a href="<?php echo $add_action ?>" class="btn btn-info btn-sm fuse-ripple-ready text-white"><i class="fa fa-plus"></i>
								<span> <?php echo $btn_add ?></span>
							</a>
						</div>
						<h4 class="card-titles">Daftar RIPH </h4>
						<?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
					</div>
					<div class="card-body">
						<div class="table-responsive table-hover">
							<table id="dataTable" class="table w-100">
								<thead>
									<tr>
										<th style="text-align: center">No</th>
										<th style="text-align: center" hidden>ID RIPH</th>
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
									  if($user->is_active == '0'){$is_active = '<a type="button" href="#" data-toggle="tooltip" title="RIPH Tidak Aktif" class="btn btn-xs btn-secondary btn-fab btn-sm"><i class="icon-close-circle"></i></a>';}
									  else{$is_active = '<a type="button" href="#" data-toggle="tooltip" title="RIPH Aktif" class="btn btn-xs btn-warning btn-fab btn-sm"><i class="icon-brightness-auto"></i></a>';}
									  if($user->sts_lunas == '1'){$is_lunas = '<a href="#" data-toggle="tooltip" title="RIPH Sudah Lunas" class="btn btn-success btn-fab btn-sm"><i class="icon-checkbox-multiple-marked"></i></a>';}
									  else{$is_lunas = '<a href="#" data-toggle="tooltip" title="RIPH Belum Lunas" class="btn btn-danger btn-fab btn-sm"><i class="icon-do-not-disturb"></i></a>';}
									  // action
									  $edit = '<a href="'.base_url('ajuriph/update/'.$user->id_mst_riph).'" data-toggle="tooltip" title="Edit RIPH" class="btn btn-warning btn-fab btn-sm"><i class="icon-auto-fix"></i></a>';
									  $tambah = '<a href="'.base_url('cpcl/daftarriph/'.$user->id_mst_riph).'" data-toggle="tooltip" title="Daftar PKS RIPH :'.$user->id_mst_riph.'" class="btn btn-info btn-fab btn-sm"><i class="icon-clipboard-plus"></i></a>';
									  $verif = '<a href="'.base_url('ajuriph/aju_verifikasi/'.$user->id_mst_riph).'" data-toggle="tooltip" title="Ajukan Verifikasi LUNAS" class="btn btn-success btn-fab btn-sm"><i class="icon-bookmark-check"></i></a>';
									  //$delete = '<a href="'.base_url('ajuriph/delete/'.$user->id_mst_riph).'" onClick="return confirm(\'Are you sure?\');" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>';
									?>
									<tr>
										<td style="text-align: center"><?php echo $no++ ?></td>
										<td style="text-align: left" hidden><?php echo $user->id_mst_riph ?></td>
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
</div>


<?php $this->load->view('back/template/footer_new'); ?>
<?php $this->load->view('back/template/endscript'); ?>
<?php $this->load->view('back/template/endbody'); ?>

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