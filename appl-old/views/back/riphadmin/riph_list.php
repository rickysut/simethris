<?php $this->load->view('back/template/meta_new'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar_new'); ?>

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
					<?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
					<div class="card-header">
						<div class="card-actions d-none d-lg-block">
							<a href="<?php echo $add_action ?>" class="btn btn-info text-white fuse-ripple-ready">
								<i class="fa fa-plus-square"></i>
								<span><?php echo $btn_add ?></span>
							</a>
						</div>
						<div class="card-actions d-lg-none">
							<a href="<?php echo $add_action ?>" class="text-white btn btn-sm btn-block btn-info fuse-ripple-ready">
								<i class="fa fa-plus-square"></i>
							</a>
						</div>
						<h4 class="card-titles">Daftar RIPH</h4>
					</div>
					<div class="card-body">
						<div class="table table-responsive table-hover table-striped">
							<table id="dataTable" class="w-100">
								<thead>
									<tr>
										<th style="text-align: center; width:5%;">No</th>
										<th style="text-align: center; width:15%;">TGL Update</th>
										<th style="text-align: center; width:20%;">Volume Import</th>
										<th style="text-align: center; width:20%;">Beban Tanam</th>
										<th style="text-align: center; width:20%;">Beban Produksi</th>
										<th style="text-align: center; width:10%;">Jumlah Importir</th>
										<th style="text-align: center; width:10%;">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; foreach($get_all_riph as $user){
									  // status active
									  $edit = '<a href="'.base_url('riph/update/'.$user->id_riph).'" data-toggle="tooltip" title="Edit Data RIPH" class="btn btn-warning btn-sm"><i class="fa fa-pencil-square"></i></a>';
									  $delete = '<a href="'.base_url('riph/delete/'.$user->id_riph).'" data-toggle="tooltip" title="Hapus Data RIPH" onClick="return confirm(\'Are you sure?\');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
									?>
								
									<tr>
										<td style="text-align: center"><?php echo $no++ ?></td>
										<td style="text-align: left"><?php echo date('d-m-Y',strtotime($user->tanggal)) ?></td>
										<td style="text-align: right"><?php echo $user->v_pengajuan_import ?></td>
										<td style="text-align: right"><?php echo $user->v_beban_tanam ?></td>
										<td style="text-align: right"><?php echo $user->v_beban_produksi ?></td>
										<td style="text-align: right"><?php echo $user->jml_importir ?></td>
										<td style="text-align: right">
											<?php echo $edit ?>
											<?php echo $delete ?>
										</td>
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

<?php $this->load->view('back/template/footer_new'); ?>
<?php $this->load->view('back/template/endscript'); ?>
<?php $this->load->view('back/template/endbody'); ?>

<script>
  $(document).ready( function () {
    $('#dataTable').DataTable({ 
		scrollX: true,
        responsive: true,
        dom       : '<"top"f<"clear">>rt<"bottom"ip<"clear">>'
    });
  </script>